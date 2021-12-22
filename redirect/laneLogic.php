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
        case 'base': $db->startProduction($lane["MaschinenID"], "Base", $_POST["menge"], 1, $_SESSION["Team"]); break; //quartal hardgecoded auf 1
        case 'plus': $db->startProduction($lane["MaschinenID"], "Plus", $_POST["menge"], 1, $_SESSION["Team"]); break;
        case 'max': $db->startProduction($lane["MaschinenID"], "Max", $_POST["menge"], 1, $_SESSION["Team"]); break;
      }
    }

    if (isset($_SESSION['whichLane'])) 
    {
      header("Location: index.php?site=lane&lane={$_SESSION['whichLane']}");
      unset($_SESSION["whichLane"]);
      exit;
    }

  }

?>

