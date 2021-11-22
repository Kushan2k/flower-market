<?php
if (!isset($_GET['item'])) {
  header('Location:../index.php');
}
include_once './conn.php';
if (isset($_COOKIE['uid']) && $_COOKIE['u_email']) {
  $login = true;
} else {
  $login = false;
}
$itemID = (int)$_GET['item'] - 1254;

$sql = "SELECT view_count FROM item WHERE id={$itemID};";
$re = $conn->query($sql);
if ($re == TRUE) {
  if ($re->num_rows > 0) {
    $count = (int)$re->fetch_assoc()['view_count'];
    $count = $count + 1;
    $sql = "UPDATE item SET view_count={$count} WHERE id={$itemID}";
    if ($conn->query($sql) != TRUE) {
      header("Location:../index.php");
    }
  } else {
    header("Location:../index.php");
  }
} else {
  header('Location:../index.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

  <title>Sixteen Clothing - Contact Page</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

  <!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="../assets/css/fontawesome.css">
  <link rel="stylesheet" href="../assets/css/templatemo-sixteen.css">
  <!-- <link rel="stylesheet" href="../assets/css/item.css"> -->

</head>

<body>
  <div id="preloader">
    <div class="jumper">
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>


  <header class=" position-relative">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="index.html">
          <h2>Dreamweaver <em>flowers</em></h2>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="../index.php">Home

              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="products.php?view=all">Our Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="products.php?view=trending">Trending</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="aboutus.php">About Us</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="contact.php">Contact Us</a>
            </li>
            <?php
            if ($login) {
              echo "<li class='nav-item'>
              <a class='nav-link ' href='./user.php?user_id=" . $_COOKIE['uid'] . "'>Me</a>
            </li>";
              echo
              '
            <li class="nav-item">
              <a class="nav-link" href="./cart.php?uid=' . $_COOKIE["uid"] . '"><i class="fa fa-cart-arrow-down" aria-hidden="true" style="transform: scale(1.8);"></i></a>
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



  <div class="container mt-5 mb-5">
    <div class="card">
      <?php
      if (isset($_SESSION['update-error'])) {
        echo "<p class='alert alert-danger text-center error'>{$_SESSION['update-error']}</p>";
        $_SESSION['update-error'] = null;
      }
      if (isset($_SESSION['update-success'])) {
        echo "<p class='alert alert-success text-center error'>{$_SESSION['update-success']}</p>";
        $_SESSION['update-success'] = null;
      }

      ?>
      <div class="row g-0">
        <?php

        $sql = "SELECT name,discription,price,view_count,location,pic_url,post_date,user_id,type
          FROM item WHERE id={$itemID}
          ";
        $result = $conn->query($sql);
        if ($result == TRUE) {
          if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $name = ucwords($row['name']);
            $owner = (int)$row['user_id'] + 1289;
            $formatedprice = number_format((float)$row['price'], 2, '.', ',');
            if (isset($_COOKIE['uid'])) {

              if ((int)$row['user_id'] == ($_COOKIE['uid'] - 999)) {
                $foredit = $itemID + 5678;
                echo
                "
                <div class='col-md-6 border-end'>
                  <div class='d-flex flex-column justify-content-center'>
                    <div class='main_image border'><a href='{$row['pic_url']}' target='_blank'>
                      <img src='{$row['pic_url']}' id='main_product_image' width='100%'/></a>
                    </div>

                  </div>
                </div>
                <div class='col-md-6'>
                  <div class='p-3 right-side'>
                    <div class='d-flex justify-content-between align-items-center'>
                      <h3>{$name}</h3> <span class='heart'><i class='bx bx-heart'></i></span>
                    </div>
                    <div class='mt-2 pr-3 content'>
                      <p>{$row['discription']}</p>
                    </div>
                    <h4>LKR {$formatedprice}</h4>
                    
                    
                    <div class='mt-5'> <span class='fw-bold'>Type</span>
                      <p class='m-3'>{$row['type']}</p>
                      <p class='text-muted'>{$row['post_date']}</p>
                      <P class='text-danger'>Views ({$row['view_count']})</p>
                    </div>
                    <div class='buttons d-flex flex-row mt-5 gap-3'>
                      
                      <a href='./edititem.php?for={$foredit}' class='btn btn-dark'><i class='fa fa-pencil-square mr-2' aria-hidden='true'></i>Edit</a>
                    </div>

                  </div>
                </div>
                ";
              } else {
                $itemid_with_1253 = $itemID + 1254;
                echo
                "
                <div class='col-md-6 border-end'>
                  <div class='d-flex flex-column justify-content-center'>
                    <div class='main_image border'><a href='{$row['pic_url']}' target='_blank'>
                      <img src='{$row['pic_url']}' id='main_product_image' width='100%'/></a>
                    </div>

                  </div>
                </div>
                <div class='col-md-6'>
                  <div class='p-3 right-side'>
                    <div class='d-flex justify-content-between align-items-center'>
                      <h3>{$name}</h3> <span class='heart'><i class='bx bx-heart'></i></span>
                    </div>
                    <div class='mt-2 pr-3 content'>
                      <p>{$row['discription']}</p>
                    </div>
                    <h4>LKR {$formatedprice}</h4>
                    
                    <div class='mt-5'> <span class='fw-bold'>Type</span>
                      <p class='m-3'>{$row['type']}</p>
                      <p class='text-muted'>{$row['post_date']}</p>
                      <P class='text-danger'>Views ({$row['view_count']})</p><br><hr>
                      <h5><a href='./user.php?owner_id={$owner}'>Owner</a></h5>
                    </div>
                    <div class='buttons d-flex flex-row mt-5 gap-3'>
                      <button class='btn btn-outline-dark'>Buy Now</button>
                      <button class='btn btn-dark ml-3 cart-btn ' data-itemid='{$itemid_with_1253}'>Add to Basket</button>
                      
                    </div>

                  </div>
                </div>
                ";
              }
            } else {
              echo
              "
                <div class='col-md-6 border-end'>
                  <div class='d-flex flex-column justify-content-center'>
                    <div class='main_image border'><a href='{$row['pic_url']}' target='_blank'>
                      <img src='{$row['pic_url']}' id='main_product_image' width='100%'/></a>
                    </div>

                  </div>
                </div>
                <div class='col-md-6'>
                  <div class='p-3 right-side'>
                    <div class='d-flex justify-content-between align-items-center'>
                      <h3>{$name}</h3> <span class='heart'><i class='bx bx-heart'></i></span>
                    </div>
                    <div class='mt-2 pr-3 content'>
                      <p>{$row['discription']}</p>
                    </div>
                    <h4>LKR {$formatedprice}</h4>
                    
                    <div class='mt-5'> <span class='fw-bold'>Type</span>
                      <p class='m-3'>{$row['type']}</p>
                      <p class='text-muted'>{$row['post_date']}</p>
                      <P class='text-danger'>Views ({$row['view_count']})</p><br><hr>
                      <h5><a href='./user.php?owner_id={$owner}'>Owner</a></h5>
                    </div>
                    <div class='buttons d-flex flex-row mt-5 gap-3'>
                      <p class='alert alert-warning text-center w-100'>Must Login before buying <a href='./loginform.php' >Login Here</a></p>
                      
                    </div>

                  </div>
                </div>
                ";
            }
          } else {
            echo "<p class='alert alert-warning text-center w-100'>No Items Found!<br>Please try again later</p>";
          }
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









  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  <!-- Additional Scripts -->
  <script src="../assets/js/custom.js"></script>


  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var btn = document.querySelector('.cart-btn');

      btn.addEventListener('click', function(event) {
        const xhr = new XMLHttpRequest()


        xhr.onreadystatechange = function() {
          if (xhr.readyState == 4 && xhr.status == 200) {
            if (this.responseText == 1) {
              document.querySelector('.text-msg').innerHTML = 'Item Added To Cart'
              document.querySelector('.cart-alert').classList.remove('alert-danger')
              document.querySelector('.cart-alert').classList.add('alert-success')

            } else {
              document.querySelector('.text-msg').innerHTML = 'Item already in the cart'
              document.querySelector('.cart-alert').classList.remove('alert-success')
              document.querySelector('.cart-alert').classList.add('alert-danger')

            }
            document.querySelector('.popup-cart').classList.remove('d-none');
          }

        }
        xhr.open('GET', `./addtocart.php?addtocart=true&itemid=${event.target.dataset.itemid}`)
        xhr.send()

      })

      const closebtn = document.querySelector('.close-popup')
      closebtn.addEventListener('click', () => {
        document.querySelector('.popup-cart').classList.add('d-none')
      })

    })
    setTimeout(rmError, 2000);

    function rmError() {
      let error = document.querySelector('.error');
      if (error) {
        error.remove()
      }
    }
  </script>
</body>

</html>