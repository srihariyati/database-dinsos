<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DropdownController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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
        
        return response()->json($desa);
        
    }

    // public function getDataPMKS(Request $request)
    // {
    //     dd($request->input());
    //     Log::info($requests);
    //     //return response()->json($desa);

    // }

    public function getDataPMKS(Request $request)
    {
        //dd($request->input());
        
        $data = DB::table('data_pmks')->get();
        //return view ('dashboard',['data'=>$data]);
        //return view('rehsos.pmks', compact('data'));

        // -> JOIN ('kecamatan', 'data_pmks.id_kec',"=", 'kecamatan.id_kec')
        // -> JOIN ('desa','data_pmks.id_desa',"=","desa.id_desa")
        // -> JOIN ('bulan', 'data_pmks.id_bulan','=','buln.id_bulan')
        // -> JOIN ('tahun','data_pmks.id_tahun',"=",'tahun.id_tahun')
        // -> SELECT ('data.pmks.id_data','desa.nama_desa','desa.kecamatan','bulan.nama_bulan')
        // -> WHERE ('data_pmks.id_desa', $request->id_desa)
        // -> get();
       
        return response()->json($data);
        
    }
}