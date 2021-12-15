<?php
  if(isset($_POST["Lane1"]))
  {
      $db->LoadLane($_SESSION["Team"], 1);
  }
  if(isset($_POST["Lane2"]))
  {
      $db->LoadLane($_SESSION["Team"], 2);
  }
  if(isset($_POST["Lane3"]))
  {
      $db->LoadLane($_SESSION["Team"], 3);   
  }
  if(isset($_POST["Lane4"]))
  {
      $db->LoadLane($_SESSION["Team"], 4);
  }
?>
<div class="container-fluid">
  <a href="index.php?site=team">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Production Lane 1</h5>
          <h6 class="card-subtitle mb-2 text-muted">Flex-Bot</h6>
          <p class="card-text">Currently in Production</p>
        </div>
    </div>
  </a>
  <br>
  <a>
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Production Lane 2</h5>
          <h6 class="card-subtitle mb-2 text-muted">EMPTY</h6>
          <p class="card-text"></p>
        </div>
    </div>
  </a>
  <br>
  <a>
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Production Lane 3</h5>
          <h6 class="card-subtitle mb-2 text-muted">Conti-Bot</h6>
          <p class="card-text">Waiting for assignment</p>
        </div>
      </div>
  </a>
  <br>
  <a>
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Production Lane 4</h5>
          <h6 class="card-subtitle mb-2 text-muted">EMPTY</h6>
          <p class="card-text"></p>
        </div>
    </div>
  </a>
</div>