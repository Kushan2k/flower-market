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
              <a class="nav-link" href="php/products.php?view=all">Our Products</a>
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
              <a class="nav-link" href="./php/cart.php?uid=' . $_COOKIE["uid"] . '"><i class="fa fa-cart-arrow-down" aria-hidden="true" style="transform: scale(1.8);"></i></a>
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
  <?php
  if (isset($_SESSION['db-error'])) {
    echo "
    <div class='container mt-3'>
    <p class='alert alert-danger text-center error'>{$_SESSION['db-error']}</p></div>";
    unset($_SESSION['db-error']);
  }
  ?>

  <!-- Banner Ends Here -->
  <div class=" container mt-3 search-box ">
    <div class="row ">
      <div class=" col-12 col-md-8  mx-auto ">
        <form action="./php/products.php" method="GET">
          <div class=" form-inline box">

            <input type="text" placeholder="Search Here!" class=" form-control" name="q">
            <h4 class="text-center mx-2">By</h4>
            <select class=" form-control custom-select" name="type">
              <option value="name">Name</option>
              <option value="location">Location</option>

              <option value="price">Price</option>
              <option value="type">
                Type
              </option>
            </select>

            <input type="submit" value="Search" class="btn btn-outline-dark ml-lg-5 mt-2 mt-lg-0">
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
      <div class="row grid">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Latest Products</h2>
            <a href="./php/products.php?view=all">view all products <i class="fa fa-angle-right"></i></a>
          </div>
        </div>
        <?php
        //sql query for geting data
        $sql = "SELECT id,name,discription,price,pic_url,user_id FROM item ORDER BY post_date DESC LIMIT 20";
        $res = $conn->query($sql);
        if ($res == TRUE) {
          if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
              $itemID = (int)$row['id'] + 1254;
              $formatedprice = number_format((float)$row['price'], 2, '.', ',');


              if (isset($_COOKIE['uid'])) {
                if (($_COOKIE['uid'] - 999) != $row['user_id']) {
                  echo
                  "
                      <div class='col-md-4 col-12 all des'>
                        <div class='product-item'>
                          <a href='./php/item.php?item={$itemID}'><img src='./php/{$row['pic_url']}' alt=''></a>
                          <div class='down-content'>
                            <a href='./php/item.php?item={$itemID}'>
                              <h4>{$row['name']}</h4>
                            </a>
                            <h6>LKR {$formatedprice}</h6>
                            <p>{$row['discription']}.</p>
                          </div>
                          <div class='mb-4 px-3 d-flex justify-content-between flex-md-column'>
                            <a href='./php/item.php?item={$itemID}' class='btn btn-outline-dark'>Go To Product</a>
                            <button class='btn btn-outline-dark mt-md-2 cart-btn' data-itemid='{$itemID}'>Add To Basket</button>
                          </div>
                        </div>
                      </div>
                  ";
                } else {
                  echo
                  "
                      <div class='col-md-4 col-12 all des'>
                        <div class='product-item'>
                          <a href='./php/item.php?item={$itemID}'><img src='./php/{$row['pic_url']}' alt=''></a>
                          <div class='down-content'>
                            <a href='./php/item.php?item={$itemID}'>
                              <h4>{$row['name']}</h4>
                            </a>
                            <h6>LKR {$formatedprice}</h6>
                            <p>{$row['discription']}.</p>
                          </div>
                          <div class='mb-4 px-3 d-flex justify-content-between flex-md-column'>
                            <a href='./php/item.php?item={$itemID}' class='btn btn-outline-dark'>Go To Product</a>
                            
                          </div>
                        </div>
                      </div>
                  ";
                }
              } else {
                echo
                "
                      <div class='col-md-4 col-12 all des'>
                        <div class='product-item'>
                          <a href='./php/item.php?item={$itemID}'><img src='./php/{$row['pic_url']}' alt=''></a>
                          <div class='down-content'>
                            <a href='./php/item.php?item={$itemID}'>
                              <h4>{$row['name']}</h4>
                            </a>
                            <h6>LKR {$formatedprice}</h6>
                            <p>{$row['discription']}.</p>
                          </div>
                          <div class='mb-4 px-3 d-flex justify-content-between flex-md-column'>
                            <a href='./php/item.php?item={$itemID}' class='btn btn-outline-dark'>Go To Product</a>
                            
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

  <div class="cover popup-cart d-none">
    <div class="popup-cart mx-auto  ">
      <div class="alert alert-success cart-alert">
        <h2 class="m-3 text-center text-msg"></h2>
        <a class="btn btn-success" href="./php/cart.php?uid=<?php echo $_COOKIE["uid"]; ?>">
          <i class=" fa fa-cart-arrow-down" aria-hidden="true" style="transform: scale(1.8);">
          </i><span class="ml-3">View</span></a>
        <button class="btn btn-danger close-popup">Later</button>
      </div>
    </div>
  </div>

  <style>
    .popup-cart {
      width: 100%;
      position: fixed;
      top: 0;
      z-index: 100000;
      right: 0;
      height: 100vh;
      display: flex;
      justify-content: space-around;
      align-items: center;

    }

    .cover {
      background-color: rgba(0, 0, 0, 0.8);
    }
  </style>


  <script>
    const closebtn = document.querySelector('.close-popup')
    closebtn.addEventListener('click', () => {
      document.querySelector('.popup-cart').classList.add('d-none')
    })
  </script>




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


  <!-- Additional javaScript files -->
  <script src="assets/js/custom.js"></script>
  <script src="assets/js/owl.js"></script>
  <!-- <script src="assets/js/slick.js"></script>
  <script src="assets/js/isotope.js"></script>
  <script src="assets/js/accordions.js"></script>  -->


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

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var btns = document.querySelectorAll('.cart-btn');
      btns.forEach(function(btn) {
        btn.addEventListener('click', function(event) {
          const xhr = new XMLHttpRequest()


          xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
              // alert(xhr.responseText);
              if (this.responseText == 1) {
                document.querySelector('.text-msg').innerHTML = 'Item Added To Cart'
                document.querySelector('.cart-alert').classList.remove('alert-danger')
                document.querySelector('.cart-alert').classList.add('alert-success')
              } else {
                document.querySelector('.text-msg').innerHTML = 'Item already in the cart'
                document.querySelector('.cart-alert').classList.remove('alert-success')
                document.querySelector('.cart-alert').classList.add('alert-danger')

              }
              document.querySelector('.popup-cart').classList.remove('d-none')

            }

          }
          xhr.open('GET', `./php/addtocart.php?addtocart=true&itemid=${event.target.dataset.itemid}`)
          xhr.send()

        })
      })

      setTimeout(() => {
        var error = document.querySelector('.error');
        if (error) {
          error.remove()
        }
      }, 3000)
    })
  </script>


</body>

</html>