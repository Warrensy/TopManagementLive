<?php
$activeContracts = $db->getActiveYearlyContracts(); 

while ($arrayRequests = $activeContracts->fetch_array()){
    $contract = $db->getContractByID($arrayRequests["AuftragNr"]); ?>
    <div class="justify-content-center margin-bottom">    
    <form method="POST" action="index.php?site=acceptContractLogic">
                 
        <div class ="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="row border-open-bottom">
                    <div class="col-7">Auftrag Nr.</div>
                    <div class="col"><?php echo $contract["AuftragNr"] ?></div>
                </div>
            </div>
        </div>

        <div class ="row">
            <div class ="col-1"></div>
            <div class="col-10 border-all">
                <div class="row">
                    <div class="col-3">Firma:</div>
                    <div class="col">Lorem ipsum</div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class ="col-1"></div>
            <div class ="col-10 border-open-top">
                <div class="row">
                    <div class="col-5 background-yearly-contracting">Yearly Contracting</div>
                    <div class ="col-2"></div>
                    
                    <?php
                        switch($contract["Region"]){
                            case "Europa":
                                ?><div class="col background-europa">Europa</div><?php
                                break;
                            case "Asien":
                                ?><div class="col background-asien">Asien</div><?php  
                                break;
                            case "Amerika":
                                ?><div class="col background-amerika">Amerika</div><?php
                                break;
                        }
                    ?>
                    
                </div>
                <div class="row background-row1">
                    <div class="col-7">Produkt:</div>
                    <div class="col"><?php echo $contract["Produkt"] ?></div>
                </div>
                <div class="row background-row2">
                    <div class="col-7">Menge:</div>
                    <div class="col"><?php echo $contract["Menge"] ?></div>
                </div>
                <div class="row background-row1">
                    <div class="col-7">Preis:</div>
                    <div class="col"><?php echo $contract["Preis"] ?>M</div>
                </div>
                <div class="row background-row2">
                    <div class="col-7">Zahlungsziel:</div>
                    <div class="col"><?php echo $contract["Zahlungsziel"] ?> Tage</div>
                </div>
                <div class="row background-row1">
                    <div class="col-7">Liefertermin:</div>
                    <div class="col">Qu. <?php echo $contract["Liefertermin"] ?></div>
                </div>
            </div>       
        </div>
        <div class ="row">
            <div class="col-1"></div>
            <div class="col-10 border-open-top" style="background-color: grey; text-align: center;">
                <div class="row">
                    <div class="col">Abrechnung</div>
                </div>
            </div>
        </div>
        <div class ="row">
            <div class="col-1"></div>
            <div class="col-10 border-open-top">
                <div class="row">
                    <div class="col-7">Herstellungskosten:</div>
                    <div class="col">Lorem ipsum</div>
                </div>
            </div>
        </div>

        <div class ="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="row">
                    <input class="col btn btn-success" type="submit" value="Auftrag annehmen">
                </div>
            </div>
        </div>
    </form>
    </div>
<?php
}?>