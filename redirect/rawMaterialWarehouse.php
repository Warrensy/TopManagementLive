<div class="row justify-content-center">
    <img id="logo" src="img/Logo.png">
</div>   
<div class="row justify-content-center">
    <h1>Materiallager</h1>
</div>
<div class="row justify-content-center">
<?php $rawMaterial = $db->getRawMaterial($_SESSION["Team"])?>
    <table class="table-dark table-bordered table-responsive-sm">
        <tr>
            <th class="tablepadding">Base</th>
            <td class="tablepadding"><?php echo $rawMaterial["RohBase"] ?></td>
        </tr>
        <tr>
            <th class="tablepadding">Plus</th>
            <td class="tablepadding"><?php echo $rawMaterial["RohPlus"] ?></td>
        </tr>
        <tr>
            <th class="tablepadding">Max</th>
            <td class="tablepadding"><?php echo $rawMaterial["RohMax"] ?></td>
        </tr>
    </table>
</div>