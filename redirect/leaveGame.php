<?php
    //cleared die stored Session Daten
    unset($_SESSION["Game"]);
    header('Location: index.php');
    exit;
?>
