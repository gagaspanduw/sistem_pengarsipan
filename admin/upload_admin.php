<?php
         include "../koneksi.php";
         date_default_timezone_set ("Asia/Jakarta");
         ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <?php 
        include "include/title.php";
        ?>

    <!-- Bootstrap Core CSS -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    
    <!-- DataTables CSS -->
    <link href="assets/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    
    <!-- DataTables Responsive CSS -->
    <link href="assets/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<?php 
    include "include/headerup.php"; 
    include "include/header.php";
?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Upload</h1>
                    </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Upload file
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                    <form method="post" role="form" enctype="multipart/form-data" name="forms" id="forms">
                    <table class="table table-bordered" border="8">                
                    <td>            
                    <div class="form-group">            
                      <label class="control-label" for="nama">Nama File<span class="text-danger">*</span></label>
                        <input class="form-control" name="nama_file" type="text" id="nama" required="" />
                    </div>

                    <div class="form-group">
                    <label for="level" class="control-label">Kategori<span class="text-danger">*</span></label>
                    <select class="form-control" name="kategori" id="kategori" required="" onchange="tampilkan()">
                        <option value="">Option</option>
                        <option value="Musik">Musik</option>
                        <option value="Video">Video</option>
                        <option value="Gambar">Gambar</option>
                        <option value="Dokumen">Dokumen</option>
                    </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label" id="sub_kategori" name="sub_kategori"></label>
                      </div>
                </td>
            </table>
                                        <button type="submit" name="submit" value="submit" class="btn btn-default">Submit</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?php
$valid_extgambar = array('jpg', 'jpeg', 'png');
$valid_extvideo = array('mp4', '3gp', 'mkv');
$valid_extdok = array('doc', 'docx', 'pdf', 'xls', 'xlsx', 'ppt', 'pptx', 'accdb', 'rar');
$valid_extmusik = array('mp3');
if(isset($_POST['submit'])){
$ext = strtolower(end(explode('.', $_FILES['file']['name'])));
$date = date('Y-m-d H:i:sa');
$datename = date('ymdhisa');
$nama_file  = $_POST['nama_file'];
$kategori = $_POST['kategori'];
$nama = $_FILES['file']['name'];
$ukuran = $_FILES['file']['size'];
$file_tmp = $_FILES['file']['tmp_name'];
$tipe = $_FILES['file']['type'];
$nama_upload = $datename.$nama;
$cek = mysql_query ("SELECT * FROM tbl_upload WHERE nama='$id_active' and nama_file='$nama_file'");
$ceks = mysql_num_rows($cek);
if($ceks > 0){
{echo "<script>alert('Nama file tidak boleh sama'); window.location='upload_admin.php'</script>";
  }
    }else{
        if($kategori == 'Gambar'){
        if(in_array($ext, $valid_extgambar)){
        move_uploaded_file($file_tmp, 'assets/upload_file/'.$nama_upload);
        mysql_query("INSERT INTO tbl_upload VALUES('$nama_file', '$ukuran', '$tipe', '$kategori', '$id_active', '$nama_upload', '$date')");
        echo "<script>alert('Berhasil Menyimpan data'); window.location='upload_admin.php'</script>";
        }
        else{
        echo "<script>alert('Maaf, File tidak sesuai kategori. ekstensi untuk gambar yang diperbolehkan (.jpg, .jpeg, .png)'); window.location='upload_admin.php'</script>";
        }
        }
        elseif ($kategori == 'Video'){
            if(in_array($ext, $valid_extvideo)){
            move_uploaded_file($file_tmp, 'assets/upload_file/'.$nama_upload);
            mysql_query("INSERT INTO tbl_upload VALUES('$nama_file', '$ukuran', '$tipe', '$kategori', '$id_active', '$nama_upload', '$date')");
            echo "<script>alert('Berhasil Menyimpan data'); window.location='upload_admin.php'</script>";
            }
            else{
                echo "<script>alert('Maaf, File tidak sesuai kategori. ekstensi untuk video yang diperbolehkan (.mp4, .3gp, .mkv)'); window.location='upload_admin.php'</script>";
            }
        }
        elseif ($kategori == 'Dokumen'){
            if(in_array($ext, $valid_extdok)){
            move_uploaded_file($file_tmp, 'assets/upload_file/'.$nama_upload);
            mysql_query("INSERT INTO tbl_upload VALUES('$nama_file', '$ukuran', '$tipe', '$kategori', '$id_active', '$nama_upload', '$date')");
            echo "<script>alert('Berhasil Menyimpan data'); window.location='upload_admin.php'</script>";
            }
            else{
                echo "<script>alert('Maaf, File tidak sesuai kategori. ekstensi untuk Dokumen yang diperbolehkan (.doc, .docx, .pdf, .xls, .xlsx, .ppt, .pptx, .accdb, .rar)'); window.location='upload_admin.php'</script>";
            }
        }
        elseif ($kategori == 'Musik'){
            if(in_array($ext, $valid_extmusik)){
            move_uploaded_file($file_tmp, 'assets/upload_file/'.$nama_upload);
            mysql_query("INSERT INTO tbl_upload VALUES('$nama_file', '$ukuran', '$tipe', '$kategori', '$id_active', '$nama_upload', '$date')");
            echo "<script>alert('Berhasil Menyimpan data'); window.location='upload_admin.php'</script>";
            }
            else{
                echo "<script>alert('Maaf, File tidak sesuai kategori. ekstensi untuk musik yang diperbolehkan (.mp3)'); window.location='upload_admin.php'</script>";
            }
        }
        else{
            echo "<script>alert('Anda belum memilih kategori'); window.location='upload_admin.php'</script>";
        }
}
}
?>             
<?php
function fsize($file){
    $a = array("B", "KB", "MB", "GB", "TB", "PB");
    $pos = 0;
    $size = filesize($file);
    while ($size >= 1024)
    {
    $size /= 1024;
    $pos++;
    }
    return round ($size,2)." ".$a[$pos];
    }
