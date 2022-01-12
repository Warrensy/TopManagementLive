

<?php
    $contracts = $db->getContractsByTeamCode($_SESSION["Team"]); 
?>

<?php 
    while($contract = $contracts->fetch_array()) {
?>

<div class="justify-content-center">
    <!--<table class="center">
        <form method="POST" action="index.php?site=acceptContractLogic">
            <tr>Contract annehmen</tr>
            <tr></tr>
        </form>
    </table> -->
    <form method="POST" action="index.php?site=contractLogic">
    <div class ="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="row border-open-bottom row-height">
                <div class="col-7">Auftrag Nr.</div>
                <div class="col"><?php echo $contract["AuftragNr"] ?></div>
            </div>
        </div>
    </div>

    <div class ="row">
        <div class ="col-1"></div>
        <div class="col-10 border-all">
            <div class="row row-height">
                <div class="col-3">Firma:</div>
                <div class="col">Lorem ipsum</div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class ="col-1"></div>
        <div class ="col-10 border-open-top">
            <div class="row row-height">
                <div class="col-5 background-yearly-contracting">Yearly Contracting</div>
                <div class ="col-2"></div>
                
                <?php
                    switch($contract["Region"]){
                        case "Europa":
                            ?><div class="col background-europa text-center">Europa</div><?php
                            break;
                        case "Asien":
                            ?><div class="col background-asien text-center">Asien</div><?php  
                            break;
                        case "Amerika":
                            ?><div class="col background-amerika text-center">Amerika</div><?php
                            break;
                    }
                ?>

                
            </div>
            <div class="row background-row1 row-height">
                <div class="col-7">Produkt:</div>
                <div class="col"><?php echo $contract["Produkt"] ?></div>
            </div>
            <div class="row background-row2 row-height">
                <div class="col-7">Menge:</div>
                <div class="col"><?php echo $contract["Menge"] ?></div>
            </div>
            <div class="row background-row1 row-height">
                <div class="col-7">Preis:</div>
                <div class="col"><?php echo $contract["Preis"] ?>M</div>
            </div>
            <div class="row background-row2 row-height">
                <div class="col-7">Zahlungsziel:</div>
                <div class="col"><?php echo $contract["Zahlungsziel"] ?> Tage</div>
            </div>
            <div class="row background-row1 row-height">
                <div class="col-7">Liefertermin:</div>
                <div class="col">Qu. <?php echo $contract["Liefertermin"] ?></div>
            </div>
        </div>       
    </div>
    <div class ="row">
        <div class="col-1"></div>
        <div class="col-10 border-open-top" style="background-color: grey; text-align: center;">
            <div class="row row-height">
                <div class="col">Abrechnung</div>
            </div>
        </div>
    </div>
    <div class ="row">
        <div class="col-1"></div>
        <div class="col-10 border-open-top">
            <div class="row row-height">
                <div class="col-7">Herstellungskosten:</div>
                <div class="col">Lorem ipsum</div>
            </div>
        </div>
    </div>
    <div class ="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="row row-height">
                    <input class="col btn btn-success" type="submit" value="Produkt ausliefern" name ="contractausliefern" ID = "contractausliefern">
                    <input type="hidden" ID="AuftragNr" name="AuftragNr" value="<?=$contract["AuftragNr"] ?>">
                    <input type="hidden" ID="Produkt" name="Produkt" value="<?=$contract["Produkt"] ?>">
                    <input type="hidden" ID="Menge" name="Menge" value="<?=$contract["Menge"] ?>">
                    <input type="hidden" ID="Preis" name="Preis" value="<?=$contract["Preis"] ?>">
                </div>
            </div>
    </div>
    </form>
</div>

<br>

<?php } ?>



<!--<table class="table-dark table-bordered">-->

<?php
    $activeoffers = $db->getActiveOffersByTeamCode($_SESSION["Team"]); 
?>

<?php 
    while($activeoffer = $activeoffers->fetch_array()) {
?>

<div class="justify-content-center">
    <!--<table class="center">
        <form method="POST" action="index.php?site=acceptContractLogic">
            <tr>Contract annehmen</tr>
            <tr></tr>
        </form>
    </table> -->
    <form method="POST" action="index.php?site=contractLogic">
    <div class ="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="row border-open-bottom row-height">
                <div class="col-7">Auftrag Nr.</div>
                <div class="col"><?php echo $activeoffer["AngebotNr"] ?></div>
            </div>
        </div>
    </div>

    <div class ="row">
        <div class ="col-1"></div>
        <div class="col-10 border-all">
            <div class="row row-height">
                <div class="col-3">Firma:</div>
                <div class="col">Lorem ipsum</div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class ="col-1"></div>
        <div class ="col-10 border-open-top">
            <div class="row row-height">
                <div class="col-5 background-yearly-contracting">Yearly Contracting</div>
                <div class ="col-2"></div>
                
                <?php
                    switch($activeoffer["Region"]){
                        case "Europa":
                            ?><div class="col background-europa text-center">Europa</div><?php
                            break;
                        case "Asien":
                            ?><div class="col background-asien text-center">Asien</div><?php  
                            break;
                        case "Amerika":
                            ?><div class="col background-amerika text-center">Amerika</div><?php
                            break;
                    }
                ?>

                
            </div>
            <div class="row background-row1 row-height">
                <div class="col-7">Produkt:</div>
                <div class="col"><?php echo $activeoffer["Produkt"] ?></div>
            </div>
            <div class="row background-row2 row-height">
                <div class="col-7">Menge:</div>
                <div class="col"><?php echo $activeoffer["Menge"] ?></div>
            </div>
            <div class="row background-row1 row-height">
                <div class="col-7">Preis:</div>
                <div class="col"><?php echo $activeoffer["Preis"] ?>M</div>
            </div>
            <div class="row background-row2 row-height">
                <div class="col-7">Zahlungsziel:</div>
                <div class="col"><?php echo $activeoffer["Zahlungsziel"] ?> Tage</div>
            </div>
            <div class="row background-row1 row-height">
                <div class="col-7">Liefertermin:</div>
                <div class="col">Qu. <?php echo $activeoffer["Liefertermin"] ?></div>
            </div>
        </div>       
    </div>
    <div class ="row">
        <div class="col-1"></div>
        <div class="col-10 border-open-top" style="background-color: grey; text-align: center;">
            <div class="row row-height">
                <div class="col">Abrechnung</div>
            </div>
        </div>
    </div>
    <div class ="row">
        <div class="col-1"></div>
        <div class="col-10 border-open-top">
            <div class="row row-height">
                <div class="col-7">Herstellungskosten:</div>
                <div class="col">Lorem ipsum</div>
            </div>
        </div>
    </div>
    <div class ="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="row row-height">
                    <input class="col btn btn-success" type="submit" value="Produkt ausliefern" name ="angebotausliefern" ID = "angebotausliefern">
                    <input type="hidden" ID="AngebotNr" name="AngebotNr" value="<?=$activeoffer["AngebotNr"] ?>">
                    <input type="hidden" ID="Produkt" name="Produkt" value="<?=$activeoffer["Produkt"] ?>">
                    <input type="hidden" ID="Menge" name="Menge" value="<?=$activeoffer["Menge"] ?>">
                    <input type="hidden" ID="Preis" name="Preis" value="<?=$activeoffer["Preis"] ?>">
                </div>
            </div>
    </div>
    </form>
</div>

<br>

<?php } ?>


<!--</table>-->