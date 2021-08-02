<?php
         include "../koneksi.php"; 
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
                        <h1 class="page-header">User</h1>
                    <form method="get">
                    <div class="form-group">
                      <label class="control-label" for="nama">Pilih Tanggal</label>
                    </div>         
                    <div class="form-group col-lg-3">
                        <input class="form-control" name="daritgl" type="date" required="" />
                    </div>
                    <div class="form-group col-lg-3">
                    <input class="form-control" type="date" name="sampaitgl" />
                    </div>
                    <div class="form-group col-lg-3">
                        <button type="submit" name="submit" value="submit" class="btn btn-default">Submit</button>
                        <a href="laporan.php" name="submit" value="submit" class="btn btn-default">Cancel</a>
                    </div>


                                    </form> 
                                    </div>    
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $conn = new mysqli("localhost", "root", "", "pengarsipan");
                                            if ($conn->connect_errno) {
                                                echo "Failed to connect to MySQL: " . $conn->connect_error;
                                            }
                                            if(isset($_GET['submit'])){
                                            $daritgl =$_GET['daritgl'];
                                            $sampaitgl =$_GET['sampaitgl'];
                                            $res = $conn->query("SELECT * FROM tbl_upload where tanggal_upload between '$daritgl' and '$sampaitgl' ");
                                            }else{
                                                $res = $conn->query("SELECT * FROM tbl_upload inner join tbl_user on tbl_upload.nama = tbl_user.id_user");
                                            }
                                            while($row = $res->fetch_assoc()){
                                                $file = "assets/upload_file/$row[dir]";
                                                echo '
                                                <tr>
                                                    <td>'.$row['nama_file'].'</td>
                                                    <td>'.fsize($file).'</td>
                                                    <td>'.$row['tanggal_upload'].'</td>
                                                    <td>'.$row['nama'].'</td>
                                                </tr>
                                                ';
                                            }
                                            ?>
                                        </tbody>
                            </table>
                            <a align="left" class="btn btn-primary" 
                            <?php if(isset($_GET['submit'])){
                                            $daritgl =$_GET['daritgl'];
                                            $sampaitgl =$_GET['sampaitgl'];
                                            echo "href='printlaporan.php?daritgl=$daritgl&&sampaitgl=$sampaitgl'";
                                            }else{
                                            echo "href='printlaporan.php?daritgl=2000-01-01&&sampaitgl=2100-01-01' ";
                                            } ?> 
                            onclick="return warn()" title="Print"><i class="fa fa-print "></i></a></button>
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
function myFunction() {
    window.print();
}
</script>
</body>

</html>
