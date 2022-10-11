<?php
    // connecting to database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "labsmart";

    // creating an connection
    // $conn = mysqli_connect($servername,$username,$password,$database);
    $conn = new mysqli($servername,$username,$password,$database);

    // Die if connection failed
    if ($conn->connect_error) {
        die ("Sorry we failed to connect to database : <br>" . $conn->connect_error);
        exit();
    }
    else {
        // echo "Connected to database!<br>";
        echo $conn->connect_error;
    }            
?>