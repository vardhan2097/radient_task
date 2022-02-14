<?php
    $db_host = "localhost";
    $db_user = "vardhan";
    $db_password = "VArdhan2097$";
    $db_name = "radient_task";

    $conn = mysqli_connect($db_host,$db_user,$db_password,$db_name);

    if(!$conn)
        die("Connection Failed".mysqli_connect_error());
?>