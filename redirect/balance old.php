<?php
    $q = $db->getQuartalByTeam($_SESSION["Team"]);
    if($q % 4 != 0){
        header("Location: index.php?site=wrongQuartal");
        exit;
    }
?>

<form method="POST">
    <div id="bilanzalert" class="alert alert-success text-center" role="alert">
      Aktion erfolgreich!
    </div>

    <div class="container-fluid">
        <div class="row background-white" style="font-weight: bold; padding:1.5%;">Bilanz</div>    
        <div class="row border-only-bottom background-white">
                <div style="word-wrap: break-word;" class="text-center col-6 profitLossStyle" style="font-weight: bold;">Aktiva</div>
                <div class="col-1"></div>
                <div style="word-wrap: break-word;" class="text-center col-5" style="font-weight: bold; text-align: center;">Jahr 0</div>
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
                <div style="word-wrap: break-word;" class="text-center col-5 profitLossStyle"style="font-weight: bold; text-align: center;">Jahr 0</div>
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
                <input type="submit" class="btn btn-success" value="Bilanz Berechnen" name="BilanzBerechnen" ID="BilanzBerechnen">   
            </div>
        </div>
    </div>
</form>

<form method="POST">
        <input type="submit" class="btn btn-success" value="Bilanz Abschicken" name="submitBilanz" ID="submitBilanz">   
</form>

<?php
    if(isset($_POST["BilanzBerechnen"])){

        $immaterielle = $_POST["immaterielle"];
        $grundstücke = $_POST["grundstücke"];
        $gebauude = $_POST["gebauude"];
        $anlagen = $_POST["anlagen"];
        $BundG = $_POST["BundG"];
        
        $gezeichneteskapital = $_POST["gezeichneteskapital"];
        $kapitalruecklage = $_POST["kapitalruecklage"];
        $gewinnruecklage = $_POST["gewinnruecklage"];
        $steuern = $_POST["steuern"];
        
        $rhb = $_POST["rhb"];
        $unfertigeerzeugnisse = $_POST["unfertigeerzeugnisse"];
        $fertigeerzeugnisse = $_POST["fertigeerzeugnisse"];
        $forderungen = $_POST["forderungen"];
        $fluessigemittel = $_POST["fluessigemittel"];
        
        $ruckstellung = $_POST["ruckstellung"];
        $finanzverbindlichkeiten = $_POST["finanzverbindlichkeiten"];
        $LL = $_POST["LL"];
        $sonstverbindlichkeiten = $_POST["sonstverbindlichkeiten"];

        $SummeAnlage = $_POST["immaterielle"] + $_POST["grundstücke"] + $_POST["gebauude"] + $_POST["anlagen"] + $_POST["BundG"];
        $SummeEigenKap = $_POST["gezeichneteskapital"] + $_POST["kapitalruecklage"] + $_POST["gewinnruecklage"] + $_POST["steuern"];
        $SummeUmlaufVermoegen = $_POST["rhb"] + $_POST["unfertigeerzeugnisse"] + $_POST["fertigeerzeugnisse"] + $_POST["forderungen"] + $_POST["fluessigemittel"];;
        $SummeFremdKap = $_POST["ruckstellung"] + $_POST["finanzverbindlichkeiten"] + $_POST["LL"] + $_POST["sonstverbindlichkeiten"];
        
        $SummeAktiva = $SummeAnlage + $SummeUmlaufVermoegen;
        $SummePassiva = $SummeEigenKap + $SummeFremdKap;

        $_SESSION["SummeAnlage"] = $SummeAnlage;
        $_SESSION["SummeEigenKap"] = $SummeEigenKap;
        $_SESSION["SummeUmlaufVermoegen"] = $SummeUmlaufVermoegen;
        $_SESSION["SummeFremdKap"] = $SummeFremdKap;
        $_SESSION["SummeAktiva"] = $SummeAktiva;
        $_SESSION["SummePassiva"] = $SummePassiva;

        //betriebsergebnis
        ?>
        <script>
            
            document.getElementById("immaterielle").value = <?php echo $immaterielle; ?>;
            document.getElementById("grundstücke").value = <?php echo $grundstücke; ?>;
            document.getElementById("gebauude").value = <?php echo $gebauude; ?>;
            document.getElementById("anlagen").value = <?php echo $anlagen; ?>;
            document.getElementById("BundG").value = <?php echo $BundG; ?>;
            
            document.getElementById("gezeichneteskapital").value = <?php echo $gezeichneteskapital; ?>;
            document.getElementById("kapitalruecklage").value = <?php echo $kapitalruecklage; ?>;
            document.getElementById("gewinnruecklage").value = <?php echo $gewinnruecklage; ?>;
            document.getElementById("steuern").value = <?php echo $steuern; ?>;

            document.getElementById("rhb").value = <?php echo $rhb; ?>;
            document.getElementById("unfertigeerzeugnisse").value = <?php echo $unfertigeerzeugnisse; ?>;
            document.getElementById("fertigeerzeugnisse").value = <?php echo $fertigeerzeugnisse; ?>;
            document.getElementById("forderungen").value = <?php echo $forderungen; ?>;
            document.getElementById("fluessigemittel").value = <?php echo $fluessigemittel; ?>;
            
            document.getElementById("ruckstellung").value = <?php echo $ruckstellung; ?>;
            document.getElementById("finanzverbindlichkeiten").value = <?php echo $finanzverbindlichkeiten; ?>;
            document.getElementById("LL").value = <?php echo $LL; ?>;
            document.getElementById("sonstverbindlichkeiten").value = <?php echo $sonstverbindlichkeiten; ?>;
            
            document.getElementById("summeanlage").innerHTML = <?php echo $SummeAnlage; ?>;
            document.getElementById("summeeigenkapital").innerHTML = <?php echo $SummeEigenKap; ?>;
            document.getElementById("summeumlaufverm").innerHTML = <?php echo $SummeUmlaufVermoegen; ?>;
            document.getElementById("summefremdkapital").innerHTML = <?php echo $SummeFremdKap; ?>;
            document.getElementById("summeaktiva").innerHTML = <?php echo $SummeAktiva; ?>;
            document.getElementById("summepassiva").innerHTML = <?php echo $SummePassiva; ?>;

            document.getElementById("submitBilanz").style.display = "block"; 

        </script>
        <?php

    } else {
        ?>
        <script>
            document.getElementById("submitBilanz").style.display = "none"; 
        </script>
        <?php
    }
?>

<?php
    if(isset($_POST["submitBilanz"])){

        $SA = $_SESSION["SummeAnlage"];         

        echo $SA; 

        //$db->addMoney($_SESSION["Team"], $SA);

        ?>

        <script>
           document.getElementById("bilanzalert").style.display = "block"; 
        </script>


        <?php         
    } else {
        ?>
        <script>
            document.getElementById("bilanzalert").style.display = "none"; 
        </script>
        <?php
    }
?>

