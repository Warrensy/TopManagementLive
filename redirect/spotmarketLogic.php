<?php
    if(isset($_POST["AnfrageSpeichern"])){
        
        $region = "Europa";
        $produkt = $_GET["produkt"];
        $menge = $_GET["menge"];
        $preis = $_POST["preis"];
        $zahlungsziel = $_POST["zahlungsziel"];
        $liefertermin = $_POST["liefertermin"];
        $teamcode = $_SESSION["Team"];
        
        $answer = $db->createOffer($region, $produkt, $menge, $preis, $zahlungsziel, $liefertermin, $teamcode, $_SESSION["Game"]);

        header('Location: index.php?site=idle');
    }
?>
