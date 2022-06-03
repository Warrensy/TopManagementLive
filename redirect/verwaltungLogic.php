<?php

    if(isset($_POST["Zahlen"])){
        $verwaltung = 2;
        $team = $_SESSION["Team"];
        $forschung = $_POST["forschung"];
        $marketing = $_POST["marketing"];
        $betrag = $verwaltung + $forschung + $marketing;
        $betrag = -1 * $betrag;
        $answer = $db->addMoney($team,$betrag)

        $_SESSION["Team"] = $answer;
        header('Location: index.php?site=verwaltung.php');
    }
?>