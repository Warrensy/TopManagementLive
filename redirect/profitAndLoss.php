<?php
    $q = $db->getQuartalByTeam($_SESSION["Team"]);
    if($q % 4 != 0){
        header("Location: index.php?site=wrongQuartal");
        exit;
    }
?>

<form method="POST">

<div id="guvalert" class="alert alert-success text-center" role="alert">
  Aktion erfolgreich!
</div>

<div class="container-fluid">
<div class="row background-white" style="font-weight: bold; padding:1.5%;">Gewinn- und Verlustrechung</div>    
<div class="row border-only-bottom background-white">
        <div class="col-5"></div>
        <div class="col-1"></div>
        <div class="col-2" style="font-weight: bold; text-align: center;">Jahr 0</div>
        <div class="col-1"></div>
        <div class="col-2" style="font-weight: bold; text-align: center;">Jahr 1</div>
    </div>
    <div class="row background-white">
        <div class="col-5 profitLossStyle">Umsatzerlöse</div>
        <div class="col-1 profitLossStyle"></div>
        <div class="col-2 border-only-bottom profitLossStyle" style="text-align: center;">
            <input class="form-control" min="0" required name="umsatzerloese" type="number" id="umsatzerloese" onInput="$('#umsatzerloese').html($(this).val())">
        </div>
        <div class="col-1 profitLossStyle"></div>
        <div class="col-2 border-only-bottom profitLossStyle" style="text-align: center;">75</div>
    </div>
    <div class="row background-white">
        <div class="col-5 border-only-bottom profitLossStyle">Herstellungskosten</div>
        <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">-</div>
        <div class="col-2 border-only-bottom profitLossStyle" style="text-align: center;">
            <input class="form-control" min="0" required name="herstellungskosten" type="number" id="herstellungskosten" onInput="$('#herstellungskosten').html($(this).val())">
        </div>
        <div class="col-1 profitLossStyle"></div>
        <div class="col-2 border-only-bottom profitLossStyle" style="text-align: center;">75</div>
    </div>
    <div class="row background-white">
        <div class="col-5 background-yellow profitLossStyle">Bruttoergebnis</div>
        <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">=</div>
        <div id="bruttoergebnis" class="col-2 background-yellow profitLossStyle" style="text-align: center;"></div>
        <div class="col-1 profitLossStyle"></div>
        <div class="col-2 background-yellow profitLossStyle" style="text-align: center;">75</div>
    </div>
    <div class="row background-white">
        <div class="col-5 profitLossStyle">Forschung & Entwicklung</div>
        <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">-</div>
        <div class="col-2 border-only-bottom profitLossStyle" style="text-align: center;">
            <input class="form-control" min="0" required name="forschungundentwicklung" type="number" id="forschungundentwicklung" onInput="$('#forschungundentwicklung').html($(this).val())">
        </div>
        <div class="col-1 profitLossStyle"></div>
        <div class="col-2 border-only-bottom profitLossStyle" style="text-align: center;">75</div>
    </div>
    <div class="row background-white">
        <div class="col-5 profitLossStyle">Verwaltung</div>
        <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">-</div>
        <div class="col-2 border-only-bottom profitLossStyle" style="text-align: center;">
            <input class="form-control" min="0" required name="verwaltung" type="number" id="verwaltung" onInput="$('#verwaltung').html($(this).val())">
        </div>
        <div class="col-1 profitLossStyle"></div>
        <div class="col-2 border-only-bottom profitLossStyle" style="text-align: center;">75</div>
    </div>
    <div class="row background-white">
        <div class="col-5 profitLossStyle">Marketing & Vertrieb</div>
        <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">-</div>
        <div class="col-2 border-only-bottom profitLossStyle" style="text-align: center;">
            <input class="form-control" min="0" required name="marketingundvertrieb" type="number" id="marketingundvertrieb" onInput="$('#marketingundvertrieb').html($(this).val())">
        </div>
        <div class="col-1 profitLossStyle"></div>
        <div class="col-2 border-only-bottom profitLossStyle" style="text-align: center;">75</div>
    </div>
    <div class="row background-white">
        <div class="col-5 profitLossStyle">Sonstige betriebliche Erträge</div>
        <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">+</div>
        <div class="col-2 border-only-bottom profitLossStyle" style="text-align: center;">
            <input class="form-control" min="0" required name="sonstigeertraege" type="number" id="sonstigeertraege" onInput="$('#sonstigeertraege').html($(this).val())">
        </div>
        <div class="col-1 profitLossStyle"></div>
        <div class="col-2 border-only-bottom profitLossStyle" style="text-align: center;">75</div>
    </div>
    <div class="row background-white">
        <div class="col-5 border-only-bottom profitLossStyle">Abschreibung</div>
        <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">-</div>
        <div class="col-2 border-only-bottom profitLossStyle" style="text-align: center;">
            <input class="form-control" min="0" required name="abschreibung" type="number" id="abschreibung" onInput="$('#abschreibung').html($(this).val())">
        </div>
        <div class="col-1 profitLossStyle"></div>
        <div class="col-2 border-only-bottom profitLossStyle" style="text-align: center;">75</div>
    </div>
    <div class="row background-white">
        <div class="col-5 background-yellow profitLossStyle">Betriebsergebnis (EBIT)</div>
        <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">=</div>
        <div id="betriebsergebnis" class="col-2 background-yellow border-only-bottom profitLossStyle" style="text-align: center;"></div>
        <div class="col-1 profitLossStyle"></div>
        <div class="col-2 background-yellow border-only-bottom profitLossStyle" style="text-align: center;">75</div>
    </div>
    <div class="row background-white">
        <div class="col-5 border-only-bottom profitLossStyle">Zinsen</div>
        <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">-</div>
        <div class="col-2 border-only-bottom profitLossStyle" style="text-align: center;">(3)</div>
        <div class="col-1 profitLossStyle"></div>
        <div class="col-2 border-only-bottom profitLossStyle" style="text-align: center;">75</div>
    </div>
    <div class="row background-white">
        <div class="col-5 background-yellow profitLossStyle">Ergebnis vor Steuern (EBIT)</div>
        <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">=</div>
        <div class="col-2 background-yellow border-only-bottom profitLossStyle" style="text-align: center;">6</div>
        <div class="col-1 profitLossStyle"></div>
        <div class="col-2 background-yellow border-only-bottom profitLossStyle" style="text-align: center;">75</div>
    </div>
    <div class="row background-white">
        <div class="col-5 border-only-bottom profitLossStyle">Steuern vom Ergebnis (1/3)</div>
        <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">-</div>
        <div class="col-2 border-only-bottom profitLossStyle" style="text-align: center;">(2)</div>
        <div class="col-1 profitLossStyle"></div>
        <div class="col-2 border-only-bottom profitLossStyle" style="text-align: center;">75</div>
    </div>
    <div class="row background-white">
        <div class="col-5 background-yellow profitLossStyle">Ergebnis nach Steuern (EAT)</div>
        <div class="col-1 profitLossStyle" style="font-weight: bold; text-align: center;">=</div>
        <div class="col-2 background-yellow border-only-bottom profitLossStyle" style="text-align: center;">4</div>
        <div class="col-1 profitLossStyle"></div>
        <div class="col-2 background-yellow border-only-bottom profitLossStyle" style="text-align: center;">75</div>
    </div>

    <div>
        <input type="submit" class="btn btn-success" value="GuV Berechnen" name="GuVBerechnen" ID="GuVBerechnen">   
    </div>
