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
    <title>Add Book</title>
</head>

<!-- Custom CSS -->
<style>

  /* Side Navbar */
  body {
    background-color: pink;
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}


.h:hover{
          color:white;
          width:300px;
          height: 50px;
          background-color: #2c5f63;
}

.book{
       width: 50%;
       margin: 0px auto;
}
</style>
<body>
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
          <a class="nav-link " aria-current="page" href="../adminDashboard.php">Back to Library</a>
        </li>
      </ul>
      <form class="d-flex" style='color:white;'>
      <?php
            echo $_SESSION['login_admin'];
            ?>

    <!-- <a class="px-2"href="../home.php"><button class="btn btn-outline-light" type="button">Log Out</button></a> -->
    <!-- <a href="register.php"><button class="btn btn-outline-light" type="button">Register</button></a> -->
  </form>
    </div>
  </div>
</nav>
</header>


<div id="main">
  <!-- Add New Books Section -->
  <div class="container" style="text-align:center;">
       <h2 style="text-align:center;" class="p-3">Add New Books</h2><br>
       <form class="book" action="" method="post">
         <input type="text" name="name" class="form-control" placeholder="Book Name" required=""><br>
         <input type="text" name="authors" class="form-control" placeholder="Authors Name" required=""><br>
         <input type="text" name="edition" class="form-control" placeholder="Edition" required=""><br>
         <input type="text" name="status" class="form-control" placeholder="Status/Is the book available " required=""><br>
         <input type="text" name="quantity" class="form-control" placeholder="Number of Books/Quantity" required=""><br>
         <input type="text" name="category" class="form-control" placeholder="Category" required=""><br>
       
          <button type="submit" name="submit"class="btn btn-secondary" style='width: 80px;'>Add</button>
        
        </form>
  </div>


  <?php
          if(isset($_POST['submit'])){
              mysqli_query($connect,"INSERT INTO displaybooks
              VALUES ('','$_POST[name]', '$_POST[authors]', '$_POST[edition]', 
              '$_POST[status]', '$_POST[quantity]', '$_POST[category]','0');");
              ?>
              <script>
              alert("Book added successfully!");
             </script>
       
       <?php
               }
               else
               {
                ?>
                <!-- <script>
              alert("You need to login first!");
             </script> -->
             <?php
               }
               
          ?>
  </div>
<br>
   



 
   <!--  <br> -->
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