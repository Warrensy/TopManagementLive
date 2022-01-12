<?php
    //createTeamLogic
    if(isset($_POST["Submit"])){
        $code = $_POST["gamecode"];
        
        if($db->joinGame($code))
        {
            $_SESSION["Game"] = $code;
            header('Location: index.php?site=team');
            exit;
        }
        else
        {
            //Vielleicht auf andere Seite mit Fehlermeldung rerouten ?
            echo 'Der gesuchte Gamecode existiert nicht !<br>Bitte fragen Sie den Admin nach einem korrekten Code!';
        }
    }
?>

<div class="row">
    <h1>Game beitreten</h1>
</div>
<div class="row">

    <form method="POST" action="index.php?site=joinGame">
        <label for="teamcode">Gamecode eingeben:</label>
        <input type="text" id="gamecode" name="gamecode">
        <input type="submit" value="Submit" name="Submit">
    </form>
</div>