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

        <?php
        $id = 1;
        $query = $db->prepare("SELECT * FROM sosyal");
        $query->execute();
        $sosyal = $query->fetch(PDO::FETCH_ASSOC);

        ?>

        <!-- Main content -->
        <div class="content mt-1 p-0">
            <div class="container-fluid p-0">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Sosyal Medya</h3>
                            </div>
                        </div>
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
                        <form action="sosyal-medya-islem.php?sosyal_id=<?= $id ?>" method="POST"
                              class="form-horizontal">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="label" class="col-sm-2 col-form-label">Linkedin</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="linkedin"
                                               value="<?= $sosyal['linkedin'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">İnstagram</label>
                                    <div class="col-sm-10">
                                        <input type="url" class="form-control" name="instagram"
                                               value="<?= $sosyal['instagram'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Facebook</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputEmail3" name="facebook"
                                               value="<?= $sosyal['facebook'] ?>">
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

