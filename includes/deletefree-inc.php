<?php
session_start();

if (isset($_SESSION['sessionpassword']) && isset($_SESSION['sessionUser'])) {






    if (isset($_POST['submit'])) {

        require 'database.php';

        $id = $_POST['submit'];
       
        $sql = "DELETE  from applyforfreelance WHERE JobSeekerUserName=? AND freelanceID =?  ";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../php/freeapp.php?error=sqlerror");
            exit();
        } else {
            $d = date("Y-m-d");
            mysqli_stmt_bind_param($stmt, "ss", $_SESSION['sessionUser'], $id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            header("Location: ../php/freeapp.php?sucess=deleted");

        }
    }
    }

?>