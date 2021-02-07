<?php
    $server_name = "localhost";
    $user_name = "root";
    $password = "";
    $DB_name = "Test";
    
    $con = new mysqli($server_name, $user_name, $password);
    if($con -> connect_error) {
        die("Connection failed: ").$con->connect_error;
    }
    $sql = "Create Database $DB_name";
    if(mysqli_query($con, $sql)) {
        echo "Database created Successfully";
    } else {
        echo "Error Creating database".mysqli_error($con);
    }
?>