<?php
  if(isset($_POST["buyMachine"])){

    $choice = 0;

    if(isset($_POST["radio"]))
    {
      switch($_POST["radio"])
      {
        case 'flex': $db->buyMachine("Flex", $_SESSION["Team"], 10, $_SESSION['whichLane']); break;
        case 'conti': $db->buyMachine("Conti", $_SESSION["Team"], 20, $_SESSION['whichLane']); break;
        case 'power': $db->buyMachine("Power", $_SESSION["Team"], 30, $_SESSION['whichLane']); break;
      }
    }
    
    if (isset($_SESSION['whichLane'])) 
    {
      header("Location: index.php?site=lane&lane={$_SESSION['whichLane']}");
      unset($_SESSION["whichLane"]);
      exit;
    }
  }

  
  if(isset($_POST["produce"])){

    $lane = $db->loadLane($_SESSION["Team"], $_SESSION['whichLane']);

    if(isset($_POST["radio"]))
    {
      switch($_POST["radio"])
      {
        case 'base': $db->startProduction($lane["MaschinenID"], "Base", $_POST["menge"], $_SESSION["Team"], $lane["Maschinentyp"]); break;
        case 'plus': $db->startProduction($lane["MaschinenID"], "Plus", $_POST["menge"], $_SESSION["Team"], $lane["Maschinentyp"]); break;
        case 'max': $db->startProduction($lane["MaschinenID"], "Max", $_POST["menge"], $_SESSION["Team"], $lane["Maschinentyp"]); break;
      }
    }

    if (isset($_SESSION['whichLane'])) 
    {
      header("Location: index.php?site=lane&lane={$_SESSION['whichLane']}");
      unset($_SESSION["whichLane"]);
      exit;
    }

  }

  if(isset($_POST["complete"])){
    $db->putToWarehouse($_SESSION["Team"], $_SESSION['whichLane']);

    if (isset($_SESSION['whichLane'])) 
    {
      header("Location: index.php?site=lane&lane={$_SESSION['whichLane']}");
      unset($_SESSION["whichLane"]);
      exit;
    }
  }

  if(isset($_POST["sell"])){
    $db->sellMachine($_SESSION["Team"], $_SESSION['whichLane'], $_POST["sellPrice"]);

    if (isset($_SESSION['whichLane'])) 
    {
      header("Location: index.php?site=lane&lane={$_SESSION['whichLane']}");
      unset($_SESSION["whichLane"]);
      exit;
    }
  }

?>

