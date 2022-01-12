<?php
  if(isset($_POST["createGame"])){
    $gameid = $db->createGame();

    header("Location: index.php?site=adminControls&game='$gameid'");
    exit;
  }

  if(isset($_POST["accept"])){
    $db->setActiveContracts($_SESSION["Game"]);

    header("Location: index.php?site=adminControls&contracts='mischen'");
    exit;
  }
  if(isset($_POST["nextQuarter"])){
    $db->NextQuarter($_SESSION["Game"]);

    header("Location: index.php?site=adminControls&quartal='steigen'");
    exit;
  }
?>

