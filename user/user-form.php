<?php
@include '../config/connection.php';
@include '../create/userDataInsert.php';
@include './validation.php';

if (isset($_POST['submit_button'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email_address'];
    $password = $_POST['password'];
    $phone = $_POST['phone_no'];
    $gender = $_POST['gender'];
    $hobbies = $_POST['hobbies'] ?? [];
    $hobbies = implode(",", $hobbies);
    $country = $_POST['country'];
    $profile = $_POST['profile_picture'];

    $data = [
        'first_name' => $first_name,
        'last_name' => $last_name,
        'email' => $email,
        'password' => $password,
        'phone' => $phone,
        'gender' => $gender,
        'hobbies' => $hobbies,
        'country' => $country,
        'profile' => $profile,
    ];
    $firstNameError = validateFirst_name("First Name", $first_name);
    $lastNameError = validateLast_name("Last Name", $last_name);
    $emailError = validateEmail("Email", $email);
    $passwordError = validatePassword("Password", $password);
    $phoneError = validateMobileNumber("Phone", $phone);

    if (empty($firstNameError) && empty($lastNameError) && empty($emailError) && empty($passwordError) && empty($phoneError)) {
        $result =  insertUserData($data);
        if ($result) {
            header('location:display.php');
            // echo "data inserted";
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(event) {
            $('#myForm').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: 'http://localhost/core-php/crud-task/config/uploadFile.php',
                    type: 'POST',
                    data: new FormData(this),
                    datatype: 'json',
                    contentType: false,
                    chace: false,
                    processData: false,
                    beforeSend: function() {
                        $('.submitBtn').attr("disabled", "disabled");
                        $('.myForm').css("opacity", ".5");
                    },

                    success: function(response) {
                        $('.statusMsg').html('')
                        if (response.status == 1) {
                            $(#myForm)[0].resert();
                            $('.statusMsg').html('<p class="alert alert-success">' + response.message + '</p>');
                        } else {
                            $('.statusMsg').html('<p class="alert alert-success">' + response.message + '</p>');
                        }

                        $('#myForm').css("opacity", "");
                        $(".submitBtn").removeAttr("disabled");



                        let jsonResponse = JSON.parse(response);
                        if (jsonResponse.status === 'success') {
                            $('#response').text(jsonResponse.message);
                        } else {
                            $('#response').text('Error: ' + jsonResponse.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        $('#response').text('Error: ' + error);
                    }
                });
            });
            // $("#file").change(function() {

            // });
        });
    </script> -->
</head>

<body>
    <div class="container">
        <!-- <div class="statusMsg"> -->

    </div>
    <div class="row">
        <div class="col-lg-7">
            <div class="card mt-5">
                <div class="card-header">
                    <h1>User Data</h1>
                </div>
                <div class="card-body">
                    <form id="myForm" method="POST">
                        <label for="firstname">First Name:</label>
                        <input placeholder="ENTER YOUR FIRST NAME" class="form-control mb-2" type="text" id="firstname" name="first_name">
                        <?php
                        if (!empty($firstNameError)) {
                            echo "<p>" . $firstNameError . "</p>";
                        }
                        ?>
                        <br>
                        <label for="lastname">Last Name:</label>
                        <input placeholder="ENTER YOUR LAST NAME" class="form-control mb-2" type="text" id="lastname" name="last_name">
                        <?php
                        if (!empty($lastNameError)) {
                            echo "<p>" . $lastNameError . "</p>";
                        }
                        ?>
                        <br>
                        <label for="email">Email:</label>
                        <input placeholder="ENTER YOUR EMAIL" class="form-control mb-2" type="text" id="email" name="email_address">
                        <?php
                        if (!empty($emailError)) {
                            echo "<p>" . $emailError . "</p>";
                        }
                        ?>
                        <br>
                        <div id="passwordError" class="text-danger"></div>
                        <label for="password">Password:</label>
                        <input placeholder="ENTER YOUR PASSWORD" class="form-control mb-2" type="password" id="password" name="password">
                        <?php
                        if (!empty($passwordError)) {
                            echo "<p>" . $passwordError . "</p>";
                        }
                        ?>
                        <br>
                        <label for="phone">Phone Number:</label>
                        <input placeholder="ENTER YOUR PHONE NUMBER" class="form-control mb-2" type="text" id="phone" name="phone_no">
                        <?php
                        if (!empty($phoneError)) {
                            echo "<p>" . $phoneError . "</p>";
                        }
                        ?>
                        <br>
                        <label for="gender">Select Gender</lable>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="male-gender" name="gender" value="Male" checked>
                                <label for="male-gender">Male</lable>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="female-gender" name="gender" value="Female">
                                <label for="female-gender">Female</lable>
                            </div>
                            <label>Select Hobbies</lable>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="writing-hobby" name="hobbies[]" value="Writing">
                                    <label for="writing-hobby">
                                        Writing
                                    </label><br>
                                    <input class="form-check-input" type="checkbox" id="reading-hobby" name="hobbies[]" value="Reading">
                                    <label for="reading-hobby">
                                        Reading
                                    </label><br>
                                    <input class="form-check-input" type="checkbox" id="coding-hobby" name="hobbies[]" value="Coding">
                                    <label for="coding-hobby">
                                        Coding
                                    </label>
                                </div>
                                <div class="dropdown show">
                                    <label for="Select Country">Select Country:</label><br />
                                    <select name="country" id="Select Country" class="btn border-secondary dropdown-toggle" onchange="loadStates() >
                                    <?php @include "./countries.php"; ?>
                                    
                                    <?php foreach ($countries as $country) : ?>
                                        <option value=" <?php echo $country; ?>">
                                        <?php echo $country; ?>
                                        </option>
                                    <?php endforeach; ?>
                                    </select>
                                </div>
                                <label for="profile_pic">Upload Profile Picture:</label>
                                <div class="mb-3">
                                    <input name="profile_picture" type="file" id="file">
                                </div>
                                <button type="submit" name="submit_button" id="submit" value="submit" class="btn btn-primary submitBtn">Submit</button>
                                <button class="btn btn-secondary"><a href="display.php" class="text-light">Cancel</a></button>
                    </form>
                    <!-- <div id="response"></div> -->
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(event) {
            $('#myForm').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: 'http://localhost/core-php/crud-task/config/connection.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        let jsonResponse = JSON.parse(response);
                        if (jsonResponse.status === 'success') {
                            $('#response').text(jsonResponse.message);
                        } else {
                            $('#response').text('Error: ' + jsonResponse.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        $('#response').text('Error: ' + error);
                    }
                });
            });
        });
    </script> -->
</body>

</html>