<?php
    session_start();
    if(isset($_SESSION["auto_user"])):
        $error="";
        require("include/bd.php");
        $res=$db->query("SELECT * FROM `comments`");
        $id=$_SESSION["auto_user"];
        if(isset($_POST["submit"])){
            $text=filter_var($_POST["text"],FILTER_SANITIZE_STRING);
            if(empty($text)){
               $error="Empty";
            }elseif(empty($error)){
                $datetime = date("Y-m-d H:i:s");
                $db->query("INSERT INTO `comments` (`user_id`, `date`, `text`) VALUES ('$id', '$datetime', '$text')");
                header("Location: /Comments.php");

            }
        }
        ?>
        <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>Comments</title>
                <link rel="stylesheet" href="css/bootstrap.min.css">
            </head>
            <body class="bg-secondary">
                <?require("block/nav_panel.php");?>
                <main role="main" class="bg-light container pt-5 pb-5">
                    <div class="p-1 pt-5">
                        <form action="" method="post">
                            <?php if(!empty($error)) echo "<div  class=' alert alert-danger'  role='alert'> $error</div>"; ?>
                            <textarea class="form-control border-dark border" name="text" rows="10" cols="150"></textarea><br>
                            <button class=" mb-2 btn btn-outline-success" name="submit" type="submit"><strong>Send</strong></button>
                        </form>
                    </div>
                    <? while(($com=$res->fetch_assoc())) :?>
                        <div class="border-dark border container mb-2">
                           <?php
                            $user_id=$com["user_id"];
                            $user=$db->query("SELECT * FROM `user` WHERE `id`= '$user_id'");
                            $user_data=$user->fetch_assoc();?>
                            <p><strong>Name: </strong><?echo $user_data["first_name"]?><br>
                                <strong>Data: </strong><?echo $com["date"]?><br>
                                <?echo $com["text"]?></p>
                        </div>
                    <?endwhile;?>
                </main>
            </body>
        </html>
<?php else:header("Location:../"); ?>
<?php endif?>