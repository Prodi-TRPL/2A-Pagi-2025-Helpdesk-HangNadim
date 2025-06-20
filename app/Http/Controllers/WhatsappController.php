<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WhatsappController extends Controller
{
    public function sendMessage()
    {
        $token = 'k6qVZBsEjKp34QbpPZf8';

        //send message function
        function Kirimfonnte($token, $data)
        {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.fonnte.com/send',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array(
                    'target' => $data["target"],
                    'message' => $data["message"],
                ),
                CURLOPT_HTTPHEADER => array(
                    'Authorization: ' . $token
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            echo $response; //log response fonnte
        }

        $data = [
            "target" => '083822032582',
            "message" => "Halo " . "Coeg" . ", Terimakasih telah mendaftar di aplikasi kami"
        ];

        //send message
        Kirimfonnte($token, $data);
    }
}
