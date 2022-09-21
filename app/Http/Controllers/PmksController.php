<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PmksController extends Controller
{
    //
    public function index()
    {
        $pmks = DB::table('data_pmks')
        -> join('desa', 'data_pmks.id_desa', '=','desa.id_desa')
        -> join('bulan','data_pmks.id_bulan','=','bulan.id_bulan')
        -> join('tahun','data_pmks.id_tahun','=','tahun.id_tahun')
        -> select('data_pmks.id_data', 'desa.nama_desa', 
        'bulan.nama_bulan', 'tahun.tahun', 'data_pmks.gelandangan', 
        'data_pmks.pengemis', 'data_pmks.punk', 'data_pmks.anak_jalanan', 
        'data_pmks.orang_terlantar','data_pmks.anak_terlantar', 'data_pmks.psk', 
        'data_pmks.waria', 'data_pmks.pria', 'data_pmks.wanita')
        -> get();
        
        $bulan = DB::table('bulan')->get();
        $tahun = DB::table('tahun')->get();
        
        $desa = DB::table('desa')->distinct()->get();

        return view('rehsos.caripmks')
        ->with (['pmks'=>$pmks])
        ->with (['bulan'=>$bulan])
        ->with (['tahun'=>$tahun])
        ->with (['desa'=>$desa]);
    }


    public function index2()
    {
        $pmks = DB::table('data_pmks')
        -> join('desa', 'data_pmks.id_desa', '=','desa.id_desa')
        -> join('bulan','data_pmks.id_bulan','=','bulan.id_bulan')
        -> join('tahun','data_pmks.id_tahun','=','tahun.id_tahun')
        -> select('data_pmks.id_data', 'desa.nama_desa', 
        'bulan.nama_bulan', 'tahun.tahun', 'data_pmks.gelandangan', 
        'data_pmks.pengemis', 'data_pmks.punk', 'data_pmks.anak_jalanan', 
        'data_pmks.orang_terlantar','data_pmks.anak_terlantar', 'data_pmks.psk', 
        'data_pmks.waria', 'data_pmks.pria', 'data_pmks.wanita')
        -> get();
        
        $bulan = DB::table('bulan')->get();
        $tahun = DB::table('tahun')->get();
        
        $desa = DB::table('desa')->distinct()->get();

        return view('rehsos.pmks')
        ->with (['pmks'=>$pmks])
        ->with (['bulan'=>$bulan])
        ->with (['tahun'=>$tahun])
        ->with (['desa'=>$desa]);
    }


    public function view()
     {
        $kecamatan =DB::table('kecamatan')->get();
        $bulan = DB::table('bulan')->get();
        $tahun = DB::table('tahun')->get();

        return view('rehsos.pmks', compact('kecamatan')) 
        ->with (['bulan'=>$bulan])
        ->with (['tahun'=>$tahun]);
     }

      /**
     * return states list.
     *
     * @return json
     */
    public function getDesa(Request $request)
    {
        $desa = DB::table('desa')
            ->where('id_kec', $request->id_kec)
            ->get();

        $datapmks = DB::table('data_pmks')      
            -> where('data_pmks.id_kec', $request->id_kec)
            -> join('kecamatan','data_pmks.id_kec','=','kecamatan.id_kec')
            -> join('desa', 'data_pmks.id_desa', '=','desa.id_desa')
            -> join('bulan','data_pmks.id_bulan','=','bulan.id_bulan')
            -> join('tahun','data_pmks.id_tahun','=','tahun.id_tahun')
            -> select('data_pmks.*','desa.nama_desa', 'kecamatan.nama_kec',
            'bulan.nama_bulan', 'tahun.tahun')
            -> get();

        return response()->json(array(
            'desa' => $desa,
            'datapmks' =>$datapmks,
        ));
    }

    public function getDataKec(Request $request)
    {
        $kecOnly = DB::table('data_pmks')
            ->where('id_kec', $request->id_kec)
            ->get();
        return response()->json($kecOnly);
       
    }

    // public function getDataPMKS(Request $request)
    // {
    //     dd($request->input());
    //     Log::info($requests);
    //     //return response()->json($desa);

    // }

    // public function getDataPMKS(Request $request)
    // {
    //     //dd($request->input());
        
    //     $data = DB::table('data_pmks')->get();
    //     //return view ('dashboard',['data'=>$data]);
    //     //return view('rehsos.pmks', compact('data'));

    //     // -> JOIN ('kecamatan', 'data_pmks.id_kec',"=", 'kecamatan.id_kec')
    //     // -> JOIN ('desa','data_pmks.id_desa',"=","desa.id_desa")
    //     // -> JOIN ('bulan', 'data_pmks.id_bulan','=','buln.id_bulan')
    //     // -> JOIN ('tahun','data_pmks.id_tahun',"=",'tahun.id_tahun')
    //     // -> SELECT ('data.pmks.id_data','desa.nama_desa','desa.kecamatan','bulan.nama_bulan')
    //     // -> WHERE ('data_pmks.id_desa', $request->id_desa)
    //     // -> get();
       
    //     return response()->json($data);
    // }

}
