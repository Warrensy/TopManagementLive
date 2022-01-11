<div class="row justify-content-center">
    <h1>Anfragen</h1>
</div>
<div class="row justify-content-center">

    <?php $result = $db->getActiveInquiry(); ?>
    <table class="border-all margin-bottom">
        <tr>
            <th class="tablepadding background-row2">Anfrage</th>
            <td class="tablepadding background-row1"><?php echo $result["Produkt"]; echo " x"; echo $result["Menge"]; echo " "; ?></td>
        </tr>
    </table>
</div>

<div class="row justify-content-center">
    <form method="POST" action="index.php?site=spotmarketLogic&produkt=<?php echo $result["Produkt"]; echo '&menge='; echo $result["Menge"]; ?>">
        <div class="col-sm-12 background-row1 border-open-bottom">
            <tr>
                <b><label for="formControlRange">Preis</label>
            </tr>
        </div>
        <div class="col-sm-12 background-row1 padding-bottom border-only-sides">
            <tr>
                <input min="0" required name="preis" type="number" id="formControlRange" onInput="$('#preis').html($(this).val())">
            </tr>
        </div>
        <div class="col-sm-12 background-row2 border-only-sides">
            <tr>
                <b><label for="formControlRange">Zahlungsziel</label>
            </tr>
        </div>
        <div class="col-sm-12 background-row2 padding-bottom border-only-sides">
            <tr>
                <input min="0" required name="zahlungsziel" type="number" id="formControlRange" onInput="$('#zahlungsziel').html($(this).val())">
            </tr>
        </div>
        <div class="col-sm-12 background-row1 border-only-sides">
            <tr>
                <b><label for="formControlRange">Liefertermin</label>
            </tr>
        </div>
        <div class="col-sm-12 background-row1 padding-bottom border-open-top">
            <tr>
                <input min="0" required name="liefertermin" type="number" id="formControlRange" onInput="$('#liefertermin').html($(this).val())">
            </tr>
        </div>
        <div class="col-sm-12 ">
            <tr>
                <br>
                <input type="submit" class="btn btn-success" value="Anfrage Speichern" name="AnfrageSpeichern" ID="AnfrageSpeichern">
            </tr>
        </div>
    </form>
</div>