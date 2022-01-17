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
    

        header('Location: index.php?site=contract');
    }
    if(isset($_POST["deletecontract"]))
    {
        $auftragnr = $_POST["AuftragNr"];
        $teamcode = $_SESSION["Team"];

        $db->deleteFinishedContract($auftragnr, $teamcode);
        header('Location: index.php?site=contract');
    }
    if(isset($_POST["deleteangebot"]))
    {
        $angebotnr = $_POST["AngebotNr"];
        $teamcode = $_SESSION["Team"];

        $db->deleteFinishedOffer($angebotnr, $teamcode);
        header('Location: index.php?site=contract');
    }

?>

