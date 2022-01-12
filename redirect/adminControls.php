<?php 

    if(isset($_GET["game"])){
        echo '<p>Ein Game mit dem Code: ',$_GET["game"],' wurde erstellt</p>';
    }
    if(isset($_GET["contractsA"])){
        echo "<div class=\"text-center alert alert-success\" role=\"alert\">
        Contracts wurden gesetzt
      </div>";
    }
    if(isset($_GET["quartal"])){
        echo "<div class=\"text-center alert alert-success\" role=\"alert\">
        Quartal wurden gesetzt
      </div>";
    }

?>
<div class="justify-content-center">

    <form  method="post" action="index.php?site=adminLogic">
        <input class="col btn btn-success"   type="submit" value="Yearly Contracts mischen" name ="accept" ID = "accept">
    </form>
    <br>
    <form  method="post" action="index.php?site=adminLogic">
        <input class="col btn btn-warning" type="submit" value="Neues Spiel Erstellen" name ="createGame">
    </form>
    <br>
    <form  method="post" action="index.php?site=adminLogic">
        <input class="col btn btn-info" type="submit" value="Nächstes Quartal" name ="nextQuarter">
    </form>
</div>



