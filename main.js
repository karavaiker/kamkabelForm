$(document).ready(function () {

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
                $('.process').fadeIn();
            },
            complete: function (xhr) {
                $('.process').fadeOut();
                $('body').append(xhr.responseText)
            }
        });
    });

});