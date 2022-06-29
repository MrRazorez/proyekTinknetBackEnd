<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class crudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataKantor()
    {
        $data = DB::table("tabel_barang")->
        join("tabel_kantor", "tabel_barang.id_barang", "=", "tabel_kantor.id_barang")->
        select("tabel_barang.id_barang", "tabel_barang.nama_perangkat", "tabel_barang.jenis", "tabel_kantor.jumlah", "tabel_kantor.status")->get(); 

        return array("kantor" => $data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataGudang()
    {
        $data = DB::table("tabel_barang")->
        join("tabel_gudang", "tabel_barang.id_barang", "=", "tabel_gudang.id_barang")->
        select("tabel_barang.id_barang", "tabel_barang.nama_perangkat", "tabel_barang.jenis", "tabel_gudang.jumlah", "tabel_gudang.status")->get();

        return array("gudang" => $data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataAntv()
    {
        $data = DB::table("tabel_barang")->
        join("tabel_antv", "tabel_barang.id_barang", "=", "tabel_antv.id_barang")->
        select("tabel_barang.id_barang", "tabel_barang.nama_perangkat", "tabel_barang.jenis", "tabel_antv.jumlah", "tabel_antv.status")->get();

        return array("antv" => $data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataIndosiar()
    {
        $data = DB::table("tabel_barang")->
        join("tabel_indosiar", "tabel_barang.id_barang", "=", "tabel_indosiar.id_barang")->
        select("tabel_barang.id_barang", "tabel_barang.nama_perangkat", "tabel_barang.jenis", "tabel_indosiar.jumlah", "tabel_indosiar.status")->get();

        return array("indosiar" => $data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataSumberAgung()
    {
        $data = DB::table("tabel_barang")->
        join("tabel_sumber_agung", "tabel_barang.id_barang", "=", "tabel_sumber_agung.id_barang")->
        select("tabel_barang.id_barang", "tabel_barang.nama_perangkat", "tabel_barang.jenis", "tabel_sumber_agung.jumlah", "tabel_sumber_agung.status")->get();

        return array("sumber_agung" => $data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataMitra()
    {
        $data = DB::table("tabel_barang")->
        join("tabel_mitra", "tabel_barang.id_barang", "=", "tabel_mitra.id_barang")->
        select("tabel_barang.id_barang", "tabel_barang.nama_perangkat", "tabel_barang.jenis", "tabel_mitra.jumlah", "tabel_mitra.status")->get();

        return array("mitra" => $data);
    }
}
