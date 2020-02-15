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

                    <div class="card card-info col-md-12">
                        <div class="card-header">
                            <h3 class="card-title">İş Ekle</h3>
                        </div>
                        <?php if ($_GET["deger"] == "bos"): ?>
                            <div id="error" class="alert alert-danger">
                                <?php echo "Bitiş Tarihi dışındaki alanları doldurmak zorunludur.." ?>
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
                        <form action="is-islem.php" method="POST"
                              class="form-horizontal">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="label" class="col-sm-2 col-form-label">İş Adı</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="is_adi"
                                               value="<?= (isset($_GET['is_adi']) ? $_GET['is_adi'] : $is['is_adi']); ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="label" class="col-sm-2 col-form-label">Link</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="is_link"
                                               value="<?= (isset($_GET['is_link']) ? $_GET['is_link'] : $is['is_link']); ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="label" class="col-sm-2 col-form-label">Açıklama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="is_aciklama"
                                               value="<?= (isset($_GET['is_aciklama']) ? $_GET['is_aciklama'] : $is['is_aciklama']); ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="label" class="col-sm-2 col-form-label">Başlangıç Tarihi</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="tarih form-control" id="bas_tarih" name="bas_tarih"
                                               value="<?= (isset($_GET['bas_tarih']) ? $_GET['bas_tarih'] : $is['bas_tarih']); ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="label" class="col-sm-2 col-form-label">Bitiş Tarihi</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="tarih form-control" id="bit_tarih" name="bit_tarih"
                                               value="<?= (isset($_GET['bit_tarih']) ? $_GET['bit_tarih'] : $is['bit_tarih']); ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="label" class="col-sm-2 col-form-label">Devam Durumu</label>
                                    <div class="col-sm-10" style="margin-top: 8px;">
                                        <label class="radio-inline">
                                            <input class="radio" id="r_evet"  type="radio" name="devam" value="1"> Evet
                                        </label>
                                        <label class="radio-inline">
                                            <input class="radio" id="r_hayir" type="radio" name="devam"  value="2" style="margin-left: 10px;"> Hayır
                                        </label>

                                    </div>
                                </div>

                                <div class="card-footer">
                                    <input type="hidden" name="is_ekle" value="1">
                                    <button type="submit" class="btn btn-info">Ekle</button>
                                </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
<script>


</script>
<!-- FOOTER -->
<?php include 'footer.php' ?>

