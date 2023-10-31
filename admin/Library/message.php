<?php

 include("../connection.php");
 include("header.php");

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
  <title>User Messages</title>
</head>

<style>
.left_box{
           height: 600px;
           width: 500px;
           float: left;
           background-color: #69adb1;
         /* margin-top: -20px; */
}
.left_box2{
    height:600px;
    width: 300px;
    background-color:#366b6e ;
    border-radius: 20px;
    float: right;
    margin-right: 50px;

}
.list{
        height: 500px;
        width: 300px;
        background-color: #366b6e;
        float: right;
        color: white;
        padding: 10px;
        overflow-y: scroll;
        overflow-x: hidden;
}

.right_box{
               height: 600px;
               width: 1000px;
               background-color: #69adb1;
               margin-left: 263px ;
               /* margin-top: -20px; */
               padding: 10px;
}
.right_box2{
    height:600px;
    width: 600px;
    padding: 20px;
    margin-top: -12px;
    border-radius: 20px;
    background-color:#366b6e;
    float: left;
    color: white; 

}
.table{
        color: white;
}
tr:hover{
       background-color: #279ca3;
       cursor: pointer;
}

.left_box input{
     width : 150px;
     height: 50px;
     background-color: #366b6e;
     padding: 10px;
     margin: 10px;
     border-radius: 10px;
}
.form-control{
        height: 47px;
        width: 80%;
}

.mesg{
        height : 450px;
        /* background-color: maroon; */
        overflow-y: scroll;
}
.btn-secondary{
    background-color:#016c4b;
}

.chat{
          display: flex;
          flex-flow: row wrap;
}

.user .chatBox{
    height : 50px;
    width: 470px;
    padding: 13px 10px;
    background-color: #764261;
    color: white;
    border-radius: 10px;
   
}

.admin .chatBox{
    height : 50px;
    width: 470px;
    padding: 13px 10px;
    background-color: #8b424f;
     color: white;
    border-radius: 10px;
    order: -1;
}

</style>

<body style="width: 1263px; height: 595px;">

