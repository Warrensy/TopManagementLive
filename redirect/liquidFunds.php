<div class="container-fluid">
    <div class="row justify-content-center"> 
    <table class="table-dark table-bordered">
        <tr>
            <th class="tablepadding">Flüssige Mittel: </th>
            <td class="tablepadding">
                <h5><?php echo $db->getLiquidFundsByTeamCode($_SESSION["Team"]) ?></h5></td>
        </tr>
    </table>
    </div>

</div>

