@extends('template')
@section('title','PMKS')

@section('content')
    <div id="card-satu">
            <div id="data" class="row">
                <div class="col-auto" style="margin-top: 20px;">
                    <h4 class="fw-bold" style="margin-left: 10px;">Data PMKS</h4>
                </div>
                        
                <div id="button"class="col-auto">
                    <button type="submit" name="login" class="tombol btn-group text-white fw-bold form-control btn-lg mt-3" style="background-color: #1CCE2E">Tambah</button>
                </div>


            
                <div class="container" style="margin-top: 30px;">
                    <div class="row" style="margin-left: 0px;">
                        <div class="col-auto">
                            <label style="margin-left: 0px;">Kecamatan</label>
                                <select class="form-select" id="autoSizingSelect">
                                    <option selected>Pilih Kecamatan</option>
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

                        <div class="col-auto" style="margin-left: 80px;">
                            <label>Desa/Kelurahan</label>
                                <select class="form-select" id="autoSizingSelect">
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

                        <div class="col-auto" style="margin-left: 80px;">
                            <label>Bulan</label>
                                <select class="form-select" id="autoSizingSelect">
                                    <option selected>Pilih Bulan</option>
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

                        <div class="col-auto" style="margin-left: 80px;">
                            <label>Tahun</label>
                                <select class="form-select" id="autoSizingSelect">
                                    <option selected>Pilih Tahun</option>
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

                    </div>
                </div>

            <div class="row" style="margin-top: 180px;">
                <div class="col-auto" style="margin-left: 630px;">
                    <a href="#" id="edit-btn" class="tombol btn-group text-white fw-bold form-control btn-lg mt-3" style="background-color: #FF3232; text-decoration: none; padding: 7px 24px;"> Edit </a>
                </div>
                <div class="col-auto">
                    <a href="#" id="cari-btn" class="tombol btn-group text-white fw-bold form-control btn-lg mt-3" style="background-color:#0B63F8; text-decoration: none; padding: 7px 24px"> Cari </a>
                </div>
            </div>

        </div>
    </div>

@endsection