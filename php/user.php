<!DOCTYPE html>
<html lang="en">
<?php

include_once "./conn.php";

if (isset($_COOKIE['uid']) && $_COOKIE['u_email']) {
    $login = true;
} else if (isset($_GET['owner_id'])) {
    $_SESSION['go-to'] = $_SERVER['PHP_SELF'];
    header("Location:./error.php?error=login-error");
} else {
    $login = false;
    header("Location:../index.php");
}
$id = 0;
$own = false;
if (isset($_GET['user_id'])) {
    $id = (int)$_GET['user_id'] - 999;
    $own = true;
} else if (isset($_GET['owner_id'])) {
    $id = (int)$_GET['owner_id'] - 1289;
}

$sql = "SELECT name,email,city,address,mobile FROM user WHERE id=" . $id;

$result = $conn->query($sql);
if ($result == TRUE) {
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        $_SESSION['db-error'] = 'No users Found!';
        header("Location:../index.php");
    }
} else {
    $_SESSION['db-error'] = 'Error Connecting to the database!';
    header("Location:../index.php");
}




?>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Dreamweaver Flowers-Me</title>

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
                                echo "<li class='nav-item active'>
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

        <div class="container mt-4">
            <?php
            if (isset($_SESSION['message-s'])) {
                echo '<p class="alert alert-success text-center error">' . $_SESSION['message-s'] . '</p>';
                $_SESSION['message-s'] = null;
            } else if (isset($_SESSION['upload-errpr'])) {
                echo '<p class="alert alert-danger text-center error">' . $_SESSION['upload-errpr'] . '</p>';
                $_SESSION['upload-error'] = null;
            }
            ?>
            <div class="row">

                <div class="col-12 col-lg-5 profile-box">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg" /><span class="font-weight-bold"><?php echo $row['name']; ?></span><span class="text-black-50"><?php echo $row['email']; ?></span><span> </span>
                    </div>
                    <h4 class="alert alert-dark text-center text-capitalize">Profile Details</h4>
                    <div class="col-md-12">
                        <label class="labels">Name</label><input type="text" class="form-control" readonly value="<?php echo $row['name']; ?>" />
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Mobile Number</label><input readonly type="text" class="form-control" readonly placeholder="enter phone number" value="<?php echo $row['mobile']; ?>" />
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Address</label><input readonly type="text" class="form-control" placeholder="enter address line 1" value="<?php echo $row['address']; ?>" />
                    </div>
                    <div class="col-md-12">
                        <label class="labels">City</label><input readonly type="text" class="form-control" placeholder="enter address line 2" value="<?php echo $row['city'] ?>" />
                    </div>




                    <div class="col-md-12">
                        <label class="labels">Email</label><input type="text" readonly class="form-control" placeholder="enter email id" value="<?php echo $row['email']; ?>" />
                    </div>

                </div>

                <div class="col-12 col-lg-7 mt-3">
                    <?php if ($own) { ?>
                        <div class="row mb-3">
                            <div class="col-12">
                                <a class="btn btn-outline-dark" href="./additem.php?user_id=<?php echo $_COOKIE['uid']; ?>&action=add"><i class="fa fa-plus mr-1" aria-hidden="true"></i>Add Stock</a>
                                <a class="btn btn-outline-dark" href="./edituser.php?uid=<?= $_COOKIE['uid'] ?>"><i class="fa fa-pencil mr-2" aria-hidden="true"></i>Edit Profile</a>
                                <a href="./dashboard.php?uid=<?= $_COOKIE['uid'] ?>" class="btn btn-outline-dark"><i class="fa fa-info-circle mr-2" aria-hidden="true"></i>Dashboard</a>
                                <form action="./register.php" method="POST" class="mt-3">
                                    <input type="hidden" name="userid" value="<?= $_COOKIE['uid'] ?>">
                                    <input type="submit" value="Log Out" class="btn btn-outline-warning" name="logoutbtn">
                                </form>
                            </div>
                        </div>
                    <?php } ?>

                    <h4 class="alert alert-dark text-center">Item Details of user</h4>
                    <div class="row ">

                        <?php

                        $sql = "SELECT id,name,discription,price,view_count,pic_url,user_id FROM item WHERE user_id={$id} ORDER BY post_date DESC";
                        $res = $conn->query($sql);
                        if ($res == TRUE) {
                            if ($res->num_rows > 0) {
                                while ($row = $res->fetch_assoc()) {
                                    $price = number_format((float)$row['price'], 2, '.', ',');
                                    $itemid = (int)$row['id'] + 1254;
                                    echo
                                    "
                                        <div class='col-md-6 col-12'>
                                            <div class='product-item'>
                                            <a href='./item.php'><img src='./{$row['pic_url']}' alt=''></a>
                                            <div class='down-content'>
                                                <a href='./php/item.php'>
                                                <h4>{$row['name']}</h4>
                                                </a>
                                                <h6>LKR {$price}</h6>
                                                <p>{$row['discription']}.</p>
                                            </div>
                                            <div class='mb-4 ml-3'>
                                                <a href='./item.php?item={$itemid}' class='btn btn-outline-dark'>Go To Product</a>
                                            </div>
                                            </div>
                                        </div>
              ";
                                }
                            } else {
                                echo "<p class='alert alert-warning text-center w-100'>No Items Yet!<br>Keep Wait</p>";
                            }
                        } else {
                            echo "<p class='alert alert-danger text-center w-100'>Connecting error! <br>Please contact us..<a href='./php/contact.php'>in Here</a></p>";
                        }



                        ?>


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
    </div>


    <!-- Bootstrap core JavaScript -->
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