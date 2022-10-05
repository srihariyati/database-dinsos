@extends('template')
@section('title','PKH')

@section('content')
    <div class="card w-75">
        <div class="card-body">
            <div class="container" >
                <div class="row" style="margin-left: -40px;">
                    <div class="col-auto">
                        <h4 class="fw-bold" >Data Rekapan PKH</h4>
                    </div>
        
                    <div class="col-auto" >
                            <a class="btn btn-success" id="tambah" href="{{ url('/tambahpkh')}}" role="button">Tambah</a>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row" style="margin-top: 1rem; margin-left: -2.4rem">
                    <div class="col-auto" style="width:290px; margin-bottom: 1.5rem">
                        <label class="fw-bold" style="margin-left: 0px; margin-bottom: 0.5rem">Kecamatan</label>
                            <select class="form-select" id="kecamatan" style="font-size:2.2vh;">
                                <option selected >Pilih Kecamatan</option>
                                    @foreach ($kecamatan as $kec)
                                    <option value="{{$kec->id_kec}}">{{$kec->nama_kec}}</option>
                                    @endforeach ($kecamatan as $kec) 
                            </select>
                    </div>
            
                    <div class="col-auto" style="width:290px; margin-bottom: 1.5rem"> 
                        <label class="fw-bold" style="margin-bottom: 0.5rem;">Desa/Kelurahan</label>
                            <select class="form-select" id="desa" style="font-size:2.2vh;">
                                <option value="">Pilih Desa</option>
                            </select>
                    </div>

                    <div class="col-auto" style="width:170px; margin-bottom: 1.5rem"> 
                        <label class="fw-bold" style="margin-bottom: 0.5rem">Bulan</label>
                            <select class="form-select" id="bulan" style="font-size:2.2vh;">
                                <option selected>Pilih Bulan</option>
                              
                            </select>
                    </div>

                    <div class="col-auto" style="width:170px; margin-bottom: 1.5rem"> 
                        <label class="fw-bold" style="margin-bottom: 0.5rem">Tahun</label>
                            <select class="form-select" id="tahun" style="font-size:2.2vh;">
                                <option selected>Pilih Tahun</option>
                               
                            </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card w-75" style="margin-top: 5px;">
        <div class="card-body">      
            
        <div class="table-responsive" style="height: 17.5rem; font-size:1.8vh;">
            <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0" >
            <thead>
                <tr>
                    <th>Kecamatan</th>
                    <th>Desa/Kelurahan</th>
                    <th>Bulan</th>
                    <th>Tahun</th>
                    <th>Penerima Bantuan Tunai Bersyarat</th>
                    <th>Penerima BNPT</th>
                    <th>Penerima PBI </th>
                    <th>KPM PKH </th>
                    <th>KPM Bumil Busui </th>
                    <th>Aksi</th>
            </thead>
            <tbody>
            </tbody>
        </div>
    </div>
