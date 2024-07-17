<?php



function getAuthToken($url)
{



    $curl = curl_init();

    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
    "userName" : "' . env('API_USERNAME') . '",
    "password" : "' . env('PASSWORD') . '"
}',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        )
    );

    $response = curl_exec($curl);

    $data = json_decode($response, true);

    curl_close($curl);

    $_SESSION['token'] = $data['token'];
    $_SESSION['userName'] = $data['userName'];

    return $data['token'];

}


function getPartnerToken($token)
{

    $curl = curl_init();

    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => 'https://web.qatarpost.qa/PartnerAPIAWB/partner/authentication/get/partnertoken/rapidos',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $token,
            ),
        )
    );

    $response = curl_exec($curl);

    $data = json_decode($response, true);
    
    curl_close($curl);

    return $data['data'];


}



?>