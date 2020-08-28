<?php
    session_start();

    require("include/bd.php");
    if(isset($_SESSION["auto_user"])):
        $id= $_SESSION["auto_user"];
        $res = $db->query("SELECT * FROM `user` WHERE `id`= '$id' ");
        $user = $res->fetch_assoc();
        $age =date()-$user["date"];
?>

<!DOCTYPE html>

<html lang="en">
    <haed>
        <meta charset="UTF-8">
        <title>CABINET</title>
        <link rel="stylesheet" href="css/bootstrap.min.css"  type="text/css">
        <link rel="stylesheet" href="css/style.css"  type="text/css">
    </haed>
    <body class="bg-secondary">
        <?require("block/nav_panel.php");?>
        <main role="main" class="bg-light container pt-5">
            <div class="row container pb-5">
                <div class="container col">
                    <img class=" ml-5 img-fluid img" src="/image/nan.png" alt="">
                </div>
                <div class=" col ">
                    <label> <strong>Name: </strong><?php echo $user["first_name"];?> </label><br>
                    <label><strong>Surname: </strong><?php echo $user["second_name"];?> </label><br>
                    <label><strong>Number: </strong><?php echo $user["number"];?> </label><br>
                    <label><strong>Date: </strong><?php echo $user["date"];?> </label><br>
                    <label><strong>Town: </strong><?php echo $user["town"];?> </label><br>
                    <label><strong>Email address: </strong><?php echo $user["email"];?> </label><br>
                </div>
            </div>

        </main>
    

    </body>
    <?php else: header("Location:../");?>
<?php endif;?>
</html>



