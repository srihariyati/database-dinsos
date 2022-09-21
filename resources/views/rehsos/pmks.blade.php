@extends('template')
@section('title','PMKS')

@section('content')
    <div class="card w-75">
        <div class="card-body">
            <div class="container" >
                <div class="row" style="margin-left: -40px;">
                    <div class="col-auto">
                        <h4 class="fw-bold" >Data Rekapan PMKS</h4>
                    </div>
        
                    <div class="col-auto" >
                            <a class="btn btn-success" id="tambah" href="{{ url('/tambahpmks')}}" role="button">Tambah</a>
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

                    <!-- <div  class="row" style="margin-top: 0.8rem; margin-left: 47rem;">
                        <div class="col-auto" >
                            <a class="btn btn-danger" id="edit-btn" href="#" role="button">Edit</a>
                        </div> 
                        <div class="col-auto" >
                            <a class="btn btn-primary" id="Cari-btn" href="#" role="button">Cari</a>
                        </div> 
                    </div> -->

                </div>
            </div>
        </div>
    </div>

    <div class="card w-75" style="margin-top: 5px;">
        <div class="card-body">
            <div  class="row" style="margin-top: 0.2rem; margin-left: 43rem; margin-bottom: 0.2rem">
                <div class="col-auto" >
                    <a class="btn btn-warning" id="edit-btn" href="#" role="button">Cetak PDF</a>
                </div> 
                    <div class="col-auto" >
                        <a class="btn btn-success" id="Cari-btn" href="#" role="button">Cetak Excel</a>
                    </div> 
                </div>
            </div>
            
        <div class="table-responsive" style="height: 17.5rem; font-size:1.5vh;">
            <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0" >
            <thead>
                <tr>
                    <th>Kecamatan</th>
                    <th>Desa/Kelurahan</th>
                    <th>Bulan</th>
                    <th>Tahun</th>
                    <th>GLD</th>
                    <th>PENG</th>
                    <th>PUNK</th>
                    <th>ANJAL</th>
                    <th>OT</th>
                    <th>AT</th>
                    <th>PSK</th>
                    <th>WARIA</th>
                    <th>PRIA</th>
                    <th>WANITA</th>
                    <th>TOTAL</th>
                    <th>Aksi</th>
            </thead>

            <tbody>
            </tbody>
        </div>
    </div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#kecamatan').on('change', function(){
            //ambil value dari id kecamatan     
            var kecId = this.value;
            console.log(kecId);
            $('#desa').html('');

            $.ajax({
                //kirim id ke controller getDesa untuk baca desa yang ada didalam kacamatan yang dipilih
                url: '{{ route('getDesa') }}?id_kec='+kecId,
                type :'get',             
                success : function(res){
                    $('#desa').html('<option value="">Pilih Desa</option>'); 

                    $.each(res.desa, function (key, value) {                                             
                        // buat option untuk pilih desa (desa berada di kecamatan yang  dipilih)
                        $('#desa').append('<option value="'+ value.id_desa + '">' + value.nama_desa + '</option>');                  
                        
                    });
                    console.log(res.datapmks);

                    $('#tabel-data').DataTable({
                        destroy: true,
                        data: res.datapmks,
                        columns: [
                            { 'data': 'nama_kec' },
                            { 'data': 'nama_desa' },
                            { 'data': 'nama_bulan' },
                            { 'data': 'tahun' },
                            { 'data': 'gelandangan' },
                            { 'data': 'pengemis' },
                            { 'data': 'punk' },
                            { 'data': 'anak_jalanan' },
                            { 'data': 'orang_terlantar' },
                            { 'data': 'anak_terlantar' },
                            { 'data': 'psk' },
                            { 'data': 'waria' },
                            { 'data': 'pria' },
                            { 'data': 'wanita' },
                            { 'data': 'id_data' },
                            { 'data': "", "defaultContent": "<button  class='btn btn-warning btn-sm' onclick='edititem();'>Edit</button>" },

                        ]
                    });
        
        // tampilkan datatables untuk data dimana kec

       

        // $('#tabel-data').DataTable( {
        // "ajax": {
        //     "url":  "{{ action('PmksController@getDataKec') }}",
        //     "type": "GET",
        //     "data": {
        //              "id_kec": kecId,
        //         },
        //     "cache": true,
        //     "datatype": 'json',
        //     "success": function (data) {
        //         console.log(data);
        //     },
        //     "complete": function(xhr, status){
        //         console.log(status);
        //     },
        //     //masukkan data ke datatables
        //     },
        // });                    
                }
            });
        });

        // cari data
        $("#cari-btn").click(function(){
            var kecId = document.getElementById("kecamatan").value;
            var desaId = document.getElementById("desa").value;
            var bulanId = document.getElementById("bulan").value;
            var tahunId = document.getElementById("tahun").value;

            console.log(kecId);
            console.log(desaId);
            console.log(bulanId);
            console.log(tahunId);

            $.ajax({
                url: '{{ route('getDataPMKS') }}?id_kec='+kecId+'&id_desa='+desaId+'&id_bulan='+bulanId+'&tahun='+tahunId,
                type :'get',
                success : function(res){
                    $.each(res, function (key, value) {
                        console.log("bisa ni");
                        

                        // // $('#data-pmks').html('<div id="card-satu"><div class="col-auto"><a href="" id="excel-btn" class="tombol btn-group text-white fw-bold form-control btn-lg mt-3" style="background-color:#1CCE2E; text-decoration: none; padding: 1vh 3vh;"> Cetak Excel </a></div></div>'); 
                        // // $('#card-satu').append('<h1>'+ value.id_data + ','+value.id_tahun+'</h1>');


                        // var markup = "<tr><td>" + value.id_data + "</td><td>" + value.id_tahun + "</td></tr>";
                        // $("table tbody").append(markup);
                        console.log(value.id_data);
                    });
                },
                error :function(error){
                    alert('ada yang salah');
                }
            });
            
        });
    });
</script>

@endsection