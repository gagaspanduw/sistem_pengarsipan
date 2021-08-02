<?php
include "../koneksi.php";

   $row1 = $_GET['dir'];
   $deletefile = "assets/upload_file/$row1";
   $sql1 = "DELETE FROM tbl_upload WHERE dir='$row1'";
   $query1 = mysql_query($sql1);
   if (file_exists($deletefile)){
      unlink($deletefile);
   }
   if($query1){
		echo "<script>alert('Data berhasil dihapus');document.location='upload_admin.php'</script>";
   } 
   else
   {
		echo "<script>alert('Data gagal dihapus');document.location='upload_admin.php'</script>";
   }
?>