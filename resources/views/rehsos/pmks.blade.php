@extends('template')
@section('title','PMKS')

@section('content')
    <div class="card w-75">
        <div class="card-body" style="margin-bottom: 10px;">
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
                                <option value="" >Pilih Kecamatan</option>
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
                                <option  value="">Pilih Bulan</option>
                                @foreach($bulan as $b)
                                <option value="{{$b->id_bulan}}">{{$b->nama_bulan}}</option>
                                @endforeach($bulan as $b)
                            </select>
                    </div>

                    <div class="col-auto" style="width:170px"> 
                        <label class="fw-bold" style="margin-bottom: 0.5rem">Tahun</label>
                            <select class="form-select" id="tahun" style="font-size:2.2vh;">
                                <option value="">Pilih Tahun</option>
                                @foreach($tahun as $t)
                                <option value="{{$t->id_tahun}}">{{$t->tahun}}</option>
                                @endforeach($tahun as $t)
                            </select>
                    </div>

                    

                    <div class="col-auto" style="width:170px ; margin-left:100px"> 
                    
                    </div>
                    <!-- <div  class="row" style="margin-top: 0.8rem; margin-left: 47rem;">
                        <div class="col-auto" >
                            <a class="btn btn-danger" id="edit-btn" href="{{ url('/editpmks')}}" role="button">Edit</a>
                        </div> 
                        <div class="col-auto" >
                            <a class="btn btn-primary" id="Cari-btn" href="{{ url('/caripmks')}}" role="button">Cari</a>
                        </div> 
                    </div> -->

                </div>
            </div>
        </div>
    </div>

    <div id="card2" class="card w-75" style="margin-top: 5px;">
        <div class="card-body">
            <!-- <div  class="row" style="margin-top: 0.2rem; margin-left: 43rem; margin-bottom: 0.2rem">
                <div class="col-auto" >
                    <a class="btn btn-warning" id="edit-btn" href="#" role="button">Cetak PDF</a>
                </div> 
                    <div class="col-auto" >
                        <a class="btn btn-success" id="Cari-btn" href="#" role="button">Cetak Excel</a>
                    </div> 
                </div>
            </div> -->
            
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
        //ketika pilih kecamatan
        $('#kecamatan').on('change', function(){
            //ambil value dari id kecamatan     
            var kecId = this.value;
            console.log(kecId);
            $('#desa').html('');

            $.ajax({
                //kirim id ke controller getDesa untuk baca desa yang ada didalam kacamatan yang dipilih
                url: '{{ route('getDataPMKS') }}?id_kec='+kecId,
                type :'get',             
                success : function(res){
                    $('#desa').html('<option value="">Pilih Desa</option> '); 

                    $.each(res.desa, function (key, value) {                                             
                        // buat option untuk pilih desa (desa berada di kecamatan yang  dipilih)
                        $('#desa').append('<option value="'+ value.id_desa + '">' + value.nama_desa + '</option>');                  
                    });

                    console.log(res.kecamatan);
                    //menampilkan data pmks (hanya kecamatan yang dipilih)
                    var table = $('#tabel-data').DataTable({
                        destroy: true,
                        data: res.kecamatan,
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
                            { 'data': 'total' },
                            { 'data': "","defaultContent": '<a class="btn btn-warning btn-sm" id="edit" href="{{ url('/editpmks?id_data=1')}}" role="button">Edit</a>'},

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
                url :'{{route('getDataPMKS')}}?id_kec='+kecId+'&id_desa='+desaId,
                type :'get',
                success : function(res){
                    console.log(res.kecamatan_desa);

                    var table = $('#tabel-data').DataTable({
                        destroy: true,
                        data: res.kecamatan_desa,
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
                            { 'data': 'total' },
                            { 'data': "", "defaultContent": '<a href="#" class="link-primary">Edit</a>'},

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
                url :'{{route('getDataPMKS')}}?id_bulan='+bulanId,
                type :'get',
                success : function(res){
                    console.log(res.bulan);

                    var table = $('#tabel-data').DataTable({
                        destroy: true,
                        data: res.bulan,
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
                            { 'data': 'total' },
                            { 'data': "", "defaultContent": "<button  class='btn btn-warning btn-sm' onclick='edititem();'>Edit</button>" },

                        ]
                    }); 
                }
            });
        });             

         //ketik pilih tahunn
         $('#tahun').on('change', function(){
            var tahunId = this.value;
            console.log(tahunId);

            $.ajax({
                url :'{{route('getDataPMKS')}}?id_tahun='+tahunId,
                type :'get',
                success : function(res){
                    console.log(res.tahun);

                    var table = $('#tabel-data').DataTable({
                        destroy: true,
                        data: res.tahun,
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
                            { 'data': 'total' },
                            { 'data': "", "defaultContent": "<button  class='btn btn-warning btn-sm' onclick='edititem();'>Edit</button>" },
                        ]
                    }); 
                }
            });      
         });
        // ketika pilih bulan lalu tahun
        $('#bulan').on('change', function(){
            $('#tahun' ).on('change', function(){
            var bulanId = bulan.value;
            var tahunId = tahun.value;
            console.log(bulanId);
            console.log(tahunId);
                $.ajax({
                    url :'{{route('getDataPMKS')}}?id_tahun='+tahunId+'&id_bulan='+bulanId,
                    type :'get',
                    success : function(res){
                        console.log(res.bulan_tahun);

                        var table = $('#tabel-data').DataTable({
                            destroy: true,
                            data: res.bulan_tahun,
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
                                { 'data': 'total' },
                                { 'data': "", "defaultContent": "<button  class='btn btn-warning btn-sm' onclick='edititem();'>Edit</button>" },
                            ]
                        }); 
                    }
                });      
            });
        });

        // ketika pilih tahun lalu bulan
        $('#tahun' ).on('change', function(){
            $('#bulan').on('change', function(){
            var bulanId = bulan.value;
            var tahunId = tahun.value;
            console.log(bulanId);
            console.log(tahunId);
                $.ajax({
                    url :'{{route('getDataPMKS')}}?id_tahun='+tahunId+'&id_bulan='+bulanId,
                    type :'get',
                    success : function(res){
                        console.log(res.bulan_tahun);

                        var table = $('#tabel-data').DataTable({
                            destroy: true,
                            data: res.bulan_tahun,
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
                                { 'data': 'total' },
                                { 'data': "", "defaultContent": "<button  class='btn btn-warning btn-sm' onclick='edititem();'>Edit</button>" },
                            ]
                        }); 
                    }
                });      
            });
        });

        // ketika pilih kec lalu bulan
        $('#desa').on('change', function(){
            $('#bulan').on('change', function(){
                var desaId = desa.value;
                var bulanId = bulan.value;
                console.log(kecamatan.value, bulan.value);
                $.ajax({
                    url :'{{route('getDataPMKS')}}?id_desa='+desaId+'&id_bulan='+bulanId,
                    type :'get',
                    success : function(res){
                        console.log(res.desa_bulan);

                        var table = $('#tabel-data').DataTable({
                            destroy: true,
                            data: res.desa_bulan,
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
                                { 'data': 'total' },
                                { 'data': "", "defaultContent": '<a href="#" class="link-primary">Edit</a>' },
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
                    url :'{{route('getDataPMKS')}}?id_kec='+kecId+'&id_bulan='+bulanId,
                    type :'get',
                    success : function(res){
                        console.log(res.kec_bulan);

                        var table = $('#tabel-data').DataTable({
                            destroy: true,
                            data: res.kec_bulan,
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
                                { 'data': 'total' },
                                { 'data': "", "defaultContent": "<button  class='btn btn-warning btn-sm' onclick='edititem();'>Edit</button>" },
                            ]
                        }); 
                    }
                });
            });
        });

        //ketika pilih kec lalu tahun
        $('#kecamatan').on('change', function(){
            $('#tahun').on('change', function(){
                console.log(kecamatan.value, tahun.value);
                var kecId = kecamatan.value;
                var tahunId = tahun.value;

                $.ajax({
                    url :'{{route('getDataPMKS')}}?id_kec='+kecId+'&id_tahun='+tahunId,
                    type :'get',
                    success : function(res){
                        console.log(res.kec_tahun);

                        var table = $('#tabel-data').DataTable({
                            destroy: true,
                            data: res.kec_tahun,
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
                                { 'data': 'total' },
                                { 'data': "", "defaultContent": "<button  class='btn btn-warning btn-sm' onclick='edititem();'>Edit</button>" },
                            ]
                        }); 
                    }
                });
            });
        });

        //ketika pilih tahun lalu kec
        $('#tahun').on('change', function(){
            $('#kecamatan').on('change', function(){
                console.log(tahun.value, kecamatan.value);

                $.ajax({
                    url :'{{route('getDataPMKS')}}?id_kec='+kecId+'&id_tahun='+tahunId,
                    type :'get',
                    success : function(res){
                        console.log(res.kec_tahun);

                        var table = $('#tabel-data').DataTable({
                            destroy: true,
                            data: res.kec_tahun,
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
                                { 'data': 'total' },
                                { 'data': "", "defaultContent": "<button  class='btn btn-warning btn-sm' onclick='edititem();'>Edit</button>" },
                            ]
                        }); 
                    }
                });
            });
        });

        //kec->desa->bulan 
        $('#kecamatan').on('change', function(){
            $('#desa').on('change', function(){
                $('#bulan').on('change', function(){
                    var kecId = kecamatan.value;
                    var desaId = desa.value;
                    var bulanId = bulan.value;

                    console.log(kecamatan.value, desa.value, bulan.value);
                    //res.kec_desa_bulan
                    $.ajax({
                        url :'{{route('getDataPMKS')}}?id_kec='+kecId+'&id_desa='+desaId+'&id_bulan='+bulanId,
                        type :'get',
                        success : function(res){
                            console.log(res.desa_bulan);

                            var table =  $('#tabel-data').DataTable({
                                destroy:true,
                                data: res.desa_bulan,
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
                                    { 'data': 'total' },
                                    { 'data': "", "defaultContent": '<a href="#" class="link-primary">Edit</a>' },
                                ]
                            }); 
                        }
                    });
                });
            });
        });

        //kec->desa->tahun
        $('#kecamatan').on('change', function(){
            $('#desa').on('change', function(){
                $('#tahun').on('change', function(){
                    console.log(kecamatan.value, desa.value, tahun.value);
                    //res.kec_desa_tahun
                    var kecId = kecamatan.value;
                    var desaId = desa.value;
                    var tahunId = tahun.value;

                    $.ajax({
                    url :'{{route('getDataPMKS')}}?id_kec='+kecId+'&id_desa='+desaId+'&id_tahun='+tahunId,
                    type :'get',
                    success : function(res){
                        console.log(res.desa_tahun);

                        var table = $('#tabel-data').DataTable({
                            destroy: true,
                            data: res.desa_tahun,
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
                                { 'data': 'total' },
                                { 'data': "", "defaultContent": "<button  class='btn btn-warning btn-sm' onclick='edititem();'>Edit</button>" },
                            ]
                        }); 
                    }
                    });
                    

                });
            });
        });

        //ketika pilih kec->desa->bulan->tahun
        $('#kecamatan').on('change', function(){
            $('#desa').on('change', function(){
                $('#bulan').on('change', function(){
                    $('#tahun').on('change', function(){
                        console.log(kecamatan.value, desa.value, bulan.value, tahun.value);
                        var kecId = kecamatan.value;
                        var desaId = desa.value;
                        var tahunId = tahun.value;
                        var bulanId = bulan.value;

                        //res.kec_desa_bulan_tahun
                        $.ajax({
                        url :'{{route('getDataPMKS')}}?id_kec='+kecId+'&id_desa='+desaId+'&id_bulan='+bulanId+'&id_tahun'+tahunId,
                        type :'get',
                        success : function(res){
                            console.log(res.desa_bulan_tahun);

                            var table = $('#tabel-data').DataTable({
                                destroy: true,
                                data: res.desa_bulan_tahun,
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
                                    { 'data': 'total' },
                                    { 'data': "", "defaultContent": "<button  class='btn btn-warning btn-sm' onclick='edititem();'>Edit</button>" },
                                ]
                            }); 
                        }
                    });
                    });
                });
            });
        });

         //ketika pilih kec->desa->tahun->bulan
         $('#kecamatan').on('change', function(){
            $('#desa').on('change', function(){
                $('#tahun').on('change', function(){
                    $('#bulan').on('change', function(){
                        console.log(kecamatan.value, desa.value, bulan.value, tahun.value);
                        var kecId = kecamatan.value;
                        var desaId = desa.value;
                        var tahunId = tahun.value;
                        var bulanId = bulan.value;
                        $.ajax({
                        url :'{{route('getDataPMKS')}}?id_kec='+kecId+'&id_desa='+desaId+'&id_bulan='+bulanId+'&id_tahun'+tahunId,
                        type :'get',
                        success : function(res){
                            console.log(res.desa_bulan_tahun);

                            var table = $('#tabel-data').DataTable({
                                destroy: true,
                                data: res.desa_bulan_tahun,
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
                                    { 'data': 'total' },
                                    { 'data': "", "defaultContent": "<button  class='btn btn-warning btn-sm' onclick='edititem();'>Edit</button>" },
                                ]
                            }); 
                        }
                    });
                    });
                });
            });
        });
        
    });

</script>

@endsection