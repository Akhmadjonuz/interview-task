<?php

namespace App\Custom;

use Illuminate\Support\Facades\Http;

class SMSSender
{
    static function send($phone, $message)
    {
        try {
            if (env('APP_ENV') == "local") {
                return [
                    'data' => [
                        [
                            "recipient" => 998909711322,
                            "text" => "11111",
                            "user_id" => 1,
                            "date_received" => 1499493672,
                            "message_id" => 16854781,
                            "request_id" => 52480252,
                            "client_ip" => "185.8.212.184"
                        ]
                    ], 'status' => 200
                ];
            }

            $data = Http::post('http://185.8.212.184/smsgateway/', [
                'login' => "ibospirit",
                'password' => "sE1Nbk5jvP9471MF7HN3",
                'data' => json_encode([['phone' => $phone, 'text' => $message]])
            ]);
            if ($data->ok()) {
                return ['data' => $data->json(), 'status' => $data->status()];
            } else
                return ['error' => $data->json(), 'status' => $data->status()];

        } catch (\Exception $e) {
            return ['error' => $e->getMessage(), 'status' => 500];
        }
    }

    static function status($request_id)
    {
        try {
            if (env('APP_ENV') == "local") {
                return [
                    "data" => [
                        [
                            "recipient" => "998901234567",
                            "text" => "11111",
                            "user_id" => "1",
                            "date_received" => "2017-07-08 10:40:34",
                            "date_sent" => "2017-07-08 10:40:34",
                            "date_delivered" => "2017-07-08 10:40:42",
                            "message_id" => "12911573",
                            "request_id" => "93786401",
                            "status" => "delivered",
                            "count_messages" => "1",
                            "client_ip" => "185.8.212.184",
                            "description" => "OK"
                        ]
                    ],
                    'status' => 200
                ];
            }


            $data = Http::post('http://185.8.212.184/smsgateway/status/', [
                'login' => "ibospirit",
                'password' => "sE1Nbk5jvP9471MF7HN3",
                'data' => json_encode([['request_id' => $request_id]])
            ]);

            if ($data->ok()) {
                return ['data' => $data->json(), 'status' => $data->status()];
            } else
                return ['error' => $data->json(), 'status' => $data->status()];

        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}