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
$coupon_code = '';
$coupon_type = '';
$coupon_value = '';
$cart_min_value = '';
$expired_on='';
$id='';

if(isset($_GET['id'] )&& $_GET['id'] > 0)
{
   $id = $_GET['id'];
   $row = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * from coupon_code where id = '$id'"));
   $coupon_code = $row['coupon_code'];
   $coupon_type = $row['coupon_type'];
   $coupon_value = $row['coupon_value'];
   $cart_min_value = $row['cart_min_value'];
   $expired_on = $row['expired_on'];
}


 if(isset($_POST['submit']))
 {
  $coupon_code = $_POST['coupon_code'];
  $coupon_type = $_POST['coupon_type'];
  $coupon_value = $_POST['coupon_value'];
  $cart_min_value = $_POST['cart_min_value'];
  $expired_on = $_POST['expired_on'];
    $added_on = date('Y-m-d H:i:s');

    if($id == '')
    {
         $sql = "SELECT * from coupon_code where coupon_code='$coupon_code'";
    }
    else
    {
      $sql = "SELECT * from coupon_code where coupon_code='$coupon_code' and id!='$id'";
    }

    if(mysqli_num_rows(mysqli_query($connect,$sql))> 0 )
       {
         $msg = "Already added!";
       }
       else
       {
        if($id == '')
        {
          mysqli_query($connect,"INSERT INTO  coupon_code(id,coupon_code,coupon_type,coupon_value,cart_min_value,
              expired_on,coupon_status,added_on)
          VALUES ('','$coupon_code','$coupon_type','$coupon_value','$cart_min_value',
                        '$expired_on',1,'$added_on')");
          ?>
          <script>
            alert("Added successfully!");
          window.location = "coupon_code.php";
         </script>
         <?php
        }
        else
        {
          mysqli_query($connect,"UPDATE coupon_code set coupon_code='$coupon_code',coupon_type='$coupon_type',
                      coupon_value='$coupon_value', cart_min_value='$cart_min_value',expired_on='$expired_on'
                       where id='$id'");
          ?>
          <script>
            alert("Updated successfully!");
          window.location = "coupon_code.php";
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
        <h1 style="text-align:center;" class="">Manage Coupon Code</h1>
        <div class="row">
            <div class="strtech-card">
            <div class="card">
                <div class="card-body">
                <form method="post" action="">
                <div class="mb-3">
              <label for="coupon_code" class="form-label">Coupon Code</label>
              <input type="text" class="form-control" name="coupon_code" placeholder="Coupon Code..."
               required="" value="<?php echo $coupon_code?>">
               <?php echo"<p class='p-1'style='color:red;'>";echo $msg; echo"</p>"; ?>
            </div>
            <div class="mb-3">
              <label for="coupon_type" class="form-label">Coupon Type</label>
              <select name="coupon_type" class="form-control" required="">
                <option value="">Select Type</option>
                <?php
                $arr = array('P'=>'Percentage','F'=>'Fixed');
                foreach($arr as $key=>$val){
                     if($key == $coupon_type){
                      echo "<option value='".$key."'selected>".$val."</option>";
                     }
                     else{
                           echo "<option value='".$key."'>".$val."</option>";
                     }
                }
                ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="coupon_value" class="form-label">Coupon Value</label>
              <input type="text" class="form-control" name="coupon_value" placeholder="Coupon Value..."
               required="" value="<?php echo $coupon_value?>">
            </div>
               <div class="mb-3">
              <label for="cart_min_value" class="form-label">Cart Value</label>
              <input  type="text" class="form-control" name="cart_min_value" placeholder="Cart Value.."
               required="" value="<?php echo $cart_min_value?>">
            </div>
            <div class="mb-3">
              <label for="expired_on" class="form-label">Expired_on</label>
              <input  type="date" class="form-control" name="expired_on" placeholder="Expired on.."
               required="" value="<?php echo $expired_on?>">
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