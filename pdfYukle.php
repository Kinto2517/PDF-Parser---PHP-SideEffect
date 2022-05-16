<?php
ob_start();

session_start();

include_once 'dbconnect.php';

include "girisdb.php";
if (isset($_POST['submit']))
{
    $dosyaadi = $_FILES['file1']['name'];

 
    if($dosyaadi != '')
    {
        $ext = pathinfo($dosyaadi, PATHINFO_EXTENSION);
        $allowed = ['pdf'];
    
   
        if (in_array($ext, $allowed))
        {
           
            $sql = 'select max(id) as id from dosyalar';
            $result = mysqli_query($con, $sql);

          
            $path = 'uploads/';
            $kullanicigiris = $_SESSION ['yenioturum'];
            $ytarihi = @date('Y-m-d H:i:s');
            move_uploaded_file($_FILES['file1']['tmp_name'],($path . $dosyaadi));
            
          
            $sql = "INSERT INTO dosyalar(dosyaadi, tarih, kullanicigiris) VALUES('$dosyaadi', '$ytarihi','$kullanicigiris')";
            mysqli_query($con, $sql);
            header("Location: yukleSayfa.php?st=success");
        }
        else
        {
            header("Location: yukleSayfa.php?st=error");
        }
    }
    else
        header("Location: yukleSayfa.php");
}
?>