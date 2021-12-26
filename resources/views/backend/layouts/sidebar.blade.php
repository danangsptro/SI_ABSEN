<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{ route('dashboard') }}">ABSEN SISWA</a>
            <a class="navbar-brand hidden" href="#">A</a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ route('dashboard') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard
                    </a>
                </li>
                {{-- <li>
                    <a href="{{ route('index-user') }}"> <i class="menu-icon fa fa-user"></i>User
                    </a>
                </li> --}}
                @if (Auth::user()->user_role == 'staff')
                    <h3 class="menu-title">UI elements</h3>

                    <li>
                        <a href="{{ route('mata-pelajaran') }}"> <i class="menu-icon fa fa-book"></i>Mata Pelajaran
                        </a>
                        <a href="{{ route('rombel') }}"> <i class="menu-icon fa fa-folder"></i>Tingkat Kelas
                        </a>
                    </li>

                @endif

                <h3 class="menu-title">Data</h3>
                    <li>
                        <a href="{{ route('absen-siswa') }}"> <i class="menu-icon fa fa-folder"></i>Data Absen
                        </a>
                    </li>
                <li>
                    <a href={{ route('siswa') }}> <i class="menu-icon fa fa-folder"></i>Data Siswa
                    </a>
                </li>
                {{-- <li class="menu-item-has-children dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Laporan</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li>
                            <i class="fa fa-table"></i><a href="">Lihat Laporan</a>
                        </li>
                    </ul>
                </li> --}}
                {{-- <h3 class="menu-title">USER</h3>
                <li class="menu-item-has-children dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Test</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li>
                            <i class="fa fa-table"></i><a href="">User</a>
                        </li>
                    </ul>
                </li> --}}
            </ul>
        </div>
    </nav>
</aside>
