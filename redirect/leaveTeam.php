<?php
    //cleared die stored Session Daten
    unset($_SESSION["Team"]);
    header('Location: index.php');
    exit;
?>
