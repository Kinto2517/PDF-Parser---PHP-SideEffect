<?php

include "girisdb.php";

if(isset($_GET['sil'])){
    $sqlsil="DELETE FROM `kullanici` WHERE `kullanici`.`id` = ?";
    $sorgusil=$baglan->prepare($sqlsil);
    $sorgusil->execute([
        $_GET['sil']
    ]);

    header('Location:adminpanel.php');

}

$sql ="SELECT * FROM kullanici";
$sorgu = $baglan->prepare($sql);
$sorgu->execute();

?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcılar</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body style="background: url(https://wallpaperaccess.com/full/1550170.jpg) no-repeat; background-size: 100% 100%">
    
    <header>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="display-1 text-center border border-light" style="color: #3dd5f3">Kullanıcılar</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="btn-group">
                        <a href="adminpanel.php" class="btn btn-outline-light" >Kullanıcılar</a>
                    <a style="margin-left: 1076px" href="adminEkle.php" class="btn btn-outline-info" >Kullanıcı Ekle</a>
                    </div>
                </div>
            </div>
        </div>
    
    </header>
    <main>
        <div class="container">
            <div class="row mt-4">
                <div class="col">
                    <table class="table table-hover table-light table-striped">
                        <thead >
                            <tr>
                                <th>id</th>
                                <th>Kullanıcı Adı</th>
                                <th>Şifre</th>
                                <th>Eylem</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while($satir = $sorgu->fetch(PDO::FETCH_ASSOC)) { ?>
                            <tr>
                                <td><?=$satir['id']?></td>
                                <td><?=$satir['kullanicigiris']?></td>
                                <td><?=$satir['sifre']?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="adminGuncelle.php?id=<?=$satir['id']?>" class="btn btn-secondary" >Kullanıcı Güncelle</a>

                                        <a style="margin-left: 20px" href="?sil=<?=$satir['id']?>" onclick="return confirm('Silinsin mi?')" class="btn btn-danger">Sil</a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
    </main>
    <footer></footer>
</body>
</html>