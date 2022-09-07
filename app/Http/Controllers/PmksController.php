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

}
