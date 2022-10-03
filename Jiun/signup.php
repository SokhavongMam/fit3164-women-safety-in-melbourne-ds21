<?php
  include_once 'header.php';
?>

<!-- Login -->
<div class="bgimg-3 row h-100">
  <div class="container bg-dark text-white rounded p-4 bg-opacity-75 w-25 my-auto" style="min-width: 350px;">
    <h1 class="text-center my-4" style="font-weight: 500;">Sign Up</h1>
    <form action="includes/signup.inc.php" method="post">
      <div class="form-group m-1">
        <label for="">Username</label>
        <input class="form-control" name="uid" placeholder="Username">
      </div>
      <div class="form-group m-1">
        <label for="">Email</label>
        <input class="form-control" name="email" placeholder="Email">
      </div>
      <div class="form-group m-1">
        <label for="">Full Name</label>
        <input class="form-control" name="fullname" placeholder="Fullname">
      </div>
      <div class="form-group m-1">
        <label for="">Phone Number</label>
        <input class="form-control" name="phone" placeholder="04...">
      </div>
      <div class="form-group m-1">
        <label for="">Emergency Name</label>
        <input class="form-control" name="ename" placeholder="Emergency Contact Name">
      </div>
      <div class="form-group m-1">
        <label for="">Emergency Number</label>
        <input class="form-control" name="ephone" placeholder="Emergency Number">
      </div>
      <div class="form-group m-1">
        <label for="">Password</label>
        <input type="password" class="form-control" name="pwd" placeholder="Password">
      </div>
      <div class="form-group m-1">
        <label for="">Repeat Password</label>
        <input type="password" class="form-control" name="pwdrepeat" placeholder="Repeat Password">
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary mt-3 w-25" name="submit">Submit</button>
      </div>
    </form>
    <?php
      if (isset($_GET["error"])){
        if ($_GET["error"] == "emptyinput"){
          echo "<p>Fill in All Fields</p>";
        }

        if ($_GET["error"] == "invaliduid"){
          echo "<p>Username Invalid</p>";
        }

        if ($_GET["error"] == "invalidemail"){
          echo "<p>Email Invalid</p>";
        }
        
        if ($_GET["error"] == "invalidname"){
          echo "<p>Fullname Invalid</p>";
        }

        if ($_GET["error"] == "invalidephone"){
          echo "<p>Phone Number Invalid</p>";
        }

        if ($_GET["error"] == "passworddontmatch"){
          echo "<p>Password Don't Match</p>";
        }

        if ($_GET["error"] == "stmtfailed"){
          echo "<p>Something went wrong. Try Again</p>";
        }

        if ($_GET["error"] == "usernametaken"){
          echo "<p>Username Already Taken!</p>";
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