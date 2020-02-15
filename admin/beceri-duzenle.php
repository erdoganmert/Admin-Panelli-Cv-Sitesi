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
                <div class="row" >

                    <div class="card card-info col-md-12">
                        <div class="card-header">
                            <h3 class="card-title">Beceri Düzenle</h3>
                        </div>
                        <?php if ($_GET["beceri"] == "bos"): ?>
                            <div id="error" class="alert alert-danger">
                                <?php echo "Becerinizi Giriniz.." ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($_GET["yuzde"] == "bos"): ?>
                            <div id="error" class="alert alert-danger">
                                <?php echo "Yüzdeyi Giriniz.." ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($_GET["gecersizdeger"] == "evet"): ?>
                            <div id="error" class="alert alert-danger">
                                <?php echo "Beceri Yüzdeniz 0 - 100 arasında olmalıdır.." ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($_GET["sorun"] == "evet"): ?>
                            <div id="error" class="alert alert-danger">
                                <?php echo "Bir Sorun Oluştu" ?>
                            </div>
                        <?php endif; ?>

                        <?php
                        $beceri_id = $_GET['beceri_id'];
                        $query = $db->prepare("SELECT * FROM beceriler WHERE beceri_id=?");
                        $query->execute([$beceri_id]);
                        $beceri = $query->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="beceri-islem.php?beceri_id=<?= $beceri_id ?>" method="POST"
                              class="form-horizontal">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="label" class="col-sm-2 col-form-label">Beceri Adı</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="beceri_adi"
                                               value="<?= (isset($_GET['beceri_adi']) ? $_GET['beceri_adi'] : $beceri['beceri_adi']); ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="label" class="col-sm-2 col-form-label">Yüzde(%)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="beceri_yuzde"
                                               value="<?= (isset($_GET['beceri_yuzde']) ? $_GET['beceri_yuzde'] : $beceri['beceri_yuzde']); ?>">
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <input type="hidden" name="beceri_duzenle" value="1">
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

