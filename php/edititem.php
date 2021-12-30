<?php
include_once './conn.php';

if (!isset($_GET['edititem']) && !isset($_COOKIE['uid']) && !isset($_COOKIE['uemail']) && !isset($_GET['for'])) {
    header('Location:./login.php');
} else {
    $itemid = $_GET['for'] - 5678;

    //geting relavent item details from the items table using the item id url parameter
    $sql = $conn->prepare("SELECT name,price,discription,location,stock FROM item WHERE id=?");
    //binding parameters to the query
    $sql->bind_param('i', $itemid);
    if ($sql->execute()) {
        $sql->bind_result($name, $price, $dis, $location, $stock);
        $sql->fetch();
    } else {
        header("Location:{$_SERVER['HTTP_REFERER']}");
    }
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit your items</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-12 col-lg-10 mx-auto">
                <?php
                if (isset($_SESSION['update-error'])) {
                    echo "<p class='alert alert-danger text-center error'>{$_SESSION['update-error']}</p>";
                    $_SESSION['update-error'] = null;
                }

                ?>
                <form action="./saveitem.php" method="POST">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Item Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" value="<?= $name ?>" id="formGroupExampleInput" placeholder="Example input">
                        <small class="text-muted">80 Charactors only</small>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Discription<span class="text-danger">*</span></label>
                        <textarea class=" form-control" id="formGroupExampleInput2" name="discription" required>
                        <?= $dis ?>
                        </textarea>
                        <small class="text-muted">Must be at least 120 Charactors long</small>
                    </div>

                    <div class="form-group">
                        <label for="price">Price<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="price" value="<?= $price ?>" placeholder="29.89" name="itemprice" required>
                        <small class="text-muted">Required</small>
                    </div>
                    <div class="form-group">
                        <label for="price">In Stock<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="stock" value="<?= $stock ?>" name="stock" required>
                        <small class="text-muted">In Stock</small>
                    </div>

                    <div class="form-group">
                        <label for="price">Location/City<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="location" value="<?= $location ?>" placeholder="Colombo" name="location" required>
                        <small class="text-muted">Item location</small>
                    </div>
                    <input type="hidden" name="type" value="update">
                    <input type="hidden" name="itemid" value="<?= $itemid + 5678 ?>">


                    <div class="form-group mt-4">
                        <input type="submit" class="btn btn-outline-dark" value="Update Now" name="update-item">
                        <a class="btn btn-outline-warning" href="<?= $_SERVER['HTTP_REFERER'] ?>">Not Now</a>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
        //removing the error if found
        setTimeout(rmError, 2000);

        function rmError() {
            let error = document.querySelector('.error');
            if (error) {
                error.remove()
            }
        }
    </script>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>