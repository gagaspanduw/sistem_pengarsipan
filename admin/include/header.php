<script language="JavaScript">
function logout() {  
return confirm("Apakah Yakin Anda Akan Keluar Sistem ?")  
}
</script>
<?php       
if (ISSET($_SESSION['username']))   {
  $user_active=$_SESSION['username'];

  }
  
if ($_SESSION['level'] == 'admin')
{
  echo "
            <div class='navbar-default sidebar' role='navigation'>
                <div class='sidebar-nav navbar-collapse'>
                    <ul class='nav' id='side-menu'>
                        <li>
                            <a href='home.php'><i class='fa fa-home fa-fw'></i>Home</a>
                        </li>
                        <li>
                            <a href='#'><i class='fa fa-bar-chart-o fa-fw'></i>Master<span class='fa arrow'></span></a>
                            <ul class='nav nav-second-level'>
                                <li>
                                    <a href='user.php'>User</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href='upload_admin.php'><i class='fa fa-table fa-fw'></i>Upload Dokumen</a>
                        </li>
                        <li>
                            <a href='laporan.php'><i class='fa fa-edit fa-fw'></i>Laporan</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
      ";
      }
 else
    {
        echo " 
            <div class='navbar-default sidebar' role='navigation'>
                <div class='sidebar-nav navbar-collapse'>
                    <ul class='nav' id='side-menu'>
                        <li>
                            <a href='home.php'><i class='fa fa-home fa-fw'></i>Home</a>
                        </li>
                        <li>
                            <a href='upload.php'><i class='fa fa-edit fa-fw'></i>Upload Dokumen</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        ";
}
?>
<!-- /navbar -->
