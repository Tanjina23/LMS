<?php

session_start();
 include("admin/connection.php");
 include("admin/constant.php");

$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$message = $_POST['message'];
$added_on = date('Y-m-d h:i:s');

mysqli_query($connect,"INSERT INTO contact_us(name,email,mobile,message,added_on)
              VALUES('$name','$email','$mobile','$message','$added_on')");
?>
<script>
    alert('Thank you for contact with us. We will come back to you soon.')
    window.location="contact.php";
</script>

