<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sign in</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
 <body>
     <div align="center" class="mt-5">
         <h1>Sign in</h1>
         <div class = "container mt-5 ">
             <form class = "w-25 " action="check.php" method="post">
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