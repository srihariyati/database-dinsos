@extends('template')
@section('title','Data Bencana')

@section('content')
    <div id="card-satu">
            <div id="data" class="row">
                <div class="col-auto" style="margin-top: 20px;">
                    <h4 class="fw-bold" style="margin-left: 10px;">Data Rekapan Bantuan Sosial Masa Tanggap Darurat Bencana </h4>
                </div>
                        
                <div class="col-auto" >
                    <a href="{{ url('/tambahdatabencana')}}" id="tambah" class="tombol btn-group text-white fw-bold form-control btn-lg mt-3" style="background-color: #1CCE2E; text-decoration: none; height:33px; padding:5px;" > Tambah </a>
                </div>

                <div class="container" style="margin-top: 35px;">
                    <div class="row" style="margin-left: 0px;">
                        
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

                        <div class="col-auto" style="width:290px">
                            <label class="fw-bold" style="font-size:13px; margin-left: 0px; margin-bottom: 6px">Jenis Bencana</label>
                                <select class="form-select" id="autoSizingSelect" style="font-size:13px;">
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

                        <div class="col-auto" style="font-size:13px; margin-left: 5px; width:290px">
                            <label class="fw-bold" style="margin-bottom: 6px">Sumber Dana</label>
                                <select class="form-select" id="autoSizingSelect" style="font-size:13px;">
                                    <option selected>Pilih Sumber Dana</option>
                                    <option value="1">APBK</option>
                                    <option value="2">Lain-lain</option>
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