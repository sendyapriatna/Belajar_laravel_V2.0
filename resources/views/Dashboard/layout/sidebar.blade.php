<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <p class="nav-link text-success"><i class="bi bi-person-circle"></i> Hi, {{ auth()->user()->name }}</p>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Request::is('dashboard*')? 'active' : ''}}" aria-current="page" href="/dashboard">
                    <i class="bi bi-house-door"></i>
                    Dashboard
                </a>
            </li>
            @can('admin')
            <li class="nav-item">
                <a class="nav-link {{Request::is('mahasiswa*')? 'active' : ''}}" href="/mahasiswa">
                    <i class="bi bi-person-plus"></i>
                    Data Mahasiswa
                </a>
            </li>
            @endcan
            <li class="nav-item">
                <a class="nav-link {{Request::is('matkul*')? 'active' : ''}}" href="/matkul">
                    <i class="bi bi-journal-plus"></i>
                    Data Mata Kuliah
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Request::is('nilai*')? 'active' : ''}}" href="/nilai">
                    <i class="bi bi-clipboard-check"></i>
                    Detail Informasi
                </a>
            </li>
        </ul>
        <div class="fixed-bottom text-center">
            <p class="mt-3 mb-3 text-muted">&copy; Sendy Apriatna 2022</p>
        </div>

    </div>
</nav>