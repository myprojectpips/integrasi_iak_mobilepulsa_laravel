<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;

class checkStatusController extends Controller {
    public function indexStatus() {
        return view('check-status.check-index');
    }

    public function getStatus(Request $req) {
        $username = env('API_USERNAME');
        $apiKey = env('API_KEY');
        $ref_id = $req->ref_id;
        $sign = md5($username.''.$apiKey.''.$ref_id);

        $resp = Http::post(env('API_BASEURL').'/api/check-status', [
            'username' => $username,
            'sign' => $sign,
            'ref_id' => $ref_id
        ]);

        return response()->json($resp['data']);
    }
}
