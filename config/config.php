<?php
    session_start();
    $con = mysqli_connect("162.241.24.185","apexhris_loam","8v9Xmnb!$1iaDc6Z","apexhris_amigo");
    if (mysqli_connect_error()){
        echo 'failed to connect to database' . mysqli_connect_errno();
    }
?>