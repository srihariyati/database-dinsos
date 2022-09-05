@extends('template')
@section('title','Tambah Data Bantuan Bencana')

@section('content')
    <div id="card-tiga">
            <div id="data" class="row">
                
                <div class="col-auto" style="margin-top: 12px; margin-left:15px;">
                    <a href="{{ url('/bencana')}}" class="icon"><i class= "fas fa-chevron-left fa-lg"  style="color:black;"> </i></a>
                </div>

                <div class="col-auto" style="margin-top: 10px;">
                    <h4 class="fw-bold">Tambah Data Bantuan Sosial Masa Tanggap Darurat Bencana </h4>
                </div>
            
            <form action="#">
                    <div class="container" style="margin-top: 30px;">
                        <div class="row" style="margin-left: 25px;">

                            <div class="col-auto" style="width:290px">
                                <label style="font-size:13px; margin-left: 0px; margin-bottom: 6px">Kecamatan</label>
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
                                <label style="margin-bottom: 6px">Desa/Kelurahan</label>
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

                            <div class="col-auto" style="font-size:13px; margin-left: 5px; width:290px">
                                <label style="margin-bottom: 6px">Tanggal Terjadi Bencana </label>
                                <input type="date" name="totalkk" id="totalkk" class="form-control" placeholder="0" required>   
                            </div>

                        </div>
                    </div>

                <div class="container" style="margin-top: 130px;">
                    <div class="row" style="margin-left: 27px;">

                       

                        <div class="col-auto" style="width:290px">
                            <label style="font-size:13px; margin-left: 0px; margin-bottom: 6px">Jenis Bencana</label>
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
                            <label style="margin-bottom: 6px">Sumber Dana</label>
                                <select class="form-select" id="autoSizingSelect" style="font-size:13px;">
                                    <option selected>Pilih Sumber Dana</option>
                                    <option value="1">APBK</option>
                                    <option value="1">APBN</option>
                                    <option value="1">APBA</option>
                                    <option value="2">Lain-lain</option>
                                </select>
                        </div>

                        <div class="col-auto" style="font-size:13px; margin-left: 5px; width:290px">
                            <label style="margin-bottom: 6px">Total Penerima (KK)</label>
                            <input type="number" name="totalkk" id="totalkk" class="form-control" placeholder="0" required>   
                        </div>

                    </div>
                </div>
            
                <div id="button" style="margin-top: 15rem; margin-left:52rem;">
                    <a href="#" id="simpan" class="tombol btn-group text-white fw-bold form-control btn-lg mt-3" style="background-color: #1CCE2E; text-decoration: none; width: 80px;"> Simpan </a>
                </div> 

            </form>

        </div>
    </div>

@endsection