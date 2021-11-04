<!DOCTYPE html>
<html lang="en">
<?php

include_once "./php/conn.php";
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

  <title>Dreamweaver flowers - Home</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

  <!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
  <link rel="stylesheet" href="assets/css/owl.css">

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
  <header class=" position-fixed">
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
            <li class="nav-item active">
              <a class="nav-link" href="">

                Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="php/products.php?view=all">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="php/products.php?view=trending">Trending</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./php/aboutus.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./php/contact.php">Contact Us</a>
            </li>


            <?php
            if ($login) {
              echo "<li class='nav-item'>
              <a class='nav-link ' href='./php/user.php?user_id=" . $_COOKIE['uid'] . "'>Me</a>
            </li>";
              echo
              '
            <li class="nav-item">
              <a class="nav-link" href="./php/signup.php"><i class="fa fa-cart-arrow-down" aria-hidden="true" style="transform: scale(1.8);"></i></a>
            </li>
            ';
            } else {
              echo '<li class="nav-item">
              <a class="nav-link" href="./php/signup.php">Join</a>
            </li>';
            }

            ?>


          </ul>
        </div>
      </div>
    </nav>
  </header>

  <!-- Page Content -->
  <!-- Banner Starts Here -->
  <div class="banner header-text">
    <div class="owl-banner owl-carousel">
      <div class="banner-item-01">
        <div class="text-content">
          <h4>The Best Flower Market</h4>
          <h2>New Arrivals/New Trends </h2>
        </div>
      </div>
      <div class="banner-item-02">
        <div class="text-content">
          <h4 style="color: white;">For Buyers & Sellers</h4>
          <h2>Get Or Give What You Want</h2>
        </div>
      </div>
      <div class="banner-item-03">
        <div class="text-content">
          <h3 style="color: white;">Your Choice</h3>
          <h2 class="chg-text" style="">Grabs you like for afortable price</h2>
        </div>
      </div>
    </div>
  </div>

  <!-- Banner Ends Here -->
  <div class=" container mt-3 search-box ">
    <div class="row ">
      <div class=" col-12 col-md-8  mx-auto ">
        <form action="./php/products.php" method="GET">
          <div class=" form-inline box">

            <input type="text" placeholder="Search Here!" class=" form-control" name="q">
            <h4 class="text-center mx-2">By</h4>
            <select class=" form-control custom-select" name="type">
              <option value="Name">Name</option>
              <option value="Name">Location</option>
              <option value="Name">Color</option>
              <option value="Name">Price</option>
              <option value="Name">
                Type
              </option>
            </select>

            <input type="submit" value="Search" class="btn btn-success ml-lg-5 mt-2 mt-lg-0">
          </div>
        </form>

      </div>
    </div>
  </div>

  <style>
    .box {
      display: flex;
      justify-content: space-around;
      align-items: center;
    }
  </style>




  <div class="latest-products">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Latest Products</h2>
            <a href="./php/products.php?view=all">view all products <i class="fa fa-angle-right"></i></a>
          </div>
        </div>
        <?php
        $sql = "SELECT id,name,discription,price,pic_url,user_id FROM item ORDER BY post_date LIMIT 20";
        $res = $conn->query($sql);
        if ($res == TRUE) {
          if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
              $itemID = (int)$row['id'] + 1254;
              if (($_COOKIE['uid'] - 999) != $row['user_id']) {
                echo
                "
                      <div class='col-md-4 col-12'>
                        <div class='product-item'>
                          <a href='./php/item.php?item={$itemID}'><img src='./php/{$row['pic_url']}' alt=''></a>
                          <div class='down-content'>
                            <a href='./php/item.php?item={$itemID}'>
                              <h4>{$row['name']}</h4>
                            </a>
                            <h6>LKR {$row['price']}</h6>
                            <p>{$row['discription']}.</p>
                          </div>
                          <div class='mb-4 px-3 d-flex justify-content-between flex-md-column'>
                            <a href='./php/item.php?item={$itemID}' class='btn btn-outline-success'>Go To Product</a>
                            <button class='btn btn-outline-success mt-md-2'>Add To Basket</button>
                          </div>
                        </div>
                      </div>
                  ";
              } else {
                echo
                "
                      <div class='col-md-4 col-12'>
                        <div class='product-item'>
                          <a href='./php/item.php?item={$itemID}'><img src='./php/{$row['pic_url']}' alt=''></a>
                          <div class='down-content'>
                            <a href='./php/item.php?item={$itemID}'>
                              <h4>{$row['name']}</h4>
                            </a>
                            <h6>LKR {$row['price']}</h6>
                            <p>{$row['discription']}.</p>
                          </div>
                          <div class='mb-4 px-3 d-flex justify-content-between flex-md-column'>
                            <a href='./php/item.php?item={$itemID}' class='btn btn-outline-success'>Go To Product</a>
                            
                          </div>
                        </div>
                      </div>
                  ";
              }
            }
          } else {
            echo "<p class='alert alert-warning text-center'>No Items Yet!<br>Keep Wait</p>";
          }
        } else {
          echo "<p class='alert alert-danger text-center w-100'>Connecting error! <br>Please contact us..<a href='./php/contact.php'>in Here</a></p>";
        }



        ?>





      </div>
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
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  <!-- Additional Scripts -->
  <script src="assets/js/custom.js"></script>
  <script src="assets/js/owl.js"></script>
  <script src="assets/js/slick.js"></script>
  <script src="assets/js/isotope.js"></script>
  <script src="assets/js/accordions.js"></script>


  <script language="text/Javascript">
    cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
    function clearField(t) { //declaring the array outside of the
      if (!cleared[t.id]) { // function makes it static and global
        cleared[t.id] = 1; // you could use true and false, but that's more typing
        t.value = ''; // with more chance of typos
        t.style.color = '#fff';
      }
    }
  </script>


</body>

</html>