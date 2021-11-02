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