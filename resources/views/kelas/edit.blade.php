@extends('layouts.main')

@section('container')
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Hello, {{ Auth()->user()->name }}</h3>
          <h6 class="font-weight-normal mb-0">All systems are running smoothly! You are logged as <span class="text-primary">Admin</span></h6>
        </div>
        <div class="col-12 col-xl-4">
         <div class="justify-content-end d-flex">
          <a class="btn btn-md btn-info" href="{{ route('kelas.index') }}">
            <i class="fa-solid fa-arrow-left"></i>
           </a>
         </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Ubah Data Kelas</h4>
          <p class="card-description">
            Form perubahan data kelas
          </p>

          @if ($errors->any())
              <div class="alert alert-danger">
                  <strong>Whoops!</strong> There were some problems with your input.<br><br>
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif

          <div>
            <form action="{{ route('kelas.update', $data->kode_kelas) }}" method="POST">
              @csrf
              
              <div>
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="kode_kelas">Kode Kelas
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="text" id="kode_kelas" name="kode_kelas" value="{{ $data->kode_kelas }}" required="required" class="form-control ">
                </div>
              </div>
              <div>
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_kelas">Nama Kelas
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="text" id="nama_kelas" name="nama_kelas" value="{{ $data->nama_kelas }}" required="required" class="form-control ">
                </div>
              </div>
              <div>
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="jmlh_mahasiswa">Jumlah Mahasiswa
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="number" id="jmlh_mahasiswa" name="jmlh_mahasiswa" value="{{ $data->jmlh_mahasiswa }}" required="required" class="form-control ">
                </div>
              </div>
              <div class="mt-4">
                <div class="col-md-6 col-sm-6">
                  <a class="btn btn-primary" href="{{ route("kelas.index") }}">Cancel</a>
                  <button class="btn btn-danger" type="reset">Reset</button>
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection