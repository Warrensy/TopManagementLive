<form  method="post" action="index.php?site=adminSpotMarketLogic">
<table>
    <tr>
        <td class="text-center"><b>Hier können Sie neue Spotmarket Anfragen erstellen</b></td>
    </tr>
    <tr><td><br></td></tr>
    <tr>
        <td class="text-center">Wählen Sie eine Produktart aus</td>
    </tr>
    <tr>
        <td class="text-center "><select class="w-25 p-3 h-25 d-inline-block" name="material" id="material">
    <option value="Base">Base</option>
    <option value="Plus">Plus</option>
    <option value="Max">Max</option>
    </select></td>
    </tr>
    <tr><td><br></td></tr>
    <tr>
        <td class="text-center">Geben Sie die geforderte Menge ein</td>
    </tr>
    <tr>
        <td class="text-center"><input class="w-25 p-3" type="number" id="menge" name="menge"></td>
    </tr>
    <tr><td><br></td></tr>
    <tr>
        <td>
            <input class="col btn btn-success"   type="submit" value="Anfrage Speichern" name="save" ID= "save">
        </td>
    </tr>
</table>
</form>