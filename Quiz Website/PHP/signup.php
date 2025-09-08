<?php
session_start();
include("../Connection/connect.php"); 
error_reporting(0);

$error = "";

if(isset($_POST['register']))
{
    $username = trim($_POST['username']);
    $enrollment = trim($_POST['enrollno']);
    $dob        = trim($_POST['dob']);
    $branch     = trim($_POST['branch']);
    $year       = trim($_POST['year']);
    $gender     = trim($_POST['gender']);
    $password   = trim($_POST['password']);
    $cpassword  = trim($_POST['cpassword']);

    if ($username=="" || $enrollment=="" || $dob=="" || $branch=="" || $year=="" || $gender=="" || $password=="" || $cpassword=="")
    {
        $error = "**All Fields Are Required !";
    }
    elseif ($password !== $cpassword)
    {
        $error = "**Confirm Password Not Matched";
    }
    else
    {
        $check = "SELECT * FROM form WHERE Enrollment = '$enrollment'";
        $result = mysqli_query($connect, $check);

        if ($result)
        {
            if (mysqli_num_rows($result) > 0)
            {
                $error = "**Enrollment Already Registered";
            }
            else
            {
                $fields = "INSERT INTO form(UserName, Enrollment, Date_Of_Birth, Branch, Year_Semester, Gender, Password_, Confirm_Password) 
                           VALUES('$username','$enrollment','$dob','$branch','$year','$gender','$password','$cpassword')";
                $data = mysqli_query($connect, $fields);

                if ($data)
                {
                    
                    $_SESSION['username'] = $username;
                    header("Location: quiz.php");
                    exit();
                }
                else
                {
                    $error = "**Failed to insert data";
                }
            }
        }
        else
        {
            $error = "**Database query failed!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/signup.css">
    <title>Sign Up</title>
</head>
<body>
    <div class="main">
        <form action="quiz.php" method="post" onsubmit="return validation()" autocomplete="off">
        <div id="title">SIGN UP</div>

        <div class="form">
            <div class="field">
                <label>Name :</label>
                <input type="text" name="username" id="username" class="input" placeholder="Enter Your Name">
            </div>

            <div class="field">
                <label>Enrollment No. :</label>
                <input type="text" name="enrollno" id="enumber" class="input" placeholder="E2311383550000">
            </div>

            <div class="field">
                <label>Date Of Birth :</label>
                <input type="date" name="dob" id="dob" class="input">
            </div>

            <div class="field">
                <label>Branch :</label>
                <select class="selectbox sbox" name="branch" id="branch">
                    <option value="">Select</option>
                    <option value="CSE">Computer Science Engineering</option>
                    <option value="IT">Information Technology</option>
                    <option value="ELEX">Electronic Engineering</option>
                </select>
            </div>

            <div class="field">
                <label>Year & Semester :</label>
                <select class="selectbox sbox" name="year" id="year">
                    <option value="">Select</option>
                    <option value="1st Y & 1st SEM">1st Year & 1st Semester</option>
                    <option value="1st Y & 2nd SEM">1st Year & 2nd Semester</option>
                    <option value="2nd Y & 3rd SEM">2nd Year & 3rd Semester</option>
                    <option value="2nd Y & 4th SEM">2nd Year & 4th Semester</option>
                    <option value="3rd Y & 5th SEM">3rd Year & 5th Semester</option>
                    <option value="3rd Y & 6th SEM">3rd Year & 6th Semester</option>
                </select>
            </div>

            <div class="field">
                <label>Gender :</label>
                <select class="selectbox sbox" name="gender" id="gender">
                    <option value="">Select</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div class="field">
                <label>Password :</label>
                <input type="password" name="password" id="password" class="input" placeholder="Password">
            </div>

            <div class="field">
                <label>Confirm Password :</label>
                <input type="password" name="cpassword" id="cpassword" class="input" placeholder="Confirm Password">
            </div>

            <div class="field">
                <span id="error"> <?php echo $error; ?> </span>
            </div>

            <div class="field">
                <input type="submit" name="register" value="Register" id="btn" class="button" >
            </div>

            <div class="fields">
                Already have an account ? 
                <a href="login.php" class="link">Login</a>
            </div>

        </form>
    </div>

<script src="../JavaScript/signup.js"></script>

</body>
</html>