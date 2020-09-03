<?php
    require("../include/check_auto.php");
    require("../include/bd.php");
    $res=$db->query("SELECT * FROM `comments` WHERE `parent_id` IS NULL ");
    while (($com=$res->fetch_assoc())) {
        $user_id=$com["user_id"];
        $user=$db->query("SELECT * FROM `user` WHERE `id`= '$user_id'");
        $user_data=$user->fetch_assoc();
        $comment=$com["id"];
        echo "<div class='comment'>".
        comment($user_data["first_name"],$user_data["second_name"],$com["text"],$com["date"],$comment);
        PrintComment($comment);
        echo '</div>';
    }

    function PrintComment($comment_id) {
        require("../include/bd.php");
        $res=$db->query("SELECT * FROM `comments` WHERE `parent_id` = '$comment_id' ");
        while(($com=$res->fetch_assoc())){
            $user_id=$com["user_id"];
            $user=$db->query("SELECT * FROM `user` WHERE `id`= '$user_id'");
            $user_data=$user->fetch_assoc();
            $comment=$com["id"];
            echo "<div class='ml-3 comment'>";
            comment($user_data["first_name"],$user_data["second_name"],$com["text"],$com["date"],$comment);
            PrintComment($comment);
            echo '</div>';
        }
    }

    function comment($first_name,$second_name,$text,$date,$id_comment){
        echo "
            <div class='card '>
                <div class='card-header bg-dark text-light row' >
                    <div class='col-1 p-0' style='max-width: 32px'>
                        <img class='rounded  img-fluid img' src='/image/nan.png' style='width: 32px;height: 32px;' alt=''>
                    </div>
                    <h6 class='col '>$first_name  $second_name</h6>
                    <small class='col text-right'>$date</small>
                </div>
                <div class='card-body'>
                   $text
                </div>
                <div class='card-footer bg-dark text-right'>
                    <a href='#' class='text-success comment_id'id='$id_comment' data-toggle='modal' data-target='#myModal'><strong>comment</strong></a>
                </div>
            </div>
        
        ";
    }