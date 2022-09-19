@extends('template')
@section('title','PMKS')

@section('content')
    <div class="card w-76" >
        <div class="card-body">
            <div class="container" >
                <div class="row" style="margin-left: -40px;">
                    <div class="col-auto">
                        <h4 class="fw-bold" >Data Rekapan PMKS</h4>
                    </div>
        
                    <div class="col-auto" >
                            <a class="btn btn-success" id="tambah" href="{{ url('/tambahpmks')}}" role="button">Tambah</a>
                    </div>
                </div>
            </div>



            <div class="container">
                <div class="row" style="margin-top: 1rem; margin-left: -2.4rem">
                    <div class="col-auto">
                        <label class="fw-bold" style="margin-left: 0px; margin-bottom: 0.5rem">Kecamatan</label>
                            <select class="form-select" id="kecamatan" style="font-size:2.2vh;">
                                <option selected >Pilih Kecamatan</option>
                                    @foreach ($kecamatan as $kec)
                                    <option value="{{$kec->id_kec}}">{{$kec->nama_kec}}</option>
                                    @endforeach ($kecamatan as $kec)                              
                            </select>
                    </div>
            
                    <div class="col-auto"> 
                        <label class="fw-bold" style="margin-bottom: 0.5rem;">Desa/Kelurahan</label>
                            <select class="form-select" id="desa" style="font-size:2.2vh;">
                                <option value="">Pilih Desa</option>
                            </select>
                    </div>

                    <div class="col-auto"> 
                        <label class="fw-bold" style="margin-bottom: 0.5rem">Bulan</label>
                            <select class="form-select" id="bulan" style="font-size:2.2vh;">
                                <option selected>Pilih Bulan</option>
                                @foreach($bulan as $b)
                                <option value="{{$b->id_bulan}}">{{$b->nama_bulan}}</option>
                                @endforeach($bulan as $b)
                            </select>
                    </div>

                    <div class="col-auto"> 
                        <label class="fw-bold" style="margin-bottom: 0.5rem">Tahun</label>
                            <select class="form-select" id="tahun" style="font-size:2.2vh;">
                                <option selected>Pilih Tahun</option>
                                @foreach($tahun as $t)
                                <option value="{{$t->id_tahun}}">{{$t->tahun}}</option>
                                @endforeach($tahun as $t)
                            </select>
                    </div>

                    <div  class="row" style="margin-top: 20px;">
                        <div class="col-auto" >
                            <a class="btn btn-danger" id="edit-btn" href="#" role="button">Edit</a>
                        </div> 
                        <div class="col-auto" >
                            <a class="btn btn-primary" id="Cari-btn" href="#" role="button">Cari</a>
                        </div> 
                    </div>

                </div>
            </div>
        </div>
    </div>

   <div class="card w-75">
        <div class="card-body">
            <h5 class="card-title">Data .......</h5>
        </div>

        <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td>$320,800</td>
            </tr>
            <tr>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011/07/25</td>
                <td>$170,750</td>
            </tr>
            <tr>
                <td>Ashton Cox</td>
                <td>Junior Technical Author</td>
                <td>San Francisco</td>
                <td>66</td>
                <td>2009/01/12</td>
                <td>$86,000</td>
            </tr>
            <tr>
                <td>Cedric Kelly</td>
                <td>Senior Javascript Developer</td>
                <td>Edinburgh</td>
                <td>22</td>
                <td>2012/03/29</td>
                <td>$433,060</td>
            </tr>
            <tr>
                <td>Airi Satou</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>33</td>
                <td>2008/11/28</td>
                <td>$162,700</td>
            </tr>
            <tr>
                <td>Brielle Williamson</td>
                <td>Integration Specialist</td>
                <td>New York</td>
                <td>61</td>
                <td>2012/12/02</td>
                <td>$372,000</td>
            </tr>
            <tr>
                <td>Herrod Chandler</td>
                <td>Sales Assistant</td>
                <td>San Francisco</td>
                <td>59</td>
                <td>2012/08/06</td>
                <td>$137,500</td>
            </tr>
            <tr>
                <td>Rhona Davidson</td>
                <td>Integration Specialist</td>
                <td>Tokyo</td>
                <td>55</td>
                <td>2010/10/14</td>
                <td>$327,900</td>
            </tr>
            <tr>
                <td>Colleen Hurst</td>
                <td>Javascript Developer</td>
                <td>San Francisco</td>
                <td>39</td>
                <td>2009/09/15</td>
                <td>$205,500</td>
            </tr>
            <tr>
                <td>Sonya Frost</td>
                <td>Software Engineer</td>
                <td>Edinburgh</td>
                <td>23</td>
                <td>2008/12/13</td>
                <td>$103,600</td>
            </tr>
        </tbody>
        </table>
        </div>
        </div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#tabel-data').DataTable();

        $('#dtHorizontalVerticalExample').DataTable({
            "scrollX": true,
            "scrollY": 200,
        });
        $('.dataTables_length').addClass('bs-select');

        $('#kecamatan').on('change', function(){
            //ambil value dari id kecamatan
            var kecId = this.value;
            $('#desa').html('');

            $.ajax({
                //kirim id ke controller
                url: '{{ route('getDesa') }}?id_kec='+kecId,
                type :'get',               
                success : function(res){
                    $('#desa').html('<option value="">Pilih Desa</option>');                 
     
                    $.each(res.desa, function (key, value) {
                        console.log("ini id kec :"+kecId);
                        console.log(value);
                        console.log(res);
                        console.log(value.id_desa, value.nama_desa);

                        // buat option untuk pilih desa
                        $('#desa').append('<option value="'+ value.id_desa + '">' + value.nama_desa + '</option>');                  
                        
                    });
                     // tampilkan dat yang kecamatannya dipilih

                    $.each(res.datapmks, function(key, value){
                        console.log(value.id_data);

                    });
                    
                }
            });
        });

        // cari data
        $("#cari-btn").click(function(){
            var kecId = document.getElementById("kecamatan").value;
            var desaId = document.getElementById("desa").value;
            var bulanId = document.getElementById("bulan").value;
            var tahunId = document.getElementById("tahun").value;

            console.log(kecId);
            console.log(desaId);
            console.log(bulanId);
            console.log(tahunId);

            $.ajax({
                url: '{{ route('getDataPMKS') }}?id_kec='+kecId+'&id_desa='+desaId+'&id_bulan='+bulanId+'&tahun='+tahunId,
                type :'get',
                success : function(res){
                    $.each(res, function (key, value) {
                        console.log("bisa ni");
                        

                        // // $('#data-pmks').html('<div id="card-satu"><div class="col-auto"><a href="" id="excel-btn" class="tombol btn-group text-white fw-bold form-control btn-lg mt-3" style="background-color:#1CCE2E; text-decoration: none; padding: 1vh 3vh;"> Cetak Excel </a></div></div>'); 
                        // // $('#card-satu').append('<h1>'+ value.id_data + ','+value.id_tahun+'</h1>');


                        // var markup = "<tr><td>" + value.id_data + "</td><td>" + value.id_tahun + "</td></tr>";
                        // $("table tbody").append(markup);
                        console.log(value.id_data);
                    });
                },
                error :function(error){
                    alert('ada yang salah');
                }
            });
            
        });
    });
</script>

@endsection