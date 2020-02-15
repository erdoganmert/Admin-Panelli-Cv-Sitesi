<?php

include "../config.php";

// DİL EKLE

if (isset($_POST["dil_ekle"])) {
    $dil_adi = $_POST["dil_adi"];
    $dil_yuzde = $_POST["dil_yuzde"];


    if (!$dil_adi) {
        header("Location: dil-ekle.php?dil_yuzde=$dil_yuzde&dil=bos");
    }
    if (!$dil_yuzde) {
        header("Location: dil-ekle.php?yuzde=bos&dil_adi=$dil_adi");
    }
    if ($dil_adi < 0 || $dil_yuzde > 100) {
        header("Location: dil-ekle.php?dil_adi=$dil_adi&dil_yuzde=$dil_yuzde&gecersizdeger=evet");
    } else {

        $sorgu = $db->prepare("INSERT INTO diller SET dil=?,yuzde=?");
        $ekle = $sorgu->execute([$dil_adi, $dil_yuzde]);


        if ($ekle) {
            header("Location: dil-ekle.php?ekle=basarili");

        } else {
            header("Location: dil-ekle.php?sorun=evet ");
        }

    }
}

// DİL EKLE SONU


// DİL GÜNCELLE

if (isset($_POST['dil_duzenle'])) {
    $dil_id = $_GET['dil_id'];
    $dil_adi = $_POST["dil_adi"];
    $dil_yuzde = $_POST["dil_yuzde"];


    if (!$dil_adi) {
        header("Location: dil-duzenle.php?dil_yuzde=$dil_yuzde&dil=bos");
    }
    elseif (!$dil_yuzde) {
        header("Location: dil-duzenle.php?yuzde=bos&dil_adi=$dil_adi");
    }
    elseif ($dil_yuzde < 0 || $dil_yuzde > 100) {
        header("Location: dil-duzenle.php?dil_adi=$dil_adi&dil_yuzde=$dil_yuzde&gecersizdeger=evet");
    } else {

        $sorgu = $db->prepare("UPDATE diller SET dil=?,yuzde=? WHERE dil_id=?");
        $ekle = $sorgu->execute([$dil_adi, $dil_yuzde, $dil_id]);


        if ($ekle) {
            header("Location: dillerim.php?guncelle=basarili");


        } else {
            header("Location: dil-duzenle.php?sorun=evet ");
        }

    }
}

// DİL GÜNCELLE SONU

// DİL SİL

if (isset($_POST['dil_sil'])) {
    $dil_id = $_GET["dil_id"];
    $secim = $db->prepare("SELECT dil FROM diller WHERE dil_id=?");
    $secim->execute([$dil_id]);

    header("Location: dillerim.php?dil_id=$dil_id&dil=sil");

}

if (isset($_POST["btn_sil"])) {
    $dil_id = $_GET["sil"];
    $sil = $db->prepare("DELETE FROM diller WHERE dil_id=?");
    $sil->execute([$dil_id]);
    if (sil) {
        header("Location: dillerim.php?sil=basarili");
    } else {
        header("Location: dil-duzenle.php?sorun=evet ");
    }
}

if (isset($_POST["btn_vazgec"])){
    header("Location: dillerim.php");
}


























