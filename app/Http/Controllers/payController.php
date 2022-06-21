<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\iak;

use Http;
use Redirect;

class payController extends Controller {
    public function pay(Request $req) {
        $username = env('API_USERNAME');
        $apiKey = env('API_KEY');
        $ref_id = "order".time();
        $sign = md5($username.''.$apiKey.''.$ref_id);
        $prod_code = $req->prod_code;
        $no_telp = $req->noTelp;
        $provider = $req->prod_desc;

        $resp = Http::accept('application/json')->post(env('API_BASEURL').'/api/top-up', [
            'username' => $username,
            'sign' => $sign,
            'customer_id' => $no_telp,
            'product_code' => $prod_code,
            'ref_id' => $ref_id
        ]);

        if ($resp['data']['rc'] == 00) { // Jika message api sukses
            iak::insert([
                'ref_id' => $ref_id,
                'no_telp' => $no_telp,
                'provider' => $provider,
                'prod_code' => $prod_code,
                'price' => $resp['data']['price'],
                'tr_id' => $resp['data']['tr_id'],
                'status' => $resp['data']['message']
            ]);

            return Redirect::back()->with('success', 'Pembelian pulsa anda telah sukses!');
        }else if ($resp['data']['rc'] == 07) { // Jika message api failed
            return Redirect::back()->with('failed', 'Pembelian pulsa anda gagal, coba lagi nanti!');
        }else if ($resp['data']['rc'] == 39) { // Jika message api proses
            iak::insert([
                'ref_id' => $ref_id,
                'no_telp' => $no_telp,
                'provider' => $provider,
                'prod_code' => $prod_code,
                'price' => $resp['data']['price'],
                'tr_id' => $resp['data']['tr_id'],
                'status' => $resp['data']['message']
            ]);
            
            return Redirect::back()->with('process', 'Pembelian pulsa anda sedang diproses!');
        }else{ // Jika mengalami error lain
            return Redirect::back()->with('error', $resp['data']['message']);
        }
    }
}
