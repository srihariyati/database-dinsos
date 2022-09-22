@extends('template')
@section('title','Edit Data PMKS')

@section('content')
    <div class="card w-75">
        <div class="card-body" >
            <div class="row"  style="margin-left:-1rem;">
                <div class="col-auto" style="margin-top: 0.3rem;">
                    <a href="{{ url('/pmks')}}" class="icon"><i class= "fas fa-chevron-left fa-lg"  style="color:black;"> </i></a>
                </div>
                <div class="col-auto">
                    <h4 class="fw-bold">Edit Data PMKS</h4>
                </div>

                <form action="/editpmks/update" method="post">
                {{ csrf_field() }}
                <div class="container" style="margin-top: 1rem;">
                    <div class="row" style="margin-left: 0px;">
                        <div class="col-auto" style="width:290px">
                            <label style="font-size:2.2vh; margin-left: 0px; margin-bottom: 0.3rem">Kecamatan</label>
                                <select class="form-select" id="kecamatan" name="kecamatan" style="font-size:2.2vh;">
                                @foreach($datapmks as $dp)
                                <option value="{{$dp->id_kec}}" selected >{{$dp->nama_kec}}</option>
                                
                                    @foreach ($kecamatan as $kec)
                                    <option value="{{$kec->id_kec}}">{{$kec->nama_kec}}</option>
                                    @endforeach ($kecamatan as $kec)                              
                            </select>
                        </div>

                        <div class="col-auto" style="font-size:2.2vh; margin-left: 0.2rem; width:290px">
                            <label style="margin-bottom: 0.3rem">Desa/Kelurahan</label>
                                <select class="form-select" id="desa" name="desa" style="font-size:2.2vh;">
                                    <option value="{{$dp->id_desa}}" selected>{{$dp->nama_desa}}</option>
                                </select>
                        </div>

                        <div class="col-auto" style="font-size:2.2vh; margin-left: 0.2rem; width:140px">
                            <label style="margin-bottom: 0.3rem">Bulan</label>
                                <select class="form-select" id="bulan" name="bulan" style="font-size:2.2vh;">
                                    <option value="{{$dp->id_bulan}}" selected>{{$dp->nama_bulan}}</option>
                                    @foreach($bulan as $b)
                                    <option value="{{$b->id_bulan}}">{{$b->nama_bulan}}</option>
                                    @endforeach($bulan as $b)
                                </select>
                        </div>

                        <div class="col-auto" style="font-size:2.2vh; margin-left: 0.2rem; width:140px">
                            <label style="margin-bottom: 6px">Tahun</label>
                                <select class="form-select" id="tahun" name="tahun" style="font-size:2.2vh;">
                                    <option value="{{$dp->id_tahun}}" selected>{{$dp->tahun}}</option>
                                    @foreach($tahun as $t)
                                    <option value="{{$t->id_tahun}}">{{$t->tahun}}</option>
                                    @endforeach($tahun as $t)
                                </select>
                        </div>
                    </div>
                </div>
                
                <div class="container" style="margin-top: 2rem;">
                    <div class="row" style="margin-left: 0px;">
                        <div class="col-auto" style="width:290px">
                            <label style="font-size:2.2vh; margin-left: 0px; margin-bottom: 0.2rem">Gelandangan</label>
                            <input type="number" name="gld" id="gld" class="form-control" placeholder="{{$dp->gelandangan}}" value="{{$dp->gelandangan}}" required>   
                        </div>

                        <div class="col-auto" style="font-size:2.2vh; margin-left: 0.2rem; width:290px">
                            <label style="margin-bottom: 0.2rem">Pengemis</label>
                            <input type="number" name="peng" id="peng" class="form-control" placeholder="0"  value="{{$dp->pengemis}}"  required>   
                        </div>

                        <div class="col-auto" style="font-size:2.2vh; margin-left: 0.2rem; width:290px">
                            <label style="margin-bottom: 0.2rem">Punk</label>
                            <input type="number" name="punk" id="punk" class="form-control" placeholder="0"  value="{{$dp->punk}}"  required>   
                        </div>

                    </div>
                </div>

                <div class="container" style="margin-top: 2rem;">
                    <div class="row" style="margin-left: 0px;">
                        <div class="col-auto" style="width:290px">
                            <label style="font-size:2.2vh; margin-left: 0px; margin-bottom: 0.2rem">Anak Jalanan</label>
                            <input type="number" name="anjal" id="anjal" class="form-control" placeholder="0" value="{{$dp->anak_jalanan}}" required>   
                        </div>

                        <div class="col-auto" style="font-size:2.2vh; margin-left: 0.2rem; width:290px">
                            <label style="margin-bottom: 0.2rem">Orang Terlantar</label>
                            <input type="number" name="ot" id="ot" class="form-control" placeholder="0" value="{{$dp->orang_terlantar}}"required>   
                        </div>

                        <div class="col-auto" style="font-size:2.2vh; margin-left: 0.2rem; width:290px">
                            <label style="margin-bottom: 0.2rem">Anak Terlantar</label>
                            <input type="number" name="at" id="at" class="form-control" placeholder="0" value="{{$dp->anak_terlantar}}"required>   
                        </div>

                    </div>
                </div>

                <div class="container" style="margin-top: 2rem;">
                    <div class="row" style="margin-left: 0px;">
                        <div class="col-auto" style="width:290px">
                            <label style="font-size:13px; margin-left: 0px; margin-bottom: 6px">Pekerja Seks Komersial</label>
                            <input type="number" name="psk" id="psk" class="form-control" placeholder="0" value="{{$dp->psk}}" required>   
                        </div>

                        <div class="col-auto" style="font-size:13px; margin-left: 5px; width:290px">
                            <label  style="margin-bottom: 6px">WARIA</label>
                            <input type="number" name="waria" id="waria" class="form-control" placeholder="0" value="{{$dp->waria}}" required>   
                        </div>

                        <div class="col-auto" style="font-size:13px; margin-left: 5px; width:290px">
                            <label style="margin-bottom: 6px">PRIA</label>
                            <input type="number" name="pria" id="pria" class="form-control" placeholder="0" value="{{$dp->pria}}"required>   
                        </div>

                    </div>
                </div>

                <div class="container" style="margin-top: 2rem;">
                    <div class="row" style="margin-left: 0px;">
                        <div class="col-auto" style="width:290px">
                            <label style="font-size:13px; margin-left: 0px; margin-bottom: 6px">WANITA</label>
                            <input type="number" name="wanita" id="wanita" class="form-control" placeholder="0" value="{{$dp->wanita}}" required>   
                        </div>
                        <div class="col-auto" style="width:290px">
                            <input type="hidden" name="id_data" id="id_data" class="form-control" placeholder="0" value="{{$dp->id_data}}" required>   
                        </div>
                        
                    </div>
                    </div>

                    
                </div>
                @endforeach($datapmks as $dp)

                <div class="container">
                    <div class="row" style="margin-left: 43.5rem;">
                        <div class="col-auto">
                            <button class="btn btn-success" type="submit"> Simpan Perubahan </button>
                            <!-- <a class="btn btn-success" id="tambah" href="" role="button">Simpan Perubahan</a> -->
                        </div>

                    </div>
                </div>

            </form>


            </div>
        </div>

    </div>
    <script type="text/javascript">
    $(document).ready(function(){
        //ketika pilih kecamatan
        $('#kecamatan').on('click', function(){
            //ambil value dari id kecamatan     
            var kecId = this.value;
            console.log(kecId);
            $('#desa').html('');

            $.ajax({
                //kirim id ke controller getDesa untuk baca desa yang ada didalam kacamatan yang dipilih
                url: '{{ route('getDataPMKS') }}?id_kec='+kecId,
                type :'get',             
                success : function(res){
                    //$('#desa').html('<option value="">Pilih Desa</option> '); 

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