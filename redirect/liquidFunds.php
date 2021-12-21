<div class="container-fluid">
    <div class="row justify-content-center"> 
    <table class="table-dark table-bordered">
        <tr>
            <th class="tablepadding">Flüssige Mittel: </th>
            <td class="tablepadding"><?php echo $db->getLiquidFundsByTeamCode($_SESSION["Team"]) ?></td>
        </tr>
    </table>
    </div>

</div>

