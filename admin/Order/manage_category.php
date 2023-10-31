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
$category = '';
$order_number ='';
$id='';

if(isset($_GET['id'] )&& $_GET['id'] > 0)
{
   $id = $_GET['id'];
   $row = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * from category where id = '$id'"));
   $category = $row['category'];
   $order_number = $row['order_number'];
}


 if(isset($_POST['submit']))
 {
    $category = $_POST['category'];
    $order_number = $_POST['order_number'];
    $added_on = date('Y-m-d H:i:s');

    if($id == '')
    {
         $sql = "SELECT * from category where category='$category'";
    }
    else
    {
      $sql = "SELECT * from category where category='$category' and id!='$id'";
    }

    if(mysqli_num_rows(mysqli_query($connect,$sql))> 0 )
       {
         $msg = "Already added!";
       }
       else
       {
        if($id == '')
        {
          mysqli_query($connect,"INSERT INTO  category(id,category,order_number,status,added_on)
          VALUES ('','$category','$order_number',1,'$added_on')");
          ?>
          <script>
            alert("Added successfully!");
          window.location = "category.php";
         </script>
         <?php
        }
        else
        {
          mysqli_query($connect,"UPDATE category set category='$category',order_number='$order_number'
                        where id='$id'");
          ?>
          <script>
            alert("Updated successfully!");
          window.location = "category.php";
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
        <h1 style="text-align:center;" class="">Manage Category</h1>
        <div class="row">
            <div class="strtech-card">
            <div class="card">
                <div class="card-body">
                <form method="post" action="">
                <div class="mb-3">
              <label for="category" class="form-label">Category</label>
              <input type="text" class="form-control" name="category" placeholder="Category name..."
               required="" value="<?php echo $category?>">
             <?php echo"<p class='p-1'style='color:red;'>";echo $msg; echo"</p>"; ?>
            </div>
               <div class="mb-3">
              <label for="order" class="form-label">Order Number </label>
              <input  type="text" class="form-control" name="order_number" placeholder="Order number.."
               required="" value="<?php echo $order_number?>">
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