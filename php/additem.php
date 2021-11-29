<html lang="en">
<?php
include_once './conn.php';
if (isset($_COOKIE['uid']) && $_COOKIE['u_email']) {
  $login = true;
  $uid = (int)$_GET['user_id'] - 999;
  $sql = "SELECT name FROM user WHERE id={$uid}";
  if ($conn->query($sql) == TRUE) {
    if (!$conn->query($sql)->num_rows > 0) {
      $_SESSION['db-error'] = 'No Users Found!';
      header('Location:../index.php');
    }
  }
} else {
  $login = false;
  header("Location:../index.php");
}





?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

  <title>Sixteen Clothing HTML Template</title>

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
              <a class="nav-link" href="../index.php">

                Home

              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./products.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./products.php">Trending</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./aboutus.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./contact.php">Contact Us</a>
            </li>


            <?php
            if ($login) {
              echo "<li class='nav-item '>
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



  <div class="container mt-4">
    <div class="row">
      <div class="col-12 col-lg-10 mx-auto">
        <?php
        if (isset($_SESSION['file_error'])) {
          echo "<p class='alert alert-danger text-center error'>{$_SESSION['file_error']}</p>";
          $_SESSION['file_error'] = null;
        }

        ?>
        <form action="./saveitem.php" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="formGroupExampleInput">Item Name<span class="text-danger">*</span></label>
            <input type="text" class="form-control" required name="itemname" id="formGroupExampleInput" placeholder="Example input">
            <small class="text-muted">80 Charactors only</small>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Discription<span class="text-danger">*</span></label>
            <textarea class=" form-control" id="formGroupExampleInput2" name="discription" required>

                        </textarea>
            <small class="text-muted">Must be at least 120 Charactors long</small>
          </div>

          <div class="form-group">
            <label for="price">Price<span class="text-danger">*</span></label>
            <input type="number" class="form-control" id="price" placeholder="29.89" name="itemprice" required>
            <small class="text-muted">Required</small>
          </div>
          <div class="form-group">
            <label for="inlineFormCustomSelect">Catogory <span class="text-danger">*</span></label>
            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="type" required>
              <option selected disabled>Choose...</option>
              <option value="bouquet">Bouquet</option>
              <option value="flower plant">Flower Plant</option>
              <option value="flower vass">Flower Vass</option>
              <option value="flower seeds">Flower Seeds</option>
            </select>
          </div>
          <div class="form-group">
            <label for="price">Location/City<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="location" placeholder="Colombo" name="location" required>
            <small class="text-muted">Item location</small>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Upload</span>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="inputGroupFile01" name="itempicture" required>
              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
          </div>

          <div class="form-group mt-4">
            <input type="submit" class="btn btn-outline-dark" value="List Now" name="add-item">
            <a class="btn btn-outline-warning" href="./user.php?user_id=<?php echo $_GET['user_id']; ?>">Not Now</a>
          </div>

        </form>
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