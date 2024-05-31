<?php
@include './config/connection.php';
@include './create/userDataInsert.php';

$uploadDir = 'uploads/';

$allowsFileType = array('jpg', 'jpeg', 'png');

$responce = array(
    'status' => 0,
    'message' => 'File Submission Failed , Please Try Again'
);
if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email_address'])) {
    if (!empty($first_name) && !empty($last_name) && !empty($email)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $response['message'] = 'Please Enter All Details';
        } else {
            $uploadStatus = 1;

            $uploadFile = '';
            if (!empty($_FILES["file"]["name"])) {
                $fileName = basename($_FILES["files"]["name"]);
                $targetFilePath = $uploadDir . $fileName;
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

                if (in_array($fileType, $allowTypes)) {
                    if (move_uploaded_file($_FILES["file"]["tem_name"], $targerFilePath)) {
                        $uploadedFile = $fileName;
                    } else {
                        $uploadStatus = 0;
                        $response['message'] = "file not uploaded";
                    }
                } else {
                    $uploadStatus = 0;
                    $response['message'] = 'sorry, only `.implode(' / ', $allowTypes).` file are allowed to upload';
                }
            }
            if ($uploadStatus == 1) {
                include_once './config/config.php';
                include_once './config/connection.php';
            }
        }
    } else {
        $respone['message'] = "pls fill all field";
    }
}
echo json_encode($response);
