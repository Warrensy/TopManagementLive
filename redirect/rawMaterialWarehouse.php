 
<div class="row justify-content-center">
    <h1>Materiallager</h1>
</div>
<br>
<div class="row justify-content-center">
<?php $rawMaterial = $db->getRawMaterial($_SESSION["Team"])?>
    <table class="table-striped table-dark table-bordered">
        <tr>
            <th class="tablepadding">Base</th>
            <td class="tablepadding">
                <h6 class="text-center">Lagernd
                <h5 class="text-center"><b><?php echo $rawMaterial["RohBase"] ?></h6></h5>
            </td>
            <td class="tablepadding">
                <h6 class="text-center">Bestellt</h6>
                <h5 class="text-center"><b><?php echo $rawMaterial["AusstehendRohBase"] ?></b></h5>
            </td>
        </tr>
        <tr>
            <th class="tablepadding">Plus</th>
            <td class="tablepadding">
                <h6 class="text-center">Lagernd</h6>
                <h5 class="text-center"><b><?php echo $rawMaterial["RohPlus"] ?></b></h5>
            </td>
            <td class="tablepadding">
                <h6 class="text-center">Bestellt</h6>
                <h5 class="text-center"><b><?php echo $rawMaterial["AusstehendRohPlus"] ?></b></h5>
            </td>
        </tr>
        <tr>
            <th class="tablepadding">Max</th>
            <td class="tablepadding">
                <h6 class="text-center">Lagernd</h6>
                <h5 class="text-center"><b><?php echo $rawMaterial["RohMax"] ?></b></h5>
            </td>
            <td class="tablepadding">
                <h6 class="text-center">Bestellt</h6>
                <h5 class="text-center"><b><?php echo $rawMaterial["AusstehendRohMax"] ?></b></h5>
            </td>
        </tr>
    </table>
</div>