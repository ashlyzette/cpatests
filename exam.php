<?php
    require 'config/config.php';
    require 'includes/classes/Examination.php';
    $question = "";

    if (isset($_GET['id']) && $_GET['exam_id']){
        $id =$_GET['id'];
        $exam_id = $_GET['exam_id'];
        $question_obj = new Testing($con);
        $question = $question_obj->GetQuestion($id,$exam_id);
    }

    if (isset($_POST['submit'])){
        $result = $question_obj->GetScore($exam_id);
        header("Location: result.php?$result");
    }

    if(isset($_POST['review'])){
        header("Location: exam.php?id=1&exam_id=$exam_id");
    }

    if(isset($_POST['btn_next'])){
        $qid = $_POST['qid'];
        $num = $_POST['num'];
        $total = $_POST['total'];
        $exam_id = $_POST['exam_id'];
        $answer = $_POST['answer'];
        $answer = $question_obj->SubmitAnswer($num,$exam_id,$answer,$qid);
        $num ++;
        header("Location: exam.php?id=$num&exam_id=$exam_id");
    }

    if (isset($_POST['btn_previous'])){
        $num = $_POST['num'];
        $num --;
        $exam_id = $_POST['exam_id'];
        header("Location: exam.php?id=$num&exam_id=$exam_id");
    }
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
    <div class="container exam mt-5 pt-4 pb-1">
        <?php 
            echo $question; 
        ?>
    </div>
    <script src = 'assets/js/chart-min.js'></script>
    <script src = 'assets/js/jquery-3.5.1.min.js'> </script> 
    <script src = 'assets/js/bootstrap.min.js'> </script> 
    <script src = 'assets/js/exam.js'> </script> 
</body>
</html>