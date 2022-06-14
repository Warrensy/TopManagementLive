<?php
    if(isset($_POST["BalanceBerechnen"]))
    {

        $ImmaterielleVermögensgegenstände = $_POST["ImmaterielleVermögensgegenstände"];
        $Grundstücke = $_POST["Grundstücke"];
        $Gebäude = $_POST["Gebäude"];
        $TechnischeAnlagen = $_POST["TechnischeAnlagen"];
        $BetriebsundGeschäftsausstattung = $_POST["BetriebsundGeschäftsausstattung"];
        $RohHilfsundBetriebsstoffe = $_POST["RohHilfsundBetriebsstoffe"];
        $UnfertigeErzeugnisse = $_POST["UnfertigeErzeugnisse"];
        $FertigeErzeugnisse = $_POST["FertigeErzeugnisse"];
        $Forderungen = $_POST["Forderungen"];
        $FlüssigeMittel = $_POST["FlüssigeMittel"];

        $GezeichnetesKapital = $_POST["GezeichnetesKapital"];
        $Kapitalrücklage = $_POST["Kapitalrücklage"];
        $Gewinnrücklage = $_POST["Gewinnrücklage"];
        $ErgebnisnachSteuern = $_POST["ErgebnisnachSteuern"];
        $Rückstellungen = $_POST["Rückstellungen"];
        $Finanzverbindlichkeiten = $_POST["Finanzverbindlichkeiten"];
        $VerbindlausLundL = $_POST["VerbindlausLundL"];
        $SonstigeVerbindlichk = $_POST["SonstigeVerbindlichk"];

        $SummeAnlagevermögen = $ImmaterielleVermögensgegenstände + $Grundstücke + $Gebäude + $TechnischeAnlagen + $BetriebsundGeschäftsausstattung;
        $SummeUmlaufverm = $RohHilfsundBetriebsstoffe + $UnfertigeErzeugnisse + $FertigeErzeugnisse + $Forderungen + $FlüssigeMittel;
        $SummeAktiva = $SummeAnlagevermögen + $SummeUmlaufverm;

        $SummeEigenkapital = $GezeichnetesKapital + $Kapitalrücklage + $Gewinnrücklage + $ErgebnisnachSteuern;
        $SummeFremdkapital = $Rückstellungen + $Finanzverbindlichkeiten + $VerbindlausLundL + $SonstigeVerbindlichk;
        $SummePassiva = $SummeEigenkapital + $SummeFremdkapital;

        $db->addBalance($_SESSION["Team"], $ImmaterielleVermögensgegenstände, $Grundstücke, $Gebäude, $TechnischeAnlagen, $BetriebsundGeschäftsausstattung, $SummeAnlagevermögen, $RohHilfsundBetriebsstoffe,$UnfertigeErzeugnisse ,$FertigeErzeugnisse ,$Forderungen ,$FlüssigeMittel, $SummeUmlaufverm,$SummeAktiva, $GezeichnetesKapital ,$Kapitalrücklage ,$Gewinnrücklage ,$ErgebnisnachSteuern, $SummeEigenkapital, $Rückstellungen ,$Finanzverbindlichkeiten ,$VerbindlausLundL ,$SonstigeVerbindlichk, $SummeFremdkapital, $SummePassiva,$_SESSION["Year"]); 


        $_SESSION["uncollapseBalance"] = 1; 
        header('Location: index.php?site=balance');

    }

    if(isset($_POST["BalanceLöschen"]))
    {
        $db->deleteBalance($_POST["balanceID"]); 

        header('Location: index.php?site=balance');
    }

?>
