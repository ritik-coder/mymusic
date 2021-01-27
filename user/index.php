<?php
    $email = "arpitpal164@gmail.com";
    $name = "ritik pal";
    $body = "Hey man, how are you? <br><br><a href='https://google.com'>Google</a>";
    $subject = "Test email";

    $headers = array(
        'api-key: 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',
        'accept: application/json',
        'Content-Type: application/json'

    );


    $data = '{  
        "sender":{  
           "name":"ritik pal",
           "email":"arpitpal41@gmail.com"
        },
        "to":[  
           {  
              "email":"ritikpal41@gmail.com",
              "name":"ritik pal"
           }
        ],
        "subject":"Hello world",
        "htmlContent":"<html><head></head><body><p>Hello,</p>This is my first transactional email sent from Sendinblue.</p></body></html>"
     }';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.sendinblue.com/v3/smtp/email");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);

    echo $response;
?>


