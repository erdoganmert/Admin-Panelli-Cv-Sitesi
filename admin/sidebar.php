<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <?php
        $bilgiler = $db -> prepare("SELECT * FROM bilgiler");
        $bilgiler -> execute();
        $bilgi = $bilgiler -> fetch(PDO::FETCH_ASSOC);
    ?>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="resimler/<?= $bilgi['bilgi_foto'] ?>" class="img-circle elevation-2" alt="User Image" style="height: 40px;">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $bilgi['bilgi_isim'] ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Starter Pages
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Active Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inactive Page</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Simple Link
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>

                 -->


                <li><a href="bilgilerim.php"><i class="fas fa-user fa-lg"></i>  Bilgilerim</a></li><br>
                <li><a href="becerilerim.php"><i class="fas fa-star fa-lg"></i>Becerilerim</a></li><br>
                <li><a href="dillerim.php"><i class="fas fa-globe-americas fa-lg"></i> Dillerim</a></li><br>
                <li><a href="islerim.php"><i class="fas fa-briefcase fa-lg"></i> İşlerim</a></li><br>
                <li><a href="projelerim.php"><i class="fas fa-code fa-lg"></i>Projelerim</a></li><br>
                <li><a href="okullarim.php"><i class="fas fa-certificate fa-lg"></i>Okullarım</a></li><br>
                <li><a href="sosyal-medya.php"><i class="fas fa-share-alt-square fa-lg"></i>Sosyal Medya</a></li><br>
                <li><a href="genel-ayarlar.php"><i class="fas fa-cog fa-lg"></i>Genel Ayarlar</a></li>



            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3" style = "display:flex; flex-direction: column">
        <h5>Kullanıcı Adı -> Düzenlenecek</h5>
        <a href="#">Profil</a>
        <a href="../index.php">Siteye Git</a>
        <a href="#">Çıkış Yap</a>

    </div>
</aside>
<!-- /.control-sidebar -->