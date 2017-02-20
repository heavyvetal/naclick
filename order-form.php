<?php
$name = $_POST['Имя'];
$phone = $_POST['Телефон'];
$email = $_POST['E-mail'];
$site = $_POST['Сайт'];
$date = date("H:i - d.m.Y");
$to1 = "x_15@mail.ru";
$to2 = "igor.mainevent@gmail.com";
$subject = "Заказ на сайте";
//HTML Content-type
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";
//Additional headers
$headers .= "From: <igor.mainevent@gmail.com>\r\n"; 
$headers .= "Reply-To: igor.mainevent@gmail.com\r\n"; 
$message = "
<h3>На сайте в $date сделан заказ</h3><br>
Имя - <b>$name</b><br>
Номер - <b>$phone</b><br>
Мыло - <b>$email</b><br>
Сайт- <b>$site</b><br>
";

if($_POST){
	mail($to2,$subject,$message,$headers);
}
?>