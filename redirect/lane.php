<?php
  $lane1 = $db->loadLane($_SESSION["Team"], 1);
  if($lane1 != false)
    $prod1 = $db->getProduction($lane1["MaschinenID"]);
  $money = $db->getLiquidFundsByTeamCode($_SESSION["Team"]);
?>
<div class="container-fluid">
  <?php
    if($lane1 == false)
    {
  ?>
  
      <p>Sie besitzen an dieser Position noch keine Maschine</p>
      <p>Möchten Sie eine neue für diese Lane kaufen ?</p>
      <form method="POST" action="index.php?site=laneLogic">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="flex" id="flex" <?php if($money < 5){echo 'disabled';}?>>
          <label class="form-check-label" for="flex">Flex-Maschine<?php if($money < 5){echo ' - nicht genug flüssige Mittel';}?></label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="conti" id="conti">
          <label class="form-check-label" for="flex">Conti-Maschine</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="power" id="power">
          <label class="form-check-label" for="flex">Power-Maschine</label>
        </div>
        <input type="submit" value="Bestellen" name="Submit">
      </form>

  <?php
    }
    else
    {
  ?>




  <?php
    }
  ?>

</div>
