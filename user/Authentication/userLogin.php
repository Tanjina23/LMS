<?php
   session_start();

  include("../connection.php");
  $email = $_POST['email'];
  $password = $_POST['password'];
  // $name = $_POST['name'];

  $check = mysqli_query($connect, "SELECT * FROM user WHERE email='$email' AND password='$password'");

  if(mysqli_num_rows($check) > 0){
      
      $userdata = mysqli_fetch_array($check);
      $_SESSION['userdata'] = $userdata;

      // $q = mysqli_query($connect,"SELECT * FROM user WHERE name ='$name'");
      $_SESSION['login_user'] = $_POST['email'];
      echo'
      <script>
        window.location = "../userDashboard.php";
      </script>
  ';


  }
  else{
    echo'
    <script>
      alert("User not found!");
      window.location = "Login.php";
    </script>
';
  }

?>