<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ClassController extends Controller
{
    public function index()
    {
        $url = 'http://eannovate-test-case.test/api/class';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result  = curl_exec($ch);
        dd($result);
        curl_close($ch);
    }

    public function edit($id)
    {
        dd('class edit ', $id);
    }
}
