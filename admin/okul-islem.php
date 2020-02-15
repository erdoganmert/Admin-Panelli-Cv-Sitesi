<?php

include "../config.php";

// OKUL EKLE

if (isset($_POST["okul_ekle"])) {
    $okul_adi = $_POST["okul_adi"];
    $okul_aciklama = $_POST["okul_aciklama"];
    $bas_tarih = $_POST["bas_tarih"];
    $bit_tarih = $_POST["bit_tarih"];
    $okul_devam = $_POST["devam"];



    if (!$okul_adi || !$okul_aciklama || !$bas_tarih || !$okul_devam) {
        header("Location: okul-ekle.php?okul_adi=$okul_adi&okul_aciklama=$okul_aciklama&bas_tarih=$bas_tarih&bit_tarih=$bit_tarih&okul_davam=$okul_devam&okul=bos");
    }elseif ($bas_tarih > $bit_tarih){
        header("Location: okul-ekle.php?kucuk=evet");
    }
    else {

        $sorgu = $db->prepare("INSERT INTO okullar SET okul_adi=?,
                                                                okul_aciklama=?,
                                                                bas_tarih=?,
                                                                bit_tarih=?,
                                                                okul_devam=?");
        $ekle = $sorgu->execute([$okul_adi, $okul_aciklama,$bas_tarih,$bit_tarih,$okul_devam]);


        if ($ekle) {
            header("Location: okul-ekle.php?ekle=basarili");

        } else {
            header("Location: okul-ekle.php?sorun=evet ");
        }

    }
}

// OKUL EKLE SONU


// OKUL GÜNCELLE

if (isset($_POST['okul_duzenle'])) {
    $okul_id  = $_GET['okul_id'];
    $okul_adi = $_POST["okul_adi"];
    $okul_aciklama = $_POST["okul_aciklama"];
    $bas_tarih = $_POST["bas_tarih"];
    $bit_tarih = $_POST["bit_tarih"];
    $okul_devam = $_POST["devam"];


    if (!$okul_adi || !$okul_aciklama || !$bas_tarih || !$okul_devam) {
        header("Location: okul-ekle.php?okul_adi=$okul_adi&okul_aciklama=$okul_aciklama&bas_tarih=$bas_tarih&bit_tarih=$bit_tarih&okul_davam=$okul_devam&okul=bos");
    }elseif ($bas_tarih > $bit_tarih && $bit_tarih != null){
        header("Location: okul-ekle.php?kucuk=evet");
    }elseif($okul_devam == 1) {
        $bit_tarih = null;

        $sorgu = $db->prepare("UPDATE okullar SET okul_adi=?,
                                                            okul_aciklama=?,
                                                            bas_tarih=?,
                                                            bit_tarih=?,
                                                            okul_devam=? WHERE okul_id=?");
        $ekle = $sorgu->execute([$okul_adi, $okul_aciklama,$bas_tarih,$bit_tarih,$okul_devam,$okul_id]);


        if ($ekle) {
            header("Location: okullarim.php?guncelle=basarili");


        } else {
            header("Location: okul-duzenle.php?sorun=evet ");
        }

    }else{
        $sorgu = $db->prepare("UPDATE okullar SET okul_adi=?,
                                                            okul_aciklama=?,
                                                            bas_tarih=?,
                                                            bit_tarih=?,
                                                            okul_devam=? WHERE okul_id=?");
        $ekle = $sorgu->execute([$okul_adi, $okul_aciklama,$bas_tarih,$bit_tarih,$okul_devam,$okul_id]);


        if ($ekle) {
            header("Location: okullarim.php?guncelle=basarili");


        } else {
            header("Location: okul-duzenle.php?sorun=evet ");
        }
    }
}

// OKUL GÜNCELLE SONU

// OKUL SİL

if (isset($_POST['okul_sil'])) {
    $okul_id = $_GET["okul_id"];
    $secim = $db->prepare("SELECT okul FROM okullar WHERE okul_id=?");
    $secim->execute([$okul_id]);

    header("Location: okullarim.php?okul_id=$okul_id&okul=sil");

}

if (isset($_POST["btn_sil"])) {
    $okul_id = $_GET["sil"];
    $sil = $db->prepare("DELETE FROM okullar WHERE okul_id=?");
    $sil->execute([$okul_id]);
    if (sil) {
        header("Location: okullarim.php?sil=basarili");
    } else {
        header("Location: okul-duzenle.php?sorun=evet ");
    }
}

if (isset($_POST["btn_vazgec"])){
    header("Location: okullarim.php");
}


























