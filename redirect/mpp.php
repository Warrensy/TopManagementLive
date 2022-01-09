<?php
    if(isset($_POST["senden"])){
        
        $europa = $_POST["europa"];
        $asien = $_POST["asien"];
        $amerika = $_POST["amerika"];

        $answer = $db->setMPPs($europa, $asien, $amerika, $_SESSION["Team"]);
    }
?>

<div class="row justify-content-center">
    <h1>Marketingpositionierungspunkte</h1>
</div>
<div class="row justify-content-center">
<?php $products = $db->getMPPs($_SESSION["Team"])?>
    <form method="POST" action="index.php?site=mpp">
        <table class="table-striped table-dark table-bordered">
            <tr>
                <th class="tablepadding">EUROPA</th>
                <td class="tablepadding"><h5><b><input name="europa" value="<?php echo $products["europa_mpp"] ?>"></b></h5></td>
            </tr>
            <tr>
                <th class="tablepadding">ASIEN</th>
                <td class="tablepadding"><h5><b><input name="asien" value="<?php echo $products["asien_mpp"] ?>"></b></h5></td>
            </tr>
            <tr>
                <th class="tablepadding">AMERIKA</th>
                <td class="tablepadding"><h5><b><input name="amerika" value="<?php echo $products["amerika_mpp"] ?>"></b></h5></td>
            </tr>
        </table>
        <br>
        <div class="row justify-content-center">
            <input type="submit" value="Bestätigen" name="senden">
        </div>
    </form>
</div>


