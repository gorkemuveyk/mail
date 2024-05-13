<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

header("Content-Type:text/html; charset=UTF-8");

$mail = new PHPMailer(true);

$name = $_POST['name'];
$surname = $_POST['surname'];

// Uyarı mesajı için bir değişken tanımlayalım
$alertMessage = '';

try {
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host = 'mt-arven-da.guzelhosting.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth = true;                                   //Enable SMTP authentication
    $mail->Username = 'siparis@falbudur.com';                     //SMTP username
    $mail->Password = '19921992.GgG';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port = 587;
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';

    $mail->SMTPOptions = array(
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        ],
    );

    // Gönderen bilgileri
    $mail->setFrom('siparis@falbudur.com', 'Falbudur Yeni Bir Mesaj');
    $mail->addAddress('uveykgorkem@gmail.com', 'Görkem');     //Alıcı e-posta adresi

    // Mail içeriği
    $mail->isHTML(true);                                  //HTML biçiminde mail gönderilecek
    $mail->Subject = 'Falbudur Siparişiniz Onaylandı';
    $mail->Body = '<div style="max-width: 600px; color: #000 !important; margin: 0 auto; padding: 20px; font-family: Arial, sans-serif; background-color: #f4f4f4;"><div style="background-color: #ffffff; padding: 40px; border-radius: 10px; box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.1);"><h2 style="text-align: center; color: #4CAF50;">Falbudur Siparişiniz Alındı</h2><hr style="border: 0; border-top: 1px solid #f4f4f4; margin: 20px 0;"><p style="font-size: 18px; line-height: 1.6;">Merhaba,</p><p style="font-size: 18px; color: #000; line-height: 1.6;">Falbudur sitesi üzerinden oluşturduğunuz sipariş onaylandı. Detaylar aşağıda yer alıyor:</p> <p> '. $name . ' ' .$surname . ' </p> <p style="font-size: 18px; color: #000; line-height: 1.6;">Kafanıza takılan herhangi bir şeyde bize WhatsApp üzerinden ulaşabilirsiniz.</p><div style="text-align: center; margin-top: 30px;"><a href="https://api.whatsapp.com/send/?phone=905421558559&text&type=phone_number&app_absent=0" style="background-color: #4CAF50; color: white; padding: 10px 15px; text-align: center; text-decoration: none; display: inline-block; border-radius: 5px; font-size: 16px;">WhatsApp\'dan Yaz</a></div></div></div>';

    // Mail gönderme işlemi
    $mail->send();
    $alertMessage = "Mail başarıyla gönderildi!";
} catch (Exception $e) {
    $alertMessage = "Mail gönderilirken bir hata oluştu: " . $mail->ErrorInfo;
}
// Alert mesajını ekrana yazdıralım
echo "<script>alert('$alertMessage');</script>";
?>
