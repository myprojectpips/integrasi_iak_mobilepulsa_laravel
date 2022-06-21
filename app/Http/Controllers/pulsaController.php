<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\iak;

use Http;
use Redirect;

class pulsaController extends Controller {
    public function pulsaList() {
        $username = env('API_USERNAME');
        $apiKey = env('API_KEY');
        $sign = md5($username.''.$apiKey.'pl');

        $resp = Http::post(env('API_BASEURL').'/api/pricelist', [
            'username' => $username,
            'sign' => $sign
        ]);

        return $resp;
        // foreach ($resp['data']['pricelist'] as $value) {
        //     if ($value['product_type'] == "pulsa" && $value['status'] == "active") {
        //         echo $value['product_type']." : ".$value['product_description']." : ".$value['status'];
        //         echo "<br>";
        //         // echo "<pre>";
        //         // print_r($value);
        //         // echo "</pre>";
        //     }
        // }
    }

    public function getOp(Request $req) {
        $username = env('API_USERNAME');
        $apiKey = env('API_KEY');
        $sign = md5($username.''.$apiKey.'op');

        $resp = Http::accept('application/json')->post(env('API_BASEURL').'/api/check-operator', [
            'username' => $username,
            'sign' => $sign,
            'customer_id' => $req->no_telp
        ]);

        if ($resp['data']['rc'] == 00) {
            return response()->json(['operator' => $resp['data']['operator'], 'dataPulsa' => $this->pulsaList()['data']['pricelist']]);
        }else{
            return response()->json(['code' => '444', 'msg' => $resp['data']['message']]);
        }
    }

    public function indexPulsa() {
        return view('pulsa.index-pulsa');
    }
}
