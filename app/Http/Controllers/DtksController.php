<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DtksController extends Controller
{
    //
    public function index()
    {
        $dtks = DB::table('data_dtks')
        -> join('desa', 'data_dtks.id_desa', '=','desa.id_desa')
        -> join('bulan','data_dtks.id_bulan','=','bulan.id_bulan')
        -> join('tahun','data_dtks.id_tahun','=','tahun.id_tahun')
        -> select('data_dtks.id_data', 'desa.nama_desa', 
        'bulan.nama_bulan', 'tahun.tahun', 'data_dtks.jiwa', 
        'data_dtks.ruta')
        -> get();
        
        $bulan = DB::table('bulan')->get();
        $tahun = DB::table('tahun')->get();
        
        $desa = DB::table('desa')->distinct()->get();

        return view('dayasos.caridtks')
        ->with (['dtks'=>$dtks])
        ->with (['bulan'=>$bulan])
        ->with (['tahun'=>$tahun])
        ->with (['desa'=>$desa]);
    }


    public function index2()
    {
        $dtks = DB::table('data_dtks')
        -> join('desa', 'data_dtks.id_desa', '=','desa.id_desa')
        -> join('bulan','data_dtks.id_bulan','=','bulan.id_bulan')
        -> join('tahun','data_dtks.id_tahun','=','tahun.id_tahun')
        -> select('data_dtks.id_data', 'desa.nama_desa', 
        'bulan.nama_bulan', 'tahun.tahun', 'data_dtks.jiwa', 
        'data_dtks.ruta')
        -> get();
        
        $bulan = DB::table('bulan')->get();
        $tahun = DB::table('tahun')->get();
        
        $desa = DB::table('desa')->distinct()->get();

        return view('dayasos.dtks')
        ->with (['dtks'=>$dtks])
        ->with (['bulan'=>$bulan])
        ->with (['tahun'=>$tahun])
        ->with (['desa'=>$desa]);
    }


    public function view()
     {
        $kecamatan =DB::table('kecamatan')->get();
        $bulan = DB::table('bulan')->get();
        $tahun = DB::table('tahun')->get();

        return view('dayasos.dtks', compact('kecamatan')) 
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

        $datadtks = DB::table('data_dtks')
            ->where('id_kec', $request->id_kec)
            ->get();

        return response()->json(array(
            'desa' => $desa,
            'datadtks' => $datadtks,
        ));
    }

    // public function getDataDTKS(Request $request)
    // {
    //     dd($request->input());
    //     Log::info($requests);
    //     //return response()->json($desa);

    // }

    public function getDataDTKS(Request $request)
    {
        //dd($request->input());
        
        $data = DB::table('data_dtks')->get();
        //return view ('dashboard',['data'=>$data]);
        //return view('rehsos.dtks', compact('data'));

        // -> JOIN ('kecamatan', 'data_dtks.id_kec',"=", 'kecamatan.id_kec')
        // -> JOIN ('desa','data_dtks.id_desa',"=","desa.id_desa")
        // -> JOIN ('bulan', 'data_dtks.id_bulan','=','buln.id_bulan')
        // -> JOIN ('tahun','data_dtks.id_tahun',"=",'tahun.id_tahun')
        // -> SELECT ('data.dtks.id_data','desa.nama_desa','desa.kecamatan','bulan.nama_bulan')
        // -> WHERE ('data_dtks.id_desa', $request->id_desa)
        // -> get();
       
        return response()->json($data);
        
    }

}
