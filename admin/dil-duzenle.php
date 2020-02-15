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

                    <div class="card card-info " style="width: 110%;">
                        <div class="card-header">
                            <h3 class="card-title">Dil Düzenle</h3>
                        </div>
                        <?php if ($_GET["dil"] == "bos"): ?>
                            <div id="error" class="alert alert-danger">
                                <?php echo "Bildiğiniz dili Giriniz.." ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($_GET["yuzde"] == "bos"): ?>
                            <div id="error" class="alert alert-danger">
                                <?php echo "Yüzdeyi Giriniz.." ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($_GET["gecersizdeger"] == "evet"): ?>
                            <div id="error" class="alert alert-danger">
                                <?php echo "Dil Yüzdeniz 0 - 100 arasında olmalıdır.." ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($_GET["sorun"] == "evet"): ?>
                            <div id="error" class="alert alert-danger">
                                <?php echo "Bir Sorun Oluştu" ?>
                            </div>
                        <?php endif; ?>

                        <?php
                        $dil_id = $_GET['dil_id'];
                        $query = $db->prepare("SELECT * FROM diller WHERE dil_id=?");
                        $query->execute([$dil_id]);
                        $dil = $query->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="dil-islem.php?dil_id=<?= $dil_id ?>" method="POST"
                              class="form-horizontal">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="label" class="col-sm-2 col-form-label">Dil Adı</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="dil_adi"
                                               value="<?= (isset($_GET['dil_adi']) ? $_GET['dil_adi'] : $dil['dil']);?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="label" class="col-sm-2 col-form-label">Yüzde(%)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="dil_yuzde"
                                               value="<?= (isset($_GET['dil_yuzde']) ? $_GET['dil_yuzde'] : $dil['yuzde']); ?>">
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <input type="hidden" name="dil_duzenle" value="1">
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

