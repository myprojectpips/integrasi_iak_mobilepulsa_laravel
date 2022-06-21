<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;
use Redirect;

class emoneyController extends Controller {
    public function indexEmoney() {
        return view('emoney.emoney');
    }

    public function emoneyList() {
        $username = env('API_USERNAME');
        $apiKey = env('API_KEY');
        $sign = md5($username.''.$apiKey.'pl');

        $res = Http::post(env('API_BASEURL').'/api/pricelist', [
            'username' => $username,
            'sign' => $sign
        ]);

        return $res;
    }

    public function prosesEmoney($type) {
        return view('emoney.proses-emoney', ['type' => $type]);
    }
}
