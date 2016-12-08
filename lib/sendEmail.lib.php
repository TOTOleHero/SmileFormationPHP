<?php

define('EMAIL_SERVICE_URL','http://localhost:8888/sendEmail');

<<<<<<< HEAD
$data = [
    	"firstName"=> "firstName",
	"lastName"=> "lastName",
	"email"=> "firstName.lastName",
	"subject"=> "subject",
	"body"=> "body"
];

//$data_string =]son_encode($data);
=======
/**
 *
 * send fake email
 *
 * @param array $dataEmail
 * [
        "firstName" => "firstName",
        "lastName"  => "lastName",
        "email"     => "firstName.lastName@domain.fr",
        "subject"   => "subject",
        "body"      => "body"
    ]
 * @return boolean
 */
function sendEmail($dataEmail)
{
    $ch     = curl_init(EMAIL_SERVICE_URL);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataEmail);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Content-Type : application/json"
    ]);
    $result = curl_exec($ch);


    if ($result == "send-ok") {
        return true;
    }
>>>>>>> 93468dd0ef3faafc92987c1a01689ab07cfea1da

    return false;
}
