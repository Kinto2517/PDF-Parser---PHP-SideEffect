<?php
include_once 'dbconnect.php';

 
$sql = "select dosyaadi from dosyalar";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Dosya Yükle</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <link rel="stylesheet" href="deneme.css">
</head>
<body>
<br/>
<div class="wrapper">
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2 well">
        <form action="pdfYukle.php" method="post" enctype="multipart/form-data">
            <legend><h1 style="width: 700px; margin-left: 145px">Dosyayı Seçiniz:</h1></legend>

            <div class="form-control">
                <input class="form-control" style="margin-left: 200px" type="file" name="file1" id="formFile" />
            </div>


            <div class="form-group">
                <button style="margin-left: 200px"  type="submit" name="submit" value="Yükle" class="button button--fenrir">
                <svg aria-hidden="true" class="progress" width="70" height="70" viewBox="0 0 70 70">
                    <path class="progress__circle" d="m35,2.5c17.955803,0 32.5,14.544199 32.5,32.5c0,17.955803 -14.544197,32.5 -32.5,32.5c-17.955803,0 -32.5,-14.544197 -32.5,-32.5c0,-17.955801 14.544197,-32.5 32.5,-32.5z"></path>
                    <path class="progress__path" d="m35,2.5c17.955803,0 32.5,14.544199 32.5,32.5c0,17.955803 -14.544197,32.5 -32.5,32.5c-17.955803,0 -32.5,-14.544197 -32.5,-32.5c0,-17.955801 14.544197,-32.5 32.5,-32.5z" pathLength="1"></path>
                </svg>
                <span>Yükle</span>
                </button>
            </div>
            <br>
            <?php if(isset($_GET['st'])) { ?>
                <div class="alert alert-danger container">
                <?php if ($_GET['st'] == 'success') {
                        echo "Dosya Başarıyla Yüklendi!";
                    }
                    else
                    {
                        echo 'Yükleme işlemi sırasında hata oluştu!';
                    } ?>
                </div>
            <?php } ?>
        </form>
        </div>
    </div>
    
    
</body>
</html>