<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Barang::all();
        $return = array("message" => "success", "data" => $data);
        header("Content-Type: application/json");
        return(json_encode($return));
        exit();
        // return($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=null;
        if($request->nama != null && $request->harga != null){
            $data = Barang::create([
                'nama_barang'=>$request->nama,
                'harga'=>$request->harga,
                'updated_at'=> Carbon::now()->setTimezone('Asia/Jakarta')->toDateTimeString(),
                'updated_at'=> Carbon::now()->setTimezone('Asia/Jakarta')->toDateTimeString()

            ]);
        }
        if($data){
            $return = array("message" => "success", "data" => $data);
            return($return);
        }else{
            $return = array("message" => "failed", "data" => null);
            return($return);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $data = null;
        if($request->id != null && $request->nama != null && $request->harga != null){
            $data = Barang::where('id', $request->id)->update([
                'nama_barang'=>$request->nama,
                'harga'=>$request->harga,
                'updated_at'=> Carbon::now()->setTimezone('Asia/Jakarta')->toDateTimeString()
            ]);
        }
        if($data){
            $return = array("message" => "success", "data" => $data);
            return($return);
        }else{
            $return = array("message" => "failed", "data" => null);
            return($return);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Barang $barang)
    {
        $data = null;
        if($request->id != null){
            Barang::where('id', $request->id)->delete();
        }
        $return = array("message" => "success", "data" => $data);
        return($return);
    }
}
