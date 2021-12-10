<?php
   session_start();
   error_reporting(0);
   if(isset($_SESSION['id_user']))
   {
       header("Location:list.php");
   }
   if($_POST['tombol_registrasi'])
   {
      $username = $_POST['textbox_username'];
      $password = $_POST['textbox_password'];
      $hakakses = $_POST['combobox_hakakses'];

      $konek = mysqli_connect("localhost","root","","db_latihan2");
      $kueri = mysqli_query($konek,"
                                      INSERT INTO tabel_user(username,password,hakakses)
                                      VALUES('".$username."','".$password."','".$hakakses."')
                                   ");
      if($kueri)
      {
          header("Location:registrasi.php?r=1");
      }
      else
      {
          header("Location:registrasi.php?r=2");
      }
      mysqli_close($konek);
      
   }
?>
<a href='login.php'>Login</a>&nbsp&nbsp&nbsp
<a href='registrasi.php'>Registrasi</a>
<br>
<form action="" method="POST">
   <table>
      <tr>
         <td>
            Username
         </td>
         <td>
            <input type='TEXT' name='textbox_username'>
         </td>
      </tr>
      <tr>
         <td>
            Password
         </td>
         <td>
            <input type='TEXT' name='textbox_password'>
         </td>
      </tr>
      <tr>
         <td>
            Hak Akses
         </td>
         <td>
            <select name="combobox_hakakses">
               <option value="Admin">Admin</option>
               <option value="Nonadmin">Nonadmin</option>
            </select>
         </td>
      </tr>
      <tr>
         <td>
         </td>
         <td>
            <input type='SUBMIT' name='tombol_registrasi' value='Registrasi'>
         </td>
      </tr>
   </table>
</form>
<?php
   if($_GET['r']==1)
   {
      echo "registrasi berhasil";
   }
   if($_GET['r']==2)
   {
      echo "registrasi gagal";
   }
?>