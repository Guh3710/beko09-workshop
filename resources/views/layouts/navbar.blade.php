@php
    $role = strtolower(auth()->user()->role);
    $avatar =
        $role === 'admin'
            ? asset('adminlte3/dist/img/admin.png')
            : ($role === 'pelanggan'
                ? asset('adminlte3/dist/img/pelanggan.png')
                : asset('adminlte3/dist/img/user.png'));

    $badgeColor = $role === 'admin' ? 'badge-info' : ($role === 'pelanggan' ? 'badge-success' : 'badge-secondary');
@endphp
<nav class="main-header navbar navbar-expand navbar-dark elevation-2">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="{{ $avatar }}" class="user-image img-circle elevation-2" alt="User Image">
                <b><span class="d-none d-md-inline">{{ auth()->user()->nama }}</span></b>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-righ bg-secondary">
                <li class="user-header bg-dark">
                    <img src="{{ $avatar }}" class="img-circle elevation-2" alt="User Image">
                    <p>
                        <b>{{ auth()->user()->nama }}</b>
                    <div>
                        <span class="badge {{ $badgeColor }}">
                            <i class="fas fa-user mr-1"></i>{{ auth()->user()->role }}
                        </span>
                    </div>
                    </p>
                </li>
                <div class="d-flex justify-content-between my-2 px-3">
                    <form id="logout-form.keluar" action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="button" class="btn btn-sm btn-danger px-4 py-2" onclick="confirmLogout(event)">
                            <i class="fas fa-sign-out-alt mr-1"></i><b>Keluar</b>
                        </button>
                    </form>
                    <button type="submit" class="btn btn-sm btn-warning px-4 py-2">
                        <i class="fas fa-caravan mr-1"></i><b>Ke Beko</b>
                    </button>
                </div>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
</nav>
