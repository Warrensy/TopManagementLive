<?php session_start() ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="css/style.css" />
    <title>Top-Management-Live</title>

    <!-- Generelle Sachen für Datenbank -->
    <?php
			include "data/require.php";
		?>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.php?site=joinTeam">Join Team <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?site=createTeam">Create Team</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?site=displayTeamCode">Team Code Anzeigen</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?site=idle">Aktion Erfolgreich</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?site=materialOrder">Material Bestellen</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?site=liquidFunds">Geld</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?site=taxes">Steuern Zahlen</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?site=rawMaterialWarehouse">Roh Materialien</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?site=productWarehouse">Produkte</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?site=team">Team</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?site=production">Produktion</a>
        </li>
      </ul>
    </div>
  </nav>
    <div class="container-fluid">
        <div class="container">
            <?php
            if(!isset($_GET['site'])) //ist das if() nicht redundant mit dem default weiter unten?
                include "redirect/team.php"; 
            else {
                switch($_GET['site']) {
                    case 'joinTeam': include "redirect/joinTeam.html"; break;
                    case 'joinTeamLogic': include "redirect/joinTeamLogic.php"; break;
                    case 'createTeam': include "redirect/createTeam.html"; break;
                    case 'createTeamLogic': include "redirect/createTeamLogic.php"; break;
                    case 'displayTeamCode': include "redirect/displayTeamCode.php"; break;
                    case 'leaveTeam': include "redirect/leaveTeam.php"; break;
                    case 'idle': include "redirect/idle.html"; break;
                    case 'materialOrder': include "redirect/MaterialOrder.html"; break;
                    case 'materialOrderLogic': include "redirect/materialOrderLogic.php"; break;
                    case 'liquidFunds': include "redirect/liquidFunds.php"; break;
                    case 'taxes': include "redirect/taxes.html"; break;
                    case 'taxesLogic': include "redirect/taxesLogic.php"; break;
                    case 'rawMaterialWarehouse' : include "redirect/rawMaterialWarehouse.php"; break;
                    case 'productWarehouse' : include "redirect/productWarehouse.php"; break;
                    case 'production' : include "redirect/production.html"; break;

                    default: include "redirect/team.php";
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
  </body>
</html>