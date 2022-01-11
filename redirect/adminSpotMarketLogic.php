<?php
    if(isset($_POST["save"]))
    {
        $menge = $_POST["menge"];
        $material = $_POST["material"];

        $db->AddSpotmarketContract($material,$menge);
        header('Location: index.php?site=adminSpotMarket');
        

    }
?>