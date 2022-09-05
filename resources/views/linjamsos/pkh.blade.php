@extends('template')
@section('title','PKH')

@section('content')
    <div id="card-satu">
            <div id="data" class="row">
                <div class="col-auto" style="margin-top: 20px;">
                    <h4 class="fw-bold" style="margin-left: 10px;">Data Rekapan PKH</h4>
                </div>
                        
                <div class="col-auto" >
                    <a href="{{ url('/tambahpkh')}}" id="tambah" class="tombol btn-group text-white fw-bold form-control btn-lg mt-3" style="background-color: #1CCE2E; text-decoration: none; padding:1vh;"> Tambah </a>
                </div>

                <div class="container" style="margin-top: 30px;">
                    <div class="row" style="margin-left: 0px;">
                        <div class="col-auto" style="width:290px">
                            <label class="fw-bold" style="font-size:13px; margin-left: 0px; margin-bottom: 6px">Kecamatan</label>
                                <select class="form-select" id="autoSizingSelect" style="font-size:13px;">
                                    <option selected >Pilih Kecamatan</option>
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

                        <div class="col-auto" style="font-size:13px; margin-left: 5px; width:290px">
                            <label class="fw-bold" style="margin-bottom: 6px">Desa/Kelurahan</label>
                                <select class="form-select" id="autoSizingSelect" style="font-size:13px;">
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

                        <div class="col-auto" style="font-size:13px; margin-left: 5px; width:170px">
                            <label class="fw-bold" style="margin-bottom: 6px">Bulan</label>
                                <select class="form-select" id="autoSizingSelect" style="font-size:13px;">
                                    <option selected>Pilih Bulan</option>
                                    <option value="1">Januari</option>
                                    <option value="2">Februari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                        </div>

                        <div class="col-auto" style="font-size:13px; margin-left: 5px; width:170px">
                            <label class="fw-bold" style="margin-bottom: 6px">Tahun</label>
                                <select class="form-select" id="autoSizingSelect" style="font-size:13px;">
                                    <option selected>Pilih Tahun</option>
                                    <option value="1">2022</option>
                                    <option value="2">2021</option>
                                    <option value="3">2020</option>
                                    <option value="4">2019</option>
                                    <option value="5">2018</option>
                                    <option value="6">2017</option>
                                    <option value="7">2016</option>
                                </select>
                        </div>
                    </div>
                </div>

            <div class="row" style="margin-top: 190px;">
                <div class="col-auto" style="margin-left: 630px;">
                    <a href="#" id="edit-btn" class="tombol btn-group text-white fw-bold form-control btn-lg mt-3" style="background-color: #FF3232; text-decoration: none; padding: 5px 20px;"> Edit </a>
                </div>
                <div class="col-auto">
                    <a href="#" id="cari-btn" class="tombol btn-group text-white fw-bold form-control btn-lg mt-3" style="background-color:#0B63F8; text-decoration: none; padding: 5px 20px;"> Cari </a>
                </div>
            </div>

        </div>
    </div>

@endsection