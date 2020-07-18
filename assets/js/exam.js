$(document).ready(function(){
    var cont = document.querySelector('#continue_exam');
    if(cont) cont.addEventListener('click', GoToNext);
});

function GoToNext(){
    $.ajax({
        url:'includes/handlers/Create_Exam.php',
        type: 'POST',
        data: '',
        cache: false,
        success: function(data){
            $('#instruction').hide();
            $('#exam_container').show();
            window.location.href = data;
        }
    });
}