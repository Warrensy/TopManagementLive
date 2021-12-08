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
        
        $answer = $db->payTaxes($summe);

        $_SESSION["Team"] = $answer;
        header('Location: index.php?site=idle');
    }
?>