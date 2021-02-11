<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use GuzzleHttp\Client;

class Single extends Controller
{
    public static function api_single()
    {
        $id = get_post_meta(get_the_ID(), 'api_id', true);
        $token = '16515c03479c6d0a8514ab7b8c607ef53a9261df';
        $client_single = new Client(['base_uri' =>
        'https://basedev.uni-ak.ac.at/portfolio/api/v1/user/3F3920E1AF5D460E98310ABEFA0DDA8B/data/']);
        $headers = [
        'Authorization' => 'Bearer ' . $token,
        'Accept' => 'application/json',
        ];

        $response_single = $client_single->request('GET', $id, [
        'headers' => $headers
        ]);
        return json_decode($response_single->getBody()->getContents());
    }

}
