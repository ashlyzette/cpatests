<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include_once ('../../config/config.php');
    //Get exam id
    $get_exam_id = mysqli_query($con, "SELECT DISTINCT user_id, exam_id FROM exam");
    $exam_id = mysqli_num_rows($get_exam_id);
    $exam_id ++;
    $num = 0;

    //Get questions
    $exam_obj = mysqli_query($con, "SELECT * FROM exam_bank ORDER by rand()");
    while($row = mysqli_fetch_array($exam_obj)){
        $num++;
        $id = $row['id'];
        $category = $row['category'];
        $date_now = Date('Y-m-d H:i:s');
        $add_exam = mysqli_query($con, "INSERT INTO exam VALUES (NULL,'$exam_id','1','$num','$id','$category','$date_now','$date_now',' ',' ','0')");
    }
    echo "exam.php?id=1&exam_id=$exam_id";
?>