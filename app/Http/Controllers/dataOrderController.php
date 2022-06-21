<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\iak;

class dataOrderController extends Controller {
    public function indexDataOrder() {
        $data = iak::paginate(10);

        return view('dataOrder.indexDataOrder', ['order' => $data]);
    }

    public function deleteAllDataOrder(){
        iak::query()->delete();

        return redirect()->back();
    }

    public function deleteDataOrder($ref_id){
        iak::where('ref_id', $ref_id)->delete();

        return redirect()->back();
    }
}