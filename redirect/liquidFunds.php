<div class="container-fluid">
    <div class="row justify-content-center">            
        <img id="logo" src="img/Logo.png">
    </div>    
    <div class="row justify-content-center">     
    <?php   
        $liquidfunds = $db->getLiquidFundsByTeamCode($_SESSION["Team"]); 
    ?>
    
        <h2 id="welcome">Deine fluessigen Mittel:<?php $liquidfunds ?> </h2>
    </div>

    <div class="row"> 
        <?php echo $liquidfunds; ?>
    </div>

</div>

