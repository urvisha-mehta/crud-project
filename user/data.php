<?php

@include('../config/connection.php');
$conn = $GLOBALS['conn'];

$query = "SELECT `country-name` FROM countries";
$result = array();
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($countries = $result->fetch_assoc()) {
        echo "countries: " . $countries["country-name"] . "<br>";
    }
}
