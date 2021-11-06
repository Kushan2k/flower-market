<?php
if (!isset($_GET['item'])) {
  header('Location:../index.php');
}
include_once './conn.php';
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


  <header class="bg-dark position-relative">
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
              <a class="nav-link" href="products.php">Our Products</a>
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
            <li class="nav-item">
              <a class="nav-link" href="./php/signup.php">Join</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>



  <div class="container mt-5 mb-5">
    <div class="card">
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
            if (isset($_COOKIE['uid'])) {
              if ((int)$row['user_id'] == ($_COOKIE['uid'] - 999)) {
                echo
                "
                <div class='col-md-6 border-end'>
                  <div class='d-flex flex-column justify-content-center'>
                    <div class='main_image border'>
                      <img src='{$row['pic_url']}' id='main_product_image' width='100%'/>
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
                    <h4>LKR {$row['price']}</h4>
                    <div class='ratings d-flex flex-row align-items-center'>
                      <div class='d-flex flex-row'> <i class='bx bxs-star'></i> <i class='bx bxs-star'></i> <i class='bx bxs-star'></i> <i class='bx bxs-star'></i> <i class='bx bx-star'></i> </div> <span>{$row['view_count']} views</span>
                    </div>
                    <div class='mt-5'> <span class='fw-bold'>Type</span>
                      <p class='m-3'>{$row['type']}</p>
                      <p class='text-muted'>{$row['post_date']}</p>
                      <P class='text-danger'>Views ({$row['view_count']})</p>
                    </div>
                    <div class='buttons d-flex flex-row mt-5 gap-3'>
                      
                      <button class='btn btn-warning'>Edit</button>
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
                    <div class='main_image border'>
                      <img src='{$row['pic_url']}' id='main_product_image' width='100%'/>
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
                    <h4>LKR {$row['price']}</h4>
                    <div class='ratings d-flex flex-row align-items-center'>
                      <div class='d-flex flex-row'> <i class='bx bxs-star'></i> <i class='bx bxs-star'></i> <i class='bx bxs-star'></i> <i class='bx bxs-star'></i> <i class='bx bx-star'></i> </div> <span>{$row['view_count']} views</span>
                    </div>
                    <div class='mt-5'> <span class='fw-bold'>Type</span>
                      <p class='m-3'>{$row['type']}</p>
                      <p class='text-muted'>{$row['post_date']}</p>
                      <P class='text-danger'>Views ({$row['view_count']})</p>
                    </div>
                    <div class='buttons d-flex flex-row mt-5 gap-3'>
                      <button class='btn btn-outline-dark'>Buy Now</button>
                      <button class='btn btn-dark ml-3'>Add to Basket</button>
                      
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









  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  <!-- Additional Scripts -->
  <script src="../assets/js/custom.js"></script>
</body>

</html>