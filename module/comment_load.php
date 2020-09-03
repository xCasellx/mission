<?php
    require("../include/check_auto.php");
    require("../include/bd.php");
    $res=$db->query("SELECT * FROM `comments` WHERE `parent_id` IS NULL ");
    while (($com=$res->fetch_assoc())) {
        $user_id=$com["user_id"];
        $user=$db->query("SELECT * FROM `user` WHERE `id`= '$user_id'");
        $user_data=$user->fetch_assoc();
        $comment=$com["id"];
        echo "<div class='comment  border-top border-success container mb-2'>".
            "<p><strong>Name:</strong>".$user_data["first_name"]."<br>".
            "<small>".  $com["date"]."</small><br>".$com["text"]."<br>".
            "<a href='#' class='text-success tag comment_id'id='$comment' data-toggle='modal' data-target='#myModal'> comment</a></p>";
        PrintComment($comment,$user_data["first_name"]);
        echo '</div>';
    }

    function PrintComment($comment_id,$user_name) {
        require("../include/bd.php");
        $r=$db->query("SELECT * FROM `comments` WHERE `parent_id` = '$comment_id' ");
        while(($c=$r->fetch_assoc())){
            $comment=$c["id"];
            echo "<div  class='ml-3 border-top border-success mb-0 pb-0 comment container mb-2'>".
                "<p><strong>Name:</strong>$user_name<br>".
                "<small>Data: ".  $c["date"]."</small><br>".$c["text"]."<br>".
                "<a href='#' class='text-success comment_id'id='$comment' data-toggle='modal' data-target='#myModal'> comment</a>".
                "</p>";
            PrintComment($comment,$user_name);
            echo '</div>';
        }
    }