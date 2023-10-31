<?php
 //session_start();
include("admin/connection.php");
include("functions/common_function.php");
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom CSS -->
  <link rel="stylesheet" href="style.css">
  <title>Library Management System</title>
</head>

<body>
<!-- header section starts -->
<header class="sticky-top">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
  <a class="navbar-brand" href="home.php">
      <img class="rounded-circle" src="images/lms.png" alt="LMS" width="45" height="45"></a>
    <a class="navbar-brand" href="home.php">Chapter Library</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact Us</a>
       </li>
      </ul>
      <form class="d-flex" action="" method="get">
        <input class="form-control me-2" type="search" name="search_data" placeholder="Search" aria-label="Search">
        <input class="btn btn-secondary" type="submit" value="Search" name="search_data_product" placeholder="Search" aria-label="Search">
      </form>
    </div>
  </div>
</nav>
<!-- 2nd Header -->
<nav class="navbar navbar-expand-lg navbar-white bg-secondary">
     <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#">Welcome user</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Log in</a>
        </li>
</ul>
</nav><br>
<!-- header Ends -->
</header>

<main class="container">
    <!-- heading -->
 <div class="heading">
    <H2 style="text-align:center;">Explore Your Book</H2><br><br>
 </div>
 <!-- heading ends -->

 <!-- Books and Sidenav section -->
 <div class="row">
    <!-- Side Navbar -->
     <div class="col-md-2 bg-warning p-0 text-center ">
     <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item bg-secondary">
          <a class="nav-link text-light" href="#"><h4>Publisher</h4></a>
        </li>

        <?php
               //calling function
              get_publisher();
       ?>
</ul>
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item bg-secondary">
          <a class="nav-link text-light" href="#"><h4>Category</h4></a>
        </li>

        <?php
                //calling function
                get_category();
       ?>

</ul>
     </div>
      <!-- Side Navbar Ends -->
      <!-- Books Section -->
      <div class="col-10">
        <div class="row">
        
        <!-- Getting Products data -->
        <?php
        //calling function
         search_product();
         get_unique_category();
         get_unique_publisher();
    
        ?>
        </div>
      </div>
       <!-- Books Section End -->
 </div>

</main>


<br>
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