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
                                <select class="form-select" id="autoSizingSelect" style="font-size:2.2vh;">
                                    <option selected >Pilih Kecamatan</option>
                                    <option value="1">Baiturrahman</option>
                                    @foreach($kecamatan as $k)
                                    <option value="1">{{$k->kecamatan}}</option>
                                    @endforeach($kecamatan as $k)
                                </select>
                        </div>

                        <div class="col-auto" style="font-size:2.2vh; margin-left: 0.5rem; width:290px">
                            <label class="fw-bold" style="margin-bottom: 0.5rem;">Desa/Kelurahan</label>
                                <select class="form-select" id="autoSizingSelect" style="font-size:2.2vh;">
                                    <option selected>Pilih Desa/Kelurahan</option>
                                    <option value="1">Baiturrahman</option>
                                    <option value="2">Banda Raya</option>
                                    <option value="3">Jaya Baru</option>
                                    <option value="4">Kuta Alam</option>
                                    <option value="5">Kuta Raja</option>
                                    <option value="6">Lueng Bata</option>
                                    <option value="7">Meuraxa</option>
                                    <option value="8">Syiah Kuala</option>
                                    <option value="9">Ulee Kareng</option>
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

        <div id="card-satu">
            <div class="row">
                <div class="col-auto" style="margin-left: 38rem;">
                    <a href="#" id="pdf-btn" class="tombol btn-group text-black fw-bold form-control btn-lg mt-3" style="text-color: #000000; background-color: #FFCA0E; text-decoration: none; padding: 1vh 3vh;"> Cetak PDF </a>
                </div>
                <div class="col-auto">
                    <a href="" id="excel-btn" class="tombol btn-group text-white fw-bold form-control btn-lg mt-3" style="background-color:#1CCE2E; text-decoration: none; padding: 1vh 3vh;"> Cetak Excel </a>
                </div>
            </div>

            <table class="table" style="margin-top: 6rem;">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kecamatan</th>
                        <th scope="col">Desa/Kelurahan</th>
                        <th scope="col">Bulan</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">GLD</th>
                        <th scope="col">PENG</th>
                        <th scope="col">PUNK</th>
                        <th scope="col">ANJAL</th>
                        <th scope="col">OT</th>
                        <th scope="col">AT</th>
                        <th scope="col">PSK</th>
                        <th scope="col">WARIA</th>
                        <th scope="col">PRIA</th>
                        <th scope="col">WANITA</th>
                        <th scope="col">TOTAL</th>
                    </tr>
                </thead>
                    <tbody>
                        @foreach($pmks as $p)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{$p -> kecamatan}}</td>
                            <td>{{$p -> nama_desa}}</td>
                            <td>{{$p -> nama_bulan}}</td>
                            <td>{{$p -> tahun}}</td>
                            <td>{{$p -> gelandangan}}</td>
                            <td>{{$p -> pengemis}}</td>
                            <td>{{$p -> punk}}</td>
                            <td>{{$p -> anak_jalanan}}</td>
                            <td>{{$p -> orang_terlantar}}</td>
                            <td>{{$p -> anak_terlantar}}</td>
                            <td>{{$p -> psk}}</td>
                            <td>{{$p -> waria}}</td>
                            <td>{{$p -> pria}}</td>
                            <td>{{$p -> wanita}}</td>
                            <td>total</td>
                        </tr>
                        @endforeach($pmks as $p)
                    </tbody>
            </table>
        </div>
    </div>

@endsection