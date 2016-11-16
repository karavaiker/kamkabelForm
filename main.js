$(document).ready(function () {

    $('#response').modal();


    $('input[type="submit"]').click(function (e) {
        e.preventDefault();
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
            complete: function (xhr) {
                $('.progress').fadeOut();
                $('#response .modal-content').html(xhr.responseText);
                $('#response').modal('open');
            }
        });
    });

});