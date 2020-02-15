<!-- Left Column -->
<div class="w3-third">
    <?php
        $bilgiler = $db -> prepare("SELECT * FROM bilgiler");
        $bilgiler -> execute();
        $bilgi    = $bilgiler ->fetch(PDO::FETCH_ASSOC);

    ?>
    <div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-display-container">
            <img src="admin/resimler/<?= $bilgi['bilgi_foto'] ?>" style="width:100%" alt="Avatar" height="300px;">
            <div class="w3-display-bottomleft w3-container w3-text-black">
                <h2 style="color: white;"><?= $bilgi['bilgi_isim'] ?></h2>
            </div>
        </div>
        <div class="w3-container">
            <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i><?= $bilgi['bilgi_meslek'] ?></p>
            <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i><?= $bilgi['bilgi_adres'] ?></p>
            <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i><?= $bilgi['bilgi_mail'] ?></p>
            <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i><?= $bilgi['bilgi_telefon'] ?></p>
            <hr>

            <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>Yeteneklerim</b></p>
            <?php
                $beceriler = $db ->prepare("SELECT * FROM beceriler");
                $beceriler->execute();
                $yetenekler = $beceriler->fetchAll(PDO::FETCH_ASSOC);
             ?>

            <?php foreach ($yetenekler as $row): ?>
                <p><?= $row['beceri_adi'] ?></p>
                <div class="w3-light-grey w3-round-xlarge w3-small">
                    <div class="w3-container w3-center w3-round-xlarge w3-teal"
                         style="width:<?= $row['beceri_yuzde']."%" ?>">
                        <?= $row['beceri_yuzde']."%" ?>
                    </div>
                </div>
            <?php endforeach; ?>


            <?php
            $diller = $db ->prepare("SELECT * FROM diller");
            $diller->execute();
            $dil = $diller->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <p class="w3-large w3-text-theme"><b><i class="fa fa-globe fa-fw w3-margin-right w3-text-teal"></i>Diller</b></p>
            <?php foreach ($dil as $row): ?>
                <p><?= $row['dil'] ?></p>
                <div class="w3-light-grey w3-round-xlarge w3-small">
                    <div class="w3-container w3-center w3-round-xlarge w3-teal"
                         style="width:<?= $row['yuzde']."%" ?>">
                        <?= $row['yuzde']."%" ?>
                    </div>
                </div>
            <?php endforeach; ?>

            <?php
       //<p>photography</p>
       //<div class="w3-light-grey w3-round-xlarge w3-small">
       //    <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:80%">
       //        <div class="w3-center w3-text-white">80%</div>
       //    </div>
       //</div>
       //<p>ıllustrator</p>
       //<div class="w3-light-grey w3-round-xlarge w3-small">
       //    <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:75%">75%</div>
       //</div>
       //<p>media</p>
       //<div class="w3-light-grey w3-round-xlarge w3-small">
       //    <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:50%">50%</div>
       //</div>
       //<br>

       //<p class="w3-large w3-text-theme"><b><i class="fa fa-globe fa-fw w3-margin-right w3-text-teal"></i>languages</b></p>
       //<p>english</p>
       //<div class="w3-light-grey w3-round-xlarge">
       //    <div class="w3-round-xlarge w3-teal" style="height:24px;width:100%"></div>
       //</div>
       //<p>spanish</p>
       //<div class="w3-light-grey w3-round-xlarge">
       //    <div class="w3-round-xlarge w3-teal" style="height:24px;width:55%"></div>
       //</div>
       //<p>german</p>
       //<div class="w3-light-grey w3-round-xlarge">
       //    <div class="w3-round-xlarge w3-teal" style="height:24px;width:25%"></div>
       //</div>

       ?>
            <br>
        </div>
    </div><br>
</div>

