$(document).ready(function(){
    var result = document.getElementById('exam_result');
    var correct = $('#correct').val();
    var wrong = $('#wrong').val();
    new Chart(result, 
        {"type":"doughnut",
        "data":
            {
            "labels":["Correct","Wrong"],
            "datasets":[{"data":[correct,wrong],
                        "backgroundColor":
                                ["rgb(54, 162, 235)",
                                "rgb(255, 99, 132)"
                                 ]
                        }]
            }
        });
});