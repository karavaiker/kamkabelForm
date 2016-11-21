$(document).ready(function () {
    $('#response').modal();
    $('input[type="submit"]').click(function (e) {
        //e.preventDefault();
        var form = $('#send-form')[0];
        
        var formData = new FormData(form);
        $.ajax({
            url: 'ajax.php',
            type: 'POST',
            data:formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $('.progress').fadeIn();
            },
            error: function(xhr){
                $('.progress').fadeOut();
                Materialize.toast('Произошла ошибка. Попробуйте отправить форму еще раз', 4000);
            },
            complete: function (xhr) {
                $('.progress').fadeOut();
                if (xhr.status == 200){
                    $('#response .modal-content').html(xhr.responseText);
                    $('#response').modal('open');
                }
            }
        });
    });
});