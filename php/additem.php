<html lang="en">
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
    .back-btn{
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
          <a class="navbar-brand" href="index.php"><h2>Sixteen <em>Clothing</em></h2></a>
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
              
              <li class="nav-item">
                <a class="nav-link active" href="./signup.php">Join</a>
              </li>
              <li class="nav-item">
                    <a class="nav-link " href="./user.php">Me</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>



    <div class="container mt-4">
        <div class="row">
            <div class="col-12 col-lg-10 mx-auto">
                <form>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Item Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                        <small class="text-muted">80 Charactors only</small>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Discription<span class="text-danger">*</span></label>
                        <textarea class=" form-control" id="formGroupExampleInput2">

                        </textarea>
                        <small class="text-muted">Must be at least 120 Charactors long</small>
                    </div>

                    <div class="form-group">
                        <label for="price">Price<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="price" placeholder="29.89">
                        <small class="text-muted">Required</small>
                    </div>
                    <div class="form-group">
                        <label for="inlineFormCustomSelect">Catogory <span class="text-danger">*</span></label>
                        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                            <option selected>Choose...</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <input type="submit" class="btn btn-success" value="List Now" >
                        <input type="reset" class="btn btn-warning" value="List Now" >
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
    
</body>
</html>