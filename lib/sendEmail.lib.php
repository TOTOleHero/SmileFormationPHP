<?php

define('EMAIL_SERVICE_URL','http://localhost:8888/sendEmail');


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

    return false;
}
