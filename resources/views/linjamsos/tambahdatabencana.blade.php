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
                                <select class="form-select" id="autoSizingSelect" style="font-size:2.2vh;">
                                    <option selected >Pilih Kecamatan</option>
                                    @foreach ($kecamatan as $kec)
                                    <option value="{{$kec->id_kec}}">{{$kec->nama_kec}}</option>
                                    @endforeach ($kecamatan as $kec)    
                                </select>
                        </div>

                        <div class="col-auto" style="font-size:2.2vh; margin-left: 0.2rem; width:290px">
                            <label style="margin-bottom: 0.3rem">Desa/Kelurahan</label>
                                <select class="form-select" id="autoSizingSelect" style="font-size:2.2vh;">
                                    <option selected>Pilih Desa/Kelurahan</option>
                                </select>
                        </div>

                        <div class="col-auto" style="font-size:2.2vh; margin-left: 0.2rem; width:140px">
                            <label style="margin-bottom: 0.3rem">Bulan</label>
                                <select class="form-select" id="autoSizingSelect" style="font-size:2.2vh;">
                                    <option  value="">Pilih Bulan</option>
                                    @foreach($bulan as $b)
                                    <option value="{{$b->id_bulan}}">{{$b->nama_bulan}}</option>
                                    @endforeach($bulan as $b)
                            </select>
                        </div>

                        <div class="col-auto" style="font-size:2.2vh; margin-left: 0.2rem; width:140px">
                            <label style="margin-bottom: 6px">Tahun</label>
                                <select class="form-select" id="autoSizingSelect" style="font-size:2.2vh;">
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
                            <select class="form-select" id="jenis_bencana" style="font-size:13px;">
                                    <option selected >Pilih Jenis Bencana</option>
                                    <option value="1">Banjir</option>
                                    <option value="2">Kebakaran</option>
                                    <option value="3">Angin Kencang</option>
                                    <option value="4">Gempa Bumi</option>
                                    <option value="5">Tanah Longsor</option>
                                    <option value="6">Tsunami</option>
                                    <option value="7">Lain-lain</option>
                                </select>
                        </div>

                        <div class="col-auto" style="font-size:2.2vh; margin-left: 0.2rem; width:290px">
                            <label style="margin-bottom: 0.2rem">Sumber Dana</label>
                            <select class="form-select" id="sumber_dana" style="font-size:13px;">
                                    <option selected>Pilih Sumber Dana</option>
                                    <option value="1">APBK</option>
                                    <option value="1">APBN</option>
                                    <option value="1">APBA</option>
                                    <option value="2">Lain-lain</option>
                            </select>
                        </div>

                        <div class="col-auto" style="font-size:2.2vh; margin-left: 0.2rem; width:290px; margin-top : 2rem;">
                            <label style="margin-bottom: 0.2rem">Total Penerima (KK)</label>
                            <input type="number" name="totalkk" id="totalkk" class="form-control" placeholder="0" required>   
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row" style="margin-left: 48.5rem;">
                        <div class="col-auto">
                            <a class="btn btn-success" id="tambah" href="" role="button">Simpan</a>
                        </div>

                    </div>
                </div>

            </form>
           
        </div>

    </div>

@endsection