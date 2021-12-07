<div class="container-fluid">
    <div class="row justify-content-center">            
        <img id="logo" src="img/Logo.png">
    </div>    
    <div class="row justify-content-center">            
        <h1 id="welcome">Willkommen!</h1>
    </div>
    <table class="center">
        <tr>
            <td>
                <a href="?site=createTeam">
                    <button type="button" class="btn btn-primary">Neues Team erstellen</button>
                </a> 
            </td>
        </tr>
        <tr>
            <td><p class="space"></p></td>
        </tr>
        <tr>
            <td>
                <a href="?site=joinTeam"> 
                    <button type="button" class="btn btn-primary">Team beitreten</button>    
                </a>   
            </td>
        </tr>
        <?php
            if(isset($_SESSION["Team"])){
                echo '<tr><td><form class="container" action="index.php?site=leaveTeam" method="post">
                <input type="submit" class="btn btn-primary" value="Team verlassen" name ="leaveTeam" ID = "leaveTeam" ></form></tr></td>';
            }
        ?>
    </table>
</div>

