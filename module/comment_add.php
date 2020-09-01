<?php
    require("../include/check_auto.php");
    require("../include/bd.php");
    $id=$_SESSION["auto_user"];
    if(!empty($_POST)){
        $text=filter_var($_POST["comment"],FILTER_SANITIZE_STRING);
        if(empty($text)){
            echo "empty text";
            exit;
        }else{
            $datetime = date("Y-m-d H:i:s");
            if(isset($_POST["comment_id"])){
                $com_id=$_POST["comment_id"];
                $db->query("INSERT INTO `comments` (`user_id`, `date`, `text`,`parent_id`) VALUES ('$id', '$datetime', '$text','$com_id')");
                $user=$db->query("SELECT * FROM `comments` WHERE `id`= '$com_id'");
                $user_data=$user->fetch_assoc();
                $user_id=$user_data["user_id"];
                $user=$db->query("SELECT * FROM `user` WHERE `id`= '$user_id'");
                $user_data=$user->fetch_assoc();
                $email_recipient=$user_data["email"];
                $user=$db->query("SELECT * FROM `user` WHERE `id`= '$id'");
                $user_data=$user->fetch_assoc();
                mail($email_recipient, "Your comment was answered by", ('Who-'.$user_data["first_name"]." ".'Date:'.$datetime."text: ".$text), 'From: testalph55@gmail.com');
                mail($user_data["email"], "You comment", ('Date:'.$datetime." ".$text), 'From: testalph55@gmail.com');
            }else{
                $db->query("INSERT INTO `comments` (`user_id`, `date`, `text`) VALUES ('$id', '$datetime', '$text')");
                $user=$db->query("SELECT * FROM `user` WHERE `id`= '$id'");
                $user_data=$user->fetch_assoc();
                mail($user_data["email"], "You comment", ('Date:'.$datetime." ".$text), 'From: testalph55@gmail.com');
            }
        }
    }
