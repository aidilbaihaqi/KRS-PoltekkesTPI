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
          <a class="btn btn-md btn-info" href="{{ route('mahasiswa.index') }}">
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
          <h4 class="card-title">Detail mahasiswa</h4>
          <p class="card-description">
            Berikut adalah data-data dari mahasiswa 
          </p>
          <div>
            <table class="table mb-3">
              <tbody>
                <tr>
                  <th>NIM</th>
                  <td>:</td>
                  <td>{{ $data->nim }}</td>
                </tr>
                <tr>
                  <th>Nama</th>
                  <td>:</td>
                  <td>{{ $data->nama }}</td>
                </tr>
                <tr>
                  <th>Tanggal Lahir</th>
                  <td>:</td>
                  <td>{{ $data->tgl_lahir }}</td>
                </tr>
                <tr>
                  <th>Alamat</th>
                  <td>:</td>
                  <td><p>{{ $data->alamat }}</p></td>
                </tr>
                <tr>
                  <th>Semester</th>
                  <td>:</td>
                  <td>{{ $data->semester }}</td>
                </tr>
                <tr>
                  <th>Jenis Kelamin</th>
                  <td>:</td>
                  <td>{{ $data->jenis_kelamin }}</td>
                </tr>
                <tr>
                  <th>Tahun Akademik</th>
                  <td>:</td>
                  <td>{{ $data->tahun_akademik }}</td>
                </tr>
                <tr>
                  <th>Kode Kelas</th>
                  <td>:</td>
                  <td>{{ $data->kode_kelas }}</td>
                </tr>
                <tr>
                  <th>Kode Jurusan</th>
                  <td>:</td>
                  <td>{{ $data->kode_jurusan }}</td>
                </tr>
              </tbody>
            </table>
            <div class="card mx-3">
              <img src="{{ asset('storage/images/mahasiswa/'.$data->foto) }}" width="200" alt="{{ $data->foto }}">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection