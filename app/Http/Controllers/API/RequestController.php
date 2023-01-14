<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public static function get($url, $id = null)
    {
        // Get data from API using cURL
        // Set params if any exist
        if ($id) {
            $params = http_build_query([
                'id' => $id
            ]);
            $url = $url . '?' . $params;
        }

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = json_decode(curl_exec($ch));

        curl_close($ch);

        return $response;
    }

    public static function post($url, $data)
    {
        // Post data to API using cURL
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        $response = json_decode(curl_exec($ch));

        curl_close($ch);

        return $response;
    }

    public static function put($url, $id, $data)
    {
        // Post data to API using cURL
        $params = http_build_query(['id' => $id]);
        $url = $url . '?' . $params;
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

        $response = json_decode(curl_exec($ch));

        curl_close($ch);

        return $response;
    }

    public static function delete($url, $id)
    {
        // Get data from API using cURL
        $ch = curl_init($url . '/' . $id);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = json_decode(curl_exec($ch));

        curl_close($ch);

        return $response;
    }
}
