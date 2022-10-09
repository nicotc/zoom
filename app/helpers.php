<?php

use Firebase\JWT\JWT;

    function generateZoomToken()
    {
        $key = env('ZOOM_API_KEY');
        $secret = env('ZOOM_API_SECRET');

        // Payload
        $payload = [
            'iss' => $key,
            'exp' => time() + 3600 // 1 hour expiration
        ];


        $token = JWT::encode($payload, $secret, 'HS256');

        return  $token;
    }


    function create_zoom_meet($topic, $start_time, $password){
        $client = new \GuzzleHttp\Client(
            [
                'base_uri' => 'https://api.zoom.us',
            ]
        );

        $response = $client->request('POST', '/v2/users/me/meetings', [
            'headers' => ['Authorization' => 'Bearer ' . generateZoomToken()],
            'json' => [
                "topic" => $topic,
                "type" => 2,
                "start_time" => $start_time,
                "duration" => 30,
                "timezone" => "America/Caracas",
                "password" => $password,
                "agenda" => $topic,
            ]
        ]);

        $body = $response->getBody();
        $content = $body->getContents();

        $data = [
            'url' => json_decode($content)->join_url,
            'id' => json_decode($content)->id,
            'password' => json_decode($content)->password,
            'nivel' => json_decode($content)->topic,
            'hora de inicio' => json_decode($content)->start_time,
            'timezone' => json_decode($content)->timezone,
        ];

        return $data;
    }


    function list_zoom_meet()
    {

        $client = new \GuzzleHttp\Client(
            [
                'base_uri' => 'https://api.zoom.us',
            ]
        );

        $response = $client->request('GET', '/v2/users/me/meetings', [
            'headers' => ['Authorization' => 'Bearer ' . generateZoomToken()],

        ]);

        $body = $response->getBody();
        $content = $body->getContents();

       return json_decode($content)->meetings;

    }