@extends('template')
@section('title','Tambah Data Bantuan Bencana')

@section('content')
    <div class="card w-75">
        <div class="card-body" >
            <div class="row"  style="margin-left:-1rem;">
                <div class="col-auto" style="margin-top: 0.3rem;">
                    <a href="{{ url('/bencana')}}" class="icon"><i class= "fas fa-chevron-left fa-lg"  style="color:black;"> </i></a>
                </div>
                <div class="col-auto">
                    <h4 class="fw-bold">Tambah Data Bantuan Sosial Masa Tanggap Darurat Bencana</h4>
                </div>
            </div>

            <form action="/tambahbencana/store" method="post">
            {{ csrf_field() }}
                <div class="container" style="margin-top: 1rem;">
                    <div class="row" style="margin-left: 0px;">
                        <div class="col-auto" style="width:290px">
                            <label style="font-size:2.2vh; margin-left: 0px; margin-bottom: 0.3rem">Kecamatan</label>
                                <select class="form-select" id="kecamatan"name="kecamatan" style="font-size:2.2vh;">
                                    <option selected >Pilih Kecamatan</option>
                                    @foreach ($kecamatan as $kec)
                                    <option value="{{$kec->id_kec}}">{{$kec->nama_kec}}</option>
                                    @endforeach ($kecamatan as $kec)    
                                </select>
                        </div>

                        <div class="col-auto" style="font-size:2.2vh; margin-left: 0.2rem; width:290px">
                            <label style="margin-bottom: 0.3rem">Desa/Kelurahan</label>
                                <select class="form-select" id="desa" name="desa" style="font-size:2.2vh;">
                                    <option selected>Pilih Desa/Kelurahan</option>
                                </select>
                        </div>

                        <div class="col-auto" style="font-size:2.2vh; margin-left: 0.2rem; width:140px">
                            <label style="margin-bottom: 0.3rem">Bulan</label>
                                <select class="form-select" id="bulan" name="bulan" style="font-size:2.2vh;">
                                    <option  value="">Pilih Bulan</option>
                                    @foreach($bulan as $b)
                                    <option value="{{$b->id_bulan}}">{{$b->nama_bulan}}</option>
                                    @endforeach($bulan as $b)
                            </select>
                        </div>

                        <div class="col-auto" style="font-size:2.2vh; margin-left: 0.2rem; width:140px">
                            <label style="margin-bottom: 6px">Tahun</label>
                                <select class="form-select" id="tahun" name="tahun" style="font-size:2.2vh;">
                                    <option selected>Pilih Tahun</option>
                                    @foreach($tahun as $t)
                                    <option value="{{$t->id_tahun}}">{{$t->tahun}}</option>
                                    @endforeach($tahun as $t)
                                </select>
                        </div>
                    </div>
                </div>

                <div class="container" style="margin-top: 2rem;">
                    <div class="row" style="margin-left: 0px;">
                        <div class="col-auto" style="font-size:2.2vh; margin-left: 0.2rem; width:290px">
                            <label style="margin-bottom: 0.2rem">Tanggal Terjadi Bencana</label>
                            <input type="date" name="tgl" id="tgl" class="form-control" placeholder="0" required>   
                        </div>

                        <div class="col-auto" style="width:290px">
                            <label style="font-size:2.2vh; margin-left: 0px; margin-bottom: 0.2rem">Jenis Bencana</label>
                            <select class="form-select" id="jenis_bencana" name="jenis_bencana" style="font-size:13px;">
                                    <option selected >Pilih Jenis Bencana</option>
                                </select>
                        </div>

                        <div class="col-auto" style="font-size:2.2vh; margin-left: 0.2rem; width:290px">
                            <label style="margin-bottom: 0.2rem">Sumber Dana</label>
                            <select class="form-select" id="sumber_dana" name="sumber_dana" style="font-size:13px;">
                                    <option selected>Pilih Sumber Dana</option>
                            </select>
                        </div>

                        <div class="col-auto" style="font-size:2.2vh; margin-left: 0.2rem; width:290px; margin-top : 2rem;">
                            <label style="margin-bottom: 0.2rem">Total Penerima (KK)</label>
                            <input type="number" name="penerima" id="penerima" class="form-control" placeholder="0" required>   
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row" style="margin-left: 48.5rem;">
                        <div class="col-auto">
                            <button class="btn btn-success" type="submit"> Simpan </button>
                        </div>

                    </div>
                </div>

            </form>
           
        </div>

    </div>
<script>
     $(document).ready(function(){
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
                    //$('#desa').html('<option value="">Pilih Desa</option> '); 

                    $.each(res.desa, function (key, value) {                                             
                        // buat option untuk pilih desa (desa berada di kecamatan yang  dipilih)
                        $('#desa').append('<option value="'+ value.id_desa + '">' + value.nama_desa + '</option>');                  
                    });
                    $.each(res.sumberdana, function (key, value) {                                             
                        $('#sumber_dana').append('<option value="'+ value.id_sumber_dana + '">' + value.sumber_dana + '</option>');                  
                    });
                    $.each(res.jenisbencana, function (key, value) {                                             
                        $('#jenis_bencana').append('<option value="'+ value.id_bencana + '">' + value.jenis_bencana + '</option>');                  
                    });
                }
            });
        });
    });
</script>
@endsection