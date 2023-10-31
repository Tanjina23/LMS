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
  <title>Library Management System</title>
</head>

<body>
<?php
$msg = '';
$name = '';
$mobile ='';
$password ='';
$id='';

if(isset($_GET['id'] )&& $_GET['id'] > 0)
{
   $id = $_GET['id'];
   $row = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * from delivery_person where id = '$id'"));
   $name = $row['name'];
   $mobile = $row['mobile'];
   $password = $row['password'];
}


 if(isset($_POST['submit']))
 {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $added_on = date('Y-m-d H:i:s');

    if($id == '')
    {
         $sql = "SELECT * from delivery_person where mobile='$mobile'";
    }
    else
    {
      $sql = "SELECT * from delivery_person where mobile='$mobile' and id!='$id'";
    }

    if(mysqli_num_rows(mysqli_query($connect,$sql))> 0 )
       {
         $msg = "Already added!";
       }
       else
       {
        if($id == '')
        {
          mysqli_query($connect,"INSERT INTO  delivery_person(id,name,mobile,password,deliver_status,added_on)
          VALUES ('','$name','$mobile','$password',1,'$added_on')");
          ?>
          <script>
            alert("Added successfully!");
          window.location = "delivery_person.php";
         </script>
         <?php
        }
        else
        {
          mysqli_query($connect,"UPDATE delivery_person set name='$name',mobile='$mobile',
                       password='$password' where id='$id'");
          ?>
          <script>
            alert("Updated successfully!");
          window.location = "delivery_person.php";
         </script>
         <?php
        }
       
 }
 }
?>



<!-- Header Section -->
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
          <a class="nav-link " aria-current="page" href="../adminDashboard.php">My Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="#">FAQ</a>
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
<!-- Header Section Ends -->
<br>

<main>
    <div class="container">
        <h1 style="text-align:center;" class="">Manage Delivery Person</h1>
        <div class="row">
            <div class="strtech-card">
            <div class="card">
                <div class="card-body">
                <form method="post" action="">
                <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" name="name" placeholder="Name..."
               required="" value="<?php echo $name?>">
            </div>
            <div class="mb-3">
              <label for="mobile" class="form-label">Mobile</label>
              <input type="number" class="form-control" name="mobile" placeholder="Mobile..."
               required="" value="<?php echo $mobile?>">
             <?php echo"<p class='p-1'style='color:red;'>";echo $msg; echo"</p>"; ?>
            </div>
               <div class="mb-3">
              <label for="password" class="form-label">Password </label>
              <input  type="password" class="form-control" name="password" placeholder="Password.."
               required="" value="<?php echo $password?>">
            </div>
           
           <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</main>

<br>
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