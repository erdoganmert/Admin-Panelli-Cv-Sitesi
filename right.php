<div class="w3-twothird">

    <!--  İŞLER   -->
    <?php
    $isler = $db->prepare("SELECT * FROM isler ORDER BY bas_tarih DESC ");
    $isler->execute();
    $is = $isler->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <div class="w3-container w3-card w3-white w3-margin-bottom">
        <h2 class="w3-text-grey w3-padding-16"><i
                    class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>İş Deneyimleri</h2>
        <?php foreach ($is as $row): ?>
            <div class="w3-container">
                <h5 class="w3-opacity"><b><?= $row['is_adi'] ?> / <?= $row['is_link'] ?> </b></h5>
                <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>
                    <?php if ($row['is_devam'] == 1): ?>
                    <?= $row['bas_tarih'] ?> - <span class="w3-tag w3-teal w3-round">Halen Devam Ediyor</span></h6>
                <?php endif; ?>
                <?php if ($row['is_devam'] == 2 && $row['bit_tarih'] != null): ?>
                    <?= $row['bas_tarih'] ?> -> <?= $row['bit_tarih'] ?></span></h6>
                <?php endif; ?>
                <p><?= $row['is_aciklama'] ?></p>
                <hr>
            </div>
        <?php endforeach; ?>
        <!-- PROJELER -->

        <?php
        $proje = $db->prepare("SELECT * FROM projeler ORDER BY bas_tarih DESC ");
        $proje->execute();
        $projeler = $proje->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <div class="w3-container w3-card w3-white">
            <h2 class="w3-text-grey w3-padding-16"><i
                        class="fa fa-code fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Proje</h2>
            <?php foreach ($projeler as $row): ?>
                <div class="w3-container">
                    <h5 class="w3-opacity"><b><?= $row['proje_adi'] . " / " . $row['proje_link'] ?></b></h5>
                    <?php if ($row['proje_devam'] == 1): ?>
                        <?= $row['bas_tarih'] ?> - <span class="w3-tag w3-teal w3-round">Halen Devam Ediyor</span></h6>
                    <?php endif; ?>
                    <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>
                        <?= $row['bas_tarih'] . ' - ' . $row['bit_tarih'] ?>
                    </h6>
                    <p><?= $row['proje_aciklama'] ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        <hr>


        <!-- EĞİTİM -->

        <?php
        $okullar = $db->prepare("SELECT * FROM okullar ORDER BY bas_tarih DESC ");
        $okullar->execute();
        $okul = $okullar->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <div class="w3-container w3-card w3-white w3-margin-top w3-margin-bottom">
            <h2 class="w3-text-grey w3-padding-16"><i
                        class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>okul</h2>
            <?php foreach ($okul as $row): ?>
                <div class="w3-container">
                    <h5 class="w3-opacity"><b><?= $row['okul_adi'] ?></b></h5>
                    <?php if ($row['okul_devam'] == 1): ?>
                        <?= $row['bas_tarih'] ?> - <span class="w3-tag w3-teal w3-round">Halen Devam Ediyor</span></h6>
                    <?php endif; ?>
                    <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>
                        <?= $row['bas_tarih'] . ' - ' . $row['bit_tarih'] ?>
                    </h6>
                    <p><?= $row['okul_aciklama'] ?></p>
                </div>
            <?php endforeach; ?>
        </div>

    </div>