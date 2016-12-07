<?php

// Routes


/**
 * send email via webservice
 *
 *  POST /sendEmail
 *  BODY {
	"firstName": "firstName",
	"lastName": "lastName",
	"email": "firstName.lastName@domain.fr",
	"subject": "subject",
	"body": "body"

 }
 */
$app->post('/sendEmail',
           function ($request, $response, $args)
{

    $inputData = $request->getParsedBody();

    $outputData = "send-ok";

    foreach ($inputData as $key => $value) {

        switch ($key) {
            case "firstName":
                if (!is_string($value)) {
                    $outputData = "firstName must be string";
                    break 2;
                }
                break;
            case "lastName":
                if (!is_string($value)) {
                    $outputData = "lastName must be string";
                    break 2;
                }
                break;
            case "email":
                if (!is_string($value)) {
                    $outputData = "firstName must be string";
                    break 2;
                }

                $pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';

                if (preg_match($pattern, $value) === 0) {

                    $outputData = "email invalid";
                    break 2;
                }
                break;
            case "subject":
                if (!is_string($value)) {
                    $outputData = "subject must be string";
                    break 2;
                }
                break;
            case "body":
                if (!is_string($value)) {
                    $outputData = "body must be string";
                    break 2;
                }
                break;
            default:
                $outputData = "key '".$key."' invalid";
                break 2;
        }
    }

    if(count(array_keys($inputData)) < 5)
    {
        $outputData = "No data found";
    }


    return $response->withJson($outputData);
});


//$app->get('/[{name}]', function ($request, $response, $args) {
//    // Sample log message
//    $this->logger->info("Slim-Skeleton '/' route");
//
//    // Render index view
//    return $this->renderer->render($response, 'index.phtml', $args);
//});


