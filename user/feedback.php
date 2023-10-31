<?php
session_start();
  include "connection.php";
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
  <style >
         .feedback{
                background-image : url("../images/feedback.jpg");
                /* background-attachment: fixed; */
                background-size: 100% 100%;
                height : 800px;
         }
         .wrapper{
                       width: 900px;
                       height: 750px;
                       background-color: black;
                       opacity: 0.8;
                       color: white;
         }
         .form-control{
             height: 50px;
             width: 80%;
         }
         .scroll{
                    width: 100%;
                    height: 500px;
                    overflow: auto;
         }
 @media screen and (max-width: 500px) {
   .wrapper{
       width: 100%;
       height: 500px;
        overflow: auto;
   }
}

 </style>

  <title>Feedback</title>
</head>

<body>

<header class="sticky-top">
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="../home.php">
      <img class="rounded-circle" src="../images/lms.png" alt="LMS" width="45" height="45"></a>
    <a class="navbar-brand" href="../home.php">Chapter Library</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav  me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="userDashboard.php">Back to Library</a>
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
<!-- header ends -->

<main>
<section>
        <div class="feedback bg-img">
          <div class="container wrapper py-2">
          <h4>If you have any suggestions or questions please comment below.</h4><br>
          <div>
          <form style="" action="" method="post">
              <input  class="form-control"type="text" name="comment" placeholder="Write something here.."><br>
              <input class="btn btn-outline-light"type="submit" name="submit" value="Comment">
           
          </form>
          </div>
          <br>
        <div class="scroll">
           <?php
                 if(isset($_POST['submit'])){
                      $sql ="INSERT INTO `comments` VALUES('','$_SESSION[login_user]','$_POST[comment]');";
                      if(mysqli_query($connect,$sql))
                      {
                           $q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC";
                           $res = mysqli_query($connect,$q);

                           echo "<table class='table table-bordered'>";
                           while($row=mysqli_fetch_assoc($res))
                           {
                              echo "<tr>";
                              echo"<td style='color:white;'>"; echo $row['user_email']; echo"</td>";
                              echo"<td style='color:white;'>"; echo $row['comment']; echo"</td>";
                              echo "</tr>";
                              
                           }
                      }
                 }
                 else
                 {
                  $q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC";
                  $res = mysqli_query($connect,$q);

                  echo "<table class='table table-bordered'>";
                  while($row=mysqli_fetch_assoc($res))
                  {
                     echo "<tr>";
                          echo"<td style='color:white;'>"; echo $row['user_email']; echo"</td>";
                          echo"<td style='color:white;'>"; echo $row['comment']; echo"</td>";
                     echo "</tr>";
                     
                  }
                 }

           ?>
          </div>
        </div>   
        </div>
      

    </section>
</main>

<br>
<!-- footer section -->
<!-- <footer> --> 
  <!-- </footer> -->



  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
    crossorigin="anonymous"></script>


</body>

</html>