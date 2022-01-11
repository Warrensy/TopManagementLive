<?php
  if(isset($_POST["createGame"])){
    $gameid = $db->createGame();

    header("Location: index.php?site=adminControls&game='$gameid'");
    exit;
  }
?>

