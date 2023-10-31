<?php
 //session_start();
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
  <title>Send Message to Admin</title>
</head>
<style>
      .msg{
        background-image: url("../../images/message3.png");
        background-size: 100% 100%;
                height : 700px;
        background-repeat: no-repeat;
      }

    .wrapper{
               height: 600px;
               width:500px;
               background-color: black;
               color: white;
               opacity: .9;
               margin: -20px auto;
               padding: 10px;
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
    width: 400px;
    padding: 13px 10px;
    background-color: #764261;
    color: white;
    border-radius: 10px;
    order: -1;
}

.admin .chatBox{
    height : 50px;
    width: 400px;
    padding: 13px 10px;
    background-color: #8b424f;
     color: white;
    border-radius: 10px;
}
@media  screen and (max-width : 500px) {
       .wrapper{
           width: 100%;
           height: 500px;
           overflow: auto;
       }
}

</style>
<body>
<!-- Fetching Messages -->

<?php
           if(isset($_POST['submit']))
             {
                mysqli_query($connect,"INSERT INTO `message` VALUES('','$_SESSION[login_user]',
                '$_POST[message]','no','user');");

                 $res = mysqli_query($connect,"SELECT * from message where 
                 email = '$_SESSION[login_user]';");
             }
             else
             {
                 $res = mysqli_query($connect,"SELECT * from message where 
                 email = '$_SESSION[login_user]';");
             }

             mysqli_query($connect,"UPDATE message set status='yes' where sender = 'admin'
                           and email = '$_SESSION[login_user]';");
      ?>
  <!-- Fetching Message -->


<!-- message section -->
<div class="msg bg-img">
      <div class="wrapper">
     <div style="height:70px; width:100%; background-color:#016c4b;text-align:center;
       color:white">
        <h3 class="py-3">Admin</h3>
     </div>  

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

     <!-- message box -->
     <div style="height:100px; padding-top:10px;">
          <form action="" method="post">
              <input style="float: left;" type="text" name="message" class="form-control"placeholder="Write Message..."required="">&nbsp &nbsp
               <button class="btn btn-secondary btn-lg" type="submit" name="submit"><span><svg xmlns="http://www.w3.org/2000/svg" width="45" height="30" fill="currentColor" class="bi bi-cursor-fill" viewBox="0 0 16 16">
  <path d="M14.082 2.182a.5.5 0 0 1 .103.557L8.528 15.467a.5.5 0 0 1-.917-.007L5.57 10.694.803 8.652a.5.5 0 0 1-.006-.916l12.728-5.657a.5.5 0 0 1 .556.103z"/>
</svg></span></button>
          </form>
        </div>
       </div>
      </div>


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