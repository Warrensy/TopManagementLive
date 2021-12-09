<?php

    //wenn schon in einem Team ==> redirect zum index
    /* Nach Debug, wieder reinhauen
    if(isset($_SESSION["Team"])){
        header("Location: index.php");
        exit;
    }
    */

    //createTeamLogic
    if(isset($_POST["Submit"])){
        $code = $_POST["teamcode"];
        
        if($db->joinTeam($code))
        {
            $_SESSION["Team"] = $code;
            header('Location: index.php?site=displayTeamCode');
            exit;
        }
        else
        {
            //Vielleicht auf andere Seite mit Fehlermeldung rerouten ?
            echo 'Der gesuchte Teamcode existiert nicht !<br>Bitte geben Sie einen korrekten ein, oder erstellen Sie ihr eigenes Team!';
            exit;
        }
    }
?>