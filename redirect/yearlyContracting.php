<?php
$activeContracts = $db->getActiveYearlyContracts(); 

while ($arrayRequests = $activeContracts->fetch_array()){
    $contract = $db->getContractByID($arrayRequests["AuftragNr"]); ?>
    <div class="justify-content-center margin-bottom">    
    <form method="POST" action="index.php?site=yearlyContractingLogic">
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
                    <input class="col btn btn-success" type="submit" value="Auftrag annehmen" name ="accept" ID = "accept">
                    <input type="hidden" ID="contractId" name="contractId" value="<?=$contract["AuftragNr"] ?>">
                    <input type="hidden" ID="payment" name="payment" value="<?=$contract["Zahlungsziel"] ?>">
                    <input type="hidden" ID="delivery" name="delivery" value="<?=$contract["Liefertermin"] ?>">
                </div>
            </div>
        </div>
    </form>
    </div>
<?php
}?>