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
  <!-- Custom CSS -->
  <link rel="stylesheet" href="style.css">
  <title>User Messages</title>
</head>


<body>

<?php
       $r = mysqli_query($connect,"SELECT COUNT(status) as total FROM message where
       status='no' and sender='user' ;");
       $count = mysqli_fetch_assoc($r);
?>



<!-- header section -->
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
      <a class="nav-link " href="message.php"><span><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-envelope-check-fill" viewBox="0 0 16 16">
  <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 4.697v4.974A4.491 4.491 0 0 0 12.5 8a4.49 4.49 0 0 0-1.965.45l-.338-.207L16 4.697Z"/>
  <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686Z"/>
</svg></span><span class="badge" style="background-color: #016c4b;"> 
  <!-- counting message  -->
    <?php
         echo $count['total'];
    ?>
</span></a>&nbsp &nbsp
          <!-- </span></a> &nbsp &nbsp -->
      <?php
            echo $_SESSION['login_admin'];
            ?>

      <!-- <br> -->
      <!-- <a href="../home.php"><button class="blackbtn">Log Out</button></a><br><br> -->
    <!-- <a class="px-2"href="login.php"><button class="btn btn-outline-light" type="button">Login</button></a>
    <a href="register.php"><button class="btn btn-outline-light" type="button">Register</button></a> -->
  </form>
    </div>
  </div>
</nav>

<!-- <div class="navbar-inner">
    <nav class="navbar bg-dark navbar-expand-lg">
        <div class="container-fluid">
          <a class="navbar-brand" href="home.php">
          <img class="rounded-circle" src="lms.png" alt="" width="45" height="45"></a>
          <h4 class="text-light">Harmony Library</h4>
          
          <span><marquee class="text-bg-dark">Harmony Library</marquee></span>

          <form class="d-flex">
            <ul class="navbar-nav flex-row flex-wrap bd-navbar-nav ">
      <li><a href="home.php" class="text-light text-decoration-none link-secondary py-2 px-0 px-lg-4">Home</a></li>
      <li><a href="#benefits" class="text-light text-decoration-none link-secondary py-2 px-0 px-lg-4">Benefits</a></li>
      <li><a href="#" class="text-light text-decoration-none link-secondary py-2 px-0 px-lg-4">FAQ</a></li>
      <li><a href="#" class="text-light text-decoration-none link-secondary py-2 px-0 px-lg-4">Blog</a></li>
      <li><a href="login.php" class="text-light text-decoration-none link-secondary py-2 px-0 px-lg-4">Login</a></li>
       </ul>
          </form>
        </div>
      </nav>
</div> -->
</header>
<!-- header Ends -->

</script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>
</html>