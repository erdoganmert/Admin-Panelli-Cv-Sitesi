<!-- HEADER -->

<?php include 'header.php' ?>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- NAVBAR -->
    <?php include 'navbar.php' ?>

    <!-- SIDEBAR -->
    <?php include 'sidebar.php' ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <div class="content mt-1 p-0">
            <div class="container-fluid p-0">
                <div class="row">

                    <div class="card card-info col-md-12">
                        <div class="card-header">
                            <h3 class="card-title">Bilgilerim</h3>
                        </div>

                        <!-- VERİTABANI -->
                        <?php
                        $id = 1;
                        $query = $db->prepare("SELECT * FROM bilgiler");
                        $query->execute();
                        $bilgi = $query->fetch(PDO::FETCH_ASSOC);


                        ?>
                        <!-- VERİTABANI SONU -->
                        <!--  ERROR - SUCCESS -->
                        <?php if ($_GET["foto"] == "bos"): ?>
                            <div id="error" class="alert alert-danger">
                                <?php echo "Lütfen fotoğraf seçin" ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($_GET["yukle"] == "basarili"): ?>
                            <div class="alert alert-success">
                                <?php echo "Resim başarılı bir şekilde yüklendi" ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($_GET["alan"] == "bos"): ?>
                            <div id="error" class="alert alert-danger">
                                <?php echo "Boş alan bırakmayınız." ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($_GET["resim"] == "bos"): ?>
                            <div id="error" class="alert alert-danger">
                                <?php echo "Lütfen bir resim seçiniz." ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($_GET["resimsorun"] == "evet"): ?>
                            <div id="error" class="alert alert-danger">
                                <?php echo "Bir sorun oluştu ve resim yüklenemedi." ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($_GET["boyut"] == "fazla"): ?>
                            <div id="error" class="alert alert-danger">
                                <?php echo "Yüklenen resim en fazla 3 Megabayt olmalıdır" ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($_GET["tip"] == "yanlis"): ?>
                            <div id="error" class="alert alert-danger">
                                <?php echo "Resim sadece jpeg, jpg ve png formatında yüklenebilir" ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($_GET["sorun"] == "evet"): ?>
                            <div id="error" class="alert alert-danger">
                                <?php echo "Bir sorun oluştu." ?>
                            </div>
                        <?php endif; ?>


                        <?php if ($_GET["guncelle"] == "basarili"): ?>
                            <div id="success"
                                 class="alert alert-success far fa-check-circle"><?php echo " Güncelleme İşlemi Başarılı Bir Şekilde Gerçekleşti"; ?></div>
                        <?php endif; ?>
                        <!--  ERROR - SUCCESS -->
                        <!-- /.card-header -->
                        <!-- form start -->


                        <form action="bilgilerim-islem.php?bilgi_id=<?= $id ?>" method="POST" class="form-horizontal"
                              enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Fotoğraf</label>
                                        <div class="col-sm-10">
                                            <img src="resimler/<?= $bilgi["bilgi_foto"] ?>" alt="" width="200px"
                                                 style="width:200px; height: 200px;">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="label" class="col-sm-2 col-form-label">Fotoğraf linki</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="bilgi_foto"><br>
                                            <button type="submit" style="margin-top: 5px;">Yükle</button>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="label" class="col-sm-2 col-form-label">Ad Soyad</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="bilgi_isim" name="bilgi_isim"
                                                   value="<?= $bilgi['bilgi_isim'] ?>">
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Meslek</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="bilgi_meslek"
                                                   name="bilgi_meslek"
                                                   value="<?= $bilgi['bilgi_meslek'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Adres</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="bilgi_adres" name="bilgi_adres"
                                                   value="<?= $bilgi['bilgi_adres'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Mail</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="bilgi_mail" name="bilgi_mail"
                                                   value="<?= $bilgi['bilgi_mail'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Telefon</label>
                                        <div class="col-sm-10">
                                            <input type="tel" class="form-control" id="bilgi_tel" name="bilgi_tel"
                                                   value="<?= $bilgi['bilgi_telefon'] ?>">
                                        </div>
                                    </div>


                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <input type="hidden" name="submit" value="1">
                                        <button type="submit" class="btn btn-info">Güncelle</button>
                                    </div>
                                    <!-- /.card-footer -->
                                </div>
                        </form>
                        <!-- END FORM -->
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- FOOTER -->
<?php include 'footer.php' ?>

