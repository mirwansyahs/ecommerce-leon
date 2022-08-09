    <?php 
        $db = db_connect();
        $request = \Config\Services::request();
        $query = $db->table('store')->getWhere([])->getRow(); 
    ?>
    <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <img alt="image" src="/img/logo/<?= $query->image; ?>" class="rounded-circle mr-1" width="50px" height="50px">
            <a href="dashboard"><?= $query->name; ?></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <img alt="image" src="/img/logo/<?= $query->image; ?>" class="rounded-circle" width="50px" height="50px">
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="<?= $request->uri->getSegment(1) == 'dashboard' || $request->uri->getSegment(1) == '' ? 'active' : ''?>">
                <a class="nav-link" href="<?= site_url('dashboard')?>"><i class="fa fa-fire"></i> <span>Dashboard</span></a>
            </li>
            <li class="menu-header">Menu</li>
            <li class="dropdown <?= $request->uri->getSegment(1) == 'brand' || $request->uri->getSegment(1) == 'kategori' || $request->uri->getSegment(1) == 'ukuran' || $request->uri->getSegment(1) == 'warna' || $request->uri->getSegment(1) == 'produk' ? 'active' : ''?>">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-tshirt"></i> <span>Katalog</span></a>
            <ul class="dropdown-menu">              
                <li class="<?= $request->uri->getSegment(1) == 'brand' ? 'active' : ''?>">
                    <a class="nav-link" href="<?= site_url('brand')?>">Brand</a>
                </li>                
                <li class="<?= $request->uri->getSegment(1) == 'kategori' ? 'active' : ''?>">
                    <a class="nav-link" href="<?= site_url('kategori')?>">Kategori</a>
                </li>                
                <li class="<?= $request->uri->getSegment(1) == 'ukuran' ? 'active' : ''?>">
                    <a class="nav-link" href="<?= site_url('ukuran')?>">Ukuran</a>
                </li>                
                <li class="<?= $request->uri->getSegment(1) == 'warna' ? 'active' : ''?>">
                    <a class="nav-link" href="<?= site_url('warna')?>">Warna</a>
                </li>                
                <li class="<?= $request->uri->getSegment(1) == 'produk' ? 'active' : ''?>">
                    <a class="nav-link" href="<?= site_url('produk')?>">Produk</a>
                </li>                
            </ul>
            </li>
            <li class="<?= $request->uri->getSegment(1) == 'diskon' || $request->uri->getSegment(1) == '' ? 'active' : ''?>">
                <a class="nav-link" href="<?= site_url('diskon')?>"><i class="fas fa-percent"></i> <span>Diskon</span></a>
            </li>
            <li class="<?= $request->uri->getSegment(1) == 'jasa-pengiriman' || $request->uri->getSegment(1) == '' ? 'active' : ''?>">
                <a class="nav-link" href="<?= site_url('jasa-pengiriman')?>"><i class="fas fa-truck"></i> <span>Jasa Pengiriman</span></a>
            </li>
            <li class="dropdown <?= $request->uri->getSegment(1) == 'orderan-masuk' || $request->uri->getSegment(1) == 'orderan-dikirim' || $request->uri->getSegment(1) == 'orderan-diterima' ? 'active' : ''?>">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-shopping-bag"></i> <span>Order</span></a>
            <ul class="dropdown-menu">              
                <li class="<?= $request->uri->getSegment(1) == 'orderan-masuk' ? 'active' : ''?>">
                    <a class="nav-link" href="<?= site_url('orderan-masuk')?>">Orderan Masuk</a>
                </li>                
                <li class="<?= $request->uri->getSegment(1) == 'orderan-dikirim' ? 'active' : ''?>">
                    <a class="nav-link" href="<?= site_url('orderan-dikirim')?>">Orderan Dikirim</a>
                </li>                
                <li class="<?= $request->uri->getSegment(1) == 'orderan-diterima' ? 'active' : ''?>">
                    <a class="nav-link" href="<?= site_url('orderan-diterima')?>">Orderan Diterima</a>
                </li>                
            </ul>
            </li>
            <li class="<?= $request->uri->getSegment(1) == 'pelanggan' || $request->uri->getSegment(1) == '' ? 'active' : ''?>">
                <a class="nav-link" href="<?= site_url('pelanggan')?>"><i class="fas fa-user"></i> <span>Pelanggan</span></a>
            </li>
            <!-- <li class="<?= $request->uri->getSegment(1) == 'chat' || $request->uri->getSegment(1) == '' ? 'active' : ''?>">
                <a class="nav-link" href="<?= site_url('chat')?>"><i class="fas fa-comment-alt"></i> <span>Chat</span></a>
            </li> -->
            <li class="<?= $request->uri->getSegment(1) == 'laporan' || $request->uri->getSegment(1) == '' ? 'active' : ''?>">
                <a class="nav-link" href="<?= site_url('laporan')?>"><i class="fas fa-chart-pie"></i> <span>Laporan</span></a>
            </li>
            <li class="menu-header">Pengaturan</li>
            <li class="<?= $request->uri->getSegment(1) == 'profil' || $request->uri->getSegment(1) == '' ? 'active' : ''?>">
                <a class="nav-link" href="<?= site_url('profil')?>"><i class="far fa-user"></i> <span>Profil</span></a>
            </li>
            <li class="<?= $request->uri->getSegment(1) == 'ubah-kata-sandi' || $request->uri->getSegment(1) == '' ? 'active' : ''?>">
                <a class="nav-link" href="<?= site_url('ubah-kata-sandi')?>"><i class="fas fa-key"></i> <span>Ubah Kata Sandi</span></a>
            </li>
            <li class="<?= $request->uri->getSegment(1) == 'pengaturan' || $request->uri->getSegment(1) == '' ? 'active' : ''?>">
                <a class="nav-link" href="<?= site_url('pengaturan')?>"><i class="fas fa-cog"></i></i> <span>Pengaturan</span></a>
            </li>
            <li class="mb-4"><a class="nav-link" href="<?= site_url('keluar')?>"><i class="fas fa-sign-out-alt"></i></i> <span>Keluar</span></a></li>
        </ul>     
    </aside>
</div>
