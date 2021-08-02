<html lang="en">
<head>
</head>
<body>
<?php
session_start();
include 'koneksi.php';
if ((empty($_POST['username'])) OR (empty($_POST['password'])))
{
    echo "<script>alert('Maaf anda belum memasukan Username dan Password !!!'); document.location='index'</script>";
}
else
{
$username = $_POST['username'];
$password = $_POST['password'];
//mengenkripsikan untuk dicocokan dengan database
$query = "SELECT * from tbl_user
where username = '$username' ";
$hasil = mysql_query($query);
$data = mysql_fetch_array($hasil);

  if ($username == $data['username'] and $password == $data['password'])
  {
    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['password'] = $data['password'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['level'] = $data['level'];
	  echo "<script>alert('Login Berhasil'); window.location='admin/home.php'</script>";
  }
  else  
	{
	echo "<script>alert('Username atau Password yang anda masukan salah !'); document.location='index.php'</script>";

	}
  }
?>
</body>
</html>