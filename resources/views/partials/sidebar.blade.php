<nav class="sidebar sidebar-offcanvas" id="sidebar">
  @if (Auth()->user()->isAdmin == 1)
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="fa-solid fa-gauge mx-3"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('mahasiswa.index') }}">
        <i class="fa-solid fa-user mx-3"></i>
        <span class="menu-title">Data Mahasiswa</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('krs.index') }}">
        <i class="fa-solid fa-id-card mx-3"></i>
        <span class="menu-title">Kartu Rencana Studi</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="fa-solid fa-graduation-cap mx-3"></i>
        <span class="menu-title">Akademik</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ route('matakuliah.index') }}">Mata Kuliah</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('kelas.index') }}">Kelas</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('jurusan.index') }}">Jurusan</a></li>
        </ul>
      </div>
    </li>
  </ul>
      
  @else
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('mahasiswa.index') }}">
        <i class="fa-solid fa-user mx-3"></i>
        <span class="menu-title">Data Mahasiswa</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('krs.index') }}">
        <i class="fa-solid fa-id-card mx-3"></i>
        <span class="menu-title">Kartu Rencana Studi</span>
      </a>
    </li>
  </ul>
  @endif
  
</nav>