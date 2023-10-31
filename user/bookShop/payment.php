<?php
 //session_start();
include("../connection.php");
include("../../functions/common_function.php");
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
  <title>Payment Options</title>
</head>

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
          <a class="nav-link active" aria-current="page" href="../userDashboard.php">Back to Library</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../../shop2.php">Back to Book Shop</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- header Ends -->
</header>

<main>
<!-- code to access user id -->
<?php
     
     $user_ip = getIPAddress();
     $get_user = "SELECT * from user where user_ip = '$user_ip'";
     $result = mysqli_query($connect,$get_user);
     $run_query = mysqli_fetch_array($result);
     $user_id = $run_query['id'];
  

?>

<!-- Payment Options -->
<div class="container">
   <h1 class="text-center text-info">Payment Options</h1>

   <div class="row d-flex justify-content-center align-items-center">
    <div class="col-md-6">
    <a href="https://www.bkash.com" target="blank">
        <img style="height:100%; width:50%;" src="../../images/bkash.png" alt="Payment"> </a>
    </div>
    <div class="col-md-6">
        <a href="order.php?user_id=<?php echo $user_id?>">
          <h2 style="font-size: 30px;" class="text-center text-secondary">
          Pay Offline</h2></a>
    </div>
   </div>
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