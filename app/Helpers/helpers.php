<?php
function GMGetCoordinates($address) {

    $address = urlencode($address);

    $url = "https://maps.google.com/maps/api/geocode/json?address=$address&key=AIzaSyBMVkumI3QtPusxZCmAjHOkNJs7V7hoicA";

    $ch = curl_init();
    $options = array(
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_URL            => $url,
        CURLOPT_HEADER         => false,
    );

    curl_setopt_array($ch, $options);
    $response = curl_exec($ch);
    curl_close($ch);

    if (!$response) {
        return 'no response';
    }

    $response = json_decode($response);

    if ($response->status !== 'OK') {
        return 'not OK';
    }

    $lat  = $response->results[0]->geometry->location->lat;
    $long = $response->results[0]->geometry->location->lng;


    return [
        'lat'   =>  $lat,
        'lng'   =>  $long
    ];
}