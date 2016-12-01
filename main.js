$(document).ready(function () {
    $('#response').modal();
    $('#phone').change(function () {
        if ($(this).val().length < 9){
            $('label[for="phone"]').attr('data-error','Введите номер в формате  +7 999 99 99 999')
        }

    });
    $('input[type="submit"]').click(function (e) {
        e.preventDefault();
        var form = $('#send-form')[0];
        var formData = new FormData(form);
        if ($('#send-form')[0].checkValidity()) {
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
        }else{
            $('#send-form input').each(function () {
                if ($(this).hasClass('validate') && !this.checkValidity()){
                    $(this).addClass('invalid');
                }
            });
            Materialize.toast('Заполните обязательные поля', 4000);
        }
    });
    
});

