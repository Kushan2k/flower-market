<?php
include_once './conn.php';
if (!isset($_COOKIE['uid']) && !isset($_COOKIE['u-email'])) {
    header("Location:../index.php");
}
if (!isset($_GET['uid'])) {
    header("Location:../index.php");
} else {
    $uid = (int)$_GET['uid'] - 999;
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/fontawesome.css">
    <link rel="stylesheet" href="../assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="../assets/css/owl.css">



    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>
<!--Section: Block Content-->

<body>

    <div class=" container bg-dark w-100" style="height: 50px;margin-bottom:70px">

    </div>


    <div class="px-4 px-lg-0 ">


        <div class="pb-5 ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12  bg-white rounded shadow-sm mb-5">

                        <!-- Shopping cart table -->
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="p-2 px-3 text-uppercase">Product</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Price</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Quantity</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Remove</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT item_id FROM cart WHERE user_id={$uid}";
                                    $res = $conn->query($sql);
                                    $total = 0;
                                    if ($res == TRUE) {
                                        if ($res->num_rows > 0) {
                                            while ($row = $res->fetch_assoc()) {
                                                $itemid = $row['item_id'];
                                                $sql = "SELECT id,name,price,pic_url,type FROM item WHERE id={$itemid}";
                                                $result = $conn->query($sql);
                                                if ($result == TRUE) {
                                                    if ($result->num_rows > 0) {
                                                        while ($itemrow = $result->fetch_assoc()) {

                                                            $pice = number_format($itemrow["price"], 2, '.', ',');
                                                            $total += (float)$itemrow['price'];
                                                            echo
                                                            "
                                                            <tr class='item-row item-{$itemrow['id']}'>
                                                                <th scope='row' class='border-0'>
                                                                    <div class='p-2'>
                                                                        <img src='{$itemrow["pic_url"]}' alt='' width='140' class='img-fluid rounded shadow-sm'>
                                                                        <div class='ml-3 d-inline-block align-middle'>
                                                                            <h5 class='mb-0'> <a href='#' class='text-dark d-inline-block align-middle'>{$itemrow["name"]}</a></h5><span class='text-muted font-weight-normal font-italic d-block'>Category: {$itemrow["type"]}</span>
                                                                        </div>
                                                                    </div>
                                                                </th>
                                                                <td class='border-0 align-middle '>LKR <strong class='price-{$itemrow['id']}' >{$pice}</strong></td>
                                                                <td class='border-0 align-middle'><strong>3</strong></td>
                                                                <td class='border-0 align-middle'>
                                                                    <button class='del-btn border-0' data-item='{$itemrow['id']}'>
                                                                            <i class='fa fa-trash text-danger' aria-hidden='true' style='transform: scale(1.6);' data-item='{$itemrow['id']}'>

                                                                            </i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                            ";
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }

                                    ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- End -->
                    </div>
                </div>

                <div class="row py-5 p-4 bg-white rounded shadow-sm">
                    <div class="col-lg-6">

                    </div>
                    <div class="col-lg-6">
                        <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
                        <div class="p-4">
                            <p class="font-italic mb-4">Shipping and additional costs are calculated based on values you have entered.</p>
                            <ul class="list-unstyled mb-4">
                                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Order Subtotal </strong><strong><?= 'LKR ' . number_format($total, 2, '.', ',') ?></strong></li>
                                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                                    <h5 class="font-weight-bold"><?= 'LKR ' . number_format($total, 2, '.', ',') ?></h5>
                                </li>
                            </ul><a href="#" class="btn btn-dark rounded-pill py-2 btn-block">Procceed to checkout</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const delBtns = document.querySelectorAll('.del-btn');

            delBtns.forEach(btn => {
                btn.addEventListener('click', (e) => {
                    // alert(e.target.dataset.item)
                    try {
                        const xhr = new XMLHttpRequest()

                        xhr.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                const delid = parseInt(this.responseText)
                                let cartlist = document.querySelectorAll('.item-row')
                                cartlist.forEach(item => {
                                    if (item.classList.contains(`item-${delid}`)) {

                                        item.remove()
                                        window.location = ''
                                    }
                                })
                            }
                        }
                        xhr.open('GET', `./addtocart.php?rm-cart=true&id=${e.target.dataset.item}`)
                        xhr.send()
                    } catch {
                        alert('Can not process your request now!');
                    }
                })
            })
        })
    </script>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>