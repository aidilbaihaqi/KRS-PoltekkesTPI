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
          <a class="btn btn-md btn-info" href="{{ route('user.create') }}">
            Tambah data
           </a>
         </div>
        </div>
      </div>
    </div>
  </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Data user</h4>
          <p class="card-description">
            Berikut adalah data-data user
          </p>
          <div class="table-responsive table-hover">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>NIM</th>
                  <th>Hak Akses</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $d)
                  <tr>
                    <td>
                      <a class="btn btn-sm btn-danger" href="{{ route('user.destroy', $d->id) }}">Hapus</a>
                      <a class="btn btn-sm btn-success" href="{{ route('user.edit', $d->id) }}">Edit</a>
                    </td>
                    <td>{{ $d->name }}</td>
                    <td>{{ $d->email }}</td>
                    <td><span class="font-weight-bold text-primary">{{ $d->nim }}</span></td>
                    <td>
                      @if ($d->isAdmin == 1)
                          Admin
                      @else
                          Mahasiswa
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