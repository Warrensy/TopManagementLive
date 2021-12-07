<?php
    //cleared die stored Session Daten
    $_SESSION = [];
    unset($_SESSION["Team"]);
    header('Location: index.php');
    exit;
?>
