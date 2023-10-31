<?php
 session_start();
 include("connection.php");
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
  <title>My Dashboard</title>
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

        .srch{
                        padding-left:60%;
                }

            @media screen and (max-width: 760px){
                .srch{
                      padding-left:30%;
                }
            }
     .scroll{
        width: 100%;
        height: 500px;
        overflow: auto;
}


</style>
<body>
       <!-----------Trending Books/News Section ------------->
        <?php
                $b = mysqli_query($connect,"SELECT * FROM `displaybooks` order by bcount DESC
                                   limit 0,3 ;");
        ?>
       <!-----------Trending Books/News Section ------------->

<header class="sticky-top">
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="../home.php">
      <img class="rounded-circle" src="../images/lms.png" alt="" width="45" height="45"></a>
    <a class="navbar-brand" href="../home.php">Chapter Library</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav  me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="../home.php">Home</a>
        </li>
         <li class="nav-item">
          <a class="nav-link " aria-current="page" href="Library/displayBooks.php">Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../shop2.php">Visit Book Shop</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="feedback.php">Feedback</a>
        </li>
      </ul>
      <form class="d-flex" style='color:white;'>
          <a class="nav-link " href="Library/message.php"><span>
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-envelope-check-fill" viewBox="0 0 16 16">
  <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 4.697v4.974A4.491 4.491 0 0 0 12.5 8a4.49 4.49 0 0 0-1.965.45l-.338-.207L16 4.697Z"/>
  <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686Z"/>
</svg></span><span class="badge" style="background-color: #016c4b;">
   <!-- counting message  -->
   <?php
         $r = mysqli_query($connect,"SELECT COUNT(status) as total FROM message where
         status='no' and email = '$_SESSION[login_user]' and sender='admin' ;");
         $count = mysqli_fetch_assoc($r);
         echo $count['total'];
    ?>
</span></a> &nbsp &nbsp
        
      <?php
            echo $_SESSION['login_user'];
            ?>

<a class="px-2"href="Authentication/logout.php"><button class="btn btn-outline-light" type="button">Log Out</button></a>
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
         <!-- ----------- Trending Books/News Section ------------
        <div style=" width:100%; height:50px;">
              <div style="background-color: brown; padding:10px; width: 10%; height: 50px;
                          float: left;">
                <h4 class=""style="color: white; margin-top: 0px;">Trending:</h4>
              </div>
              <div style="background-color:#5e0f1d; width:90%; height: 50px;
                          float: left; padding: 10px;">
                  <table>
                    <?php
                          // while($b2 = mysqli_fetch_assoc($b))
                          // {
                          //   echo"<tr style='color:white; width: 400px; float:left;
                          //          margin-top:0px;'>";
                          //   echo"<td>"; echo "[".$b2 ['bid']."] &nbsp"; echo"</td>";
                          //   echo"<td>"; echo $b2['name']; echo"</td>";
                          //   echo"</tr>";
                          // }
                    ?>
                    < <tr style="color:white; width: 400px; margin-top: 0px; float:left;"> aaa</tr> -->
                  <!-- </table>

              </div>
        </div>  -->
          <!----------- Trending Books Section Ends ------------>

 <!-- Side Navbar -->
 <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="Library/displayBooks.php">Books</a>
  <a href="Library/bookRequest.php">Book Request</a>
  <a href="Library/expiredList.php">Expired Info</a>
  <a href="Library/issue_info.php">Issue Information</a>
  <a href="Library/fine.php">Fine </a>
  <a href="bookShop/my_order.php">My Order</a>
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

<!-- Side Navbar Ends -->
<br>
        <!-- Search bar -->
 <div class="srch container">
       <form class="navbar-form" action="" method="post" name="form1">
        <!-- For Category -->
        <div class="category d-flex">
          <label for="category">Choose a Category : </label>
          <select name="category" class="form-select">
            <optgroup label="Academic">
             <option>CSE</option>
             <option>EEE</option>
             <option>ACH</option>
             <option>BBA</option>
             <option>LAW</option>
             <option>Science</option>
            </optgroup>
            <optgroup label="Non-Academic">
             <option>Novel</option>
             <option>Horror Story</option>
             <option>Short Story</option>
             <option>Thriller</option>
             <option>Science Fictions</option>
            </optgroup>
          </select>
        </div><br>
         <!-- Category Ends -->
          <div class="d-flex">
             <input style=''class="form-control" type="text" name="search" placeholder="Search books..." required="">&nbsp
             <br>
             <button style="background-color:#edb79e;" type="submit" name="submit" class="btn btn-default">
              <span class="bi bi-search"></span>Search
             </button>
          </div>
       </form>
  </div>
<!-- Searching Ends -->

<br>
  <!-- Request Book -->
<div class="srch container">
       <form class="navbar-form" action="" method="post" name="form1">
          <div class="d-flex">
             <input style=''class="form-control" type="text" name="bid" placeholder="Enter Book ID..." required="">&nbsp
             <br>
             <button style="background-color:#edb79e;" type="submit" name="submit1" class="btn btn-default">
             Request
             </button>
          </div>
       </form>
  </div>
<!-- Request Book Ends -->

<br>
<h2 class="text-center">List of Books</h2>
</br>

<!-- Display Available Books -->
<main>

<?php
if(isset($_POST['submit']))
{

  $q = mysqli_query($connect,"SELECT * from displaybooks where name like
                    '%$_POST[search]%' and category='$_POST[category]'");

  if(mysqli_num_rows($q)==0)
  {
        echo "Sorry! No book. Try searching again.";
  }
  else
  {
    echo"<div style='overflow-x:auto;'>";
echo "<table class='table table-bordered table-hover'>";
echo"<tr style='background-color: #edb79e; '>";

echo"<th>"; echo"ID"; echo"</th>";
echo"<th>"; echo"Book-Name"; echo"</th>";
echo"<th>"; echo"Authors Name"; echo"</th>";
echo"<th>"; echo"Edition"; echo"</th>";
echo"<th>"; echo"Status"; echo"</th>";
echo"<th>"; echo"Quantity"; echo"</th>";
echo"<th>"; echo"Category"; echo"</th>";

echo"</tr>";

while($row=mysqli_fetch_array($q)){
   echo"<tr>";

   echo"<td>"; echo $row['bid']; echo"</td>";
   echo"<td>"; echo $row['name']; echo"</td>";
   echo"<td>"; echo $row['authors']; echo"</td>";
   echo"<td>"; echo $row['edition']; echo"</td>";  
   echo"<td>"; echo $row['status']; echo"</td>";
   echo"<td>"; echo $row['quantity']; echo"</td>";
   echo"<td>"; echo $row['category']; echo"</td>";
   
   echo"</tr>";
}
echo"</table>";
echo"</div>";
  }

}

   // If button is not pressed
else{
$res = mysqli_query($connect,"SELECT * FROM displaybooks");

echo"<div style='overflow-x:auto;'>";
echo "<table class='table table-bordered table-hover'>";
echo"<tr style='background-color: #edb79e; '>";

echo"<th>"; echo"ID"; echo"</th>";
echo"<th>"; echo"Book-Name"; echo"</th>";
echo"<th>"; echo"Authors Name"; echo"</th>";
echo"<th>"; echo"Edition"; echo"</th>";
echo"<th>"; echo"Status"; echo"</th>";
echo"<th>"; echo"Quantity"; echo"</th>";
echo"<th>"; echo"Category"; echo"</th>";

echo"</tr>";

while($row=mysqli_fetch_array($res)){
   echo"<tr>";

   echo"<td>"; echo $row['bid']; echo"</td>";
   echo"<td>"; echo $row['name']; echo"</td>";
   echo"<td>"; echo $row['authors']; echo"</td>";
   echo"<td>"; echo $row['edition']; echo"</td>";  
   echo"<td>"; echo $row['status']; echo"</td>";
   echo"<td>"; echo $row['quantity']; echo"</td>";
   echo"<td>"; echo $row['category']; echo"</td>";
   
   echo"</tr>";
}
echo"</table>";
echo"</div>";
}

//Issue Book
if(isset($_POST['submit1'])){
   if(isset($_SESSION['login_user']))
   {
      // If the book is not available
      $sql1 = mysqli_query($connect,"SELECT * from displaybooks where bid='$_POST[bid]';");
      $row1 = mysqli_fetch_assoc($sql1);
      $count1 = mysqli_num_rows($sql1);
      if($count1 != 0)
      {
      mysqli_query($connect,"INSERT INTO issue_book VALUES('','$_SESSION[login_user]','$_POST[bid]',
      '','','');");
      ?>
       <script>
           window.location="Library/bookRequest.php";
       </script>
       <?php
      }
      else
      {
        ?>
       <script>
           alert("The book is not available!");
       </script>
       <?php
      }
   }
   else{
         ?>
          <script>
            alert("You need to login first!");
          </script>
          <?php
   }
}

?>

</main>

<footer>
    <footer class="bg-light text-center text-lg-start">
      <!-- Grid container -->
      <div class="container p-5">
        <!--Grid row-->
        <div class="row">
          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <ul class="list-unstyled mb-0">
              <li>
                <h4>Social</h4>
                <a href="https://www.facebook.com" ><img  src="../images/facebook.png" alt="" width="45" height="45"></a><br><br>
                <a href="https://www.twitter.com" ><img  src="../images/twitter.png" alt="" width="45" height="45"></a><br><br>
                <a href="https://www.linkedin.com" ><img  src="../images/linkedin.png" alt="" width="45" height="45"></a><br><br>
                <a href="https://www.instagram.com"><img  src="../images/instagram.png" alt="" width="45" height="45"></a><br><br>
              </li>
            </ul>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <ul class="list-unstyled">
              <li>
                <h4>Links</h4>
                <a href="../home.php" class="text-dark text-decoration-none link-info">Home</a><br><br>
                <a href="#benefits" class="text-dark text-decoration-none link-info">Benefits</a><br><br>
                <a href="#" class="text-dark text-decoration-none link-info">Blog</a>
              </li>
            </ul>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">

            <ul class="list-unstyled mb-0">
              <li>
                <h4>Guides</h4>
                <a href="#" class="text-dark text-decoration-none link-info">Contact</a><br><br>
                <a href="#" class="text-dark text-decoration-none link-info">FAQ</a><br><br>
                <a href="#" class="text-dark text-decoration-none link-info">Privacy Policy</a><br><br>
                <a href="#" class="text-dark text-decoration-none link-info">Terms & Conditions</a><br><br>
              </li>
            </ul>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">

            <ul class="list-unstyled">
              <li>
                <h4>Community</h4>
                <a href="#" class="text-dark text-decoration-none link-info">Issues</a><br><br>
                <a href="#" class="text-dark text-decoration-none link-info">Discussions</a><br><br>
              </li>
            </ul>
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </div>
      <!-- Grid container -->

      <!-- Copyright -->
      <div class="text-center p-3">
        <hr>
        © Copyrights 2022 All rights reserved.
      </div>
      <!-- Copyright -->
    </footer>
  </footer>

 <!-- JavaScript Bundle with Popper -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
  crossorigin="anonymous"></script>
 
</div>
</body>
</html>