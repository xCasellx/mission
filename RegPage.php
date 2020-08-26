<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
<body>
    <div align="center" class="mt-5">
        <h1 >Register</h1>
        <div  class="container mt-5" align="center">

            <form action="reg.php" class="mt-5 w-25 container" method="post">
                <p><input class="form-control" type="text" name="first_name"  placeholder="First name"></p>
                <p><input class="form-control" type="text" name="second_name" placeholder="Second name"></p>
                <p><input class="form-control" type="email" name="email" placeholder="Email address"></p>
                <p><input class="form-control" type="password" name="password" placeholder="Password"></p>
                <p><input class="form-control" type="password" name="confirm-password" placeholder="Confirm password"></p>
                <p><button  class="btn btn-lg btn-dark btn-block" type="submit" name="submit"><strong>Register</strong></button></p>
                <a href="index.php"><strong>Sign in</strong></a>
            </form>
        </div>
    </div>
</body>

</html>
