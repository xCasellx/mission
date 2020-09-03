<?php
    require("../include/check_auto.php");
    require("../include/bd.php");
    if(!empty($_POST)) {
        $id= $_SESSION["auto_user"];
        $text=$_POST["edit_text"];
        $component=$_POST["component"];
        $user=$db->query("UPDATE `user` SET `$component` = '$text' WHERE `id`= '$id'");
        echo "success";
    }
    else {
        echo "error";
    }
