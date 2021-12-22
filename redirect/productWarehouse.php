   
<div class="row justify-content-center">
    <h1>Produktlager</h1>
</div>
<div class="row justify-content-center">
<?php $products = $db->getProducts($_SESSION["Team"])?>
    <table class="table-striped table-dark table-bordered">
        <tr>
            <th class="tablepadding">Base</th>
            <td class="tablepadding"><h5><b><?php echo $products["Base"] ?></b></h5></td>
        </tr>
        <tr>
            <th class="tablepadding">Plus</th>
            <td class="tablepadding"><h5><b><?php echo $products["Plus"] ?></b></h5></td>
        </tr>
        <tr>
            <th class="tablepadding">Max</th>
            <td class="tablepadding"><h5><b><?php echo $products["Max"] ?></b></h5></td>
        </tr>
    </table>
</div>