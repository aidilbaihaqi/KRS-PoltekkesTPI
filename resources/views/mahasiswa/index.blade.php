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
          <a class="btn btn-md btn-info" href="{{ route('mahasiswa.create') }}">
            Tambah data
           </a>
         </div>
        </div>
      </div>
    </div>
  </div>

  @if ($message = Session::get('success'))
    <div class="alert alert-success">
      {{ $message }}
    </div>
  @endif

  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Data mahasiswa</h4>
          <p class="card-description">
            Berikut adalah data-data mahasiswa yang dapat dicari berdasarkan <b>NIM</b>
          </p>
          <div class="col-lg-7">
            <form action="{{ route('mahasiswa.search') }}" method="get">
              <div class="input-group">
                <input class="form-control" name="search" placeholder="Cari data">
                <button type="submit" class="btn btn-sm btn-primary">Cari</button>
              </div>
            </form>
          </div>
          <div class="table-responsive table-hover">
            <table id="dataTable" class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>Semester</th>
                  <th>Tahun Akademik</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $d)
                  <tr>
                    <td>
                      <a class="btn btn-sm btn-danger" href="{{ route('mahasiswa.destroy', $d->nim) }}"><i class="fa-solid fa-trash"></i></a>
                      <a class="btn btn-sm btn-success" href="{{ route('mahasiswa.edit', $d->nim) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                      <a class="btn btn-sm btn-info" href="{{ route('mahasiswa.show', $d->nim) }}"><i class="fa-solid fa-circle-info"></i></a>
                    </td>
                    <td><span class="font-weight-bold text-primary">{{ $d->nim }}</span></td>
                    <td>{{ $d->nama }}</td>
                    <td>{{ $d->jenis_kelamin }}</td>
                    <td>{{ $d->semester }}</td>
                    <td>{{ $d->tahun_akademik }}</td>
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