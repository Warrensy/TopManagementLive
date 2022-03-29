


<?php 
    $contracts = $db->getContractsByTeamCode($_SESSION["Team"]); 
    $activeoffers = $db->getActiveOffersByTeamCode($_SESSION["Team"]); 
?>

<?php
    if(isset($_POST["continue"]) && $_POST["continue"] == 1){
        $teamcode = $_SESSION["Team"];

        $db->continueClaims($teamcode, $contracts, $activeoffers);
        header('Location: index.php?site=claim');
    }

    while($contract = $contracts->fetch_array()) {
?>

<div class="justify-content-center">
    <div class="row">
        <div class ="col-1"></div>
        <div class ="col-10 border-all">
            <div class="row background-row1 row-height">
                <div class="col-7">Preis:</div>
                <div class="col"><?php echo $contract["Preis"] ?>M</div>
            </div>
            <div class="row background-row2 row-height">
                <div class="col-7">Zahlungsziel:</div>
                <div class="col"><?php echo $contract["FinalZahlungsziel"] ?> Tage</div>
            </div>
        </div>       
    </div>
</div>
<br>
<?php } 
    
    while($activeoffer = $activeoffers->fetch_array()) {
?>
<div class="justify-content-center">
    <div class="row">
        <div class ="col-1"></div>
        <div class ="col-10 border-all">
            <div class="row background-row1 row-height">
                <div class="col-7">Preis:</div>
                <div class="col"><?php echo $activeoffer["Preis"] ?>M</div>
            </div>
            <div class="row background-row2 row-height">
                <div class="col-7">Zahlungsziel:</div>
                <div class="col"><?php echo $activeoffer["Zahlungsziel"] ?> Tage</div>
            </div>
        </div>       
    </div>
</div>
<br>
<?php } ?>

<form method="POST" action="index.php?site=claim&continue=1">
    <div class ="row">
        <div class="col-3"></div>
            <div class="col-6">
                <div class="row row-height">
                    <button class="col btn btn-success" type="submit" value="1" name ="continue" ID = "continue">Forderungen Vorrücken</button>
                </div>
            </div>
        </div>
    </div>
</form>