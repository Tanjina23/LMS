<?php

include("../connection.php");

if(isset($_GET['delete_products'])){
    $delete_id = $_GET['delete_products'];
    $delete_query = "DELETE from products where product_id=$delete_id";
    $result_delete = mysqli_query($connect,$delete_query);
    if($result_delete){
        echo "<script>alert('Deleted successfully')</script>";
        echo "<script>window.location = 'viewProducts.php'</script>";
    }
}

?>