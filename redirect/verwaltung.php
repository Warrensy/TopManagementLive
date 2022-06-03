<form method="post">
    <div id="alert" class="alert alert-success text-center" role="alert">Aktion erfolgreich!</div>
    <div class="col-sm-12">
    <tr>
        <b><label for="formControlRange">Fixkosten</label>
    </tr>
    </div>
    <div class="col-sm-12">
    <tr>
        <b><label for="formControlRange">Verwaltung</label>
    </tr>
    </div>
    <div class="col-sm-12">
    <tr>
        <input disabled required name="Verwaltung" type="number" id="formControlRange" value="2">
    </tr>
    </div>
    <div class="col-sm-12">
    <tr>
        <b><label for="formControlRange">Marketing und Vertrieb</label>
    </tr>
    </div>
    <div class="col-sm-12">
    <tr>
        <input min="0" required name="marketing" type="number" id="formControlRange" onInput="$('#marketing').html($(this).val())">
    </tr>
    </div>
    <div class="col-sm-12">
    <tr>
        <b><label for="formControlRange">Forschung und Entwicklung</label>
    </tr>
    </div>
    <div class="col-sm-12">
    <tr>
        <input required name="forschung" type="number" id="formControlRange" onInput="$('#forschung').html($(this).val())">
    </tr>
    </div>
    <div class="col-sm-12">
    <tr>
        <br>
        <input type="submit" class="btn btn-success" value="Zahlen" name ="Zahlen" ID = "Zahlen">
    </tr>
    </div>
</form>
<?php
    if(isset($_POST["Zahlen"])){
        
        $verwaltung = 2;
        $team = $_SESSION["Team"];
        $forschung = $_POST["forschung"];
        $marketing = $_POST["marketing"];
        $betrag = $verwaltung + $forschung + $marketing;
        $betrag = -1 * $betrag;
        $answer = $db->addMoney($team,$betrag);
        ?>
        <script>
           document.getElementById("alert").style.display = "block"; 
        </script>
        <?php         
    } else {
        ?>
        <script>
            document.getElementById("alert").style.display = "none"; 
        </script>
        <?php
    }
?>