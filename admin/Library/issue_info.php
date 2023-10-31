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
  <!-- Custom CSS -->
  <link rel="stylesheet" href="style.css">
  <title>Book Issue Information</title>
</head>
<style>
/* Side Navbar */
body {
  background-image:url("../../images/bookRequest.jpg");
   background-repeat: no-repeat;
  /* background-attachment: fixed;  */
  background-size: 100% 100%;
    height : 800px;
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}

.sidenav {
  height: 100%;
  margin-top: 50px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
/* Side Navbar Ends */

.container{
      height: 600px;
      background-color: pink;
      opacity: 0.8;
      color: maroon;
}
.srch{
        padding-left: 800px;
}
.form-control{
       /* background-color: black; */
}

.scroll{
        width: 100%;
        height: 500px;
        overflow: auto;
}

</style>
<body>

<header class="sticky-top">
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="../../home.php">
      <img class="rounded-circle" src="../../images/lms.png" alt="" width="45" height="45"></a>
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
      <form class="d-flex" style='color:white;'>

      <?php
            echo $_SESSION['login_admin'];
            ?>
  </form>
    </div>
  </div>
</nav>
</header>

<main class="bg-img">
 <!-- Side Navbar -->
 <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">Profile</a>
  <a href="#">Books</a>
  <a href="request.php">Book Request</a>
  <a href="expiredDate.php">Expired List</a>
  <a href="#">Issue Information</a>
</div>

<div id="main">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>

<!-- JavaScript Code -->
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>
<br>
<!-- Side Navbar Ends -->
<br>

<div class="container">
    <h2 class="py-4" style="text-align: center;">Information of Borrowed Books</h2>

    <?php
           $cnt = 0;
           if(isset($_SESSION['login_admin']))
           {
             $sql = " SELECT user.id,user.email,displaybooks.bid,displaybooks.name,displaybooks.authors,displaybooks.edition,
             issue_book.issue, issue_book.return_book FROM user INNER JOIN issue_book ON user.email=issue_book.email 
             INNER join displaybooks ON issue_book.bid = displaybooks.bid WHERE issue_book.approve='Yes'
             ORDER BY `issue_book`.`return_book` ASC";
      
             $res = mysqli_query($connect,$sql);
    echo"<div class='scroll'>";
    echo "<table class='table table-bordered '>";

    echo"<tr style='background-color:#571f1f; color:white; '>";
    
    echo"<th>"; echo"User ID"; echo"</th>";
    echo"<th>"; echo"User Email"; echo"</th>";
    echo"<th>"; echo"Book ID"; echo"</th>";
    echo"<th>"; echo"Book Name"; echo"</th>";
    echo"<th>"; echo"Authors Name"; echo"</th>";
    echo"<th>"; echo"Edition"; echo"</th>";
    echo"<th>"; echo"Issue-Date"; echo"</th>";
    echo"<th>"; echo"Return-Date"; echo"</th>";
    
    
    echo"</tr>";
    
    while($row=mysqli_fetch_array($res)){
          
     $d = date("Y-m-d");
     if($d > $row['return_book'])
     {
          $cnt = $cnt+1;
          $var = '<p style="color:yellow;background-color:red;">EXPIRED</p>';
          mysqli_query($connect,"UPDATE issue_book SET approve='$var' where
          return_book = '$row[return_book]' and approve = 'Yes' limit $cnt;");
     }


       echo"<tr style='color:black;'>";
       echo"<td>"; echo $row['id']; echo"</td>";
       echo"<td>"; echo $row['email']; echo"</td>";
       echo"<td>"; echo $row['bid']; echo"</td>";
       echo"<td>"; echo $row['name']; echo"</td>";
       echo"<td>"; echo $row['authors']; echo"</td>";
       echo"<td>"; echo $row['edition']; echo"</td>";
       echo"<td>"; echo $row['issue']; echo"</td>";
       echo"<td>"; echo $row['return_book']; echo"</td>";
      
       echo"</tr>";
    }
    echo"</table>";
   echo" </div>";
           }

           else
           {
           echo "<h2 class='py-4' style='text-align: center;'>";
            echo"You need to login first to see the information of borrowed books";
            echo"</h2>";

           }
    ?>

</div>
</div>

 <!--  <br> -->
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