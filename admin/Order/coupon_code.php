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
  <title>Library Management System</title>
</head>

<style>
  .btn{
          cursor:pointer;
  }
  .badge{
          height: 30px;
          width: 80px;
          font-size: 15px;
  }
</style>

<body>

<!-- Header Section -->
<header class="sticky-top">
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="../../home.php">
      <img class="rounded-circle" src="../../images/lms.png" alt="LMS" width="45" height="45"></a>
    <a class="navbar-brand" href="../../home.php">Chapter Library</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav  me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="../adminDashboard.php">My Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="#">FAQ</a>
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
    <h2 class="py-2"style="text-align: center;">Coupon Code</h2>
<div class="container">
  <a style="text-decoration: none; font-size:25px;"href="manage_coupon_code.php">Add Coupon Code</a><br><br>
<table class="table table-striped table-hover table-responsive">
<thead style="text-align:center;"class="table-info">
    <tr>
      <th width="8%"scope="col">S.No #</th>
      <th width="10%"scope="col">Code</th>
      <th width="10%"scope="col">Type</th>
      <th width="10%"scope="col">Value</th>
      <th width="10%"scope="col">Cart Value</th>
      <th width="10%"scope="col">Expired_on</th>
       <th width="10%"scope="col">Added_on</th>
        <th width="30%"scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
  //  for active deactive
    if(isset($_GET['type']) && $_GET['type']!== '' && isset($_GET['id']) && $_GET['id'] > 0){
         $type = $_GET['type'];
         $id = $_GET['id'];
         //for delete 
         if($type == 'delete'){
          mysqli_query($connect,"delete from coupon_code where id ='$id'");
         //  redirect('category.php');
        }
        
        if($type == 'active' || $type == 'deactive'){
          $coupon_status = 1;
          if($type == 'deactive')
          {
             $coupon_status = 0;
          }
          mysqli_query($connect,"update coupon_code set coupon_status = '$coupon_status' where id ='$id'");
         //  redirect('category.php');
        }

    }

    $sql = "SELECT * from coupon_code order by id desc";
    $res = mysqli_query($connect,$sql);
    if(mysqli_num_rows($res) > 0)
    {  
      while($row=mysqli_fetch_assoc($res)){
      ?>
    <tr style="text-align:center;">
      <!-- <th scope="row">1</th> -->
      <td ><?php echo $row['id'] ?></td>
      <td ><?php echo $row['coupon_code'] ?></td>
      <td ><?php echo $row['coupon_type'] ?></td>
      <td ><?php echo $row['coupon_value'] ?></td>
      <td ><?php echo $row['cart_min_value'] ?></td>
      <td ><?php echo $row['expired_on'] ?></td>
      <td >
        <?php
        $dateStr = strtotime( $row['added_on'] );
         echo date('d-m-Y',$dateStr);
         ?>
    </td>
      <td>
        <?php
        if($row['coupon_status'] == 1)
        {  ?>
      <a href="?id=<?php echo $row['id']?>&type=deactive"><label class="badge bg-success btn ">
          Active</label></a>&nbsp&nbsp
        <?php
        }
        else
        {
          ?>
          <a href="?id=<?php echo $row['id']?>&type=active"><label class=" btn badge bg-warning text-dark">
          Deactive</label></a>&nbsp&nbsp
          <?php
        }
        ?>
         <a href="?id=<?php echo $row['id']?>&type=delete"><label class=" btn badge bg-danger">Delete</label></a>&nbsp&nbsp
        <a href="manage_coupon_code.php?id=<?php echo $row['id']?>"><label class="badge bg-info text-dark">Edit</label></a>&nbsp&nbsp
      </td>
    </tr>
   <?php 
   }
  }
    
     else{
      ?>
            <tr>
                 <td style="text-align:center;"colspan="8">No Data Found </td>
            </tr>
    <?php
     }
    ?>
  </tbody>
  
</table>
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