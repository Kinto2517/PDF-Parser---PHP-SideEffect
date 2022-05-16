<?php
ob_start();
session_start();
include_once 'dbconnect.php';
include "girisdb.php";
 
$sql = "select dosyaadi, kullanicigiris from dosyalar";
$sql1 = "select kullanicigiris from dosyalar";

$result = mysqli_query($con, $sql);
$result1 = mysqli_query($con, $sql1);


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/A.style.css.pagespeed.cf.XgDbNFMzAt.css">
    <script defer="" src="/cdn-cgi/zaraz/s.js?executed=&amp;c=_ga%3DGA1.2.8458874.1640001110%3B+_gid%3DGA1.2.1389483040.1640001110&amp;t=Table+09&amp;w=1536&amp;h=864&amp;j=723&amp;e=1496&amp;l=https%3A%2F%2Fpreview.colorlib.com%2Ftheme%2Fbootstrap%2Ftable-09%2F&amp;r=https%3A%2F%2Fcolorlib.com%2F&amp;k=24&amp;n=UTF-8&amp;o=-180"></script><script>(function(w,d){!function(e,t,r,a,s){e[r]=e[r]||{},e[r].executed=[],e.zaraz={deferred:[]};var n=t.getElementsByTagName("title")[0];e[r].c=t.cookie,n&&(e[r].t=t.getElementsByTagName("title")[0].text),e[r].w=e.screen.width,e[r].h=e.screen.height,e[r].j=e.innerHeight,e[r].e=e.innerWidth,e[r].l=e.location.href,e[r].r=t.referrer,e[r].k=e.screen.colorDepth,e[r].n=t.characterSet,e[r].o=(new Date).getTimezoneOffset(),//
            e[s]=e[s]||[],e.zaraz._preTrack=[],e.zaraz.track=(t,r)=>e.zaraz._preTrack.push([t,r]),e[s].push({"zaraz.start":(new Date).getTime()});var i=t.getElementsByTagName(a)[0],o=t.createElement(a);o.defer=!0,o.src="/cdn-cgi/zaraz/s.js?"+new URLSearchParams(e[r]).toString(),i.parentNode.insertBefore(o,i)}(w,d,"zarazData","script","dataLayer");})(window,document);</script>
</head>



<body style="margin-top: -25px">
<script src="https://unpkg.com/tailwindcss-jit-cdn"></script>
<section  class="flex flex-col justify-center antialiased bg-gray-100 text-gray-600 min-h-screen p-4" style="background-image: url(https://images.hdqwalls.com/wallpapers/gradient-blur-minimalism-fh.jpg)">
    <div class="h-full">
        <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
            <header class="px-5 py-4 border-b border-gray-100" style="background-color: #4f2e4b">
                <h2 class="font-semibold text-gray-800" style="color: #c4c4c4">DOSYALAR</h2>
            </header>
            <div class="p-3">
                <div class="overflow-x-auto">
                    <table class="table-auto w-full">
                        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                        <tr>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">#</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">Dosya Adı</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">İncele</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-center">İndir</div>
                            </th>
                        </tr>
                        </thead>

                        <tbody class="text-sm divide-y divide-gray-100">
                        <?php
                        $i = 1;
                        $row1 = mysqli_fetch_array($result1);

                            while($row = mysqli_fetch_array($result)) { if ($_SESSION['yenioturum'] == $row['kullanicigiris']) {?>

                                <tr>
                                <td class="p-2 whitespace-nowrap"><?php echo $i++; ?></td>
                                <td class="p-2 whitespace-nowrap"><?php echo $row['dosyaadi']; ?></td>
                                <td class="p-2 whitespace-nowrap"><a href="uploads/<?php echo $row['dosyaadi']; ?>" target="_blank">İncele</a></td>
                                <td><a href="uploads/<?php echo $row['dosyaadi']; ?>" download>İndir</td>
                            </tr>
                        <?php }}?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>