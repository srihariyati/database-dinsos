@extends('template')
@section('title','PMKS')

@section('content')
    <div id="card-satu">
        <div id="data" class="row">
            <div class="col-md-4  ">
                <h4 class=" fw-bold" >Data PMKS</h4>
            </div>
                    
            <div id="button"class="col-md-4">
                <button type="submit" name="login" class="tombol btn-group text-white fw-bold form-control btn-lg mt-3" style="background-color: #1CCE2E">Tambah</button>
            </div>

            <form>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputState">State</label>
                        <select id="inputState" class="form-control">
                            <option selected>Choose...</option>
                            <option>...</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="inputState">State</label>
                        <select id="inputState" class="form-control">
                            <option selected>Choose...</option>
                            <option>...</option>
                        </select>
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection