<?php
include_once './conn.php';

if (!isset($_GET['edititem']) && !isset($_COOKIE['uid']) && !isset($_COOKIE['uemail']) && !isset($_GET['for'])) {
    header('Location:./login.php');
} else {
    $itemid = $_GET['for'] - 5678;

    //geting relavent item details from the items table using the item id url parameter
    $sql = $conn->prepare("SELECT name,price,discription,location FROM item WHERE id=?");
    //binding parameters to the query
    $sql->bind_param('i', $itemid);
    if ($sql->execute()) {
        $sql->bind_result($name, $price, $dis, $location);
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
                if (isset($_SESSION['file_error'])) {
                    echo "<p class='alert alert-danger text-center error'>{$_SESSION['file_error']}</p>";
                    $_SESSION['file_error'] = null;
                }

                ?>
                <form action="./saveitem.php" method="POST">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Item Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" required name="name" value="<?= $name ?>" id="formGroupExampleInput" placeholder="Example input">
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
                        <label for="price">Location/City<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="location" value="<?= $location ?>" placeholder="Colombo" name="location" required>
                        <small class="text-muted">Item location</small>
                    </div>
                    <input type="hidden" name="type" value="update">


                    <div class="form-group mt-4">
                        <input type="submit" class="btn btn-success" value="Update Now" name="update-item">
                        <a class="btn btn-warning" href="<?= $_SERVER['HTTP_REFERER'] ?>">Not Now</a>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>