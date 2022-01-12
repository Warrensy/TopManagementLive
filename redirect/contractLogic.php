<?php
    if(isset($_POST["angebotausliefern"]))
    {
        $angebotnr = $_POST["AngebotNr"];
        $produkt = $_POST["Produkt"];
        $menge = $_POST["Menge"];
        $preis = $_POST["Preis"];
        $teamcode = $_SESSION["Team"];

        $db->deleteFinishedOffer($angebotnr, $teamcode);
        $db->deleteProductFromStorage($teamcode, $produkt, $menge);
        $db->addMoney($teamcode, $preis); 

        header('Location: index.php?site=contract');
    }

    if(isset($_POST["contractausliefern"]))
    {
        $auftragnr = $_POST["AuftragNr"];
        $produkt = $_POST["Produkt"];
        $menge = $_POST["Menge"];
        $preis = $_POST["Preis"];
        $teamcode = $_SESSION["Team"];

        $db->deleteFinishedContract($auftragnr, $teamcode);
        $db->deleteProductFromStorage($teamcode, $produkt, $menge);
        $db->addMoney($teamcode, $preis); 

        header('Location: index.php?site=contract');
    }

?>

