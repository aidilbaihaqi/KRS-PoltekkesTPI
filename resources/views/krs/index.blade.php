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
          <a class="btn btn-md btn-info" href="{{ route('krs.create') }}">
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
          <h4 class="card-title">Data KRS</h4>
          <p class="card-description">
            Berikut adalah data-data Kartu Rencana Studi mahasiswa yang dapat dicari berdasarkan <b>NIM</b>
          </p>
          <div class="col-lg-7">
            <form action="{{ route('krs.search') }}" method="get">
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
                  <th>Kode KRS</th>
                  <th>NIM</th>
                  <th>Kode MK Pilihan</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $d)
                  <tr>
                    <td>
                      <a class="btn btn-sm btn-danger" href="{{ route('krs.destroy', $d->kode_krs) }}"><i class="fa-solid fa-trash"></i></a>
                      <a class="btn btn-sm btn-success" href="{{ route('krs.edit', $d->kode_krs) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                    </td>
                    <td><span class="font-weight-bold text-primary">{{ $d->kode_krs }}</span></td>
                    <td>{{ $d->nim }}</td>
                    <td>{{ $d->kode_mk }}</td>
                    <td>
                      @if ($d->status == 0)
                      <button class="btn btn-sm btn-secondary" disabled>Belum disetujui</button>
                      @else
                      <button class="btn btn-sm btn-success" disabled>Disetujui</button>
                      @endif
                    </td>
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