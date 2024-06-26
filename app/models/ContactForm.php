<?php
use PHPMailer\PHPMailer\PHPMailer;
    class ContactForm
    {
        public function mail($name, $email, $age, $message)
        {
            if (strlen($name) < 3)
                return "Имя слишком короткое";
            else if (strlen($email) < 3)
                return "Email слишком короткий";
            else if (!is_numeric($age) || $age <= 0 || $age > 90)
                return "Вы ввели не возраст";
            else if (strlen($message) < 5)
                return "Сообщение слишком короткое";

            require 'vendor/autoload.php';

            if (!PHPMailer::validateAddress($email)) {
                return 'invalid email address provided';
            }
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'smtp.yandex.ru';
            $mail->Port = 465;
            $mail->SMTPAuth = true;
            $mail->Username = 'floss2@yandex.ru';
            $mail->Password = '***';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->CharSet = PHPMailer::CHARSET_UTF8;

            $mail->setFrom('floss2@yandex.ru', 'floss');
            $mail->addAddress($email);

            $mail->Subject = 'Contact form: floss';
            $mail->Body = "Contact form submission\n\n" . $message;
            if (!$mail->send()) {
                return 'Ошибка: ' . $mail->ErrorInfo;
            }
            return 'Сообщение отправлено.';
        }
    }