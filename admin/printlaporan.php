<?php
         include "../koneksi.php";
         include "include/user_active.php"; 
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
<table width="1000" height="142" border="1" bordercolor="black" align="center" cellspacing="2" cellpadding="4">
  <tr>
    <td align="center" valign="top"><table width="100%" border="0" bordercolor="black" align="center" cellspacing="2" cellpadding="4">
      <tr>
        <td align="center"><h1> Laporan Data Dokumen</h1></td>
      </tr>
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
<?php
include "include/koneksi.php"; 
$table="tbl_pemakaian";


?>
      <tr>
       
      </tr>
      <tr>
        <td>

   
        <table border="1" id="" bordercolor="black" align="center" cellspacing="2" cellpadding="4" width="100%">
 <tr bgcolor="grass" height="30">
   <td align="center" width="2%">
    <font size="2" face="tahoma"><b>No.</b></font>
   </td>
   

            <th>Nama File</th>
            <th>Ukuran File</th>
            <th>Tanggal Upload</th>
            <th>Uploader</th>

  
 </tr>
 <?php

  
    
    $page  = 1;
    $limit = 10;
    $start = 0;
    $k = 0;
    
    $start=($page-1)*$limit;
    

    $daritgl =$_GET['daritgl'];
    $sampaitgl =$_GET['sampaitgl'];
    $query =mysql_query("SELECT * FROM tbl_upload inner join tbl_user on tbl_upload.nama = tbl_user.id_user where tanggal_upload between '$daritgl' and '$sampaitgl' ");
                            
    $jmldata = mysql_num_rows($query);
    
    while($r = mysql_fetch_array($query)) {
    $file = "assets/upload_file/$r[dir]";
    

    $k++;
    $warna         = "white";    
     echo "<tr bgcolor='$warna'>
     <td align=\"center\" height=\"23\"><font size=\"2\" face=\"tahoma\">".$k."</font></td>
<td align='center'>$r[nama_file]</td>
<td align='center'>".fsize($file)."</td>
<td align='center'>$r[tanggal_upload]</td>
<td align='center'>$r[nama]</td>
     </tr>"; 
 }
 ?>
  
 <tr>

 <td colspan="8" height="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date('d/m/Y') ; ?>
    <br><br><br><br>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(&nbsp;&nbsp;<?php echo $nama_active ; ?>&nbsp;&nbsp;)
    <font size="2" face="tahoma" color="blue">
        <b>
        </b>
    </font>
 </td>
 </tr>
 


</table>
        </td>
        
      </tr>
      
    </table>
    <button onclick="myFunction()">Print this Report</button>

<script>
function myFunction() {
    window.print();
}
</script>
    </td>
  </tr>
  
</table>

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
