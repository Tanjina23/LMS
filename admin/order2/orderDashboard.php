<?php
 session_start();
include("../connection.php");
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
  <title>Manage Book Shop</title>
</head>
<style>
    /* Side Navbar */
  body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}
</style>
<body>
<!-- header section starts -->
<header class="sticky-top">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
  <a class="navbar-brand" href="../../home.php">
      <img class="rounded-circle" src="../../images/lms.png" alt="LMS" width="45" height="45"></a>
    <a class="navbar-brand" href="../../home.php">Chapter Library</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../../home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../adminDashboard.php">My Dashboard </a>
        </li>
      </ul>
      <div class="d-flex text-light">
         <?php
            echo $_SESSION['login_admin'];
            ?>
      </div>
    </div>
  </div>
</nav>
</header>
<!-- header Ends -->


<div id="main">
<main class="container">
    <!-- heading -->
 <div class="heading p-3">
    <H2 style="text-align:center;">Manage Details</H2><br><br>
 </div>
 <!-- heading ends -->

 <div class="row text-center">
  <div class="col-md-4 mb-2">
  <div class="card bg-light" style="width: 15rem; height: 8rem;">
  <div class="card-body">
    <h3 class="card-title">Insert Books</h3>
    <a href="insert_products.php" class="card-link">Click here</a>
  </div>
</div>
  </div>
  <div class="col-md-4 mb-2">
  <div class="card bg-light" style="width: 15rem; height: 8rem;">
  <div class="card-body">
    <h3 class="card-title">View Books & Stationary</h3>
    <a href="viewProducts.php?view_products" class="card-link">Click here</a>
    <!-- <a href="#" class="card-link">Another link</a> -->
  </div>
</div>
  </div>
  <div class="col-md-4 mb-2">
  <div class="card bg-light" style="width: 15rem; height: 13rem;">
  <div class="card-body">
    <h3 class="card-title">Insert Categories</h3>
    <a href="orderDashboard.php?insert_category" class="card-link">Click here</a>
     <?php
            if(isset($_GET['insert_category'])){
               include('insert_category.php');
            }
     ?> 
  </div>
</div>
  </div>
  <div class="col-md-4 mb-2">
  <div class="card bg-light" style="width: 15rem; height: 8rem;">
  <div class="card-body">
    <h3 class="card-title">View Categories</h3>
    <a href="view_categories.php?view_categories" class="card-link">Click here</a>
  </div>
</div>
  </div>
  <div class="col-md-4 mb-2">
  <div class="card bg-light" style="width: 15rem; height: 13rem;">
  <div class="card-body">
    <h3 class="card-title">Insert Publisher</h3>
    <a href="orderDashboard.php?insert_publisher" class="card-link">Click here</a>
    <?php
            if(isset($_GET['insert_publisher'])){
               include('insert_publisher.php');
            }
     ?> 
  </div>
</div>
  </div>
  <div class="col-md-4 mb-2">
  <div class="card bg-light" style="width: 15rem; height: 8rem;">
  <div class="card-body">
    <h3 class="card-title">View Publisher</h3>
    <a href="view_publisher.php" class="card-link">Click here</a>
  </div>
</div>
  </div>
  <div class="col-md-4 mb-2">
  <div class="card bg-light" style="width: 15rem; height: 8rem;">
  <div class="card-body">
    <h3 class="card-title">All Orders</h3>
    <a href="list_order.php" class="card-link">Click here</a>
  </div>
</div>
  </div>
  <div class="col-md-4 mb-2">
  <div class="card bg-light" style="width: 15rem; height: 8rem;">
  <div class="card-body">
    <h3 class="card-title">All Payments</h3>
    <a href="view_payment.php" class="card-link">Click here</a>
  </div>
</div>
  </div>
  <div class="col-md-4 mb-2">
  <div class="card bg-light" style="width: 15rem; height: 8rem;">
  <div class="card-body ">
    <h3 class="card-title">Users Order List</h3>
    <a href="users_order_list.php" class="card-link">Click here</a>
  </div>
</div>
  </div>
 </div>

<!-- Inserting values -->
<!-- <div class="container">
     <?php
            // if(isset($_GET['insert_category'])){
            //    include('insert_category.php');
            // }
     ?> 
</div> -->

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