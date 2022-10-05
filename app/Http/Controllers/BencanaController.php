<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BencanaController extends Controller
{
    //
    public function getViewBencana()
    {
        $kecamatan =DB::table('kecamatan')->get();
        $bulan = DB::table('bulan')->get();
        $tahun = DB::table('tahun')->get();

        return view('linjamsos.bencana',compact('kecamatan'))
        ->with (['bulan'=>$bulan])
        ->with (['tahun'=>$tahun]);
    }

    public function getDataBencana(Request $request)
    {
        $desa = DB::table('desa')
        ->where('id_kec', $request->id_kec)
        ->get();
        
        $sumberdana = DB::table('sumber_dana')->get();
        $jenisbencana = DB::table('jenis_bencana')->get();

        $kecamatan = DB::table('bansos_tanggap_darurat')      
        -> where('bansos_tanggap_darurat.id_kec', $request->id_kec)
        -> join('kecamatan','bansos_tanggap_darurat.id_kec','=','kecamatan.id_kec')
        -> join('desa', 'bansos_tanggap_darurat.id_desa', '=','desa.id_desa')
        -> join('bulan','bansos_tanggap_darurat.id_bulan','=','bulan.id_bulan')
        -> join('tahun','bansos_tanggap_darurat.id_tahun','=','tahun.id_tahun')
        -> join('jenis_bencana','bansos_tanggap_darurat.id_jenis_bencana','=','jenis_bencana.id_bencana')
        -> join('sumber_dana','sumber_dana.id_sumber_dana','=','sumber_dana.id_sumber_dana')
        -> select('bansos_tanggap_darurat.*','desa.nama_desa', 'kecamatan.nama_kec',
        'bulan.nama_bulan', 'tahun.tahun','jenis_bencana.jenis_bencana','sumber_dana.sumber_dana')
        -> get();

        $semua = DB::table('bansos_tanggap_darurat')     
        -> join('kecamatan','bansos_tanggap_darurat.id_kec','=','kecamatan.id_kec')
        -> join('desa', 'bansos_tanggap_darurat.id_desa', '=','desa.id_desa')
        -> join('bulan','bansos_tanggap_darurat.id_bulan','=','bulan.id_bulan')
        -> join('tahun','bansos_tanggap_darurat.id_tahun','=','tahun.id_tahun')
        -> join('jenis_bencana','bansos_tanggap_darurat.id_jenis_bencana','=','jenis_bencana.id_bencana')
        -> join('sumber_dana','bansos_tanggap_darurat.id_sumber_dana','=','sumber_dana.id_sumber_dana')
        -> select('bansos_tanggap_darurat.*','desa.nama_desa', 'kecamatan.nama_kec',
        'bulan.nama_bulan', 'tahun.tahun','jenis_bencana.jenis_bencana','sumber_dana.sumber_dana')
        -> get();

        return response()->json(array(
            'desa' =>$desa,
            'sumberdana'=>$sumberdana,
            'jenisbencana'=>$jenisbencana,
            'kecamatan'=>$kecamatan,
            'semua' =>$semua,
        ));
        
    } 

    public function tambah(Request $request)
    {
        $kecamatan =DB::table('kecamatan')->get();
        $bulan = DB::table('bulan')->get();
        $tahun = DB::table('tahun')->get();

        return view('linjamsos.tambahdatabencana',compact('kecamatan'))
        ->with (['bulan'=>$bulan])
        ->with (['tahun'=>$tahun]);

    }

    public function store(Request $request)
    {
        DB::table('bansos_tanggap_darurat')->insert([
            'id_kec'=>$request->kecamatan,
            'id_desa'=>$request->desa,
            'id_bulan'=>$request->bulan,
            'id_tahun'=>$request->tahun,
            'id_jenis_bencana'=>$request->jenis_bencana,
            'id_sumber_dana'=>$request->sumber_dana,
            'tanggal'=>$request->tgl,
            'jumlah_penerima'=>$request->penerima,
        ]);
        return redirect('/bencana')->with('success', 'Berhasil Menambahkan Data!');
    }
}
