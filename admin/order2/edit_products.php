<?php
//session_start();
include("../connection.php");

//fetching products data
if(isset($_GET['edit_products'])){
    $edit_id = $_GET['edit_products'];
    $get_data = "SELECT * from products where product_id=$edit_id";
    $result = mysqli_query($connect,$get_data);
    $row = mysqli_fetch_assoc($result);
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_keywords = $row['product_keywords'];
    $category_id = $row['category_id'];
    $publisher_id = $row['publisher_id'];
    $product_image1= $row['product_image1'];
    $product_image2 = $row['product_image2'];
    $product_price = $row['product_price'];
   
   
   }

// Fetching Category data
$select_category = "SELECT * from categories where category_id=$category_id";
$result_category = mysqli_query($connect,$select_category);
$row_category = mysqli_fetch_assoc($result_category);
$category_title = $row_category['category_title'];
//echo $category_title;

// Fetching Publisher data
$select_publisher = "SELECT * from publisher where publisher_id=$publisher_id";
$result_publisher = mysqli_query($connect,$select_publisher);
$row_publisher = mysqli_fetch_assoc($result_publisher);
$publisher_title = $row_publisher['publisher_title'];
//echo $publisher_title;

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
 
<!-- Form for Updating -->
<div class="container mt-5">
<h1 class="text-center">Edit Product</h1>

<form action="" method="post" enctype="multipart/form-data">
  <div class="form-outline w-50 m-auto mb-4">
    <label for="product_title" class="form-label">Product Title</label>
    <input type="text" class="form-control" name="product_title" value="<?php echo $product_title?>"
    placeholder="Product Title.." required="">
  </div>

  <div class="form-outline w-50 m-auto mb-4">
    <label for="product_desc" class="form-label">Product Description</label>
    <input type="text" class="form-control" name="product_description" value="<?php echo $product_description?>"
    placeholder="Product Description.." required="">
  </div>

  <div class="form-outline w-50 m-auto mb-4">
    <label for="product_keywords" class="form-label">Product Keywords</label>
    <input type="text" class="form-control" name="product_keywords" value="<?php echo $product_keywords?>"
    placeholder="Product keywords.." required="">
  </div>

  <div class="form-outline w-50 m-auto mb-4">
  <label for="product_keywords" class="form-label">Category</label>
    <select name="product_category" class="form-select">
        <option value="<?php echo $category_title?>"><?php echo $category_title?></option>
        <?php
        // Fetching Category data
        $select_category_all = "SELECT * from categories";
        $result_category_all = mysqli_query($connect,$select_category_all);
        while($row_category_all = mysqli_fetch_assoc($result_category_all)){
            $category_title = $row_category_all['category_title'];
            $category_id = $row_category_all['category_id'];
            echo "<option value='$category_id'>$category_title</option>";
        }
        ?>
    </select>
  </div>

  <div class="form-outline w-50 m-auto mb-4">
  <label for="product_keywords" class="form-label">Publisher</label>
    <select name="product_publisher" class="form-select">
        <option value="<?php echo $publisher_title?>"><?php echo $publisher_title?></option>
        <?php
        // Fetching publisher data
        $select_publisher_all = "SELECT * from publisher";
        $result_publisher_all = mysqli_query($connect,$select_publisher_all);
        while($row_publisher_all = mysqli_fetch_assoc($result_publisher_all)){
            $publisher_title = $row_publisher_all['publisher_title'];
            $publisher_id = $row_publisher_all['publisher_id'];
            echo "<option value='$publisher_id'>$publisher_title</option>";
        }
        ?>
    </select>
  </div>

  <div class="form-outline w-50 m-auto mb-4">
    <label for="product_image1" class="form-label">Product Image1</label>
    <div class="d-flex">
    <input type="file" class="form-control w-90 m-auto" name="product_image1" required="">&nbsp
    <img style="height:10%; width:10%;" src="../product_images/<?php echo $product_image1?>" alt="book">
    </div>
  </div>

  <div class="form-outline w-50 m-auto mb-4">
    <label for="product_image2" class="form-label">Product Image2</label>
    <div class="d-flex">
    <input type="file" class="form-control w-90 m-auto" name="product_image2" required="">&nbsp
    <img style="height:10%; width:10%;" src="../product_images/<?php echo $product_image2?>" alt="book">
    </div>
  </div>

  <div class="form-outline w-50 m-auto mb-4">
    <label for="product_price" class="form-label">Product Price</label>
    <input type="text" class="form-control" name="product_price" value="<?php echo $product_price?>"
    placeholder="Product Price.." required="">
  </div>

  <div class="form-outline w-50 m-auto mb-4 text-center">
    <button type="submit" name="submit" class="btn btn-secondary">Update Products</button>
  </div>

</form>
</div>

<!-- Updating Data -->
<?php
if(isset($_POST['submit'])){
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_publisher = $_POST['product_publisher'];
    $product_price = $_POST['product_price'];

    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];

    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];

    move_uploaded_file($temp_image1,"../product_images/$product_image1");
    move_uploaded_file($temp_image2,"../product_images/$product_image2");

    // update query
    $update_query = "UPDATE products set product_title='$product_title',product_description='$product_description',
                     product_keywords='$product_keywords',category_id='$product_category',
                     publisher_id='$product_publisher',product_image1='$product_image1',
                     product_image2='$product_image2',product_price='$product_price',date=NOW()
                     where product_id='$edit_id'";
    
    $result_update = mysqli_query($connect,$update_query);

    if($result_update){
        echo "<script>alert('Updated successfully!')</script>";
        echo "<script>window.location = 'viewProducts.php'</script>";

    }

}

?>

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