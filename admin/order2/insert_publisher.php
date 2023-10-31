<?php
//session_start();
include("../connection.php");

if(isset($_POST['submit'])){
     $publisher_title = $_POST['publisher_title'];
     $select = "SELECT * from publisher where publisher_title = '$publisher_title'";
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
     $insert_query = "INSERT INTO publisher(publisher_title)VALUES('$publisher_title')";
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
    <input type="name" name="publisher_title" placeholder="Insert Publisher..." required="">
</div><br>
<div class="input-group">
    <button name="submit" type="submit" value="insert_publisher"class="btn btn-secondary">Submit</button>
</div>

</form>