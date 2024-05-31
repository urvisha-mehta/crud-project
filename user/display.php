<?php
@include 'C:\laragon\www\crud-task\desing\config\connection.php';
@include 'C:\laragon\www\crud-task\desing\user\create.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <link rel="database" href="conn.php">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <button class="btn btn-primary my-5"><a href="user-form.php" class="text-light">ADD User</a></button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Index</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Mobile Number</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Hobbies</th>
                    <th scope="col">Country</th>
                    <th scope="col">Profile Picture</th>
                    <th scope="col">Operation</th>
                </tr>
            </thead>


            <?php
            $sql = "select * from `users`";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $first_name = $row['first_name'];;
                    $last_name = $row['last_name'];
                    $email = $row['email_address'];
                    $password = $row['password'];
                    $phone = $row['phone_no'];
                    $gender = $row['gender'];
                    $hobbies = $row['hobbies'] ?? [];
                    // $hobbies=implode(",",$hobbies) ;
                    $country = $row['country'];
                    $profile = $row['profile_picture'];


                    echo '<tr>
                
                <th scope="row">' . $id . '</th>
                <td>' . $first_name . '</td>
                <td>' . $last_name . '</td>
                <td>' . $email . '</td>
                <td>' . $password . '</td>
                <td>' . $phone . '</td>
                <td>' . $gender . '</td>
                <td>' . $hobbies . '</td>
                <td>' . $country . '</td>
                <td>' . $profile . '</td>
                <td><button class="btn btn-danger"><a href="update.php?id=' . $id . '" class="text-light">Edit</a></button>
                <button class="btn btn-primary"><a href="delete.php?deleteid=' . $id . '" class="text-light">Delete</a></button></td>
                </tr>
                ';
                }
            }

            ?>
            <tbody>
            </tbody>
        </table>
    </div>
</body>

</html>