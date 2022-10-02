<?php
  include_once 'header.php';
?>
          
<!-- Login -->
<div class="bgimg-3 row h-100">
  <div class="container bg-dark text-white rounded p-4 bg-opacity-75 w-25 my-auto" style="min-width: 350px;">
    <h1 class="text-center my-4" style="font-weight: 500;">Login to Your Account</h1>
    <form action="includes/login.inc.php" method="post">
      <div class="form-group m-1">
        <label for="exampleInputEmail1">Username</label>
        <input class="form-control" name="uid" placeholder="Username/Email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group m-1">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" name="pwd" placeholder="Password">
      </div>
      <a class="m-1" href="">Forgot Password</a>
      <div class="text-center">
        <button type="submit" class="btn btn-primary mt-3 w-25" name="submit">Login</button>
      </div>
    </form>
    <?php
      if (isset($_GET["error"])){
        if ($_GET["error"] == "emptyinput"){
          echo "<p>Fill in All Fields</p>";
        }

        if ($_GET["error"] == "wronglogin"){
          echo "<p>Incorrect Login Info</p>";
        }
      }
    ?>
  </div>
</div>


<script>
  var map = L.map('map').setView([37.8136, 144.9631], 13);
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap'
}).addTo(map);

</script>