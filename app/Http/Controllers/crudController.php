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
        try {
            $request->validate([
                "nama_perangkat" => "required",
                "jenis" => "required",
                "jumlah" => "required",
                "status" => "required",
                "kondisi" => "required",
                "lokasi" => "required"
            ]);

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

            return validData::createAPI("Data Telah Masuk!!!", $msg);
        } catch (Exception $error) {
            return validData::createAPI("Data Gagal Masuk!!!", $error);
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
        try {
            $request->validate([
                "nama_perangkat" => "required",
                "jenis" => "required",
                "jumlah" => "required",
                "status" => "required",
                "kondisi" => "required",
                "lokasi" => "required"
            ]);

            $olah = crudTinknet::findOrFail($id);

            $olah->update([
                "id_barang" => $id,
                "nama_perangkat" => $request->nama_perangkat,
                "jenis" => $request->jenis,
                "jumlah" => $request->jumlah,
                "status" => $request->status,
                "kondisi" => $request->kondisi,
                "lokasi" => $request->lokasi
            ]);
    
            $msg = crudTinknet::where("id_barang", "=", $olah->id_barang)->get();

            return validData::createAPI("Data Telah Disunting!!!", $msg);
        } catch (Exception $error) {
            return validData::createAPI("Data Gagal Disunting!!!", $error);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $olah = crudTinknet::findOrFail($id);
            $msg = $olah->delete();

            $data = crudTinknet::all();

            for ($i = 0; $i < count($data); $i++) {
                if ($data[$i]["id_barang"] != $i+1) {
                    $atur = crudTinknet::findOrFail($data[$i]["id_barang"]);
                    $atur->update([
                        "id_barang" => $i+1,
                        "nama_perangkat" => $data[$i]["nama_perangkat"],
                        "jenis" => $data[$i]["jenis"],
                        "jumlah" => $data[$i]["jumlah"],
                        "status" => $data[$i]["status"],
                        "kondisi" => $data[$i]["kondisi"],
                        "lokasi" => $data[$i]["lokasi"]
                    ]);
                }
            }
            
            return validData::createAPI("Data Telah Dihapus!!!");
        } catch(Exception $error) {
            return validData::createAPI("Data Gagal Dihapus!!!");
        }
    }
}
