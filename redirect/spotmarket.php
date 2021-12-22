<div class="row justify-content-center">
    <h1>Anfragen</h1>
</div>
<div class="row justify-content-center">

    <?php $result = $db->getActiveInquiry(); ?>
    <table class="table-dark table-bordered">


            <tr>
                <th class="tablepadding">Anfrage</th>
                <td class="tablepadding"><?php echo $result["Produkt"]; echo " x"; echo $result["Menge"]; echo " ";?></td>
            </tr>

    </table>
</div>

<div class="row justify-content-center">
<form method="POST" action="index.php?site=spotmarketLogic&produkt=<?php echo $result["Produkt"]; echo '&menge=';echo $result["Menge"]; ?>">

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
    <input type="submit" class="btn btn-success" value="AnfrageSpeichern" name ="AnfrageSpeichern" ID = "AnfrageSpeichern">
</tr>
</div>
</form>
</div>