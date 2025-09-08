<?php
    $servername = "localhost";
    $user = "root";
    $password = "";
    $dbname = "quizform";

    $connect = mysqli_connect($servername,$user,$password,$dbname);

    if($connect) {
        // echo"Successfully Connect";
    }
    else {
        echo"connection Failed";
    }
?>






