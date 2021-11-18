<?php

include_once './conn.php';
if (isset($_GET['addtocart'])) {
    if (isset($_GET['itemid'])) {
        $id = (int)$_COOKIE['uid'] - 999;
        $itemid = (int)$_GET['itemid'] - 1254;
        if (checkcart($id, $itemid, $conn)) {
            addToCart($id, $itemid, $conn);
            echo getCartCount($id, $conn);
        } else {
            echo 'item already in cart';
        }
    } else {
        echo false;
    }
} else {
    echo false;
}


function getCartCount($userid, $conn)
{
    $sql = "SELECT count(user_id) as itemcount FROM cart WHERE user_id={$userid}";
    $result = $conn->query($sql);
    if ($result == TRUE) {
        if ($result->num_rows > 0) {
            return (int)$result->fetch_assoc()['itemcount'];
        } else {
            return 0;
        }
    } else {
        return false;
    }
}

function addToCart($userid, $itemid, $conn)
{
    $sql = "INSERT INTO cart(user_id,item_id,status) VALUES({$userid},{$itemid},0)";
    $result = $conn->query($sql);
    if ($result == TRUE) {
        return true;
    } else {
        return false;
    }
}


function checkcart($uid, $itemid, $conn)
{
    $sql = "SELECT user_id FROM cart WHERE user_id={$uid} AND item_id={$itemid}";
    $result = $conn->query($sql);
    if ($result == TRUE) {
        if ($result->num_rows > 0) {
            return false;
        } else {
            return true;
        }
    } else {
        return false;
    }
}
