<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\crudTinknet;
use App\Helpers\validData;
use Exception;

class crudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = crudTinknet::all();

        return array("barang" => $data, "jumlah_data" => count($data));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $data = crudTinknet::all();

            $olah = crudTinknet::create([
                "id_barang" => (count($data)+1),
                "nama_perangkat" => $request->nama_perangkat,
                "jenis" => $request->jenis,
                "jumlah" => $request->jumlah,
                "status" => $request->status,
                "kondisi" => $request->kondisi,
                "lokasi" => $request->lokasi
            ]);

            $msg = crudTinknet::where("id_barang", "=", $olah->id_barang)->get();

            if ($msg) {
                return validData::createAPI("Data Telah Masuk!!!", $msg);
            }
            else {
                return validData::createAPI("Data Gagal Masuk!!!");
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = crudTinknet::where("id_barang", "=", $id)->get();

        return $data[0];
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
}
