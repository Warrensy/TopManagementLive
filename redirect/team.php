<div class="container-fluid">
      
    <div class="row justify-content-center">            
        <h1 id="welcome">Willkommen!</h1>
    </div>
    <table class="center">
        <?php
            if(isset($_SESSION["Game"])){
                if(!isset($_SESSION["Team"])){
                    echo'<tr>
                            <td>
                                <a href="?site=createTeam">
                                    <button type="button" class="btn btn-primary">Neues Team erstellen</button>
                                </a> 
                            </td>
                        </tr>';
                }
        ?>
        <tr>
            <td><p class="space"></p></td>
        </tr>
        <?php
                if(!isset($_SESSION["Team"])){
                    echo'<tr>
                            <td>
                                <a href="?site=joinTeam">
                                    <button type="button" class="btn btn-primary">Team beitreten</button>
                                </a> 
                            </td>
                        </tr>';
                }
            }
        ?>
        <?php
            if(isset($_SESSION["Team"])){
                echo'<tr>
                        <td>
                            <a href="?site=leaveTeam">
                                <button type="button" class="btn btn-primary">Team verlassen</button>
                            </a> 
                        </td>
                    </tr>';
            }
        ?>
        <tr>
            <td><p class="space"></p></td>
        </tr>
        <?php
            if(!isset($_SESSION["Game"])){
                echo'<tr>
                        <td>
                            <a href="?site=joinGame">
                                <button type="button" class="btn btn-primary">Game beitreten</button>
                            </a> 
                        </td>
                    </tr>';
            }

            if(isset($_SESSION["Game"])){
                echo'<tr>
                        <td>
                            <a href="?site=leaveGame">
                                <button type="button" class="btn btn-primary">Game verlassen</button>
                            </a> 
                        </td>
                    </tr>';
            }
        ?>
    </table>
</div>

