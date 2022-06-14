<?php
    if(isset($_POST["BalanceBerechnen"]))
    {

        $ImmaterielleVermögensgegenstände = $_POST["immaterielle"];
        $Grundstücke = $_POST["grundstücke"];
        $Gebäude = $_POST["gebauude"];
        $TechnischeAnlagen = $_POST["anlagen"];
        $BetriebsundGeschäftsausstattung = $_POST["BundG"];
        $RohHilfsundBetriebsstoffe = $_POST["rhb"];
        $UnfertigeErzeugnisse = $_POST["unfertigeerzeugnisse"];
        $FertigeErzeugnisse = $_POST["fertigeerzeugnisse"];
        $Forderungen = $_POST["forderungen"];
        $FlüssigeMittel = $_POST["fluessigemittel"];

        $GezeichnetesKapital = $_POST["gezeichneteskapital"];
        $Kapitalrücklage = $_POST["kapitalruecklage"];
        $Gewinnrücklage = $_POST["gewinnruecklage"];
        $ErgebnisnachSteuern = $_POST["steuern"];
        $Rückstellungen = $_POST["ruckstellung"];
        $Finanzverbindlichkeiten = $_POST["finanzverbindlichkeiten"];
        $VerbindlausLundL = $_POST["LL"];
        $SonstigeVerbindlichk = $_POST["sonstverbindlichkeiten"];

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
