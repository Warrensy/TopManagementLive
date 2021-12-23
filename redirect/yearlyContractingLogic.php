<?php
    if(isset($_POST["accept"]))
    {
        $contractId = (int)$_POST["contractId"];
        $delivery = (int)$_POST["delivery"];
        $payment = (int)$_POST["payment"];
        $team = (string)$_SESSION["Team"];
        $answer = $db->setContractFalse($contractId);
        $answer1 = $db->transferContractToTeam($team, $contractId, $delivery, $payment);
        header('Location: index.php?site=yearlyContracting');
    }
?>