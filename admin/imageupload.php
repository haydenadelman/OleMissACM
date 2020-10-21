<?php

if (isset($POST['upload'])) {
    $image = $_FILES['image'];

    $imageName = $_FILES['image']['name'];
    $imageTmpName = $_FILES['image']['tmp_name'];
    $imageSize = $_FILES['image']['size'];
    $imageError = $_FILES['image']['error'];
    $imageType = $_FILES['image']['type'];

    $imageExt = explode('.', $imageName);
    $imageActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($imageActualExt, $allowed)) {
        if ($imageError === 0) {
            if($imageSize < 1000000) {
                $imageNameNew = uniqid('', true).".".$imageActualExt;
                $imageDestination = 'imgs/'.$imageNameNew;
            }
            else {
                echo "Your file is too large!";
            }
        }
        else {
            echo "There was an error uploading your file";
        }
    }
    else {
        echo "You cannot upload files of this type!";
    }
}


?>
