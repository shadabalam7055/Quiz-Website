<?php

    session_start();

    include("../connection/connect.php");

    $error = "";
    
    if(isset($_POST['login'])) {
    $enrollment = $_POST['enrollno'];
    $dob = $_POST['dob'];
    $password = $_POST['password'];

    $query = "SELECT * FROM form WHERE Enrollment = '$enrollment'";
    $result = mysqli_query($connect, $query);

    if(mysqli_num_rows($result) == 0) {
        $error = "**Invalid Enrollment Number";
    } else {
        $row = mysqli_fetch_assoc($result);
        
        if($row['Date_Of_Birth'] != $dob) {
            $error = "**Date of Birth does not match";
        } elseif($row['Password_'] != $password) {
            $error = "**Incorrect Password";
        } else {
            $_SESSION['username'] = $row['UserName'];
            header("Location: quiz.php");
            exit;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/login.css">
    <title>Login Form</title>
</head>
<body>

    <div class="main">
        <form action="" method="post" onsubmit="return validation()" autocomplete="off">
        <div id="title">Login</div>

        <div class="form">

            <div class="field">
                <label>Enrollment No. :</label>
                <input type="text" name="enrollno" id="enumber" class="input" placeholder="E2311383550000">
            </div>

            <div class="field">
                <label>Date Of Birth :</label>
                <input type="date" name="dob" id="dob" class="input">
            </div>

            <div class="field">
                <label>Password :</label>
                <input type="password" name="password" id="password" class="input" placeholder="Password">
            </div>

            <div class="field">
                <span id="error"> <?php echo $error; ?> </span>
            </div>

            <div class="field">
                <input type="submit" name="login" value="Login" id="btn" class="button" >
            </div>

            <div class="fields">
                New Member ? 
                <a href="signup.php" class="link">Sign Up Here</a>
            </div>
        </form>
    </div>

<script src="../JavaScript/login.js"></script>
    
</body>
</html>