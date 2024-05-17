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
          <h4 class="card-title">Data kelas</h4>
          <p class="card-description">
            Berikut adalah data-data kelas
          </p>
          <div class="table-responsive table-hover">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Kode Kelas</th>
                  <th>Nama Kelas</th>
                  <th>Jumlah Mahasiswa</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $d)
                  <tr>
                    <td>
                      <a class="btn btn-sm btn-danger">Hapus</a>
                      <a class="btn btn-sm btn-success">Edit</a>
                    </td>
                    <td><span class="font-weight-bold text-primary">{{ $d->kode_kelas }}</span></td>
                    <td>{{ $d->nama_kelas }}</td>
                    <td>{{ $d->jmlh_mahasiswa }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection