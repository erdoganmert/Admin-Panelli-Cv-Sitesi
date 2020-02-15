<?php

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
                        $sonuc['basarili'] = header("Location: bilgilerim.php?yukle=basarili");
                    }else{
                        $sonuc['hata'] =  header("Location: bilgilerim.php?resimsorun=evet");
                    }
                }else{
                    $sonuc['hata'] = header("Location: bilgilerim.php?boyut=fazla");

                }

            } else {
                $sonuc['hata'] = header("Location: bilgilerim.php?tip=yanlis");


            }
        } else {
            $sonuc['hata'] = header("Location: bilgilerim.php?sorun=evet");    }
    }

    return $sonuc;
}
$yukle = resimYukle( $_FILES['bilgi_foto']);