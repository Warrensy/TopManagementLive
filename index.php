<?php session_start() ?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="../scripts/jquery.rwdImageMaps.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link type="text/css" rel="stylesheet" href="css/style.css" />
  <title>Top-Management-Live</title>

  <!-- Generelle Sachen für Datenbank -->
  <?php
  include "data/require.php";
  ?>
</head>

<body onload="start()"> <!-- in map.php -->
  <?php
  if (!isset($_GET['site']) || (isset($_GET['site']) && $_GET['site'] != 'map' && $_GET['site'] != 'adminControls' && $_GET['site'] != 'adminOfferManager' && $_GET['site'] != 'adminCreateContract' && $_GET['site'] != 'adminLoginLogout')) {
  ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.php?site=index">Home</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php?site=team">Team/Game</a>
            <a class="nav-link" href="index.php?site=displayTeamCode">Team Code Anzeigen</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?site=rawMaterialWarehouse">Materialien Lager</a>
            <a class="nav-link" href="index.php?site=materialOrder">Material Bestellen</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?site=production">Produktion</a>
            <a class="nav-link" href="index.php?site=productWarehouse">Produkt Lager</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?site=liquidFunds">Flüssige Mittel</a>
            <a class="nav-link" href="index.php?site=transfer">Flüssige Mittel Überweisen</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?site=claim">Forderungen</a>
            <a class="nav-link" href="index.php?site=contract">Aktive Aufträge</a>
            <a class="nav-link" href="index.php?site=yearlyContracting">Yearly Contracting</a>

          <li class="nav-item">
            <a class="nav-link" href="index.php?site=spotmarket">Spotmarket</a>
            <a class="nav-link" href="index.php?site=market">B2B Markt</a>
            <a class="nav-link" href="index.php?site=adminSpotMarket">Add Spotmarket Contract</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?site=mpp">MarketingPunkte</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?site=profitAndLoss">GuV</a>
            <a class="nav-link" href="index.php?site=balance">Balance</a>
            <a class="nav-link" href="index.php?site=verwaltung">Verwaltung</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?site=adminLoginLogout">Admin Menu</a>
          </li>
        </ul>
      </div>
    </nav>
  <?php
  }
  if (isset($_GET['site']) && ($_GET['site'] == 'adminControls' || $_GET['site'] == 'adminOfferManager' || $_GET['site'] == 'adminCreateContract' || $_GET['site'] == 'adminLoginLogout')) {
  ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php?site=index">Zurück</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php?site=team">Team/Game</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?site=adminOfferManager">Admin Angebot Manager</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?site=adminCreateContract">adminCreateContract</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?site=adminControls">Admin Controls</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?site=adminLoginLogout">adminLoginLogout</a>
          </li>
        </ul>
      </div>
    </nav>
  <?php
  }
  if (isset($_GET['site']) && $_GET['site'] != 'map' && $_GET['site'] != 'adminControls' && $_GET['site'] != 'adminOfferManager' && $_GET['site'] != 'adminCreateContract' && $_GET['site'] != 'adminLoginLogout') {
  ?>
  <div class="row justify-content-center">
    <img id="logo" src="img/Logo.png">
    <div id="qua">
      <?php
      if (isset($_GET['site']) ) {//&& $_GET['site'] == 'adminControls'
        if (isset($_SESSION["Team"])) {
          $q = $db->getQuartalByTeam($_SESSION["Team"]);
          $year = 1;

          while ($q > 4) {
            $q = $q - 4;
            $year++;
          }
          $_SESSION["Year"] = $year;

        ?>
          <span class="">Jahr <?php echo $year; ?> - Q<?php echo $q; ?></span>
        <?php
        }
      }
      ?>
    </div>
  </div>
  <?php
  }
  ?>
  <div class="container-fluid">
    <div class="container">
      <?php
      if (!isset($_GET['site'])) //ist das if() nicht redundant mit dem default weiter unten?
        include "redirect/team.php";
      else {
        if (isset($_SESSION['Team'])) {
          switch ($_GET['site']) {
            case 'joinTeam':
              include "redirect/joinTeam.html";
              break;
            case 'joinTeamLogic':
              include "redirect/joinTeamLogic.php";
              break;
            case 'createTeam':
              include "redirect/createTeam.html";
              break;
            case 'createTeamLogic':
              include "redirect/createTeamLogic.php";
              break;
            case 'displayTeamCode':
              include "redirect/displayTeamCode.php";
              break;
            case 'leaveTeam':
              include "redirect/leaveTeam.php";
              break;
            case 'idle':
              include "redirect/idle.html";
              break;
            case 'materialOrder':
              include "redirect/MaterialOrder.php";
              break;
            case 'materialOrderLogic':
              include "redirect/materialOrderLogic.php";
              break;
            case 'liquidFunds':
              include "redirect/liquidFunds.php";
              break;
            case 'transfer':
              include "redirect/transfer.html";
              break;
            case 'transferLogic':
              include "redirect/transferLogic.php";
              break;
            case 'market':
              include "redirect/market.html";
              break;
            case 'marketLogic':
              include "redirect/marketLogic.php";
              break;
            case 'rawMaterialWarehouse':
              include "redirect/rawMaterialWarehouse.php";
              break;
            case 'productWarehouse':
              include "redirect/productWarehouse.php";
              break;
            case 'production':
              include "redirect/production.php";
              break;
            case 'lane':
              include "redirect/lane.php";
              break;
            case 'contract':
              include "redirect/contract.php";
              break;
            case 'contractLogic':
              include "redirect/contractLogic.php";
              break;
            case 'spotmarket':
              include "redirect/spotmarket.php";
              break;
            case 'laneLogic':
              include "redirect/laneLogic.php";
              break;
            case 'yearlyContracting':
              include "redirect/yearlyContracting.php";
              break;
            case 'spotmarketLogic':
              include "redirect/spotmarketLogic.php";
              break;
            case 'yearlyContractingLogic':
              include "redirect/yearlyContractingLogic.php";
              break;
            case 'mpp':
              include "redirect/mpp.php";
              break;
            case 'leaveGame':
              include "redirect/leaveGame.php";
              break;
            case 'joinGame':
              include "redirect/joinGame.php";
              break;
            case 'adminLoginLogout':
              include "redirect/adminLoginLogout.php";
              break;
            case 'claim':
              include "redirect/claim.php";
              break;
            case 'claimLogic':
              include "redirect/claimLogic.php";
              break;
            case 'profitAndLoss':
              include "redirect/profitAndLoss.php";
              break;
            case 'profitAndLossLogic':
              include "redirect/profitAndLossLogic.php";
              break;
            case 'balance':
              include "redirect/balance.php";
              break;
            case 'balanceLogic':
              include "redirect/balanceLogic.php";
              break;
            case 'wrongQuartal':
              include "redirect/wrongQuartal.html";
              break;
            case 'verwaltung':
              include "redirect/verwaltung.php";
              break;
            case 'verwaltungLogic':
              include "redirect/verwaltungLogic.php";
              break;
            case 'map':
              include "redirect/map.php";
              break;
            default:
              include "redirect/team.php";
          }
          if ($_GET['site'] != 'map') {
      ?>
            <div class="container">
              <div class="row">
                <div class="col-auto mr-auto"></div>
                <div class="col-auto ">
                  <a href="index.php?site=map">
                    <button id="map_button" type="button" class="btn btn-secondary btn-sm">Spiel Anzeigen</button>
                  </a>
                </div>
              </div>
            </div>
      <?php
          }
        } else if (isset($_SESSION["admin"])) //admin
        {
          switch ($_GET['site']) {
            case 'adminSpotMarket':
              include "redirect/adminSpotMarket.php";
              break;
            case 'adminSpotMarketLogic':
              include "redirect/adminSpotMarketLogic.php";
              break;
            case 'adminControls':
              include "redirect/adminControls.php";
              break;
            case 'adminLogic':
              include "redirect/adminLogic.php";
              break;
            case 'adminCreateContract':
              include "redirect/adminCreateContract.html";
              break;
            case 'adminCreateContractLogic':
              include "redirect/adminCreateContractLogic.php";
              break;
            case 'adminOfferManager':
              include "redirect/adminOfferManager.php";
              break;
            case 'adminLoginLogout':
              include "redirect/adminLoginLogout.php";
              break;
            case 'team':
              include "redirect/team.php";
              break;
            case 'leaveGame':
              include "redirect/leaveGame.php";
              break;
            case 'joinGame':
              include "redirect/joinGame.php";
              break;

            default:
              include "redirect/adminLoginLogout.php";
          }
        } else {
          switch ($_GET['site']) {
            case 'joinTeam':
              include "redirect/joinTeam.html";
              break;
            case 'joinTeamLogic':
              include "redirect/joinTeamLogic.php";
              break;
            case 'createTeam':
              include "redirect/createTeam.html";
              break;
            case 'createTeamLogic':
              include "redirect/createTeamLogic.php";
              break;
            case 'joinGame':
              include "redirect/joinGame.php";
              break;
            case 'adminLoginLogout':
              include "redirect/adminLoginLogout.php";
              break;
            case 'leaveGame':
              include "redirect/leaveGame.php";
              break;

            default:
              include "redirect/team.php";
          }
        }
      }

      ?>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>