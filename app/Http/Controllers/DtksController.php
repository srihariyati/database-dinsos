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
        -> join ('data_pbi', 'data_dtks.id_data','=', 'data_pbi.id_data')
        -> select('data_dtks.*','data_pbi.*','desa.nama_desa', 'kecamatan.nama_kec',
        'bulan.nama_bulan', 'tahun.tahun')
        -> get();

        $kecamatan_desa = DB::table('data_dtks')      
        -> where(['data_dtks.id_kec'=>$request->id_kec, 'data_dtks.id_desa'=>$request->id_desa])
        -> join('kecamatan','data_dtks.id_kec','=','kecamatan.id_kec')
        -> join('desa', 'data_dtks.id_desa', '=','desa.id_desa')
        -> join('bulan','data_dtks.id_bulan','=','bulan.id_bulan')
        -> join('tahun','data_dtks.id_tahun','=','tahun.id_tahun')
        -> join ('data_pbi', 'data_dtks.id_data','=', 'data_pbi.id_data')
        -> select('data_dtks.*','data_pbi.*','desa.nama_desa', 'kecamatan.nama_kec',
        'bulan.nama_bulan', 'tahun.tahun')
        -> get();

        $bulan = DB::table('data_dtks')
        -> where('data_dtks.id_bulan', $request->id_bulan)
        -> join('kecamatan','data_dtks.id_kec','=','kecamatan.id_kec')
        -> join('desa', 'data_dtks.id_desa', '=','desa.id_desa')
        -> join('bulan','data_dtks.id_bulan','=','bulan.id_bulan')
        -> join('tahun','data_dtks.id_tahun','=','tahun.id_tahun')
        -> join ('data_pbi', 'data_dtks.id_data','=', 'data_pbi.id_data')
        -> select('data_dtks.*','data_pbi.*','desa.nama_desa', 'kecamatan.nama_kec',
        'bulan.nama_bulan', 'tahun.tahun')
        -> get();

        $tahun = DB::table('data_dtks')
        -> where('data_dtks.id_tahun', $request->id_tahun)
        -> join('kecamatan','data_dtks.id_kec','=','kecamatan.id_kec')
        -> join('desa', 'data_dtks.id_desa', '=','desa.id_desa')
        -> join('bulan','data_dtks.id_bulan','=','bulan.id_bulan')
        -> join('tahun','data_dtks.id_tahun','=','tahun.id_tahun')
        -> join ('data_pbi', 'data_dtks.id_data','=', 'data_pbi.id_data')
        -> select('data_dtks.*','data_pbi.*','desa.nama_desa', 'kecamatan.nama_kec',
        'bulan.nama_bulan', 'tahun.tahun')
        -> get();

        $bulan_tahun = DB::table('data_dtks')
        -> where(['data_dtks.id_bulan'=>$request->id_bulan, 'data_dtks.id_tahun'=>$request->id_tahun])
        -> join('kecamatan','data_dtks.id_kec','=','kecamatan.id_kec')
        -> join('desa', 'data_dtks.id_desa', '=','desa.id_desa')
        -> join('bulan','data_dtks.id_bulan','=','bulan.id_bulan')
        -> join('tahun','data_dtks.id_tahun','=','tahun.id_tahun')
        -> join ('data_pbi', 'data_dtks.id_data','=', 'data_pbi.id_data')
        -> select('data_dtks.*','data_pbi.*','desa.nama_desa', 'kecamatan.nama_kec',
        'bulan.nama_bulan', 'tahun.tahun')
        -> get();

        $desa_bulan = DB::table('data_dtks')
        -> where(['data_dtks.id_bulan'=>$request->id_bulan, 'data_dtks.id_desa'=>$request->id_desa])
        -> join('kecamatan','data_dtks.id_kec','=','kecamatan.id_kec')
        -> join('desa', 'data_dtks.id_desa', '=','desa.id_desa')
        -> join('bulan','data_dtks.id_bulan','=','bulan.id_bulan')
        -> join('tahun','data_dtks.id_tahun','=','tahun.id_tahun')
        -> join ('data_pbi', 'data_dtks.id_data','=', 'data_pbi.id_data')
        -> select('data_dtks.*','data_pbi.*','desa.nama_desa', 'kecamatan.nama_kec',
        'bulan.nama_bulan', 'tahun.tahun')
        -> get();

        $kec_bulan = DB::table('data_dtks')
        -> where(['data_dtks.id_bulan'=>$request->id_bulan, 'data_dtks.id_kec'=>$request->id_kec])
        -> join('kecamatan','data_dtks.id_kec','=','kecamatan.id_kec')
        -> join('desa', 'data_dtks.id_desa', '=','desa.id_desa')
        -> join('bulan','data_dtks.id_bulan','=','bulan.id_bulan')
        -> join('tahun','data_dtks.id_tahun','=','tahun.id_tahun')
        -> join ('data_pbi', 'data_dtks.id_data','=', 'data_pbi.id_data')
        -> select('data_dtks.*','data_pbi.*','desa.nama_desa', 'kecamatan.nama_kec',
        'bulan.nama_bulan', 'tahun.tahun')
        -> get();

        $kec_tahun = DB::table('data_dtks')
        ->where(['data_dtks.id_kec'=>$request->id_kec, 'data_dtks.id_tahun'=>$request->id_tahun])
        -> join('kecamatan','data_dtks.id_kec','=','kecamatan.id_kec')
        -> join('desa', 'data_dtks.id_desa', '=','desa.id_desa')
        -> join('bulan','data_dtks.id_bulan','=','bulan.id_bulan')
        -> join('tahun','data_dtks.id_tahun','=','tahun.id_tahun')
        -> join ('data_pbi', 'data_dtks.id_data','=', 'data_pbi.id_data')
        -> select('data_dtks.*','data_pbi.*','desa.nama_desa', 'kecamatan.nama_kec',
        'bulan.nama_bulan', 'tahun.tahun')
        -> get();

        $semua =  DB::table('data_dtks')
        -> join('kecamatan','data_dtks.id_kec','=','kecamatan.id_kec')
        -> join('desa', 'data_dtks.id_desa', '=','desa.id_desa')
        -> join('bulan','data_dtks.id_bulan','=','bulan.id_bulan')
        -> join('tahun','data_dtks.id_tahun','=','tahun.id_tahun')
        -> join ('data_pbi', 'data_dtks.id_data','=', 'data_pbi.id_data')
        -> select('data_dtks.*','data_pbi.*','desa.nama_desa', 'kecamatan.nama_kec',
        'bulan.nama_bulan', 'tahun.tahun')
        -> get();

        return response()->json(array(
            'desa' =>$desa,
            'kecamatan'=>$kecamatan,
            'kecamatan_desa'=>$kecamatan_desa,
            'bulan'=>$bulan,
            'tahun'=>$tahun,
            'bulan_tahun'=>$bulan_tahun,
            'desa_bulan'=>$desa_bulan,
            'kec_bulan'=>$kec_bulan,
            'kec_tahun'=>$kec_tahun,
            'semua' => $semua,
        ));



        // return response()->json($desa);
    }

    public function editDtks(Request $request)
    {
        $kecamatan =DB::table('kecamatan')->get();
        $bulan = DB::table('bulan')->get();
        $tahun = DB::table('tahun')->get();
        
        //mengambil data dtks berdasarkan id yang dipilih
        $datadtks= DB::table('data_dtks')      
        -> where('id_data',$request->id_data)
        -> join('kecamatan','data_dtks.id_kec','=','kecamatan.id_kec')
        -> join('desa', 'data_dtks.id_desa', '=','desa.id_desa')
        -> join('bulan','data_dtks.id_bulan','=','bulan.id_bulan')
        -> join('tahun','data_dtks.id_tahun','=','tahun.id_tahun')
        -> select('data_dtks.*','data_pbi.*','desa.nama_desa', 'kecamatan.nama_kec',
        'bulan.nama_bulan', 'tahun.tahun')
        -> get();

        return view('dayasos.editdtks',compact('kecamatan'))
        ->with (['datadtks'=>$datadtks])
        ->with (['bulan'=>$bulan])
        ->with (['tahun'=>$tahun]);
    }

    public function tambah(Request $request)
    {
        $kecamatan =DB::table('kecamatan')->get();
        $bulan = DB::table('bulan')->get();
        $tahun = DB::table('tahun')->get();

        return view('dayasos.tambahdtks',compact('kecamatan'))
        ->with (['bulan'=>$bulan])
        ->with (['tahun'=>$tahun]);

    }

    public function store(Request $request)
    {
        DB::table('data_dtks')->insert([
            'id_kec'=>$request->kecamatan,
            'id_desa'=>$request->desa,
            'id_bulan'=>$request->bulan,
            'id_tahun'=>$request->tahun,
            'ruta'=>$request->ruta,
            'jiwa'=>$request->jiwa,
        ]);

        DB::table('data_pbi')->insert([
            'id_kec'=>$request->kecamatan,
            'id_desa'=>$request->desa,
            'id_bulan'=>$request->bulan,
            'id_tahun'=>$request->tahun,
            'jumlah_aktif'=>$request->aktif,
            'jumlah_nonaktif'=>$request->nonaktif,
            'jumlah_bbl'=>$request->bbl,
        ]);
        return redirect('/dtks')->with('success', 'Berhasil Menambahkan Data!');
    }
}
