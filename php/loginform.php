<html lang="en">
<?php
if (!isset($_SESSION)) {
  session_start();
}

if (isset($_COOKIE['uid']) && isset($_COOKIE['u-email'])) {
  header('Location:../index.php');
}
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

  <title>Dreamweaver Flowers</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <!------ Include the above in your HEAD tag ---------->

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

  <link rel="stylesheet" href="../assets/css/fontawesome.css">
  <link rel="stylesheet" href="../assets/css/templatemo-sixteen.css">
  <link rel="stylesheet" href="../assets/css/owl.css">

</head>

<body>

  <style>
    .back-btn {
      font-size: 2rem;
      font-family: 'Times New Roman', Times, serif;
    }
  </style>

  <!-- ***** Preloader Start ***** -->
  <div id="preloader">
    <div class="jumper">
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- Header -->
  <header class=" position-relative">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="index.php">
          <h2>Dreamweaver <em>Flowers</em></h2>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
              <a class="nav-link" href="../index.php">Home

              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="./products.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./products.php">Trending</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./aboutus.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="./contact.php">Contact Us</a>
            </li>

            <li class="nav-item active">
              <a class="nav-link active" href="./signup.php">Join</a>
            </li>


          </ul>
        </div>
      </div>
    </nav>
  </header>







  <div class="container">
    <div class="row">
      <div class="col-12 col-md-8 mx-auto col-lg-6">
        <div class="w-100">
          <article class="card-body">
            <h4 class="card-title mt-3 text-center">Join Now</h4>
            <p class="text-center">Welcome <br />Get Started With Selling</p>

            <?php
            if (isset($_SESSION['success'])) {
              echo "<p class='alert alert-success text-center error'>" . $_SESSION['success'] . "</p>";
              $_SESSION['success'] = null;
            }
            if (isset($_SESSION['error'])) {
              echo "<p class='alert alert-danger text-center error error'>" . $_SESSION['error'] . "</p>";
              $_SESSION['error'] = null;
            }

            ?>

            <form action="./register.php" method="POST">
              <!-- form-group// -->
              <div class="form-group input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-envelope"></i>
                  </span>
                </div>
                <input name="email" class="form-control" placeholder="Email address" type="email" />

              </div>
              <!-- form-group// -->

              <!-- form-group end.// -->

              <div class="form-group input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-lock"></i>
                  </span>
                </div>
                <input name="password" class="form-control" placeholder="Password" type="password" />


              </div>

              <div class="form-group">
                <button type="submit" name="login" class="btn btn-dark btn-block">
                  Sign In
                </button>
              </div>
              <!-- form-group// -->
              <p class="text-center">
                Need an account? <a href="./signup.php">Register</a>
              </p>
            </form>


          </article>
        </div>
      </div>
    </div>
  </div>

  <!--container end.//-->

  <br><br>

  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  <!-- Additional Scripts -->
  <script src="../assets/js/custom.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      setTimeout(rmError, 2000);
    })

    function rmError() {
      let error = document.querySelector('.error');
      if (error) {
        error.remove()
      }
    }
  </script>

</body>

</html>