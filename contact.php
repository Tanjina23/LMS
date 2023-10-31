<?php
 session_start();
 include("admin/connection.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="style.css">
  <title>Contact Us</title>
</head>
<style>
    .container{
           width: 60%;
           background-color: black;
           color:white;
    }
    .bg-image{
      background-image: url("../../images/contact.jpg");
    }
</style>
<body>
<!-- Header Section -->
<header class="sticky-top">
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php">
      <img class="rounded-circle" src="images/lms.png" alt="LMS" width="45" height="45"></a>
    <a class="navbar-brand" href="home.php">Chapter Library</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav  me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="home.php">Home</a>
        </li>
      </ul>
      <!-- <form class="d-flex">
    <a class="px-2"href="../login.php"><button class="btn btn-outline-light" type="button">Login</button></a>
    <a href="../register.php"><button class="btn btn-outline-light" type="button">Register</button></a>
  </form> -->
    </div>
  </div>
</nav>
</header>
<!-- Header Section Ends -->
<br>
<main>
  <div class="bg-image">
    <div class="contact-us container">
         <h1 style="text-align:center;">Get in Touch</h1>
         <form action="contact_us.php" method="post">
      <div class="form-group">
    <label for="exampleFormControlInput1">Name</label>
    <input type="text" class="form-control" name="name"placeholder="Name..." required="" autocomplete="off">
  </div><br>
  <div class="form-group">
    <label for="exampleFormControlInput1">Email</label>
    <input type="email" class="form-control" name="email" placeholder="Email.." required="" autocomplete="off">
  </div><br>
  <div class="form-group">
    <label for="exampleFormControlInput1">Mobile</label>
    <input type="text" class="form-control" name="mobile" placeholder="Mobile.." required="" autocomplete="off">
  </div><br>
  
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Message</label>
    <textarea class="form-control" name="message" rows="3"></textarea>
  </div><br><br>

   <div class="text-center">
  <button style=""name="submit" type="submit" class="btn btn-secondary">Submit</button></div><br>
</form>
    </div>
    </div>
    <br><br><br>
</main>
</body>
<footer class="bg-light text-center text-lg-start py-5">
  <!-- Copyright -->
         <div class="text-center p-3">
              © Copyrights 2022 All rights reserved.
            </div>
  <!-- Copyright -->
</footer>


</script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>


</body>
</html>