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
   else
   {
      //cek hak akses
      $iduser = $_SESSION['id_user'];
      $konek = mysqli_connect("localhost","root","","db_latihan2");
      $rs = mysqli_query($konek, "SELECT * FROM tabel_user WHERE id='".$iduser."' ");
      if($row = mysqli_fetch_assoc($rs)) 
      {
          $hakakses = $row['hakakses'];
      }
      mysqli_connect($konek);
      if($hakakses=="Admin"){
      }
      else{
          header("Location:dilarang.php");
      }
   }

   if($_POST['tombol_update'])
   {
      $iddata = $_GET['id_data'];
      $nim = $_POST['textbox_nim'];
      $namalengkap = $_POST['textbox_namalengkap'];
      $prodi = $_POST['textbox_prodi'];
      $angkatan = $_POST['textbox_angkatan'];

      $konek = mysqli_connect("localhost","root","","db_latihan2");
      $kueri = mysqli_query($konek,"
                                      UPDATE mahasiswa SET nim='".$nim."',
                                                           namalengkap='".$namalengkap."',
                                                           prodi='".$prodi."',
                                                           angkatan='".$angkatan."'
                                      WHERE id = '".$iddata."'
                                   ");
      if($kueri)
      {
          header("Location:update.php?r=1&id_data=$iddata");
      }
      else
      {
          header("Location:update.php?r=2&id_data=$iddata");
      }
      mysqli_close($konek);

   }
   if($_GET['logout']==1)
   {
       unset($_SESSION);
       session_destroy();
       header("Location:login.php");
   }
?>
<a href='input.php'>Input</a> &nbsp&nbsp&nbsp
<a href='list.php'>List</a> 
<a href='update.php?logout=1'>Logout</a> 
<br>
<?php
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
<form action='' method='POST'>
   <table>
      <tr>
         <td>
            Nim
         </td>
         <td>
            <?php
               echo "<input type='TEXT' name='textbox_nim' value='$nim'>";
            ?>
         </td>
      </tr>
      <tr>
         <td>
            Nama Lengkap
         </td>
         <td>
            <?php
               echo "<input type='TEXT' name='textbox_namalengkap' value='$namalengkap'>";
            ?>
         </td>
      </tr>
      <tr>
         <td>
            Prodi
         </td>
         <td>
            <?php
               echo "<input type='TEXT' name='textbox_prodi' value='$prodi'>";
            ?>
         </td>
      </tr>
      <tr>
         <td>
            Angkatan
         </td>
         <td>
            <?php
               echo "<input type='TEXT' name='textbox_angkatan' value='$angkatan'>";
            ?>
         </td>
      </tr>
      <tr>
         <td>
         </td>
         <td>
            <input type='SUBMIT' name='tombol_update' value='Update'>
         </td>
      </tr>
   </table>
</form>
<?php
   if($_GET['r']==1)
   {
       echo "update berhasil";
   }
   if($_GET['r']==2)
   {
       echo "update gagal";
   }
?>