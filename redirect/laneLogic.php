<?php
  if(isset($_POST["buyMachine"])){

    $choice = 0;

    if(isset($_POST["radio"]))
    {
      switch($_POST["radio"])
      {
        case 'flex': $db->buyMachine("Flex", $_SESSION["Team"], 10, $_SESSION['whichLane']); break;
        case 'flex': $db->buyMachine("Conti", $_SESSION["Team"], 20, $_SESSION['whichLane']); break;
        case 'flex': $db->buyMachine("Power", $_SESSION["Team"], 30, $_SESSION['whichLane']); break;
      }
    }
    
    
    if (isset($_SESSION['whichLane'])) 
    {
      header("Location: index.php?site=lane&lane={$_SESSION['whichLane']}");
      unset($_SESSION["whichLane"]);
      exit;
    }
  }

  echo 'you bought a machine';

?>

