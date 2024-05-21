@extends('layouts.main')

@section('container')
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Hello, {{ Auth()->user()->name }}</h3>
          <h6 class="font-weight-normal mb-0">All systems are running smoothly! You are logged as <span class="text-primary">{{ Auth()->user()->isAdmin == 1 ? 'Administrator' : 'Mahasiswa' }}</span></h6>
        </div>
        <div class="col-12 col-xl-4">
         <div class="justify-content-end d-flex">
          <a class="btn btn-md btn-info" href="{{ route('matakuliah.index') }}">
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
          <h4 class="card-title">Tambah Data Mata Kuliah</h4>
          <p class="card-description">
            Form penambahan data mata kuliah
          </p>
          <div>
            <form action="{{ route('matakuliah.store') }}" method="POST">
              @csrf
              <div>
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="kode_mk">Kode MK
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="text" id="kode_mk" name="kode_mk" required="required" class="form-control ">
                </div>
              </div>
              <div>
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_mk">Nama MK
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="text" id="nama_mk" name="nama_mk" required="required" class="form-control ">
                </div>
              </div>
              <div>
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="semester_mk">Semester
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="number" id="semester_mk" name="semester_mk" value="0" required="required" class="form-control ">
                </div>
              </div>
              <div>
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="sks">SKS
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="number" id="sks" name="sks" required="required" value="0" class="form-control ">
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