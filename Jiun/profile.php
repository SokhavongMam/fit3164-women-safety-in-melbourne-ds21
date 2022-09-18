<?php
  include_once 'header.php';
  require_once 'includes/dbh.inc.php';
  $usersuid = $_SESSION['usersuid'];
?>

<div class="bgimg-3">
  <div class="container bg-dark text-white rounded p-4 bg-opacity-75 w-25" style="min-width: 350px;">
    <h1 class="text-center my-4" style="font-weight: 500;">Profile Page</h1>
    <div class="form-group m-1">
        <?php
          $select = mysqli_query($conn, "SELECT * FROM users WHERE usersUid = '$usersuid'") or die('query failed');
          if (mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
          }
        ?>
        <label for="">Username: </label>
        <h3><?php echo $fetch['usersUid']; ?></h3>
        <label for="">Email: </label>
        <h3><?php echo $fetch['usersEmail']; ?></h3>
        <label for="">Fullname: </label>
        <h3><?php echo $fetch['usersFullname']; ?></h3>
        <label for="">Number: </label>
        <h3><?php echo $fetch['usersNumber']; ?></h3>
        <label for="">Emergency Contact: </label>
        <h3><?php echo $fetch['emergencyName']; ?></h3>
        <label for="">Emergency Number: </label>
        <h3><?php echo $fetch['emergencyNumber']; ?></h3>
        <a href="update_profile.php" class="btn">Update Profile></a>
      </div>
  </div>
</div>