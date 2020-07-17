<?php
    class Testing {
        private $con;

        public function __construct($con){
            $this->con = $con;
        }

        public function SubmitAnswer($num, $exam_id, $answer,$question){
            //Check if answer is correct
            $look_up = mysqli_query($this->con, "SELECT * FROM exam_bank WHERE id='$question' AND ans='$answer'");
            mysqli_num_rows($look_up) > 0 ? $isCorrect = 'yes' : $isCorrect = 'no';
            $answer_obj = mysqli_query($this->con, "UPDATE exam SET answer = '$answer', is_correct = '$isCorrect' WHERE num ='$num' AND exam_id='$exam_id'");
        }

        public function GetQuestion($num,$exam_id){
            $question_obj = mysqli_query($this->con, "SELECT question_id, answer, done FROM exam WHERE exam_id= '$exam_id' AND num = '$num'");
            $total_obj = mysqli_query($this->con, "SELECT id FROM exam WHERE exam_id= '$exam_id'");
            $total_questions = mysqli_num_rows($total_obj);

            if ($question_row = mysqli_fetch_array($question_obj)){
                $question_id = $question_row['question_id'];
                $answer = $question_row['answer'];
                $status = $question_row['done'];
                $question_obj = mysqli_query($this->con, "SELECT * FROM exam_bank WHERE id = '$num'");
                if($row = mysqli_fetch_array($question_obj)){
                    $_SESSION['exam'] = $exam_id;
                    $_SESSION['num'] = $num;
                    $id = $row['id'];
                    $question = $row['question'];
                    $a = $row['a'];
                    $b = $row['b'];
                    $c = $row['c'];
                    $d = $row['d'];
                    $ans = $row['ans'];
                    //Display previous button or not
                    if ($num > 1){
                        $buttons= "<button type='submit' class = 'btn btn-warning btn-sm' id = 'btn_previous' name = 'btn_previous'>Previous Question</button>
                                    <button type='submit' class = 'btn btn-primary btn-sm' id = 'btn_next' name = 'btn_next'>Next Question</button>";
                    } else {
                        $buttons= "<button type='submit' class = 'btn btn-warning btn-sm' id = 'btn_previous' name = 'btn_previous' disabled>Previous Question</button>
                        <button type='submit' class = 'btn btn-primary btn-sm' id = 'btn_next' name = 'btn_next'>Next Question</button>";
                    }

                    //Check if previous answer is available from database
                    if ($status == 0 ){
                        $answer =='a' ? $choice_a = "<input class = 'form-check-input ml-2' type='radio' name ='answer' value = 'a' checked>" : $choice_a = "<input class = 'form-check-input ml-2' type='radio' name ='answer' value = 'a'>";
                        $answer =='b' ? $choice_b = "<input class = 'form-check-input ml-2' type='radio' name ='answer' value = 'b' checked>" : $choice_b = "<input class = 'form-check-input ml-2' type='radio' name ='answer' value = 'b'>";
                        $answer =='c' ? $choice_c = "<input class = 'form-check-input ml-2' type='radio' name ='answer' value = 'c' checked>" : $choice_c = "<input class = 'form-check-input ml-2' type='radio' name ='answer' value = 'c'>";
                        $answer =='d' ? $choice_d = "<input class = 'form-check-input ml-2' type='radio' name ='answer' value = 'd' checked>" : $choice_d = "<input class = 'form-check-input ml-2' type='radio' name ='answer' value = 'd'>";
                    } else {
                        $answer =='a' ? $choice_a = "<input class = 'form-check-input ml-2' type='radio' name ='answer' value = 'a' checked disabled>" : $choice_a = "<input class = 'form-check-input ml-2' type='radio' name ='answer' value = 'a' disabled>";
                        $answer =='b' ? $choice_b = "<input class = 'form-check-input ml-2' type='radio' name ='answer' value = 'b' checked disabled>" : $choice_b = "<input class = 'form-check-input ml-2' type='radio' name ='answer' value = 'b' disabled>";
                        $answer =='c' ? $choice_c = "<input class = 'form-check-input ml-2' type='radio' name ='answer' value = 'c' checked disabled>" : $choice_c = "<input class = 'form-check-input ml-2' type='radio' name ='answer' value = 'c' disabled>";
                        $answer =='d' ? $choice_d = "<input class = 'form-check-input ml-2' type='radio' name ='answer' value = 'd' checked disabled>" : $choice_d = "<input class = 'form-check-input ml-2' type='radio' name ='answer' value = 'd' disabled>";
                    }
                        
                    return "<form method='POST'>
                                <div class='form-group'>
                                    <div class ='form-control examination'>
                                        <label class = 'form-check-label question' name ='question_num' value ='$id'> $num. $question</label>
                                    </div>
                                    <div class ='form-control examination'>
                                        $choice_a
                                        <label class = 'form-check-label ml-4' for='id'> $a </label>
                                    </div>
                                    <div class ='form-control examination'>
                                        $choice_b
                                        <label class = 'form-check-label ml-4' for='id'> $b </label>
                                    </div>
                                    <div class ='form-control examination'>
                                        $choice_c
                                        <label class = 'form-check-label ml-4' for='id'> $c </label>
                                    </div>
                                    <div class ='form-control examination'>
                                        $choice_d
                                        <label class = 'form-check-label ml-4' for='id'> $d </label>
                                    </div>
                                    <div class ='form-control examination'>
                                        $buttons
                                        <input type='hidden' name='qid' value ='$id'>
                                        <input type='hidden' name='num' value = '$num'>
                                        <input type='hidden' name ='exam_id' value ='$exam_id'>
                                        <input type='hidden' name ='total' value ='$total_questions'>
                                    </div>
                                    <div class ='d-flex justify-content-end mt-2'>
                                        $id of $total_questions
                                    </div>
                                </div>
                            </form>
                            ";    
                } 
            } else {
                return "<form method='POST'>
                            <div class ='form-control'>
                                <label >
                                    Exam done! Click submit to finish the exam or click review to review your answers
                                </label>
                            </div>
                            <div class ='form-control mb-4'>
                                <button type='submit' class = 'btn btn-primary btn-sm' id = 'btn_review' name = 'review'>Review</button>
                                <button type='submit' class = 'btn btn-primary btn-sm' id = 'btn_next' name = 'submit'>Submit</button>
                            </div>
                        </form>";
            }
        }

        public function GetScore($exam_id){
            //Get the correct and wrong answers
            $correct_ans = mysqli_query($this->con, "SELECT * FROM exam WHERE exam_id = '$exam_id' AND is_Correct = 'yes'");
            mysqli_num_rows($correct_ans)>0 ? $correct = mysqli_num_rows($correct_ans) : $correct =0;
            $wrong_ans = mysqli_query($this->con, "SELECT * FROM exam WHERE exam_id = '$exam_id' AND is_Correct = 'no'");
            mysqli_num_rows($wrong_ans)>0 ? $wrong = mysqli_num_rows($wrong_ans) : $wrong =0;

            //Update status to 1
            $date_now = Date('Y-m-d H:i:s');
            $status = mysqli_query($this->con, "UPDATE exam SET date_finished = '$date_now', done = '1' WHERE exam_id ='$exam_id'");
            return "correct=". $correct . "&wrong=". $wrong;
        }
    }
?>