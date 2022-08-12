<?php

$message = 'Hi muskan, Your Login Id- muskanand Password- 12345. 
Thanks 
Team Sahar Directory (
Ekaum)
';


$msg = 'Hi rashu, Your V-card link is sahardirectory.com/sahar/rewari/it/sahardirectory. 
Thanks 
Team Sahar Directory 
(Ekaum)
';

$rf = SMSSend('8319218133', $message, '1707165665533059542', $debug);
echo '<br><br>';
$um = SMSSend('8319218133',  $msg,  '1707165665521396509', $debug);

function SMSSend($phone, $msg, $template, $debug = false)
{
    global $user, $password, $senderid, $smsurl;

    $url = 'http://smpp.webtechsolution.co/http-tokenkeyapi.php?authentic-key=3537686f6d6f30313137331655981948&senderid=EKAUMS&route=1&number=' . urlencode($phone) . '&message=' . urlencode($msg) . '&templateid=' . $template;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //Open the URL to send the message
    // 	$response = httpRequest($urltouse);
    echo $url;
    $response = curl_exec($ch);
    curl_close($ch);
    if ($debug) {
        $rc = "Response: <br><pre>" .
            str_replace(array("<", ">"), array("&lt;", "&gt;"), $response) .
            "</pre><br>";
    }

    return ($response);
}
