<?php

include("../connection.php");

if(isset($_GET['delete_order'])){
    $delete_id = $_GET['delete_order'];
    $delete_query = "DELETE from user_orders where order_id=$delete_id";
    $result_delete = mysqli_query($connect,$delete_query);
    if($result_delete){
        echo "<script>alert('Deleted successfully')</script>";
        echo "<script>window.location = 'list_order.php'</script>";
    }
}

?>