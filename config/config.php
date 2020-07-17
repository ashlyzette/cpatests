<?php
    session_start();
    $con = mysqli_connect('localhost','root','','cpatests');
    if (mysqli_connect_error()){
        echo 'failed to connect to database' . mysqli_connect_errno();
    }
?>