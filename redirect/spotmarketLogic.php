<?php
    if(isset($_POST["AnfrageSpeichern"])){
        
        $region = "Europa";
        $produkt = $_GET["produkt"];
        $menge = $_GET["menge"];
        $preis = $_POST["preis"];
        $zahlungsziel = $_POST["zahlungsziel"];
        $liefertermin = $_POST["liefertermin"];
        $teamcode = $_SESSION["Team"];

        echo $preis, $zahlungsziel, $liefertermin, $produkt, $menge;
        
        $answer = $db->createOffer($region, $produkt, $menge, $preis, $zahlungsziel, $liefertermin, $teamcode);

        header('Location: index.php?site=idle');
    }
?>
