<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PkhController extends Controller
{
    //
    public function getViewPKH()
    {
        $kecamatan =DB::table('kecamatan')->get();
        $bulan = DB::table('bulan')->get();
        $tahun = DB::table('tahun')->get();

        return view('linjamsos.pkh',compact('kecamatan'))
        ->with (['bulan'=>$bulan])
        ->with (['tahun'=>$tahun]);
    }

    public function getDataPKH(Request $request)
    {
        $desa = DB::table('desa')
        ->where('id_kec', $request->id_kec)
        ->get();

        $kecamatan = DB::table('data_pkh')
        -> where('data_pkh.id_kec', $request->id_kec)
        -> join('kecamatan','data_pkh.id_kec','=','kecamatan.id_kec')
        -> join('desa', 'data_pkh.id_desa', '=','desa.id_desa')
        -> join('bulan','data_pkh.id_bulan','=','bulan.id_bulan')
        -> join('tahun','data_pkh.id_tahun','=','tahun.id_tahun')
        -> select('data_pkh.*','desa.nama_desa', 'kecamatan.nama_kec',
        'bulan.nama_bulan', 'tahun.tahun')
        -> get();
        
        $kecamatan_desa = DB::table('data_pkh')
        -> where(['data_pkh.id_kec'=>$request->id_kec, "data_pkh.id_desa"=>$request->id_desa])
        -> join('kecamatan','data_pkh.id_kec','=','kecamatan.id_kec')
        -> join('desa', 'data_pkh.id_desa', '=','desa.id_desa')
        -> join('bulan','data_pkh.id_bulan','=','bulan.id_bulan')
        -> join('tahun','data_pkh.id_tahun','=','tahun.id_tahun')
        -> select('data_pkh.*','desa.nama_desa', 'kecamatan.nama_kec',
        'bulan.nama_bulan', 'tahun.tahun')
        -> get();

        $semua = DB::table('data_pkh')
        -> join('kecamatan','data_pkh.id_kec','=','kecamatan.id_kec')
        -> join('desa', 'data_pkh.id_desa', '=','desa.id_desa')
        -> join('bulan','data_pkh.id_bulan','=','bulan.id_bulan')
        -> join('tahun','data_pkh.id_tahun','=','tahun.id_tahun')
        -> select('data_pkh.*','desa.nama_desa', 'kecamatan.nama_kec',
        'bulan.nama_bulan', 'tahun.tahun')
        -> get();

        
        return response()->json(array(
            'desa' =>$desa,
            'kecamatan'=>$kecamatan,
            'kecamatan_desa'=>$kecamatan_desa,
            'semua' => $semua,
        ));
    }
}
