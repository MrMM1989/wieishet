var questions = 0;

$(function() {

    $.ajax({
        url: 'scripts/items.json',
        datatype: 'json',
        async: false,
        success: function(res) {
            // var res = jQuery.parseJSON(res);

            // console.log(res);

            var answer = res.items[Math.floor(Math.random() * res.items.length)];

            executeGame(answer);
        }
    })
})


function executeGame(answer) {
    $.ajax({
        url: 'scripts/questions.json',
        datatype: 'json',
        async: false
    }).done(function(res) {
    	// var res = jQuery.parseJSON(res);
        // console.log(res);

        for (var i = 0; i < res.questions.length; i++) {

            $('#questions').append('<option data-attr="' + res.questions[i].attr + '" data-final="' + res.questions[i].final_question + '">' + res.questions[i].question + '</option>');
        };
    })

    $('#questionform').on('submit', function(e) {
        e.preventDefault();
        questions++;

        var final_question = $('#questions option:selected').data('final');

        var selected = $('#questions option:selected').data('attr');

        // console.log(answer.name);
        // console.log(answer[selected]);

        var ans = $('#questions option:selected').val();

        if (answer[selected]) {
            $('#questionsasked').prepend('<p class="bg-success fw">' + ans + '</p>');

            if (final_question == true) {
                $('#questionSet').attr('disabled', 'disabled');
                alert('Gefeliciteerd, u hebt gewonnen met ' + questions + ' vragen,\n Wilt u dit op Facebook delen?');
                //Hier komt een modal die vraagt of je opnieuw wilt spelen of je resultaat op facebook wilt delen.
            }

        } else {
            $('#questionsasked').prepend('<p class="bg-danger fw">' + ans + '</p>');
            if (final_question == true) {
            	$('#questionSet').attr('disabled', 'disabled');
                alert('U heb verloren, jammer!');
            }
        };


    });
}
