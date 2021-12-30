<!DOCTYPE html>
<html lang="en">
<?php

include_once "./conn.php";
if (isset($_COOKIE['uid']) && $_COOKIE['u_email']) {
  $login = true;
} else {
  $login = false;
}

?>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

  <title>Dreamweaver flowers - About Page</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="../assets/css/fontawesome.css">
  <link rel="stylesheet" href="../assets/css/templatemo-sixteen.css">
  <link rel="stylesheet" href="../assets/css/owl.css">

</head>

<body>

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
  <header class=" ">
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
              <a class="nav-link" href="./products.php?view=all">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./products.php?view=trending">Trending</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="./about.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./contact.php">Contact Us</a>
            </li>

            <?php
            if ($login) {
              echo "<li class='nav-item'>
              <a class='nav-link ' href='./user.php?user_id=" . $_COOKIE['uid'] . "'>Me</a>
            </li>";
              echo
              '
            <li class="nav-item">
              <a class="nav-link" href="./cart.php?uid=' . $_COOKIE['uid'] . '"><i class="fa fa-cart-arrow-down" aria-hidden="true" style="transform: scale(1.8);"></i></a>
            </li>
            ';
            } else {
              echo '<li class="nav-item">
              <a class="nav-link" href="./signup.php">Join</a>
            </li>';
            }

            ?>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <!-- Page Content -->
  <div class="page-heading about-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="text-content">
            <h4 style="color: white;">about us</h4>
            <h2>our Platform</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-11 mx-auto mb-3">
      <h4>We are Providing customers with our best service 24/7</h4>
    </div>
    <div class="col-12 col-md-10 mx-auto">
      <p>We offer the best and most delectable range of flowers,flower products by our own local sellers
        who have years of experience in the confectioneries and comes with the guarantee of beautiful,
        decorations and true value for money</p>
    </div>
    <div class="col-12 col-md-10 mx-auto mt-4">
      <p><b><a href="../index.php" style="text-decoration: none;color:red;">Dreamweaver Flowers</a></b> is your digital guide to discovering flowers and other related establishments
        in Sri Lanka and promoting the local flowers. People visit our platform to read about our discoveries within the city,
        especially when deciding on decorating. Simply buy and sell, Dreamweaver Flowers is your friend in the country.</p>
    </div>
  </div>





  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="inner-content">
            <p>Copyright &copy; Dreamweaverflowers Co., Ltd.

            </p>
          </div>
        </div>
      </div>
    </div>
  </footer>


  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  <!-- Additional Scripts -->
  <script src="../assets/js/custom.js"></script>



</body>

</html>