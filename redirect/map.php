</div>
</div>
<div class="modal fade" id="fluessigeMittelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <table class="table-dark table-bordered">
              <tr>
                <th class="tablepadding">Flüssige Mittel: </th>
                <td class="tablepadding">
                  <h5><?php echo $db->getLiquidFundsByTeamCode($_SESSION["Team"]) ?></h5>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="LieferungModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="container-fluid">
          <div class="container-fluid">
            <table class="center">
              <form method="POST" action="index.php?site=materialOrderLogic">
                <tr>
                  <h1 class="text-center">Material Bestellen</h1>
                </tr>
                <tr>
                  <b><label for="form-control">Base</label>
                    <input class="form-control" name="BaseOrder" value="0" type="" placeholder="0">
                </tr>
                <tr>
                  <b><label for="form-control">Plus</label>
                    <input class="form-control" name="PlusOrder" value="0" type="" placeholder="0">
                </tr>
                <tr>
                  <b><label for="form-control">Max</label>
                    <input class="form-control" name="MaxOrder" value="0" type="" placeholder="0" min="2">
                </tr>
                <br>
                <tr>
                  <td><input type="submit" class="btn btn-success" value="Bestellen" name="Speichern" ID="Speichern"></td>
                </tr>
                <br>
                <tr>
                  <td><input type="submit" class="btn btn-success" value="Material Annehmen" name="materialAccept" ID="materialAccept"></td>
                </tr>
              </form>
            </table>
          </div>

          <br>
          <p>[ACHTUNG]: Bitte das Material der alten Bestellung annehmen, bevor eine neue aufgegeben wird!</p>

          <?php
          if (isset($_GET['materialAdded']) && $_GET['materialAdded'] == "true") {
            echo "<div class='alert alert-light' role='alert'>Material wurde im Lager aufgenommen</div>";
          }
          ?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="MaterialLagerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="row justify-content-center">
                <h1>Materiallager</h1>
            </div>
            <br>
            <div class="row justify-content-center">
            <?php $rawMaterial = $db->getRawMaterial($_SESSION["Team"])?>
                <table class="table-striped table-dark table-bordered">
                    <tr>
                        <th class="tablepadding">Base</th>
                        <td class="tablepadding">
                            <h6 class="text-center">Lagernd</h6>
                            <h5 class="text-center"><?php echo $rawMaterial["RohBase"] ?></h6></h5>
                        </td>
                        <td class="tablepadding">
                            <h6 class="text-center">Wert in M</h6>
                            <h5 class="text-center"><?php echo $rawMaterial["RohBase"]*2 ?></h6></h5>
                        </td>
                        <td class="tablepadding">
                            <h6 class="text-center">Bestellt</h6>
                            <h5 class="text-center"><?php echo $rawMaterial["AusstehendRohBase"] ?></h5>
                        </td>
                    </tr>
                    <tr>
                        <th class="tablepadding">Plus</th>
                        <td class="tablepadding">
                            <h6 class="text-center">Lagernd</h6>
                            <h5 class="text-center"><?php echo $rawMaterial["RohPlus"] ?></h5>
                        </td>
                        <td class="tablepadding">
                            <h6 class="text-center">Wert in M</h6>
                            <h5 class="text-center"><?php echo $rawMaterial["RohPlus"]*3 ?></h6></h5>
                        </td>
                        <td class="tablepadding">
                            <h6 class="text-center">Bestellt</h6>
                            <h5 class="text-center"><?php echo $rawMaterial["AusstehendRohPlus"] ?></h5>
                        </td>
                    </tr>
                    <tr>
                        <th class="tablepadding">Max</th>
                        <td class="tablepadding">
                            <h6 class="text-center">Lagernd</h6>
                            <h5 class="text-center"><?php echo $rawMaterial["RohMax"] ?></h5>
                        </td>
                        <td class="tablepadding">
                            <h6 class="text-center">Wert in M</h6>
                            <h5 class="text-center"><?php echo $rawMaterial["RohMax"]*4 ?></h6></h5>
                        </td>
                        <td class="tablepadding">
                            <h6 class="text-center">Bestellt</h6>
                            <h5 class="text-center"><?php echo $rawMaterial["AusstehendRohMax"] ?></h5>
                        </td>
                    </tr>
                </table>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="ProduktLagerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="container-fluid">  
      <div class="row justify-content-center">
          <h1>Fertigwarenlager</h1>
      </div>
      <div class="row justify-content-center">
      <?php $products = $db->getProducts($_SESSION["Team"])?>
          <table class="table-striped table-dark table-bordered">
              <tr>
                  <th class="tablepadding">Base</th>
                  <td class="tablepadding"><h5><b><?php echo $products["Base"] ?></b></h5></td>
              </tr>
              <tr>
                  <th class="tablepadding">Plus</th>
                  <td class="tablepadding"><h5><b><?php echo $products["Plus"] ?></b></h5></td>
              </tr>
              <tr>
                  <th class="tablepadding">Max</th>
                  <td class="tablepadding"><h5><b><?php echo $products["Max"] ?></b></h5></td>
              </tr>
          </table>
      </div>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="ForderungModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="container-fluid">
            <?php 
                $contracts = $db->getContractsByTeamCode($_SESSION["Team"]); 
                $activeoffers = $db->getActiveOffersByTeamCode($_SESSION["Team"]); 
            ?>

            <?php
                if(isset($_POST["continue"]) && $_POST["continue"] == 1){
                    $teamcode = $_SESSION["Team"];

                    $db->continueClaims($teamcode, $contracts, $activeoffers);
                    // header('Location: index.php?site=claim');
                }

                while($contract = $contracts->fetch_array()) {
            ?>

            <div class="justify-content-center">
                <div class="row">
                    <div class ="col-1"></div>
                    <div class ="col-10 border-all">
                        <div class="row background-row1 row-height">
                            <div class="col-7">Preis:</div>
                            <div class="col"><?php echo $contract["Preis"] ?>M</div>
                        </div>
                        <div class="row background-row2 row-height">
                            <div class="col-7">Zahlungsziel:</div>
                            <div class="col"><?php echo $contract["FinalZahlungsziel"] ?> Tage</div>
                        </div>
                    </div>       
                </div>
            </div>
            <br>
            <?php } 
                
                while($activeoffer = $activeoffers->fetch_array()) {
            ?>
            <div class="justify-content-center">
                <div class="row">
                    <div class ="col-1"></div>
                    <div class ="col-10 border-all">
                        <div class="row background-row1 row-height">
                            <div class="col-7">Preis:</div>
                            <div class="col"><?php echo $activeoffer["Preis"] ?>M</div>
                        </div>
                        <div class="row background-row2 row-height">
                            <div class="col-7">Zahlungsziel:</div>
                            <div class="col"><?php echo $activeoffer["Zahlungsziel"] ?> Tage</div>
                        </div>
                    </div>       
                </div>
            </div>
            <br>
            <?php } ?>

            <form method="POST" action="index.php?site=map&continue=1">
                <div class ="row">
                    <div class="col-3"></div>
                    <div class="col-6">
                        <div class="row row-height">
                            <button class="col btn btn-success" type="submit" value="1" name ="continue" ID = "continue">Forderungen Vorrücken</button>
                        </div>
                    </div>
                </div>
            </form>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="svg-wrapper">
  <svg viewBox="0 0 2054 1255" width="100%" height="100%" preserveAspectRatio="none">
    <defs>
      <style>
        circle:hover {
          fill: white;
          opacity: 0.5;
        }
      </style>
    </defs>

    <!-- <a xlink:href="https://de.wikipedia.org/wiki/George_Washington">
            <rect x="800" y="800" opacity="1" width="50" height="50" />
          </a> -->
    <a data-toggle="modal" data-target="#LieferungModal">
      <circle cx="512" cy="924" r="40" opacity="0" />
    </a>
    <a data-toggle="modal" data-target="#LieferungModal">
      <circle cx="633" cy="853" r="40" opacity="0" />
    </a>
    <a data-toggle="modal" data-target="#LieferungModal">
      <circle cx="747" cy="883" r="40" opacity="0" />
    </a>
    <a data-toggle="modal" data-target="#fluessigeMittelModal">
      <circle cx="715" cy="1050" r="40" opacity="0" />
    </a>

    <!-- Materiallager Top-Down-->
    <a data-toggle="modal" data-target="#MaterialLagerModal">
      <circle cx="532" cy="302" r="30" opacity="0" />
    </a>
    <a data-toggle="modal" data-target="#MaterialLagerModal">
      <circle cx="585" cy="285" r="30" opacity="0" />
    </a>
    <a data-toggle="modal" data-target="#MaterialLagerModal">
      <circle cx="550" cy="445" r="30" opacity="0" />
    </a>
    <a data-toggle="modal" data-target="#MaterialLagerModal">
      <circle cx="604" cy="431" r="30" opacity="0" />
    </a>
    <a data-toggle="modal" data-target="#MaterialLagerModal">
      <circle cx="572" cy="580" r="30" opacity="0" />
    </a>
    <a data-toggle="modal" data-target="#MaterialLagerModal">
      <circle cx="625" cy="567" r="30" opacity="0" />
    </a>
    <!-- Production Lanes Top-Down -->
    <a xlink:href="index.php?site=production">
      <circle cx="1150" cy="220" r="40" opacity="0" />
    </a>
    <a xlink:href="index.php?site=production">
      <circle cx="1150" cy="330" r="40" opacity="0" />
    </a>
    <a xlink:href="index.php?site=production">
      <circle cx="1140" cy="440" r="40" opacity="0" />
    </a>
    <a xlink:href="index.php?site=production">
      <circle cx="1135" cy="555" r="40" opacity="0" />
    </a>
    <!--Fertigwarenlager-->
    <a data-toggle="modal" data-target="#ProduktLagerModal">
      <circle cx="1440" cy="335" r="40" opacity="0" />
    </a>
    <a data-toggle="modal" data-target="#ProduktLagerModal">
      <circle cx="1420" cy="470" r="40" opacity="0" />
    </a>
    <a data-toggle="modal" data-target="#ProduktLagerModal">
      <circle cx="1400" cy="610" r="40" opacity="0" />
    </a>
    <!--Forderungen left-right-->
    <a data-toggle="modal" data-target="#ForderungModal">
      <circle cx="960" cy="1075" r="40" opacity="0" />
    </a>
    <a data-toggle="modal" data-target="#ForderungModal">
      <circle cx="1050" cy="1090" r="40" opacity="0" />
    </a>
    <a data-toggle="modal" data-target="#ForderungModal">
      <circle cx="1140" cy="1080" r="40" opacity="0" />
    </a>
    <a data-toggle="modal" data-target="#ForderungModal">
      <circle cx="1220" cy="1065" r="40" opacity="0" />
    </a>
    <!--Back-->
    <a xlink:href="index.php?site=index">
      <circle cx="75" cy="175" r="40" opacity="0" />
    </a>
    <!--GuV-->
    <a xlink:href="index.php?site=profitAndLoss">
      <rect x="265" y="380" width="60" height="40" opacity="0" />
    </a>
    <a xlink:href="index.php?site=profitAndLoss">
      <rect x="265" y="430" width="60" height="40" opacity="0" />
    </a>
    <a xlink:href="index.php?site=profitAndLoss">
      <rect x="265" y="480" width="60" height="40" opacity="0" />
    </a>
    <a xlink:href="index.php?site=profitAndLoss">
      <rect x="265" y="530" width="60" height="40" opacity="0" />
    </a>
    <a xlink:href="index.php?site=profitAndLoss">
      <rect x="265" y="580" width="60" height="40" opacity="0" />
    </a>
    <a xlink:href="index.php?site=profitAndLoss">
      <rect x="265" y="630" width="60" height="40" opacity="0" />
    </a>
    <a xlink:href="index.php?site=profitAndLoss">
      <rect x="265" y="680" width="60" height="40" opacity="0" />
    </a>
    <a xlink:href="index.php?site=profitAndLoss">
      <rect x="265" y="825" width="60" height="40" opacity="0" />
    </a>
    <a xlink:href="index.php?site=profitAndLoss">
      <rect x="265" y="875" width="60" height="40" opacity="0" />
    </a>
    <a xlink:href="index.php?site=profitAndLoss">
      <rect x="265" y="1005" width="60" height="40" opacity="0" />
    </a>
    <a xlink:href="index.php?site=profitAndLoss">
      <rect x="265" y="1085" width="60" height="40" opacity="0" />
    </a>
  </svg>
  <script>
    var myGamePiece;
    var myObstacles = [];
    var myScore;
    const img = new Image(1, 1);
    img.src = "img/map.png";

    var canvas = document.createElement("canvas");
    var context = canvas.getContext("2d");
    var backcontext = canvas.getContext("2d");

    function start() {
      console.log(canvas);
      setupCanvas();
      loadImages(); 
    }

    function loadImages2() {
      <?php
        
        $result = $db->getMachinesByTeamId($_SESSION["Team"]);

        if ($result != false) {

          while ($res = $result->fetch_array()) {

            switch ($res["lane"]) {
              case 1:
              ?>
                context.drawImage(<?php echo $res["Maschinentyp"]?>, 805, 170, 280, 85);
              <?php
                break;
              case 2:
              ?>
                context.drawImage(<?php echo $res["Maschinentyp"]?>, 805, 282, 280, 85);
              <?php
                break;
              case 3:
              ?>
                context.drawImage(<?php echo $res["Maschinentyp"]?>, 805, 400, 280, 85);
              <?php
                break;
              case 4:
              ?>
                context.drawImage(<?php echo $res["Maschinentyp"]?>, 805, 515, 280, 85);
        <?php
                break;
            }
          }
        }
        
        ?>
    }
      
      function loadImages() {
        
        Conti = new Image(1000, 1000);
        Conti.src = "img/machine_Conti.png";
        Flex = new Image(1000, 1000);
        Flex.src = "img/machine_Flex.png";
        Power = new Image(1000, 1000);
        Power.src = "img/machine_Power.png";
        Power.onload = function() {
          loadImages2();
          setupMachineContent();
          highlightSetup();
        }    
    }

    function setupCanvas() {

      canvas.width = img.naturalWidth;
      canvas.height = img.naturalHeight;
      document.body.insertBefore(canvas, document.body.childNodes[0]);
      frameNo = 0;
      //interval = setInterval(updateGameArea, 20);
      context.drawImage(img, 0, 0);
      backcontext.drawImage(img, 0, 0);
      //context.fillStyle = 'green';
      context.lineWidth = 5;
      context.strokeStyle = '#003300';
      context.font = "20px Arial";

      backcontext.lineWidth = 5;
      backcontext.strokeStyle = '#003300';
      backcontext.font = "20px Arial";

      backcontext.fillStyle = 'red';
      backcontext.beginPath();
      backcontext.arc(75, 175, 35, 0, 2 * Math.PI);
      backcontext.fill();
      backcontext.stroke();
      backcontext.fillStyle = 'black';
      backcontext.fillText("Back", 75 - 22, 175 + 6);
      //Fluessige Mittel
      circleMaker(context, 715, 1050, "liquidFunds", "green");
      //Lieferung
      circleMaker(context, 514, 924, "pendingMaterialsPlus", "green");
      circleMaker(context, 633, 853, "pendingMaterialsMax", "green");
      circleMaker(context, 747, 883, "pendingMaterialsBase", "green");
      //Materiallager Top-Down
      circleMakerSmol(context, 532, 302, "rawMax", "steelblue");
      circleMakerSmol(context, 585, 285, "rawMaxMVal", "green");
      circleMakerSmol(context, 550, 445, "rawPlus", "steelblue");
      circleMakerSmol(context, 604, 431, "rawPlusMVal", "green");
      circleMakerSmol(context, 572, 580, "rawBase", "steelblue");
      circleMakerSmol(context, 625, 567, "rawBaseMVal", "green");
      //Production lanes top-down
      circleMaker(context, 1150, 220, "lane1", "steelblue");
      circleMaker(context, 1150, 330, "lane2", "steelblue");
      circleMaker(context, 1140, 440, "lane3", "steelblue");
      circleMaker(context, 1135, 555, "lane4", "steelblue");
      //Fertigwarenlager top-down
      circleMaker(context, 1440, 335, "productMax", "steelblue");
      circleMaker(context, 1420, 470, "productPlus", "steelblue");
      circleMaker(context, 1400, 610, "productBase", "steelblue");
      //Forderungen left-right
      circleMaker(context, 960, 1075, "claims90", "green");
      circleMaker(context, 1050, 1090, "claims180", "green");
      circleMaker(context, 1140, 1080, "claims270", "green");
      circleMaker(context, 1220, 1065, "claims360", "green");
      //GuV top-down
      rectangleMaker(context, 265, 380, "sales", "lightblue");
      rectangleMaker(context, 265, 430, "productionCost", "lightblue");
      rectangleMaker(context, 265, 480, "grossResult", "green");
      rectangleMaker(context, 265, 530, "r&d", "lightblue");
      rectangleMaker(context, 265, 580, "management", "lightblue");
      rectangleMaker(context, 265, 630, "marketing", "lightblue");
      rectangleMaker(context, 265, 680, "otherExpenses", "lightblue");
      rectangleMaker(context, 265, 825, "depreciation", "lightblue");
      rectangleMaker(context, 265, 875, "operatingResult", "green");
      rectangleMaker(context, 265, 1005, "taxes", "lightblue");
      rectangleMaker(context, 265, 1085, "resultWithTaxes", "red");
    }

    function productionHiglight(context, x, y) {
      context.fillStyle = "black"; 
      context.beginPath();
      context.rect(x, y, 52, 25);
      context.stroke();
    }

    function highlightSetup() {
      <?php
      $production = $db->getCurrentProductionByTeamCode($_SESSION["Team"]);
      
      if ($production != false) {
        while ($xyz = $production->fetch_array()) {
          switch ($xyz["lane"]) {
            case 1:
              if($xyz["Zielprodukt"] == "Base")
              {
                ?>
                productionHiglight(context, 808, 172);
                <?php
              }
              if($xyz["Zielprodukt"] == "Max")
              {
                ?>
                productionHiglight(context, 808, 200);
                <?php
              }
              if($xyz["Zielprodukt"] == "Plus")
              {
                ?>
                productionHiglight(context, 808, 228);
                <?php
              }
              break;
            case 2:
              if($xyz['Zielprodukt'] == "Base" )
              {
                ?>
                productionHiglight(context, 808, 285);
                <?php
              }
              if($xyz['Zielprodukt'] == "Max")
              {
                ?>
                productionHiglight(context, 808, 313);
                <?php
              }
              if($xyz['Zielprodukt'] == "Plus")
              {
                ?>
                productionHiglight(context, 808, 341);
                <?php
              }
              break;
              case 3:
                if($xyz['Zielprodukt'] == "Base" )
                {
                ?>
                productionHiglight(context, 808, 402);
                <?php
              }
              if($xyz['Zielprodukt'] == "Max")
              {
                ?>
                productionHiglight(context, 808, 430);
                <?php
              }
              if($xyz['Zielprodukt'] == "Plus")
              {
                ?>
                productionHiglight(context, 808, 458);
                <?php
              }
              break;
            case 4:
              if($xyz['Zielprodukt'] == "Base" )
              {
                ?>
                productionHiglight(context, 808, 519);
                <?php
              }
              if($xyz['Zielprodukt'] == "Max")
              {
                ?>
                productionHiglight(context, 808, 547);
                <?php
              }
              if($xyz['Zielprodukt'] == "Plus")
              {
                ?>
                productionHiglight(context, 808, 575);
                <?php
              }
              break;
          }
        }
      }
      ?>
    }

    function clear() {
      context.clearRect(0, 0, canvas.width, canvas.height);
    }

    function setupMachineContent() {
      <?php
      $production = $db->getCurrentProductionByTeamCode($_SESSION["Team"]);
      if ($production != false) {

        while ($xyz = $production->fetch_array()) {

          switch ($xyz["lane"]) {
            case 1:
              if($xyz["Maschinentyp"] == "Power" && $xyz["Anzahl"] > 1) {
                if($xyz["Anzahl"] % 2 == 0) {
                  $leftval = $xyz["Anzahl"] / 2; 
                  $rightval = $leftval;
                } else {
                  $leftval = ($xyz["Anzahl"] / 2) + 0.5; 
                  $rightval = $leftval - 1;
                }
                ?>
                machineCircleMaker(context, 985, 217, <?php echo $leftval ?>);
                machineCircleMaker(context, 1050, 217, <?php echo $rightval ?>);
              <?php
              } else if($xyz["Maschinentyp"] == "Flex") {
                
                $remainingqs = $xyz["FertigstellungQuartal"] - $db->getQuartalByTeam($_SESSION["Team"]); 
                
                if($remainingqs == 1) {
                  ?>
                  machineCircleMaker(context, 1050, 217, <?php echo $xyz["Anzahl"] ?>);
                  <?php
                } else {
                  ?>
                  machineCircleMaker(context, 985, 217, <?php echo $xyz["Anzahl"] ?>);
                  <?php
                }
              } else {
                ?>
                machineCircleMaker(context, 1050, 217, <?php echo $xyz["Anzahl"] ?>);
                <?php
              }
              break;
            case 2:
              if($xyz["Maschinentyp"] == "Power" && $xyz["Anzahl"] > 1) {
                if($xyz["Anzahl"] % 2 == 0) {
                  $leftval = $xyz["Anzahl"] / 2; 
                  $rightval = $leftval;
                } else {
                  $leftval = ($xyz["Anzahl"] / 2) + 0.5; 
                  $rightval = $leftval - 1;
                }
                ?>
                machineCircleMaker(context, 985, 330, <?php echo $leftval ?>);
                machineCircleMaker(context, 1050, 330, <?php echo $rightval ?>);
              <?php
              } else if($xyz["Maschinentyp"] == "Flex") {
                
                $remainingqs = $xyz["FertigstellungQuartal"] - $db->getQuartalByTeam($_SESSION["Team"]); 
                
                if($remainingqs == 1) {
                  ?>
                  machineCircleMaker(context, 1050, 330, <?php echo $xyz["Anzahl"] ?>);
                  <?php
                } else {
                  ?>
                  machineCircleMaker(context, 985, 330, <?php echo $xyz["Anzahl"] ?>);
                  <?php
                }
              } else {
                ?>
                machineCircleMaker(context, 1050, 330, <?php echo $xyz["Anzahl"] ?>);
                <?php
              }
              break;
            case 3:
              if($xyz["Maschinentyp"] == "Power" && $xyz["Anzahl"] > 1) {
                if($xyz["Anzahl"] % 2 == 0) {
                  $leftval = $xyz["Anzahl"] / 2; 
                  $rightval = $leftval;
                } else {
                  $leftval = ($xyz["Anzahl"] / 2) + 0.5; 
                  $rightval = $leftval - 1;
                }
                ?>
                machineCircleMaker(context, 985, 447, <?php echo $leftval ?>);
                machineCircleMaker(context, 1050, 447, <?php echo $rightval ?>);
              <?php
              } else if($xyz["Maschinentyp"] == "Flex") {
                
                $remainingqs = $xyz["FertigstellungQuartal"] - $db->getQuartalByTeam($_SESSION["Team"]); 
                
                if($remainingqs == 1) {
                  ?>
                  machineCircleMaker(context, 1050, 447, <?php echo $xyz["Anzahl"] ?>);
                  <?php
                } else {
                  ?>
                  machineCircleMaker(context, 985, 447, <?php echo $xyz["Anzahl"] ?>);
                  <?php
                }
              } else {
                ?>
                machineCircleMaker(context, 1050, 447, <?php echo $xyz["Anzahl"] ?>);
                <?php
              }
              break;
            case 4:
              if($xyz["Maschinentyp"] == "Power" && $xyz["Anzahl"] > 1) {
                if($xyz["Anzahl"] % 2 == 0) {
                  $leftval = $xyz["Anzahl"] / 2; 
                  $rightval = $leftval;
                } else {
                  $leftval = ($xyz["Anzahl"] / 2) + 0.5; 
                  $rightval = $leftval - 1;
                }
                ?>
                machineCircleMaker(context, 985, 561, <?php echo $leftval ?>);
                machineCircleMaker(context, 1050, 561, <?php echo $rightval ?>);
              <?php
              } else if($xyz["Maschinentyp"] == "Flex") {
                
                $remainingqs = $xyz["FertigstellungQuartal"] - $db->getQuartalByTeam($_SESSION["Team"]); 
                
                if($remainingqs == 1) {
                  ?>
                  machineCircleMaker(context, 1050, 561, <?php echo $xyz["Anzahl"] ?>);
                  <?php
                } else {
                  ?>
                  machineCircleMaker(context, 985, 561, <?php echo $xyz["Anzahl"] ?>);
                  <?php
                }
              } else {
                ?>
                machineCircleMaker(context, 1050, 561, <?php echo $xyz["Anzahl"] ?>);
                <?php
              }
              break;
          }
        }
      }
      ?>
    }

    function machineCircleMaker(context, x, y, num) {
      context.beginPath();
      context.arc(x, y, 15, 0, 2 * Math.PI);

      number = num;
      offsetX = number.toString().length * 5.5;
      context.fillText(number, x - offsetX, y + 6);
    }

    function circleMaker(context, x, y, name, color) {
      context.fillStyle = color;
      context.beginPath();
      context.arc(x, y, 35, 0, 2 * Math.PI);
      context.fill();
      context.stroke();

      context.fillStyle = 'black';
      number = getNumber(name);
      offsetX = number.toString().length * 5.5;
      context.fillText(number, x - offsetX, y + 6);
    }

    function rectangleMaker(context, x, y, name, color){
      context.fillStyle = color;
      context.beginPath();
      context.rect(x, y, 60, 40);
      context.fill();
      context.stroke();

      context.fillStyle = 'black';
      number = getNumber(name);
      offsetX = number.toString().length;
      context.fillText(number, x + offsetX + 12.5, y + 27.5);
    }

    function circleMakerSmol(context, x, y, name, color) {
      context.fillStyle = color;
      context.beginPath();
      context.arc(x, y, 25, 0, 2 * Math.PI);
      context.fill();
      context.stroke();

      context.fillStyle = 'black';
      number = getNumber(name);
      offsetX = number.toString().length * 5.5;
      context.fillText(number, x - offsetX, y + 6);
    }

    function getNumber(x) {
      number = 0;

      switch (x) {
        case "liquidFunds":
          number = <?php echo $db->getLiquidFundsByTeamCode($_SESSION["Team"]) ?>;
          break;
        case "rawMax":
          number = <?php echo $db->getRawMaterial($_SESSION["Team"])["RohMax"] ?>;
          break;
        case "rawMaxMVal":
          number = <?php echo $db->getRawMaterial($_SESSION["Team"])["RohMax"] * 4 ?>;
          break;
        case "rawPlus":
          number = <?php echo $db->getRawMaterial($_SESSION["Team"])["RohPlus"] ?>;
          break;
        case "rawPlusMVal":
          number = <?php echo $db->getRawMaterial($_SESSION["Team"])["RohPlus"] * 3 ?>;
          break;
        case "rawBase":
          number = <?php echo $db->getRawMaterial($_SESSION["Team"])["RohBase"] ?>;
          break;
        case "rawBaseMVal":
          number = <?php echo $db->getRawMaterial($_SESSION["Team"])["RohBase"] * 2 ?>;
          break;
        case "productMax":
          number = <?php echo $db->getProducts($_SESSION["Team"])["Max"] ?>;
          break;
        case "productPlus":
          number = <?php echo $db->getProducts($_SESSION["Team"])["Plus"] ?>;
          break;
        case "productBase":
          number = <?php echo $db->getProducts($_SESSION["Team"])["Base"] ?>;
          break;
        case "pendingMaterialsBase":
          <?php
          $allMaterials = $db->getRawMaterial($_SESSION["Team"]); ?>
          number = <?php echo (int)$allMaterials["AusstehendRohBase"] ?>;
          break;
        case "pendingMaterialsMax":
          <?php
          $allMaterials = $db->getRawMaterial($_SESSION["Team"]); ?>
          number = <?php echo (int)$allMaterials["AusstehendRohMax"] ?>;
          break;
        case "pendingMaterialsPlus":
          <?php
          $allMaterials = $db->getRawMaterial($_SESSION["Team"]); ?>
          number = <?php echo (int)$allMaterials["AusstehendRohPlus"] ?>;
          break;
        case "claims90":
          <?php
          $claims90 = 0;
          $activeoffers = $db->getActiveOffersByTeamCode($_SESSION["Team"]);
          while ($activeoffer = $activeoffers->fetch_array()) {
            if ((int)$activeoffer["Zahlungsziel"] == 90) {
              $claims90 += (int)$activeoffer["Preis"];
            }
          } ?>
          number = <?php echo $claims90 ?>;
          break;
        case "claims180":
          <?php
          $claims180 = 0;
          $activeoffers = $db->getActiveOffersByTeamCode($_SESSION["Team"]);
          while ($activeoffer = $activeoffers->fetch_array()) {
            if ((int)$activeoffer["Zahlungsziel"] == 180) {
              $claims180 += (int)$activeoffer["Preis"];
            }
          } ?>
          number = <?php echo $claims180 ?>;
          break;
        case "claims270":
          <?php
          $claims270 = 0;
          $activeoffers = $db->getActiveOffersByTeamCode($_SESSION["Team"]);
          while ($activeoffer = $activeoffers->fetch_array()) {
            if ((int)$activeoffer["Zahlungsziel"] == 270) {
              $claims270 += (int)$activeoffer["Preis"];
            }
          } ?>
          number = <?php echo $claims270 ?>;
          break;
        case "claims360":
          <?php
          $claims360 = 0;
          $activeoffers = $db->getActiveOffersByTeamCode($_SESSION["Team"]);
          while ($activeoffer = $activeoffers->fetch_array()) {
            if ((int)$activeoffer["Zahlungsziel"] == 360) {
              $claims360 += (int)$activeoffer["Preis"];
            }
          } ?>
          number = <?php echo $claims360 ?>;
          break;
        case "lane1":
          <?php
          $lane1 = $db->loadLane($_SESSION["Team"], 1);
          if ($lane1 != false) {
            $prod1 = $db->getProduction($lane1["MaschinenID"]);
            if ($prod1 != false) {
          ?>number = <?php echo $prod1["Anzahl"] ?>;
      <?php }
          } ?>
      break;
      case "lane2":
        <?php
        $lane2 = $db->loadLane($_SESSION["Team"], 2);
        if ($lane2 != false) {
          $prod2 = $db->getProduction($lane2["MaschinenID"]);
          if ($prod2 != false) {
        ?>number = <?php echo $prod2["Anzahl"] ?>;
      <?php }
        } ?>
      break;
      case "lane3":
        <?php
        $lane3 = $db->loadLane($_SESSION["Team"], 3);
        if ($lane3 != false) {
          $prod3 = $db->getProduction($lane3["MaschinenID"]);
          if ($prod3 != false) {
        ?>number = <?php echo $prod3["Anzahl"] ?>;
      <?php }
        } ?>
      break;
      case "lane4":
        <?php
        $lane4 = $db->loadLane($_SESSION["Team"], 4);
        if ($lane4 != false) {
          $prod4 = $db->getProduction($lane4["MaschinenID"]);
          if ($prod4 != false) {
        ?>number = <?php echo $prod4["Anzahl"] ?>;
      <?php }
        } ?>
      break;
      case "sales":
          <?php
          $guv = $db->getOneGuvEntryByTeam($_SESSION["Team"]);
          if($guv != false){?>
            number = <?php echo (int)$guv["umsatzerloese"] ?>;
          <?php
          }
          ?>
          break;
      case "productionCost":
        <?php
        $guv = $db->getOneGuvEntryByTeam($_SESSION["Team"]);
        if($guv != false){?>
          number = <?php echo (int)$guv["herstellungskosten"] ?>;
        <?php
        }
        ?>
        break;
      case "r&d":
        <?php
        $guv = $db->getOneGuvEntryByTeam($_SESSION["Team"]);
        if($guv != false){?>
          number = <?php echo (int)$guv["forschungundentwicklung"] ?>;
        <?php
        }
        ?>
        break;
      case "management":
        <?php
        $guv = $db->getOneGuvEntryByTeam($_SESSION["Team"]);
        if($guv != false){?>
          number = <?php echo (int)$guv["verwaltung"] ?>;
        <?php
        }
        ?>
        break;
      case "marketing":
        <?php
        $guv = $db->getOneGuvEntryByTeam($_SESSION["Team"]);
        if($guv != false){?>
          number = <?php echo (int)$guv["marketingundvertrieb"] ?>;
        <?php
        }
        ?>
        break;
      case "otherExpenses":
        <?php
        $guv = $db->getOneGuvEntryByTeam($_SESSION["Team"]);
        if($guv != false){?>
          number = <?php echo (int)$guv["sonstigeertraege"] ?>;
        <?php
        }
        ?>
        break;
      case "depreciation":
        <?php
        $guv = $db->getOneGuvEntryByTeam($_SESSION["Team"]);
        if($guv != false){?>
          number = <?php echo (int)$guv["abschreibung"] ?>;
        <?php
        }
        ?>
        break;
      case "grossResult":
        <?php
        $guv = $db->getOneGuvEntryByTeam($_SESSION["Team"]);
        if($guv != false){?>
          number = <?php echo (int)$guv["bruttoergebnis"] ?>;
        <?php
        }
        ?>
        break;
      case "operatingResult":
        <?php
        $guv = $db->getOneGuvEntryByTeam($_SESSION["Team"]);
        if($guv != false){?>
          number = <?php echo (int)$guv["betriebsergebnis"] ?>;
        <?php
        }
        ?>
        break;
      case "taxes":
        <?php
        $guv = $db->getOneGuvEntryByTeam($_SESSION["Team"]);
        if($guv != false){?>
          number = <?php echo (int)$guv["steuern"] ?>;
        <?php
        }
        ?>
        break;
      case "resultWithTaxes":
        <?php
        $guv = $db->getOneGuvEntryByTeam($_SESSION["Team"]);
        if($guv != false){?>
          number = <?php echo (int)$guv["ergebnisnachsteuern"] ?>;
        <?php
        }
        ?>
        break;
      default:
        break;
      }

      return number;
    }
  </script>
  <br>
</div>
<div class="container-fluid">
  <div class="container">