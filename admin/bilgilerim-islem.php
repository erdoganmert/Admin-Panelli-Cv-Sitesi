<?php

include "../config.php";

function resimYukle($resim){

    $sonuc = [];
    if ($resim['error'] == 4) {
        $sonuc['hata'] = "Location: bilgilerim.php?foto=bos";

    } else {
        if (is_uploaded_file($resim['tmp_name'])) {

            $gecerli_dosya_uzantilari = [
                "image/jpeg",
                "image/png"
            ];

            $gecerli_dosya_boyutu = 1024 * 1024 * 3; // 3 Megabayt
            $dosya_uzantisi = $resim['type'];

            if (in_array($dosya_uzantisi, $gecerli_dosya_uzantilari)) {
                if($gecerli_dosya_boyutu >= $resim['size']){
                    $yukle = move_uploaded_file($resim['tmp_name'],"resimler/".$resim['name']);
                    if($yukle){
                         header("Location: bilgilerim.php?yukle=basarili");
                    }else{
                         header("Location: bilgilerim.php?resimsorun=evet");
                    }
                }else{
                     header("Location: bilgilerim.php?boyut=fazla");

                }

            } else {
                header("Location: bilgilerim.php?tip=yanlis");


            }
        } else {
             header("Location: bilgilerim.php?sorun=evet");    }
    }


}

$yukle = resimYukle($_FILES['bilgi_foto']);

if (isset($_POST["submit"])) {
    $bilgi_id       = $_GET["bilgi_id"];
    $bilgi_isim     = $_POST["bilgi_isim"];
    $bilgi_meslek   = $_POST["bilgi_meslek"];
    $bilgi_adres    = $_POST["bilgi_adres"];
    $bilgi_mail     = $_POST["bilgi_mail"];
    $bilgi_telefon  = $_POST["bilgi_tel"];
    $bilgi_foto     = $_FILES['bilgi_foto']['name'];


}

if (!$bilgi_foto ||!$bilgi_isim || !$bilgi_meslek || !$bilgi_adres || !$bilgi_mail || !$bilgi_telefon) {
    header("Location: bilgilerim.php?alan=bos");

} else {
    $guncelle = $db->prepare("UPDATE bilgiler SET

                                                            bilgi_isim     =?,
                                                            bilgi_meslek   =?,
                                                            bilgi_adres    =?,
                                                            bilgi_mail     =?,
                                                            bilgi_telefon  =?,
                                                            bilgi_foto     =?   WHERE
                                                            bilgi_id        =?");
    $guncelle->execute([
        $bilgi_isim,
        $bilgi_meslek,
        $bilgi_adres,
        $bilgi_mail,
        $bilgi_telefon,
        $bilgi_foto,
        $bilgi_id

    ]);

    if ($guncelle) {
        header("Location: bilgilerim.php?guncelle=basarili");
    } else {
        header("Location: bilgilerim.php?sorun=evet");
    }


}
