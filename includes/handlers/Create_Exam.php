<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include_once ('../../config/config.php');
    include_once '../../includes/handlers/Login.php';
    //Get exam id
    $get_exam_id = mysqli_query($con, "SELECT DISTINCT user_id, exam_id FROM exam");
    $exam_id = mysqli_num_rows($get_exam_id);
    $exam_id ++;
    $num = 0;
    //Get questions
    if (isset($_SESSION['user']) && ($_SESSION['user'] != null)) {
        // Get user id of the current user logged
        $email = $_SESSION['email'];
        $user_id = $_SESSION['user_id'];
        //Get data from exam bank 
        $exam_obj = mysqli_query($con, "SELECT * FROM exam_bank ORDER by rand()");
        $total_questions = mysqli_num_rows($exam_obj);
        $subject ='all';
    } else {
        $exam_obj = mysqli_query($con, "SELECT * FROM exam_bank LIMIT 10"); 
        $subject = 'introduction';
        $total_questions = 10;
        $user_id = 0;
    }
    $date_now = Date('Y-m-d H:i:s');

    //Add to summary table
    $query = mysqli_query($con, "INSERT INTO exam_summary VALUES (NULL,
                            '$user_id',
                            '$exam_id',
                            '$subject',
                            '$total_questions',
                            '0',
                            '0',
                            '$date_now',
                            '$date_now',
                            '0')
                            ");

    // Loop the questions and add to exam database
    while($row = mysqli_fetch_array($exam_obj)){
        $num++;
        $id = $row['id'];
        $category = $row['category'];
        //add choices to array then shuffle to randmomize choices
        $choices = ['a','b','c','d'];
        shuffle($choices);

        //add data to exam database
        $add_exam = mysqli_query($con, "INSERT INTO exam VALUES (NULL,
            '$exam_id',
            '$user_id',
            '$num',
            '$id',
            '$choices[0]',
            '$choices[1]',
            '$choices[2]',
            '$choices[3]',
            '$category',
            '$date_now',
            '$date_now',
            ' ',
            ' ',
            '0')
            ");
    }
    echo "exam.php?id=1&exam_id=$exam_id";
?>