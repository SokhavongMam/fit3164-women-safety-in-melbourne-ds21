<?php

if (isset($_POST["submit"])) {

  $username = $_POST["uid"];
  $email = $_POST["email"];
  $fullname = $_POST["fullname"];
  $phone = $_POST["phone"];
  $ename = $_POST["ename"];
  $ephone = $_POST["ephone"];
  $pwd = $_POST["pwd"];
  $pwdrepeat = $_POST["pwdrepeat"];
  

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  if (emptyInputSignup($username,$email,$fullname,$phone,$ename,$ephone,$pwd,$pwdrepeat) !== false) {
    header("location: ../signup.php?error=emptyinput");
    exit();
  }

  if (invalidUid($username) !== false) {
    header("location: ../signup.php?error=invaliduid");
    exit(); 
  }

  if (invalidEmail($email) !== false) {
    header("location: ../signup.php?error=invalidemail");
    exit();
  }

  if (invalidName($fullname) !== false) {
    header("location: ../signup.php?error=invalidname");
    exit();
  }

  if (invalidPhone($phone) !== false) {
    header("location: ../signup.php?error=invalidphone");
    exit();
  }

  if (invalidName($ename) !== false) {
    header("location: ../signup.php?error=invalidemergencyname");
    exit();
  }

  if (invalidPhone($ephone) !== false) {
    header("location: ../signup.php?error=invalidemergencyphone");
    exit();
  }

  if (pwdMatch($pwd, $pwdrepeat) !== false) {
    header("location: ../signup.php?error=passworddontmatch");
    exit();
  }

  if (uidExists($conn, $username, $email) !== false) {
    header("location: ../signup.php?error=usernametaken");
    exit();
  }

  createUser($conn, $username,$email,$fullname,$phone,$ename,$ephone,$pwd);
  loginUser($conn, $username, $pwd);
}

else {
    header("location: ../signup.php");
    exit();
}

?>