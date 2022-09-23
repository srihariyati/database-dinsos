<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DtksController extends Controller
{
    public function getViewDTKS()
    {
        $kecamatan =DB::table('kecamatan')->get();
        $bulan = DB::table('bulan')->get();
        $tahun = DB::table('tahun')->get();

        return view('dayasos.dtks',compact('kecamatan'))
        ->with (['bulan'=>$bulan])
        ->with (['tahun'=>$tahun]);
    }

    public function getDataDTKS(Request $request)
    {
        //dd($request->all());
        $desa = DB::table('desa')
        ->where('id_kec', $request->id_kec)
        ->get();

        $kecamatan = DB::table('data_dtks')      
        -> where('data_dtks.id_kec', $request->id_kec)
        -> join('kecamatan','data_dtks.id_kec','=','kecamatan.id_kec')
        -> join('desa', 'data_dtks.id_desa', '=','desa.id_desa')
        -> join('bulan','data_dtks.id_bulan','=','bulan.id_bulan')
        -> join('tahun','data_dtks.id_tahun','=','tahun.id_tahun')
        -> select('data_dtks.*','desa.nama_desa', 'kecamatan.nama_kec',
        'bulan.nama_bulan', 'tahun.tahun')
        -> get();

        return response()->json(array(
            'desa' =>$desa,
            'kecamatan'=>$kecamatan,
        ));

        // return response()->json($desa);
    }
}
