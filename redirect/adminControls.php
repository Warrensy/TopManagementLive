
<form  method="post" action="index.php?site=adminLogic">
    <input class="col btn btn-success"   type="submit" value="Yearly Contracts mischen" name ="accept" ID = "accept">
</form>

<form  method="post" action="index.php?site=adminLogic">
    <input class="col btn btn-warning" type="submit" value="Create new Game" name ="createGame">
</form>
<form  method="post" action="index.php?site=adminLogic">
    <input class="col btn btn-info" type="submit" value="Nächstes Quartal" name ="nextQuarter">
</form>
<?php 

    if(isset($_GET["game"])){
        echo '<p>Ein Game mit dem Code: ',$_GET["game"],' wurde erstellt</p>';
    }

?>



