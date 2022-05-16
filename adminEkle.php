<?php
 
if(isset($_POST["kaydet"]))
{
    include "girisdb.php";
  
   $sql = "INSERT INTO `kullanici` (`id`, `kullanicigiris`, `sifre`) VALUES (NULL, ?, ?)";
    $dizi =[
        $_POST["kullanıcıadı"],
        $_POST["sifre"]
    ];
 
    $sth = $baglan->prepare($sql);
   $sonuc = $sth->execute($dizi);
   header("Location:adminpanel.php");
}
 
 
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Ekle</title>
    <style>
        html, body {
            margin: 0;
            height: 100%;
        }
    </style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body style="background: url(https://wallpaperaccess.com/full/1550170.jpg) no-repeat; background-size: 100% 100%" >
    <header>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="display-1 text-center" style="color: #0dcaf0">Kullanıcı Ekle</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="btn-group">
                        <a href="adminpanel.php" class="btn btn-outline-secondary">Kullanıcılar</a>
                        <a style="margin-left: 1076px" href="adminEkle.php" class="btn btn-outline-secondary">Kullanıcı Ekle</a>
                    </div>
                </div>
            </div>
        </div>
    
    </header>

    <main>
    <div class="container">
        <form action="" method="post" class="row mt-4 g-3">
            <div class="col-6">
                <label for="kullanıcıadı" class="form-label" style="color: #25cff2">Kullanıcı Adı</label>
                <input type="text" class="form-control" name="kullanıcıadı">
            </div>
            <div class="col-6">
                <label for="sifre" class="form-label" style="color: #25cff2">Parola</label>
                <input type="text" class="form-control" name="sifre">
            </div>
           
            <button type="submit" name="kaydet" class="btn btn-primary">Kaydet</button>
        </form>
    </div>
    </main>

</body>
</html>