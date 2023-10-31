<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <title>Admin Login</title>
</head>
<style>
    .log_img{
               height: 540px;
               margin-top: 0px;
               background-image: url("../../images/LMS.jpg");
               background-size: 100% 100%;
        background-repeat: no-repeat;
    }

    .box1{
            height: 400px;
            width: 440px;
            background-color: black;
            margin: 10px auto;
            opacity: .8;
            color: white;
            padding: 20px;
    }

form .login{
              margin: auto 50px;
}

input{
        height: 25px;
        width: 300px;
}
@media screen and (max-width: 500px) {
  .box1 {
      width: 100%;
  }
}
</style>
<body>
    
<header class="sticky-top">
        <nav class="navbar bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand"href="../../home.php" >
              <img class="rounded-circle" src="../../images/lms.png" alt="LMS" width="45" height="45"></a>
              <span><marquee class="text-bg-dark">Welcome back to Chapter Library</marquee></span>
              <form class="d-flex">
                <a href="../../home.php" class="text-light text-decoration-none link-secondary py-2 px-0 px-lg-4">Home</a>
                <a href="Registration.php" class="text-light text-decoration-none link-secondary py-2 px-0 px-lg-4">Register</a>
              </form>
            </div>
          </nav>
    </header>

<main>

<div class="log_img bg-img">
    <br><br><br>
    <div class="box1"><br>
        <h1 style="text-align:center; font-size:30px;">Admin Login</h1><br><br>
        <div class="login">
        <form name="login"action="adminLogin.php" method="post">
        <div class="login">
            <!-- <input type="text" name="name" placeholder="Username" required=""><br><br> -->
            <input class="form-control" type="email" name="email" placeholder="Email" required="" autocomplete="off"><br>
            <input class="form-control" type="password" name="password" placeholder="Password" required="" autocomplete="off"><br>
            <div class="">
            <button class="btn btn-secondary">Login</button>
            </div>
           </div>
        </form>
        <p style="color:white; text-align:center;">
        <br><br>
             New to this website? <a style="color:white;"href="Registration.php">Register here</a>
             </p>
    </div>

</div>

</main>

<footer class="bg-light text-center text-lg-start py-5">
  <!-- Copyright -->
         <div class="text-center p-3">
              © Copyrights 2022 All rights reserved.
            </div>
  <!-- Copyright -->
</footer>

 
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>


</body>
</html>