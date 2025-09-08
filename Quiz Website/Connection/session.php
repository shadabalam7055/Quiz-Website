<?php

    session_start();

    $_SESSION["username"] = "Shadab Alam";

    echo $_SESSION["username"];

    session_unset();
?>