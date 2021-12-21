<?php
  $lane = $db->loadLane($_SESSION["Team"], $_GET["lane"]);
  if($lane != false)
    $prod = $db->getProduction($lane["MaschinenID"]);
  $money = $db->getLiquidFundsByTeamCode($_SESSION["Team"]);
  $_SESSION["whichLane"] = $_GET["lane"];
?>
<div class="container-fluid">
  <?php
    if($lane == false)
    {
    $disabled = 0;
  ?>
  
      <p>Sie besitzen an dieser Position noch keine Maschine</p>
      <p>Möchten Sie eine neue für diese Lane kaufen ?</p>
      <form method="POST" action="index.php?site=laneLogic" class="container">
          <input type="radio" name="radio" value="flex" id="flex" <?php if($money < 10){echo 'disabled'; $disabled++;}?>>
          <label for="flex" <?php if($money < 10){echo 'class="grey"';}?>>Flex-Maschine (Preis 10 M)<?php if($money < 10){echo ' - nicht genug flüssige Mittel';}?></label>
          <br>
          <input type="radio" name="radio" value="conti" id="conti" <?php if($money < 20){echo 'disabled'; $disabled++;}?>>
          <label for="conti" <?php if($money < 20){echo 'class="grey"';}?>>Conti-Maschine (Preis 20 M)<?php if($money < 20){echo ' - nicht genug flüssige Mittel';}?></label>
          <br>
          <input type="radio" name="radio" value="power" id="power" <?php if($money < 30){echo 'disabled'; $disabled++;}?>>
          <label for="power" <?php if($money < 30){echo 'class="grey"';}?>>Power-Maschine (Preis 30 M)<?php if($money < 30){echo ' - nicht genug flüssige Mittel';}?></label>
          <br>
          <input type="submit" value="Bestellen" name="buyMachine" <?php if($disabled == 3){echo 'disabled';}?>>
      </form>

  <?php
    }
    else
    {
      echo 'hier kommt die Produktion hin';
  ?>




  <?php
    }
  ?>



</div>

<!-- Fertigungskosten aus Handbuch auch beachtwen -->


