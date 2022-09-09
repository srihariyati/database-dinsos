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
}
