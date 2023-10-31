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
  <title>View All Payments</title>
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
          <a class="nav-link active" aria-current="page" href="orderDashboard.php">My Dashboard</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<!-- 2nd Header -->
<!-- <nav class="navbar navbar-expand-lg navbar-white bg-secondary">
     <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#">Welcome user</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Log in</a>
        </li>
</ul>
</nav><br> -->
<!-- header Ends -->
</header>
<main>
<div class="container">
 <h3 class="text-center text-success mt-5">All Payments</h3>
 <div style='overflow-x:auto;'>
 <table class="table table-bordered mt-5 text-center">
    <thead class="bg-warning">
     <!-- Fetching data -->
     <?php
     $get_payment = "SELECT * from user_payments";
     $result = mysqli_query($connect,$get_payment);
     $cnt = mysqli_num_rows($result);

  if($cnt == 0){
     echo "<h2 class='text-danger text-center mt-5'>No payments done yet</h2>";
  }

  else{ 
    echo "
    <tr>
    <th>SI No.</th>
    <th>Invoice Number</th>
    <th> Amount</th>
    <th>Payment Mode</th>
    <th>Date</th>
    <th>Delete</th>
 </tr> </thead>";
    ?>
    <tbody class="bg-light">
    <?php  
         while($row_data = mysqli_fetch_assoc($result)){
            $payment_id = $row_data['payment_id'];
            $invoice_number = $row_data['invoice_number'];
            $amount = $row_data['amount'];
            $payment_mode = $row_data['payment_mode'];
            $date = $row_data['date'];
              ?>
           <tr> 
           <td><?php echo $payment_id ?></td>
           <td><?php echo $invoice_number ?></td>
           <td><?php echo $amount ?></td>
           <td><?php echo $payment_mode ?></td>
           <td><?php echo $date ?></td>
    <td><a href='delete_order_details.php?delete_order=<?php echo $order_id ?>' class='text-warning'>Delete</a></td>
       </tr>
       <?php
         }
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