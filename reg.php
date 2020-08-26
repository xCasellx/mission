<?php
if(isset($_POST["submit"])){
    $error = array();
    $fname = filter_var(trim($_POST["first_name"]),FILTER_SANITIZE_STRING);
    $sname = filter_var(trim($_POST["second_name"]),FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST["email"]),FILTER_SANITIZE_STRING);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    if($fname == ''){
        echo "First name empty";
        exit;
    }
    elseif($sname == ''){
        echo  "Second name empty";
        exit;
    }
    elseif($email == ''){
        echo  "Email empty";
        exit;
    }
    elseif($password == ''){
        echo  "Password empty";
        exit;
    }
    elseif($password == $confirm_password){
        echo  "Password mismatch";
        exit;

    }
    $db = new mysqli("127.0.0.1", "root", "root","users");
    $res=$db->query("SELECT `email` FROM `user` WHERE `email`= '$email' ");
    $user=$res->fetch_assoc();
    if(count($user)){;
        echo "this email already exists";
        exit;
    }

    else{
        $password = md5($_POST["password"]);
        $db->query("INSERT INTO `user` (`first_name`,`second_name`,`email`,`password`) VALUE ('$fname','$sname','$email','$password')");
        $db->close();
        header("Location:/");
    }
}
?>