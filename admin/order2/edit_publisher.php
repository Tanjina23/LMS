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
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"> <i class="fa fa-shopping-cart" aria-hidden="true"><sup>1</sup></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price: 100/-</a>
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
 <h3 class="text-center text-success mt-5">Edit Category</h3>

<!-- Fetching Data -->
<?php
if(isset($_GET['edit_publisher'])){
     $edit_publisher = $_GET['edit_publisher'];

     $get_publisher = "SELECT * from publisher where publisher_id=$edit_publisher";
     $result = mysqli_query($connect,$get_publisher);
     $row = mysqli_fetch_assoc($result);
     $publisher_title = $row['publisher_title'];
}
 if(isset($_POST['submit'])){
     $pub_title = $_POST['publisher_title'];

     $update_query = "UPDATE publisher set publisher_title='$pub_title' where publisher_id=$edit_publisher";
     $result_publisher = mysqli_query($connect,$update_query);
     if($result_publisher){
         echo "<script>alert('Publisher is updated successfully');</script>";
         echo "<script>window.location = 'view_publisher.php';</script>";
     }

    }

?>


<div class="container mt-3 m-auto w-50 text-center">
   <form action="" method="post">
      <input class="form-control" type="text" name="publisher_title" 
      placeholder="Enter Publisher Title" required="" value="<?php echo  $publisher_title?>"><br>
      <button type="submit" name="submit" class="btn btn-secondary">Update</button>
   </form>
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