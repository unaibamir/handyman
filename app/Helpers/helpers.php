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



function getGoogleGeocode( $find_address = null ) {
    $address = array();
    if( $find_address == '' ) {
        $find_address = urlencode('645 Hillview Drive Ringgold, GA 30736');
    }
    else {
        $find_address = urlencode($find_address);
    }

    $request = "https://maps.google.com/maps/api/geocode/json?address=".$find_address."&key=AIzaSyBMVkumI3QtPusxZCmAjHOkNJs7V7hoicA";

    $ch = curl_init();

    $options = array (
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_URL            => $request,
        CURLOPT_HEADER         => false,
    );

    curl_setopt_array($ch, $options);
    $response = curl_exec($ch);
    curl_close($ch);

    $response = json_decode($response);
    if( $response == null || $response == '' ) {
        return 'Location not found';
    }
    $address_component = $response->results[0]->address_components;

    $address['formatted_address'] = $response->results[0]->formatted_address;
    $address['location'] = (array) $response->results[0]->geometry->location;

    for ($i=0; $i < count($address_component); $i++) {

        $component = $address_component[$i];

        switch ($address_component[$i]->types[0]) {
            case 'country':
                $address['country']['long_name'] = $component->long_name;
                $address['country']['short_name'] = $component->short_name;
                break;

            case 'administrative_area_level_1':
                $address['state']['long_name'] = $component->long_name;
                $address['state']['short_name'] = $component->short_name;
                break;

            case 'locality':
                $address['city']['long_name'] = $component->long_name;
                $address['city']['short_name'] = $component->short_name;
                break;

            case 'postal_code':
                $address['postal_code']['long_name'] = $component->long_name;
                break;

            case 'street_number':
                $address['street_number']['long_name'] = $component->long_name;
                $address['street_number']['short_name'] = $component->short_name;
                break;

            case 'route':
                $address['route']['long_name'] = $component->long_name;
                $address['route']['short_name'] = $component->short_name;
                break;

            case 'route':
                $address['route']['long_name'] = $component->long_name;
                $address['route']['short_name'] = $component->short_name;
                break;

        }

    }

    return $address;

}