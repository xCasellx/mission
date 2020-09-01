<?php
    session_start();
    if(!isset($_SESSION["auto_user"])){
        header("Location:../");
        exit();
    }
