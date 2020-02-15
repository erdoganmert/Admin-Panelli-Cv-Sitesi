<!-- HEADER -->

<?php include 'header.php' ?>

<body class="hold-transition sidebar-mini" style="width: 99%">
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

                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Dillerim</h3>
                                <a href="dil-ekle.php" type="submit" class="btn btn-light"
                                   style="float: right; color: #17a2b8; border-radius: 5%"
                                   title="dil Ekle"><i class="fas fa-plus-circle"></i> Dil Ekle </a>
                            </div>
                        </div>
                        <!-- VERİTABANI -->
                        <?php
                        $query = $db->prepare("SELECT * FROM diller ORDER BY dil_id DESC ");
                        $query->execute();
                        $dil = $query->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <!-- VERİTABANI SONU -->
                        <!--  ERROR - SUCCESS -->
                        <?php if ($_GET["alan"] == "bos"): ?>
                            <div id="error" class="alert alert-danger">
                                <?php echo "Boş alan bırakmayınız." ?>
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

                        <?php if ($_GET["dil"] == "sil"): ?>
                            <div id="error" class="alert alert-secondary">
                                <?php
                                $sorgu = $db->prepare("SELECT dil_id,dil FROM diller WHERE dil_id =?");
                                $sorgu->execute([$_GET["dil_id"]]);
                                $isim = $sorgu->fetch(PDO::FETCH_ASSOC);
                                ?>

                                <h5 class="modal-title">Sil</h5>
                                <div>
                                    <p><?= $isim['dil'] ?> isimli dil bilginizi silmek istiyor musunuz?</p>
                                    <form action="dil-islem.php?vazgeç=<?= $isim['dil_id'] ?>" method="post">
                                        <input type="hidden" name="btn_vazgec" value="1">
                                        <button type="submit" class="btn_vazgeç btn btn-light"
                                                data-dismiss="modal"
                                                style="float: right;">Vazgeç
                                        </button>
                                    </form>
                                    <form action="dil-islem.php?sil=<?= $isim['dil_id'] ?>" method="post">
                                        <input type="hidden" name="btn_sil" value="1">
                                        <button type="submit" class="btn_sil btn btn-danger"
                                                style="float: right; margin-right: 10px; ">Sil
                                        </button>
                                </div>
                            </div>
                            </form>
                        <?php endif; ?>

                        <?php if ($_GET["sil"] == "basarili"): ?>
                            <div id="success"
                                 class="alert alert-success far fa-check-warning"><?php echo " Silme işlemi Gerçekleştirildi"; ?></div>
                        <?php endif; ?>

                        <!--  ERROR - SUCCESS -->
                        <!-- /.card-header -->
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Dil</th>
                                    <th>Yüzde</th>
                                    <th width="200">İşlemler</th>
                                </tr>
                                </thead>
                                <tbody>


                                <?php foreach ($dil as $row) : ?>
                                    <tr>
                                        <td><?= $row["dil"] ?></td>
                                        <td><?= $row["yuzde"] ?></td>
                                        <td style="display: flex; flex: 1">
                                            <a href="dil-duzenle.php?dil_id=<?= $row['dil_id'] ?>">
                                                <button class="btn btn-primary btn-xs"><i class="fas fa-edit"></i>
                                                    Düzenle
                                                </button>
                                            </a>
                                            <form action="dil-islem.php?dil_id=<?= $row['dil_id'] ?>" method="post">
                                                <input name="dil_sil" value="1" type="hidden">
                                                <button id="sil" class="sil btn btn-danger btn-xs"
                                                        style="margin-left: 5px;"><i
                                                            class="fas fa-times"></i>
                                                    Sil
                                                </button>

                                            </form>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>


                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>


    <!-- FOOTER -->
    <?php include 'footer.php' ?>
</div>
