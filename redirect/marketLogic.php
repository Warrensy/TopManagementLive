<?php
    //createTeamLogic
    if(isset($_POST["Handeln"])){
        $product_material = $_POST["product_material"];
        $base_plus_max = $_POST["base_plus_max"];
        $summe = $_POST["summe"];
        $teamid = $_POST["teamid"];
        if($product_material == "Product"){
            $db->tradeProduct($_SESSION["Team"], $base_plus_max, $summe, $teamid);
        }
        else if($product_material == "Material"){
            $db->tradeMaterial($_SESSION["Team"], $base_plus_max, $summe, $teamid);
        }
        

        header('Location: index.php?site=idle');
    }
?>