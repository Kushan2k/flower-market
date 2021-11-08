<!DOCTYPE html>
<html lang="en">
<?php

include_once './conn.php';
if (isset($_COOKIE['uid']) && $_COOKIE['u_email']) {
  $login = true;
} else {
  $login = false;
}

$sql = '';
if (isset($_GET['view'])) {
  switch ($_GET['view']) {
    case 'trending':
      $sql = "SELECT name,id,price,view_count,discription,user_id,pic_url FROM item ORDER BY view_count DESC";
      break;
    case 'all':
      $sql = "SELECT name,id,price,view_count,discription,pic_url,user_id FROM item ORDER BY post_date DESC";
      break;
  }
} else if (isset($_GET['q']) && isset($_GET['type'])) {
  switch ($_GET['type']) {
    case 'name':
      $sql = "SELECT name,id,price,view_count,discription,pic_url,user_id FROM item
          WHERE name LIKE '%{$_GET['q']}%' ORDER BY post_date DESC
          ";
      break;
    case 'location':
      $sql = "SELECT name,id,price,view_count,discription,pic_url,user_id FROM item
          WHERE location LIKE '%{$_GET['q']}%' ORDER BY post_date DESC
          ";
      break;
    case 'price':
      $sql = "SELECT name,id,price,view_count,discription,pic_url,user_id FROM item
          WHERE price<= {$_GET['q']} ORDER BY post_date DESC
          ";
      break;
    case 'type':
      $sql = "SELECT name,id,price,view_count,discription,pic_url,user_id FROM item
          WHERE type LIKE '%{$_GET['q']}%' ORDER BY post_date DESC";
      break;
  }
} else {
  header('Location:../index.php');
}


?>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

  <title>Dreamweaver flowers - Product</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

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
              <a class="nav-link" href="../index.php">

                Home

              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="./products.php?view=all">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./products.php?view=trending">Trending</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./aboutus.php">About Us</a>
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
              <a class="nav-link" href="./signup.php"><i class="fa fa-cart-arrow-down" aria-hidden="true" style="transform: scale(1.8);"></i></a>
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
  <!-- <div class="page-heading products-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>new arrivals</h4>
              <h2>sixteen products</h2>
            </div>
          </div>
        </div>
      </div>
    </div> -->




  <div class="products">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="filters-content">
            <div class="row grid">

              <?php

              $re = $conn->query($sql);

              if ($re == TRUE) {
                if ($re->num_rows > 0) {
                  while ($row = $re->fetch_assoc()) {
                    $itemID = (int)$row['id'] + 1254;
                    $name = ucwords($row['name']);
                    if (isset($_COOKIE['uid'])) {
                      if ((int)$row['user_id'] == ($_COOKIE['uid'] - 999)) {
                        echo
                        "
                      <div class='col-12 col-lg-4 col-md-4 all des'>
                        <div class='product-item'>
                          <a href='./item.php?item={$itemID}'><img src='{$row['pic_url']}' alt=''></a>
                          <div class='down-content'>
                            <a href='./item.php?item={$itemID}'>
                              <h4>{$name}</h4>
                            </a>
                            <h6>LKR {$row['price']}</h6>
                            <p>{$row['discription']}.</p>

                            <span>Views ({$row['view_count']})</span>
                          </div>
                          <div class='mb-4 px-3 d-flex justify-content-between flex-md-column'>
                            <a href='./item.php?item={$itemID}' class='btn btn-outline-dark'>Go To Product</a>
                            
                          </div>
                        </div>
                      </div>
                      ";
                      } else {
                        echo
                        "
                      <div class='col-12 col-lg-4 col-md-4 all des'>
                        <div class='product-item'>
                          <a href='./item.php?item={$itemID}'><img src='{$row['pic_url']}' alt=''></a>
                          <div class='down-content'>
                            <a href='./item.php?item={$itemID}'>
                              <h4>{$name}</h4>
                            </a>
                            <h6>LKR {$row['price']}</h6>
                            <p>{$row['discription']}.</p>

                            <span>Views ({$row['view_count']})</span>
                          </div>
                          <div class='mb-4 px-3 d-flex justify-content-between flex-md-column'>
                            <a href='./item.php?item={$itemID}' class='btn btn-outline-dark'>Go To Product</a>
                            <button class='btn btn-outline-dark mt-md-2'>Add To Basket</button>
                          </div>
                        </div>
                      </div>
                      ";
                      }
                    } else {
                      echo
                      "
                      <div class='col-12 col-lg-4 col-md-4 all des'>
                        <div class='product-item'>
                          <a href='./item.php?item={$itemID}'><img src='{$row['pic_url']}' alt=''></a>
                          <div class='down-content'>
                            <a href='./item.php?item={$itemID}'>
                              <h4>{$name}</h4>
                            </a>
                            <h6>LKR {$row['price']}</h6>
                            <p>{$row['discription']}.</p>

                            <span>Views ({$row['view_count']})</span>
                          </div>
                          <div class='mb-4 px-3 d-flex justify-content-between flex-md-column'>
                            <a href='./item.php?item={$itemID}' class='btn btn-outline-dark'>Go To Product</a>
                            
                          </div>
                        </div>
                      </div>
                      ";
                    }
                  }
                } else {
                  echo
                  "
                  <p class='alert alert-warning text-center mt-5 w-100'>No Results Found!</p>
                  
                  ";
                }
              } else {
                echo
                "
                  <p class='alert alert-warning text-center mt-5 w-100'>error fetching result<br> please try again later!</p>
                  
                  ";
              }



              ?>


            </div>
          </div>
        </div>

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
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  <!-- Additional Scripts -->
  <script src="../assets/js/custom.js"></script>
  <script src="../assets/js/owl.js"></script>
  <script src="../assets/js/slick.js"></script>
  <script src="../assets/js/isotope.js"></script>
  <script src="../assets/js/accordions.js"></script>


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