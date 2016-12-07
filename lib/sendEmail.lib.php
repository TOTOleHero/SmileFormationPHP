<?php


$data_string

    



$ch = curl_init('http://localhost:8888/sendEmail');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER,[
                    "Content-Type : application/json"
    ]);
$result = curl_exec($ch);
