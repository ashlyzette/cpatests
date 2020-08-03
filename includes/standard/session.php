<?php
if(isset($_SESSION['user'])){

} else {
    $_SESSION['user'] = ' ';
    header("Location: index.php");
}
?>