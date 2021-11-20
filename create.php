<?php
include 'db/config.php';

session_start();
if(isset($_POST['save'])){

    // Escape user inputs for security
    $first_name = mysqli_real_escape_string($conn, $_REQUEST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_REQUEST['last_name']);
    $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
    $phone = mysqli_real_escape_string($conn, $_REQUEST['phone']);

    $sql = "INSERT INTO users (first_name,last_name,email,phone) VALUES ('$first_name', '$last_name','$email','$phone')";

    if(mysqli_query($conn, $sql)){
        $_SESSION['message'] = "Record has been added successfully";
        header('location: index.php'); 
        
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
}
 
// Close connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create Record</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <style type="text/css">
    * {
        margin: 0px;
        padding: 0px;
    }
    </style>

</head>
<body>
    <div class="login">
        <div class="account-login">
            <h1>Create New Record</h1>
            <form action="create.php" method="POST" class="login-form">
                <div class="form-group">
                    <input type="text" placeholder="First Name" class="form-control" name="first_name" required="">
                </div>

                <div class="form-group">
                    <input type="text" placeholder="Last Name" class="form-control" name="last_name" required="" >
                </div>

                <div class="form-group">
                    <input type="email" placeholder="Email" class="form-control" name="email" required="email">
                </div>

                <div class="form-group">
                    <input type="phone" placeholder="Phone Number"  class="form-control" name="phone" required="">
                </div>
                <button type="submit" class="btnsave" name="save">Save Record</button>
            </form>
        </div>
    </div>
</body>
</html>

