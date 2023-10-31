<?php
 session_start();
 include("../connection.php");
 include("../constant.php");
 include("../function.php");
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
   <!-- jQuery -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- Custom CSS -->
  <link rel="stylesheet" href="../../style.css">
  <title>Library Management System</title>
</head>

<body>
<?php

// prx(SITE_BOOK_IMAGE);
$msg = '';
$category_id = '';
$book = '';
$book_details = '';
$image = '';
$id='';
$image_status='required';
$image_error = '';


if(isset($_GET['id'] )&& $_GET['id'] > 0)
{
   $id = $_GET['id'];
   $row = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * from book where id = '$id'"));
   $category_id  = $row['category_id'];
   $book = $row['book'];
   $book_details = $row['book_details'];
   $image  = $row['image'];
   $image_status ='';
   
}

if(isset($_GET['book_details_id']) && $_GET['book_details_id'] > 0){
    $book_details_id = $_GET['book_details_id'];
    $id = $_GET['id'];
    mysqli_query($connect,"DELETE from book_details where id = '$book_details_id'");
}

 if(isset($_POST['submit']))
 {
  $category_id = $_POST['category_id'];
  $book = $_POST['book'];
  $book_details = $_POST['book_details'];
  //$image = $_POST['image'];
    $added_on = date('Y-m-d H:i:s');

    if($id == '')
    {
         $sql = "SELECT * from book where book='$book'";
    }
    else
    {
      $sql = "SELECT * from book where book='$book' and id!='$id'";
    }

    if(mysqli_num_rows(mysqli_query($connect,$sql))> 0 )
       {
         $msg = "Already added!";
       }
       else
       {
        $type =  $_FILES['image']['type']; //image validation
        if($id == '')
        {
          if($type !='image/jpeg' && $type != 'image/png'){
             $image_error = "Invalid image format!";
          }
          else{
          $image = rand(111111111,99999999).'_'. $_FILES['image']['name'];
          move_uploaded_file($_FILES['image']['tmp_name'],SERVER_BOOK_IMAGE.$image);
          mysqli_query($connect,"INSERT INTO  book(id,category_id,book,book_details,image,book_status,added_on)
          VALUES ('','$category_id','$book','$book_details','$image',1,'$added_on')");
          //add books attribute
          $bid = mysqli_insert_id($connect);
          $attributeArr = $_POST['attribute'];
          $priceArr = $_POST['price'];

          foreach($attributeArr as $key=>$val){
             $attribute = $val;
             $price = $priceArr[$key];
             mysqli_query($connect,"INSERT INTO book_details(book_id,attribute,price,b_status,added_on)
                          VAlUES('$bid','$attribute','$price',1,'$added_on')");
          }
          ?>
          <script>
            alert("Book added successfully!");
          window.location = "book.php";
         </script>
         <?php
          }
        }
        else
        {
          $image_condition='';
          if($_FILES['image']['name'] != '')
          {
          if($type !='image/jpeg' && $type != 'image/png'){
              $image_error = "Invalid image format!";
           }
           else
           {
            $image = rand(111111111,99999999).'_'. $_FILES['image']['name'];
              move_uploaded_file($_FILES['image']['tmp_name'],SERVER_BOOK_IMAGE.$image);
              $image_condition = ", image='$image'";
           }
          }
          if($image_error == ''){
          $sql = "UPDATE book set category_id='$category_id',book='$book',
          book_details='$book_details' $image_condition where id='$id'";
          mysqli_query($connect,$sql);

          $attributeArr = $_POST['attribute'];
          $priceArr = $_POST['price'];
          $bookdetailsIDArr = $_POST['book_details_id'];
         
          foreach($attributeArr as $key=>$val){
            $attribute = $val;
            $price = $priceArr[$key];

            if(isset($bookdetailsIDArr[$key]))
            {
                $bid = $bookdetailsIDArr[$key];
                mysqli_query($connect,"UPDATE book_details set attribute='$attribute',
                             price='$price' where id='$bid'");
            }
            else
            {
              mysqli_query($connect,"INSERT INTO book_details(book_id,attribute,price,b_status,added_on)
              VAlUES('$id','$attribute','$price',1,'$added_on')");
            }
         }
          ?>
          <script>
            alert("Book updated successfully!");
          window.location = "book.php";
         </script>
         <?php
        }
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


<?php
  $res_category = mysqli_query($connect,"select * from category where status='1'
                   order by category asc");
?>
<main>
    <div class="container">
        <h1 style="text-align:center;" class="">Manage Books</h1>
        <div class="row">
            <div class="strtech-card">
            <div class="card">
                <div class="card-body">
                <form method="post" action="" enctype="multipart/form-data">
                <div class="mb-3">
              <label for="category" class="form-label">Category</label>
              <select name="category_id" class="form-control" required="">
                <?php
                  while($row_category = mysqli_fetch_assoc($res_category)){
                    if($row_category['id'] == $category_id){
                    echo "<option value='".$row_category['id']."'selected>".$row_category['category']."
                    </option>";
                    }
                    else
                    {
                        echo "<option value='".$row_category['id']."'>".$row_category['category']."
                        </option>";
                    }
                  }
                ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="book" class="form-label">Book Name</label>
              <input type="text" class="form-control" name="book" placeholder="Book Name..."
               required="" value="<?php echo $book?>">
               <?php echo"<p class='p-1'style='color:red;'>";echo $msg; echo"</p>"; ?>
            </div>
               <div class="mb-3">
              <label for="book_details" class="form-label">Book Details</label>
              <input  type="text" class="form-control" name="book_details" placeholder="Book Details.."
               required="" value="<?php echo $book_details?>">
            </div>
            <div class="mb-3">
              <label for="image" class="form-label">Book Image</label>
              <input  type="file" class="form-control" name="image" placeholder="Book Image.."
               <?php  echo $image_status?> >
               <?php echo"<p class='p-1'style='color:red;'>";echo $image_error; echo"</p>"; ?>
            </div>
           <!-- Book Attributes -->
           <div class="form-group" id="book_box1">
           <label for="book_details" class="form-label">Book Details</label>
           <?php
            if($id == 0)
            {
              ?>
              <div class="row p-2">
             <div class="col-5">
              <input  type="text" class="form-control" name="attribute[]" placeholder="Books Attribute..">
            </div>
             <div class="col-5">
              <input  type="text" class="form-control" name="price[]" placeholder="Books Price..">
            </div>
            </div>
            <?php
            }
            else
            {
              $book_details_res = mysqli_query($connect,"SELECT * from book_details where book_id='$id'");
              $cnt = 1;
              while($book_details_row = mysqli_fetch_assoc($book_details_res)){
              ?>
              <div class="row p-2">
             <div class="col-5">
             <input  type="hidden" name="book_details_id[]"value="<?php echo $book_details_row['id']?>">
              <input  type="text" class="form-control" name="attribute[]" placeholder="Books Attribute.."
                        value="<?php echo $book_details_row['attribute']?>">
            </div>
             <div class="col-5">
              <input  type="text" class="form-control" name="price[]" placeholder="Books Price.."
              value="<?php echo $book_details_row['price']?>">
            </div>
            <?php
                 if($cnt != 1)
                 {
                  ?>
                  <div class="col-2"><button type="button" class="btn btn-danger" onclick="remove_more('<?php echo $book_details_row['id']?>')">Remove</button></div>
                <?php
                }
            ?>
            </div>
            <?php
            $cnt++;
            }
          }
           ?>
            
          </div><br>
           
           <button type="submit" class="btn btn-primary" name="submit">Submit</button>&nbsp&nbsp
           <button type="button" class="btn btn-secondary" onclick="add_more()">Add More</button>
            </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</main>

<input type="hidden" id="add-more" value="1"/>
<script>
  function add_more(){
    var add_more = jQuery('#add_more').val();
    add_more++;
    jQuery('#add_more').val(add_more);
 var html = '<div class="row" id="box'+add_more+'"><div class="col-5"><input type="text"class="form-control" name="attribute[]" placeholder="Books Attribute.."></div><div class="col-5"><input  type="text" class="form-control" name="price[]" placeholder="Books Price.."></div><div class="col-2"><button type="button" class="btn btn-danger" onclick=remove("'+add_more+'")>Remove</button></div></div>'
         jQuery('#book_box1').append(html);
  }

  function remove(id){
    jQuery('#box'+id).remove();
  }
 
  function remove_more(id){
     var result = confirm('Are you sure');
     if(result == true){
       var cur_path = window.location.href;
       window.location.href = cur_path+"&book_details_id="+id;
     }
  }

</script>

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