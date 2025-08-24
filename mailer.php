<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require __DIR__.'/lib/PHPMailer/Exception.php';
require __DIR__.'/lib/PHPMailer/PHPMailer.php';
require __DIR__.'/lib/PHPMailer/SMTP.php';
$to='<<<EMAIL_TUJUAN>>>';
$from='<<<EMAIL_PENGIRIM_DOMAIN_SAMA>>>';
$host='<<<SMTP_HOST_CPANEL>>>';
$username='<<<SMTP_USERNAME>>>';
$password='<<<SMTP_PASSWORD>>>';
$port=465; // atau 587
$fields=['nama','perusahaan','email','telepon','layanan','pesan'];
$data=[];
foreach($fields as $f){$data[$f]=htmlspecialchars(trim($_POST[$f]??''),ENT_QUOTES,'UTF-8');}
$body="Nama: {$data['nama']}\nPerusahaan: {$data['perusahaan']}\nEmail: {$data['email']}\nTelepon: {$data['telepon']}\nLayanan: {$data['layanan']}\nPesan: {$data['pesan']}";
$mail=new PHPMailer(true);
try{
 $mail->isSMTP();
 $mail->Host=$host;
 $mail->SMTPAuth=true;
 $mail->Username=$username;
 $mail->Password=$password;
 $mail->SMTPSecure=$port==465?'ssl':'tls';
 $mail->Port=$port;
 $mail->setFrom($from,'Website ADA');
 $mail->addAddress($to);
 $mail->Subject='Lead Website - PT. ADI DHARMA ABADI';
 $mail->Body=$body;
 $mail->send();
 echo 'sukses';
}catch(Exception $e){
 if(@mail($to,'Lead Website - PT. ADI DHARMA ABADI',$body,'From: '.$from)){
  echo 'sukses';
 }else{
  echo 'gagal';
 }
}
