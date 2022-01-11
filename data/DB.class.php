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

    function joinTeam($teamcode){
        $stmt = $this->verbindung->prepare("SELECT * FROM `team` WHERE `Teamcode` = (?)");
        $stmt->bind_param("s", $teamcode);
        $stmt->execute();

        $result = $stmt->get_result();

        if($result->num_rows == 0) {
            return false;
        }
        else{
            return true;
        } 
    }

    function getRawMaterial($teamCode){
        $stmt = $this->verbindung->prepare("SELECT * FROM `materiallager` WHERE `Teamcode` = (?)" );
        $stmt->bind_param("s", $teamCode);
        $stmt->execute();

        $result = $stmt->get_result();
        $details = $result->fetch_array();


        if ($details != NULL) {
            return $details;
        } else {
            return false;
        }
    }

    function getContractByID($contractID){ 
        $stmt = $this->verbindung->prepare("SELECT * FROM `auftrag` WHERE `AuftragNr` = (?)" );
        $stmt->bind_param("s", $contractID);
        $stmt->execute();

        $result = $stmt->get_result();
        $details = $result->fetch_array();


        if ($details != NULL) {
            return $details;
        } else {
            return false;
        }
    }

    function getProducts($teamCode){
        $stmt = $this->verbindung->prepare("SELECT * FROM `produktlager` WHERE `Teamcode` = (?)" );
        $stmt->bind_param("s", $teamCode);
        $stmt->execute();

        $result = $stmt->get_result();
        $details = $result->fetch_array();


        if ($details != NULL) {
            return $details;
        } else {
            return false;
        }
    }

    function getActiveInquiry(){
        $stmt = $this->verbindung->prepare("SELECT * FROM anfragen WHERE active = 1" );
        $stmt->execute();

        $result = $stmt->get_result();
        $details = $result->fetch_array();
        if ($details != NULL) {
            return $details;
        } else {
            return false;
        }
    }

    function createOffer($region, $produkt, $menge, $preis, $zahlungsziel, $liefertermin, $teamcode) { //anker
        $stmt = $this->verbindung->prepare("INSERT INTO `angebote` (`Region`, `Produkt`, `Menge`, `Preis`, `Zahlungsziel`, `Liefertermin`, `Teamcode`) 
        VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssiiiii",$region, $produkt, $menge, $preis, $zahlungsziel, $liefertermin, $teamcode);
        $stmt->execute();
    }

    function getOffers() {
        $stmt = $this->verbindung->prepare("SELECT * FROM angebote WHERE active = 0" );
        $stmt->execute();

        $result = $stmt->get_result();
        if($result != NULL) {
            return $result;
        } else {
            return false; 
        }
    }



    function getActiveOffersByTeamCode($teamcode) {
        $stmt = $this->verbindung->prepare("SELECT * FROM angebote WHERE active = 1 AND Teamcode = (?)" );
        $stmt->bind_param("i", $teamcode);
        $stmt->execute();

        $result = $stmt->get_result();
        if($result != NULL) {
            return $result;
        } else {
            return false; 
        }
    }

    function getContractsByTeamCode($teamcode) {
        $stmt = $this->verbindung->prepare("SELECT * FROM auftrag JOIN auftragzuteam ON auftrag.AuftragNr=auftragzuteam.AuftragNr WHERE Teamcode = (?)" );
        $stmt->bind_param("i", $teamcode);
        $stmt->execute();

        $result = $stmt->get_result();
        if($result != NULL) {
            return $result;
        } else {
            return false; 
        }
    }

    function getOffersCount() {
        $stmt = $this->verbindung->prepare("SELECT COUNT(AngebotNr) AS rowcount FROM angebote WHERE active = 0" );
        $stmt->execute();
        
        $result = $stmt->get_result();
        $details = $result->fetch_array(); 
        if($details != NULL) {
            return $details;
        } else {
            return false; 
        }
    }

    function setBestOffer($offerid) {
        $stmt = $this->verbindung->prepare("UPDATE angebote SET active = 1 WHERE AngebotNr = (?)");
        $stmt->bind_param("i", $offerid);
        $stmt->execute();
    }

    function deleteOtherOffers() {
        $stmt = $this->verbindung->prepare("DELETE FROM angebote WHERE active = 0");
        $stmt->execute();
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

    function addMaterials($team, $base, $plus, $max)
    {
        $stmt = $this->verbindung->prepare("UPDATE materiallager SET AusstehendRohMax = (?), AusstehendRohBase = (?), AusstehendRohPlus = (?) WHERE Teamcode = (?)");
        $stmt->bind_param("iiis",$max, $base, $plus , $team);
        $stmt->execute();
    }

    function setContractFalse($contractID)
    {
        $stmt = $this->verbindung->prepare("UPDATE auftrag SET Aktiv = 0 WHERE AuftragNr = (?)");
        $stmt->bind_param("i", $contractID);
        $stmt->execute();
    }

    function transferContractToTeam($team, $contractID, $delivery, $payment){
        $stmt = $this->verbindung->prepare("INSERT INTO `auftragzuteam` (`AuftragNr`, `Teamcode`, `FinalZahlungsziel`, `FinalLiefertermin`) VALUES (?,?,?,?)");
        $stmt->bind_param("isii", $contractID, $team, $payment, $delivery);
        $stmt->execute();
    }

    function loadLane($team, $lane)
    {
        $stmt = $this->verbindung->prepare("SELECT * FROM maschinenzuteam WHERE Teamcode = ? AND lane = ?;");
        $stmt->bind_param("si",$team, $lane);
        $stmt->execute();

        $result = $stmt->get_result();
        $details = $result->fetch_array();


        if ($details != NULL) {
            return $details;
        } else {
            return false;
        }
    }

    function getProduction($MaschinenID)
    {
        $stmt = $this->verbindung->prepare("SELECT * FROM aktuelleproduktion WHERE MaschinenID = ?;");
        $stmt->bind_param("i",$MaschinenID);
        $stmt->execute();

        $result = $stmt->get_result();
        $details = $result->fetch_array();


        if ($details != NULL) {
            return $details;
        } else {
            return false;
        }
    }

    function getActiveYearlyContracts()
    {
        $stmt = $this->verbindung->prepare("SELECT AuftragNr FROM auftrag WHERE Aktiv = 1");
        $stmt->execute();

        $result = $stmt->get_result();
        $details = $result;


        if ($details != NULL) {
            return $details;
        } else {
            return false;
        }
    }

    function setActiveContracts(){
        $stmt = $this->verbindung->prepare("UPDATE auftrag SET Aktiv = 0");
        $stmt->execute();
        //                                                                            change 4 to number of teams +1
        $stmt = $this->verbindung->prepare("UPDATE auftrag SET Aktiv = 1 ORDER BY rand() LIMIT 4");
        $stmt->execute();
    }

    function getQuartalByTeam($team)
    {
        $stmt = $this->verbindung->prepare("SELECT AktuellesQuartal FROM team WHERE Teamcode = (?)");
        $stmt->bind_param("s", $team);
        $stmt->execute();

        $result = $stmt->get_result();
        $details = $result->fetch_array();


        if ($details != NULL) {
            return $details["AktuellesQuartal"];
        } else {
            return false;
        }
    }

    function buyMachine($machine, $team, $cost, $lane)
    {
        $stmt = $this->verbindung->prepare("UPDATE team SET FluessigeMittel = FluessigeMittel - (?)  WHERE Teamcode = (?)");
        $stmt->bind_param("is", $cost,$team);
        $stmt->execute();

        //add machine
        //Erwerbsquartal noch Logik einbauen
        $quartal = $this->getQuartalByTeam($team);
        $stmt = $this->verbindung->prepare("INSERT INTO `maschinenzuteam` (`Maschinentyp`,`Teamcode`,`Erwerbsquartal`,`lane`) VALUES (?,?,?,?)");
        $stmt->bind_param("ssii", $machine, $team, $quartal, $lane);
        $stmt->execute();
    }
    function acceptMaterials($team)
    {
        $stmt = $this->verbindung->prepare("SELECT * FROM materiallager WHERE Teamcode = (?) ");
        $stmt->bind_param("s", $team);
        $stmt->execute();
        $result = $stmt->get_result();
        $details = $result->fetch_array();
        $baseAdd = $details["AusstehendRohBase"];
        $plusAdd =  $details["AusstehendRohPlus"];
        $maxAdd =  $details["AusstehendRohMax"];
         
        $stmt = $this->verbindung->prepare("UPDATE materiallager SET AusstehendRohMax = 0,AusstehendRohPlus = 0, AusstehendRohBase = 0  WHERE Teamcode = (?) ");
        $stmt->bind_param("s", $team);
        $stmt->execute();

        $stmt = $this->verbindung->prepare("UPDATE materiallager SET RohMax = RohMax + (?), RohBase = RohBase + (?), RohPlus = RohPlus + (?) WHERE Teamcode = (?)");
        $stmt->bind_param("iiis",$maxAdd, $baseAdd, $plusAdd , $team);
        $stmt->execute();
        
    }

    function startProduction($machine, $produkt, $anzahl, $team, $maschinenTyp)
    {
        $oldQuartal = $this->getQuartalByTeam($team);

        
        if($maschinenTyp == "Flex")
        {
            $quartal = $oldQuartal + 2;
        }
        else
        {
            $quartal = $oldQuartal + 1;
        }
        

        $stmt = $this->verbindung->prepare("INSERT INTO `aktuelleproduktion` (`MaschinenID`,`Zielprodukt`,`Anzahl`,`FertigstellungQuartal`) VALUES (?,?,?,?)");
        $stmt->bind_param("isii", $machine, $produkt, $anzahl, $quartal);
        $stmt->execute();        

        switch($produkt)
        {
            case 'Base':
                $stmt = $this->verbindung->prepare("UPDATE materiallager SET RohBase = RohBase - (?) WHERE Teamcode = (?)");
                $stmt->bind_param("is",$anzahl, $team);
                $stmt->execute();

                $preis = $anzahl * 1;
                $stmt = $this->verbindung->prepare("UPDATE team SET FluessigeMittel = FluessigeMittel - (?) WHERE Teamcode = (?)");
                $stmt->bind_param("is",$preis, $team);
                $stmt->execute();
                break;
            case 'Plus':
                $stmt = $this->verbindung->prepare("UPDATE materiallager SET RohPlus = RohPlus - (?) WHERE Teamcode = (?)");
                $stmt->bind_param("is",$anzahl, $team);
                $stmt->execute();

                $preis = $anzahl * 2;
                $stmt = $this->verbindung->prepare("UPDATE team SET FluessigeMittel = FluessigeMittel - (?) WHERE Teamcode = (?)");
                $stmt->bind_param("is",$preis, $team);
                $stmt->execute();
                break;
            case 'Max':
                $stmt = $this->verbindung->prepare("UPDATE materiallager SET RohMax = RohMax - (?) WHERE Teamcode = (?)");
                $stmt->bind_param("is",$anzahl, $team);
                $stmt->execute();

                $preis = $anzahl * 3;
                $stmt = $this->verbindung->prepare("UPDATE team SET FluessigeMittel = FluessigeMittel - (?) WHERE Teamcode = (?)");
                $stmt->bind_param("is",$preis, $team);
                $stmt->execute();
                break;
        }

    }

    function getMPPs($team)
    {
        $stmt = $this->verbindung->prepare("SELECT * FROM team WHERE Teamcode=(?)");
        $stmt->bind_param("s", $team);
        $stmt->execute();

        $result = $stmt->get_result();
        $details = $result->fetch_array();


        if ($details != NULL) {
            return $details;
        } else {
            return false;
        }
    }

    function setMPPs($europa, $asien, $amerika, $team)
    {
        $stmt = $this->verbindung->prepare("UPDATE team SET europa_mpp = ?, asien_mpp = ?, amerika_mpp = ? WHERE Teamcode=(?)");
        $stmt->bind_param("iiis",$europa, $asien, $amerika, $team);
        $stmt->execute();
    }

    function putToWarehouse($team, $lane)
    {
        $machine = $this->loadLane($team, $lane);        
        $prod = $this->getProduction($machine["MaschinenID"]);

        //delete Production
        $stmt = $this->verbindung->prepare("DELETE FROM aktuelleproduktion WHERE ProdID = ?");
        $stmt->bind_param("i",$prod["ProdID"]);
        $stmt->execute();

        //add finished products to warehouse
        switch($prod["Zielprodukt"])
        {
            case 'Base':
                $stmt = $this->verbindung->prepare("UPDATE produktlager SET Base = Base + (?) WHERE Teamcode = (?)");
                $stmt->bind_param("is",$prod["Anzahl"], $team);
                $stmt->execute();   
                break;
            case 'Plus':
                $stmt = $this->verbindung->prepare("UPDATE produktlager SET Plus = Plus + (?) WHERE Teamcode = (?)");
                $stmt->bind_param("is",$prod["Anzahl"], $team);
                $stmt->execute();  
                break;
            case 'Max':
                $stmt = $this->verbindung->prepare("UPDATE produktlager SET `Max` = `Max` + (?) WHERE Teamcode = (?)");
                $stmt->bind_param("is",$prod["Anzahl"], $team);
                $stmt->execute();  
                break;
        }

    }

    function sellMachine($team, $lane, $price)
    {
        $machine = $this->loadLane($team, $lane);        
        $prod = $this->getProduction($machine["MaschinenID"]);

        //delete Production
        $stmt = $this->verbindung->prepare("DELETE FROM aktuelleproduktion WHERE ProdID = ?");
        $stmt->bind_param("i",$prod["ProdID"]);
        $stmt->execute();

        //delete Machine
        $stmt = $this->verbindung->prepare("DELETE FROM maschinenzuteam WHERE MaschinenID = ?");
        $stmt->bind_param("i",$machine["MaschinenID"]);
        $stmt->execute();

        //add flüssige mittel
        $stmt = $this->verbindung->prepare("UPDATE team SET `FluessigeMittel` = `FluessigeMittel` + (?) WHERE Teamcode = (?)");
        $stmt->bind_param("ii", $price, $team);
        $stmt->execute();
    }

    function NextQuarter($gameid)
    {
        $stmt = $this->verbindung->prepare("UPDATE team SET AktuellesQuartal = AktuellesQuartal + 1 WHERE gameid = (?)");
        $stmt->bind_param("s", $gameid);
        $stmt->execute();
    }
}

?>
