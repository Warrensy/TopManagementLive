<?php
  $lane = $db->loadLane($_SESSION["Team"], $_GET["lane"]);
  if($lane != false)
    $prod = $db->getProduction($lane["MaschinenID"]);
  $money = $db->getLiquidFundsByTeamCode($_SESSION["Team"]);
  $_SESSION["whichLane"] = $_GET["lane"];
  $quartal = $db->getQuartalByTeam($_SESSION["Team"]);
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
        <input type="radio" required  name="radio" value="flex" id="flex" <?php if($money < 10){echo 'disabled'; $disabled++;}?>>
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
    else if($prod == false)
    {   
  ?>
    <p>Was möchten Sie an dieser Maschine produzieren?</p>
    <p>(Bitte stellen Sie eigenständig sicher, dass Sie genügend Material, bzw. Flüssige Mittel besitzen, um die gewünschte Produktion zu starten))</p>
    <form method="POST" action="index.php?site=laneLogic" class="container">
        <input type="radio" name="radio" value="base" id="baseRadio" required >
        <label for="baseRadio">Base - Produkt (1M pro Stück)</label>
        <br>
        <input type="radio" name="radio" value="plus" id="plusRadio">
        <label for="plusRadio">Plus - Produkt (2M pro Stück)</label>
        <br>
        <input type="radio" name="radio" value="max" id="maxRadio">
        <label for="maxRadio">Max - Produkt (3M pro Stück)</label>
        <br>
        <span>Menge:</span>
        <input type="number" min="0" placeholder="0" name="menge" required>
        <br>
        <br>
        <input type="submit" value="Produzieren" name="produce">
    </form>   


  <?php
    }
    else if ($quartal >= $prod["FertigstellungQuartal"])
    {
  ?>
    <p>Die Produktion ist fertig!</p>  
    <p>Es wurden <?php echo $prod["Anzahl"]; echo " Stück von Produkt "; echo $prod["Zielprodukt"];?> produziert</p> 
    <p>Drücken Sie den Knopf um die Produkte ins Produktlager zu schicken!</p>  
    <form method="POST" action="index.php?site=laneLogic" class="container">
        <input type="submit" value="Produktion fertigstellen" name="complete">
    </form> 

  <?php
    }
    else
    {
  ?>
    <p>Diese Maschine produziert derzeit!</p>  
    <p>Derzeit werden <?php echo $prod["Anzahl"]; echo " Stück von Produkt "; echo $prod["Zielprodukt"];?> produziert</p>  
    



  <?php
    }
  ?>

</div>

<!-- Fertigungskosten aus Handbuch auch beachtwen -->


