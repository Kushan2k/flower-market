<?php

include_once "./conn.php";

if (isset($_POST['add-item'])) {
    $itemname = htmlspecialchars($_POST['itemname']);
    $discription = htmlspecialchars($_POST['discription']);
    $price = htmlspecialchars($_POST['itemprice']);
    $type = htmlspecialchars($_POST['type']);
    $location = htmlspecialchars($_POST['location']);

    $picturefile = $_FILES['itempicture'];
    $filename = $picturefile['name'];
    $filesize = $picturefile['size'];
    // echo $filename;

    $allowFileTypes = array('jpeg', 'jpg', 'png');
    $pc = explode('.', $filename);
    $fileEXT = strtolower(end($pc));

    if (!in_array($fileEXT, $allowFileTypes)) {
        $_SESSION['file_error'] = 'File Type Can not be added!';
        header("Location:./additem.php?user_id={$_COOKIE['uid']}&action=add");
        // echo 'not in';
    }
    if ($filesize > 5242880) {
        $_SESSION['file_error'] = 'File should be smaller than 5MB';
        header("Location:./additem.php?user_id={$_COOKIE['uid']}&action=add");
        // echo '5mb not';
    }
    // print_r($picturefile);
    $uploadpath = 'itemImages/' . $_COOKIE['uid'] . '--' . $picturefile['name'];
    // $status = move_uploaded_file($picturefile['tmp_name'], $uploadpath);
    $id = $_COOKIE['uid'] - 999;
    $sql = "INSERT INTO item(name,discription,price,view_count,pic_url,location,type,user_id)
        VALUES(
            '{$itemname}','{$discription}',{$price},0,'{$uploadpath}',
            '{$location}','{$type}',{$id}
        )
    ";

    $addresult = $conn->query($sql);
    if ($addresult == TRUE) {
        if (move_uploaded_file($picturefile['tmp_name'], $uploadpath)) {
            $_SESSION['message-s'] = 'Item Added!';
            header("Location:./user.php?user_id={$_COOKIE['uid']}");
        } else {
            $_SESSION['upload-errpr'] = 'Image Upload Faild!';
            header("Location:./user.php?user_id={$_COOKIE['uid']}");
        }
    }



    // echo 'pass';


    // print_r($picturefile);
}

if (isset($_POST['update-item']) && isset($_POST['type'])) {
    $itemid = (int)$_POST['itemid'] - 5678;
    $newName = htmlentities($_POST['name']);
    $newPrice = htmlentities($_POST['itemprice']);
    $newDiscription = htmlentities(trim($_POST['discription']));
    $newLocation = htmlentities($_POST['location']);

    if (empty($newDiscription) && empty($newName) && empty($newPrice) && empty($newLocation)) {
        $_SESSION['update-error'] = 'please fill out all the fields!';
        header("Location:{$_SERVER['HTTP_REFERER']}");
    }

    $sql = $conn->prepare("UPDATE item SET name=? , price=? , location=? , discription=? WHERE id=?");
    if (!$sql) {
        $_SESSION['update-error'] = 'update failed!';
        header("Location:{$_SERVER['HTTP_REFERER']}");
    }
    $sql->bind_param('sdssi', $newName, $newPrice, $newLocation, $newDiscription, $itemid);

    if ($sql->execute()) {
        $_SESSION['update-success'] = 'Update Successful!';
        $item = (int)$_POST['itemid'] - 5678 + 1254;
        header("Location:./item.php?item={$item}");
    } else {
        $_SESSION['update-error'] = 'update failed!';
        header("Location:{$_SERVER['HTTP_REFERER']}");
    }
}

if (isset($_POST['del-item'])) {
    //get the item id from form and substract 5678 from it to get original id
    $itemid = (int)$_POST['del-id'] - 5678;


    //make sql query from delete the item
    $sql = $conn->prepare("DELETE FROM item WHERE id=?");
    // add item id to the sql query
    $sql->bind_param('i', $itemid);

    //run the sql query and check if successfull or not
    if ($sql->execute()) {
        //sending user back to home page /index
        header("Location:../index.php");
    } else {
        header("Location:../index,php");
    }
}