</div>
</form>

<form method="POST">
        <input type="submit" class="btn btn-success" value="GuV Abschicken" name="submitGuV" ID="submitGuV">   
</form>


<?php
    if(isset($_POST["GuVBerechnen"])){

        $umsatzerloese = $_POST["umsatzerloese"];
        $herstellungskosten = $_POST["herstellungskosten"];
        $forschungundentwicklung = $_POST["forschungundentwicklung"];
        $verwaltung = $_POST["verwaltung"];
        $marketingundvertrieb = $_POST["marketingundvertrieb"];
        $sonstigeertraege = $_POST["sonstigeertraege"];
        $abschreibung = $_POST["abschreibung"];

        $bruttoergebnis = $_POST["umsatzerloese"] + $_POST["herstellungskosten"];
        $betriebsergebnis = $bruttoergebnis - $forschungundentwicklung - $verwaltung - $marketingundvertrieb + $sonstigeertraege - $abschreibung; 

        $_SESSION["betriebsergebnis"] = $betriebsergebnis; 

        //betriebsergebnis
        ?>
        <script>
            document.getElementById("umsatzerloese").value = <?php echo $umsatzerloese; ?>;
            document.getElementById("herstellungskosten").value = <?php echo $herstellungskosten; ?>;  
            document.getElementById("bruttoergebnis").innerHTML = <?php echo $umsatzerloese + $herstellungskosten; ?>;  
            document.getElementById("forschungundentwicklung").value = <?php echo $forschungundentwicklung; ?>;   
            document.getElementById("verwaltung").value = <?php echo $verwaltung; ?>;   
            document.getElementById("sonstigeertraege").value = <?php echo $sonstigeertraege; ?>;   
            document.getElementById("abschreibung").value = <?php echo $abschreibung; ?>;   
            document.getElementById("marketingundvertrieb").value = <?php echo $marketingundvertrieb; ?>;   
            document.getElementById("betriebsergebnis").innerHTML = <?php echo $betriebsergebnis; ?>;  

            document.getElementById("submitGuV").style.display = "block"; 

        </script>
        <?php

    } else {
        ?>
        <script>
            document.getElementById("submitGuV").style.display = "none"; 
        </script>
        <?php
    }
?>

<?php
    if(isset($_POST["submitGuV"])){

        $be = $_SESSION["betriebsergebnis"];         

        echo $be; 

        $db->addMoney($_SESSION["Team"], $be);

        ?>

        <script>
           document.getElementById("guvalert").style.display = "block"; 
        </script>


        <?php         
    } else {
        ?>
        <script>
            document.getElementById("guvalert").style.display = "none"; 
        </script>
        <?php
    }
?>

