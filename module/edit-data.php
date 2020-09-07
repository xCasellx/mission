<?php
    require("../include/check_auto.php");
    require("../include/bd.php");
    $error="";
    if(!empty($_POST)) {
        $id= $_SESSION["auto_user"];
        $text=$_POST["edit_text"];

        if(empty($text)){
            echo 'Error: empty text';
            exit;
        }
        $component=$_POST["component"];
        switch ($component) {
            case "image":
                $user_dir= "../user/".$id;
                if( ! is_dir( $user_dir ) ) mkdir( $user_dir, 0777 );
                
                break;
            case "number":
                if(!(preg_match("/^(\d{5,15})$/",$text))){
                    echo "Error: the number does not match the pattern";
                    exit;
                }
                break;
            case "email":
                $text = filter_var(trim($text),FILTER_SANITIZE_STRING);
                $res=$db->query("SELECT `email` FROM `user` WHERE `email`= '$text' ");
                $user=$res->fetch_assoc();
                if(count($user)) {
                    echo "Error: this email already exists";
                    exit;
                }
                break;

            case "password":
                $res=$db->query("SELECT `password` FROM `user` WHERE `id`= '$id' ");
                $user=$res->fetch_assoc();
                if((md5($_POST["password"]) != $user["password"])) {
                    echo  "Error: Wrong password entered";
                    exit;
                }
                if($text != $_POST["confirm_password"]) {
                 echo  "Error: Password mismatch";
                 exit;
                 }
                $text=md5($text);
                break;
            default :
                break;
        }
        echo "3";
        $user=$db->query("UPDATE `user` SET `$component` = '$text' WHERE `id`= '$id'");
    }
    else {
        echo "Error: empty post";
    }
