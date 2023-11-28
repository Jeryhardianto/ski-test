
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('assets/backsite/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">SKI-TEST</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/backsite/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

       

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ set_active('dashboard') }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li> 
                <li class="nav-header">TRANSAKSI</li>
                <li class="nav-item">
                    <a href="{{ route('beli.create') }}" class="nav-link {{ set_active(['beli.index', 'beli.show', 'beli.create','beli.edit']) }}">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                             Pembelian
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('stock.index') }}" class="nav-link {{ set_active(['stock.index', 'stock.show', 'stock.create','post.edit']) }}">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                             Stok
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('hutang.index') }}" class="nav-link {{ set_active(['hutang.index', 'hutang.show', 'hutang.create','post.edit']) }}">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                             Piutang
                        </p>
                    </a>
                </li>
                <li class="nav-header">DATA MASTER</li>
                <li class="nav-item">
                    <a href="{{ route('barang.index') }}" class="nav-link {{ set_active(['barang.index', 'barang.show', 'barang.create','barang.edit']) }}">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Data Barang
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('suplier.index') }}" class="nav-link {{ set_active(['suplier.index', 'suplier.show', 'suplier.create','suplier.edit']) }}">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Data Suplier
                        </p>
                    </a>
                </li>
           


          
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>