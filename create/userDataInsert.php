<?php

require('../config/connection.php');



function insertUserData($data)
{

    $conn = $GLOBALS['conn'];
    extract($data);
    $query = "INSERT INTO users (first_name, last_name, email_address, password, phone_no, gender, hobbies, profile_picture, country)
                VALUES ('$first_name', '$last_name', '$email', '$password', '$phone', '$gender', '$hobbies', '$profile', '$country')";

    $result = mysqli_query($conn, $query);

    return $result;
}

function insertCountry()
{
    $country = $_POST['country-name'];
    $conn = $GLOBALS['conn'];
    $query = "INSERT INTO countries(country-name) VALUES ($country)";
    $result = mysqli_query($conn, $query);

    return $result;
}
