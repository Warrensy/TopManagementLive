













<?php
$q = $db->getQuartalByTeam($_SESSION["Team"]);
if ($q % 4 != 0) {
    header("Location: index.php?site=wrongQuartal");
    exit;
}


$guventries = $db->getGuvEntriesByTeam($_SESSION["Team"]); 

$guvcount = $db->getGuvCountByTeam($_SESSION["Team"]);


?>

<!--
<div id="guvalert" class="alert alert-success text-center" role="alert">
    Aktion erfolgreich!
</div>
-->


<div class="accordion" id="accordionExample">


    <?php

    for ($i = 0; $i < $guvcount["guvid"]; $i++) {
        $guventry = $guventries->fetch_array(); 

    ?>

        <div class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#a<?php echo $i; ?>" aria-expanded="false" aria-controls="collapseTwo">
                        Year #<?php echo $i + 1; ?>
                    </button>
                </h2>
            </div>
            <div id="a<?php echo $i; ?>" class="collapse <?php if($i == (int)$guvcount["guvid"] - 1 && $_SESSION["uncollapse"] == 1) {echo "show"; $_SESSION["uncollapse"] = 0;} ?>" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">

                    <div class="container-fluid">
                        <div class="row background-white" style="font-weight: bold; padding:1.5%;">Gewinn- und Verlustrechung</div>
                        <div class="row border-only-bottom background-white">
                            <div class="text-center col-6 "></div>
                            <div class="col-1"></div>
                            <div class="col-5" style="font-weight: bold; text-align: center;">Jahr 0</div>
                        </div>
                        <div class="row background-white">
                            <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle">Umsatzerlöse</div>
                            <div class="col-1 profitLossStyle"></div>
                            <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                                <input readonly class="form-control" min="0" required type="number" value="<?php echo $guventry["umsatzerloese"] ?>">
                            </div>
                        </div>
                        <div class="row background-white">
                            <div style="word-wrap: break-word;" class="text-center col-6 border-only-bottom profitLossStyle">Herstellungskosten</div>
                            <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">-</div>
                            <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                                <input readonly class="form-control" min="0" required type="number" value="<?php echo $guventry["herstellungskosten"] ?>">
                            </div>
                        </div>
                        <div class="row background-white">
                            <div style="word-wrap: break-word;" class="text-center col-6 background-yellow profitLossStyle">Bruttoergebnis</div>
                            <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">=</div>
                            <div class="col-5 background-yellow profitLossStyle" style="text-align: left;"><?php echo $guventry["bruttoergebnis"] ?></div> 
                        </div>
                        <div class="row background-white">
                            <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle">Forschung & Entwicklung</div>
                            <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">-</div>
                            <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                                <input readonly class="form-control" min="0" required type="number" value="<?php echo $guventry["forschungundentwicklung"] ?>">
                            </div>
                        </div>
                        <div class="row background-white">
                            <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle">Verwaltung</div>
                            <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">-</div>
                            <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                                <input readonly class="form-control" min="0" required type="number" value="<?php echo $guventry["verwaltung"] ?>">
                            </div>
                        </div>
                        <div class="row background-white">
                            <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle">Marketing & Vertrieb</div>
                            <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">-</div>
                            <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                                <input readonly class="form-control" min="0" required type="number" value="<?php echo $guventry["marketingundvertrieb"] ?>">
                            </div>
                        </div>
                        <div class="row background-white">
                            <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle">Sonstige betriebliche Erträge</div>
                            <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">+</div>
                            <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                                <input readonly class="form-control" min="0" required type="number" value="<?php echo $guventry["sonstigeertraege"] ?>">
                            </div>
                        </div>
                        <div class="row background-white">
                            <div style="word-wrap: break-word;" class="text-center col-6 border-only-bottom profitLossStyle">Abschreibung</div>
                            <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">-</div>
                            <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                                <input readonly class="form-control" min="0" required type="number" value="<?php echo $guventry["abschreibung"] ?>">
                            </div>
                        </div>
                        <div class="row background-white">
                            <div style="word-wrap: break-word;" class="text-center col-6 background-yellow profitLossStyle">Betriebsergebnis (EBIT)</div>
                            <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">=</div>
                            <div class="col-5 background-yellow profitLossStyle" style="text-align: left;"><?php echo $guventry["betriebsergebnis"] ?></div> 
                        </div>
                        <div class="row background-white">
                            <div style="word-wrap: break-word;" class="text-center col-6 border-only-bottom profitLossStyle">Zinsen</div>
                            <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">-</div>
                            <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;"></div>
                        </div>
                        <div class="row background-white">
                            <div style="word-wrap: break-word;" class="text-center col-6 background-yellow profitLossStyle">Ergebnis vor Steuern (EBIT)</div>
                            <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">=</div>
                            <div class="col-5 background-yellow border-only-bottom profitLossStyle" style="text-align: center;"></div>
                        </div>
                        <div class="row background-white">
                            <div style="word-wrap: break-word;" class="text-center col-6 border-only-bottom profitLossStyle">Steuern vom Ergebnis (1/3)</div>
                            <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">-</div>
                            <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                                <input readonly class="form-control" min="0" required type="number" value="<?php echo $guventry["steuern"] ?>">
                            </div>
                        </div>
                        <div class="row background-white">
                            <div style="word-wrap: break-word;" class="text-center col-6 background-yellow profitLossStyle">Ergebnis nach Steuern (EAT)</div>
                            <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">=</div>
                            <div class="col-5 background-yellow profitLossStyle" style="text-align: left;"><?php echo $guventry["ergebnisnachsteuern"] ?></div> 
                        </div>
                    </div>


                </div>
            </div>
        </div>

    <?php
    }
    ?>


