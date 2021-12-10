<?php
   session_start();
   
   if(isset($_SESSION['id_user']))
   {
       header("Location:list.php");
   }
   if($_POST['login'])
   {
      $username = $_POST['textbox_username'];
      $password = $_POST['textbox_password'];
      $ada = 0;
      $konek = mysqli_connect("localhost","root","","db_latihan2");
      $rs = mysqli_query($konek, "SELECT * FROM tabel_user WHERE username='".$username."' AND password='".$password."'");
      if($row = mysqli_fetch_assoc($rs)) 
      {
          $iduser = $row['id'];
          $ada = 1;
      }
      mysqli_connect($konek);
       if($ada==1)
       {
           $_SESSION['id_user'] = $iduser;
           header("Location:list.php");
       }
       else{
           header("Location:login.php?r=2");
       }
      
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
         </td>
         <td>
            <input type='SUBMIT' name='login' value='Login'>
         </td>
      </tr>
   </table>
</form>
<?php
   if($_GET['r']==1)
   {
      echo "login berhasil";
   }
   if($_GET['r']==2)
   {
      echo "login gagal";
   }
?>