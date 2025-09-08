<?php
session_start();

$loggedInUser = isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : "Guest";

if ($loggedInUser === "Guest") {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Quiz Website</title>
    <link rel="stylesheet" href="../CSS/quiz.css">

</head>

<body>

    <div class="userinfo">
        <mark><span class="username"> &nbsp;&nbsp; Hello, <?php echo $loggedInUser; ?> &nbsp;&nbsp;</span></mark>
    </div>

    <div class="quiz section" id="quiz_section"> 

        <div id="quiz"> 

            <h1> Test Your Brainpower</h1>

            <hr/>

            <h2 class="question" id="question"> Quiz Question</h2>

            <hr/>

            <ul>

                <li> <input type="radio" class="answer" name="answer" id="a"> 

                    <label for="a" id="option_1"> Quiz Option</label>

                </li>                

                <li> <input type="radio" class="answer" name="answer" id="b"> 

                    <label for="b" id="option_2"> Quiz Option</label>

                </li>

                <li> <input type="radio" class="answer" name="answer" id="c"> 

                    <label for="c" id="option_3"> Quiz Option</label>

                </li>

                <li> <input type="radio" class="answer" name="answer" id="d"> 

                    <label for="d" id="option_4"> Quiz Option</label>

                </li>

            </ul>

            <hr/>

        </div>

        <div class="button-container">

            <button class="clearbtn" id="clear"> Clear</button>

            <button class="nextbtn" id="next"> Next</button>

        </div>

    </div>



    <a href="../Connection/logout.php"><input type="submit" name="" value="logout" class="logoutbtn"></a>

    <script src="../JavaScript/quiz.js"></script>

</body>

</html>