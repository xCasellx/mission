<?php
    session_start();
    require("include/bd.php"); ?>
<?php
    if(isset($_SESSION["auto_user"])) {
        header("Location:cabinet-page.php");
        exit();
    }
    $error_msg = "";
    if(isset($_POST["submit"])) {
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_STRING);
        $password = md5($_POST["password"]);
        $res = $db->query("SELECT * FROM `user` WHERE `email`= '$email' AND `password`='$password' ");
        $user = $res->fetch_assoc();
        if (count($user) > 0) {
            $_SESSION["auto_user"] = $user["id"];
            $db->close();
            header("Location:cabinet-page.php");
            exit;
        }
        else   $error_msg = "Incorrect email or passwords";
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sign in</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
 <body class="bg-dark">
     <div  class="text-center container bg-light" style="width: 30%">
         <h1 class=" pt-5 pb-3"><strong>Sign in</strong></h1>
         <div class = "container col">
             <?php if(!empty($error_msg)) echo "<div  class=' col alert alert-danger'  role='alert'> $error_msg </div>"; ?>
             <form  action="" method="post">
                 <div class=" row">
                     <input class="mt-1 form-control" type="email" name="email" placeholder="Email address">
                 </div>
                 <div class=" row">
                     <input class="mt-1 form-control" type="password" name="password" placeholder="Password">
                 </div>
                 <div class=" row">
                     <button class="mt-2 col-8 offset-2 btn btn-lg btn-success btn-block" type="submit" name="submit"><strong>Sign in</strong></button>
                 </div>
                 <div class=" row">
                     <a class="clo-4 offset-5 mt-1 pb-5" href="reg-page.php"><strong>Register</strong></a>
                 </div>
             </form>
         </div>
     </div>
 </body>
</html>