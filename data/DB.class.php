<!-- Steuert alle Datenbankzugriffe -->
<?php
class DBclass {

    private $verbindung;

    function __construct($host, $user, $password, $database){
        $this->verbindung = new mysqli($host, $user, $password, $database);
    }

    //erstellt Teamcode, erstellt die zugehörigen Tabellen in der Datenbank, und gebt den Teamcode zurück
    function createTeam($mittel, $base, $plus, $max){
        //if Teamcode already exists, retry until a unique one is generated
        while(1)
        {
            $newTeamCode = mt_rand(10000,99999);
            $stmt = $this->verbindung->prepare("SELECT * FROM `team` WHERE `Teamcode` = (?)");
            $stmt->bind_param("s", $newTeamCode);
            $stmt->execute();
    
            $result = $stmt->get_result();
    
            //Überprüft wie viele Ergebnisse mit dem value gefunden wurden
            //Wenn kein Ergebnis ==> Code ist verfügbar und Schleife kann verlassen werden
            if($result->num_rows == 0) {
                break;
            } 
        }

        $stmt = $this->verbindung->prepare("INSERT INTO `team` (`Teamcode`,`FluessigeMittel`) VALUES (?,?)");
        $stmt->bind_param("si", $newTeamCode,$mittel);
        $stmt->execute();

        $stmt = $this->verbindung->prepare("INSERT INTO `materiallager` (`Teamcode`,`RohMax`,`RohPlus`,`RohBase`) VALUES (?,?,?,?)");
        $stmt->bind_param("siii", $newTeamCode,$max,$plus,$base);
        $stmt->execute();

        $stmt = $this->verbindung->prepare("INSERT INTO `produktlager` (`Teamcode`) VALUES (?)");
        $stmt->bind_param("s", $newTeamCode);
        $stmt->execute();

        return $newTeamCode;
    }


    function getLiquidFundsByTeamCode($teamcode)
    {
        $stmt = $this->verbindung->prepare('SELECT FluessigeMittel FROM team WHERE Teamcode = ?;');
        $stmt->bind_param('s', $teamcode);
        $stmt->execute();
        $result = $stmt->get_result();
        $details = $result->fetch_array();

        if ($details != NULL) {
            return $details["FluessigeMittel"];
        } else {
            return false;
        }
    }

