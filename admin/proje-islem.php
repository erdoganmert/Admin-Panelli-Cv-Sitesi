<?php

include "../config.php";

$aylar = ["ocak", "şubat", "mart", "nisan", "mayıs", "haziran", "temmuz", "ağustos", "eylül", "ekim", "kasım", "aralık"];


function tarih($tarih)
{
    global $aylar;
    $bosluk = strpos($tarih, " ");
    $ay = substr($tarih, $bosluk + 1);
    $ay = strtolower($ay);
    $bul = array_search($ay, $aylar);
    return $bul;

}

function yilBul($tarih)
{
    $bosluk = strpos($tarih, " ");
    $yil = substr($tarih, 0, $bosluk);
    return $yil;
}


// PROJE EKLE

if (isset($_POST["proje_ekle"])) {
    $proje_adi = $_POST["proje_adi"];
    $proje_link = $_POST["proje_link"];
    $proje_aciklama = $_POST["proje_aciklama"];
    $bas_tarih = $_POST["bas_tarih"];
    $bit_tarih = $_POST["bit_tarih"];
    $proje_devam = $_POST['devam'];


    if (!$proje_adi || !$proje_link || !$proje_aciklama || !$bas_tarih) {
        header("Location: proje-ekle.php?deger=bos");
    } elseif ((yilBul($bas_tarih) > yilBul($bit_tarih)) && $bit_tarih != "") {
        header("Location: proje-ekle.php?deger=yanlis&proje_adi=$proje_adi&proje_link=$proje_link&proje_aciklama=$proje_aciklama&bas_tarih=$bas_tarih&bit_tarih=$bit_tarih&proje_devam=$proje_devam");
    } elseif ((yilBul($bas_tarih) == yilBul($bit_tarih)) && $bit_tarih != "") {
        if ((tarih($bit_tarih) < tarih($bas_tarih)) && $bit_tarih != "") {
            header("Location: proje-ekle.php?deger=yanlis&proje_adi=$proje_adi&proje_link=$proje_link&proje_aciklama=$proje_aciklama&bas_tarih=$bas_tarih&bit_tarih=$bit_tarih&proje_devam=$proje_devam");
        }else {

            if ($proje_devam == "1") {
                $devam_durumu = 1;
                $sorgu = $db->prepare("INSERT INTO projeler SET 
                                                                proje_adi=?,
                                                                proje_link=?,
                                                                proje_aciklama=?,
                                                                bas_tarih=?,
                                                                bit_tarih=?,
                                                                proje_devam=?");


                $ekle = $sorgu->execute([$proje_adi, $proje_link, $proje_aciklama, $bas_tarih, $bit_tarih, $devam_durumu]);


                if ($ekle) {
                    header("Location: proje-ekle.php?ekle=basarili");

                } else {
                    header("Location: proje-ekle.php?sorun=evet");
                }

            } else {
                $devam_durumu = 2;
                $sorgu = $db->prepare("INSERT INTO projeler SET 
                                                                proje_adi=?,
                                                                proje_link=?,
                                                                proje_aciklama=?,
                                                                bas_tarih=?,
                                                                bit_tarih=?,
                                                                proje_devam=?");


                $ekle = $sorgu->execute([$proje_adi, $proje_link, $proje_aciklama, $bas_tarih, $bit_tarih, $devam_durumu]);


                if ($ekle) {
                    header("Location: proje-ekle.php?ekle=basarili");

                } else {
                    header("Location: proje-ekle.php?sorun=evet ");
                }
            }

        }
    }
    else {

        if ($proje_devam == "1") {
            $devam_durumu = 1;
            $sorgu = $db->prepare("INSERT INTO projeler SET 
                                                                proje_adi=?,
                                                                proje_link=?,
                                                                proje_aciklama=?,
                                                                bas_tarih=?,
                                                                bit_tarih=?,
                                                                proje_devam=?");


            $ekle = $sorgu->execute([$proje_adi, $proje_link, $proje_aciklama, $bas_tarih, $bit_tarih, $devam_durumu]);


            if ($ekle) {
                header("Location: proje-ekle.php?ekle=basarili");

            } else {
                header("Location: proje-ekle.php?sorun=evet");
            }

        } else {
            $devam_durumu = 2;
            $sorgu = $db->prepare("INSERT INTO projeler SET 
                                                                proje_adi=?,
                                                                proje_link=?,
                                                                proje_aciklama=?,
                                                                bas_tarih=?,
                                                                bit_tarih=?,
                                                                proje_devam=?");


            $ekle = $sorgu->execute([$proje_adi, $proje_link, $proje_aciklama, $bas_tarih, $bit_tarih, $devam_durumu]);


            if ($ekle) {
                header("Location: proje-ekle.php?ekle=basarili");

            } else {
                header("Location: proje-ekle.php?sorun=evet ");
            }
        }

    }
}


// PROJE EKLE SONU


// PROJE GÜNCELLE

if (isset($_POST['proje_duzenle'])) {
    $proje_id = $_GET['proje_id'];
    $proje_adi = $_POST["proje_adi"];
    $proje_link = $_POST["proje_link"];
    $proje_aciklama = $_POST["proje_aciklama"];
    $bas_tarih = $_POST["bas_tarih"];
    $bit_tarih = $_POST["bit_tarih"];
    $proje_devam = $_POST["proje_devam"];


    if (!$proje_adi || !$proje_link || !$proje_aciklama || !$bas_tarih || !$proje_devam) {
        header("Location: proje-duzenle.php?deger=bos&proje_adi=$proje_adi&proje_link=$proje_link&proje_aciklama=$proje_aciklama&bas_tarih=$bas_tarih&bit_tarih=$bit_tarih&proje_devam=$proje_devam");
    } elseif ((yilBul($bas_tarih) > yilBul($bit_tarih)) && $bit_tarih != "") {
        header("Location: proje-ekle.php?deger=yanlis&proje_adi=$proje_adi&proje_link=$proje_link&proje_aciklama=$proje_aciklama&bas_tarih=$bas_tarih&bit_tarih=$bit_tarih&proje_devam=$proje_devam");
    } elseif ((yilBul($bas_tarih) == yilBul($bit_tarih)) && $bit_tarih != "") {
        if ((tarih($bit_tarih) < tarih($bas_tarih)) && $bit_tarih != "") {
            header("Location: proje-ekle.php?deger=yanlis&proje_adi=$proje_adi&proje_link=$proje_link&proje_aciklama=$proje_aciklama&bas_tarih=$bas_tarih&bit_tarih=$bit_tarih&proje_devam=$proje_devam");
        }else {
            if ($proje_devam == "1") {
                $devam_durumu = 1;
                $sorgu = $db->prepare("UPDATE projeler SET proje_adi=?,
                                                                proje_link=?,
                                                                proje_aciklama=?,
                                                                bas_tarih=?,
                                                                bit_tarih=?,
                                                                proje_devam=? WHERE proje_id=?");
                $guncelle = $sorgu->execute([$proje_adi, $proje_link, $proje_aciklama, $bas_tarih, $bit_tarih, $devam_durumu, $proje_id]);


                if ($guncelle) {
                    header("Location: projelerim.php?guncelle=basarili");


                } else {
                    header("Location: proje-duzenle.php?sorun=evet ");
                }

            } else {
                $devam_durumu = 2;
                $sorgu = $db->prepare("UPDATE projeler SET proje_adi=?,
                                                                proje_link=?,
                                                                proje_aciklama=?,
                                                                bas_tarih=?,
                                                                bit_tarih=?,
                                                                proje_devam=? WHERE proje_id=?");
                $ekle = $sorgu->execute([$proje_adi, $proje_link, $proje_aciklama, $bas_tarih, $bit_tarih, $devam_durumu, $proje_id]);


                if ($ekle) {
                    header("Location: projelerim.php?guncelle=basarili");


                } else {
                    header("Location: proje-duzenle.php?sorun=evet ");
                }
            }
        }
    } else {
        if ($proje_devam == "1") {
            $devam_durumu = 1;
            $sorgu = $db->prepare("UPDATE projeler SET proje_adi=?,
                                                                proje_link=?,
                                                                proje_aciklama=?,
                                                                bas_tarih=?,
                                                                bit_tarih=?,
                                                                proje_devam=? WHERE proje_id=?");
            $guncelle = $sorgu->execute([$proje_adi, $proje_link, $proje_aciklama, $bas_tarih, $bit_tarih, $devam_durumu, $proje_id]);


            if ($guncelle) {
                header("Location: projelerim.php?guncelle=basarili");


            } else {
                header("Location: proje-duzenle.php?sorun=evet ");
            }

        } else {
            $devam_durumu = 2;
            $sorgu = $db->prepare("UPDATE projeler SET proje_adi=?,
                                                                proje_link=?,
                                                                proje_aciklama=?,
                                                                bas_tarih=?,
                                                                bit_tarih=?,
                                                                proje_devam=? WHERE proje_id=?");
            $ekle = $sorgu->execute([$proje_adi, $proje_link, $proje_aciklama, $bas_tarih, $bit_tarih, $devam_durumu, $proje_id]);


            if ($ekle) {
                header("Location: projelerim.php?guncelle=basarili");


            } else {
                header("Location: proje-duzenle.php?sorun=evet ");
            }
        }
    }
}

// PROJE GÜNCELLE SONU

// PROJE SİL

if (isset($_POST['proje_sil'])) {
    $proje_id = $_GET["proje_id"];
    $secim = $db->prepare("SELECT proje_adi FROM projeler WHERE proje_id=?");
    $secim->execute([$proje_id]);

    header("Location: projelerim.php?proje_id=$proje_id&proje=sil");

}

if (isset($_POST["btn_sil"])) {
    $proje_id = $_GET["sil"];
    $sil = $db->prepare("DELETE FROM projeler WHERE proje_id=?");
    $sil->execute([$proje_id]);
    if ($sil) {
        header("Location: projelerim.php?sil=basarili");
    } else {
        header("Location: proje-duzenle.php?sorun=evet ");
    }
}

if (isset($_POST["btn_vazgec"])) {
    header("Location: projelerim.php");
}


























