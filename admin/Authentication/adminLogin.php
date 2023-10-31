<?php
   session_start();

  include("../connection.php");
  $email = $_POST['email'];
  $password = $_POST['password'];
  // $name = $_POST['name'];
  

  $check = mysqli_query($connect, "SELECT * FROM admin WHERE email='$email' AND password='$password' 
                        and status='yes';");

  if(mysqli_num_rows($check) > 0){

      $admindata = mysqli_fetch_array($check);

      $_SESSION['admindata'] = $admindata;
      $_SESSION['login_admin'] = $_POST['email'];
      $_SESSION['userEmail'] = '';

      echo'
      <script>
        window.location = "../adminDashboard.php";
      </script>
  ';


  }
  else{
    echo'
    <script>
      alert("You are not approved yet!");
      window.location = "Login.php";
    </script>
';
  }

?>