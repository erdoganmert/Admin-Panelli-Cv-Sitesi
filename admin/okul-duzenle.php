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
                            <h3 class="card-title">Okul Düzenle</h3>
                        </div>
                        <?php if ($_GET["okul"] == "bos"): ?>
                            <div id="error" class="alert alert-danger">
                                <?php echo "Bitiş tarihi dışında boş alan bırakılamaz" ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($_GET["kucuk"] == "evet"): ?>
                            <div id="error" class="alert alert-danger">
                                <?php echo "Bitiş tarihi başlangıç tarihinden küçük olamaz" ?>
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

                        <?php
                        $okul_id = $_GET['okul_id'];
                        $query = $db->prepare("SELECT * FROM okullar WHERE okul_id=?");
                        $query->execute([$okul_id]);
                        $okul = $query->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="okul-islem.php?okul_id=<?= $okul_id ?>" method="POST"
                              class="form-horizontal">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="label" class="col-sm-2 col-form-label">Okul Adı</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="okul_adi"
                                               placeholder="Okulunuzun Adını Giriniz.."
                                               value="<?= (isset($_GET['okul_adi']) ? $_GET['okul_adi'] : $okul['okul_adi']); ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="label" class="col-sm-2 col-form-label">Açıklama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="okul_aciklama"
                                               placeholder="Okul Derecesini Giriniz(Lise,üniversite vb)"
                                               value="<?= (isset($_GET['okul_aciklama']) ? $_GET['okul_aciklama'] : $okul['okul_aciklama']); ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="label" class="col-sm-2 col-form-label">Başlangıç Tarihi</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="bas_tarih" class="form-control" name="bas_tarih"
                                               placeholder="Başlangıç Tarihinizi Giriniz "
                                               value="<?= (isset($_GET['bas_tarih']) ? $_GET['bas_tarih'] : $okul['bas_tarih']); ?> ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="label" class="col-sm-2 col-form-label">Bitiş Tarihi</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="bit_tarih" class="form-control" name="bit_tarih"
                                               placeholder="Bitirdiğiniz Tarihi Giriniz"
                                               value="<?= (isset($_GET['bit_tarih']) ? $_GET['bit_tarih'] : $okul['bit_tarih']); ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="label" class="col-sm-2 col-form-label">Devam Durumu</label>
                                    <div class="col-sm-10" style="margin-top: 8px;">
                                        <label class="radio-inline">
                                            <input class="radio devam" id="r_evet" type="radio" name="devam" value="1"

                                                   <?php if ($okul['okul_devam'] == 1): ?>
                                                        <?php echo 'checked' ?>
                                                   <?php endif; ?>>
                                            Evet
                                        </label>
                                        <label class="radio-inline">
                                            <input class="radio devam" id="r_hayir" type="radio" name="devam" value="2"
                                                   style="margin-left: 10px;"

                                                   <?php if ($okul['okul_devam'] == 2): ?>
                                                        <?php echo 'checked' ?>
                                                   <?php endif; ?>>
                                            Hayır
                                        </label>

                                    </div>
                                </div>

                                <div class="card-footer">
                                    <input type="hidden" name="okul_duzenle" value="1">
                                    <button type="submit" class="btn btn-info">Düzenle</button>
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

