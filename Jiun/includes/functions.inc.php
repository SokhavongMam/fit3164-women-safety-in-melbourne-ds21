<?php

function emptyInputSignup($username,$email,$fullname,$phone,$ename,$ephone,$pwd,$pwdrepeat) {
  if (empty($email) ||empty($username) || empty($fullname) || empty($phone) ||empty($ename) ||empty($ephone) ||empty($pwd) ||empty($pwdrepeat) ){
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}

function invalidUid($username){
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidName($fullname){
    if (!preg_match("/^[a-zA-Z\s]*$/", $fullname) or preg_match("/^[\s]*$/", $fullname)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidPhone($phone){
    if (!preg_match("/^[0-9]*$/", $phone) or strlen($phone) != 10){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdrepeat){
    if ($pwd !== $pwdrepeat){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function uidExists($conn, $username, $email){
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $username,$email,$fullname,$phone,$ename,$ephone,$pwd){
    $sql = "INSERT INTO users (usersUid, usersEmail, usersFullname, usersNumber, emergencyName, emergencyNumber, usersPwd) VALUES (?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssssss", $username,$email,$fullname,$phone,$ename,$ephone,$hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function emptyInputLogin($username,$pwd){
    if (empty($username) ||empty($pwd)){
      $result = true;
    }
    else {
      $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $pwd){
    $uidExists = uidExists($conn, $username, $username);

    if ($uidExists == false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd == false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    else if ($checkPwd == true) {
        session_start();
        $_SESSION["usersid"] = $uidExists["usersId"];
        $_SESSION["usersuid"] = $uidExists["usersUid"];
        $_SESSION["usersemail"] = $uidExists["usersEmail"];
        $_SESSION["usersname"] = $uidExists["usersFullname"];
        $_SESSION["usersnumber"] = $uidExists["usersNumber"];
        $_SESSION["usersename"] = $uidExists["emergencyName"];
        $_SESSION["usersenumber"] = $uidExists["emergencyNumber"];
        header("location: ../index.php");
        exit();
    }
}
