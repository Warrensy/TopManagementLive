<?php

if(isset($_POST["Lane1"]))
{
    $db->LoadLane($_SESSION["Team"], 1)
}
if(isset($_POST["Lane2"]))
{
    $db->LoadLane($_SESSION["Team"], 2)
}
if(isset($_POST["Lane3"]))
{
    $db->LoadLane($_SESSION["Team"], 3)    
}
if(isset($_POST["Lane4"]))
{
    $db->LoadLane($_SESSION["Team"], 4)
}

?>