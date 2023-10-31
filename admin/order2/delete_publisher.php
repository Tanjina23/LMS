<?php
include("../connection.php");

if(isset($_GET['delete_publisher'])){
    $delete_publisher = $_GET['delete_publisher'];

    $delete_query = "DELETE from publisher where publisher_id=$delete_publisher";
    $result = mysqli_query($connect,$delete_query);
    if($result){
        echo "<script>alert('Publisher is deleted successfully!')</script>";
        echo "<script>window.location = 'view_publisher.php';</script>";
    }
}

?>