?>  
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Nama File</th>
                                                <th>Ukuran File</th>
                                                <th>Tanggal Upload</th>
                                                <th>Nama</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $conn = new mysqli("localhost", "root", "", "pengarsipan");
                                            if ($conn->connect_errno) {
                                                echo "Failed to connect to MySQL: " . $conn->connect_error;
                                            }
                                            $res = $conn->query("SELECT * FROM tbl_upload inner join tbl_user on tbl_upload.nama = tbl_user.id_user");
                                            while($row = $res->fetch_assoc()){
                                                $file = "assets/upload_file/$row[dir]";
                                                echo '
                                                <tr>
                                                    <td>'.$row['nama_file'].'</td>
                                                    <td>'.fsize($file).'</td>
                                                    <td>'.$row['tanggal_upload'].'</td>
                                                    <td>'.$row['nama'].'</td>
                                                    <td align="center">
                                                    <a class="btn btn-danger btn-circle" href="delete_file.php?dir='.$row['dir'].'" onclick="return warn()" title="Hapus"><i class="fa fa-trash-o "></i></a></button>
                                                    </td>
                                                </tr>
                                                ';
                                            }
                                            ?>
                                        </tbody>
                            </table>
                            <!-- /.col-lg-12 -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /#page-wrapper -->
            </div>
        </div>
    </div>
</div>
</div>

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="assets/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="assets/dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="assets/vendor/datatables-responsive/dataTables.responsive.js"></script>

        <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

<script>
  function tampilkan(){
  var nama_kota=document.getElementById("forms").kategori.value;
  if (nama_kota=="Musik")
    {
        document.getElementById("sub_kategori").innerHTML="<label class='control-label'>Pilih File<span class='text-danger'>*</span></label><input class='form-control' type='file' name='file' accept='.mp3' />";
    }
  else if (nama_kota=="Video")
    {
        document.getElementById("sub_kategori").innerHTML="<label class='control-label'>Pilih File<span class='text-danger'>*</span></label><input class='form-control' type='file' name='file' accept='.mp4, .3gp, .mkv' />";
    }
  else if (nama_kota=="Gambar")
    {
        document.getElementById("sub_kategori").innerHTML="<label class='control-label'>Pilih File<span class='text-danger'>*</span></label><input class='form-control' type='file' name='file' accept='.jpg, .jpeg, .png' />";
    }
  else if (nama_kota=="Dokumen")
    {
        document.getElementById("sub_kategori").innerHTML="<label class='control-label'>Pilih File<span class='text-danger'>*</span></label><input class='form-control' type='file' name='file' accept='.doc, .docx, .pdf, .xls, .xlsx, .ppt, .pptx, .accdb, .rar' />";
    }
}
</script>

</body>

</html>
