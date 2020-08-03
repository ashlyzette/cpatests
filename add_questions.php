<?php
    require 'config/config.php';
    if (isset($_POST['submit'])){
        $category = $_POST['category'];
        $question = $_POST['question'];
        $a = $_POST['a'];
        $b = $_POST['b'];
        $c = $_POST['c'];
        $d = $_POST['d'];
        $ans = $_POST['ans'];
        $date_added = Date("Y-m-d H:i:s");
        $added_by = 'admin';

        if ($_FILES['file_image']) {
            $image_name = $_FILES['file_image']['name'];
            $image_type = pathinfo($image_name, PATHINFO_EXTENSION);
            $target_dir = "assets/images/test/";
            $image_url = $target_dir . uniqid() . '.' . $image_type;
			
            //Move files to folder memories
            try {
                if (!move_uploaded_file($_FILES['file_image']['tmp_name'],$image_url)){
                    $image = ' ';
                } else {
                    $image = $image_url;
                }
            } catch (Exception $e){
                throw $e;
                $image = ' ';
            }
        } 
         $add_obj = mysqli_query($con, "INSERT INTO exam_bank VALUES (NULL,
                    '$question',
                     '$a',
                     '$b',
                     '$c',
                     '$d',
                     '$ans',
                     '$category',
                     '$image',
                     '$date_added',
                     '$added_by')
                     ");
       header("Location: add_questions.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href = 'assets/css/bootstrap.min.css'></link>
    <link rel='stylesheet' href = 'assets/css/main.css'></link>
    <link rel="stylesheet" href='assets/css/add_questions.css'></link>
    <title>Add Questions to Bank</title>
</head>
<body>
    <!-- Load menu -->
    <?php include_once ("includes/standard/menu.php") ?>
    <div class="container mt-5">
        <div class = "questions">
            <form method ="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for = 'category'>Select Category</label>
                    <select class = 'form-control' name ='category'required>
                        <option> Introduction </option>
                        <option> Job Order Costing </option>
                        <option> Production Losses </option>
                        <option> Process Costing </option>
                        <option> Factory Overhead </option>
                        <option> Joint Process </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for = 'question'>Question</label>
                    <textarea class ='form-control' name ='question' placeholder ='Add question...'  required></textarea>
                </div>
                <div class="form-group">
                    <label for = 'question'>Add image using png, jpg or jpeg only</label>
                    <div><input type = 'file' name ='file_image' accept=".png,.jpg" /></div>
                </div>
                <div class="form-group">
                    <input type = 'radio' name = 'ans' value = 'a' required><label class = 'ml-2' for = 'question'> Choice a </label>
                    <input type = 'text' class ='form-control' name ='a' placeholder ='Add choice a...' required/>
                </div>
                <div class="form-group">
                    <input type = 'radio' name = 'ans' value = 'b' required><label class = 'ml-2' for = 'question'>Choice b</label>
                    <input type = 'text' class ='form-control' name ='b' placeholder ='Add choice b...' required/>
                </div>
                <div class="form-group">
                    <input type = 'radio' name = 'ans' value = 'c' required><label class = 'ml-2' for = 'question'>Choice c</label>
                    <input type = 'text' class ='form-control' name ='c' placeholder ='Add choice c...' required />
                </div>
                <div class="form-group">
                    <input type = 'radio' name = 'ans' value = 'd' required> <label class = 'ml-2' for = 'question'>Choice d</label>
                    <input type = 'text' class ='form-control' name ='d' placeholder ='Add choice d...' required/>
                </div>
                <div class ='form-group'>
                    <input type='submit' class = 'btn btn-primary btn-sm' name = 'submit' value='Add to test bank' />
                </div>
            </form>
        </div>
    </div>
    <script src = 'assets/js/jquery-3.5.1.min.js'> </script> 
    <script src = 'assets/js/bootstrap.min.js'> </script> 
</body>
</html>