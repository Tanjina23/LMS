<?php
session_start();
include("connection.php");


//getting products
function get_products(){
    global $connect;

    // condition to check isset or not
    if(!isset($_GET['category'])){
        if(!isset($_GET['publisher'])){
    $qry = "SELECT * from products order by rand()";
    $res = mysqli_query($connect,$qry);
    while($row = mysqli_fetch_assoc($res)){
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $publisher_id = $row['publisher_id'];

        echo "<div class='col-md-4 mb-2'>
        <div class='card' style='width: 18rem;'>
        <img style='height:200px;'src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
        <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>Price: $product_price/-</p>
            <a href='shop2.php?add_to_cart=$product_id' class='btn btn-secondary'>Add to Cart</a>
            <a href='product_details.php?product_id=$product_id' class='btn btn-warning'>View More</a>
        </div>
        </div>
        </div>";
    }
}
}
}
//Products Ends here

//getting category based products
function get_unique_category(){
    global $connect;

    // condition to check isset or not
    if(isset($_GET['category'])){
    $category_id = $_GET['category'];
    $qry = "SELECT * from products where category_id=$category_id";
    $res = mysqli_query($connect,$qry);
    $num_rows = mysqli_num_rows($res);
    if($num_rows == 0){
        echo "<h2 class='text-center text-danger container'>No Stock For this Category</h2>";
    }
    while($row = mysqli_fetch_assoc($res)){
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $publisher_id = $row['publisher_id'];

        echo "<div class='col-md-4 mb-2'>
        <div class='card' style='width: 18rem;'>
        <img style='height:200px;' src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
        <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>Price: $product_price/-</p>
            <a href='shop2.php?add_to_cart=$product_id' class='btn btn-secondary'>Add to Cart</a>
            <a href='product_details.php?product_id=$product_id' class='btn btn-warning'>View More</a>
        </div>
        </div>
        </div>";
    }

}

}
// category based products ends here

//getting publisher based products
function get_unique_publisher(){
    global $connect;

    // condition to check isset or not
    if(isset($_GET['publisher'])){
    $publisher_id = $_GET['publisher'];
    $qry = "SELECT * from products where publisher_id=$publisher_id";
    $res = mysqli_query($connect,$qry);
    $num_rows = mysqli_num_rows($res);
    if($num_rows == 0){
        echo "<h2 class='text-center text-danger container'>This Publisher is Not Available Now</h2>";
    }
    while($row = mysqli_fetch_assoc($res)){
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $publisher_id = $row['publisher_id'];

        echo "<div class='col-md-4 mb-2'>
        <div class='card' style='width: 18rem;'>
        <img style='height:200px;' src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
        <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>Price: $product_price/-</p>
            <a href='shop2.php?add_to_cart=$product_id' class='btn btn-secondary'>Add to Cart</a>
            <a href='product_details.php?product_id=$product_id' class='btn btn-warning'>View More</a>
        </div>
        </div>
        </div>";
    }

}

}
// publisher based products ends here


//Side Navbar Publisher
function get_publisher(){
    global $connect;
$select = "SELECT * from publisher";
$res = mysqli_query($connect,$select);
while($row = mysqli_fetch_assoc($res))
{
    $publisher_title = $row['publisher_title'];
    $publisher_id = $row['publisher_id'];
    echo "<li class='nav-item'>
    <a class='nav-link text-dark' href='shop2.php?publisher=$publisher_id'>$publisher_title</a>
  </li>";
}
}
//Publisher Ends here

// getting Categories
function get_category(){
    global $connect;
    $select1 = "SELECT * from categories";
    $res1 = mysqli_query($connect,$select1);
    while($row = mysqli_fetch_assoc($res1))
    {
        $category_title = $row['category_title'];
        $category_id = $row['category_id'];
        echo "<li class='nav-item'>
        <a class='nav-link text-dark' href='shop2.php?category=$category_id'>$category_title</a>
      </li>";
    }
}
//Categories  Ends here
// Side Navbar ends here


//Searching products
function search_product(){
    global $connect;
    
    if(isset($_GET['search_data_product'])){
        $search_data_value = $_GET['search_data'];
    $search_query = "SELECT * from products where product_keywords like '%$search_data_value%'";
    $res = mysqli_query($connect,$search_query);
    $num_rows = mysqli_num_rows($res);
    if($num_rows == 0){
        echo "<h2 class='text-center text-danger container'>No results match. No products found.</h2>";
    }
    while($row = mysqli_fetch_assoc($res)){
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $publisher_id = $row['publisher_id'];

        echo "<div class='col-md-4 mb-2'>
        <div class='card' style='width: 18rem;'>
        <img style='height:200px;' src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
        <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>$product_description</p>
            <p style='height:100px;width:100px;'class='card-text'>Price: $product_price/-</p>
            <a href='shop2.php?add_to_cart=$product_id' class='btn btn-secondary'>Add to Cart</a>
            <a href='product_details.php?product_id=$product_id' class='btn btn-warning'>View More</a>
        </div>
        </div>
        </div>";
    }
 }
}
//Searching Ends Here


