<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function sendingRequest($urls, $token, $methods, $request = null){
        $client = curl_init();
        $authorization = "X-Auth-Token: ".$token;
        curl_setopt_array($client, array(
            CURLOPT_URL => env('API_URL').$urls,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $methods,
            CURLOPT_POSTFIELDS => $request,
            CURLOPT_HTTPHEADER => array(
                'Access-Control-Allow-Headers' => '*',
                'Content-Type: application/json',
                $authorization
            ),
        ));
        $response = curl_exec($client);
        curl_close($client);
        return $response;
    }
}
