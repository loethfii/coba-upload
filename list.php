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
   }


   if($_GET['delete']==5)
   {
       if($hakakses=="Admin")
       {
           $iddata = $_GET['id_data'];
           $konek = mysqli_connect("localhost","root","","db_latihan2");
           $kueri = mysqli_query($konek,"DELETE FROM mahasiswa WHERE id='".$iddata."'");
           if($kueri)
           {
              header("Location:list.php?r=3");
           }
           else
           {
              header("Location:list.php?r=4");
           }
           mysqli_connect($konek); 
       }
       else{
              header("Location:dilarang.php");
       }
   }
   if($_GET['logout']==1)
   {
       unset($_SESSION);
       session_destroy();
       header("Location:login.php");
   }
?>
<a href='input.php'>Input</a> &nbsp&nbsp&nbsp
<a href='list.php'>List</a>&nbsp&nbsp&nbsp
<a href='list.php?logout=1'>Logout</a>

<table border='1' cellspacing='0'>
   <tr>
      <td>
         Nim
      </td>
      <td>
         Nama Lengkap
      </td>
      <td>
         Prodi
      </td>
      <td>
         Angkatan
      </td>
      <td>
         Aksi
      </td>
   </tr>
   <?php
      $konek = mysqli_connect("localhost","root","","db_latihan2");
      $rs = mysqli_query($konek, "SELECT * FROM mahasiswa");
      while($row = mysqli_fetch_assoc($rs)) 
      {
         $iddata = $row['id'];
         echo "<tr>";
            echo "<td>";
               echo $row["nim"];
            echo "</td>";
            echo "<td>";
               echo $row["namalengkap"];
            echo "</td>";
            echo "<td>";
               echo $row["prodi"];
            echo "</td>";
            echo "<td>";
               echo $row["angkatan"];
            echo "</td>";
            echo "<td>";
               echo "<a href='update.php?id_data=$iddata'>Update</a><br>";
               echo "<a href='list.php?delete=5&id_data=$iddata'>Delete</a><br>";
               echo "<a href='printhtml.php?id_data=$iddata'>Print (HTML)</a><br>";
               echo "<a href='printpdf.php?id_data=$iddata'>Print (PDF)</a><br>";
            echo "</td>";
         echo "</tr>";
      }
      mysqli_connect($konek);
   ?>
</table>
<?php
   if($_GET['r']==3)
   {
       echo "delete berhasil";
   }
   if($_GET['r']==4)
   {
       echo "delete gagal";
   }
?>