<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\iak;

class callbackController extends Controller {
    public function callback(Request $req) {

        // JIKA DATA JSON TIDAK ADA MAKA MUNCUL MESSAGE
        if (empty($req->all())) {
            return response()->json(['message' => 'Can not process empty request'], 400);
        }

        // MENGAMBIL DATA JSON DARI CALLBACK
        $json = json_decode($req->getContent());

        if ($json->data->message == "SUCCESS") {
            iak::where('ref_id', $json->data->ref_id)->update([
                'sn' => $json->data->sn,
                'status' => $json->data->message,
                'success_at' => date('d-m-Y G:i:s'),
                'sign' => $json->data->sign
            ]);
        }else{
            iak::where('ref_id', $json->data->ref_id)->update([
                'status' => $json->data->message,
                'success_at' => null,
                'sign' => $json->data->sign
            ]);
        }
        
        return response()->json([$json->data]);
    }
}
