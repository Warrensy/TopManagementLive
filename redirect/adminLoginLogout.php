<?php 
    if(isset($_POST["login"])){
        $_SESSION["admin"] = "yes";
    }

    if(isset($_POST["logout"])){
      unset($_SESSION["admin"]);
    }
?>
<?php
  if(isset($_SESSION["admin"]))
  {

?>
<form  method="post" action="index.php?site=adminLoginLogout">
    <input class="col btn btn-warning"   type="submit" value="Logout as Admin" name ="logout">
</form>
<?php
  }
  else
  {
?>

<form  method="post" action="index.php?site=adminLoginLogout">
    <input class="col btn btn-success" type="submit" value="Login as Admin" name ="login">
</form>

<?php
  }
?>





