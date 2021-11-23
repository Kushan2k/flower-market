<?php

if (!isset($_COOKIE['uid']) && !isset($_COOKIE['uemail'])) {
    header("Location:{$_SERVER['HTTP_REFERER']}");
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dreamweaver Flowers-Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>

<body>

    <div class="bg-dark header-bar">
        Header
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class=" text-center ">Dashboard</h1>
            </div>
            <div class="col-12 d-flex justify-content-around align-items-center">
                <div class="row w-100 m-0 p-0">
                    <div class="col-3 bg-success info-box">1</div>
                    <div class="col-3 bg-dark info-box">2</div>
                    <div class="col-3 bg-warning info-box">3</div>
                    <div class="col-2 bg-primary info-box">4</div>
                </div>

            </div>

            <div class="col-12 mt-5">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col" class=" d-none d-md-block">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td class=" d-none d-md-block">@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td class=" d-none d-md-block">@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td class=" d-none d-md-block">@twitter</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <style>
        .header-bar {
            min-height: 60px;
            margin-bottom: 15px;
        }

        .info-box {
            margin: 5px;
            height: 60px;
            border-radius: 15px;
        }

        .info-box:hover {
            transform: scale(1.02);
            cursor: pointer;
            transition: 300ms linear;
        }
    </style>

    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>