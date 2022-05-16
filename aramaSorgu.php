<?php
ob_start();
session_start();
include_once 'dbconnect.php';
include "girisdb.php";

$sql = "select dosyaadi, kullanicigiris from dosyalar";
$sql1 = "select kullanicigiris from dosyalar";
$sql2 = "select * from dosyabilgileri";

$result = mysqli_query($con, $sql);
$result1 = mysqli_query($con, $sql1);
$result2 = mysqli_query($con, $sql2);



?>
<html>
<head>
    <title>Sorgu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.css">
    <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css" rel="stylesheet">


</head>
<body>
<div class="container">
    <h1>Admin Sorgu Sayfası</h1>
    <hr>
</div>


<table id="example" class="display responsive nowrap table-stripped " >
    <thead>
    <tr>
        <th>Ogr Ad</th>
        <th>Ogr No</th>
        <th>Ogr Turu</th>
        <th>Baslik</th>
        <th>Donem</th>
        <th>Danisman</th>
        <th>Juri</th>
        <th>Juri</th>
        <th>Ders</th>
        <th>Anahtar Kelime</th>

    </tr>
    </thead>
    <tbody>
    <?php
    $i = 1;
    $row1 = mysqli_fetch_array($result1);

    while($row = mysqli_fetch_array($result2)) {  ?>
    <tr>
        <td><?php echo $row['ogrAd']; ?></td>
        <td><?php echo $row['ogrNo']; ?></td>
        <td><?php echo $row['ogrTuru']; ?></td>
        <td><?php echo $row['baslik']; ?></td>
        <td><?php echo $row['tarih']; ?></td>
        <td><?php echo $row['danisman']; ?></td>
        <td><?php echo $row['juri1']; ?></td>
        <td><?php echo $row['juri2']; ?></td>
        <td><?php echo $row['ders']; ?></td>
        <td><?php echo $row['anahtar']; ?></td>


    </tr><?php }?>

    </tbody>
</table>


<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.js"></script>
<script type="text/javascript" charset="utf8" src="    https://code.jquery.com/jquery-3.5.1.js
"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js
"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js
"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.colVis.min.js

"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'colvis'
            ]
        });
    });
</script>

</body>

</html>
