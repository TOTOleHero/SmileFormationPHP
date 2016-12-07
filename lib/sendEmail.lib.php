<?php


$data_string = [
    
    
	"firstName" => "firstName",
	"lastName" => "lastName",
	"email" => "first@gmail.com",
	"subject" => "subject",
	"body" => "body"

    
    
];  

    



$ch = curl_init('http://localhost:8888/sendEmail');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER,[
                    "Content-Type : application/json"
    ]);
$result = curl_exec($ch);
