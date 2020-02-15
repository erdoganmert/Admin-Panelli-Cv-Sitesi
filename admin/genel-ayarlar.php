<!-- HEADER -->

<?php include 'header.php' ?>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- NAVBAR -->
    <?php include 'navbar.php' ?>

    <!-- SIDEBAR -->
    <?php include 'sidebar.php' ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-right: 10px;">

        <!-- Main content -->
        <div class="content mt-1 p-0">
            <div class="container-fluid p-0">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Genel Ayarlar</h3>
                            </div>
                        </div>
                        <?php if ($_GET["title"] == "bos"): ?>
                            <div id="error" class="alert alert-danger">
                                <?php echo "Site Başlığını Giriniz" ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($_GET["url"] == "bos"): ?>
                            <div id="error" class="alert alert-danger">
                                <?php echo "URL giriniz" ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($_GET["desc"] == "bos"): ?>
                            <div id="error" class="alert alert-danger">
                                <?php echo "Site Tanımı Giriniz" ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($_GET["key"] == "bos"): ?>
                            <div id="error" class="alert alert-danger">
                                <?php echo "Anahtar Kelime Giriniz" ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($_GET["sorun"] == "evet"): ?>
                            <div id="error" class="alert alert-danger">
                                <?php echo "Bir Sorun Oluştu" ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($_GET["guncelle"] == "basarili"): ?>
                            <div id="success"
                                 class="alert alert-success far fa-check-circle"><?php echo " Güncelleme İşlemi Başarılı Bir Şekilde Gerçekleşti"; ?></div>
                        <?php endif; ?>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="genel-ayar-islem.php?site_id=<?= $id ?>" method="POST" class="form-horizontal">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="label" class="col-sm-2 col-form-label">Site Başlığı</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="site_baslik" name="site_title"
                                               value="<?= $ayar['site_title'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Site URL</label>
                                    <div class="col-sm-10">
                                        <input type="url" class="form-control" id="site_url" name="site_url"
                                               value="<?= $ayar['site_url'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Site Tanımı</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputEmail3" name="site_desc"
                                               value="<?= $ayar['site_desc'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Anahtar Kelimeler</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="site_keywords" name="site_keyword"
                                               value="<?= $ayar['site_keyword'] ?>">
                                    </div>
                                </div>

                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <input type="hidden" name="submit" value="1">
                                    <button type="submit" class="btn btn-info">Güncelle</button>
                                </div>
                                <!-- /.card-footer -->
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
<!-- FOOTER -->
<?php include 'footer.php' ?>

