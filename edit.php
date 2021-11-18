<?php
include 'db/config.php';
if (isset($_POST['save'])) {
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    mysqli_query($conn, "UPDATE users SET first_name='$first_name',last_name='$last_name',email='$email',phone='$phone' WHERE id=$id");
    
    header('location: index.php');
}

$result = mysqli_query($conn,"SELECT * FROM users WHERE id='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Record</title>
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
            <h1>Update Record</h1>
            <form action="edit.php" method="POST" class="login-form">
                <input type="hidden" name="id" class="txtField" value="<?php echo $row['id']; ?>">

                <div class="form-group">
                    <input type="text" placeholder="First Name" class="form-control" name="first_name" required="" value="<?php echo $row['first_name']; ?>">
                </div>

                <div class="form-group">
                    <input type="text" placeholder="Last Name" class="form-control" name="last_name" required="" value="<?php echo $row['last_name']; ?>">
                </div>

                <div class="form-group">
                    <input type="email" placeholder="Email" class="form-control" name="email" required="email" value="<?php echo $row['email']; ?>">
                </div>

                <div class="form-group">
                    <input type="phone" placeholder="Phone Number"  class="form-control" name="phone" required="" value="<?php echo $row['phone']; ?>">
                </div>
                <button type="submit" class="btnsave" name="save">Save Record</button>
            </form>
        </div>
    </div>
</body>
</html>

