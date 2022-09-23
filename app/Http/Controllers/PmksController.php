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

    public function getPmksDesa(Request $request)
    {
        $datapmks = DB::table('data_pmks')      
        -> where(['data_pmks.id_kec'=>$request->id_kec, "data_pmks.id_desa"=>$request->id_desa])
        -> join('kecamatan','data_pmks.id_kec','=','kecamatan.id_kec')
        -> join('desa', 'data_pmks.id_desa', '=','desa.id_desa')
        -> join('bulan','data_pmks.id_bulan','=','bulan.id_bulan')
        -> join('tahun','data_pmks.id_tahun','=','tahun.id_tahun')
        -> select('data_pmks.*','desa.nama_desa', 'kecamatan.nama_kec',
        'bulan.nama_bulan', 'tahun.tahun')
        -> get();

        return response()->json($datapmks);
    }

    public function getPmksBulan (Request $request)
    {   // untuk hanya pilih bulan (res.bulan)
        $bulan = DB::table('data_pmks')      
        -> where('data_pmks.id_bulan', $request->id_bulan)
        -> join('kecamatan','data_pmks.id_kec','=','kecamatan.id_kec')
        -> join('desa', 'data_pmks.id_desa', '=','desa.id_desa')
        -> join('bulan','data_pmks.id_bulan','=','bulan.id_bulan')
        -> join('tahun','data_pmks.id_tahun','=','tahun.id_tahun')
        -> select('data_pmks.*','desa.nama_desa', 'kecamatan.nama_kec',
        'bulan.nama_bulan', 'tahun.tahun')
        -> get();

        // untuk pilih kec + bulan (res.kec_bulan)
        $kec_bulan = DB::table('data_pmks')      
        -> where(['data_pmks.id_bulan'=>$request->id_bulan, 'data_pmks.id_kec'=>$request->id_kec])
        -> join('kecamatan','data_pmks.id_kec','=','kecamatan.id_kec')
        -> join('desa', 'data_pmks.id_desa', '=','desa.id_desa')
        -> join('bulan','data_pmks.id_bulan','=','bulan.id_bulan')
        -> join('tahun','data_pmks.id_tahun','=','tahun.id_tahun')
        -> select('data_pmks.*','desa.nama_desa', 'kecamatan.nama_kec',
        'bulan.nama_bulan', 'tahun.tahun')
        -> get();

        // untuk pilih kec + desa + bulan ( res.kec_desa_bulan)
        $kec_desa_bulan =  DB::table('data_pmks')
        -> where(['data_pmks.id_bulan'=>$request->id_bulan, 'data_pmks.id_kec'=>$request->id_kec, 'data_pmks.id_desa'=>$request->id_desa])
        -> join('kecamatan','data_pmks.id_kec','=','kecamatan.id_kec')
        -> join('desa', 'data_pmks.id_desa', '=','desa.id_desa')
        -> join('bulan','data_pmks.id_bulan','=','bulan.id_bulan')
        -> join('tahun','data_pmks.id_tahun','=','tahun.id_tahun')
        -> select('data_pmks.*','desa.nama_desa', 'kecamatan.nama_kec',
        'bulan.nama_bulan', 'tahun.tahun')
        -> get();

        // untuk pilih kec + desa + bulan + tahun (res.kec_desa_bulan_tahun)
        $kec_desa_bulan_tahun = DB::table('data_pmks')
        -> where(['data_pmks.id_bulan'=>$request->id_bulan, 'data_pmks.id_kec'=>$request->id_kec, 'data_pmks.id_desa'=>$request->id_desa, 'data_pmks.id_tahun'=>$request->id_tahun])
        -> join('kecamatan','data_pmks.id_kec','=','kecamatan.id_kec')
        -> join('desa', 'data_pmks.id_desa', '=','desa.id_desa')
        -> join('bulan','data_pmks.id_bulan','=','bulan.id_bulan')
        -> join('tahun','data_pmks.id_tahun','=','tahun.id_tahun')
        -> select('data_pmks.*','desa.nama_desa', 'kecamatan.nama_kec',
        'bulan.nama_bulan', 'tahun.tahun')
        -> get();

        return response()->json(array(
            'bulan' => $bulan,
            'kec_bulan' =>$kec_bulan,
            'kec_desa_bulan' => $kec_desa_bulan,
            'kec_desa_bulan_tahun'=>$kec_desa_bulan_tahun,
        ));
    }

    public function getDataKec(Request $request)
    {
        $kecOnly = DB::table('data_pmks')
            ->where('id_kec', $request->id_kec)
            ->get();
        return response()->json($kecOnly);
       
    }

    public function getDataPMKS(Request $request)
    {   $desa = DB::table('desa')
        ->where('id_kec', $request->id_kec)
        ->get();

        $kecamatan = DB::table('data_pmks')      
        -> where('data_pmks.id_kec', $request->id_kec)
        -> join('kecamatan','data_pmks.id_kec','=','kecamatan.id_kec')
        -> join('desa', 'data_pmks.id_desa', '=','desa.id_desa')
        -> join('bulan','data_pmks.id_bulan','=','bulan.id_bulan')
        -> join('tahun','data_pmks.id_tahun','=','tahun.id_tahun')
        -> select('data_pmks.*','desa.nama_desa', 'kecamatan.nama_kec',
        'bulan.nama_bulan', 'tahun.tahun')
        -> get();

        $kecamatan_desa = DB::table('data_pmks')      
        -> where(['data_pmks.id_kec'=>$request->id_kec, "data_pmks.id_desa"=>$request->id_desa])
        -> join('kecamatan','data_pmks.id_kec','=','kecamatan.id_kec')
        -> join('desa', 'data_pmks.id_desa', '=','desa.id_desa')
        -> join('bulan','data_pmks.id_bulan','=','bulan.id_bulan')
        -> join('tahun','data_pmks.id_tahun','=','tahun.id_tahun')
        -> select('data_pmks.*','desa.nama_desa', 'kecamatan.nama_kec',
        'bulan.nama_bulan', 'tahun.tahun')
        -> get();

        $bulan = DB::table('data_pmks')      
        -> where('data_pmks.id_bulan', $request->id_bulan)
        -> join('kecamatan','data_pmks.id_kec','=','kecamatan.id_kec')
        -> join('desa', 'data_pmks.id_desa', '=','desa.id_desa')
        -> join('bulan','data_pmks.id_bulan','=','bulan.id_bulan')
        -> join('tahun','data_pmks.id_tahun','=','tahun.id_tahun')
        -> select('data_pmks.*','desa.nama_desa', 'kecamatan.nama_kec',
        'bulan.nama_bulan', 'tahun.tahun')
        -> get();

        $tahun = DB::table('data_pmks')
        -> where('data_pmks.id_tahun', $request->id_tahun)
        -> join('kecamatan','data_pmks.id_kec','=','kecamatan.id_kec')
        -> join('desa', 'data_pmks.id_desa', '=','desa.id_desa')
        -> join('bulan','data_pmks.id_bulan','=','bulan.id_bulan')
        -> join('tahun','data_pmks.id_tahun','=','tahun.id_tahun')
        -> select('data_pmks.*','desa.nama_desa', 'kecamatan.nama_kec',
        'bulan.nama_bulan', 'tahun.tahun')
        -> get();

        $bulan_tahun = DB::table('data_pmks')      
        -> where(['data_pmks.id_bulan'=>$request->id_bulan, 'data_pmks.id_tahun'=>$request->id_tahun])
        -> join('kecamatan','data_pmks.id_kec','=','kecamatan.id_kec')
        -> join('desa', 'data_pmks.id_desa', '=','desa.id_desa')
        -> join('bulan','data_pmks.id_bulan','=','bulan.id_bulan')
        -> join('tahun','data_pmks.id_tahun','=','tahun.id_tahun')
        -> select('data_pmks.*','desa.nama_desa', 'kecamatan.nama_kec',
        'bulan.nama_bulan', 'tahun.tahun')
        -> get();

        $kec_bulan = DB::table('data_pmks')      
        -> where(['data_pmks.id_bulan'=>$request->id_bulan, 'data_pmks.id_kec'=>$request->id_kec])
        -> join('kecamatan','data_pmks.id_kec','=','kecamatan.id_kec')
        -> join('desa', 'data_pmks.id_desa', '=','desa.id_desa')
        -> join('bulan','data_pmks.id_bulan','=','bulan.id_bulan')
        -> join('tahun','data_pmks.id_tahun','=','tahun.id_tahun')
        -> select('data_pmks.*','desa.nama_desa', 'kecamatan.nama_kec',
        'bulan.nama_bulan', 'tahun.tahun')
        -> get();

        $kec_tahun = DB::table('data_pmks')      
        -> where(['data_pmks.id_kec'=>$request->id_kec, 'data_pmks.id_tahun'=>$request->id_tahun])
        -> join('kecamatan','data_pmks.id_kec','=','kecamatan.id_kec')
        -> join('desa', 'data_pmks.id_desa', '=','desa.id_desa')
        -> join('bulan','data_pmks.id_bulan','=','bulan.id_bulan')
        -> join('tahun','data_pmks.id_tahun','=','tahun.id_tahun')
        -> select('data_pmks.*','desa.nama_desa', 'kecamatan.nama_kec',
        'bulan.nama_bulan', 'tahun.tahun')
        -> get(); 

        $desa_bulan = DB::table('data_pmks')      
        -> where(['data_pmks.id_bulan'=>$request->id_bulan, 'data_pmks.id_desa'=>$request->id_desa])
        -> join('kecamatan','data_pmks.id_kec','=','kecamatan.id_kec')
        -> join('desa', 'data_pmks.id_desa', '=','desa.id_desa')
        -> join('bulan','data_pmks.id_bulan','=','bulan.id_bulan')
        -> join('tahun','data_pmks.id_tahun','=','tahun.id_tahun')
        -> select('data_pmks.*','desa.nama_desa', 'kecamatan.nama_kec',
        'bulan.nama_bulan', 'tahun.tahun')
        -> get();

        $desa_tahun =  DB::table('data_pmks')      
        -> where(['data_pmks.id_tahun'=>$request->id_tahun, 'data_pmks.id_desa'=>$request->id_desa])
        -> join('kecamatan','data_pmks.id_kec','=','kecamatan.id_kec')
        -> join('desa', 'data_pmks.id_desa', '=','desa.id_desa')
        -> join('bulan','data_pmks.id_bulan','=','bulan.id_bulan')
        -> join('tahun','data_pmks.id_tahun','=','tahun.id_tahun')
        -> select('data_pmks.*','desa.nama_desa', 'kecamatan.nama_kec',
        'bulan.nama_bulan', 'tahun.tahun')
        -> get();

        $desa_bulan_tahun = DB::table('data_pmks')      
        -> where(['data_pmks.id_tahun'=>$request->id_tahun, 'data_pmks.id_desa'=>$request->id_desa])
        -> join('kecamatan','data_pmks.id_kec','=','kecamatan.id_kec')
        -> join('desa', 'data_pmks.id_desa', '=','desa.id_desa')
        -> join('bulan','data_pmks.id_bulan','=','bulan.id_bulan')
        -> join('tahun','data_pmks.id_tahun','=','tahun.id_tahun')
        -> select('data_pmks.*','desa.nama_desa', 'kecamatan.nama_kec',
        'bulan.nama_bulan', 'tahun.tahun')
        -> get();

        return response()->json(array(
            'desa' =>$desa,
            'kecamatan'=>$kecamatan,
            'kecamatan_desa'=>$kecamatan_desa,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'bulan_tahun'=> $bulan_tahun,
            'kec_bulan'=>$kec_bulan,
            'kec_tahun'=>$kec_tahun,
            'desa_bulan'=>$desa_bulan,
            'desa_tahun'=>$desa_tahun,
            'desa_bulan_tahun'=>$desa_bulan_tahun,
        ));
        

    }
    public function editPmks(Request $request){
        
        $kecamatan =DB::table('kecamatan')->get();
        $bulan = DB::table('bulan')->get();
        $tahun = DB::table('tahun')->get();

        //mengambil data pmks berdasarkan id yang dipilih
        $datapmks= DB::table('data_pmks')      
        -> where('id_data',$request->id_data)
        -> join('kecamatan','data_pmks.id_kec','=','kecamatan.id_kec')
        -> join('desa', 'data_pmks.id_desa', '=','desa.id_desa')
        -> join('bulan','data_pmks.id_bulan','=','bulan.id_bulan')
        -> join('tahun','data_pmks.id_tahun','=','tahun.id_tahun')
        -> select('data_pmks.*','desa.nama_desa', 'kecamatan.nama_kec',
        'bulan.nama_bulan', 'tahun.tahun')
        -> get();
        return view('rehsos.editpmks',compact('kecamatan'))
        ->with (['datapmks'=>$datapmks])
        ->with (['bulan'=>$bulan])
        ->with (['tahun'=>$tahun]);
    }  
    
    public function update(Request $request)
    {
      DB::table('data_pmks')->where('id_data', $request->id_data)
      ->update([
         'id_data' =>$request->id_data,
         'id_kec'=>$request->kecamatan,
         'id_desa'=>$request->desa,
         'id_bulan'=>$request->bulan,
         'id_tahun'=>$request->tahun,
         'gelandangan'=>$request->gld,
         'pengemis'=>$request->peng,
         'punk'=>$request->punk,
         'anak_jalanan'=>$request->anjal,
         'orang_terlantar'=>$request->ot,
         'anak_terlantar'=>$request->at,
         'psk'=>$request->psk,
         'waria'=>$request->waria,
         'pria'=>$request->pria,
         'wanita'=>$request->wanita,
      ]);
      return redirect('/pmks')->with('success', 'Berhasil Mengedit Data!');
    }

    public function tambah(Request $request)
    {
        $kecamatan =DB::table('kecamatan')->get();
        $bulan = DB::table('bulan')->get();
        $tahun = DB::table('tahun')->get();

        return view('rehsos.tambahpmks',compact('kecamatan'))
        ->with (['bulan'=>$bulan])
        ->with (['tahun'=>$tahun]);

    }

    public function store(Request $request)
    {
        DB::table('data_pmks')->insert([
            'id_kec'=>$request->kecamatan,
            'id_desa'=>$request->desa,
            'id_bulan'=>$request->bulan,
            'id_tahun'=>$request->tahun,
            'gelandangan'=>$request->gld,
            'pengemis'=>$request->peng,
            'punk'=>$request->punk,
            'anak_jalanan'=>$request->anjal,
            'orang_terlantar'=>$request->ot,
            'anak_terlantar'=>$request->at,
            'psk'=>$request->psk,
            'waria'=>$request->waria,
            'pria'=>$request->pria,
            'wanita'=>$request->wanita,
        ]);
        return redirect('/pmks')->with('success', 'Berhasil Menambahkan Data!');
    }
}
