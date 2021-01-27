<?php
  require_once 'vendor/autoload.php';
  use GuzzleHttp\Client;


  $body = [
    'Messages' => [
      [
        'From' => [
          'Email' => "arpitpal164@gmail.com",
          'Name' => "Melody Music"
        ],
        'To' => [
          [
            'Email' => "ritikpal41@gmail.com",
            'Name' => "Ritik"
          ]
        ],
        'Subject' => "Greetings from Mailjet.",
       
        'HTMLPart' => "<h3>Dear passenger 1, welcome to <a href='https://www.mailjet.com/'>Mailjet</a>!</h3><br />May the delivery force be with you!",
      
      ]
    ]
  ];

  $client= new Client([
      'base_uri' => 'https://api.mailjet.com/v3.1/',
  ]);

  $response =$client->request('POST','send',[
      'json' => $body,
      'auth' => ['85ece4ee21ac7655e7908959bc2748f6','e1a1f6366b788cc3e6e246088be8db4d']
  ]);

  if($response->getStatusCode() == 200){
      $body = $response->getBody();
      $response = json_decode($body);
      if ($response->Messages[0]->Status == 'success'){
          echo "email sent";
      }
  }

 
?>
