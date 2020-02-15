<?php

include "../config.php";

if (isset($_POST["submit"])) {

    $site_id        = $_GET["site_id"];
    $site_title     = $_POST["site_title"];
    $site_url       = $_POST["site_url"];
    $site_desc      = $_POST["site_desc"];
    $site_keyword   = $_POST["site_keyword"];
}

if(!$site_title){
    header("Location: genel-ayarlar.php?title=bos");
}
elseif(!$site_url){
    header("Location: genel-ayarlar.php?url=bos");
}
elseif(!$site_desc){
    header("Location: genel-ayarlar.php?desc=bos");
}
elseif(!$site_keyword){
    header("Location: genel-ayarlar.php?key=bos");
}else
{
    $guncelle = $db -> prepare("UPDATE ayarlar SET
                                                            site_title      =?,
                                                            site_url        =?,
                                                            site_desc       =?,
                                                            site_keyword    =? WHERE
                                                            site_id         =?");
    $guncelle -> execute([
         $site_title,
         $site_url,
         $site_desc,
         $site_keyword,
         $site_id
    ]);

    if($guncelle){
        header("Location: genel-ayarlar.php?guncelle=basarili");
    }else{
        header("Location: genel-ayarlar.php?sorun=evet");
    }


}
