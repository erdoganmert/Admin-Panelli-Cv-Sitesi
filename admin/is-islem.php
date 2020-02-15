<?php

include "../config.php";

// İŞ EKLE

if (isset($_POST["is_ekle"])) {
    $is_adi = $_POST["is_adi"];
    $is_link = $_POST["is_link"];
    $is_aciklama = $_POST["is_aciklama"];
    $bas_tarih = $_POST["bas_tarih"];
    $bit_tarih = $_POST["bit_tarih"];
    $is_devam = $_POST['is_devam'];


    if (!$is_adi || !$is_link || !$is_aciklama || !$bas_tarih) {
        header("Location: is-ekle.php?deger=bos");
    }elseif($bit_tarih < $bas_tarih){
        header("Location: is-duzenle.php?deger=yanlis&&is_adi=$is_adi&is_link=$is_link&is_aciklama=$is_aciklama&bas_tarih=$bas_tarih&bit_tarih=$bit_tarih&is_devam=$is_devam");
    } else {

        if ($is_devam == "1") {
            $devam_durumu = 1;
            $sorgu = $db->prepare("INSERT INTO isler SET 
                                                                is_adi=?,
                                                                is_link=?,
                                                                is_aciklama=?,
                                                                bas_tarih=?,
                                                                bit_tarih=?,
                                                                is_devam=?");


            $ekle = $sorgu->execute([$is_adi, $is_link, $is_aciklama, $bas_tarih, $bit_tarih, $devam_durumu]);


            if ($ekle) {
                header("Location: is-ekle.php?ekle=basarili");

            } else {
                header("Location: is-ekle.php?sorun=evet ");
            }

        } else {
            $devam_durumu = 2;
            $sorgu = $db->prepare("INSERT INTO isler SET 
                                                                is_adi=?,
                                                                is_link=?,
                                                                is_aciklama=?,
                                                                bas_tarih=?,
                                                                bit_tarih=?,
                                                                is_devam=?");


            $ekle = $sorgu->execute([$is_adi, $is_link, $is_aciklama, $bas_tarih, $bit_tarih, $devam_durumu]);


            if ($ekle) {
                header("Location: is-ekle.php?ekle=basarili");

            } else {
                header("Location: is-ekle.php?sorun=evet ");
            }
        }

    }
}

// İŞ EKLE SONU


// İŞ GÜNCELLE

if (isset($_POST['is_duzenle'])) {
    $is_id = $_GET['is_id'];
    $is_adi = $_POST["is_adi"];
    $is_link = $_POST["is_link"];
    $is_aciklama = $_POST["is_aciklama"];
    $bas_tarih = $_POST["bas_tarih"];
    $bit_tarih = $_POST["bit_tarih"];
    $is_devam = $_POST["devam"];


    if (!$is_adi || !$is_link || !$is_aciklama || !$bas_tarih || !$is_devam) {
        header("Location: is-duzenle.php?deger=bos&is_adi=$is_adi&is_link=$is_link&is_aciklama=$is_aciklama&bas_tarih=$bas_tarih&bit_tarih=$bit_tarih&is_devam=$is_devam");
    }elseif($bit_tarih < $bas_tarih){
        header("Location: is-duzenle.php?deger=yanlis&&is_adi=$is_adi&is_link=$is_link&is_aciklama=$is_aciklama&bas_tarih=$bas_tarih&bit_tarih=$bit_tarih&is_devam=$is_devam");
    } else {
        if ($is_devam == "1") {
            $devam_durumu = 1;
            $sorgu = $db->prepare("UPDATE isler SET    is_adi=?,
                                                                is_link=?,
                                                                is_aciklama=?,
                                                                bas_tarih=?,
                                                                bit_tarih=?,
                                                                is_devam=? WHERE is_id=?");
            $guncelle = $sorgu->execute([$is_adi, $is_link, $is_aciklama, $bas_tarih, $bit_tarih, $devam_durumu, $is_id]);


            if ($guncelle) {
                header("Location: islerim.php?guncelle=basarili");


            } else {
                header("Location: is-duzenle.php?sorun=evet ");
            }

        } else {
            $devam_durumu = 2;
            $sorgu = $db->prepare("UPDATE isler SET    is_adi=?,
                                                                is_link=?,
                                                                is_aciklama=?,
                                                                bas_tarih=?,
                                                                bit_tarih=?,
                                                                is_devam=? WHERE is_id=?");
            $ekle = $sorgu->execute([$is_adi, $is_link, $is_aciklama, $bas_tarih, $bit_tarih, $devam_durumu, $is_id]);


            if ($ekle) {
                header("Location: islerim.php?guncelle=basarili");


            } else {
                header("Location: is-duzenle.php?sorun=evet ");
            }
        }
    }
}

// İŞ GÜNCELLE SONU

// İŞ SİL

if (isset($_POST['is_sil'])) {
    $is_id = $_GET["is_id"];
    $secim = $db->prepare("SELECT is_adi FROM isler WHERE is_id=?");
    $secim->execute([$is_id]);

    header("Location: islerim.php?is_id=$is_id&is=sil");

}

if (isset($_POST["btn_sil"])) {
    $is_id = $_GET["sil"];
    $sil = $db->prepare("DELETE FROM isler WHERE is_id=?");
    $sil->execute([$is_id]);
    if ($sil) {
        header("Location: islerim.php?sil=basarili");
    } else {
        header("Location: is-duzenle.php?sorun=evet ");
    }
}

if (isset($_POST["btn_vazgec"])) {
    header("Location: islerim.php");
}


























