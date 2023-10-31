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
  <title>Home</title>
</head>
<body>

  <header class="sticky-top">

    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="home.php">
          <img class="rounded-circle" src="images/lms.png" alt="LMS" width="45" height="45"></a>
        <a class="navbar-brand" href="home.php">Chapter Library</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="home.php">Home</a>
            </li>
             <!-- <li class="nav-item">
              <a class="nav-link " aria-current="page" href="feedback.php">Feedback</a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link" href="shop2.php">Visit Book Shop</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="contact.php">Contact us</a>
            </li>
          </ul>
          <form class="d-flex">
        <a class="px-2"href="user/Authentication/Login.php"><button class="btn btn-outline-light" type="button">Login User</button></a>
        <!-- <a href="admin/Authentication/Login.php"><button class="btn btn-outline-light" type="button">Login Admin</button></a> -->
      </form>
        </div>
      </div>
    </nav>


  </header>

  <!-- main section -->
  <main>

    <section>
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">

        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="images/LMS.jpg" class="d-block w-100 " height="500" alt="LMS">
            <div class="carousel-caption d-none d-md-block">
              <div class="container">
              <h5>
                <h1>Welcome to Chapter Library</h1>
                <p><h5>Make your reading journey enthusiastic with us!</h5></p>
              </h5>
            </div>
            </div>
          </div>
    </section>

    <!-- services section -->
    <section id="benefits">
      <h2 class="text-center py-4">A Library for many solutions</h2>
      <!-- conatiner -->
      <div class="container p-5">
        <!-- row -->
        <div class="row">

          <div class="col-lg-4 col-md-6 mb-4 mb-md-0 ">
            <div>
              <img src="images/add-friend.png" class="rounded mx-auto d-block" alt="customer"  width="80" height="80">
              <div >
                <h5 class="text-center py-2">User-Friendly</h5>
                <p> Our system is very user-friendly. Users can easily find their desirable books, make their booklist, remove a book,
                   and search through author-name and book title. 
                </p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
            <div >
              <img src="images/blog.png" class="rounded mx-auto d-block" alt="cost"  width="80" height="80">
              <div >
                <h5 class="text-center py-2">Give Feedback</h5>
                <p >Users can share their opinion and experience through feedback.
                   Which indicates our system's unique feature.
                </p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
            <div >
              <img src="images/question.PNG" class="rounded mx-auto d-block" alt="maintenance"  width="100" height="100">
              <div>
                <h5 class="text-center py-2">Have any questions?</h5>
                <p>If you have any queries, simply just go to our FAQ section and ask your question, 
                  and within a few seconds, you'll get your answer.
                </p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4 mb-md-0 py-3">
            <div >
              <img src="images/delivery.PNG" class="rounded mx-auto d-block" alt="maintenance"  width="100" height="100">
              <div>
                <h5 class="text-center py-2">Fast Delivery</h5>
                <p>
                With our well-planned maintenance system, we ensure fast delivery of books to our customers.
                </p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4 mb-md-0 py-3">
            <div >
              <img src="images/member.PNG" class="rounded mx-auto d-block"  alt="maintenance"  width="120" height="120">
              <div>
                <h5 class="text-center py-2">Become a Member</h5>
                <p>
                We provide a membership card to our regular customer's basis on some conditions. Which includes many benefits. 
                </p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4 mb-md-0 py-3">
            <div >
              <img src="images/safety.PNG"  class="rounded mx-auto d-block" alt="maintenance"  width="100" height="100">
              <div>
                <h5 class="text-center py-2">Safe Journey</h5>
                <p>
                We maintain our customer's privacy in a well-manner. So, there is no chance of any privacy hampering.
                </p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
  </main>

  <footer>
    <footer class="bg-light text-center text-lg-start">
      <!-- Grid container -->
      <div class="container p-5">
        <!--Grid row-->
        <div class="row">
          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <ul class="list-unstyled mb-0">
              <li>
                <h4>Social</h4>
                <a href="https://www.facebook.com" ><img  src="images/facebook.png" alt="" width="45" height="45"></a><br><br>
                <a href="https://www.twitter.com" ><img  src="images/twitter.png" alt="" width="45" height="45"></a><br><br>
                <a href="https://www.linkedin.com" ><img  src="images/linkedin.png" alt="" width="45" height="45"></a><br><br>
                <a href="https://www.instagram.com"><img  src="images/instagram.png" alt="" width="45" height="45"></a><br><br>
              </li>
            </ul>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <ul class="list-unstyled">
              <li>
                <h4>Links</h4>
                <a href="home.php" class="text-dark text-decoration-none link-info">Home</a><br><br>
                <a href="#benefits" class="text-dark text-decoration-none link-info">Benefits</a><br><br>
              </li>
            </ul>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">

            <ul class="list-unstyled mb-0">
              <li>
                <h4>Guides</h4>
                <a href="privacy_policy.php" class="text-dark text-decoration-none link-info">Privacy Policy</a><br><br>
                <a href="#" class="text-dark text-decoration-none link-info">Terms & Conditions</a><br><br>
              </li>
            </ul>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">

            <ul class="list-unstyled">
              <li>
                <h4>Community</h4>
                <a href="contact.php" class="text-dark text-decoration-none link-info">Contact</a><br><br>
                <a href="faq.php" class="text-dark text-decoration-none link-info">FAQ</a><br><br>
              </li>
            </ul>
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </div>
      <!-- Grid container -->

      <!-- Copyright -->
      <div class="text-center p-3">
        <hr>
        © Copyrights 2022 All rights reserved.
      </div>
      <!-- Copyright -->
    </footer>


  </footer>


  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
    crossorigin="anonymous"></script>

</body>
</html>