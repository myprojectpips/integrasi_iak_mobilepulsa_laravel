<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;

class uiController extends Controller {
    public function balance() {
        $username = env('API_USERNAME');
        $apiKey = env('API_KEY');
        $sign = md5($username.''.$apiKey.'bl');

        $resp = Http::post(env('API_BASEURL').'/api/check-balance', [
            'username' => $username,
            'sign' => $sign
        ]);

        return $resp['data']['balance'];
    }

    public function index() {
        return view('home', ['balance' => $this->balance()]);
    }
}
