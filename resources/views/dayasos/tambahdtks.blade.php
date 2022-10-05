@extends('template')
@section('title','Tambah Data DTKS')

@section('content')
<div class="card w-75">
        <div class="card-body" >
            <div class="row"  style="margin-left:-1rem;">
                <div class="col-auto" style="margin-top: 0.3rem;">
                    <a href="{{ url('/dtks')}}" class="icon"><i class= "fas fa-chevron-left fa-lg"  style="color:black;"> </i></a>
                </div>
                <div class="col-auto">
                    <h4 class="fw-bold">Tambah Data DTKS</h4>
                </div>
            </div>

            <form action="/tambahdtks/store" method="post">
            {{ csrf_field() }}
                <div class="container" style="margin-top: 1rem;">
                    <div class="row" style="margin-left: 0px;">
                        <div class="col-auto" style="width:290px">
                            <label style="font-size:2.2vh; margin-left: 0px; margin-bottom: 0.3rem">Kecamatan</label>
                                <select class="form-select" id="kecamatan" name="kecamatan" style="font-size:2.2vh;">
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

                <div class="container" style="margin-top: 2rem; margin-left:15px">
                    <h6>Jumlah DTKS</h6>
                    <hr width="850px" size="4px" margin-top="0px">
                </div>

                <div class="container">
                    <div class="row" style="margin-left: 0px;">

                        <div class="col-auto" style="font-size:2.2vh; margin-left: 0.2rem; width:290px">
                            <label style="margin-bottom: 0.2rem">Jiwa</label>
                            <input type="number" name="jiwa" id="jiwa" class="form-control" placeholder="0" required>   
                        </div>

                        <div class="col-auto" style="font-size:2.2vh; margin-left: 0.2rem; width:290px">
                            <label style="margin-bottom: 0.2rem">Ruta</label>
                            <input type="number" name="ruta" id="ruta" class="form-control" placeholder="0" required>   
                        </div>

                    </div>
                </div>

                <div class="container" style="margin-top: 3rem; margin-left:15px">
                    <h6 >Jumlah PBI</h6>
                    <hr width="850px" size="4px" margin-top="0px">
                </div>

                <div class="container">
                    <div class="row" style="margin-left: 0px;">

                        <div class="col-auto" style="font-size:2.2vh; margin-left: 0.2rem; width:290px; margin-bottom: 1.8rem; ">
                            <label style="margin-bottom: 0.2rem">Jumlah Aktif</label>
                            <input type="number" name="aktif" id="aktif" class="form-control" placeholder="0" required>   
                        </div>

                        <div class="col-auto" style="font-size:2.2vh; margin-left: 0.2rem; width:290px margin-bottom: 1.8rem; ">
                            <label style="margin-bottom: 0.2rem">Jumlah Non Aktif</label>
                            <input type="number" name="nonaktif" id="nonaktif" class="form-control" placeholder="0" required>   
                        </div>

                        <div class="col-auto" style="font-size:2.2vh; margin-left: 0.2rem; width:290px; margin-bottom: 1.8rem; ">
                         <label style="margin-bottom: 0.2rem">Jumlah BBL</label>
                            <input type="number" name="bbl" id="bbl" class="form-control" placeholder="0" required>   
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
                    $('#desa').html('<option value="">Pilih Desa</option> '); 

                    $.each(res.desa, function (key, value) {                                             
                        // buat option untuk pilih desa (desa berada di kecamatan yang  dipilih)
                        $('#desa').append('<option value="'+ value.id_desa + '">' + value.nama_desa + '</option>');                  
                    });
                }
            });
        });
    });

</script>
@endsection