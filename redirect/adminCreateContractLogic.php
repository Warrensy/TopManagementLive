<?php
    if(isset($_POST["ContractSpeichern"])){
        
        /*
        $kategorie = "TESTKA";
        $region = "Europa";
        $produkt = $_POST["produkt"];
        $menge = $_POST["menge"];
        $preis = $_POST["preis"];
        $zahlungsziel = $_POST["zahlungsziel"];
        $liefertermin = $_POST["liefertermin"];
        $aktiv = 0; 
        */


        $kategorie = "TESTKA";
        $region = "Europa";
        $produkt = "Base";
        $menge = 1;
        $preis = 1;
        $zahlungsziel = 1;
        $liefertermin = 1;
        $aktiv = 0; 
        
        $db->createContract($kategorie, $region, $produkt, $menge, $preis, $zahlungsziel, $liefertermin, $aktiv);

        header('Location: index.php?site=idle');
    }
?>
