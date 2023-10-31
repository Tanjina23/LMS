<?php

  //include("connection.php");
  include("../../functions/common_function.php");

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $cp = $_POST['confirmPassword'];
  $address = $_POST['address'];
  $mobile = $_POST['mobile'];
  $user_ip = getIPAddress();


  $select_query = "SELECT * from user where email='$email'";
  $res = mysqli_query($connect,$select_query);
  $num_rows = mysqli_num_rows($res);

  if($num_rows > 0){
      ?>
        <script>alert('User alreday exists');
         window.location="Registration.php";
      </script>
      <?php
  }
  else if($password != $cp){
       ?>
       <script>alert('Password does not match');
         window.location="Registration.php";
      </script>
       <?php
  }
  else{
       $insert = mysqli_query($connect, "INSERT INTO user(name,email,password,address,mobile,user_ip)
       VALUES('$name','$email','$password','$address','$mobile','$user_ip')");
       if($insert){
        echo'
        <script>
          alert("Registration Successful!");
        </script>';
       }
      }

// Selecting Cart Items
$select_cart_items = "SELECT * from cart_details where ip_address='$user_ip'";
$result_cart = mysqli_query($connect,$select_cart_items);
$rows_count = mysqli_num_rows($result_cart);
if($rows_count > 0){
  $_SESSION['login_user'] = $email;
  echo "<script>alert('You have some items in your cart')</script>";
  echo "<script>window.location = '../bookShop/checkout.php';</script>";
}
else{
  echo "<script>window.location = '../';</script>";
} 


?>