<div class="row justify-content-center">
    <h1>Anfragen</h1>
</div>
<div class="row justify-content-center">

    <?php $result = $db->getRandomOffers(); ?>
    <table class="table-dark table-bordered">
        <?php
        for ($i = 0; $i < 3; $i++) {
            $array = $result->fetch_array();
        ?>

            <tr>
                <th class="tablepadding">Anfrage <?php echo $i + 1; ?></th>
                <td class="tablepadding"><?php echo $array["Produkt"]; echo " x"; echo $array["Menge"]; echo " "; echo $array["AnfrageID"];?></td>
            </tr>

        <?php
        }
        ?>

    </table>
</div>

<form method="POST" action="index.php?site=spotmarketLogic">

<div class="col-sm-12">
<tr>
    <b><label for="formControlRange">Angebot auswählen</label>
</tr>
</div>
<div class="col-sm-12">
<tr>
    <input min="0" required name="angebot" type="number" id="formControlRange" onInput="$('#angebot').html($(this).val())">
</tr>
</div>
<div class="col-sm-12">
<tr>
    <b><label for="formControlRange">Preis</label>
</tr>
</div>
<div class="col-sm-12">
<tr>
    <input min="0" required name="preis" type="number" id="formControlRange" onInput="$('#preis').html($(this).val())">
</tr>
</div>
<div class="col-sm-12">
<tr>
    <b><label for="formControlRange">Zahlungsziel</label>
</tr>
</div>
<div class="col-sm-12">
<tr>
    <input min="0" required name="zahlungsziel" type="number" id="formControlRange" onInput="$('#zahlungsziel').html($(this).val())">
</tr>
</div>
<div class="col-sm-12">
<tr>
    <b><label for="formControlRange">Liefertermin</label>
</tr>
</div>
<div class="col-sm-12">
<tr>
    <input min="0" required name="liefertermin" type="number" id="formControlRange" onInput="$('#liefertermin').html($(this).val())">
</tr>
</div>
<div class="col-sm-12">
<tr>
    <br>
    <input type="submit" class="btn btn-success" value="Speichern" name ="Speichern" ID = "Speichern">
</tr>
</div>
</form>
