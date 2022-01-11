<?php

    //wenn schon in einem Team ==> redirect zum index
    /* Nach Debug, wieder reinhauen
    if(isset($_SESSION["Team"])){
        header("Location: index.php");
        exit;
    }
    */

    //createTeamLogic
    if(isset($_POST["Speichern"])){
        $mittel = $_POST["mittel"];
        $base = $_POST["base"];
        $plus = $_POST["plus"];
        $max = $_POST["max"];
        
        $answer = $db->createTeam($mittel, $base, $plus, $max, $_SESSION["Game"]);

        $_SESSION["Team"] = $answer;
        header('Location: index.php?site=displayTeamCode');
    }
?>