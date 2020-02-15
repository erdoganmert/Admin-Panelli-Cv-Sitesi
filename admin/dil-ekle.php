<!-- HEADER -->

<?php include 'header.php' ?>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- NAVBAR -->
    <?php include 'navbar.php' ?>

    <!-- SIDEBAR -->
    <?php include 'sidebar.php' ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-right: 9px;">

        <!-- Main content -->
        <div class="content mt-1 p-0">
            <div class="container-fluid p-0">
                <div class="row">

                    <div class="card card-info col-md-12">
                        <div class="card-header">
                            <h3 class="card-title">Dil Ekle</h3>
                        </div>
                        <?php if ($_GET["dil"] == "bos"): ?>
                            <div id="error" class="alert alert-danger">
                                <?php echo "Bildiğiniz Dili Giriniz.." ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($_GET["yuzde"] == "bos"): ?>
                            <div id="error" class="alert alert-danger">
                                <?php echo "Yüzdeyi Giriniz.." ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($_GET["gecersizdeger"] == "evet"): ?>
                            <div id="error" class="alert alert-danger">
                                <?php echo "Dil bilme Yüzdeniz 0 - 100 arasında olmalıdır.." ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($_GET["sorun"] == "evet"): ?>
                            <div id="error" class="alert alert-danger">
                                <?php echo "Bir Sorun Oluştu" ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($_GET["ekle"] == "basarili"): ?>
                            <div id="success"
                                 class="alert alert-success far fa-check-circle"><?php echo " Güncelleme İşlemi Başarılı Bir Şekilde Gerçekleşti"; ?></div>
                        <?php endif; ?>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="dil-islem.php" method="POST" class="form-horizontal">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="label" class="col-sm-2 col-form-label">Dil Adı</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="dil_adi"
                                               placeholder="Bildiğiniz dilin Adını Giriniz.."
                                               value="<?= $_GET["dil_adi"] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="label" class="col-sm-2 col-form-label">Yüzde(%)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="dil_yuzde"
                                               placeholder="Dil bilme Yüzdenizi Girin.."
                                               value="<?= $_GET["dil_yuzde"] ?>">
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <input type="hidden" name="dil_ekle" value="1">
                                    <button type="submit" class="btn btn-info">Ekle</button>
                                </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
<!-- FOOTER -->
<?php include 'footer.php' ?>

