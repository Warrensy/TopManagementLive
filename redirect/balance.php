<?php
$q = $db->getQuartalByTeam($_SESSION["Team"]);
if ($q % 4 != 0) {
    header("Location: index.php?site=wrongQuartal");
    exit;
}

$balanceentries = $db->getBalanceEntriesByTeam($_SESSION["Team"]);
$balancecount = $db->getBalanceCountByTeam($_SESSION["Team"]);

?>

<div class="accordion" id="accordionExample">

    <?php

    for ($i = 0; $i < $balancecount["balanceid"]; $i++) {
        $balanceentry = $balanceentries->fetch_array();

    ?>

        <div class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#a<?php echo $i; ?>" aria-expanded="false" aria-controls="collapseTwo">
                        Year #<?php echo $balanceentry["jahr"]; ?>
                    </button>
                </h2>
            </div>
            <div id="a<?php echo $i; ?>" class="collapse <?php if ($i == (int)$balancecount["balanceid"] - 1 && $_SESSION["uncollapseBalance"] == 1) {
                                                                echo "show";
                                                                $_SESSION["uncollapseBalance"] = 0;
                                                            } ?>" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">

                <div class="container-fluid">
        <div class="row background-white" style="font-weight: bold; padding:1.5%;">Bilanz</div>    
        <div class="row border-only-bottom background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle" style="font-weight: bold;">Aktiva</div>
                <div class="col-1"></div>
                <div style="word-wrap: break-word;" class="text-center col-5" style="font-weight: bold; text-align: center;">Jahr <?php echo $balanceentry["jahr"]; ?></div>
            </div>
            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle ">Immaterielle Vermögensgegenstände</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">+</div>
                <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                    <input readonly class="form-control" min="0" required type="number" value="<?php echo $balanceentry["immaterials"] ?>">
                </div>
            </div>
            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle">Grundstücke</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">+</div>
                <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                    <input readonly class="form-control" min="0" required type="number" value="<?php echo $balanceentry["grundstuecke"] ?>">
                </div>
            </div>
            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle">Gebäude</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">+</div>
                <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                    <input readonly class="form-control" min="0" required type="number" value="<?php echo $balanceentry["gebaeude"] ?>">
                </div>
            </div>
            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle">Technische Anlagen</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">+</div>
                <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                    <input readonly class="form-control" min="0" required type="number" value="<?php echo $balanceentry["technischeanlagen"] ?>">
                </div>
            </div>
            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle border-only-bottom">Betriebs- und Geschäftsausstattung</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">+</div>
                <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                    <input readonly class="form-control" min="0" required type="number" value="<?php echo $balanceentry["ausstattung"] ?>">
                </div>
            </div>
            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle background-yellow">Summe Anlagevermögen</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">=</div>
                <div id="summeanlage" class="col-5 border-only-bottom profitLossStyle background-yellow" style="text-align: left; padding-left: 10px;"><?php echo $balanceentry["summeanlage"] ?></div>
            </div>

            <div class="row background-white">
            </div>

            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle">Vorräte:</div>
                <div class="col-1 profitLossStyle"></div>
                <div class="col-5 profitLossStyle" style="text-align: center;"></div>
            </div>
            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle">Roh-, Hilfs- und Betriebsstoffe</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">+</div>
                <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                    <input readonly class="form-control" min="0" required type="number" value="<?php echo $balanceentry["stoffe"] ?>">
                </div>
            </div>
            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle">Unfertige Erzeugnisse</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">+</div>
                <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                    <input readonly class="form-control" min="0" required type="number" value="<?php echo $balanceentry["unfertige"] ?>">
                </div>
            </div>
            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle">Fertige Erzeugnisse</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">+</div>
                <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                    <input readonly class="form-control" min="0" required type="number" value="<?php echo $balanceentry["fertige"] ?>">
                </div>
            </div>
            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle">Forderungen</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">+</div>
                <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                    <input readonly class="form-control" min="0" required type="number" value="<?php echo $balanceentry["forderungen"] ?>">
                </div>
            </div>
            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle border-only-bottom">Flüssige Mittel</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">+</div>
                <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                    <input readonly class="form-control" min="0" required type="number" value="<?php echo $balanceentry["fluessigemittel"] ?>">
                </div>
            </div>
            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle background-yellow border-only-bottom">Summe Umlaufverm.</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">=</div>
                <div id="summeanlage" class="col-5 border-only-bottom profitLossStyle background-yellow" style="text-align: left; padding-left: 10px;"><?php echo $balanceentry["summeumlauf"] ?></div>
            </div>

            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle background-yellow">Summe Aktiva</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">=</div>
                <div id="summeanlage" class="col-5 border-only-bottom profitLossStyle background-yellow" style="text-align: left; padding-left: 10px;"><?php echo $balanceentry["saummeaktiva"] ?></div>
            </div>


        <!-- Passiva -->
        <div class="row border-only-bottom background-white mt-5">
                <div style="word-wrap: break-word;" class="text-center col-6" style="font-weight: bold;">Passiva</div>
                <div class="col-1"></div>
                <div style="word-wrap: break-word;" class="text-center col-5 profitLossStyle"style="font-weight: bold; text-align: center;">Jahr <?php echo $balanceentry["jahr"]; ?></div>
            </div>
            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle">Gezeichnetes Kapital</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">+</div>
                <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                    <input readonly class="form-control" min="0" required type="number" value="<?php echo $balanceentry["kapital"] ?>">
                </div>
            </div>
            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle">Kapitalrücklage</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">+</div>
                <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                    <input readonly class="form-control" min="0" required type="number" value="<?php echo $balanceentry["kapitalrueck"] ?>">
                </div>
            </div>
            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle">Gewinnrücklage</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">+</div>
                <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                    <input readonly class="form-control" min="0" required type="number" value="<?php echo $balanceentry["gewinnrueck"] ?>">
                </div>
            </div>
            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle border-only-bottom">Ergebnis nach Steuern</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">+/-</div>
                <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                    <input readonly class="form-control" min="0" required type="number" value="<?php echo $balanceentry["errgebnisnsteuern"] ?>">
                </div>
            </div>
            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle background-yellow">Summe Eigenkapital</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">=</div>
                <div id="summeanlage" class="col-5 border-only-bottom profitLossStyle background-yellow" style="text-align: left; padding-left: 10px;"><?php echo $balanceentry["summeigen"] ?></div>
            </div>
            <div class="row background-white">
            </div>

            <div class="row background-white">
                <div style="word-wrap: break-word;"class="text-center col-6 profitLossStyle">Rückstellungen</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">+</div>
                <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                    <input readonly class="form-control" min="0" required type="number" value="<?php echo $balanceentry["rueckstellungen"] ?>">
                </div>
            </div>
            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle">Finanzverbindlichkeiten</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">+</div>
                <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                    <input readonly class="form-control" min="0" required type="number" value="<?php echo $balanceentry["finanzverb"] ?>">
                </div>
            </div>
            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle">Verbindl. aus L&L</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">+</div>
                <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                    <input readonly class="form-control" min="0" required type="number" value="<?php echo $balanceentry["verbll"] ?>">
                </div>
            </div>
            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle border-only-bottom">Sonstige Verbindlichk.</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">+</div>
                <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                    <input readonly class="form-control" min="0" required type="number" value="<?php echo $balanceentry["verbsonst"] ?>">
                </div>
            </div>
            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle background-yellow border-only-bottom">Summe Fremdkapital</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">=</div>
                <div id="summeanlage" class="col-5 border-only-bottom profitLossStyle background-yellow" style="text-align: left; padding-left: 10px;"><?php echo $balanceentry["summefremd"] ?></div>
            </div>
            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle background-yellow">Summe Passiva</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">=</div>
                <div id="summeanlage" class="col-5 border-only-bottom profitLossStyle background-yellow" style="text-align: left; padding-left: 10px;"><?php echo $balanceentry["summepassiv"] ?></div>
            </div>


                        <br>

                        <form method="POST" action="index.php?site=balanceLogic">
                            <div>
                                <input type="submit" class="btn btn-danger" value="Balance Löschen" name="BalanceLöschen" ID="BalanceLöschen">
                                <input type="hidden" ID="balanceID" name="balanceID" value="<?= $balanceentry["balanceid"] ?>">
                            </div>
                        </form>

                    </div>


                </div>
            </div>
        </div>

    <?php
    }
    ?>


    <br><br><br>

    <form method="POST" action="index.php?site=balanceLogic">

    <div class="container">
        <div class="row background-white" style="font-weight: bold; padding:1.5%;">Bilanz</div>    
        <div class="row border-only-bottom background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle" style="font-weight: bold;">Aktiva</div>
                <div class="col-1"></div>
                <div style="word-wrap: break-word;" class="text-center col-5" style="font-weight: bold; text-align: center;">Jahr <?php echo $_SESSION["Year"]; ?></div>
            </div>
            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle ">Immaterielle Vermögensgegenstände</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">+</div>
                <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                    <input class="form-control" min="0" required name="immaterielle" type="number" id="immaterielle" onInput="$('#immaterielle').html($(this).val())">
                </div>
            </div>
            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle">Grundstücke</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">+</div>
                <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                    <input class="form-control" min="0" required name="grundstücke" type="number" id="grundstücke" onInput="$('#grundstücke').html($(this).val())">
                </div>
            </div>
            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle">Gebäude</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">+</div>
                <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                    <input class="form-control" min="0" required name="gebauude" type="number" id="gebauude" onInput="$('#gebauude').html($(this).val())">
                </div>
            </div>
            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle">Technische Anlagen</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">+</div>
                <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                    <input class="form-control" min="0" required name="anlagen" type="number" id="anlagen" onInput="$('#anlagen').html($(this).val())">
                </div>
            </div>
            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle border-only-bottom">Betriebs- und Geschäftsausstattung</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">+</div>
                <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                    <input class="form-control" min="0" required name="BundG" type="number" id="BundG" onInput="$('#BundG').html($(this).val())">
                </div>
            </div>
            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle background-yellow">Summe Anlagevermögen</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">=</div>
                <div id="summeanlage" class="col-5 border-only-bottom profitLossStyle background-yellow" style="text-align: center;"></div>
            </div>

            <div class="row background-white">
            </div>

            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle">Vorräte:</div>
                <div class="col-1 profitLossStyle"></div>
                <div class="col-5 profitLossStyle" style="text-align: center;"></div>
            </div>
            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle">Roh-, Hilfs- und Betriebsstoffe</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">+</div>
                <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                    <input class="form-control" min="0" required name="rhb" type="number" id="rhb" onInput="$('#rhb').html($(this).val())">
                </div>
            </div>
            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle">Unfertige Erzeugnisse</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">+</div>
                <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                    <input class="form-control" min="0" required name="unfertigeerzeugnisse" type="number" id="unfertigeerzeugnisse" onInput="$('#unfertigeerzeugnisse').html($(this).val())">
                </div>
            </div>
            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle">Fertige Erzeugnisse</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">+</div>
                <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                    <input class="form-control" min="0" required name="fertigeerzeugnisse" type="number" id="fertigeerzeugnisse" onInput="$('#fertigeerzeugnisse').html($(this).val())">
                </div>
            </div>
            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle">Forderungen</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">+</div>
                <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                    <input class="form-control" min="0" required name="forderungen" type="number" id="forderungen" onInput="$('#forderungen').html($(this).val())">
                </div>
            </div>
            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle border-only-bottom">Flüssige Mittel</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">+</div>
                <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                    <input class="form-control" min="0" required name="fluessigemittel" type="number" id="fluessigemittel" onInput="$('#fluessigemittel').html($(this).val())">
                </div>
            </div>
            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle background-yellow border-only-bottom">Summe Umlaufverm.</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">=</div>
                <div id="summeumlaufverm" class="col-5 border-only-bottom profitLossStyle background-yellow" style="text-align: center;"></div>
            </div>

            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle background-yellow">Summe Aktiva</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">=</div>
                <div  id="summeaktiva" class="col-5 background-yellow border-only-bottom profitLossStyle" style="text-align: center;"></div>
            </div>


        <!-- Passiva -->
        <div class="row border-only-bottom background-white mt-5">
                <div style="word-wrap: break-word;" class="text-center col-6" style="font-weight: bold;">Passiva</div>
                <div class="col-1"></div>
                <div style="word-wrap: break-word;" class="text-center col-5 profitLossStyle"style="font-weight: bold; text-align: center;">Jahr <?php echo $_SESSION["Year"]; ?></div>
            </div>
            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle">Gezeichnetes Kapital</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">+</div>
                <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                    <input class="form-control" min="0" required name="gezeichneteskapital" type="number" id="gezeichneteskapital" onInput="$('#gezeichneteskapital').html($(this).val())">
                </div>
            </div>
            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle">Kapitalrücklage</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">+</div>
                <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                    <input class="form-control" min="0" required name="kapitalruecklage" type="number" id="kapitalruecklage" onInput="$('#kapitalruecklage').html($(this).val())">
                </div>
            </div>
            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle">Gewinnrücklage</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">+</div>
                <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                    <input class="form-control" min="0" required name="gewinnruecklage" type="number" id="gewinnruecklage" onInput="$('#gewinnruecklage').html($(this).val())">
                </div>
            </div>
            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle border-only-bottom">Ergebnis nach Steuern</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">+/-</div>
                <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                    <input class="form-control" min="0" required name="steuern" type="number" id="steuern" onInput="$('#steuern').html($(this).val())">
                </div>
            </div>
            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle background-yellow">Summe Eigenkapital</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">=</div>
                <div id="summeeigenkapital" class="col-5 border-only-bottom profitLossStyle background-yellow" style="text-align: center;"></div>
            </div>
            <div class="row background-white">
            </div>

            <div class="row background-white">
                <div style="word-wrap: break-word;"class="text-center col-6 profitLossStyle">Rückstellungen</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">+</div>
                <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                    <input class="form-control" min="0" required name="ruckstellung" type="number" id="ruckstellung" onInput="$('#ruckstellung').html($(this).val())">
                </div>
            </div>
            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle">Finanzverbindlichkeiten</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">+</div>
                <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                    <input class="form-control" min="0" required name="finanzverbindlichkeiten" type="number" id="finanzverbindlichkeiten" onInput="$('#finanzverbindlichkeiten').html($(this).val())">
                </div>
            </div>
            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle">Verbindl. aus L&L</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">+</div>
                <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                    <input class="form-control" min="0" required name="LL" type="number" id="LL" onInput="$('#LL').html($(this).val())">
                </div>
            </div>
            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle border-only-bottom">Sonstige Verbindlichk.</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">+</div>
                <div class="col-5 border-only-bottom profitLossStyle" style="text-align: center;">
                    <input class="form-control" min="0" required name="sonstverbindlichkeiten" type="number" id="sonstverbindlichkeiten" onInput="$('#sonstverbindlichkeiten').html($(this).val())">
                </div>
            </div>
            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle background-yellow border-only-bottom">Summe Fremdkapital</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">=</div>
                <div id="summefremdkapital" class="col-5 border-only-bottom profitLossStyle background-yellow" style="text-align: center;"></div>
            </div>
            <div class="row background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle background-yellow">Summe Passiva</div>
                <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">=</div>
                <div id="summepassiva" class="col-5 border-only-bottom profitLossStyle background-yellow" style="text-align: center;"></div>
            </div>

            <div>
                <input type="submit" class="btn btn-success" value="Bilanz Berechnen" name="BalanceBerechnen" ID="BalanceBerechnen">   
            </div>
        </div>
    </div>
</form>
    
</div>