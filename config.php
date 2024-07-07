<?php
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'task';

    $conn = mysqli_connect($db_host,$db_user,$db_pass,$db_name);

    // check
    if($conn){
        // echo "Successfully connected";
    }else{
        die(mysqli_error($conn));
    }

?>