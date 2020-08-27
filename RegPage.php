<?php require("include/bd.php"); ?>
<?php
    session_start();
    if(isset($_SESSION["auto_user"])){
        header("Location:cabinetPage.php");
        exit();
    }
    $error = "";
    if(isset($_POST["submit"])){
        $fname = filter_var(trim($_POST["first_name"]),FILTER_SANITIZE_STRING);
        $sname = filter_var(trim($_POST["second_name"]),FILTER_SANITIZE_STRING);
        $email = filter_var(trim($_POST["email"]),FILTER_SANITIZE_STRING);
        $residence = filter_var(trim($_POST["residence"]),FILTER_SANITIZE_STRING);
        $number = filter_var(trim($_POST["number"]),FILTER_SANITIZE_STRING);
        $date = filter_var(trim($_POST["date"]),FILTER_SANITIZE_STRING);
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];
        if($fname == ''){
            $error[] = "First name empty";
        }
        elseif($sname == ''){
            $error[] =  "Second name empty";
        }
        elseif($email == ''){
            $error[] ="Email empty";
        }
        elseif($password == ''){
            $error[] ="Password empty";

        }
        elseif($residence == ''){
            $error[] ="Place of residence empty";

        }
        elseif($number == ''){
            $error[] ="Number empty";

        }elseif($date == ''){
            $error[] ="Date empty";

        }
        elseif($password == $confirm_password){
            $error[] ="Password mismatch";

        }

        $res=$db->query("SELECT `email` FROM `user` WHERE `email`= '$email' ");
        $user=$res->fetch_assoc();
        if(count($user)){;
            $error[] = "this email already exists";
        }
        if(empty($error)){
            $password = md5($_POST["password"]);
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
<body>
    <div align="center" class="mt-5">
        <h1 >Register</h1>
        <div  class="container mt-5" align="center">
            <?php if(!empty($error)) echo "<div  class='w-25 alert alert-danger'  role='alert'> $error[0] </div>"; ?>
            <form action="" class="mt-5 w-25 container" method="post">
                <p><input class="form-control" type="text" name="first_name"  placeholder="First name"></p>
                <p><input class="form-control" type="text" name="second_name" placeholder="Second name"></p>
                <p><input class="form-control" type="text" name="number" placeholder="Number"></p>
                <p><input class="form-control" type="text" name="residence" placeholder="Place of residence"></p>
                <p><input class="form-control" type="email" name="email" placeholder="Email address"></p>
                <p><label class="form-control border-0 pb-0">Date of Birth</label>
                <input class="form-control " type="date" name="date" placeholder="Email address"></p>
                <p><input class="form-control" type="password" name="password" placeholder="Password"></p>
                <p><input class="form-control" type="password" name="confirm-password" placeholder="Confirm password"></p>
                <p><button  class="btn btn-lg btn-dark btn-block" type="submit" name="submit"><strong>Register</strong></button></p>
                <a href="index.php"><strong>Sign in</strong></a>
            </form>
        </div>
    </div>
</body>

</html>
