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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Library Management System</title>
</head>

<style>
     /* Side Navbar */
  body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}

.sidenav {
  height: 100%;
  margin-top: 50px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>

<body>

<!-- Header Section -->
<header class="sticky-top">

<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="../../home.php">
      <img class="rounded-circle" src="../../images/lms.png" alt="" width="45" height="45"></a>
    <a class="navbar-brand" href="../../home.php">Chapter Library</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav  me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="../../home.php">Home</a>
        </li>
         <li class="nav-item">
          <a class="nav-link " aria-current="page" href="../displayBooks.php">Books</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="userInformation.php">User Information</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="../feedback.php">Feedback</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="bookOrder.php">Book Order</a>
        </li>
      </ul>
      <span><marquee class="text-bg-dark">Welcome back to Chapter Library</marquee></span>
      <form class="d-flex" style='color:white;'>

      <a href="admin_status.php"><span><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
  <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
</svg></span><span class="badge" style="background-color: #016c4b;"></span>
<?php
    $r2 = mysqli_query($connect,"SELECT COUNT(status) as total FROM admin where
    status='' ;");
    $d = mysqli_fetch_assoc($r2);
    echo $d['total'];
?>
</a>&nbsp&nbsp
      
      <a class="nav-link " href="../message.php"><span>
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-envelope-check-fill" viewBox="0 0 16 16">
  <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 4.697v4.974A4.491 4.491 0 0 0 12.5 8a4.49 4.49 0 0 0-1.965.45l-.338-.207L16 4.697Z"/>
  <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686Z"/>
</svg></span><span class="badge" style="background-color: #016c4b;">
   <!-- counting message  -->
   <?php
         $r = mysqli_query($connect,"SELECT COUNT(status) as total FROM message where
         status='no' and sender='user' ;");
         $count = mysqli_fetch_assoc($r);
         echo $count['total'];
    ?>
</span></a> &nbsp &nbsp

      <?php
            echo $_SESSION['login_admin'];
            ?>

    <a class="px-2"href="../home.php"><button class="btn btn-outline-light" type="button">Log Out</button></a>
    <!-- <a href="register.php"><button class="btn btn-outline-light" type="button">Register</button></a> -->
  </form>
    </div>
  </div>
</nav>
</header>
<!-- Header Section Ends -->

 <!-- Side Navbar -->
 <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
 <div class="h"> <a href="#">Profile</a> </div>
 <div class="h"> <a href="category.php">Category</a> </div>
 <div class="h"> <a href="manage_user.php">Manage Users</a> </div>
 <div class="h"> <a href="delivery_person.php">Manage Deliver</a> </div>
 <div class="h"> <a href="coupon_code.php">Coupon Code</a> </div>
 <div class="h"> <a href="book.php">Book</a> </div>
 <!-- <div class="h"> <a href="deleteBook.php">Delete Books</a> </div> -->
 <div class="h"> <a href="bookRequest.php">Book Request</a> </div>
 <div class="h"> <a href="issue_info.php">Issue Information</a> </div>
 <div class="h"> <a href="expiredDate.php">Expired List</a> </div>
 <div class="h"> <a href="admin_status.php">Approved Admin</a> </div>
 <div class="h"> <a href="userInformation.php">Users Information</a> </div>
</div>

<div id="main">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>

<!-- JavaScript Code -->
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>

<!-- Side Navbar Ends -->



 
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


</div>
</body>
</html>