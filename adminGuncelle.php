<?php
 
include "girisdb.php";
 
if(isset($_POST['guncelle'])){
 
    $sql = "UPDATE `kullanici` SET `kullanicigiris` =?, `sifre` = ? WHERE `kullanici`.`id` = ?";
    $dizi=[
        $_POST['kullanıcıadı'],
        $_POST['sifre'],
        $_POST['id']
    ];
    $sorgu = $baglan->prepare($sql);
    $sorgu->execute($dizi);
 
    header("Location:adminpanel.php");
}
 
$sql ="SELECT * FROM kullanici WHERE id = ?";
$sorgu = $baglan->prepare($sql);
$sorgu->execute([
    $_GET['id']
]);
$satir = $sorgu->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Güncelle</title>
    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body style="background: url(https://wallpaperaccess.com/full/1550170.jpg) no-repeat; background-size: 100% 100%" >
    
    <header>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="display-1 text-center" style="color: #0dcaf0">Güncelle</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="btn-group">
                        <a href="adminpanel.php" class="btn btn-outline-light">Kullanıcılar</a>
                        <a style="margin-left: 1076px" href="adminEkle.php" class="btn btn-outline-light ">Kullanıcı Ekle</a>
                    </div>
                </div>
            </div>
        </div>
    
    </header>
    <main>
    <div class="container">
        <form action="" method="post" class="row mt-4 g-3">
            <input type="hidden" name="id" value="<?=$satir['id']?>">
            <div class="col-6">
                <label for="kullanıcıadı" class="form-label" style="color: #0dcaf0">Kullanıcı Adı</label>
                <input type="text" class="form-control" name="kullanıcıadı" value="<?=$satir['kullanicigiris']?>">
            </div>
            <div class="col-6">
                <label for="sifre" class="form-label" style="color: #0dcaf0">Parola</label>
                <input type="text" class="form-control" name="sifre" value="<?=$satir['sifre']?>">
            </div>
          
            <button type="submit" name="guncelle" class="btn btn-primary">Güncelle</button>
        </form>
    </div>
    </main>
    <footer></footer>
</body>
</html>