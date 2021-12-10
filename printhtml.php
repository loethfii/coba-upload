<?php
   session_start();
   error_reporting(0);
   //time out 5 detik
     if(isset($_SESSION['LAST_ACTIVITY']) && (time()-$_SESSION['LAST_ACTIVITY'] > 10))
     {
         unset($_SESSION);
         session_destroy();
         header("Location:login.php");
     }
     $_SESSION['LAST_ACTIVITY'] = time();


   if(!isset($_SESSION['id_user']))
   {
       header("Location:login.php");
   }

   $iddata = $_GET['id_data'];
   $konek = mysqli_connect("localhost","root","","db_latihan2");
   $rs = mysqli_query($konek, "SELECT * FROM mahasiswa WHERE id='".$iddata."'");
   if($row = mysqli_fetch_assoc($rs)) 
   {
      $iddata = $row['id'];
      $nim = $row['nim'];
      $namalengkap = $row['namalengkap'];
      $prodi = $row['prodi'];
      $angkatan = $row['angkatan'];
   }
   mysqli_connect($konek);
?>
<table border='0' cellspacing='0' style='width:400px;'>
   <tr>
      <td>
         <b>KARTU MAHASISWA</b>
      </td>
      <td style='text-align:right;'>
         <?php
            echo $iddata;
         ?>
      </td>
   </tr>
   <tr>
          <table style='width:400px;'>
             <tr>
                <td style='text-align:right;'>
                   NIM
                </td>
                <td>
                   :
                </td>
                <td>
                   <?php
                       echo $nim;
                   ?>
                </td>
		<td rowspan='3'>
			<img src='avatar.jpg' style='width:100px;height:100px;' align='right'>
	       </td>
             </tr>
             <tr>
                <td style='text-align:right;'>
                   Nama Lengkap
                </td>
                <td>
                   :
                </td>
                <td>
                   <?php
                       echo $namalengkap;
                   ?>
                </td>
             </tr>
             <tr>
                <td style='text-align:right;'>
                   Prodi
                </td>
                <td>
                   :
                </td>
                <td>
                   <?php
                       echo $prodi;
                   ?>
                </td>
             </tr>
             <tr>
                <td style='text-align:right;'>
                   Angkatan
                </td>
                <td>
                   :
                </td>
                <td>
                   <?php
                       echo $angkatan;
                   ?>
                </td>
             </tr>
          </table>
</table>