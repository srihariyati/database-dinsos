@extends('template')
@section('title','Data Bencana')

@section('content')
    <div class="card w-75">
        <div class="card-body">
            <div class="container" >
                <div class="row" style="margin-left: -40px;">
                    <div class="col-auto">
                        <h4 class="fw-bold" >Data Rekapan Bantuan Sosial Masa Tanggap Darurat Bencana</h4>
                    </div>
        
                    <div class="col-auto" >
                            <a class="btn btn-success" id="tambah" href="{{ url('/tambahdatabencana')}}" role="button">Tambah</a>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row" style="margin-top: 1rem; margin-left: -2.4rem">
                    <div class="col-auto" style="width:290px">
                        <label class="fw-bold" style="margin-left: 0px; margin-bottom: 0.5rem">Kecamatan</label>
                            <select class="form-select" id="kecamatan" style="font-size:2.2vh;">
                                <option selected >Pilih Kecamatan</option>
                                    @foreach ($kecamatan as $kec)
                                    <option value="{{$kec->id_kec}}">{{$kec->nama_kec}}</option>
                                    @endforeach ($kecamatan as $kec)  
                                   
                            </select>
                    </div>
            
                    <div class="col-auto" style="width:290px"> 
                        <label class="fw-bold" style="margin-bottom: 0.5rem;">Desa/Kelurahan</label>
                            <select class="form-select" id="desa" style="font-size:2.2vh;">
                                <option value="">Pilih Desa</option>
                            </select>
                    </div>

                    <div class="col-auto" style="width:170px"> 
                        <label class="fw-bold" style="margin-bottom: 0.5rem">Bulan</label>
                            <select class="form-select" id="bulan" style="font-size:2.2vh;">
                                <option selected>Pilih Bulan</option>
                              
                            </select>
                    </div>

                    <div class="col-auto" style="width:170px"> 
                        <label class="fw-bold" style="margin-bottom: 0.5rem">Tahun</label>
                            <select class="form-select" id="tahun" style="font-size:2.2vh;">
                                <option selected>Pilih Tahun</option>
                               
                            </select>
                    </div>

                    <div class="col-auto" style="width:290px; margin-top: 1.5rem; margin-bottom :1.5rem;"> 
                        <label class="fw-bold" >Jenis Bencana</label>
                            <select class="form-select" id="jenis_bencana" style="font-size:2.2vh;">
                                <option selected>Pilih Jenis Bencana</option>
                             
                            </select>
                    </div>

                    <div class="col-auto" style="width:290px; margin-top: 1.5rem; margin-bottom: 1.5rem;"> 
                        <label class="fw-bold" >Sumber Dana</label>
                            <select class="form-select" id="sumber_dana" style="font-size:2.2vh;">
                                <option selected>Pilih Sumber Dana</option>
                            </select>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="card w-75" style="margin-top: 5px;">
        <div class="card-body">
            
        <div class="table-responsive" style="height: 17.5rem; font-size:2vh;">
            <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0" >
            <thead>
                <tr>
                    <th>Kecamatan</th>
                    <th>Desa/Kelurahan</th>
                    <th>Bulan</th>
                    <th>Tahun</th>
                    <th>Jenis Bencana</th>
                    <th>Sumber Dana</th>
                    <th>Jumlah Penerima (KK)</th>
                    <th>Aksi</th>
            </thead>
            <tbody>
            </tbody>
        </div>
    </div>


    <script type="text/javascript">
     $(document).ready(function(){

        $.ajax({
            //kirim id ke controller getDesa untuk baca desa yang ada didalam kacamatan yang dipilih
            url: '{{ route('getDataBencana') }}',
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
                                title: 'Data Bansos Tanggap Darurat - Bencana',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4, 5, 6]
                                }
                            },
                            {
                                //export pdf
                                extend: 'pdf',
                                text: 'Simpan PDF',
                                title: 'Data Bansos Tanggap Darurat - Bencana',
                                orientation: 'landscape',
                                messageTop: 'Data Bansos Tanggap Darurat - Bencana - Dinas Sosial Kota Banda Aceh',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4, 5, 6]
                                }
                            },
                            {
                                //export print
                                extend: 'print',
                                text: 'Cetak',
                                title: 'Data Bansos Tanggap Darurat - Bencana',
                                orientation: 'landscape',
                                messageTop: 'Data Bansos Tanggap Darurat - Bencana - Dinas Sosial Kota Banda Aceh',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4, 5, 6]
                                }
                            },
                            
                        ],
                    data: res.semua,
                    columns: [
                        { 'data': 'nama_kec' },
                        { 'data': 'nama_desa' },
                        { 'data': 'nama_bulan' },
                        { 'data': 'tahun' },
                        { 'data': 'jenis_bencana' },
                        { 'data': 'sumber_dana' },
                        { 'data': 'jumlah_penerima' },
                        { 'data': "", "defaultContent": '<a class="btn btn-warning btn-sm" id="edit" href="{{ url('/editpmks?id_data=1')}}" role="button">Edit</a>'},

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
                url: '{{ route('getDataBencana') }}?id_kec='+kecId,
                type :'get',             
                success : function(res){
                    console.log(res.desa);
                    $('#desa').html('<option value="">Pilih Desa</option> '); 

                    $.each(res.desa, function (key, value) {                                             
                        // buat option untuk pilih desa (desa berada di kecamatan yang  dipilih)
                        $('#desa').append('<option value="'+ value.id_desa + '">' + value.nama_desa + '</option>');                  
                    });

                    console.log(res.kecamatan);
                    //menampilkan data pmks (hanya kecamatan yang dipilih)
                    var table = $('#tabel-data').DataTable({
                        destroy: true,
                        dom: 'Bfrtip',
                            buttons: [
                                {
                                    //export excel
                                    extend: 'excel',
                                    text: 'Simpan Excel',
                                    title: 'Data Bansos Tanggap Darurat - Bencana',
                                    exportOptions: {
                                        columns: [ 0, 1, 2, 3, 4, 5, 6]
                                    }
                                },
                                {
                                    //export pdf
                                    extend: 'pdf',
                                    text: 'Simpan PDF',
                                    title: 'Data Bansos Tanggap Darurat - Bencana',
                                    orientation: 'landscape',
                                    messageTop: 'Data Bansos Tanggap Darurat - Bencana - Dinas Sosial Kota Banda Aceh',
                                    exportOptions: {
                                        columns: [ 0, 1, 2, 3, 4, 5, 6]
                                    }
                                },
                                {
                                    //export print
                                    extend: 'print',
                                    text: 'Cetak',
                                    title: 'Data Bansos Tanggap Darurat - Bencana',
                                    orientation: 'landscape',
                                    messageTop: 'Data Bansos Tanggap Darurat - Bencana - Dinas Sosial Kota Banda Aceh',
                                    exportOptions: {
                                        columns: [ 0, 1, 2, 3, 4, 5, 6]
                                    }
                                },
                                
                            ],
                        data: res.kecamatan,
                        columns: [
                            { 'data': 'nama_kec' },
                            { 'data': 'nama_desa' },
                            { 'data': 'nama_bulan' },
                            { 'data': 'tahun' },
                            { 'data': 'jenis_bencana' },
                            { 'data': 'sumber_dana' },
                            { 'data': 'jumlah_penerima' },
                            { 'data': "", "defaultContent": '<a class="btn btn-warning btn-sm" id="edit" href="{{ url('/editpmks?id_data=1')}}" role="button">Edit</a>'},

                        ]
                        
                    }); 
                }
            });
        });

        //ketika pilih desa

        //ketika pilih bulan
        //ketika pilih tahun
        //ketika pilih jenis bencana
        //ketika pilih sumber dana
    });
</script>
           
@endsection