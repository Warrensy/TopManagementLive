   
<div class="row justify-content-center">
    <h1>Produktlager</h1>
</div>
<div class="row justify-content-center">
<?php $products = $db->getProducts($_SESSION["Team"])?>
    <table class="table-dark table-bordered">
        <tr>
            <th class="tablepadding">Base</th>
            <td class="tablepadding"><?php echo $products["Base"] ?></td>
        </tr>
        <tr>
            <th class="tablepadding">Plus</th>
            <td class="tablepadding"><?php echo $products["Plus"] ?></td>
        </tr>
        <tr>
            <th class="tablepadding">Max</th>
            <td class="tablepadding"><?php echo $products["Max"] ?></td>
        </tr>
    </table>
</div>