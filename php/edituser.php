<?php
include_once './conn.php';

if (!isset($_GET['uid'])) {
    header("Location:../index.php");
}

$userid = (int)$_GET['uid'] - 999;

$sql = "SELECT name,mobile,city,address,email FROM user WHERE id={$userid}";
$res = $conn->query($sql);
if ($res == TRUE) {
    if ($res->num_rows > 0) {
        $user = $res->fetch_assoc();
    } else {
        $_SESSION['db-error'] = 'No Users Found!';
        header("Location:../index.php");
    }
} else {
    $_SESSION['db-error'] = 'Error connecting to the database!';
    header("Location:../index.php");
}



?>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DreamWeaver Flowers-Edit User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class=" bg-dark w-100" style="height: 60px;">

    </div>

    <div class="container mt-3">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-6 mx-auto">
                <form action="./register.php" method="POST" class="form">
                    <legend class="text-center">Fill Here</legend>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" type="text" class="form-control" name="newname" value="<?= $user['name'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input id="email" type="text" class="form-control" value="<?= $user['email'] ?>" required name="newemail">
                    </div>
                    <div class="form-group input-group">

                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                        </div>
                        <select class="custom-select" style="max-width: 120px;">
                            <option selected="">+94</option>

                        </select>
                        <input name="number" id="number" class="form-control num" required placeholder="Phone number" type="text" value="<?= $user['mobile'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="ad">Address</label>
                        <input type="text" class="form-control" id="ad" name="newaddress" value="<?= $user['address'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" name="city" id="city" value="<?= $user['city'] ?>" required>
                    </div>
                    <div class="form-group mt-5">
                        <input type="submit" value="Save" name="update-user" class="btn btn-outline-success">
                        <a href="<?= $_SERVER['HTTP_REFERERv'] ?>" class="ml-2 btn btn-outline-warning">Not Now</a>
                    </div>

                </form>

            </div>
        </div>
    </div>


    <script>
        const form = document.querySelector('.form')
        form.addEventListener('submit', (event) => {
            const number = e.target.number.value;
            if (number.length != 9) {
                alert("Number can only contain 9 digits")
                event.preventDefault()
            }
        })
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>