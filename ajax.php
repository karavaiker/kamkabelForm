<?php

//Простая проверка на робота
if ($_POST['data-hash'] == md5('date'+date('H')) || $_POST['data-hash'] == md5( 'date'+(date('H')+1) ) ) {
    $to = "zakaz1@kamkabel.ru";
    $user_email = "info@kamkabel.ru";
    $subject = "Онлайн закз на сайте kamkabel.ru";
    $message = "
  <p>Имя: " . $_POST['name'] . "</p>
  <p>Телефон: " . $_POST['phone'] . "</p>
  <p>E-mail: " . $_POST['email'] . "</p>
  <p>---------------</p>
  <p>Марка: " . $_POST['mark_name'] . "</p>
  <p>Количество:" . $_POST['count'] . "</p>
  <p>Примечание:" . $_POST['addText']."</p>";

// название файла
    $filename = $_FILES[file][name];

// месторасположение файла
    $filepath = $_FILES[file][tmp_name];


    $boundary = "--" . md5(uniqid(time()));

    $mailheaders = "MIME-Version: 1.0;\r\n";
    $mailheaders .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";
    $mailheaders .= "From: $user_email <$user_email>\r\n";
    $mailheaders .= "Reply-To: $user_email\r\n";
    $multipart = "--$boundary\r\n";
    $multipart .= "Content-Type: text/html; charset=windows-1251\r\n";
    $multipart .= "Content-Transfer-Encoding: base64\r\n";
    $multipart .= "\r\n";
    $multipart .= chunk_split(base64_encode(iconv("utf8", "windows-1251", $message)));

// Закачиваем файл
    $fp = fopen($filepath, "r");
    if ($fp) {
        $file = fread($fp, filesize($filepath));
        fclose($fp);
        $message_part = "\r\n--$boundary\r\n";
        $message_part .= "Content-Type: application/octet-stream; name=\"$filename\"\r\n";
        $message_part .= "Content-Transfer-Encoding: base64\r\n";
        $message_part .= "Content-Disposition: attachment; filename=\"$filename\"\r\n";
        $message_part .= "\r\n";
        $message_part .= chunk_split(base64_encode($file));
        $message_part .= "\r\n--$boundary--\r\n";
        // второй частью прикрепляем файл, можно прикрепить два и более файла

        $multipart .= $message_part;

    }

// отправляем письмо
    if (mail($to, $subject, $multipart, $mailheaders)) {
        echo '<div class="sent_ok"><h4>Сообщение успешно отправлено!</h4></div>';
    } else {
        http_response_code(412);
        die();
    }


//удаляем файлы через 60 сек.
    if (time_nanosleep(5, 0)) {
        unlink($filepath);
    }
// удаление файла

}else{
    http_response_code(408);
    die();
}
