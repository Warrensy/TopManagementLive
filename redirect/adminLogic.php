<?php
  if(isset($_POST["createGame"])){
    $gameid = $db->createGame();

    header("Location: index.php?site=adminControls&game='$gameid'");
    exit;
  }

  if(isset($_POST["accept"])){
    $db->setActiveContracts($_SESSION["Game"]);

    header("Location: index.php?site=adminControls&game='$gameid'");
    exit;
  }
?>

