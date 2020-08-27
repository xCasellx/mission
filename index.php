<?php
    session_start();
    require("include/bd.php"); ?>
<?php
    if(isset($_SESSION["auto_user"])){
        header("Location:cabinetPage.php");
        exit();
    }
    $error_msg = "";
    if(isset($_POST["submit"])){
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_STRING);
        $password = md5($_POST["password"]);
        $res = $db->query("SELECT * FROM `user` WHERE `email`= '$email' AND `password`='$password' ");
        $user = $res->fetch_assoc();
        if (count($user) > 0){
            $_SESSION["auto_user"] = $user["id"];
            $db->close();
            header("Location:cabinetPage.php");
            exit;
        }else   $error_msg = "Incorrect email or passwords";
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sign in</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">

    </head>
 <body>
     <div align="center" class="mt-5">
         <h1>Sign in</h1>
         <div class = "container mt-5 ">
             <?php if(!empty($error_msg)) echo "<div  class='w-25 alert alert-danger'  role='alert'> $error_msg </div>"; ?>
             <form class = "w-25 " action="" method="post">
                 <label for="email" class="sr-only">email</label>
                 <p><input class="form-control" type="email" name="email" placeholder="Email address"></p>
                 <label for="password" class="sr-only">Password</label>
                 <p><input class="form-control" type="password" name="password" placeholder="Password"></p>
                 <p><button class="btn btn-lg btn-dark btn-block" type="submit" name="submit"><strong>Sign in</strong></button></p>
                 <a href="RegPage.php"><strong>Register</strong></a>
             </form>
         </div>
     </div>
 </body>
</html>