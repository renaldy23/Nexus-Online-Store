<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use Illuminate\Http\Request;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $store = Store::where("users_id",$user_id)->first();
        if($store){
            return view("store.dashboard",compact('store'));
        }
        else{
            return redirect()->route("store.create");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $province = Province::all();
        return view("store.create",compact("province"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {
        $request->validate([
            "store_name" => "required|min:5|max:25",
            "store_phone_number" => "required",
            "description" => "required|min:10",
            "province" => "required",
            "regencies" => "required",
            "districts" => "required",
            "address" => "required"
        ]);

        $regency = Regency::find($request->regencies);
        $districts = District::find($request->districts);
        $data = $request->only("store_name","store_phone_number","description","address");
        $data["regency"] = $regency->name;
        $data["districts"] = $districts->name;
        $data["users_id"] = Auth::user()->id;
        $data["store_image"] = "default_store.jpg";

        Store::create($data);

        return redirect()->route("store.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function my_dashboard()
    {
        $store_id = Auth::user()->store->id;
        $store = Store::findOrFail($store_id);

        return view("store.index",compact('store'));
    }
}
