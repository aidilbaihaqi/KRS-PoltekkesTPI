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
          <a class="btn btn-md btn-info" href="{{ route('krs.index') }}">
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
          <h4 class="card-title">Tambah Data Kartu Rencana Studi</h4>
          <p class="card-description">
            Form penambahan data kartu rencana studi
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
            <form action="{{ route('krs.store') }}" method="POST">
              @csrf
              <div>
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="kode_krs">Kode KRS
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="text" id="kode_krs" name="kode_krs" required="required" class="form-control ">
                </div>
              </div>
              <div>
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nim">NIM
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <select class="form-select" name="nim">
                    <option selected disabled>Pilih NIM</option>
                    @foreach ($mhs as $m)
                    <option value="{{ $m->nim }}">{{$m->nim}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div>
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="kode_mk">Kode MK
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <select class="form-select" name="kode_mk">
                    <option selected disabled>Pilih Kode MK</option>
                    @foreach ($mk as $d)
                    <option value="{{ $d->kode_mk }}">{{$d->kode_mk}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="mt-4">
                <div class="col-md-6 col-sm-6">
                  <a class="btn btn-primary" href="{{ route("krs.index") }}">Cancel</a>
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