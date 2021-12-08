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
    <div class="container-fluid">
        <div class="container">
            <?php
            if(!isset($_GET['site']))
                include "redirect/team.php"; 
            else {
                switch($_GET['site']) {
                    case 'joinTeam': include "redirect/joinTeam.html"; break;
                    case 'createTeam': include "redirect/createTeam.html"; break;
                    case 'createTeamLogic': include "redirect/createTeamLogic.php"; break;
                    case 'displayTeamCode': include "redirect/displayTeamCode.php"; break;
                    case 'leaveTeam': include "redirect/leaveTeam.php"; break;
                    case 'idle': include "redirect/idle.html"; break;
                    case 'materialOrder': include "redirect/MaterialOrder.html"; break;
                    case 'liquidFunds': include "redirect/liquidFunds.php"; break;
                    case 'taxes': include "redirect/taxes.html"; break;
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