//view Product details

function get_details(){
    global $connect;

    // condition to check isset or not
    if(isset($_GET['product_id']))
    if(!isset($_GET['category'])){
        if(!isset($_GET['publisher'])){
            $product_id = $_GET['product_id'];
    $qry = "SELECT * from products where product_id = $product_id";
    $res = mysqli_query($connect,$qry);
    while($row = mysqli_fetch_assoc($res)){
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_image2 = $row['product_image2'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $publisher_id = $row['publisher_id'];

        echo "<div class='col-md-4 mb-2'>
        <div class='card' style='width: 18rem;'>
        <img style='height:200px;'src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
        <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p style='height:100px;width:100px;class='card-text'>Price: $product_price/-</p>
            <a href='shop2.php?add_to_cart=$product_id' class='btn btn-secondary'>Add to Cart</a>
            <a href='product_details.php?product_id=$product_id' class='btn btn-warning'>View More</a>
        </div>
        </div>
        </div>
        <div class='col-md-8'>
          <div class='row'>
            <div class='col-md-12'><h1></h1></div>
            <div class='col-6'>
            <img src='./admin/product_images/$product_image2' class='card-img-top' alt='$product_title'>
            </div>
            <div class='col-6'>
            <h3 class='card-text p-2'> Product Details</h3>
            <p class='card-text'>$product_description</p>
            </div>
          </div>
     </div>
        ";
    }
}
}
}
// View product details end here


// get IP address of User
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// Get IP address ends here

//get Cart details
function cart(){
         if(isset($_GET['add_to_cart'])){
            global $connect;
            $get_ip_address = getIPAddress();
            $get_product_id = $_GET['add_to_cart'];
            $select_query = "SELECT * FROM cart_details where ip_address='$get_ip_address'
                             and product_id=$get_product_id";
             $res = mysqli_query($connect,$select_query);
             $num_rows = mysqli_num_rows($res);
             if($num_rows > 0){
                 echo "<script>alert('Already added in cart')</script>";
                 echo "<script> 
                 window.location = 'shop2.php';
                </script>";
             }
             else
             {
                $insert_cart = "INSERT INTO cart_details(product_id,ip_address,quantity)
                                VALUES('$get_product_id','$get_ip_address',0)";
                $res = mysqli_query($connect,$insert_cart);
                echo "<script>alert('Added to cart')</script>";
                echo "<script> 
                   window.location = 'shop2.php';
                  </script>";
             }
         }

}
// Cart Ends here

// get cart items
function cart_item(){
    if(isset($_GET['add_to_cart'])){
       global $connect;
       $get_ip_address = getIPAddress();
       $select_query = "SELECT * FROM cart_details where ip_address='$get_ip_address'";
        $res = mysqli_query($connect,$select_query);
        $count_cart_items = mysqli_num_rows($res);
    }
        else
        {
            global $connect;
            $get_ip_address = getIPAddress();
            $select_query = "SELECT * FROM cart_details where ip_address='$get_ip_address'";
             $res = mysqli_query($connect,$select_query);
             $count_cart_items = mysqli_num_rows($res);
        }
    echo $count_cart_items;
}
// get cart items end

//get Total Price 
function total_cart_price(){
    global $connect;
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
            $product_values = array_sum($product_price);
            $total_price += $product_values;
        }
     }
     echo $total_price;
}
// End of Get Total Price

//get user details
function user_details(){
    global $connect;
    $email = $_SESSION['login_user'];
    $get_details = "SELECT * from user where email='$email'";
    $result_query = mysqli_query($connect,$get_details);
    while($row_query = mysqli_fetch_array($result_query)){
        $user_id = $row_query['id'];
        $get_orders = "SELECT * from user_orders where user_id=$user_id and order_status='pending'";
        $result_orders_query = mysqli_query($connect,$get_orders);
        $row_count = mysqli_num_rows($result_orders_query);
        if($row_count > 0){
            echo "<h3 class='text-center'> You have <span class='text-danger'>$row_count</span>
                  pending orders</h3>
                  <p class='text-center t-10'><a href='my_order.php?my_order'>Order Details</a></p>";
        }
        else{
            echo "<h3 class='text-center'> You have zero pending orders</h3>
            <p class='text-center t-10'><a href='../shop2.php?my_order'>Explore Books</a></p>";
        }
    }

}
?>