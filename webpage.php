<?php
ob_start();
session_start();

include "girisdb.php";

if (isset($_POST['adming'])) {
    $userquery = $_POST['yenioturum'];
    $passw = $_POST['passw'];

    if (!$userquery) {
    } elseif (!$passw) {

    } else {
        $dbkulsorgu = $baglan->prepare('SELECT * FROM admin WHERE admingiris = ? && sifre = ?');
        $dbkulsorgu->execute([
            $userquery, $passw
        ]);
        echo $say = $dbkulsorgu->rowCount();
        if ($say == 1) {
            $_SESSION['yenioturum'] = $userquery;

            header("Location:admin.php");
        } else {
            echo "Kullanıcı Adı veya Şifre yanlış";
        }

    }
}


if (isset($_POST['kullanıcıg'])) {
    $userquery = $_POST['yenioturum'];
    $passw = $_POST['passw'];

    if (!$userquery) {
        echo "Lütfen Kullanıcı Adınızı Girin";
    } elseif (!$passw) {
        echo "Lütfen şifrenizi girin";

    } else {
        $dbkulsorgu = $baglan->prepare('SELECT * FROM kullanici WHERE kullanicigiris = ? && sifre = ?');
        $dbkulsorgu->execute([
            $userquery, $passw
        ]);
        echo $say = $dbkulsorgu->rowCount();
        if ($say == 1) {
            $_SESSION['yenioturum'] = $userquery;

            header("Location:kullanıcı.php");

        } else {
            echo "Kullanıcı Adı veya Şifre Yanlış";
        }

    }
}
?>


<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8"/>
    <title> Yazlab </title>
    <link rel="stylesheet" href="webpageanagiris.css">
</head>
<body>
<img id="img" src="loficode.jpg" style="width: 100%; height: 100%"/>
<form action="webpage.php" method="post">
    <div id="div1">
        <h1 id="anagirisbaslik"> KOU Proje Paneli</h1>

        <input id="kullanıcıAdı" type="text" placeholder="Kullanıcı Adı" name="yenioturum"
               style="    width: 60%;height: 30px"/> <br> <br>
        <input id="password" type="password" placeholder="Şifre" name="passw"/> <br> <br>
        <button href="admin.php" name="adming" class="btn btn-primary btn-large btn-block" id="abtn">Admin Girişi
        </button>
        <button href="kullanıcı.php" name="kullanıcıg" class="btn btn-primary btn-large btn-block" id="kbtn">Kullanıcı
            Girişi
        </button>


    </div>
</form>
</body>
</html>

