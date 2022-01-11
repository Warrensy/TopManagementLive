<?php

    //wenn schon in einem Team ==> redirect zum index
    /* Nach Debug, wieder reinhauen
    if(isset($_SESSION["Team"])){
        header("Location: index.php");
        exit;
    }
    */

    //createTeamLogic
    if(isset($_POST["Überweisen"])){
        $summe = $_POST["summe"];
        $teamid = $_POST["teamid"];
        $db->transferMoney($_SESSION["Team"], $summe, $teamid);

        header('Location: index.php?site=idle');
    }
?>