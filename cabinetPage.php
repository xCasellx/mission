<?php
    session_start();
    require("include/bd.php");
    if(isset($_SESSION["auto_user"])):
        $email= $_SESSION["auto_user"];
        $res = $db->query("SELECT * FROM `user` WHERE `email`= '$email' ");
        $user = $res->fetch_assoc();
        $age =date()-$user["date"];
?>

<!DOCTYPE html>

<html lang="en">
    <haed>
        <meta charset="UTF-8">
        <title>CABINET</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </haed>
    <body>
        <nav class="navbar navbar-expand-md  navbar-dark bg-dark fixed-top  ">
            <div class="clearfix w-100">
                <a class= "float-right btn bg-success" href='/include/SignOut.php'><strong>Sign out</strong></a>
            </div>
        </nav>
        <main role="main" class="pt-5">
            <div class="clearfix container mt-2 bg-light ">
                <img class="float-left img-fluid img" src="/image/nan.png" alt="">
                <div class="text-center p-5">
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



