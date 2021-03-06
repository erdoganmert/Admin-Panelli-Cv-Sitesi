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
                            <h3 class="card-title">Proje Düzenle</h3>
                        </div>
                        <?php if ($_GET["deger"] == "bos"): ?>
                            <div id="error" class="alert alert-danger">
                                <?php echo "Bitiş Tarihi dışındaki alanları doldurmak zorunludur.." ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($_GET["deger"] == "yanlis"): ?>
                            <div id="error" class="alert alert-danger">
                                <?php echo "Bitiş tarihi, başlangıç tarihinden küçük olamaz!!" ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($_GET["sorun"] == "evet"): ?>
                            <div id="error" class="alert alert-danger">
                                <?php echo "Bir Sorun Oluştu" ?>
                            </div>
                        <?php endif; ?>

                        <?php
                        $proje_id = $_GET['proje_id'];
                        $query = $db->prepare("SELECT * FROM projeler WHERE proje_id=?");
                        $query->execute([$proje_id]);
                        $proje = $query->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="proje-islem.php?proje_id=<?= $proje_id ?>" method="POST"
                              class="form-horizontal">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="label" class="col-sm-2 col-form-label">Proje Adı</label>
                                    <div class="col-sm-10">

                                        <input type="text" class="form-control" name="proje_adi"
                                               value="<?= (isset($_GET['proje_adi']) ? $_GET['proje_adi'] : $proje['proje_adi']); ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="label" class="col-sm-2 col-form-label">Link</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="proje_link"
                                               value="<?= (isset($_GET['proje_link']) ? $_GET['proje_link'] : $proje['proje_link']); ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="label" class="col-sm-2 col-form-label">Açıklama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="proje_aciklama"
                                               value="<?= (isset($_GET['proje_aciklama']) ? $_GET['proje_aciklama'] : $proje['proje_aciklama']); ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="label" class="col-sm-2 col-form-label">Başlangıç Tarihi</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="tarih form-control" id="bas_tarih" name="bas_tarih"
                                               value="<?= (isset($_GET['bas_tarih']) ? $_GET['bas_tarih'] : $proje['bas_tarih']); ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="label" class="col-sm-2 col-form-label">Bitiş Tarihi</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="tarih form-control" id="bit_tarih" name="bit_tarih"
                                               value="<?= (isset($_GET['bit_tarih']) ? $_GET['bit_tarih'] : $proje['bit_tarih']); ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="label" class="col-sm-2 col-form-label">Devam Durumu</label>
                                    <div class="col-sm-10" style="margin-top: 8px;" >
                                        <label class="radio-inline">
                                            <input type="radio" name="proje_devam" value="1" <?= $proje['proje_devam'] == 1 ? "checked" : null; ?>> Evet
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="proje_devam"  value="2" style="margin-left: 10px;" <?= $proje['proje_devam'] == 2 ? "checked" : null; ?>> Hayır
                                        </label>

                                </div>
                                </div>

                                <div class="card-footer">
                                    <input type="hidden" name="proje_duzenle" value="1">
                                    <button type="submit" class="btn btn-info">Düzenle</button>
                                </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

<script>
    $(document).ready(function () {

        $("#success").hide(3000);

        var currentDate = new Date();
        var currentDay = currentDate.getDate();
        var currentMonth =currentDate.getMonth() + 1;
        var currentYear = currentDate.getFullYear();
        var simdikiTarih = currentYear +"-"+currentMonth+"-"+currentDay
        $('.tarih').datepicker({
            dateFormat: 'yy MM',
            changeMonth: true,
            changeYear: true,
            maxDate: simdikiTarih

        });



        $("input[type='radio']").click(function () {
            var radioDeger = $("input[name='proje_devam']:checked").val();
            if(radioDeger == 1){
                $('#bit_tarih').fadeOut();
            }else if(radioDeger == 2){
                $('#bit_tarih').fadeIn();
            }
        });



    });

</script>

<!-- FOOTER -->
<?php include 'footer.php' ?>

