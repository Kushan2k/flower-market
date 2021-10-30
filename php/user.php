<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Sixteen Clothing HTML Template</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="../assets/css/fontawesome.css">
    <link rel="stylesheet" href="../assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="../assets/css/owl.css">

</head>

<body>

    <style>
        .profile-box {
            border-right: 5px solid rgb(140, 37, 14);
        }

        @media (max-width:990px) {
            .profile-box {
                border-right: none;
            }
        }
    </style>

    <div>


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
                        <h2>Sixteen <em>Clothing</em></h2>
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

                            <li class="nav-item">
                                <a class="nav-link" href="./signup.php">Join</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./php/signup.php"><i class="fa fa-cart-arrow-down" aria-hidden="true" style="transform: scale(1.8);"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="">Me</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <div class="container mt-4">
            <div class="row">
                <div class="col-12 col-lg-5 profile-box">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg" /><span class="font-weight-bold">Edogaru</span><span class="text-black-50">edogaru@mail.com.my</span><span> </span>
                    </div>
                    <h1 class="alert alert-success text-center text-capitalize">Profile Details</h1>
                    <div class="col-md-12">
                        <label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="enter phone number" value="" />
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Address Line 1</label><input type="text" class="form-control" placeholder="enter address line 1" value="" />
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Address Line 2</label><input type="text" class="form-control" placeholder="enter address line 2" value="" />
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Postcode</label><input type="text" class="form-control" placeholder="enter address line 2" value="" />
                    </div>
                    <div class="col-md-12">
                        <label class="labels">State</label><input type="text" class="form-control" placeholder="enter address line 2" value="" />
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Area</label><input type="text" class="form-control" placeholder="enter address line 2" value="" />
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Email ID</label><input type="text" class="form-control" placeholder="enter email id" value="" />
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Education</label><input type="text" class="form-control" placeholder="education" value="" />
                    </div>
                </div>

                <div class="col-12 col-lg-7 mt-3">
                    <div class="row mb-3">
                        <div class="col-12">
                            <a class="btn btn-outline-success" href="./additem.php">Add Item</a>
                            <button class="btn btn-outline-warning">Edit Profile</button>
                        </div>
                    </div>
                    <h1 class="alert alert-danger text-center">Item Details of user</h1>
                    <div class="row ">
                        <div class="col-12 col-md-6">

                            <div class="product-item">
                                <a href="#"><img src="../assets/images/product_01.jpg" alt=""></a>
                                <div class="down-content">
                                    <a href="./php/item.php">
                                        <h4>Tittle goes here</h4>
                                    </a>
                                    <h6>$25.75</h6>
                                    <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.</p>
                                    <p class=" text-muted">Views</p>
                                </div>
                                <div class="mb-4 ml-3">
                                    <a href="./php/item.php" class="btn btn-outline-success">Go To Product</a>
                                </div>
                            </div>

                        </div>

                        <div class="col-12 col-md-6">

                            <div class="product-item">
                                <a href="#"><img src="../assets/images/product_01.jpg" alt=""></a>
                                <div class="down-content">
                                    <a href="./php/item.php">
                                        <h4>Tittle goes here</h4>
                                    </a>
                                    <h6>$25.75</h6>
                                    <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.</p>
                                    <p class=" text-muted">Views</p>
                                </div>
                                <div class="mb-4 ml-3">
                                    <a href="./php/item.php" class="btn btn-outline-success">Go To Product</a>
                                </div>
                            </div>

                        </div>

                        <div class="col-12 col-md-6">

                            <div class="product-item">
                                <a href="#"><img src="../assets/images/product_01.jpg" alt=""></a>
                                <div class="down-content">
                                    <a href="./php/item.php">
                                        <h4>Tittle goes here</h4>
                                    </a>
                                    <h6>$25.75</h6>
                                    <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.</p>
                                    <p class=" text-muted">Views</p>
                                </div>
                                <div class="mb-4 ml-3">
                                    <a href="./php/item.php" class="btn btn-outline-success">Go To Product</a>
                                </div>
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
                            <p>Copyright &copy; 2020 Sixteen Clothing Co., Ltd.

                                - Design: <a rel="nofollow noopener" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>


    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Additional Scripts -->
    <script src="../assets/js/custom.js"></script>

</body>

</html>