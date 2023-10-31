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
  <style>
         .srch{
                 padding-left:70%;
         }
         @media screen  and (max-width: 700px){
          .srch{
                padding-left: 20%;
        }
 }
         .scroll{
        width: 100%;
        height: 500px;
        overflow: auto;
}
  </style>

  <title>Users Fine Information</title>
</head>
<body>
  <header class="sticky-top">

    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="../../home.php">
          <img class="rounded-circle" src="../../images/lms.png" alt="LMS" width="45" height="45"></a>
        <a class="navbar-brand" href="../../home.php">Chapter Library</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="../adminDashboard.php">Back to Library</a>
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
<br>
             <!-- Search bar -->

  <div class="srch container">
       <form class="navbar-form" action="" method="post" name="form1">
          <div class="d-flex">
             <input style=''class="form-control" type="text" name="search" placeholder="Search here..." required="">&nbsp
             <button style="background-color:#edb79e;" type="submit" name="submit" class="btn btn-default">
              Search
             </button>
          </div>
       </form>
  </div>

<h2 class="text-center">List of Users</h2>
</br>

<!-- Display Users -->
<main>
<?php
session_start();
include("../connection.php");

if(isset($_POST['submit']))
{

  $q = mysqli_query($connect,"SELECT * from fine where email like
                    '%$_POST[search]%'");

  if(mysqli_num_rows($q)==0)
  {
        echo "Sorry! Not found. Try searching again.";
  }
  else
  {
    echo"<div class='container'>";
    echo"<div class='scroll'>";
    echo "<table class='table table-bordered table-hover'>";

    echo"<tr style='background-color: #edb79e; '>";
    
    echo"<th>"; echo"User Email"; echo"</th>";
    echo"<th>"; echo"Book ID"; echo"</th>";
    echo"<th>"; echo"Returned"; echo"</th>";
    echo"<th>"; echo"Days"; echo"</th>";
    echo"<th>"; echo"Fine"; echo"</th>";
    echo"<th>"; echo"Status"; echo"</th>";
    
    echo"</tr>";
    
    while($row=mysqli_fetch_array($q)){
       echo"<tr>";
    
       echo"<td>"; echo $row['email']; echo"</td>";
       echo"<td>"; echo $row['bid']; echo"</td>";
       echo"<td>"; echo $row['returned']; echo"</td>";
       echo"<td>"; echo $row['day']; echo"</td>"; 
       echo"<td>"; echo $row['fine']; echo"</td>"; 
       echo"<td>"; echo $row['status']; echo"</td>"; 
       echo"</tr>";
    }
    echo"</table>";
    echo" </div>";
    echo" </div>";
}

}

   // If button is not pressed
else{
$res = mysqli_query($connect,"SELECT * from fine");

echo"<div class='container'>";
echo"<div class='scroll'>";
echo "<table class='table table-bordered table-hover'>";

echo"<tr style='background-color: #edb79e; '>";

echo"<th>"; echo"User Email"; echo"</th>";
echo"<th>"; echo"Book ID"; echo"</th>";
echo"<th>"; echo"Returned"; echo"</th>";
echo"<th>"; echo"Days"; echo"</th>";
echo"<th>"; echo"Fine"; echo"</th>";
echo"<th>"; echo"Status"; echo"</th>";

echo"</tr>";

while($row=mysqli_fetch_array($res)){
   echo"<tr>";

   echo"<td>"; echo $row['email']; echo"</td>";
   echo"<td>"; echo $row['bid']; echo"</td>";
   echo"<td>"; echo $row['returned']; echo"</td>";
   echo"<td>"; echo $row['day']; echo"</td>"; 
   echo"<td>"; echo $row['fine']; echo"</td>"; 
   echo"<td>"; echo $row['status']; echo"</td>"; 
   echo"</tr>";
}
echo"</table>";
echo" </div>";
echo" </div>";
}


?>

</main>


<footer class="bg-light text-center text-lg-start py-5">
  <!-- Copyright -->
         <div class="text-center p-3">
              © Copyrights 2022 All rights reserved.
            </div>
  <!-- Copyright -->
</footer>

 
 <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
    crossorigin="anonymous"></script>

</body>
</html>