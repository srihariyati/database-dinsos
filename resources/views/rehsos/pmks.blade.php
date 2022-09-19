@extends('template')
@section('title','PMKS')

@section('content')
    <div class="card w-75">
        <div class="card-body">
        <h5 class="card-title">Data Rekapan PMKS</h5>
        
            <div class="col-auto" >
                <a class="btn btn-success" id="tambah" href="{{ url('/tambahpmks')}}" role="button">Tambah</a>
            </div>

            
            <label class="fw-bold" style="font-size:2.2vh; margin-left: 0px; margin-bottom: 0.5rem">Kecamatan</label>
                <select class="form-select" id="kecamatan" style="font-size:2.2vh;">
                    <option selected >Pilih Kecamatan</option>
                        @foreach ($kecamatan as $kec)
                        <option value="{{$kec->id_kec}}">{{$kec->nama_kec}}</option>
                        @endforeach ($kecamatan as $kec)                              
                </select>

           
            <label class="fw-bold" style="margin-bottom: 0.5rem;">Desa/Kelurahan</label>
                <select class="form-select" id="desa" style="font-size:2.2vh;">
                    <option value="">Pilih Desa</option>
                </select>

            <label class="fw-bold" style="margin-bottom: 0.5rem">Bulan</label>
                <select class="form-select" id="bulan" style="font-size:2.2vh;">
                    <option selected>Pilih Bulan</option>
                    @foreach($bulan as $b)
                    <option value="{{$b->id_bulan}}">{{$b->nama_bulan}}</option>
                    @endforeach($bulan as $b)
                </select>

            <label class="fw-bold" style="margin-bottom: 0.5rem">Tahun</label>
                <select class="form-select" id="tahun" style="font-size:2.2vh;">
                    <option selected>Pilih Tahun</option>
                    @foreach($tahun as $t)
                    <option value="{{$t->id_tahun}}">{{$t->tahun}}</option>
                    @endforeach($tahun as $t)
                </select>

            <div class="col-auto" >
                <br><a class="btn btn-danger" id="edit-btn" href="#" role="button">Edit</a>
                <a class="btn btn-primary" id="Cari-btn" href="#" role="button">Cari</a>
            </div>            
        </div>
    </div>

   <div class="card w-75">
        <div class="card-body">
        <h5 class="card-title">Data .......</h5>
        </div>
    </div>

        



            <!-- <div id="data" class="row">
                <div class="col-auto" style="margin-top: 20px;">
                    <h4 class="fw-bold" style="margin-left: 0.7rem;">Data Rekapan PMKS</h4>
                </div>
                        
                <div class="col-auto" >
                    <a href="{{ url('/tambahpmks')}}" id="tambah" class="tombol btn-group text-white fw-bold form-control btn-lg mt-3" style="background-color: #1CCE2E; text-decoration: none; padding:1vh;"> Tambah </a>
                </div> -->

                <!-- <div class="container" style="margin-top: 2rem;">
                    <div class="row" style="margin-left: 0px;">
                       <div class="col-auto" style="width:290px">
                            <label class="fw-bold" style="font-size:2.2vh; margin-left: 0px; margin-bottom: 0.5rem">Kecamatan</label>
                                <select class="form-select" id="kecamatan" style="font-size:2.2vh;">
                                    <option selected >Pilih Kecamatan</option>
                                    @foreach ($kecamatan as $kec)
                                    <option value="{{$kec->id_kec}}">{{$kec->nama_kec}}</option>
                                    @endforeach ($kecamatan as $kec)                              
                                </select>
                        </div> --> 

                        <!-- <div class="col-auto" style="font-size:2.2vh; margin-left: 0.5rem; width:290px">
                            <label class="fw-bold" style="margin-bottom: 0.5rem;">Desa/Kelurahan</label>
                                <select class="form-select" id="desa" style="font-size:2.2vh;">
                                <option value="">Pilih Desa</option>
                                </select>
                        </div> -->

                        <!-- <div class="col-auto" style="font-size:2.2vh; margin-left: 0.5rem; width:170px">
                            <label class="fw-bold" style="margin-bottom: 0.5rem">Bulan</label>
                                <select class="form-select" id="bulan" style="font-size:2.2vh;">
                                    <option selected>Pilih Bulan</option>
                                    @foreach($bulan as $b)
                                    <option value="{{$b->id_bulan}}">{{$b->nama_bulan}}</option>
                                    @endforeach($bulan as $b)
                                </select>
                        </div> -->

                        <!-- <div class="col-auto" style="font-size:2.2vh; margin-left: 0.5rem; width:170px">
                            <label class="fw-bold" style="margin-bottom: 0.5rem">Tahun</label>
                                <select class="form-select" id="tahun" style="font-size:2.2vh;">
                                    <option selected>Pilih Tahun</option>
                                    @foreach($tahun as $t)
                                    <option value="{{$t->id_tahun}}">{{$t->tahun}}</option>
                                    @endforeach($tahun as $t)
                                </select>
                        </div>
                    </div> -->

                    
            </div>
        </div>
</div>
        
       
<script type="text/javascript">
    $(document).ready(function(){
        $('#dtHorizontalVerticalExample').DataTable({
            "scrollX": true,
            "scrollY": 200,
        });
        $('.dataTables_length').addClass('bs-select');

        $('#kecamatan').on('change', function(){
            //ambil value dari id kecamatan
            var kecId = this.value;
            $('#desa').html('');

            $.ajax({
                //kirim id ke controller
                url: '{{ route('getDesa') }}?id_kec='+kecId,
                type :'get',               
                success : function(res){
                    $('#desa').html('<option value="">Pilih Desa</option>');                 
     
                    $.each(res.desa, function (key, value) {
                        console.log("ini id kec :"+kecId);
                        console.log(value);
                        console.log(res);
                        console.log(value.id_desa, value.nama_desa);

                        // buat option untuk pilih desa
                        $('#desa').append('<option value="'+ value.id_desa + '">' + value.nama_desa + '</option>');                  
                        
                    });
                     // tampilkan dat yang kecamatannya dipilih

                    $.each(res.datapmks, function(key, value){
                        console.log(value.id_data);

                    });
                    
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