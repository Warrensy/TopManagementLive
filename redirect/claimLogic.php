<?php
    if(isset($_POST["continue"]))
    {
        $offers = $_POST["offers"];
        $contracts = $_POST["contracts"];
        $teamcode = $_SESSION["Team"];

        $db->continueClaims($teamcode, $contracts, $offers);
        header('Location: index.php?site=claim');
    }
?>