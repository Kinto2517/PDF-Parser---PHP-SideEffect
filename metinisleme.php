<?php
ob_start();
session_start();
include "girisdb.php";

echo $_SESSION['yenioturum'];



include 'vendor/autoload.php';
$parser = new \Smalot\PdfParser\Parser();

$path    = 'C:\xampp\htdocs\PdfWeb\uploads';

$temp_files = glob(__dir__.'/uploads/*');

foreach ($temp_files as $filename) {


    $host = "127.0.0.1";
    $user = "root";
    $pass = "";
    $db = "pdfdosya";
    $con = mysqli_connect($host, $user, $pass, $db) or die("Error " . mysqli_error($con));



    $file = $filename;
    $pdf = $parser->parseFile($file);
    $text = $pdf->getText();


    $c = explode(" ", $text);

    $keywordss = str_replace(array("\n", "\r", "\t"), "", $text);

    $key = str_replace(".", "", $keywordss);

    $d = explode(" ", $key);

    $e = array_search("TEZİ", $d);

    $baslık = "";
    for ($i = $e + 5; mb_strlen($d[$i]) > 2; $i++) {

        $baslık .= $d[$i] . " ";
    };


    $ogr_turu = '';
    $f = array_search("No:", $d);
    if (strlen($d[$f + 1]) == 0) {
        $ögr_no = $d[$f + 2];
        if ($d[$f + 2][5] == 2) {
            $ogr_turu = '2. Öğretim';
        } else {
            $ogr_turu = '1.Öğretim';
        }
    } else {
        $ögr_no = $d[$f + 1];
        if ($d[$f + 1][5] == 2) {
            $ogr_turu = '2. Öğretim';
        } else {
            $ogr_turu = '1.Öğretim';
        }

    }


    $adı = array_search("Soyadı:", $d);
    $ögr_adı = $d[$adı + 1] . " " . $d[$adı + 2] ;


    $öz = array_search("ÖZET", $d);

    $öz1 = array_search("ÖZET", $d);

    $öz_son = array_search("Anahtar", $d);

    $özet = "";
    for ($i = $öz1 + 1; $i < $öz_son; $i++) {
        $özet .= $d[$i] . " ";
    };


    $tar = array_search("Tarih:", $d);
    $tarih = substr($d[$tar + 1], 0, 8);
    if ((($d[$tar+1][2]) == 0 && ($d[$tar+1][3]) == 1) || (($d[$tar+1][2]) == 0 && ($d[$tar+1][3]) == 2) ||(($d[$tar+1][2]) == 1 && ($d[$tar+1][3]) == 0) || (($d[$tar+1][2]) == 0 && ($d[$tar+1][3]) == 9)  || (($d[$tar+1][2]) == 1 && ($d[$tar+1][3]) == 1) || (($d[$tar+1][2]) == 1 && ($d[$tar+1][3]) == 2)){
        $tarih = "Güz";
    }
    else{
        $tarih = "Bahar";
    }

    $danısman = "";
    $dan = array_search("Danışman,", $d);
    for ($i = $dan - 4; $i < $dan; $i++) {
        $danısman .= $d[$i] . " ";
    };

    $jurı1 = "";
    $jurı2 = "";
    $jur = array_search("Jüri", $d);

    for ($i = $jur - 4; $i < $jur; $i++) {
        $jurı1 .= $d[$i] . " ";
    };

    for ($i = $jur + 4; $i < $jur + 11; $i++) {
        $jurı2 .= $d[$i] . " ";
    };

    if (strstr($text, "BİTİRME PROJESİ") == true) {


        $ders = "bitirme projesi";
    } else {
        $ders = "araştırma problemleri";
    }
    $anahtar = array_search("kelimeler:", $d);
    $anahtartam = "";

    for ($i = $anahtar + 1; $i < $anahtar + 12; $i++) {
        $anahtartam .= $d[$i] . " ";
    }



 $sql = "INSERT INTO `dosyabilgileri`(`id`, `ogrAd`, `ogrNo`, `ogrTuru`, `baslik`, `tarih`, `danisman`, `juri1`, `juri2`, `ders`, `anahtar`, `ozet`,`kullanicigiris` ) VALUES (NULL ,'$ögr_adı','$ögr_no','$ogr_turu','$baslık','$tarih','$danısman','$jurı1','$jurı2','$ders','$anahtartam','$özet', NULL )";
  if ($con->query($sql) === TRUE) {
       echo "New record created successfully" .PHP_EOL." ";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
   }
}
$con->close();

?>
