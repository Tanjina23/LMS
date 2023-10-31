<?php
include("../connection.php");

if(isset($_GET['delete_category'])){
    $delete_category = $_GET['delete_category'];

    $delete_query = "DELETE from categories where category_id=$delete_category";
    $result = mysqli_query($connect,$delete_query);
    if($result){
        echo "<script>alert('Category deleted successfully!')</script>";
        echo "<script>window.location = 'view_categories.php';</script>";
    }
}

?>