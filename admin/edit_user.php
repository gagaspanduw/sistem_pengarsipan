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
    $param=$_GET['id_user'];

    $sql="SELECT * FROM tbl_user where id_user=$param";
    $query=mysql_query($sql);
    $row=mysql_fetch_array($query);
?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User</h1>
                    </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Input data user
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form method="post" role="form">
                    <table class="table table-bordered" border="8">                
                    <td>            
                    <div class="form-group">            
                      <label class="control-label" for="nama">Nama<span class="text-danger">*</span></label>
                        <input class="form-control" name="nama" type="text" id="nama" required="" value="<?php echo $row['nama'] ?>" />
                    </div>

                    <div class="form-group">
                        <label class="control-label">Username<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="usern" required="" value="<?php echo $row['username'] ?>" />
                      </div>

                    <div class="form-group">
                        <label class="control-label">Password<span class="text-danger">*</span></label>
                        <input class="form-control" type="password" required="" name="pass" value="<?php echo $row['password'] ?>" />
                      </div>
                    <div class="form-group">
                    <label for="level" class="control-label">Level<span class="text-danger">*</span></label>
                    <select class="form-control" name="level" required="" onchange="javascript:get(this)">
                        <option value="<?php echo $row['level'] ?>"><?php echo $row['level'] ?></option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
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
if(isset($_POST['submit'])){
$nama  = $_POST['nama'];
$usern = $_POST['usern'];
$pass  = $_POST['pass'];
$level = $_POST['level'];
$insert = mysql_query("UPDATE tbl_user SET nama='$nama', username='$usern', password='$pass', level='$level' where id_user=$param");
if($insert){
{echo "<script>alert('Berhasil menyimpan data'); window.location='user.php'</script>";
  }
    }else{
{echo "<script>alert('Gagal menyimpan data'); window.location='user.php'</script>";
  }
}
}
?>                
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

</body>

</html>
