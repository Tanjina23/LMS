<?php
 //session_start();
include("admin/connection.php");
include("functions/common_function.php");
//include("checkout.php");
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
  <title>My Cart</title>
</head>
<style>
  @media screen and (max-width: 200px) {
     .scroll{
        width: 100%;
        height: 500px;
        overflow: auto;
     }
}
</style>

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
          <a class="nav-link active" aria-current="page" href="shop2.php">Back to Shop</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"> <i class="fa fa-shopping-cart" aria-hidden="true"><sup>
            <!-- Calling Cart item function -->
            <?php
            cart_item();
            ?>
          </sup></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <!-- Calling total price function -->
            Total Price: <?php total_cart_price()?>/-</a>
        </li>
      </ul>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" name="search_data" placeholder="Search" aria-label="Search">
        <input class="btn btn-secondary" type="submit" value="Search" name="search_data_product" placeholder="Search" aria-label="Search">
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

<main class="container">
    <!-- heading -->
 <div class="heading">
    <H2 style="text-align:center;">My Cart </H2><br><br>
 </div>
 <!-- heading ends -->

<!-- Displaying Cart Values -->
<div class="container">
    <div class="row">
    <div style='overflow-x:auto;'>
    <form method="post">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <!-- <th>Quantity</th> -->
                    <th>Total Price</th>
                    <th>Remove</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                <!-- code to display cart data -->
                <?php
                // global $connect;
                 $get_ip_address = getIPAddress();
                 $total_price = 0;
                 $cart_query = "SELECT * FROM cart_details where ip_address='$get_ip_address'";
                  $res = mysqli_query($connect,$cart_query);
                  while($row=(mysqli_fetch_array($res))){
                     $product_id = $row['product_id'];
                     $select_products = "SELECT * from products where product_id=$product_id";
                     $result_products = mysqli_query($connect,$select_products);
                     while($row_product_price=mysqli_fetch_array($result_products)){
                         $product_price = array($row_product_price['product_price']);
                         $price_table = ($row_product_price['product_price']);
                         $product_title = ($row_product_price['product_title']);
                         $product_image1 = ($row_product_price['product_image1']);
                         $product_values = array_sum($product_price);
                         $total_price += $product_values;
                ?>
                <tr>
                    <td><?php echo  $product_title; ?></td>
                    <td><img style='height:100px; width:100px;' src="admin/product_images/<?php echo  $product_image1; ?>" alt=""></td>
                    <!-- <td>
                      <input type="text" class="form-input" name="qty">
                    </td> -->
                    <!-- Updating quantity -->
                    <?php
                        // $get_ip_address = getIPAddress();
                        // if(isset($_POST['update_cart'])){
                        //   //if(isset($_POST['qty'])){
                        //   $quantities = $_POST['qty'];
                        //   $update_cart = "UPDATE cart_details SET quantity=$quantities WHERE ip_address='$get_ip_address'";
                        //   $res_products_quantity = mysqli_query($connect,$update_cart);
                        //   $total_price = $total_price*$quantities;
                        //  // }
                        // }
                    ?>
                    <td><?php echo  $price_table;?>/-</td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $row['product_id'] ?>"></td>
                    <td>
                       <!-- <button class="btn btn-secondary">Update</button> -->
                       <!-- <input type="submit" class="btn btn-secondary" name="update_cart" value="Update Cart"> -->
                       <input type="submit" class="btn btn-danger" name="remove_cart" value="Remove Cart">
                      <!-- <button class="btn btn-danger">Remove</button> -->
                    </td>
                </tr>
                <?php
            }
        }
        ?>
            </tbody>
        </table>
        </form>
        <!-- Sub Total -->
        <div class="d-flex">
            <h4 class="px-3">Subtotal: <strong class="text-warning"><?php echo  $total_price; ?>/-</strong></h4>
            <a href="shop2.php"><button class="btn btn-info text-light">Continue Buying</button></a>&nbsp&nbsp
            <a href="checkout.php"><button class="btn btn-success text-light">Checkout</button></a>
        </div>
      </div>
    </div>
</div>

<!-- Displaying Cart Values Ends Here -->


<!-- Function to remove item -->
<?php
function remove_cart_item(){
       global $connect;
    if(isset($_POST['remove_cart']))
    {
      if(isset($_POST['removeitem'])){
      foreach($_POST['removeitem'] as $remove_id){
       // echo $remove_id;
        $delete_query = "DELETE From cart_details where product_id = $remove_id";
        $run_delete = mysqli_query($connect,$delete_query);
        if($run_delete){
          echo "<script> windoe.location = 'cart.php'</script>";
        }
      }
    }
    }
}
echo $remove_item = remove_cart_item();
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