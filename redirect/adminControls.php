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
        Quartal wurde gesetzt
      </div>";
    }

?>
<div class="justify-content-center">

    <form  method="post" action="index.php?site=adminLogic">
        <input class="col btn btn-warning" type="submit" value="Neues Spiel Erstellen" name ="createGame">
    </form>
    <br>

    <?php
        if(isset($_SESSION["Game"]))
        {
    ?>
            
            <form  method="post" action="index.php?site=adminLogic">
            <input class="col btn btn-success"   type="submit" value="Yearly Contracts mischen" name ="accept" ID = "accept">
            </form>
            <br>            
            <?php
            if(isset($_SESSION["Game"])){
                $quartal = $db->getQuartalFromGame($_SESSION["Game"]);
                echo'<br>';
                echo '<p>Das Game "',$_SESSION["Game"],'" befindet sich derzeit in Quartal ',$quartal,'</p>';
            }
            ?>
            
            <form  method="post" action="index.php?site=adminLogic">
            <input class="col btn btn-info" type="submit" value="Nächstes Quartal" name ="nextQuarter">

    <?php
        }
        else
        {
            echo '<p>Für zusätzliche Features, treten sie einem Game bei unter "Team/Game"!</p>';
        }
    ?>
        </form>
</div>



