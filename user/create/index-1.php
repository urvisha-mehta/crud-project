<!DOCTYPE html>
<html lang="en">

<head>
    <?php @include('../../layouts/style.php');
    @include('../../user/data.php') ?>

</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">
        <?php
        @include '../../layouts/header.php';
        ?>
        <!-- Main Sidebar Container -->
        <?php
        @include '../../layouts/sidebar.php';
        ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mt-5">
                            <div class="card-header">
                                <h1>User Data</h1>
                            </div>
                            <div class="card-body">
                                <form id="myForm" method="POST">
                                    <label for="firstname">First Name:</label>
                                    <input placeholder="ENTER YOUR FIRST NAME" class="form-control mb-2" type="text" id="firstname" name="first_name">
                                    <br>
                                    <label for="lastname">Last Name:</label>
                                    <input placeholder="ENTER YOUR LAST NAME" class="form-control mb-2" type="text" id="lastname" name="last_name">
                                    <br>
                                    <label for="email">Email:</label>
                                    <input placeholder="ENTER YOUR EMAIL" class="form-control mb-2" type="text" id="email" name="email_address">
                                    <br>
                                    <div id="passwordError" class="text-danger"></div>
                                    <label for="password">Password:</label>
                                    <input placeholder="ENTER YOUR PASSWORD" class="form-control mb-2" type="password" id="password" name="password">
                                    <br>
                                    <label for="phone">Phone Number:</label>
                                    <input placeholder="ENTER YOUR PHONE NUMBER" class="form-control mb-2" type="number" id="phone" name="phone_no">
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
                                                <select name="country" id="Select Country" class="form-control my-3">
                                                    <option selected="selected">Choose one</option>
                                                    <?php
                                                    foreach ($countries as $country) { ?>
                                                        <option value="<?= $countries['country-name'] ?>"><?= $countries['country-name'] ?></option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </div>
                                            <label for=" profile_pic">Upload Profile Picture:
                                            </label>
                                            <div class="form-control mb-3">
                                                <input name="profile_picture" type="file" id="file">
                                            </div>
                                            <button type="submit" name="submit_button" id="submit" value="submit" class="btn btn-primary submitBtn">Submit</button>
                                </form>
                            </div>
                        </div>

                        <?php @include('../../layouts/script.php') ?>
</body>

</html>