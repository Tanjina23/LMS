<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <title> Library Management System</title>
</head>
<body>
    
<header>
        <nav class="navbar bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="home.php">
              <img class="rounded-circle" src="lms.png" alt="LMS" width="40" height="40"></a>
              <form class="d-flex">
                <a href="home.php"><button class="btn btn-outline-light me-2" type="button">Home</button></a>
                <a href="about.php"><button class="btn btn-outline-light me-2" type="button">About</button> </a>
                <a href="register.php"><button class="btn btn-outline-light me-2" type="button">Register</button></a>
                <a href="db/logout.php"><button class="btn btn-outline-light me-2" type="button">Logout</button></a>
              </form>
            </div>
          </nav>
    </header>
    
<!-- main section -->
<main>
  
 <div class="sidebar">
 <div class="row">
  <div class="col-4">
    <nav id="navbar-example3" class="h-100 flex-column align-items-stretch pe-4 border-end">
      <nav class="nav nav-pills flex-column">
        <a class="nav-link" href="#item-1">Issue a Book</a>
        <nav class="nav nav-pills flex-column">
          <a class="nav-link ms-3 my-1" href="#item-1-1">Text Book</a>
          <a class="nav-link ms-3 my-1" href="#item-1-2">Novels</a>
        </nav>
        <a class="nav-link" href="#item-2">My Booklist</a>
        <a class="nav-link" href="#item-3">Order a Book</a>
        <nav class="nav nav-pills flex-column">
          <a class="nav-link ms-3 my-1" href="#item-3-1">My cart</a>
          <a class="nav-link ms-3 my-1" href="#item-3-2">Make Payment</a>
        </nav>
      </nav>
    </nav>
  </div>

  <div class="col-8">
    <div data-bs-spy="scroll" data-bs-target="#navbar-example3" data-bs-smooth-scroll="true" class="scrollspy-example-2" tabindex="0">
      <div id="item-1">
        <h4></h4>
        <p></p>
      </div>
      <div id="item-1-1">
        <h5>Text Book</h5>
          <h6>For Engneering Students</h6>
        <p><ul>
               <li>Data Structure</li>
               <li>Algorithm</li>
               <li>C++</li>
               <li>Java</li>
        </ul></p>
      </div>
      <div id="item-1-2">
        <h5></h5>
        <p></p>
      </div>
      <div id="item-2">
        <h4></h4>
        <p></p>
      </div>
      <div id="item-3">
        <h4></h4>
        <p></p>
      </div>
      <div id="item-3-1">
        <h5></h5>
        <p></p>
      </div>
      <div id="item-3-2">
        <h5></h5>
        <p></p>
      </div>
    </div>
  </div>
</div>
 </div>


     
</main>

<footer class="bg-light text-center text-lg-start">
  <!-- Copyright -->
         <div class="text-center p-3">
              © Copyrights 2022 All rights reserved.
            </div>
  <!-- Copyright -->
</footer>

 <!-- Admin UI -->
 <!-- <div class="container"> -->
  <!-- <div class="leftinnerdiv">
   
   <button class="blackbtn">Admin</button><br><br>
   <button class="blackbtn" onclick="openpart('addBook')">Add Book</button><br><br>
   <button class="blackbtn" onclick="openpart('bookReport')">Book Report</button><br><br>
   <button class="blackbtn" onclick="openpart('bookRequests')">Book Requests</button><br><br>
   <button class="blackbtn" onclick="openpart('addPerson')">Add Student</button><br><br>
   <button class="blackbtn" onclick="openpart('studentRecord')">Student Report</button><br><br>
   <button class="blackbtn" onclick="openpart('issueBook')">Issue Book</button><br><br>
   <button class="blackbtn" onclick="openpart('issueReport')">Issue Report</button><br><br>
   <a href="../home.php"><button class="blackbtn">Log Out</button></a><br><br>
   
  </div> -->

   <!-- Add Person Portion -->
  <!-- <div class="rightinnerdiv">
    <div id="addPerson" class="innerright portion" style="display:none">
        <button class="blackbtn">Add Person</button><br><br>
        <form action="db/addPerson_Server.php" method="POST">
         <label>Name: </label><input type="text" name="addname"/><br>
         <br>

         <label>Email: </label><input type="email" name="email"/><br>
         <br>

         <label>Password: </label><input type="password" name="addpass"/><br>
         <br>

         <label for="type">Choose Type:</label>
         <select name="type" id="">
          <option value="student">Student</option>
          <option value="teacher">Teacher</option>
         </select>
        
         <div class="bttn my-4">
         <button type="submit" class="btn btn-secondary text-white">Submit</button>
         </div>

        </form>
    </div>
  </div> -->

  <!-- Add Book Portion -->
  <!-- <div class="rightinnerdiv">
    <div id="addBook" class="innerright portion" style="display:none">
        <button class="blackbtn">Add Book</button><br><br>
        <form action="db/addBook.php" method="POST">
         <label>Book Name: </label><input type="text" name="bookname"/><br>
         <br>

         <label>Details: </label><input type="text" name="bookdetails"/><br>
         <br>

         <label>Author: </label><input type="text" name="bookauthor"/><br>
         <br>

         <label>Publication: </label><input type="text" name="bookpub"/><br>
         <br>

         <div>Branch: <input type="radio" name="branch" value="IT"/>IT<input type="radio" name="branch" value="Civil"/>Civil</div>

         <label>Price: </label><input type="number" name="bookprice"/><br>
         <br>

         <label>Quantity: </label><input type="number" name="bookquantity"/><br>
         <br>

         <label>Book Photo: </label><input type="file" name="bookphoto"/><br>
         <br>
         
        
         <div class="bttn my-4">
         <button type="submit" class="btn btn-secondary text-white">Submit</button>
         </div>

        </form>
    </div>
  </div> -->

  <!-- Student Report Portion -->
  <!-- <div class="rightinnerdiv">
    <div id="studentRecord" class="innerright portion" style="display:none">
        <button class="blackbtn">Student Record</button><br><br>
        <form action="db/personReport.php"></form>
        
    </div>
  </div> -->


<!-- End -->
  <!-- </div>
</main> -->




<!-- <script>
   function openpart(portion){
     var i;
     var x = document.getElementsByClassName("portion");
     for(i=0; i < x.length; i++){
         x[i].style.display = "none";
     }
     document.getElementById(portion).style.display = "block";
   } -->



<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>
</html>