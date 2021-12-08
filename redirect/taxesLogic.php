<?php

    //wenn schon in einem Team ==> redirect zum index
    /* Nach Debug, wieder reinhauen
    if(isset($_SESSION["Team"])){
        header("Location: index.php");
        exit;
    }
    */

    //createTeamLogic
    if(isset($_POST["Zahlen"])){
        $summe = $_POST["summe"];
    
        $db->payTaxes($_SESSION["Team"], $summe);

        header('Location: index.php?site=idle');
    }
?>