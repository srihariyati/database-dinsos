@extends('template')
@section('title', 'DTKS')

@section('content')
    <div class="card w-75">
        <div class="card-body" style="margin-bottom: 10px;">
            <div class="container" >
                <div class="row" style="margin-left: -40px;">
                    <div class="col-auto">
                        <h4 class="fw-bold" >Data Rekapan DTKS</h4>
                    </div>
        
                    <div class="col-auto" >
                            <a class="btn btn-success" id="tambah" href="{{ url('/tambahdtks')}}" role="button">Tambah</a>
                    </div>
                </div>
            </div>
        

            <div class="container">
                <div class="row" style="margin-top: 1rem; margin-left: -2.4rem">
                    <div class="col-auto" style="width:290px">
                        <label class="fw-bold" style="margin-left: 0px; margin-bottom: 0.5rem">Kecamatan</label>
                            <select class="form-select" id="kecamatan" style="font-size:2.2vh;">
                            <option value=""  selected >Pilih Kecamatan</option>
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
                                < <option selected>Pilih Bulan</option>
                                    @foreach($bulan as $b)
                                    <option value="{{$b->id_bulan}}">{{$b->nama_bulan}}</option>
                                    @endforeach($bulan as $b)
                                    </select>
                    </div>

                    <div class="col-auto" style="width:170px"> 
                        <label class="fw-bold" style="margin-bottom: 0.5rem">Tahun</label>
                            <select class="form-select" id="tahun" style="font-size:2.2vh;">
                                <option selected>Pilih Tahun</option>
                                @foreach($tahun as $t)
                                <option value="{{$t->id_tahun}}">{{$t->tahun}}</option>
                                @endforeach($tahun as $t)
                            </select>
                    </div>

                </div>
            </div>
        </div>
    </div>

    
    <div class="card w-75" style="margin-top: 5px;">
        <div class="card-body">
            <!-- <div  class="row" style="margin-top: 0.2rem; margin-left: 43rem; margin-bottom: 0.2rem">
                <div class="col-auto" >
                    <a class="btn btn-warning" id="edit-btn" href="#" role="button">Cetak PDF</a>
                </div> 
                <div class="col-auto" >
                    <a class="btn btn-success" id="Cari-btn" href="#" role="button">Cetak Excel</a>
                </div> 
            </div> -->
        </div>
            
        <div class="table-responsive" style="height: 17.5rem; font-size:1.8vh;">
            <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0" >
            <thead>
                <tr>
                    <th>Kecamatan</th>
                    <th>Desa/Kelurahan</th>
                    <th>Bulan</th>
                    <th>Tahun</th>
                    <th>Jumlah DTKS Per-Jiwa</th>
                    <th>Jumlah DTKS Per-RUTA</th>
                    <th>Jumlah Aktif PBI </th>
                    <th>Jumlah Non-Aktif PBI </th>
                    <th>Jumlah BBL </th>
                    <th>Aksi</th>
            </thead>
            <tbody>
            </tbody>
        </div>
    </div>
    <script type="text/javascript">
    $(document).ready(function(){
        //ketika pilih kecamatan
        $('#kecamatan').on('change', function(){
            //ambil value dari id kecamatan     
            var kecId = this.value;
            console.log(kecId);
            $('#desa').html('');

            $.ajax({
                //kirim id ke controller getDesa untuk baca desa yang ada didalam kacamatan yang dipilih
                url: '{{ route('getDataDTKS') }}?id_kec='+kecId,
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
                                title: 'Data DTKS',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
                                }
                            },
                            {
                                //export pdf
                                extend: 'pdf',
                                text: 'Simpan PDF',
                                title: 'Data DTKS',
                                orientation: 'landscape',
                                messageTop: 'Data DTKS - Dinas Sosial Kota Banda Aceh',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8]
                                }
                            },
                            {
                                //export print
                                extend: 'print',
                                text: 'Cetak',
                                title: 'Data DTKS',
                                orientation: 'landscape',
                                messageTop: 'Data DTKS - Dinas Sosial Kota Banda Aceh',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
                                }
                            },
                            
                        ],
                        data: res.kecamatan,
                        columns: [
                            { 'data': 'nama_kec' },
                            { 'data': 'nama_desa' },
                            { 'data': 'nama_bulan' },
                            { 'data': 'tahun' },
                            { 'data': 'jiwa' },
                            { 'data': 'ruta' },
                            { 'data': 'jumlah_aktif' },
                            { 'data': 'jumlah_nonaktif' },
                            { 'data': 'jumlah_bbl' },
                            { 'data': "", "defaultContent": '<a class="btn btn-warning btn-sm" id="edit" href="{{ url('/editdtks?id_data=1')}}" role="button">Edit</a>'},

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
                url :'{{route('getDataDTKS')}}?id_kec='+kecId+'&id_desa='+desaId,
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
                                title: 'Data DTKS',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
                                }
                            },
                            {
                                //export pdf
                                extend: 'pdf',
                                text: 'Simpan PDF',
                                title: 'Data DTKS',
                                orientation: 'landscape',
                                messageTop: 'Data DTKS - Dinas Sosial Kota Banda Aceh',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
                                }
                            },
                            {
                                //export print
                                extend: 'print',
                                text: 'Cetak',
                                title: 'Data DTKS',
                                orientation: 'landscape',
                                messageTop: 'Data DTKS - Dinas Sosial Kota Banda Aceh',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
                                }
                            },
                        ],
                        data: res.kecamatan_desa,
                        columns: [
                            { 'data': 'nama_kec' },
                            { 'data': 'nama_desa' },
                            { 'data': 'nama_bulan' },
                            { 'data': 'tahun' },
                            { 'data': 'jiwa' },
                            { 'data': 'ruta' },
                            { 'data': 'jumlah_aktif' },
                            { 'data': 'jumlah_nonaktif' },
                            { 'data': 'jumlah_bbl' },
                            { 'data': "", "defaultContent": '<a class="btn btn-warning btn-sm" id="edit" href="{{ url('/editpmks?id_data=1')}}" role="button">Edit</a>'},

                        ]
                    });
                }
            });
        });

        //ketika pilih bulan
        $('#bulan').on('change', function(){
            var bulanId = this.value;
            console.log(bulanId);

            $.ajax({
                url :'{{route('getDataDTKS')}}?id_bulan='+bulanId,
                type :'get',
                success : function(res){
                    console.log(res.bulan);

                    var table = $('#tabel-data').DataTable({
                        destroy: true,
                        dom: 'Bfrtip',
                        buttons: [
                            {
                                //export excel
                                extend: 'excel',
                                text: 'Simpan Excel',
                                title: 'Data DTKS',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
                                }
                            },
                            {
                                //export pdf
                                extend: 'pdf',
                                text: 'Simpan PDF',
                                title: 'Data DTKS',
                                orientation: 'landscape',
                                messageTop: 'Data DTKS - Dinas Sosial Kota Banda Aceh',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
                                }
                            },
                            {
                                //export print
                                extend: 'print',
                                text: 'Cetak',
                                title: 'Data DTKS',
                                orientation: 'landscape',
                                messageTop: 'Data DTKS - Dinas Sosial Kota Banda Aceh',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
                                }
                            },
                        ],

                        data: res.bulan,
                        columns: [
                            { 'data': 'nama_kec' },
                            { 'data': 'nama_desa' },
                            { 'data': 'nama_bulan' },
                            { 'data': 'tahun' },
                            { 'data': 'jiwa' },
                            { 'data': 'ruta' },
                            { 'data': 'jumlah_aktif' },
                            { 'data': 'jumlah_nonaktif' },
                            { 'data': 'jumlah_bbl' },
                            { 'data': "", "defaultContent": '<a class="btn btn-warning btn-sm" id="edit" href="{{ url('/editpmks?id_data=1')}}" role="button">Edit</a>'},
                        ]
                    });
                }
            });
        });

        //ketika pilih tahun
        $('#tahun').on('change', function(){
            var tahunId = this.value;
            console.log(tahunId);

            $.ajax({
                url :'{{route('getDataDTKS')}}?id_tahun='+tahunId,
                type :'get',
                success : function(res){
                    console.log(res.tahun);

                    var table = $('#tabel-data').DataTable({
                        destroy: true,
                        dom: 'Bfrtip',
                        buttons: [
                            {
                                //export excel
                                extend: 'excel',
                                text: 'Simpan Excel',
                                title: 'Data DTKS',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
                                }
                            },
                            {
                                //export pdf
                                extend: 'pdf',
                                text: 'Simpan PDF',
                                title: 'Data DTKS',
                                orientation: 'landscape',
                                messageTop: 'Data DTKS - Dinas Sosial Kota Banda Aceh',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
                                }
                            },
                            {
                                //export print
                                extend: 'print',
                                text: 'Cetak',
                                title: 'Data DTKS',
                                orientation: 'landscape',
                                messageTop: 'Data DTKS - Dinas Sosial Kota Banda Aceh',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
                                }
                            },
                        ],

                        data: res.tahun,
                        columns: [
                            { 'data': 'nama_kec' },
                            { 'data': 'nama_desa' },
                            { 'data': 'nama_bulan' },
                            { 'data': 'tahun' },
                            { 'data': 'jiwa' },
                            { 'data': 'ruta' },
                            { 'data': 'jumlah_aktif' },
                            { 'data': 'jumlah_nonaktif' },
                            { 'data': 'jumlah_bbl' },
                            { 'data': "", "defaultContent": '<a class="btn btn-warning btn-sm" id="edit" href="{{ url('/editpmks?id_data=1')}}" role="button">Edit</a>'},
                        ]
                    });
                }
            });
        });

        //ketika pilih bulan lalu tahun
        $('#bulan').on('change', function(){
            $('#tahun' ).on('change', function(){
            var bulanId = bulan.value;
            var tahunId = tahun.value;
            console.log(bulanId);
            console.log(tahunId);

                $.ajax({
                    url :'{{route('getDataDTKS')}}?id_tahun='+tahunId+'&id_bulan='+bulanId,
                    type :'get',
                    success : function(res){
                        console.log(res.bulan_tahun);

                        var table = $('#tabel-data').DataTable({
                            destroy: true,
                            dom: 'Bfrtip',
                            buttons: [
                                {
                                    //export excel
                                    extend: 'excel',
                                    text: 'Simpan Excel',
                                    title: 'Data DTKS',
                                    exportOptions: {
                                        columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
                                    }
                                },
                                {
                                    //export pdf
                                    extend: 'pdf',
                                    text: 'Simpan PDF',
                                    title: 'Data DTKS',
                                    orientation: 'landscape',
                                    messageTop: 'Data DTKS - Dinas Sosial Kota Banda Aceh',
                                    exportOptions: {
                                        columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
                                    }
                                },
                                {
                                    //export print
                                    extend: 'print',
                                    text: 'Cetak',
                                    title: 'Data DTKS',
                                    orientation: 'landscape',
                                    messageTop: 'Data DTKS - Dinas Sosial Kota Banda Aceh',
                                    exportOptions: {
                                        columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
                                    }
                                },
                            ],

                            data: res.bulan_tahun,
                            columns: [
                                { 'data': 'nama_kec' },
                                { 'data': 'nama_desa' },
                                { 'data': 'nama_bulan' },
                                { 'data': 'tahun' },
                                { 'data': 'jiwa' },
                                { 'data': 'ruta' },
                                { 'data': 'jumlah_aktif' },
                                { 'data': 'jumlah_nonaktif' },
                                { 'data': 'jumlah_bbl' },
                                { 'data': "", "defaultContent": '<a class="btn btn-warning btn-sm" id="edit" href="{{ url('/editpmks?id_data=1')}}" role="button">Edit</a>'},
                            ]
                        });
                    }
                });
            });
        });

        //ketika piilh tahun lalu bulan
        $('#tahun' ).on('change', function(){
            $('#bulan').on('change', function(){
                var bulanId = bulan.value;
            var tahunId = tahun.value;
            console.log(bulanId);
            console.log(tahunId);

                $.ajax({
                    url :'{{route('getDataDTKS')}}?id_tahun='+tahunId+'&id_bulan='+bulanId,
                    type :'get',
                    success : function(res){
                        console.log(res.bulan_tahun);

                        var table = $('#tabel-data').DataTable({
                            destroy: true,
                            dom: 'Bfrtip',
                            buttons: [
                                {
                                    //export excel
                                    extend: 'excel',
                                    text: 'Simpan Excel',
                                    title: 'Data DTKS',
                                    exportOptions: {
                                        columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
                                    }
                                },
                                {
                                    //export pdf
                                    extend: 'pdf',
                                    text: 'Simpan PDF',
                                    title: 'Data DTKS',
                                    orientation: 'landscape',
                                    messageTop: 'Data DTKS - Dinas Sosial Kota Banda Aceh',
                                    exportOptions: {
                                        columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
                                    }
                                },
                                {
                                    //export print
                                    extend: 'print',
                                    text: 'Cetak',
                                    title: 'Data DTKS',
                                    orientation: 'landscape',
                                    messageTop: 'Data DTKS - Dinas Sosial Kota Banda Aceh',
                                    exportOptions: {
                                        columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
                                    }
                                },
                            ],

                            data: res.bulan_tahun,
                            columns: [
                                { 'data': 'nama_kec' },
                                { 'data': 'nama_desa' },
                                { 'data': 'nama_bulan' },
                                { 'data': 'tahun' },
                                { 'data': 'jiwa' },
                                { 'data': 'ruta' },
                                { 'data': 'jumlah_aktif' },
                                { 'data': 'jumlah_nonaktif' },
                                { 'data': 'jumlah_bbl' },
                                { 'data': "", "defaultContent": '<a class="btn btn-warning btn-sm" id="edit" href="{{ url('/editpmks?id_data=1')}}" role="button">Edit</a>'},
                            ]
                        });
                    }
                });
            });
        });

        //ketika pilih kec lalu bulan 
        $('#desa').on('change', function(){
            $('#bulan').on('change', function(){
                var desaId = desa.value;
                var bulanId = bulan.value;
                console.log(kecamatan.value, bulan.value);
                $.ajax({
                    url :'{{route('getDataDTKS')}}?id_desa='+desaId+'&id_bulan='+bulanId,
                    type :'get',
                    success : function(res){
                        console.log(res.desa_bulan);
                        var table = $('#tabel-data').DataTable({
                            destroy: true,
                            dom: 'Bfrtip',
                            buttons: [
                                {
                                    //export excel
                                    extend: 'excel',
                                    text: 'Simpan Excel',
                                    title: 'Data DTKS',
                                    exportOptions: {
                                        columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
                                    }
                                },
                                {
                                    //export pdf
                                    extend: 'pdf',
                                    text: 'Simpan PDF',
                                    title: 'Data DTKS',
                                    orientation: 'landscape',
                                    messageTop: 'Data DTKS - Dinas Sosial Kota Banda Aceh',
                                    exportOptions: {
                                        columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
                                    }
                                },
                                {
                                    //export print
                                    extend: 'print',
                                    text: 'Cetak',
                                    title: 'Data DTKS',
                                    orientation: 'landscape',
                                    messageTop: 'Data DTKS - Dinas Sosial Kota Banda Aceh',
                                    exportOptions: {
                                        columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
                                    }
                                },
                            ],

                            data: res.desa_bulan,
                            columns: [
                                { 'data': 'nama_kec' },
                                { 'data': 'nama_desa' },
                                { 'data': 'nama_bulan' },
                                { 'data': 'tahun' },
                                { 'data': 'jiwa' },
                                { 'data': 'ruta' },
                                { 'data': 'jumlah_aktif' },
                                { 'data': 'jumlah_nonaktif' },
                                { 'data': 'jumlah_bbl' },
                                { 'data': "", "defaultContent": '<a class="btn btn-warning btn-sm" id="edit" href="{{ url('/editpmks?id_data=1')}}" role="button">Edit</a>'},
                            ]
                        });
                    }
                });
            });
        });

        //ketika pilih bulan lalu kecamatan
        $('#bulan').on('change', function(){
            $('#kecamatan').on('change', function(){
                console.log(bulan.value, kecamatan.value);
                var kecId = kecamatan.value;
                var bulanId = bulan.value;
                console.log(kecamatan.value, bulan.value);

                $.ajax({
                    url :'{{route('getDataDTKS')}}?id_kec='+kecId+'&id_bulan='+bulanId,
                    type :'get',
                    success : function(res){
                        console.log(res.kec_bulan);
                        var table = $('#tabel-data').DataTable({
                            destroy: true,
                            dom: 'Bfrtip',
                            buttons: [
                                {
                                    //export excel
                                    extend: 'excel',
                                    text: 'Simpan Excel',
                                    title: 'Data DTKS',
                                    exportOptions: {
                                        columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
                                    }
                                },
                                {
                                    //export pdf
                                    extend: 'pdf',
                                    text: 'Simpan PDF',
                                    title: 'Data DTKS',
                                    orientation: 'landscape',
                                    messageTop: 'Data DTKS - Dinas Sosial Kota Banda Aceh',
                                    exportOptions: {
                                        columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
                                    }
                                },
                                {
                                    //export print
                                    extend: 'print',
                                    text: 'Cetak',
                                    title: 'Data DTKS',
                                    orientation: 'landscape',
                                    messageTop: 'Data DTKS - Dinas Sosial Kota Banda Aceh',
                                    exportOptions: {
                                        columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
                                    }
                                },
                            ],

                            data: res.kec_bulan,
                            columns: [
                                { 'data': 'nama_kec' },
                                { 'data': 'nama_desa' },
                                { 'data': 'nama_bulan' },
                                { 'data': 'tahun' },
                                { 'data': 'jiwa' },
                                { 'data': 'ruta' },
                                { 'data': 'jumlah_aktif' },
                                { 'data': 'jumlah_nonaktif' },
                                { 'data': 'jumlah_bbl' },
                                { 'data': "", "defaultContent": '<a class="btn btn-warning btn-sm" id="edit" href="{{ url('/editpmks?id_data=1')}}" role="button">Edit</a>'},
                            ]
                        });
                    }
                });
            });
        });
        
    });
    
    </script>

@endsection