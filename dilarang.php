<?php
   session_start();
   error_reporting(0);
   if($_GET['logout']==1)
   {
       unset($_SESSION);
       session_destroy();
       header("Location:login.php");
   }
?>
<a href='input.php'>Input</a> &nbsp&nbsp&nbsp
<a href='list.php'>List</a> &nbsp&nbsp&nbsp
<a href='dilarang.php?logout=1'>Logout</a>
<br>
Akses dilarang