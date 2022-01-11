<form  method="post" action="index.php?site=adminSpotMarketLogic">
<table>
    <tr>
        <td>Spotmarket Anfrage hinzufügen</td>
    </tr>
    <tr>
        <td><select name="material" id="material">
    <option value="Base">Base</option>
    <option value="Plus">Plus</option>
    <option value="Max">Max</option>
    </select></td>
    </tr>
    <tr>
        <td><input type="number" id="menge" name="menge"></td>
    </tr>
    <input class="col btn btn-success"   type="submit" value="Anfrage Speichern" name ="save" ID = "save">
</table>
</form>