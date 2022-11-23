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
          <a xlink:href="index.php?site=materialOrder">
      <circle cx="635" cy="845" r="40" opacity="0" />
    </a>
    <a xlink:href="index.php?site=liquidFunds">
      <circle cx="715" cy="1050" r="40" opacity="0" />
    </a>
    <!-- Materiallager Top-Down-->
    <a xlink:href="index.php?site=rawMaterialWarehouse">
      <circle cx="550" cy="295" r="40" opacity="0" />
    </a>
    <a xlink:href="index.php?site=rawMaterialWarehouse">
      <circle cx="570" cy="440" r="40" opacity="0" />
    </a>
    <a xlink:href="index.php?site=rawMaterialWarehouse">
      <circle cx="590" cy="580" r="40" opacity="0" />
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
    <a xlink:href="index.php?site=productWarehouse">
      <circle cx="1440" cy="335" r="40" opacity="0" />
    </a>
    <a xlink:href="index.php?site=productWarehouse">
      <circle cx="1420" cy="470" r="40" opacity="0" />
    </a>
    <a xlink:href="index.php?site=productWarehouse">
      <circle cx="1400" cy="610" r="40" opacity="0" />
    </a>
    <!--Forderungen left-right-->
    <a xlink:href="index.php?site=claim">
      <circle cx="960" cy="1075" r="40" opacity="0" />
    </a>
    <a xlink:href="index.php?site=claim">
      <circle cx="1050" cy="1090" r="40" opacity="0" />
    </a>
    <a xlink:href="index.php?site=claim">
      <circle cx="1140" cy="1080" r="40" opacity="0" />
    </a>
    <a xlink:href="index.php?site=claim">
      <circle cx="1220" cy="1065" r="40" opacity="0" />
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
      function start() {
        console.log(canvas);
        setupCanvas();
      }


      function setupCanvas() {


        canvas.width = img.naturalWidth;
        canvas.height = img.naturalHeight;
        document.body.insertBefore(canvas, document.body.childNodes[0]);
        frameNo = 0;
        //interval = setInterval(updateGameArea, 20);
        context.drawImage(img, 0, 0);
        //context.fillStyle = 'green';
        context.lineWidth = 5;
        context.strokeStyle = '#003300';
        context.font = "20px Arial";
        //Fluessige Mittel
        circleMaker(context, 715, 1050, "liquidFunds");
        //Lieferung
        circleMaker(context, 635, 845, "pendingMaterials");
        //Materiallager Top-Down
        circleMaker(context, 550, 295, "rawMax");
        circleMaker(context, 570, 440, "rawPlus");
        circleMaker(context, 590, 580, "rawBase");
        //Production lanes top-down
        circleMaker(context, 1150, 220, "lane1");
        circleMaker(context, 1150, 330, "lane2");
        circleMaker(context, 1140, 440, "lane3");
        circleMaker(context, 1135, 555, "lane4");
        //Fertigwarenlager top-down
        circleMaker(context, 1440, 335, "productMax");
        circleMaker(context, 1420, 470, "productPlus");
        circleMaker(context, 1400, 610, "productBase");
        //Forderungen left-right
        circleMaker(context, 960, 1075, "claims90");
        circleMaker(context, 1050, 1090, "claims180");
        circleMaker(context, 1140, 1080, "claims270");
        circleMaker(context, 1220, 1065, "claims360");

      }

      function clear() {
        context.clearRect(0, 0, canvas.width, canvas.height);
      }


      function circleMaker(context, x, y, name) {
        context.fillStyle = 'green';
        context.beginPath();
        context.arc(x, y, 35, 0, 2 * Math.PI);
        context.fill();
        context.stroke();

        context.fillStyle = 'black';
        context.fillText(getNumber(name), x - 5.5, y + 6);
      }

      function getNumber(x) {
        number = 0;

        switch (x) {
          case "liquidFunds":
            number = <?php echo $db->getLiquidFundsByTeamCode($_SESSION["Team"])?>; 
            break;
          case "rawMax":
            number = <?php echo $db->getRawMaterial($_SESSION["Team"])["RohMax"]?>; 
            break;
          case "rawPlus":
            number = <?php echo $db->getRawMaterial($_SESSION["Team"])["RohPlus"]?>; 
            break;
          case "rawBase":
            number = <?php echo $db->getRawMaterial($_SESSION["Team"])["RohBase"]?>; 
            break;
          case "productMax":
            number = <?php echo $db->getProducts($_SESSION["Team"])["Max"]?>; 
            break;
          case "productPlus":
            number = <?php echo $db->getProducts($_SESSION["Team"])["Plus"]?>; 
            break;
          case "productBase":
            number = <?php echo $db->getProducts($_SESSION["Team"])["Base"]?>; 
            break;
          case "pendingMaterials":
            <?php 
            $allMaterials = $db->getRawMaterial($_SESSION["Team"]);
            $materialSum = (int)$allMaterials["AusstehendRohMax"] + (int)$allMaterials["AusstehendRohPlus"] + (int)$allMaterials["AusstehendRohBase"];?>
            number = <?php echo $materialSum ?>; 
            break;
          case "claims90":
            <?php
            $claims90 = 0;
            $activeoffers = $db->getActiveOffersByTeamCode($_SESSION["Team"]);
            while($activeoffer = $activeoffers->fetch_array()) {
              if((int)$activeoffer["Zahlungsziel"] == 90){
                $claims90 += (int)$activeoffer["Preis"];
              }
            }?>
            number = <?php echo $claims90?>;
            break;
          case "claims180":
            <?php
            $claims180 = 0;
            $activeoffers = $db->getActiveOffersByTeamCode($_SESSION["Team"]);
            while($activeoffer = $activeoffers->fetch_array()) {
              if((int)$activeoffer["Zahlungsziel"] == 180){
                $claims180 += (int)$activeoffer["Preis"];
              }
            }?>
            number = <?php echo $claims180?>;
            break;
          case "claims270":
            <?php
            $claims270 = 0;
            $activeoffers = $db->getActiveOffersByTeamCode($_SESSION["Team"]);
            while($activeoffer = $activeoffers->fetch_array()) {
              if((int)$activeoffer["Zahlungsziel"] == 270){
                $claims270 += (int)$activeoffer["Preis"];
              }
            }?>
            number = <?php echo $claims270?>;
            break;
            case "claims360":
            <?php
            $claims360 = 0;
            $activeoffers = $db->getActiveOffersByTeamCode($_SESSION["Team"]);
            while($activeoffer = $activeoffers->fetch_array()) {
              if((int)$activeoffer["Zahlungsziel"] == 360){
                $claims360 += (int)$activeoffer["Preis"];
              }
            }?>
            number = <?php echo $claims360?>;
            break;  
          case "lane1":
            <?php
            $lane1 = $db->loadLane($_SESSION["Team"], 1);
            if($lane1 != false){
              $prod1 = $db->getProduction($lane1["MaschinenID"]);
              if($prod1 != false)
                {
                  ?>number = <?php echo $prod1["Anzahl"] ?>;
                <?php }
            }?>
            break;
          case "lane2":
            <?php
            $lane2 = $db->loadLane($_SESSION["Team"], 2);
            if($lane2 != false){
              $prod2 = $db->getProduction($lane2["MaschinenID"]);
              if($prod2 != false)
                {
                  ?>number = <?php echo $prod2["Anzahl"] ?>;
                <?php }
            }?>
            break;
          case "lane3":
            <?php
            $lane3 = $db->loadLane($_SESSION["Team"], 3);
            if($lane3 != false){
              $prod3 = $db->getProduction($lane3["MaschinenID"]);
              if($prod3 != false)
                {
                  ?>number = <?php echo $prod3["Anzahl"] ?>;
                <?php }
            }?>
            break;
          case "lane4":
            <?php
            $lane4 = $db->loadLane($_SESSION["Team"], 4);
            if($lane4 != false){
              $prod4 = $db->getProduction($lane4["MaschinenID"]);
              if($prod4 != false)
                {
                  ?>number = <?php echo $prod4["Anzahl"] ?>;
                <?php }
            }?>
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