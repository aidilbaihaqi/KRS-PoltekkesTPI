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
          <button class="btn btn-md btn-info" type="button">
            Tambah data
           </button>
         </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Tambah Data Mahasiswa</h4>
          <p class="card-description">
            Form penambahan data mahasiswa
          </p>
          <div>
            <form action="" method="POST">
              @csrf
              <div>
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nim">NIM
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="text" id="nim" name="nim" required="required" class="form-control ">
                </div>
              </div>
              <div>
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama">Nama
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="text" id="nama" name="nama" required="required" class="form-control ">
                </div>
              </div>
              <div>
                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal lahir
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input id="birthday" name="date" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                  <script>
                    function timeFunctionLong(input) {
                      setTimeout(function() {
                        input.type = 'text';
                      }, 60000);
                    }
                  </script>
                </div>
              </div>
              <div>
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="alamat">Alamat
                <textarea class="form-control mt-3" rows="3" name="alamat"></textarea>
              </div>
              <div>
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="semester">Semester
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="number" id="semester" name="semester" required="required" class="form-control ">
                </div>
              </div>
              <div class="radio">
                <div>
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="jenis_kelamin">Jenis Kelamin
                </div>
                <label class="col-md-6 col-sm-6 ">
                  <input type="radio" class="flat" checked name="jenis_kelamin"> Laki-laki
                  <input type="radio" class="flat" name="jenis_kelamin"> Perempuan
                </label>
              </div>
              <div>
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="tahun_akademik">Tahun Akademik
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="text" id="tahun_akademik" name="tahun_akademik" required="required" class="form-control ">
                </div>
              </div>
              <div>
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="kode_kelas">Kode Kelas
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <select class="form-select" aria-label="Default select example">
                    <option selected>Pilih kode kelas</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
              </div>
              <div>
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="kode_jurusan">Kode Jurusan
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <select class="form-select" aria-label="Default select example">
                    <option selected>Pilih kode jurusan</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
              </div>
              <div class="mt-4">
                <div class="col-md-6 col-sm-6">
                  <a class="btn btn-primary" href="{{ route("mahasiswa.index") }}">Cancel</a>
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