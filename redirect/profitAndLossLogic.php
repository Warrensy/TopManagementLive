<?php
    if(isset($_POST["GuVBerechnen"]))
    {

        $umsatzerloese = $_POST["umsatzerloese"];
        $herstellungskosten = $_POST["herstellungskosten"];
        $forschungundentwicklung = $_POST["forschungundentwicklung"];
        $verwaltung = $_POST["verwaltung"];
        $marketingundvertrieb = $_POST["marketingundvertrieb"];
        $sonstigeertraege = $_POST["sonstigeertraege"];
        $abschreibung = $_POST["abschreibung"];
        $steuernvomergebnis = $_POST["steuernvomergebnis"];

        $bruttoergebnis = $_POST["umsatzerloese"] + $_POST["herstellungskosten"];
        $betriebsergebnis = $bruttoergebnis - $forschungundentwicklung - $verwaltung - $marketingundvertrieb + $sonstigeertraege - $abschreibung;
        $ergebnisnachsteuern = $betriebsergebnis - $steuernvomergebnis;


        $_SESSION["umsatzerloese"] = $umsatzerloese;
        $_SESSION["herstellungskosten"] = $herstellungskosten;
        $_SESSION["forschungundentwicklung"] = $forschungundentwicklung;
        $_SESSION["verwaltung"] = $verwaltung;
        $_SESSION["marketingundvertrieb"] = $marketingundvertrieb;
        $_SESSION["sonstigeertraege"] = $sonstigeertraege;
        $_SESSION["abschreibung"] = $abschreibung;
        $_SESSION["steuernvomergebnis"] = $steuernvomergebnis;

        $_SESSION["bruttoergebnis"] = $bruttoergebnis;
        $_SESSION["betriebsergebnis"] = $betriebsergebnis;
        $_SESSION["ergebnisnachsteuern"] = $ergebnisnachsteuern;


        $db->addGuv($_SESSION["Team"], $_SESSION["umsatzerloese"], $_SESSION["herstellungskosten"], $_SESSION["bruttoergebnis"], $_SESSION["forschungundentwicklung"], $_SESSION["verwaltung"], $_SESSION["marketingundvertrieb"], $_SESSION["sonstigeertraege"], $_SESSION["abschreibung"], $_SESSION["betriebsergebnis"], $_SESSION["steuernvomergebnis"], $_SESSION["ergebnisnachsteuern"], $_SESSION["Year"]); 


        $_SESSION["uncollapse"] = 1; 
        header('Location: index.php?site=profitAndLoss');

    }
?>