<br><br><br>

<form method="POST" action="index.php?site=profitAndLossLogic">
    <div class="container-fluid">
        <div class="row background-white" style="font-weight: bold; padding:1.5%;">Gewinn- und Verlustrechung</div>
        <div class="row border-only-bottom background-white">
            <div class="text-center col-6 "></div>
            <div class="col-1"></div>
            <div class="col-5" style="font-weight: bold; text-align: center;">Jahr 0</div>
        </div>
        <div class="row background-white">
            <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle">Umsatzerlöse</div>
            <div class="col-1 profitLossStyle"></div>
            <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                <input class="form-control" min="0" required name="umsatzerloese" type="number" id="umsatzerloese" onInput="$('#umsatzerloese').html($(this).val())">
            </div>
        </div>
        <div class="row background-white">
            <div style="word-wrap: break-word;" class="text-center col-6 border-only-bottom profitLossStyle">Herstellungskosten</div>
            <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">-</div>
            <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                <input class="form-control" min="0" required name="herstellungskosten" type="number" id="herstellungskosten" onInput="$('#herstellungskosten').html($(this).val())">
            </div>
        </div>
        <div class="row background-white">
            <div style="word-wrap: break-word;" class="text-center col-6 background-yellow profitLossStyle">Bruttoergebnis</div>
            <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">=</div>
            <div id="bruttoergebnis" class="col-5 background-yellow profitLossStyle" style="text-align: center;"></div>
        </div>
        <div class="row background-white">
            <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle">Forschung & Entwicklung</div>
            <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">-</div>
            <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                <input class="form-control" min="0" required name="forschungundentwicklung" type="number" id="forschungundentwicklung" onInput="$('#forschungundentwicklung').html($(this).val())">
            </div>
        </div>
        <div class="row background-white">
            <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle">Verwaltung</div>
            <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">-</div>
            <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                <input class="form-control" min="0" required name="verwaltung" type="number" id="verwaltung" onInput="$('#verwaltung').html($(this).val())">
            </div>
        </div>
        <div class="row background-white">
            <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle">Marketing & Vertrieb</div>
            <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">-</div>
            <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                <input class="form-control" min="0" required name="marketingundvertrieb" type="number" id="marketingundvertrieb" onInput="$('#marketingundvertrieb').html($(this).val())">
            </div>
        </div>
        <div class="row background-white">
            <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle">Sonstige betriebliche Erträge</div>
            <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">+</div>
            <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                <input class="form-control" min="0" required name="sonstigeertraege" type="number" id="sonstigeertraege" onInput="$('#sonstigeertraege').html($(this).val())">
            </div>
        </div>
        <div class="row background-white">
            <div style="word-wrap: break-word;" class="text-center col-6 border-only-bottom profitLossStyle">Abschreibung</div>
            <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">-</div>
            <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                <input class="form-control" min="0" required name="abschreibung" type="number" id="abschreibung" onInput="$('#abschreibung').html($(this).val())">
            </div>
        </div>
        <div class="row background-white">
            <div style="word-wrap: break-word;" class="text-center col-6 background-yellow profitLossStyle">Betriebsergebnis (EBIT)</div>
            <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">=</div>
            <div id="betriebsergebnis" class="col-5 background-yellow border-only-bottom profitLossStyle" style="text-align: center;"></div>
        </div>
        <div class="row background-white">
            <div style="word-wrap: break-word;" class="text-center col-6 border-only-bottom profitLossStyle">Zinsen</div>
            <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">-</div>
            <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;"></div>
        </div>
        <div class="row background-white">
            <div style="word-wrap: break-word;" class="text-center col-6 background-yellow profitLossStyle">Ergebnis vor Steuern (EBIT)</div>
            <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">=</div>
            <div class="col-5 background-yellow border-only-bottom profitLossStyle" style="text-align: center;"></div>
        </div>
        <div class="row background-white">
            <div style="word-wrap: break-word;" class="text-center col-6 border-only-bottom profitLossStyle">Steuern vom Ergebnis (1/3)</div>
            <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">-</div>
            <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                <input class="form-control" min="0" required name="steuernvomergebnis" type="steuernvomergebnis" id="steuernvomergebnis" onInput="$('#steuernvomergebnis').html($(this).val())">
            </div>
        </div>
        <div class="row background-white">
            <div style="word-wrap: break-word;" class="text-center col-6 background-yellow profitLossStyle">Ergebnis nach Steuern (EAT)</div>
            <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">=</div>
            <div id="ergebnisnachsteuern" class="col-5 background-yellow border-only-bottom profitLossStyle" style="text-align: center;"></div>
        </div>

        <div>
            <input type="submit" class="btn btn-success" value="GuV Berechnen" name="GuVBerechnen" ID="GuVBerechnen">
        </div>
    </div>
</form>


</div>
