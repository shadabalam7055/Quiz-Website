<?php

    session_start();
    session_unset();

    header('location: ../PHP/login.php');

?>