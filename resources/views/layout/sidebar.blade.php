<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="user-wrapper">
                    <div class="profile-image">
                        <img src="{{asset('storage/'.Auth()->user()->foto)}}" alt="profile image">
                    </div>
                    <div class="text-wrapper">
                        <p class="profile-name">{{Auth()->user()->nama}}</p>
                        <div>
                            <small class="designation text-muted">Manager</small>
                            <span class="status-indicator online"></span>
                        </div>
                    </div>
                </div>
                <button class="btn btn-success btn-block">New Project
                    <i class="mdi mdi-plus"></i>
                </button>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="menu-icon mdi mdi-television"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon mdi mdi-database"></i>
                <span class="menu-title">Master Data</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('user.index')}}"> <i
                                class="menu-icon mdi mdi-account-multiple-outline"></i>User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('barang.index')}}"> <i
                                class="menu-icon mdi mdi-package-variant-closed"></i>Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('kategori.index')}}"> <i
                                class="menu-icon mdi  mdi-dice-multiple"></i>Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('ruangan.index')}}"><i
                                class="menu-icon mdi  mdi-home-outline"></i>Ruangan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('supplier.index')}}"><i
                                class="menu-icon mdi  mdi-store"></i>Supplier</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false"
                aria-controls="ui-basic1">
                <i class="menu-icon mdi mdi-cash-usd"></i>
                <span class="menu-title">Transaksi</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic1">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('pengadaan.index')}}"> <i class="menu-icon mdi mdi-inbox-arrow-up"></i>Barang Masuk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('pemeliharaan.index')}}"> <i class="menu-icon mdi mdi-settings"></i>Pemeliharaan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('penyusutan.index')}}"> <i class="menu-icon mdi mdi-inbox-arrow-down"></i>Barang Keluar</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false"
                aria-controls="ui-basic2">
                <i class="menu-icon mdi mdi-file-document"></i>
                <span class="menu-title">Laporan</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic2">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link " href=""> <i class="menu-icon mdi mdi-inbox-arrow-up"></i>Barang Masuk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href=""> <i class="menu-icon mdi mdi-settings"></i>Pemeliharaan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href=""> <i class="menu-icon mdi mdi-inbox-arrow-down"></i>Barang Keluar</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
