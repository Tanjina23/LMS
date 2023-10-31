<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
    integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
  <link rel="stylesheet" href="style.css">
  <title>LMS</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="../home.php">
          <img class="rounded-circle" src="../images/lms.png" alt="" width="45" height="45"></a>
        <a class="navbar-brand" href="../home.php"> Chapter Libraray</a>
        <a class="text-light text-decoration-none " href="displayBooks.php"> Books</a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Myprofile
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#">Edit profile</a>
              <a class="dropdown-item" href="#">ChangePassword</a>
            </div>
          </div>
        </li>
        <li class="nav-item"> <a class="nav-link" href="logout.php">Logout</a></li>
      </ul>

    </div>
  </nav>
  <div class="container-foulid">
    <div class="row">
      <div class="col-sm-3 bg-light p-0 m-0">
        <h5 class="bg-secondary text-white px-2 py-1">Book Issues</h5>
        <ul class="list-group">
          <li class="list-group-item">
            <a href="add_book.php" class="text-dark text-decoration-none">Add Category</a>
          </li>
          <li class="list-group-item">
            <a href="list_category.php" class="text-dark text-decoration-none">Category list</a>
          </li>

        </ul>
        <h5 class="bg-secondary text-white px-2 py-1">Book Return</h5>
        <ul class="list-group">
          <li class="list-group-item">
            <a href="return_book.php" class="text-dark text-decoration-none">Add return</a>
          </li>
          <li class="list-group-item">
            <a href="list_return.php" class="text-dark text-decoration-none">Return list</a>
          </li>

        </ul>
        <h5 class="bg-secondary text-white px-2 py-1">Order Book</h5>
        <ul class="list-group">
          <li class="list-group-item">
            <a href="order_book.php" class="text-dark text-decoration-none">Add order</a>
          </li>
          <li class="list-group-item">
            <a href="list_order.php" class="text-dark text-decoration-none">order list</a>
          </li>

        </ul>
        <h5 class="bg-secondary text-white px-2 py-1">Payment Option</h5>
        <ul class="list-group">

          <li class="list-group-item">
            <a href="list_payment.php" class="text-dark text-decoration-none">Amouty</a>
          </li>

        </ul>


      </div>

      <div class="col-sm-9 pt-2 ">
        <!-- right-->

        <div class="input-group rounded ">
          <input type="search" class="form-control rounded " placeholder="Search" aria-label="Search"
            aria-describedby="search-addon" />
          <span class="input-group-text border-0" id="search-addon">
            <i class="fas fa-search"></i>
          </span>
        </div>
        <div class="row p-5">
          <div class="col-sm-3">
            <a href="add_book.php "><i class="fas fa-folder-open fa-4x text-secondary"></i></a>
            <p>Book Issues list</p>
          </div>
          <div class="col-sm-3">
            <a href="return_book.php"> <i class="fas fa-folder-plus fa-4x text-secondary"></i> </a>
            <p>Book Return list</p>
          </div>
          <div class="col-sm-3">
            <a href="order_book.php"><i class="fas fa-box-open fa-4x text-secondary"></i> </a>

            <p>Order list</p>
          </div>




        </div>

      </div>
    </div>
  </div>
  <div class="container-foulid border-top border-success">
    <p class="text-center p-2">Copyright: Library Management System</p>
  </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
    crossorigin="anonymous"></script>
</body>
</html>