<?php
   session_start();
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
   include('mpdf/mpdf.php');

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
   
   $variabel_html = "<table border='0' cellspacing='0' style='width:500px;'>
	<tr>
		<td>
			<b>KARTU MAHASISWA</b>
		</td>
		<td>
			$iddata
		</td>
	</tr>
	<tr>
		<td style='text-align:right;'>
                  	NIM
		</td>
		<td>
                  	:
		</td>
		<td>
                     	$nim                  
		</td>
		<td rowspan='5'>
			<img src='avatar.jpg' width='100px' height='100px'>
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
                     	$namalengkap
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
                    	$prodi
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
                    	$angkatan
		</td>
	</tr>
   </table>
";


   $mpdf=new mPDF("", array(250,300), "8");
   $mpdf->allow_charset_conversion=true;
   $mpdf->charset_in='UTF-8';
   $mpdf->WriteHTML($variabel_html);
   $mpdf->Output();
?>