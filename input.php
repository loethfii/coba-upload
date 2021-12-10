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

   if($_POST['tombol_simpan'])
   {
      $nim = $_POST['textbox_nim'];
      $namalengkap = $_POST['textbox_namalengkap'];
      $prodi = $_POST['textbox_prodi'];
      $angkatan = $_POST['textbox_angkatan'];

      $konek = mysqli_connect("localhost","root","","db_latihan2");
      $kueri = mysqli_query($konek,"
                                      INSERT INTO mahasiswa(nim,namalengkap,prodi,angkatan)
                                      VALUES('".$nim."','".$namalengkap."','".$prodi."','".$angkatan."')
                                   ");
      if($kueri)
      {
          header("Location:input.php?r=1");
      }
      else
      {
          header("Location:input.php?r=2");
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
<a href='input.php'>Input</a>&nbsp&nbsp&nbsp
<a href='list.php'>List</a>&nbsp&nbsp&nbsp
<a href='input.php?logout=1'>Logout</a>
<br>
<form action="" method="POST">
   <table>
      <tr>
         <td>
            Nim
         </td>
         <td>
            <input type='TEXT' name='textbox_nim'>
         </td>
      </tr>
      <tr>
         <td>
            Nama Lengkap
         </td>
         <td>
            <input type='TEXT' name='textbox_namalengkap'>
         </td>
      </tr>
      <tr>
         <td>
            Prodi
         </td>
         <td>
            <input type='TEXT' name='textbox_prodi'>
         </td>
      </tr>
      <tr>
         <td>
            Angkatan
         </td>
         <td>
            <input type='TEXT' name='textbox_angkatan'>
         </td>
      </tr>
      <tr>
         <td>
         </td>
         <td>
            <input type='SUBMIT' name='tombol_simpan' value='Simpan'>
         </td>
      </tr>
   </table>
</form>
<?php
   if($_GET['r']==1)
   {
      echo "input berhasil";
   }
   if($_GET['r']==2)
   {
      echo "input gagal";
   }
?>