<script type="text/javascript">
     $(document).ready(function(){
        $.ajax({
            url: '{{ route('getDataPKH')}}',
            type :'get',             
            success : function(res){
                var table = $('#tabel-data').DataTable({
                    destroy: true,
                    dom: 'Bfrtip',
                        buttons: [
                            {
                                //export excel
                                extend: 'excel',
                                text: 'Simpan Excel',
                                title: 'Data PKH',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8]
                                }
                            },
                            {
                                //export pdf
                                extend: 'pdf',
                                text: 'Simpan PDF',
                                title: 'Data PKH',
                                orientation: 'landscape',
                                messageTop: 'Data PKH - Dinas Sosial Kota Banda Aceh',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8]
                                }
                            },
                            {
                                //export print
                                extend: 'print',
                                text: 'Cetak',
                                title: 'Data PKH',
                                orientation: 'landscape',
                                messageTop: 'Data PKH - Dinas Sosial Kota Banda Aceh',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8]
                                }
                            },
                            
                        ],
                    data: res.semua,
                    columns: [
                        { 'data': 'nama_kec' },
                        { 'data': 'nama_desa' },
                        { 'data': 'nama_bulan' },
                        { 'data': 'tahun' },
                        { 'data': 'penerima_bantuan_tunai_bersyarat' },
                        { 'data': 'penerima_bpnt' },
                        { 'data': 'pbi_jaminan_kesehatan' },
                        { 'data': 'kpm_pkh_p2k2' },
                        { 'data': 'kpm_bumil_busui_baduta' },
                        { 'data': "", "defaultContent": '<a class="btn btn-warning btn-sm" id="edit" href="{{ url('/editPKH?id_data=1')}}" role="button">Edit</a>'},

                    ]
                    
                });
            }
        });


        //ketika pilih kecamatan
        $('#kecamatan').on('change', function(){
            //ambil value dari id kecamatan     
            var kecId = this.value;
            console.log(kecId);
            $('#desa').html('');

            $.ajax({
                //kirim id ke controller getDesa untuk baca desa yang ada didalam kacamatan yang dipilih
                url: '{{ route('getDataPKH') }}?id_kec='+kecId,
                type :'get',             
                success : function(res){
                    console.log(res.desa);
                    $('#desa').html('<option value="">Pilih Desa</option> '); 

                    $.each(res.desa, function (key, value) {                                             
                        // buat option untuk pilih desa (desa berada di kecamatan yang  dipilih)
                        $('#desa').append('<option value="'+ value.id_desa + '">' + value.nama_desa + '</option>');                  
                    });

                    console.log(res.kecamatan);
                    //menampilkan data PKH (hanya kecamatan yang dipilih)
                    var table = $('#tabel-data').DataTable({
                        destroy: true,
                        dom: 'Bfrtip',
                            buttons: [
                                {
                                    //export excel
                                    extend: 'excel',
                                    text: 'Simpan Excel',
                                    title: 'Data PKH',
                                    exportOptions: {
                                        columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8]
                                    }
                                },
                                {
                                    //export pdf
                                    extend: 'pdf',
                                    text: 'Simpan PDF',
                                    title: 'Data PKH',
                                    orientation: 'landscape',
                                    messageTop: 'Data PKH - Dinas Sosial Kota Banda Aceh',
                                    exportOptions: {
                                        columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8]
                                    }
                                },
                                {
                                    //export print
                                    extend: 'print',
                                    text: 'Cetak',
                                    title: 'Data PKH',
                                    orientation: 'landscape',
                                    messageTop: 'Data PKH - Dinas Sosial Kota Banda Aceh',
                                    exportOptions: {
                                        columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8]
                                    }
                                },
                                
                            ],
                        data: res.kecamatan,
                        columns: [
                            { 'data': 'nama_kec' },
                            { 'data': 'nama_desa' },
                            { 'data': 'nama_bulan' },
                            { 'data': 'tahun' },
                            { 'data': 'penerima_bantuan_tunai_bersyarat' },
                            { 'data': 'penerima_bpnt' },
                            { 'data': 'pbi_jaminan_kesehatan' },
                            { 'data': 'kpm_pkh_p2k2' },
                            { 'data': 'kpm_bumil_busui_baduta' },
                            { 'data': "", "defaultContent": '<a class="btn btn-warning btn-sm" id="edit" href="{{ url('/editPKH?id_data=1')}}" role="button">Edit</a>'},

                        ]
                        
                    }); 
                }
            });
        });

        //ketika pilih desa
        $('#desa').on('change', function(){
            var desaId = desa.value;
            var kecId =  kecamatan.value;
            console.log(desaId);
            console.log(kecId);

            
            //tampilkan data dari desa dan kecamatan
            $.ajax({
                url :'{{route('getDataPKH')}}?id_kec='+kecId+'&id_desa='+desaId,
                type :'get',
                success : function(res){
                    console.log(res.kecamatan_desa);
                    var table = $('#tabel-data').DataTable({
                        destroy: true,
                        dom: 'Bfrtip',
                            buttons: [
                                {
                                    //export excel
                                    extend: 'excel',
                                    text: 'Simpan Excel',
                                    title: 'Data PKH',
                                    exportOptions: {
                                        columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8]
                                    }
                                },
                                {
                                    //export pdf
                                    extend: 'pdf',
                                    text: 'Simpan PDF',
                                    title: 'Data PKH',
                                    orientation: 'landscape',
                                    messageTop: 'Data PKH - Dinas Sosial Kota Banda Aceh',
                                    exportOptions: {
                                        columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8]
                                    }
                                },
                                {
                                    //export print
                                    extend: 'print',
                                    text: 'Cetak',
                                    title: 'Data PKH',
                                    orientation: 'landscape',
                                    messageTop: 'Data PKH - Dinas Sosial Kota Banda Aceh',
                                    exportOptions: {
                                        columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8]
                                    }
                                },
                                
                            ],
                        data: res.kecamatan_desa,
                        columns: [
                            { 'data': 'nama_kec' },
                            { 'data': 'nama_desa' },
                            { 'data': 'nama_bulan' },
                            { 'data': 'tahun' },
                            { 'data': 'penerima_bantuan_tunai_bersyarat' },
                            { 'data': 'penerima_bpnt' },
                            { 'data': 'pbi_jaminan_kesehatan' },
                            { 'data': 'kpm_pkh_p2k2' },
                            { 'data': 'kpm_bumil_busui_baduta' },
                            { 'data': "", "defaultContent": '<a class="btn btn-warning btn-sm" id="edit" href="{{ url('/editPKH?id_data=1')}}" role="button">Edit</a>'},

                        ]
                        
                    }); 
                }


            });

        });
    });
</script>
@endsection