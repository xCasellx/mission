<?php
if(isset($_POST["submit"])){
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_STRING);
    $password = md5($_POST["password"]);
    $db = new mysqli("127.0.0.1", "root", "root", "users");
    $res = $db->query("SELECT * FROM `user` WHERE `email`= '$email' AND `password`='$password' ");
    $user = $res->fetch_assoc();
    if (count($user) > 0){
        $db->close();
        header("Location:RegPage.php");}
    }