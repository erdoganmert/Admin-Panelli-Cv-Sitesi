<?php

include "../config.php";

// BECERİ EKLE

if (isset($_POST["beceri_ekle"])) {
    $beceri_adi = $_POST["beceri_adi"];
    $beceri_yuzde = $_POST["beceri_yuzde"];


    if (!$beceri_adi) {
        header("Location: beceri-ekle.php?beceri_yuzde=$beceri_yuzde&beceri=bos");
    }
    if (!$beceri_yuzde) {
        header("Location: beceri-ekle.php?yuzde=bos&beceri_adi=$beceri_adi");
    }
    if ($beceri_yuzde < 0 || $beceri_yuzde > 100) {
        header("Location: beceri-ekle.php?beceri_adi=$beceri_adi&beceri_yuzde=$beceri_yuzde&gecersizdeger=evet");
    } else {

        $sorgu = $db->prepare("INSERT INTO beceriler SET beceri_adi=?,beceri_yuzde=?");
        $ekle = $sorgu->execute([$beceri_adi, $beceri_yuzde]);


        if ($ekle) {
            header("Location: beceri-ekle.php?ekle=basarili");

        } else {
            header("Location: beceri-ekle.php?sorun=evet ");
        }

    }
}

// BECERİ EKLE SONU


// BECERİ GÜNCELLE

if (isset($_POST['beceri_duzenle'])) {
    $beceri_id = $_GET['beceri_id'];
    $beceri_adi = $_POST["beceri_adi"];
    $beceri_yuzde = $_POST["beceri_yuzde"];


    if (!$beceri_adi) {
        header("Location: beceri-duzenle.php?beceri_yuzde=$beceri_yuzde&beceri=bos");
    }
    elseif (!$beceri_yuzde) {
        header("Location: beceri-duzenle.php?yuzde=bos&beceri_adi=$beceri_adi");
    }
    elseif ($beceri_yuzde < 0 || $beceri_yuzde > 100) {
        header("Location: beceri-duzenle.php?beceri_adi=$beceri_adi&beceri_yuzde=$beceri_yuzde&gecersizdeger=evet");
    } else {

        $sorgu = $db->prepare("UPDATE beceriler SET beceri_adi=?,beceri_yuzde=? WHERE beceri_id=?");
        $ekle = $sorgu->execute([$beceri_adi, $beceri_yuzde, $beceri_id]);


        if ($ekle) {
            header("Location: becerilerim.php?guncelle=basarili");


        } else {
            header("Location: beceri-duzenle.php?sorun=evet ");
        }

    }
}

// BECERİ GÜNCELLE SONU

// BECERİ SİL

if (isset($_POST['beceri_sil'])) {
    $beceri_id = $_GET["beceri_id"];
    $secim = $db->prepare("SELECT beceri_adi FROM beceriler WHERE beceri_id=?");
    $secim->execute([$beceri_id]);

    header("Location: becerilerim.php?beceri_id=$beceri_id&beceri=sil");

}

if (isset($_POST["btn_sil"])) {
    $beceri_id = $_GET["sil"];
    $sil = $db->prepare("DELETE FROM beceriler WHERE beceri_id=?");
    $sil->execute([$beceri_id]);
    if (sil) {
        header("Location: becerilerim.php?sil=basarili");
    } else {
        header("Location: beceri-duzenle.php?sorun=evet ");
    }
}

if (isset($_POST["btn_vazgec"])){
    header("Location: becerilerim.php");
}


























