<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: index.php");
}

require_once "database.php"; // Make sure to include this at the top of the file

if (isset($_POST["submit"])) {
    $Name = $_POST["name"];
    $email = $_POST["email"];
    $num = $_POST["numbers"];
    $password = $_POST["password"];

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $errors = array();

    if (empty($Name) || empty($email) || empty($num) || empty($password)) {
        array_push($errors, "All fields are required");
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Email is not valid");
    }
    
    if (strlen($password) < 8) {
        array_push($errors, "Password must be at least 8 characters long");
    }

    // Check if email already exists
    $sql_check_email = "SELECT * FROM newweb WHERE fld_email = '$email'";
    $result_check_email = mysqli_query($conn, $sql_check_email);

    if (mysqli_num_rows($result_check_email) > 0) {
        array_push($errors, "Email already exists!");
    } else {
        // Insert the data into the database
        $sql_insert = "INSERT INTO newweb (fld_name, fld_email, fld_phnum, fld_pass) VALUES ('$Name', '$email', '$num', '$passwordHash')";
        $result_insert = mysqli_query($conn, $sql_insert);

        if ($result_insert) {
            echo "Registration successful!";
            // You might want to redirect to another page here
        } else {
            echo "Error inserting data: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style type="text/css">
      html {
        width:100%;
        height:100%;
        background:url() center center no-repeat;
        min-height:100%;
      }
    </style>
</head>
<body background ="imageweb.jpg"><br>
    <div class="container">
        <?php if (isset($_POST["submit"])): ?>
            <div class="alert alert-<?php echo count($errors) > 0 ? 'danger' : 'success'; ?>" role="alert">
                <?php
                if (count($errors) > 0) {
                    foreach ($errors as $error) {
                        echo $error . "<br>";
                    }
                } else {
                    echo "Registration successful!";
                    // You might want to provide a link or button to proceed
                }
                ?>
            </div>
        <?php endif; ?>
        <form action="registration.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Full Name">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="tel" class="form-control" name="numbers" placeholder="Phone">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
            </div>
        </form>
        <div>
            <p>Already Registered? <a href="login.php">Login Here</a></p>
        </div>
    </div>
</body>
</html>
