<?php
session_start();
include("../connection.php");

if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];
   // echo $order_id;
   $select_data = "SELECT * from user_orders where order_id=$order_id";
   $res = mysqli_query($connect,$select_data);
   $row_fetch = mysqli_fetch_assoc($res);
   $invoice_number = $row_fetch['invoice_number'];
   $amount_due = $row_fetch['amount_due'];
}
 
//inserting data 
if(isset($_POST['submit'])){
    $invoice_number = $_POST['invoice_number'];
    $amount = $_POST['amount'];
    $payment_mode = $_POST['payment_mode'];
    $insert_query = "INSERT INTO user_payments(order_id,invoice_number,amount,payment_mode)
                    VALUES($order_id,$invoice_number,$amount,'$payment_mode')";
    $res_query = mysqli_query($connect,$insert_query);
    if($res_query){
        echo "<script>alert('Your order are confirmed.Products will be in your hands within 3/4 days.Thank you')</script>";
        echo "<script>window.location = 'my_order.php';</script>";
    }
    $update_orders = "update user_orders set order_status='Complete' where order_id=$order_id";
    $result = mysqli_query($connect,$update_orders);
}


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
  <title>Confirm Order</title>
</head>

<body class=" bg-secondary">
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
<div class="container my-5">
    <h1 class="text-center text-light p-3">Confirm Order</h1>
    <form action="" method="post">
        <div class="form-outline text-center w-50 m-auto">
          <input type="text" class="form-control w-50 m-auto" name="invoice_number" 
           value="<?php echo $invoice_number; ?>"required="">
        </div>
        <div class="form-outline text-center w-50 m-auto">
            <label>Amount</label>
          <input type="text" class="form-control w-50 m-auto" name="amount" placeholder="amount" 
          value="<?php echo $amount_due; ?>" required="">
        </div><br>
        <div class="form-outline text-center w-50 m-auto">
           <select type="text" name="payment_mode" class="form-select m-auto w-50">
             <option value="">Select a Payment Mode</option>
             <option value="bKash">bKash</option>
             <option value="Cash on Delivery">Cash on Delivery</option>
           </select>
        </div><br>
        <div class="form-outline text-center w-50 m-auto">
            <button type="submit" name="submit"class="btn btn-info text-light">Confirm</button>
        </div><br>
    </form>
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