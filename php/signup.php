<html lang="en">
<?php
session_start();

$hasData = false;
if (isset($_SESSION['sing-data'])) {
  $hasData = true;
  $data = $_SESSION['sing-data'];
}
?>



<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

  <title>Dreamweaver flowers</title>

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
          <h2>Dreamweaver <em>flowers</em></h2>
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
              <a class="nav-link " href="./products.php?view=all">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./products.php?view=trending">Trending</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./aboutus.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="./contact.php">Contact Us</a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" href="./signup.php">Join</a>
            </li>

          </ul>
        </div>
      </div>
    </nav>
  </header>


  <div class="card bg-light">
    <article class="card-body mx-auto" style="max-width: 400px;">
      <h4 class="card-title mt-3 text-center">Create Account</h4>
      <p class="text-center">Get started with your free account</p>
      <?php
      if (isset($_SESSION['error'])) {
        echo "<h5 class='alert alert-danger text-center error'>" . $_SESSION['error'] . "</h5>";

        $_SESSION['error'] = null;
      }

      ?>

      <form method="POST" id="sing-up-form" action="./register.php">
        <div class="form-group input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
          </div>
          <input class="form-control" placeholder="Full name" name="fullname" type="text" required value="<?= $hasData ? $data['name'] : ''; ?>">
        </div> <!-- form-group// -->
        <div class="form-group input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
          </div>
          <input name="email" class="form-control" placeholder="Email address" type="email" required value="<?= $hasData ? $data['email'] : ''; ?>">

        </div> <!-- form-group// -->
        <div class="form-group input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
          </div>
          <select class="custom-select" style="max-width: 120px;">
            <option selected="">+94</option>

          </select>
          <input name="number" class="form-control" placeholder="Phone number" type="text" required value="<?= $hasData ? $data['number'] : ''; ?>">
        </div>
        <div class="form-group input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-map-marker"></i> </span>
          </div>
          <input class="form-control" name="city" placeholder="City" type="text" required value="<?= $hasData ? $data['city'] : ''; ?>">
        </div>

        <div class="form-group input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-address-book"></i> </span>
          </div>
          <input class="form-control" placeholder="Address" name="address" type="text" required value="<?= $hasData ? $data['address'] : ''; ?>">
        </div>

        <!-- form-group// -->
        <!-- form-group end.// -->

        <div class="form-group input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
          </div>
          <input class="form-control" placeholder="Create password" name="c-password" type="password" required value="<?= $hasData ? $data['pass'] : ''; ?>">
        </div> <!-- form-group// -->
        <div class="form-group input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
          </div>
          <input class="form-control" placeholder="Repeat password" name="r-password" type="password" required value="<?= $hasData ? $data['compass'] : ''; ?>">
        </div> <!-- form-group// -->





        <div class="form-group">
          <button type="submit" class="btn btn-dark btn-block" name="register"> Create Account </button>

        </div> <!-- form-group// -->
        <p class="text-center">Have an account? <a href="./loginform.php">Log In</a> </p>
      </form>
    </article>
  </div> <!-- card.// -->


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