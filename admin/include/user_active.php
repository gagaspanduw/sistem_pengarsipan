<?php
session_start();
if ((ISSET($_SESSION['username']) and $_SESSION['level'] != "#")) 	{
	$id_active=$_SESSION['id_user'];
	$user_active=$_SESSION['username'];
	$nama_active=$_SESSION['nama'];
	$level_active=$_SESSION['level'];
	}
else if (ISSET($_SESSION['username']))
	{
	echo "<script>alert('Harap menghubungi Admin untuk mengakses halaman ini !!!'); document.location='../index.php'</script>";
	}
else 
	{
	echo "<script>alert('Anda harus login untuk mengakses halaman ini !!!'); document.location='../index.php'</script>";
	
}
?>