<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditPmksController extends Controller
{   

    //menampilkan data kecamatan,bulan,tahun ke option
    public function view()
     {
        $kecamatan =DB::table('kecamatan')->get();
        $bulan = DB::table('bulan')->get();
        $tahun = DB::table('tahun')->get();

        return view('rehsos.editpmks', compact('kecamatan')) 
        ->with (['bulan'=>$bulan])
        ->with (['tahun'=>$tahun]);
     }

     
}
