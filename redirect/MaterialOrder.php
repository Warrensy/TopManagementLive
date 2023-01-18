
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
                <td><input type="submit" class="btn btn-success" value="Bestellen" name ="Speichern" ID = "Speichern"></td>
            </tr>
            <br>
            <tr>
                <td><input type="submit" class="btn btn-success" value="Material Annehmen" name ="materialAccept" ID = "materialAccept"></td>
            </tr>
        </form>
    </table>
</div> 

<br>
<p>[ACHTUNG]: Bitte das Material der alten Bestellung annehmen, bevor eine neue aufgegeben wird!</p>

<?php
if(isset($_GET['materialAdded']) && $_GET['materialAdded'] == "true")
{
    echo "<div class='alert alert-light' role='alert'>Material wurde im Lager aufgenommen</div>";
}
?>