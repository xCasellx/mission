<?php
    require("../include/check_auto.php");
    require("../include/bd.php");
    $res=$db->query("SELECT * FROM `comments` WHERE `parent_id` IS NULL ");
    while (($com=$res->fetch_assoc())){
        $user_id=$com["user_id"];
        $user=$db->query("SELECT * FROM `user` WHERE `id`= '$user_id'");
        $user_data=$user->fetch_assoc();
        $comment=$com["id"];
        echo "<div class='border-dark border container mb-2'>".
            "<p><strong>Name:</strong>".$user_data["first_name"]."<br>".
            "<strong>Data: </strong>".  $com["date"]."<br>".$com["text"]."<br>".
            "<a href='#' class='comment_id'id='$comment' data-toggle='modal' data-target='#myModal'> comment</a></p>";
        PrintComment($comment,$user_data["first_name"]);
        echo '</div>';

    }


    function PrintComment($comment_id,$user_name)
    {
        require("../include/bd.php");
        $r=$db->query("SELECT * FROM `comments` WHERE `parent_id` = '$comment_id' ");
        while(($c=$r->fetch_assoc())){
            $comment=$c["id"];
            echo "<div  class='ml-3 border-dark border container mb-2'>".
                "<p><strong>Name:</strong>$user_name<br>".
                "<strong>Data: </strong>".  $c["date"]."<br>".$c["text"]."<br>".
                "<a href='#' class='comment_id'id='$comment' data-toggle='modal' data-target='#myModal'> comment</a>".
                "</p>";
            PrintComment($comment,$user_name);
            echo '</div>';

        }
    }