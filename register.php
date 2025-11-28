<?php
require 'db.php';

if($_SERVER['REQUEST_METHOD']=== 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password,PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users(username,password) VALUES(:u,:p)");
    if($stmt->execute(['u'=>$username,'p'=>$hashed_password])){
        echo "You Register Succesfully! <a href='login.php'Login</a>";
    }else{
        echo "Something is off.";

    }
}
?>