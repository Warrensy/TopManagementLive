<?php
    if(isset($_POST["Speichern"])){
        $base = $_POST["BaseOrder"];
        $plus = $_POST["PlusOrder"];
        $max = $_POST["MaxOrder"];
        $team = $_SESSION["Team"];
        $answer = $db->addMaterials($team, $base, $plus, $max);
        header('Location: index.php?site=materialOrder');
    }
?>