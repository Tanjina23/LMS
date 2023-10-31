<?php
//session_start();
include("../connection.php");

if(isset($_POST['submit'])){
     $category_title = $_POST['cat_title'];
     $select = "SELECT * from categories where category_title = '$category_title'";
     $res_select = mysqli_query($connect,$select);
     $number = mysqli_num_rows($res_select);
     if($number > 0)
     {
        ?>
          <script>
            alert("Already added!");
          </script>
        <?php
     }
     else
     {
     $insert_query = "INSERT INTO categories(category_title)VALUES('$category_title')";
     $result = mysqli_query($connect,$insert_query);
     if($result)
     { 
        ?>
          <script>
            alert("Added succesfully!");
          </script>
        <?php
     }
    }
}

?>

<form action="" method="post">

<div class="input-group">
    <input type="name" name="cat_title" placeholder="Insert Category..." required="">
</div><br>
<div class="input-group">
    <button name="submit" type="submit" class="btn btn-secondary">Submit</button>
</div>

</form>