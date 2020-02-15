<?php

include "../config.php";

if (isset($_POST['submit'])) {
    $linkedin  = $_POST['linkedin'];
    $instagram = $_POST['instagram'];
    $facebook  = $_POST['facebook'];

    $query = $db -> prepare("UPDATE sosyal SET linkedin =?, instagram =?, facebook =?");
    $guncelle = $query ->execute([$linkedin,$instagram,$facebook]);

    if($guncelle){
        header("Location: sosyal-medya.php?guncelle=basarili");
    }else{
        header("Location: sosyal-medya.php?sorun=evet");
    }
}