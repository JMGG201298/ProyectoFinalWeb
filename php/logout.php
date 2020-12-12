<?php
    session_start();
    unset($_SESSION['session_username']);
    header('location: ../login.php');