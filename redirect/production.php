<?php
  $lane1 = $db->loadLane($_SESSION["Team"], 1);
  $lane2 = $db->loadLane($_SESSION["Team"], 2);
  $lane3 = $db->loadLane($_SESSION["Team"], 3);   
  $lane4 = $db->loadLane($_SESSION["Team"], 4);
  if($lane1 != false)
    $prod1 = $db->getProduction($lane1["MaschinenID"]);
  if($lane2 != false)
    $prod2 = $db->getProduction($lane2["MaschinenID"]);
  if($lane3 != false)
    $prod3 = $db->getProduction($lane3["MaschinenID"]);
  if($lane4 != false)
    $prod4 = $db->getProduction($lane4["MaschinenID"]);
?>
<div class="container-fluid">
  <a href="index.php?site=lane&lane=1">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Production Lane 1</h5>
          <h6 class="card-subtitle mb-2 text-muted">
          <?php
            if($lane1 == false)
              echo "EMPTY";
            else
              echo 'Maschine: ',$lane1["Maschinentyp"];
          ?>
          </h6>
          <?php
            if($lane1 != false)
            {
              echo '<p class="card-text">';
                if($prod1 == false)
                  echo "Waiting for assignment";
                else
                  echo $prod1["Anzahl"],' ', $prod1["Zielprodukt"],' - Currently in Production';
              echo '</p>';
            }
          ?>
        </div>
    </div>
  </a>
  <br>
  <a href="index.php?site=lane&lane=2">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Production Lane 2</h5>
          <h6 class="card-subtitle mb-2 text-muted">
          <?php
            if($lane2 == false)
              echo "EMPTY";
            else
              echo 'Maschine: ',$lane2["Maschinentyp"];
          ?>
          </h6>
          <?php
            if($lane2 != false)
            {
              echo '<p class="card-text">';
              if($prod2 == false)
                echo "Waiting for assignment";
              else
                echo $prod2["Anzahl"],' ', $prod2["Zielprodukt"],' - Currently in Production';
              echo '</p>';
            }
          ?>
        </div>
    </div>
  </a>
  <br>
  <a href="index.php?site=lane&lane=3">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Production Lane 3</h5>
          <h6 class="card-subtitle mb-2 text-muted">
          <?php
            if($lane3 == false)
              echo "EMPTY";
            else
              echo 'Maschine: ',$lane3["Maschinentyp"];
          ?>
          </h6>
          <?php
            if($lane3 != false)
            {
              echo '<p class="card-text">';
              if($prod3 == false)
                echo "Waiting for assignment";
              else
                echo $prod3["Anzahl"],' ', $prod3["Zielprodukt"],' - Currently in Production';
              echo '</p>';
            }
          ?>
        </div>
    </div>
  </a>
  <br>
  <a href="index.php?site=lane&lane=4">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Production Lane 4</h5>
          <h6 class="card-subtitle mb-2 text-muted">
          <?php
            if($lane4 == false)
              echo "EMPTY";
            else
              echo 'Maschine: ',$lane4["Maschinentyp"];
          ?>
          </h6>
          <?php
            if($lane4 != false)
            {
              echo '<p class="card-text">';
              if($prod4 == false)
                echo "Waiting for assignment";
              else
                echo $prod4["Anzahl"],' ', $prod4["Zielprodukt"],' - Currently in Production';
              echo '</p>';
            }
          ?>
        </div>
    </div>
  </a>