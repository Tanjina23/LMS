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
    <title> Library Management System</title>
</head>
<style>
    .log_img{
               height: 650px;
               margin-top: 0px;
               background-image: url("images/LMS.jpg");
               background-size: 100% 100%;
        background-repeat: no-repeat;
    }

    .box1{
            height: 500px;
            width: 440px;
            background-color: black;
            margin: 10px auto;
            opacity: .7;
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
</style>
<body>
    
<header class="sticky-top">
        <nav class="navbar bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand"href="home.php" >
              <img class="rounded-circle" src="images/lms.png" alt="LMS" width="45" height="45"></a>
              <span><marquee class="text-bg-dark">Welcome back to Chapter Library</marquee></span>
              <form class="d-flex">
                <a href="home.php" class="text-light text-decoration-none link-secondary py-2 px-0 px-lg-4">Home</a>
                <a href="register.php" class="text-light text-decoration-none link-secondary py-2 px-0 px-lg-4">Register</a>
              </form>
            </div>
          </nav>
    </header>

<main>

<div class="log_img bg-img">
    <br><br><br>
    <div class="box1"><br>
        <h1 style="text-align:center; font-size:30px;">User Registration</h1><br>
        <form name="login"action="" method="post">
        <div class="login">
            <!-- <input type="text" name="name" placeholder="Username" required=""><br><br> -->
            <div class="input-group mb-3">
         <input type="text" name="name" class="form-control" placeholder="Enter your name"  aria-describedby="basic-addon1" required>
         </div>

         <div class="input-group mb-3">
         <input type="email" name="email" class="form-control" placeholder="Enter your email"  aria-describedby="basic-addon1">
         </div>

         <div class="input-group mb-3">
         <input type="password" name="password" pattern=".{6,}"class="form-control" placeholder="Enter password"  aria-describedby="basic-addon1" required title="6 characters minimum">
         </div>

         <div class="input-group mb-3">
         <input type="password" name="confirmPassword" class="form-control" placeholder="Confirm password"  aria-describedby="basic-addon1">
         </div>
          
         Department :  <select name="department"class="form-select" aria-label="Default select example">
              <option value="CSE">CSE</option>
              <option value="EEE">EEE</option>
              <option value="ACH">ACH</option>
              <option value="BBA">BBA</option>
              <option value="LAW">LAW</option>
         </select>

         <div class="bttn my-4">
         <button class="btn btn-secondary text-white">Register</button>
         </div>
</div>
        </form>
        <p style="color:white; text-align:center;">
        
        
            Already have an account? <a style="color:white;"href="login.php"> Login here </a>
         
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