<?php
       $sql1 = mysqli_query($connect,"SELECT user.name,message.email FROM user INNER JOIN
             message ON user.email = message.email group by email ORDER BY status;");
?>

  <!-- --------------Left Box------------ -->
<div class="left_box">
    <div class="left_box2">
        <div style="color: white;">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="text" name="email" id="uemail" required="">
                <button type="submit" name="submit" class="btn btn-secondary">Show</button>
            </form>
        </div>
        <div class="list">
            <?php
                   echo"<table id='table' class='table'>";
                   while($res1=mysqli_fetch_assoc($sql1)){
                   echo"<tr>";
                      echo"<td>"; echo $res1['name']; echo"</td>";
                      echo"<td>"; echo $res1['email']; echo"</td>";
                   echo"</tr>";
                   }
                   echo"</table>";
            ?>
        </div>

    </div>

</div>

 <!-- --------------Right Box------------ -->
<div class="right_box"> 
    <div class="right_box2">
        <?php
    /*.................if submit is pressed............*/
               if(isset($_POST['submit']))
               {
                   $res = mysqli_query($connect,"SELECT * from message where 
                   email='$_POST[email]';");

                   mysqli_query($connect,"UPDATE message SET status='yes' where 
                                 sender = 'user' and email = '$_POST[email]';");

                   if($_POST['email'] != ''){
                       $_SESSION['userEmail'] = $_POST['email'];
                   }
                   
                ?>
                    <div style="height:70px; width:100%;text-align:center;color:white;">
                      <h3 style="margin-top: -5px; padding-top:10px;">
                          <?php
                                echo $_SESSION['userEmail'];
                          ?>
                      </h3>
                    </div>
  <!-- message section -->
     <div class="mesg">
           <br>

    <?php
    
            while($row=mysqli_fetch_assoc($res))
            {
              if($row['sender'] == 'user')
              {
           
    ?>

           <!-- User Chat -->
           <div class="chat user">
              <div style="float: left; padding-top: 5px;">
                   &nbsp&nbsp
                   <!-- user profile picture will be added here -->
                   <img style="height:40px; width:40px; border-radius:50%;" src="../../images/message.jpg" alt="admin">&nbsp
              </div>
              <div style="float: left;" class="chatBox">
                   <?php
                          echo $row['message'];
                   ?>
              </div>
           </div>
           <br>
           <?php
              }
              else
              {
              ?>
           <!-- Admin Chat -->
           <div class="chat admin">
              <div style="float: left; padding-top: 5px;">
              &nbsp
                   <!-- Admin profile picture will be added here -->
                  <img style="height:40px; width:40px; border-radius:50%;" src="../../images/message.jpg" alt="admin">&nbsp
              </div>
              <div style="float: left;" class="chatBox">
                  <?php
                          echo $row['message'];
                   ?>
              </div>
           </div>
           <br>
           <?php
          }
        }
          ?>
          <br>
     </div>
      <!-- message section ends -->

                    <div>
                    <div style="height:50px; padding-top:10px;">
          <form action="" method="post">
              <input style="float: left;" type="text" name="message" class="form-control"placeholder="Write Message..."required="">&nbsp &nbsp
               <button class="btn btn-secondary btn-lg" type="submit" name="submit1"><span><svg xmlns="http://www.w3.org/2000/svg" width="45" height="30" fill="currentColor" class="bi bi-cursor-fill" viewBox="0 0 16 16">
  <path d="M14.082 2.182a.5.5 0 0 1 .103.557L8.528 15.467a.5.5 0 0 1-.917-.007L5.57 10.694.803 8.652a.5.5 0 0 1-.006-.916l12.728-5.657a.5.5 0 0 1 .556.103z"/>
</svg></span></button>
          </form>
        </div>
               </div>

                <?php
               }
            /*----------- If the button is not Pressed---------*/
           
            else
            {
                if($_SESSION['userEmail'] == '')
                {
                     echo "<h2>"; echo"There is no messages";    echo"</h2>";
                }
                else
                {
                    if(isset($_POST['submit1']))
                    {
                        mysqli_query($connect,"INSERT INTO `message` VALUES('','$_SESSION[userEmail]',
                       '$_POST[message]','no','admin');");

                        $res = mysqli_query($connect,"SELECT * from message where 
                        email='$_SESSION[userEmail]';");
                    }
                    else
                    {
                        $res = mysqli_query($connect,"SELECT * from message where 
                        email='$_SESSION[userEmail]';");
                    }
                    ?>
                       <div style="height:70px; width:100%;text-align:center;color:white;">
                      <h3 style="margin-top: -5px; padding-top:10px;">
                          <?php
                                echo $_SESSION['userEmail'];
                          ?>
                      </h3>
                    </div>

                     <!-- message section -->
     <div class="mesg">
           <br>

    <?php
    
            while($row=mysqli_fetch_assoc($res))
            {
              if($row['sender'] == 'user')
              {
           
    ?>

           <!-- User Chat -->
           <div class="chat user">
              <div style="float: left; padding-top: 5px;">
                   &nbsp&nbsp
                   <!-- user profile picture will be added here -->
                   <img style="height:40px; width:40px; border-radius:50%;" src="../images/message.jpg" alt="admin">&nbsp
              </div>
              <div style="float: left;" class="chatBox">
                   <?php
                          echo $row['message'];
                   ?>
              </div>
           </div>
           <br>
           <?php
              }
              else
              {
              ?>
           <!-- Admin Chat -->
           <div class="chat admin">
              <div style="float: left; padding-top: 5px;">
              &nbsp
                   <!-- Admin profile picture will be added here -->
                  <img style="height:40px; width:40px; border-radius:50%;" src="../images/message.jpg" alt="admin">&nbsp
              </div>
              <div style="float: left;" class="chatBox">
                  <?php
                          echo $row['message'];
                   ?>
              </div>
           </div>
           <br>
           <?php
          }
        }
          ?>
          <br>
     </div>
      <!-- message section ends -->
      <div>
                    <div style="height:50px; padding-top:10px;">
          <form action="" method="post">
              <input style="float: left;" type="text" name="message" class="form-control"placeholder="Write Message..."required="">&nbsp &nbsp
               <button class="btn btn-secondary btn-lg" type="submit" name="submit1"><span><svg xmlns="http://www.w3.org/2000/svg" width="45" height="30" fill="currentColor" class="bi bi-cursor-fill" viewBox="0 0 16 16">
  <path d="M14.082 2.182a.5.5 0 0 1 .103.557L8.528 15.467a.5.5 0 0 1-.917-.007L5.57 10.694.803 8.652a.5.5 0 0 1-.006-.916l12.728-5.657a.5.5 0 0 1 .556.103z"/>
</svg></span></button>
          </form>
        </div>
               </div>
                  <?php
                }
            }
        ?>
    </div>

</div>

<script>
 
   var table = document.getElementById('table'),eIndex;
   for(var i = 0; i < table.rows.length; i++)
   {
     table.rows[i].onclick = function()
     {
        rIndex = this.rowIndex;
        document.getElementById("uemail").value = this.cells[1].innerHTML;
     }
   }

</script>

<footer class="bg-light text-center text-lg-start py-5">
  <!-- Copyright -->
         <div class="text-center p-3">
              © Copyrights 2022 All rights reserved.
            </div>
  <!-- Copyright -->
</footer>

 
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>


</body>
</html>