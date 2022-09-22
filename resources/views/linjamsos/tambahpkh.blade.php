@extends('template')
@section('title','Tambah Data PKH')

@section('content')
<div class="card w-75">
        <div class="card-body" >
            <div class="row"  style="margin-left:-1rem;">
                <div class="col-auto" style="margin-top: 0.3rem;">
                    <a href="{{ url('/pkh')}}" class="icon"><i class= "fas fa-chevron-left fa-lg"  style="color:black;"> </i></a>
                </div>
                <div class="col-auto">
                    <h4 class="fw-bold">Tambah Data Bantuan Sosial Masa Tanggap Darurat Bencana</h4>
                </div>
            </div>

            <form action="#">
                <div class="container" style="margin-top: 1rem;">
                    <div class="row" style="margin-left: 0px;">
                        <div class="col-auto" style="width:290px">
                            <label style="font-size:2.2vh; margin-left: 0px; margin-bottom: 0.3rem">Kecamatan</label>
                                <select class="form-select" id="autoSizingSelect" style="font-size:2.2vh;">
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

                        <div class="col-auto" style="font-size:2.2vh; margin-left: 0.2rem; width:290px">
                            <label style="margin-bottom: 0.3rem">Desa/Kelurahan</label>
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

                        <div class="col-auto" style="font-size:2.2vh; margin-left: 0.2rem; width:140px">
                            <label style="margin-bottom: 0.3rem">Bulan</label>
                                <select class="form-select" id="autoSizingSelect" style="font-size:2.2vh;">
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

                        <div class="col-auto" style="font-size:2.2vh; margin-left: 0.2rem; width:140px">
                            <label style="margin-bottom: 6px">Tahun</label>
                                <select class="form-select" id="autoSizingSelect" style="font-size:2.2vh;">
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

                <div class="container" style="margin-top: 2rem;">
                    <div class="row" style="margin-left: 0px;">
                        <div class="col-auto" style="font-size:2.2vh; margin-left: 0.2rem; width:290px">
                            <label style="margin-bottom: 0.2rem">PUS Penerima Bantuan Tunai Bersyarat</label>
                            <input type="number" name="tunaibersyarat" id="tunaibersyarat" class="form-control" placeholder="0" required>   
                        </div>

                        <div class="col-auto" style="width:290px">
                            <label style="font-size:2.2vh; margin-left: 0px; margin-bottom: 0.2rem">PUS Penerima BPNT</label>
                            <input type="number" name="bpnt" id="bpnt" class="form-control" placeholder="0" required>
                        </div>

                        <div class="col-auto" style="font-size:2.2vh; margin-left: 0.2rem; width:290px">
                            <label style="margin-bottom: 0.2rem">PUS PBI Jaminan Kesehatan</label>
                            <input type="number" name="pbi" id="pbi" class="form-control" placeholder="0" required>
                        </div>

                        <div class="col-auto" style="font-size:2.2vh; margin-left: 0.2rem; width:290px; margin-top : 2rem;">
                            <label style="margin-bottom: 0.2rem">KPM PKH Mengikuti P2K2</label>
                            <input type="number" name="kpmpkh" id="kpmpkh" class="form-control" placeholder="0" required>   
                        </div>

                        <div class="col-auto" style="font-size:2.2vh; margin-left: 0.2rem; width:290px; margin-top : 2rem;">
                            <label style="margin-bottom: 0.2rem">KPM Bumil Busui Baduta (Bantuan Pangan)</label>
                            <input type="number" name="bumil" id="bumil" class="form-control" placeholder="0" required>   
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