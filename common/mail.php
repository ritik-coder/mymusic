<?php

$to="ritikpal41@gmail.com";
$subject="response from website";
$message=" I am very thankful to you";
$headers="From: arpitpal164@gmail.com";


if(mail($to, $subject, $message, $headers)){
    echo "mail send successfully";
}
else{
    echo "can not send mail";
}



?>