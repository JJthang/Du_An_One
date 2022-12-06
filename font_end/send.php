<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'sending_mail.php/src/Exception.php';
require 'sending_mail.php/src/PHPMailer.php';
require 'sending_mail.php/src/SMTP.php';

if (isset($_POST['dong_y_dat_hang'])) {
    $mail = new PHPMailer(true);
    $mail -> isSMTP();
    $mail -> Host = 'smtp.gmail.com';
    $mail -> SMTPAuth = true;
    $mail -> Username = 'thangpdph20760@fpt.edu.vn';
    $mail -> Password = '38839388';
    $mail -> SMTPSecure = 'ssl';
    $mail -> Port = 456;
    $mail -> setFrom('thangpdph20760@fpt.edu.vn');
    $mail -> addAddress($_POST['email_tk']);
    $mail -> isHTML(true);
    $mail -> Subject = $_POST['ordernote'];
    $mail -> Body = $_POST['name_tk'];
    $mail -> Body = $_POST['address_tk'];
    $mail -> Body = $_POST['tel_tk'];
    $mail -> Body = $_POST['email_tk'];
    $mail -> send();
    echo "
    <script>
    alert('Gửi thành công');
     </script>
    ";
}
?>
