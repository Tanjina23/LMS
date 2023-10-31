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
  <title>Add Books & Stationary</title>
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

<div class="bg-light">
    <div class="container">
        <h1 class="text-center">Insert Products</h1><br>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- Title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product-title</label>
                <input type="text" name="product_title" id="product_title" class="form-control"
                   autocomplete="off" placeholder="Enter Product Title" required="">
            </div>

            <!-- Description-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Description</label>
                <input type="text" name="description" id="description" class="form-control"
                   autocomplete="off" placeholder="Enter description" required="">
            </div>

            <!-- keyword-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product Keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control"
                   autocomplete="off" placeholder="Enter product_keywords" required="">
            </div>

            <!-- categories-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_category" class="form-label">Product Category</label>
                <select name="product_category" id="" class="form-select">
                    <option value="">Select a Category</option>
                    <?php
                     $select_query = "SELECT * from categories";
                     $result_query = mysqli_query($connect,$select_query);
                     while($row= mysqli_fetch_assoc($result_query)){
                        $category_title = $row['category_title'];
                        $category_id = $row['category_id'];
                        echo "<option value='$category_id'>$category_title </option>";
                     }

                    ?>
                </select>
            </div>

             <!-- Publisher-->
             <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_publisher" class="form-label">Product Publisher</label>
                <select name="product_publisher" id="" class="form-select">
                    <option value="">Select a Publisher</option>
                    <?php
                     $select_query = "SELECT * from publisher";
                     $result_query = mysqli_query($connect,$select_query);
                     while($row= mysqli_fetch_assoc($result_query)){
                        $publisher_title = $row['publisher_title'];
                        $publisher_id = $row['publisher_id'];
                        echo "<option value='$publisher_id'>$publisher_title </option>";
                     }

                    ?>
                </select>
            </div>

            <!-- image 1-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product Image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control"
                   required="">
            </div>

             <!-- image 2-->
             <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product Image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control"
                   required="">
            </div>

             <!-- Price-->
             <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control"
                  placeholder="Enter Product Price...." required="">
            </div>

            <!-- Price-->
            <div class="form-outline mb-4 w-50 m-auto text-center">
                <button name="submit" type="submit"class="btn btn-info">Submit</button>
            </div>

        </form>
    </div>
</div>
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




<!-- Inserting data -->
<?php
if(isset($_POST['submit'])){
    
    $product_title = $_POST['product_title'];
    $product_description = $_POST['description'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_publisher = $_POST['product_publisher'];
    $product_price = $_POST['product_price'];

    //accessing images
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];

    //accessing images temp name
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];

    move_uploaded_file($temp_image1,"../product_images/$product_image1");
    move_uploaded_file($temp_image2,"../product_images/$product_image2");

    //insert query
    $insert_products = "INSERT INTO products(product_title,product_description,product_keywords,
                         category_id,publisher_id,product_image1,product_image2,product_price,
                          date, status)VALUES('$product_title','$product_description','$product_keywords',
                          '$product_category','$product_publisher','$product_image1','$product_image2',
                          '$product_price',NOW(),true)";
   $res = mysqli_query($connect,$insert_products);
   if($res){
       echo "<script>alert('Succesfully Added!')</script>";
   }

}

?>