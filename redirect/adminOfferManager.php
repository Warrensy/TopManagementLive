<div class="row justify-content-center">
    <h1>Admin - Bestes Angebot annehmen</h1>
</div>
<div class="row justify-content-center">

    <?php $offers = $db->getOffers();
    $offersbackup = $db->getOffers();
    $rowcount = $db->getOffersCount();
    ?>


    <table class="table-dark table-bordered">


        <?php for ($i = 0; $i < $rowcount["rowcount"]; $i++) {
            $array = $offers->fetch_array();
        ?>

            <tr>
                <th class="tablepadding">Angebot <?php echo $i + 1; ?></th>
                <td class="tablepadding"><?php echo "Produkt: ";
                                            echo $array["Produkt"];
                                            echo ", Menge: ";
                                            echo $array["Menge"];
                                            echo ", Preis: ";
                                            echo $array["Preis"];
                                            echo ", Zahlungsziel: ";
                                            echo $array["Zahlungsziel"];
                                            echo ", Liefertermin: ";
                                            echo $array["Liefertermin"]; ?></td>
            </tr>

        <?php } ?>


    </table>
</div>

<div class="row justify-content-center">
<form method="get" action="index.php?site=adminOfferManager">

<input required name="site" hidden value="adminOfferManager" type="text">

    <div class="col-sm-12">
        <tr>
            <b><label for="formControlRange">bestes Angebot auswählen</label>
        </tr>
    </div>
    <div class="col-sm-12">
        <tr>
            <input min="0" max="<?php echo $rowcount["rowcount"]?>" required name="bestoffer" type="number" id="formControlRange" onInput="$('#bestoffer').html($(this).val())">
        </tr>
    </div>
    <div class="col-sm-12">
        <tr>
            <br>
            <input type="submit" class="btn btn-success" value="Submit" name="SubmitBestOffer" ID="SubmitBestOffer">
        </tr>
    </div>
</form>
</div

<?php

if (isset($_GET['bestoffer'])) {
    $admininput = $_GET['bestoffer'];


    for ($i = 0; $i < $admininput; $i++) {
        $array2 = $offersbackup->fetch_array();
    }

    if($array2 != false) {
        $db->setBestOffer($array2["AngebotNr"]);
    }
}

?>