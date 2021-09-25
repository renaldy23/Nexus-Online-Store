<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Regency;
use Illuminate\Http\Request;

class IndoRegionController extends Controller
{
    public function provinces(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->id;
            $regencies = Regency::where("province_id",$id)->get();
            return response()->json([
                "message" => "Regency found",
                "regencies" => $regencies
            ]);
        }
    }

    public function districts(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $districts = District::where("regency_id",$id)->get();
            return response()->json([
                "message" => "District found",
                "districts" => $districts
            ]);
        }
    }
}
