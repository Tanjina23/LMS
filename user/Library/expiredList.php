<?php
 //session_start();
 include("../connection.php");
 include("calculateFine.php");
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
  <title>Expired Date Info</title>
</head>
<style>
/* Side Navbar */
body {
  background-image:url("../../images/bookRequest.jpg");
   background-repeat: no-repeat;
  /* background-attachment: fixed;  */
  background-size: 100% 100%;
    height : 1000px;
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}


.container{
      height: 800px;
      width: 80%;
      background-color: pink;
      opacity: 0.8;
      color: maroon;
      margin-top: -85px;
}
.srch{
        padding-left: 70%;
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
          <a class="nav-link " aria-current="page" href="../../home.php">Home</a>
        </li>
         <li class="nav-item">
          <a class="nav-link " aria-current="page" href="../userDashboard.php">Back to Library</a>
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

<main class="bg-img">
<br>

<div class="container">
    <h2 class="py-4" style="text-align: center;">Date Expired List</h2>

         <?php
           $cnt = 0;
           if(isset($_SESSION['login_user']))
           {
            ?>
              <div style="float: left; padding: 25px;">
                   <form action="" method="post">
                   <button name="submit2" type="submit" class="btn btn-secondary" style="background-color: green">RETURNED</button>&nbsp &nbsp
                   <button name="submit3" type="submit" class="btn btn-secondary" style="background-color: maroon">EXPIRED</button>
                   </form>                 
                  </div><br>
            <!-- Calculate Fine Section -->
                <div style="float: right; padding-top: 20px">
                <?php
                  $var = 0;
                  $result = mysqli_query($connect,"SELECT * FROM fine where email='$_SESSION[login_user]'
                            and status = 'not paid'");
                  while($r = mysqli_fetch_assoc($result))
                  {
                      $var = $var + $r['fine'];
                  }
                  $var2 = $var + $_SESSION['fine'];
                ?>
                    <h2> Your fine is : 
                          <?php
                           $_SESSION['day'] = $day;
                              echo $var2." TK";
                          ?>
                    </h2>
                </div>
                 <!-- Calculate Fine Section End -->
            <br>
          <?php
                //  if(isset($_POST['submit']))
                //  {
                //   $var1 = '<p style="color:yellow;background-color:green;">RETURNED</p>';
                //   mysqli_query($connect,"UPDATE issue_book SET approve='$var1' where
                //    email = '$_POST[email]' and bid = '$_POST[bid]';");
                //  }

           } ?>

          <!-- <h2 class="py-4" style="text-align: center;">Date Expired List</h2> -->
            <?php
            if(isset($_SESSION['login_user']))
            {
             $ret = '<p style="color:yellow;background-color:green;">RETURNED</p>';
             $exp = '<p style="color:yellow;background-color:red;">EXPIRED</p>';
            
            if(isset($_POST['submit2']))
            {
              $sql = " SELECT user.id,user.email,displaybooks.bid,displaybooks.name,displaybooks.authors,displaybooks.edition,
              issue_book.approve,issue_book.issue, issue_book.return_book FROM user INNER JOIN issue_book ON user.email=issue_book.email 
              INNER join displaybooks ON issue_book.bid = displaybooks.bid WHERE issue_book.approve = '$ret' ORDER BY issue_book.return_book DESC";
          $res = mysqli_query($connect,$sql);
        }
            else if(isset($_POST['submit3']))
            {

              $sql = " SELECT user.id,user.email,displaybooks.bid,displaybooks.name,displaybooks.authors,displaybooks.edition,
             issue_book.approve,issue_book.issue, issue_book.return_book FROM user INNER JOIN issue_book ON user.email=issue_book.email 
             INNER join displaybooks ON issue_book.bid = displaybooks.bid WHERE issue_book.approve ='$exp'  ORDER BY issue_book.return_book DESC";
          $res = mysqli_query($connect,$sql);
        }
            else
            {
              $sql = " SELECT user.id,user.email,displaybooks.bid,displaybooks.name,displaybooks.authors,displaybooks.edition,
              issue_book.approve,issue_book.issue, issue_book.return_book FROM user INNER JOIN issue_book ON user.email=issue_book.email 
              INNER join displaybooks ON issue_book.bid = displaybooks.bid WHERE issue_book.approve!=' ' and 
              issue_book.approve!='Yes' and issue_book.approve!='No'  ORDER BY issue_book.return_book DESC";
            
            $res = mysqli_query($connect,$sql);
          }

  //  $res = mysqli_query($connect,$sql);
    echo"<div class='scroll'>";
    echo "<table class='table table-bordered '>";

    echo"<tr style='background-color:#571f1f; color:white; '>";
    
    echo"<th>"; echo"User ID"; echo"</th>";
    echo"<th>"; echo"User Email"; echo"</th>";
    echo"<th>"; echo"Book ID"; echo"</th>";
    echo"<th>"; echo"Book Name"; echo"</th>";
    echo"<th>"; echo"Authors Name"; echo"</th>";
    echo"<th>"; echo"Edition"; echo"</th>";
    echo"<th>"; echo"Status"; echo"</th>";
    echo"<th>"; echo"Issue-Date"; echo"</th>";
    echo"<th>"; echo"Return-Date"; echo"</th>";
    
    
    echo"</tr>";
    
    while($row=mysqli_fetch_array($res)){

       echo"<tr style='color:black;'>";
       echo"<td>"; echo $row['id']; echo"</td>";
       echo"<td>"; echo $row['email']; echo"</td>";
       echo"<td>"; echo $row['bid']; echo"</td>";
       echo"<td>"; echo $row['name']; echo"</td>";
       echo"<td>"; echo $row['authors']; echo"</td>";
       echo"<td>"; echo $row['edition']; echo"</td>";
       echo"<td>"; echo $row['approve']; echo"</td>";
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

<footer class="bg-light text-center text-lg-start py-5">
  <!-- Copyright -->
         <div class="text-center p-3">
              © Copyrights 2022 All rights reserved.
            </div>
  <!-- Copyright -->
</footer>

 
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>


</body>
</html>