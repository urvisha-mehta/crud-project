<?php

function validateRequired($fieldName, $value)
{
    $error = "";
    if (empty(trimInput($value))) {
        $error = $fieldName . " is required.";
    }
    return $error;
}

// function fieldRequiredValidation($fieldName, $value)
// {
//     $error = "";
//     if (empty(trimInput($value))) {
//         $error = $fieldName . " is required.";
//     }
//     return $error;
// }

function validateFirst_name($fieldName, $value)
{
    $error = "";
    if (empty(trimInput($value))) {
        $error = $fieldName . " is required.";
    }
    return $error;
}

function validateLast_name($fieldName, $value)
{
    $error = "";
    if (empty(trimInput($value))) {
        $error = $fieldName . " is required.";
    }
    return $error;
}

function validateEmail()
{
    $err = "";
    $email = $_POST["email_address"];
    if (empty($email)) {
        $err = "Please Enter Your Email Address" . "<br>";
        return $err;
        if (!empty($email)) {
            $conn = $GLOBALS['conn'];
            $checkEmail  = "SELECT * FROM users where email_address = '$email'";
            $resultEmail = mysqli_query($conn, $checkEmail);
            $count = mysqli_num_rows($resultEmail);
            $emailError = array();
            if ($count > 0) {

                $emailError['message'] = 'Email Already Exist';
                return $emailError;
            }
        } else {
            $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
            if (!preg_match($pattern, $email)) {
                $err = "Email is not valid require format is abc@gmail.com";
                // echo $err;  
                return $err;
            }
        }
    }
}

function validateMobileNumber()
{
    $err = "";
    $phone = $_POST["phone_no"];
    if (empty($phone)) {
        $err = "Please Enter Your Phone Number" . "<br>";
        return $err;
    }

    if (!preg_match("/^\d{10}$/", $phone)) {
        $err = "Only numeric value is allowed.";
        return $err;
    }
}

function validatePassword()
{
    $err = "";
    $password = $_POST["password"];
    if (empty($password)) {
        $err = "Please Enter Your Password" . "<br>";
        return $err;
    }
    if (strlen($_POST["password"]) <= '6') {
        $err .= "Your Password Must Contain At Least 6 Digits !" . "<br>";
    }
    if (!preg_match("#[0-9]+#", $_POST["password"])) {
        $err .= "Your Password Must Contain At Least 1 Number !" . "<br>";
    }
    if (!preg_match("#[A-Z]+#", $_POST["password"])) {
        $err .= "Your Password Must Contain At Least 1 Capital Letter !" . "<br>";
    }
    if (!preg_match("#[a-z]+#", $_POST["password"])) {
        $err .= "Your Password Must Contain At Least 1 Lowercase Letter !" . "<br>";
    }
    if (!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST["password"])) {
        $err .= "Your Password Must Contain At Least 1 Special Character !" . "<br>";
    }
    return $err;
}

function trimInput($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}
