<?php
    require 'config/config.php';
    if (isset($_GET['correct']) || $_GET['wrong']){
        $correct = $_GET['correct'];
        $wrong = $_GET['wrong'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href = 'assets/css/bootstrap.min.css'></link>
    <link rel='stylesheet' href = 'assets/css/main.css'></link>
    <title>Exam Result</title>
</head>
<body class = "exam_background">
    <!-- Load menu -->
    <?php include_once ("includes/standard/menu.php") ?>
    <div class="container exam mt-5 p-4">
        <div id = "result">
            <h1> Exam Result </h1>
            <input type='hidden' id ='correct' value  ='<?php echo $correct; ?>'>
            <input type='hidden' id ='wrong' value  ='<?php echo $wrong; ?>'>
            <canvas id="exam_result" class="chartjs" width="770" height="385" style="display: block; width: 770px; height: 385px;"></canvas>
        </div>
    </div>
    <script src ='assets/js/chart-min.js'></script>
    <script src = 'assets/js/jquery-3.5.1.min.js'> </script> 
    <script src = 'assets/js/bootstrap.min.js'> </script> 
    <script src = 'assets/js/result.js'> </script> 
</body>
</html>