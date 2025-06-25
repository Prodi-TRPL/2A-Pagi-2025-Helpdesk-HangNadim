<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class KirimWhatsappJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $token;
    protected $data;

    public function __construct($token, $data)
    {
        $this->token = $token;
        $this->data = $data;
    }

    public function handle(): void
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $this->data["target"],
                'message' => "Halo {$this->data['nama']} Terima kasih atas komplainnya, kami akan segera menangani keluhan anda. 
                Nomor tiket anda adalah {$this->data['tiket']}",
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: ' . $this->token
            ),
        ));

        curl_exec($curl);
        curl_close($curl);
    }
}

