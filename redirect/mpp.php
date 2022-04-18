<?php
    if(isset($_POST["senden"])){
        
        $europa = $_POST["europa"];
        $asien = $_POST["asien"];
        $amerika = $_POST["amerika"];

        $answer = $db->setMPPs($europa, $asien, $amerika, $_SESSION["Team"]);
        echo "<div class=\"alert alert-success text-center\" role=\"alert\">
          Aktualisierung erfolgreich
        </div>";
    }
?>

<div class="row justify-content-center">
    <h1>Marketpositionierungs Punkte</h1>
</div>
<div class="row justify-content-center">
<?php $products = $db->getMPPs($_SESSION["Team"])?>
    <form method="POST" action="index.php?site=mpp">
        <table class="table table-striped table-dark table-bordered">
            <tr>
                <th class="col tablepadding">EUROPA</th>
                <td class="col tablepadding"><h5><b><input class="input-group-text" name="europa" value="<?php echo $products["europa_mpp"] ?>"></b></h5></td>
            </tr>
            <tr>
                <th class="col tablepadding">ASIEN</th>
                <td class="col tablepadding"><h5><b><input class="input-group-text" name="asien" value="<?php echo $products["asien_mpp"] ?>"></b></h5></td>
            </tr>
            <tr>
                <th class="col tablepadding">AMERIKA</th>
                <td class="col tablepadding"><h5><b><input class="input-group-text" name="amerika" value="<?php echo $products["amerika_mpp"] ?>"></b></h5></td>
            </tr>
        </table>
        <br>
        <div class="row justify-content-center">
            <input class="btn btn-success" type="submit" value="Bestätigen" name="senden">
        </div>
    </form>
</div>


