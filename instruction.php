<?php
    require 'config/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href = 'assets/css/bootstrap.min.css'></link>
    <link rel='stylesheet' href = 'assets/css/main.css'></link>
    <title>Exam</title>
</head>
<body class = "exam_background">
    <!-- Load menu -->
    <?php include_once ("includes/standard/menu.php") ?>
    <div class="container exam mt-5 p-4">
        <div id = "instruction">
            <h1> Instruction </h1>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p> 
            <p>Facere neque quia tempora, exercitationem est repellendus tenetur omnis doloremque quam a rerum porro, enim perferendis sapiente non sit cupiditate commodi minus amet?</p> 
            <p>Possimus itaque numquam nisi hic, sapiente nobis esse architecto omnis aliquam nemo tenetur.</p>
            <p>Ea possimus officiis aut facilis praesentium.</p>
            <button class = 'btn btn-primary mt-5' id = 'continue_exam'> Continue to exam </button>
        </div>
    </div>
    <script src = 'assets/js/jquery-3.5.1.min.js'> </script> 
    <script src = 'assets/js/bootstrap.min.js'> </script> 
    <script src = 'assets/js/exam.js'> </script> 
</body>
</html>