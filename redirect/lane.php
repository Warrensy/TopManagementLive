<?php
  $lane1 = $db->loadLane($_SESSION["Team"], 1);
  if($lane1 != false)
    $prod1 = $db->getProduction($lane1["MaschinenID"]);

?>
<div class="container-fluid">
  <?php
    if($lane1 == false)
    {
      echo "<p>Sie besitzen an dieser Position noch keine Maschine</p>";


    }
  ?>

</div>


<div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">Default radio </label>
</div>