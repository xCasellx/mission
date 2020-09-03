<?php require("include/bd.php"); ?>
<?php
    session_start();
    if(isset($_SESSION["auto_user"])) {
        header("Location:cabinet-page.php");
        exit();
    }
    $error = "";
    if(isset($_POST["submit"])) {
        $fname = filter_var(trim($_POST["first_name"]),FILTER_SANITIZE_STRING);
        $sname = filter_var(trim($_POST["second_name"]),FILTER_SANITIZE_STRING);
        $email = filter_var(trim($_POST["email"]),FILTER_SANITIZE_STRING);
        $residence = filter_var(trim($_POST["residence"]),FILTER_SANITIZE_STRING);
        $number = filter_var(trim($_POST["number"]),FILTER_SANITIZE_STRING);
        $date = filter_var(trim($_POST["date"]),FILTER_SANITIZE_STRING);
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];
        if($fname == '') {
            $error = "First name empty";
        }
        elseif($sname == '') {
            $error =  "Second name empty";
        }
        elseif($email == '') {
            $error ="Email empty";
        }
        elseif($password == '') {
            $error ="Password empty";
        }
        elseif($residence == '') {
            $error ="Place of residence empty";
        }
        elseif($number == '') {
            $error ="Number empty";

        }
        elseif($date == '') {
            $error ="Date empty";
        }
        elseif($password != $confirm_password) {
            $error ="Password mismatch";
        }
        $res=$db->query("SELECT `email` FROM `user` WHERE `email`= '$email' ");
        $user=$res->fetch_assoc();
        if(count($user)) {
            $error = "this email already exists";
        }
        if(empty($error)) {
            $password = md5($password);
            $db->query("INSERT INTO `user` (`first_name`,`second_name`,`email`,`password`,`date`,`number`,`town`) VALUE 
                                                 ('$fname','$sname','$email','$password','$date','$number','$residence')");
            $db->close();
            header("Location:../");
            exit;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body class="bg-dark">
        <div  class="text-center container bg-light" style="width: 30%;">
            <h1 class="pt-5 pb-5"><strong>Register</strong></h1>
            <div class="container ">
                <form action=""  method="post">
                    <?php if(!empty($error)) echo "<div  class='row mt-3 alert alert-danger'  role='alert'> $error </div>"; ?>
                    <div class="row">
                        <div class="col">
                            <input class="border border-dark form-control" type="text" name="first_name"  placeholder="First name">
                        </div>
                        <div class="col">
                            <input class="border border-dark form-control" type="text" name="second_name" placeholder="Second name">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <input class="border border-dark form-control" type="text" name="number" placeholder="Phone">
                        </div>
                        <div class="col">
                            <input class="border border-dark form-control" type="text" name="residence" placeholder="Place of residence">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <input class="border border-dark form-control" type="email" name="email" placeholder="Email address">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label class="form-control  border-0 pb-0">Date of Birth</label>
                        </div>
                        <div class="col">
                            <input class="border border-dark form-control " type="date" name="date" placeholder="Email address">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <input class="border border-dark form-control" type="password" name="password" placeholder="Password">
                        </div>
                        <div class="col">
                            <input class="border border-dark form-control" type="password" name="confirm_password" placeholder="Confirm password">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <button  class="offset-2 col-8  btn btn-lg btn-success btn-block" type="submit" name="submit"><strong>Register</strong></button>
                    </div>
                    <div class="row">
                        <a class="col-md-4 mb-5 offset-4 text-center align-items-center" href="index.php"><strong>Sign in</strong></a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
