<?php
//  session_start();
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
  <title>Users Order Info</title>
  <style>
  </style>
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
          <a class="nav-link active" aria-current="page" href="../adminDashboard.php">Back to Library</a>
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

<!-- Getting User ID -->
<?php
 $email = $_SESSION['login_user'];
 $get_user = "SELECT * from user where email='$email'";
 $result = mysqli_query($connect,$get_user);
 $row_fetch = mysqli_fetch_assoc($result);
 $user_id = $row_fetch['id'];
?>

<main>

<div class="container">
<h1 class="text-center p-3">List of Users Order</h1>

<div style='overflow-x:auto;'>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr>
            <th>SI No.</th>
            <th>User ID</th>
            <th>Amount Due</th>
            <th>Total Products</th>
            <th>Invoice Number</th>
            <th>Date</th>
            <th>Order Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
          $get_order_details = "SELECT * from user_orders where user_id = $user_id";
          $result_orders = mysqli_query($connect,$get_order_details);
          while($row_orders = mysqli_fetch_assoc($result_orders)){
             $order_id = $row_orders['order_id'];
             $user_id = $row_orders['user_id'];
             $amount_due= $row_orders['amount_due'];
             $total_products = $row_orders['total_products'];
             $invoice_number = $row_orders['invoice_number'];
             $order_status = $row_orders['order_status'];
             $order_date = $row_orders['order_date'];

           echo"  <tr>
            <td>$order_id</td>
            <td>$user_id</td>
            <td>$amount_due</td>
            <td>$total_products</td>
            <td>$invoice_number</td>
            <td>$order_date</td>
            <td> $order_status</td>";

          }

?>
    </tbody>
</table>
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