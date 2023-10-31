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
  <title>Book Request</title>
</head>
<style>
/* Side Navbar */
body {
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

</style>
<body>

<header class="sticky-top">
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="../../home.php">
      <img class="rounded-circle" src="../../images/lms.png" alt="" width="45" height="45"></a>
    <a class="navbar-brand" href="../home.php">Chapter Library</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav  me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="../userDashboard.php">Back to Library</a>
        </li>
         <li class="nav-item">
          <a class="nav-link " aria-current="page" href="displayBooks.php">Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../feedback.php">Feedback</a>
        </li>
      </ul>
      <form class="d-flex" style='color:white;'>

      <?php
            echo $_SESSION['login_user'];
            ?>

      <!-- <br> -->
      <!-- <a href="../home.php"><button class="blackbtn">Log Out</button></a><br><br> -->
    <!-- <a class="px-2"href="login.php"><button class="btn btn-outline-light" type="button">Login</button></a>
    <a href="register.php"><button class="btn btn-outline-light" type="button">Register</button></a> -->
  </form>
    </div>
  </div>
</nav>

</header>

<main>
 <!-- Side Navbar -->
 <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">Profile</a>
  <a href="#">Books</a>
  <a href="request.php">Book Request</a>
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
<?php
if(isset($_SESSION['login_user']))
{

  $q = mysqli_query($connect,"SELECT * from issue_book where email = '$_SESSION[login_user]'
                    and approve='';");

  if(mysqli_num_rows($q)==0)
  {
        echo "<h1>There is no pending request</h1>";
  }
  else
  {
    ?>
 <form method="post">
<?php
echo "<table class='table table-bordered table-hover'>";
echo"<tr style='background-color: #edb79e; '>";

echo"<th>"; echo"Select"; echo"</th>";
echo"<th>"; echo"ID"; echo"</th>";
echo"<th>"; echo"Approve"; echo"</th>";
echo"<th>"; echo"Issue-Date"; echo"</th>";
echo"<th>"; echo"Return-Date"; echo"</th>";


echo"</tr>";

while($row=mysqli_fetch_array($q)){
   echo"<tr>";?>

   <td><input type="checkbox" name="check[]" value="<?php echo $row["bid"] ?>"></td>
   <?php
   echo"<td>"; echo $row['bid']; echo"</td>";
   echo"<td>"; echo $row['approve']; echo"</td>";
   echo"<td>"; echo $row['issue']; echo"</td>";
   echo"<td>"; echo $row['return_book']; echo"</td>";  
  
   echo"</tr>";
}
echo"</table>";
?>
<p class="text-center"><button class="btn btn-danger" type="submit" name="delete" onclick="location.reload()">
    Delete</button></p>
</form>
<?php
  }
}
?>

<!-- Deleting Book Request Query  -->
<?php
if(isset($_POST['delete']))
{
  if(isset($_POST['check']))
  {
    foreach($_POST['check'] as $delete_id){
      mysqli_query($connect,"DELETE FROM issue_book where bid='$delete_id' and 
                   email='$_SESSION[login_user]' ORDER BY bid ASC LIMIT 1");
    }
  }
}

?>
</body>
</html>