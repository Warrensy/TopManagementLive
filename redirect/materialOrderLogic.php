<?php
    if(isset($_POST["Speichern"])){
        $base = $_POST["BaseOrder"];
        $plus = $_POST["PlusOrder"];
        $max = $_POST["MaxOrder"];
        
        $answer = $db->addMaterials($base, $plus, $max);

        header('Location: index.php?site=materialOrder');
    }
?>