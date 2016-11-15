$(document).ready(function () {

    $('input[type="submit"]').click(function (e) {
        e.preventDefault();
        var form = $('#send-form');
        $.ajax({
            url: 'ajax.php',
            type: 'POST',
            data: form.serialize(),
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