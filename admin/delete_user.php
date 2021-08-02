<?php
include "../koneksi.php";

   $row1 = $_GET['id_user'];
   $sql1 = "DELETE FROM tbl_user WHERE id_user='$row1'";
   $query1 = mysql_query($sql1);

   $sql2 = "DELETE FROM tbl_upload WHERE nama='$row1'";
   $query2 = mysql_query($sql2);
   if($query1 and $query2){
		echo "<script>alert('Data berhasil dihapus');document.location='user.php'</script>";
   } 
   else
   {
		echo "<script>alert('Data gagal dihapus');document.location='user.php'</script>";
   }
?>