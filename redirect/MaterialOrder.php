
<div class="container-fluid">
    <table class="center">
        <form method="POST" action="index.php?site=materialOrderLogic">
            <tr>
                    <h1 class="text-center">Material Bestellen</h1>
            </tr>
            <tr>
                <b><label for="form-control">Base</label>
                <input class="form-control" name="BaseOrder" type="" placeholder="Order value">
            </tr>
            <tr>
                <b><label for="form-control">Plus</label>
                <input class="form-control" name="PlusOrder" type="" placeholder="Order value">
            </tr>
            <tr>
                <b><label for="form-control">Max</label>
                <input class="form-control" name="MaxOrder" type="" placeholder="Order value" min="2">
            </tr>
            <br>
            <tr>
                <td><input type="submit" class="btn btn-success" value="Speichern" name ="Speichern" ID = "Speichern"></td>
            </tr>
            <br>
            <tr>
                <td><input type="submit" class="btn btn-success" value="Material Annehmen" name ="materialAccept" ID = "materialAccept"></td>
            </tr>
        </form>
    </table>
</div> 
<?php
if(isset($_GET['materialAdded']) && $_GET['materialAdded'] == "true")
{
    echo "<div class='alert alert-light' role='alert'>Material wurde im Lager aufgenommen</div>";
}
?>