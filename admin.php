<?php
ob_start();
session_start();
include "girisdb.php";
echo '<div style="font-size:1.25em;color:#a20030;font-weight:bold;"><span style="font-size:2em;color:#575f2c;font-weight:bold;margin-left: 570px">' .'İşte Paneliniz,'.'</span></div>';
echo '<div style="font-size:1.25em;color:#a20030;font-weight:bold;"><span style="font-size:2em;color:#91686c;font-weight:bold;margin-left: 630px">' .$_SESSION['yenioturum'].'</span></div>';

?>


<!DOCTYPE html>
<html>

<head>
    <title> Admin </title>
    <meta charset="utf-8" />
    <title></title>

    <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto:400,300,500);
        body {
            font: 100% Roboto, sans-serif;
            background: url(https://cdna.artstation.com/p/assets/images/images/019/046/284/large/eric-yu-composite.jpg?1561772398) 100% 100% no-repeat;
            background-size: cover;
            padding: 50px;
            margin: 0;
        }

        nav {
            width: 300px;
            background: white;
            color: rgba(0, 0, 0, 0.87);
            -webkit-clip-path: circle(24px at 30px 24px);
            clip-path: circle(24px at 32px 24px);
            -webkit-transition: -webkit-clip-path 0.5625s, clip-path 0.375s;
            transition: -webkit-clip-path 0.5625s, clip-path 0.375s;
        }

        nav:hover {
            -webkit-transition-timing-function: ease-out;
            transition-timing-function: ease-out;
            -webkit-transition-duration: 0.75s;
            transition-duration: 0.75s;
            -webkit-clip-path: circle(390px at 225px 24px);
            clip-path: circle(390px at 150px 24px);
        }

        a {
            display: block;
            line-height: 50px;
            padding: 0 20px;
            color: inherit;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        a:hover { background: #ffe082; }

        a:active { background: #ffca28; }

        .navicon {
            padding: 23px 20px;
            cursor: pointer;
            -webkit-transform-origin: 32px 24px;
            -ms-transform-origin: 32px 24px;
            transform-origin: 32px 24px;
        }

        .navicon div {
            position: relative;
            width: 20px;
            height: 2px;
            background: rgba(0, 0, 0, 0.87);
        }

        .navicon div:before,
        .navicon div:after {
            display: block;
            content: "";
            width: 20px;
            height: 2px;
            background: rgba(0, 0, 0, 0.87);
            position: absolute;
        }

        .navicon div:before { top: -7px; }

        .navicon div:after { top: 7px; }

    </style>


</head>

<body>
    <div class="menu">


        <nav >
            <div class="navicon">
                <div></div>
            </div>
            <a href="adminEkle.php" class="mm1" target="_blank">Kullanıcı Ekle</a>
            <a href="adminpanel.php" class="mm1" target="_blank">Kullanıcı Düzenle</a>
            <a href="adminpanel.php" class="mm1" target="_blank">Kullanıcı Sil</a>
        </nav>


        <br> <br>
        <nav >
            <div class="navicon">
                <div></div>
            </div>
            <a href="pdfGosterAdmin.php" class="mm1" target="_blank">Dosyalar</a>
            <a href="tablogor.php" class="mm1" target="_blank">Dosya ara</a>
            <a href="aramaSorgu.php" class="mm1" target="_blank">Sorgu Sayfası</a>
            <a href="metinisleme.php" class="mm1" target="_blank">Sorgu Yap</a>


        </nav>

    </div>

</body>

</html>
