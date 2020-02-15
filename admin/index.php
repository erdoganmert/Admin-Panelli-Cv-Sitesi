<!-- HEADER -->

<?php include 'header.php' ?>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- NAVBAR -->
    <?php include 'navbar.php' ?>

    <!-- SIDEBAR -->
    <?php include 'sidebar.php' ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-right: 8px;">


        <!-- Main content -->
        <div class="content mt-1 p-0">
            <div class="container-fluid p-0">
                <div class="row">

                    <div class="card card-info col-md-4">

                        <?php
                            $beceriler = $db -> prepare("SELECT * FROM beceriler");
                            $beceriler -> execute();
                            $beceri_sayi = $beceriler->rowCount();

                        ?>
                            <div class="card-header">
                                <h5 class="mt-0">Becerilerim</h5>
                            </div>
                            <div class="card-body text-center">
                                    <span class="card-text text-center" style="font-size: 45px;"><?= $beceri_sayi?></span>
                                <p>Adet</p>
                                <a href="becerilerim.php" class="btn btn-primary">Görüntüle</a>
                            </div>

                    </div>
                    <div class="col-md-4">

                        <?php
                        $diller = $db -> prepare("SELECT * FROM diller");
                        $diller -> execute();
                        $dil_sayi = $diller->rowCount();

                        ?>
                        <div class="card card-warning">
                            <div class="card-header">
                                <h5 class="mt-0">Dillerim</h5>
                            </div>
                            <div class="card-body text-center">
                                <span class="card-text text-center" style="font-size: 45px;"><?= $dil_sayi?></span>
                                <p>Adet</p>
                                <a href="dillerim.php" class="btn btn-primary">Görüntüle</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">

                        <?php
                        $isler = $db -> prepare("SELECT * FROM isler");
                        $isler -> execute();
                        $is_sayi = $isler->rowCount();

                        ?>
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h5 class="mt-0">İşlerim</h5>
                            </div>
                            <div class="card-body text-center">
                                <span class="card-text text-center" style="font-size: 45px;"><?= $is_sayi?></span>
                                <p>Adet</p>
                                <a href="islerim.php" class="btn btn-primary">Görüntüle</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <?php
                        $projeler = $db -> prepare("SELECT * FROM projeler");
                        $projeler -> execute();
                        $proje_sayi = $projeler->rowCount();

                        ?>
                        <div class="card card-danger">
                            <div class="card-header">
                                <h5 class="mt-0">Projelerim</h5>
                            </div>
                            <div class="card-body text-center">
                                <span class="card-text text-center" style="font-size: 45px;"><?= $proje_sayi?></span>
                                <p>Adet</p>
                                <a href="projelerim.php" class="btn btn-primary">Görüntüle</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <?php
                        $okullar = $db -> prepare("SELECT * FROM okullar");
                        $okullar -> execute();
                        $okul_sayi = $okullar->rowCount();

                        ?>
                        <div class="card card-primary">
                            <div class="card-header">
                                <h5 class="mt-0">Okullarım</h5>
                            </div>
                            <div class="card-body text-center">
                                <span class="card-text text-center" style="font-size: 45px;"><?= $okul_sayi?></span>
                                <p>Adet</p>
                                <a href="okullarim.php" class="btn btn-primary">Görüntüle</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <?php include 'footer.php' ?>
</div>
