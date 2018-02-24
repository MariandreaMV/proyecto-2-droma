<?php
    session_start();

    if (isset($_SESSION['user'])) {
        unset($_SESSION['user']);
        unset($_SESSION['admin']);
        header ("Location:login.php");
    } else {
        header ("Location:../../index.php");
    }