    function payTaxes($teamcode, $summe)
    {
        $funds = $this->getLiquidFundsByTeamCode($teamcode);
        $newFunds = $funds - $summe;

        $stmt = $this->verbindung->prepare("UPDATE team SET FluessigeMittel = (?) WHERE Teamcode = (?)");
        $stmt->bind_param("is", $newFunds, $teamcode);
        $stmt->execute();
    }


/* Alte Datenbank Aufrufe als Referenzwert für Syntax

    //Registriert den User in den usertable
    function registerUser($userObjekt){
        $stmt = $this->verbindung->prepare("INSERT INTO `usertable` (`Anrede`, `Vorname`, `Nachname`, `Email`, `Username`, `Passwort`) 
        VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $userObjekt->AnredeOBJ, $userObjekt->VornameOBJ, $userObjekt->NachnameOBJ, $userObjekt->EmailOBJ, $userObjekt->UsernameOBJ, $userObjekt->PasswortOBJ);
        $stmt->execute();
    }

    //Überprüft in der Datenbank, ob ein Username mit dem Wert bereits existiert
    function checkUsername($Username){  
        $stmt = $this->verbindung->prepare("SELECT * FROM `usertable` WHERE `Username` = (?)");
        $stmt->bind_param("s", $Username);
        $stmt->execute();

        $result = $stmt->get_result();

        //Überprüft wie viele Ergebnisse mit dem value gefunden wurden
        if($result->num_rows == 0) {
            return 0;
        } else {
            return 1;
        }
    }

    //Gibt die alle Daten des gewählten User (auswahl durch Username) aus der Datenbank an ein Objekt weiter
    function getUserFromName($username){
        $stmt = $this->verbindung->prepare("SELECT * FROM `usertable` WHERE `Username` = (?)");
        $stmt->bind_param("s", $username);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_array();
        
        $userObjektPrint = new User($row["Anrede"],$row["Vorname"],$row["Nachname"],$row["Email"],$row["Username"],$row["Passwort"],$row["UserID"]);

        return $userObjektPrint;
    }

    //Gibt die alle Daten des gewählten User (auswahl durch UserID) aus der Datenbank an ein Objekt weiter
    function getUserFromID($UserID){
        $stmt = $this->verbindung->prepare("SELECT * FROM `usertable` WHERE `UserID` = (?)");
        $stmt->bind_param("s", $UserID);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_array();
        
        $userObjektPrint = new User($row["Anrede"],$row["Vorname"],$row["Nachname"],$row["Email"],$row["Username"],$row["Passwort"],$row["UserID"]);

        return $userObjektPrint;
    }

    //Gibt den Username abhängig von der ID aus
    function getUsername($UserID){
        $stmt = $this->verbindung->prepare("SELECT `Username` FROM `usertable` WHERE `UserID` = (?)");
        $stmt->bind_param("s", $UserID);
        $stmt->execute();

        $result = $stmt->get_result();
        $resultNew = $result->fetch_array();

        return $resultNew["Username"];
    }

    //Überprüft ob die Email in der Datenbank existiert
    function checkEmail($email){  
        $stmt = $this->verbindung->prepare("SELECT * FROM `usertable` WHERE `Email` = (?)");
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();

        if($result->num_rows == 0) {
            return 0;
        } else {
            return 1;
        }
    }

    //Updated das Passwort aus Passwort-Vergessen
    function newPasswordForgot($randomPassword, $email){  
        $stmt = $this->verbindung->prepare("UPDATE `usertable` SET `Passwort` = (?) WHERE `Email` = (?)");
        $stmt->bind_param("ss", $randomPassword, $email);
        $stmt->execute();
    }

    //Updated das Passwort aus UserSettings
    function newPassword($Password, $UserID){  
        $stmt = $this->verbindung->prepare("UPDATE `usertable` SET `Passwort` = (?) WHERE `UserID` = (?)");
        $stmt->bind_param("ss", $Password, $UserID);
        $stmt->execute();
    }

    //Updated die Anrede des User
    function updateAnrede($Anrede, $UserID){
        $stmt = $this->verbindung->prepare("UPDATE `usertable` SET `Anrede` = (?) WHERE `UserID` = (?)");
        $stmt->bind_param("ss", $Anrede, $UserID);
        $stmt->execute();
    }

    //Updated den Vornamen des User
    function updateVorname($Vorname, $UserID){
        $stmt = $this->verbindung->prepare("UPDATE `usertable` SET `Vorname` = (?) WHERE `UserID` = (?)");
        $stmt->bind_param("ss", $Vorname, $UserID);
        $stmt->execute();
    }

    //Updated den Nachnamen des User
    function updateNachname($Nachname, $UserID){
        $stmt = $this->verbindung->prepare("UPDATE `usertable` SET `Nachname` = (?) WHERE `UserID` = (?)");
        $stmt->bind_param("ss", $Nachname, $UserID);
        $stmt->execute();
    }

    //Updated die Email des User
    function updateEmail($Email, $UserID){
        $stmt = $this->verbindung->prepare("UPDATE `usertable` SET `Email` = (?) WHERE `UserID` = (?)");
        $stmt->bind_param("ss", $Email, $UserID);
        $stmt->execute();
    }

    //Updated den Username des User
    function updateUsername($Username, $UserID){
        $stmt = $this->verbindung->prepare("UPDATE `usertable` SET `Username` = (?) WHERE `UserID` = (?)");
        $stmt->bind_param("ss", $Username, $UserID);
        $stmt->execute();
    }

    //Gibt alle Freunde des Users an
    function getFriends($UserID){
        $stmt = $this->verbindung->prepare("SELECT `FKUsername2` FROM `freunde` WHERE `FKUsername1` = (?) AND `status` = 1");
        $stmt->bind_param("s", $UserID);
        $stmt->execute();

        $result = $stmt->get_result();

        return $result;
    }

    //Annuliert die gewählte Freundschaft
    function deleteFriend($UserID, $FriendID){
        $stmt = $this->verbindung->prepare("DELETE FROM `freunde` WHERE `FKUsername1` = (?) AND `FKUsername2` = (?)");
        $stmt->bind_param("ss", $UserID, $FriendID);
        $stmt->execute();

        $stmt = $this->verbindung->prepare("DELETE FROM `freunde` WHERE `FKUsername2` = (?) AND `FKUsername1` = (?)");
        $stmt->bind_param("ss", $UserID, $FriendID);
        $stmt->execute();
    }

    //Gibt alle ausstehenden Freundschaftsanfragen aus
    function getRequests($UserID){
        $stmt = $this->verbindung->prepare("SELECT * FROM `freunde` WHERE `FKUsername1` = (?) AND `status` = 0");
        $stmt->bind_param("s", $UserID);
        $stmt->execute();

        $result = $stmt->get_result();

        return $result;
    }
    
    //Akzeptiert die Freundschaftanfrage
    function confirmFriend($UserID, $FriendID){
        $stmt = $this->verbindung->prepare("UPDATE `freunde` SET `Status` = (?) WHERE `FKUsername1` = (?) AND `FKUsername2` = (?)");
        $stmt->bind_param("sss", $i = 1,$UserID, $FriendID);
        $stmt->execute();

        $stmt = $this->verbindung->prepare("UPDATE `freunde` SET `Status` = (?) WHERE `FKUsername2` = (?) AND `FKUsername1` = (?)");
        $stmt->bind_param("sss", $i = 1,$UserID, $FriendID);
        $stmt->execute();
    }

    //Gibt alle zur Eingabe passenden User aus
    function getSearchUser($search){
        $stmt = $this->verbindung->prepare("SELECT * FROM `usertable` WHERE `Username` LIKE (?)");
        //String des Search-Inputs wird vorne/hinten mit Wildcards versehen damit die Inhalte auf partielle Übereinstimmung untersucht werden
        $input = "%". $search ."%";
        $stmt->bind_param("s", $input);
        $stmt->execute();

        $result = $stmt->get_result();

        return $result;
    }

    //Schickt eine Freundschaftsanfrage
    function sendFriend($UserID, $FriendID){
        $stmt = $this->verbindung->prepare("INSERT INTO `Freunde` (`FKUsername1`, `FKUsername2`, `status`, `Sender`) 
        VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $UserID, $FriendID, $status = 0, $UserID);
        $stmt->execute();

        $stmt = $this->verbindung->prepare("INSERT INTO `Freunde` (`FKUsername2`, `FKUsername1`, `status`, `Sender`) 
        VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $UserID, $FriendID, $status = 0, $UserID);
        $stmt->execute();
    }

    //Gibt die Userrechte abhängig von der ID aus
    function getRights($UserID){
        $stmt = $this->verbindung->prepare("SELECT `Rechte` FROM `usertable` WHERE `UserID` = (?)");
        $stmt->bind_param("s", $UserID);
        $stmt->execute();

        $result = $stmt->get_result();
        $resultNew = $result->fetch_array();

        return $resultNew["Rechte"];
    }

    //Gibt alle User außer den eigenen aus
    function getAllUsers($UserID){
        $stmt = $this->verbindung->prepare("SELECT * FROM `usertable` WHERE NOT `UserID` = (?)");
        $stmt->bind_param("s", $UserID);
        $stmt->execute();

        $result = $stmt->get_result();

        return $result;
    }

    //Gibt die den Aktivitätsstatus des jeweiligen Users aus
    function getActivity($UserID){
        $stmt = $this->verbindung->prepare("SELECT `aktivFlag` FROM `usertable` WHERE `UserID` = (?)");
        $stmt->bind_param("s", $UserID);
        $stmt->execute();

        $result = $stmt->get_result();
        $array = $result->fetch_array();

        return $array;
    }

    //Setzt den gewählten User inaktiv
    function setInactiv($UserID){
        $stmt = $this->verbindung->prepare("UPDATE `usertable` SET `aktivFlag` = 0 WHERE `UserID` = (?)");
        $stmt->bind_param("s", $UserID);
        $stmt->execute();
    }

    function setActiv($UserID){
        $stmt = $this->verbindung->prepare("UPDATE `usertable` SET `aktivFlag` = 1 WHERE `UserID` = (?)");
        $stmt->bind_param("s", $UserID);
        $stmt->execute();
    }  

    //Upload eines Beitrags
    function uploadPost($inhalt,$UserID,$Freigabe){
        $date = date("Y-m-d H:i:s");
        $stmt = $this->verbindung->prepare("INSERT INTO `beitraege` (`Textinhalt`,`UsernameFK`,`BeitragStatus`,`Datum`) VALUES(?,?,?,?)");
        $stmt->bind_param("ssss", $inhalt,$UserID,$Freigabe,$date);
        $stmt->execute();
    }

    //Zeigt alle Posts aus der Datenbank an
    function getPosts(){
        $stmt = $this->verbindung->prepare("SELECT * FROM `beitraege` ORDER BY `BeitragID` DESC"); 
        $stmt->execute();

        $result = $stmt->get_result();
        return $result;
    }

    //Löscht einen Beitrag
    function deletePost($ID){
        $stmt = $this->verbindung->prepare("DELETE FROM `beitraege` WHERE `BeitragID` = (?)");
        $stmt->bind_param("i", $ID);
        $stmt->execute();
    }

    //Zeigt alle Posts aus der Datenbank an
    function changeFreigabe($ID){
        $stmt = $this->verbindung->prepare("SELECT `BeitragStatus` FROM `beitraege` WHERE `BeitragID` = (?)");
        $stmt->bind_param("i", $ID); 
        $stmt->execute();
        $result = $stmt->get_result();
        $array = $result->fetch_array();

        if($array["BeitragStatus"] == 1){
            $freigabe = 0;
        } else{
            $freigabe = 1;
        }

        $stmt = $this->verbindung->prepare("UPDATE `beitraege` SET `BeitragStatus` = (?) WHERE `BeitragID` = (?)");
        $stmt->bind_param("ii", $freigabe, $ID); 
        $stmt->execute();
    }

    //Zeigt alle Posts aus der Datenbank an
    function getPostsFromUser($ID){
        $stmt = $this->verbindung->prepare("SELECT * FROM `beitraege` WHERE `UsernameFK` = (?) ORDER BY `BeitragID` DESC");
        $stmt->bind_param("i", $ID);  
        $stmt->execute();

        $result = $stmt->get_result();
        return $result;
    }

    //Gibt alle zur Eingabe passenden User aus
    function getSearchPosts($search){
        $stmt = $this->verbindung->prepare("SELECT * FROM `beitraege` WHERE `Textinhalt` LIKE (?) ORDER BY `BeitragID` DESC");
        //String des Search-Inputs wird vorne/hinten mit Wildcards versehen damit die Inhalte auf partielle Übereinstimmung untersucht werden
        $input = "%". $search ."%";
        $stmt->bind_param("s", $input);
        $stmt->execute();

        $result = $stmt->get_result();

        return $result;
    }

    //Gibt alle die Likes des Postes aus
    function getLikes($ID){
        $stmt = $this->verbindung->prepare("SELECT * FROM `liketable` WHERE `FKBeitragID` = (?)");
        $stmt->bind_param("s", $ID);
        $stmt->execute();

        $result = $stmt->get_result();

        return $result;
    }

    //Liked mit dem aktuellen User einen Post
    function setLike($ID,$UserID){
        $stmt = $this->verbindung->prepare("INSERT INTO `liketable` (`FKBeitragID`,`FKUsername`) VALUES (?,?)");
        $stmt->bind_param("ii", $ID,$UserID);
        $stmt->execute();
    }

    //Entfernt den Post
    function removeLike($ID,$UserID){
        $stmt = $this->verbindung->prepare("DELETE FROM `liketable` WHERE `FKBeitragID` = (?) AND `FKUsername` = (?)");
        $stmt->bind_param("ii", $ID,$UserID);
        $stmt->execute();
    }
*/
}

?>
