<?php
session_start();
include("../connection.php");


     $day = 0;
    if(isset($_SESSION['login_user']))
    {
        $exp1 = '<p style="color:yellow;background-color:red;">EXPIRED</p>';
        $res1 = mysqli_query($connect,"SELECT return_book from issue_book where
         email='$_SESSION[login_user]' and approve='$exp1';");

         while($row = mysqli_fetch_assoc($res1))
         {
             $d = strtotime($row['return_book']);
             $c = strtotime(date("Y-m-d"));
             $diff = $c - $d;

             if($diff >= 0)
             {
                 $day = $day + floor($diff / (60*60*24)); //converting time to days
             }
         }
         $_SESSION['fine'] = $day * 10;
    }

?>