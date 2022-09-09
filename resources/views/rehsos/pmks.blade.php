@extends('template')
@section('title','PMKS')

@section('content')
        <div id="card-satu">
            <div id="data" class="row">
                <div class="col-auto" style="margin-top: 20px;">
                    <h4 class="fw-bold" style="margin-left: 0.7rem;">Data Rekapan PMKS</h4>
                </div>
                        
                <div class="col-auto" >
                    <a href="{{ url('/tambahpmks')}}" id="tambah" class="tombol btn-group text-white fw-bold form-control btn-lg mt-3" style="background-color: #1CCE2E; text-decoration: none; padding:1vh;"> Tambah </a>
                </div>

                <div class="container" style="margin-top: 2rem;">
                    <div class="row" style="margin-left: 0px;">
                        <div class="col-auto" style="width:290px">
                            <label class="fw-bold" style="font-size:2.2vh; margin-left: 0px; margin-bottom: 0.5rem">Kecamatan</label>
                                <select class="form-select" id="kecamatan" style="font-size:2.2vh;">
                                    <option selected >Pilih Kecamatan</option>
                                    @foreach ($kecamatan as $kec)
                                    <option value="{{$kec->id_kec}}">{{$kec->nama_kec}}</option>
                                    @endforeach ($kecamatan as $kec)
                                                                   
                                </select>
                        </div>

                        <div class="col-auto" style="font-size:2.2vh; margin-left: 0.5rem; width:290px">
                            <label class="fw-bold" style="margin-bottom: 0.5rem;">Desa/Kelurahan</label>
                                <select class="form-select" id="desa" style="font-size:2.2vh;">
                                <option value="">Pilih Desa</option>
                                </select>
                        </div>

                        <div class="col-auto" style="font-size:2.2vh; margin-left: 0.5rem; width:170px">
                            <label class="fw-bold" style="margin-bottom: 0.5rem">Bulan</label>
                                <select class="form-select" id="autoSizingSelect" style="font-size:2.2vh;">
                                    <option selected>Pilih Bulan</option>
                                    @foreach($bulan as $b)
                                    <option value="{{$b->id_bulan}}">{{$b->nama_bulan}}</option>
                                    @endforeach($bulan as $b)
                                </select>
                        </div>

                        <div class="col-auto" style="font-size:2.2vh; margin-left: 0.5rem; width:170px">
                            <label class="fw-bold" style="margin-bottom: 0.5rem">Tahun</label>
                                <select class="form-select" id="autoSizingSelect" style="font-size:2.2vh;">
                                    <option selected>Pilih Tahun</option>
                                    @foreach($tahun as $t)
                                    <option value="{{$t->id_tahun}}">{{$t->tahun}}</option>
                                    @endforeach($tahun as $t)
                                </select>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 6rem;">
                        <div class="col-auto" style="margin-left: 40rem;">
                            <a href="#" id="edit-btn" class="tombol btn-group text-white fw-bold form-control btn-lg mt-3" style="background-color: #FF3232; text-decoration: none; padding: 1vh 3vh;"> Edit </a>
                        </div>
                        <div class="col-auto">
                            <a href="{{ url('/caripmks')}}" id="cari-btn" class="tombol btn-group text-white fw-bold form-control btn-lg mt-3" style="background-color:#0B63F8; text-decoration: none; padding: 1vh 3vh;"> Cari </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#kecamatan').on('change', function(){
            var kecId = this.value;
            $('#desa').html('');
            $.ajax({
                url: '{{ route('getDesa') }}?id_kec='+kecId,
                type :'get',               
                success : function(res){
                    $('#desa').html('<option value="">Pilih Desa</option>');
                    //berhasil mendapatkan id_kecamatan
                    console.log(kecId);
                    console.log(res);
                 
                  
                    $.each(res, function (key, value) {
                        $('#desa').append('<option value="'+ value.id_desa + '">' + value.nama_desa + '</option>');
                        console.log(value.id_desa);
                        console.log(value.nama_desa);
                        //kirim id_kec, id_desa, tahun, bulan ke controller
                        // setelah itu select data dari variabel diatas
                    });
                }
            });
        });
    });
</script>

@endsection