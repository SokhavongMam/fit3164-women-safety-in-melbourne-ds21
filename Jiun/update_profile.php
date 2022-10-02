<?php
  include_once 'header.php';
  require 'includes/dbh.inc.php';
  require 'includes/functions.inc.php';
  $usersuid = $_SESSION['usersuid'];

  if(isset($_POST['update_profile'])){

    // Update Info
    $update_fullname = mysqli_real_escape_string($conn, $_POST['Update_Name']);
    $update_number = mysqli_real_escape_string($conn, $_POST['Update_Number']);
    $update_emergencyname = mysqli_real_escape_string($conn, $_POST['Update_EmergencyName']);
    $update_emergencynumber = mysqli_real_escape_string($conn, $_POST['Update_EmergencyNumber']);

    if (invalidName($update_fullname) !== false or empty($update_fullname)) {
      header("location: update_profile.php?error=invalidname");
      exit();
    }
  
    if (invalidPhone($update_number) !== false or empty($update_number)) {
      header("location: update_profile.php?error=invalidphone");
      exit();
    }

    if (invalidName($update_emergencyname) !== false or empty($update_emergencyname)) {
      header("location: update_profile.php?error=invalidemergencyname");
      exit();
    }
  
    if (invalidPhone($update_emergencynumber) !== false or empty($update_emergencynumber)) {
      header("location: update_profile.php?error=invalidemergencyphone");
      exit();
    }

    $sql = "UPDATE `users` SET usersFullname = ?, usersNumber = ?, emergencyName = ?, emergencyNumber = ? WHERE usersUid = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: update_profile.php?error=stmtfailed");
      exit();
    }
    
    mysqli_stmt_bind_param($stmt, "sssss", $update_fullname, $update_number, $update_emergencyname, $update_emergencynumber, $usersuid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);


    // Update Password  
    $update_pass = $_POST['Update_Password'];
    $new_pass = $_POST['New_Password'];
    $confirm_pass = $_POST['Confirm_Password'];

    if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
      
    $uidExists = uidExists($conn, $usersuid, $usersuid);

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($update_pass, $pwdHashed);
    
    if (empty($update_pass)) {
      header("location: update_profile.php?error=oldpassempty");
      exit();
    }

    elseif ($checkPwd == false) {
      header("location: update_profile.php?error=oldpass");
      exit();
    }

    elseif($new_pass != $confirm_pass){
      header("location: update_profile.php?error=newpass");
      exit();
    }

    elseif (empty($new_pass) || empty($confirm_pass)) {
      header("location: update_profile.php?error=newpassempty");
      exit();
    }
    else {
        $sql = "UPDATE users SET usersPwd = ? WHERE usersUid = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("location: update_profile.php?error=stmtfailed");
          exit();
        }
        
        $hashedPwd = password_hash($confirm_pass, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "ss", $hashedPwd, $usersuid);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }
  
  }
  header("location: profile.php");
  exit();
}
?>

<div class="bgimg-3 row h-100 overflow-auto">
  <div class="container bg-dark text-white rounded p-4 bg-opacity-75 w-25 my-auto " style="min-width: 350px;">
  <h1 class="text-center my-4" style="font-weight: 500;">Update Profile</h1>
  <div class="form-group m-1">
      <?php
        $select = mysqli_query($conn, "SELECT * FROM users WHERE usersUid = '$usersuid'") or die('query failed');
        if (mysqli_num_rows($select) > 0){
          $fetch = mysqli_fetch_assoc($select);
        }
      ?>
      
      <form action="" method="post" enctype="multipart/form-data">
          <div class = 'flex'>
              <div class="">
                  <span>Username: <?php echo $fetch['usersUid']?></span>
              </div>
              <div class="">
                  <span>Email: <?php echo $fetch['usersEmail']?></span>
              </div>
              <div class="inputBox">
                  <span>Fullname: </span>
                  <input type='text' name = "Update_Name" value="<?php echo $fetch['usersFullname']?>" class="form-control">
              </div>
              <div class="inputBox">
                  <span>Phone Number: </span>
                  <input type='text' name = "Update_Number" value="<?php echo $fetch['usersNumber']?>" class="form-control">
              </div>
              <div class="inputBox">
                  <span>Emergency Contact: </span>
                  <input type='text' name = "Update_EmergencyName" value="<?php echo $fetch['emergencyName']?>" class="form-control">
              </div>
              <div class="inputBox">
                  <span>Emergency Number: </span>
                  <input type='text' name = "Update_EmergencyNumber" value="<?php echo $fetch['emergencyNumber']?>" class="form-control">
              </div>
              <div class="inputBox">
                  <span>Old Password: </span>
                  <input type='password' name = "Update_Password" placeholder="Enter Previous Password" class="form-control">
              </div>
              <div class="inputBox">
                  <span>New Password: </span>
                  <input type='password' name = "New_Password" placeholder="Enter New Password" class="form-control">
              </div>
              <div class="inputBox">
                  <span>Confirm Password: </span>
                  <input type='password' name = "Confirm_Password" placeholder="Confirm New Password" class="form-control">
              </div>
          </div>
          <div class="mt-3 text-center mb-5">
            <input type="submit" value="Update Profile" name="update_profile" class="btn btn-primary">
            <a href="profile.php" class="btn btn-primary">Go Back</a>
          </div>
      </form>
      <?php
            if (isset($_GET["error"])){
              if ($_GET["error"] == "invalidname"){
                echo "<p>Fullname Invalid!</p>";
              }

              if ($_GET["error"] == "invalidphone"){
                echo "<p>Phone Number Invalid!</p>";
              }

              if ($_GET["error"] == "invalidemergencyname"){
                echo "<p>Emergency Name Invalid!</p>";
              }

              if ($_GET["error"] == "invalidemergencyphone"){
                echo "<p>Emergency Number Invalid!</p>";
              }

              if ($_GET["error"] == "oldpass"){
                echo "<p>Old password not match!</p>";
              }

              if ($_GET["error"] == "newpass"){
                echo "<p>New password not match!</p>";
              }

              if ($_GET["error"] == "oldpassempty"){
                echo "<p>Old password cannot be empty!</p>";
              }

              if ($_GET["error"] == "newpassempty"){
                echo "<p>New password cannot be empty!</p>";
              }
            }
          ?>
    </div>
  </div>
</div>