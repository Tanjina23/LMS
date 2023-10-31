<?php

include("../connection.php");

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $cp = $_POST['confirmPassword'];

  $select_query = "SELECT * from admin where name='$name' or email='$email'";
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
       $insert = mysqli_query($connect, "INSERT INTO admin(name,email,password,status)
       VALUES('$name','$email','$password','')");
       if($insert){
        echo'
        <script>
          alert("Registration Successful!");
        </script>';
       }
      }

  

?>