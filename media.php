<?php
session_start();
error_reporting(0);
include "timeout.php";

if($_SESSION[login]==1){
  if(!cek_login()){
    $_SESSION[login] = 0;
  }
}
if($_SESSION[login]==0){
  header('location:logout.php');
}
else{
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=index.php><b>LOGIN</b></a></center>";
}
else{
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>SUP Rancaekek</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="assets/plugins/ionicons/css/ionicons.min.css">
    <!-- neon -->
    <link rel="stylesheet" href="dist/css/neon.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- Picker style -->
    <link rel="stylesheet" href="assets/js/daterangepicker/daterangepicker-bs3.css">
    <!-- Custom -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <!-- Membuat Modal -->
    <link rel="stylesheet" type="text/css" href="plugins/ModalWindowEffects/css/component.css" />


    <!-- tepika die semet urang -->
    <!-- iCheck -->
    <link rel="stylesheet" href="assets/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <!--  <link rel="stylesheet" href="assets/plugins/datepicker/datepicker3.css"> -->
    <!-- Daterange picker -->
    <!-- <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker-bs3.css"> -->
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- DATA TABLES -->
    <!-- <link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" /> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


    
  
    
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
   
   
    
    

    <!-- jQuery 2.1.4 -->
    <script src="assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>

    <?php include "config/koneksi.php"; ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-green-light sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="?modul=suprancaekek" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>SUP</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>SUP R</b>ancaekek</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a  class="sidebar-toggle" data-toggle="offcanvas" role="button">
           
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="glyphicon glyphicon-envelope"></i>
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li><!-- end message -->
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            AdminLTE Design Team
                            <small><i class="fa fa-clock-o"></i> 2 hours</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Developers
                            <small><i class="fa fa-clock-o"></i> Today</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Sales Department
                            <small><i class="fa fa-clock-o"></i> Yesterday</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Reviewers
                            <small><i class="fa fa-clock-o"></i> 2 days</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="glyphicon glyphicon-globe"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-red"></i> 5 new members joined
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-user text-red"></i> You changed your username
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              <!-- Tasks: style can be found in dropdown.less -->
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="glyphicon glyphicon-user"></i>
                  <span class="label label-danger">9</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 9 tasks</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Design some buttons
                            <small class="pull-right">20%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">20% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Create a nice theme
                            <small class="pull-right">40%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">40% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Some task I need to do
                            <small class="pull-right">60%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">60% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Make beautiful transitions
                            <small class="pull-right">80%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">80% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="#">View all tasks</a>
                  </li>
                </ul>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">

              <?php
                    $r = mysql_fetch_array(mysql_query("SELECT foto_personil,nama_lengkap,level_user,nama_irigasi,MID(awal_kerja,6,2) AS Awal_kerja,LEFT(awal_kerja,4) AS Tahun
                                                        FROM admin,personil,irigasi 
                                                        WHERE admin.id_personil = personil.id_personil 
                                                        AND personil.id_irigasi = irigasi.id_irigasi 
                                                        AND username='$_SESSION[namauser]'")); 
                     if($r['foto_personil']!='')
                     { 


                echo"<a href='#' class='dropdown-toggle' data-toggle='dropdown'>
                     <img src='foto_personil/small_$r[foto_personil]' class='user-image' alt='User Image'>
                  <span class='hidden-xs'>$r[nama_lengkap]</span>
                </a>
               
                <ul class='dropdown-menu'>
                  <!-- User image -->
                  <li class='user-header'>
                    <img src='foto_personil/small_$r[foto_personil]' class='img-circle' alt='User Image'>
                     ";}
                else{
                  
                       echo "kosong";
                         //echo"<img src='foto_personil/2848644akoberem2.jpg' class='img-circle' alt='User Image'>";
                    
                }
                if($r[Awal_kerja]=='01')
                {
                  $awalkerja = 'Januari';
                }
                else if($r[Awal_kerja]=='02')
                {
                  $awalkerja = 'Februari';
                }
                else if($r[Awal_kerja]=='03')
                {
                  $awalkerja = 'Maret';
                }
                else if($r[Awal_kerja]=='04')
                {
                  $awalkerja = 'April';
                }
                else if($r[Awal_kerja]=='05')
                {
                  $awalkerja = 'Mei';
                }
                else if($r[Awal_kerja]=='06')
                {
                  $awalkerja = 'Juni';
                }
                else if($r[Awal_kerja]=='07')
                {
                  $awalkerja = 'Juli';
                }
                else if($r[Awal_kerja]=='08')
                {
                  $awalkerja = 'Agustus';
                }
                else if($r[Awal_kerja]=='09')
                {
                  $awalkerja = 'September';
                }
                else if($r[Awal_kerja]=='10')
                {
                  $awalkerja = 'Oktober';
                }
                else if($r[Awal_kerja]=='11')
                {
                  $awalkerja = 'Nopember';
                }
                else if($r[Awal_kerja]=='12')
                {
                  $awalkerja = 'Desember';
                }
                else 
                {
                  $awalkerja = 'Error';
                }

                  echo"
                    <p>
                      $r[nama_lengkap] - $r[nama_irigasi]
                      <small>Awal Kerja : $awalkerja $r[Tahun]</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <!--<li class='user-body'>
                    <div class='col-xs-4 text-center'>
                      <a href='#'>Followers</a>
                    </div>
                    <div class='col-xs-4 text-center'>
                      <a href='#'>Sales</a>
                    </div>
                    <div class='col-xs-4 text-center'>
                      <a href='#'>Friends</a>
                    </div>
                  </li>-->
                  <!-- Menu Footer-->
                  <li class='user-footer'>
                    <div class='pull-left'>";
                     $tampilpersonil=mysql_query("SELECT * FROM personil WHERE nama_lengkap='$_SESSION[namalengkap]'");
                     $t=mysql_fetch_array($tampilpersonil);
                     echo"
                      <a href='media.php?modul=personil&act=tampilpersonil&id=$t[id_personil]' class='btn btn-default btn-flat'>Profile</a>
                    </div>
                    <div class='pull-right'>
                      <a href='logout.php' class='btn btn-default btn-flat'>Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              ";
              ?>
              <!-- Control Sidebar Toggle Button -->
              <!--<li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>-->
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
               <div class='pull-left image'>
                  <?php
                    $r = mysql_fetch_array(mysql_query("SELECT foto_personil 
                                                        FROM admin JOIN personil USING(id_personil)
                                                        WHERE username='$_SESSION[namauser]'")); 
                     if($r['foto_personil']!='')
                     { 
                      //echo "ada".$r['foto_personil'];
                         echo"<img src='foto_personil/small_$r[foto_personil]' class='img-circle' alt=''>";
                     }
                     else
                    {
                       echo "kosong";
                         //echo"<img src='foto_personil/2848644akoberem2.jpg' class='img-circle' alt='User Image'>";
                    }
                ?>
                </div>
                <div class='pull-left info'>
                  <p><?php echo $_SESSION['namalengkap'];?></p>
                  <a href='#'><i class='fa fa-circle text-success'></i> Online</a>
                </div>
              </div>
          <!-- search form -->
          <form action="" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="hidden" name="modul" value="personil">
              <input type="hidden" name="act" value="tampilpencarian">
              <input type="text" name="nama_lengkap" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" id="search-btn" class="btn btn-flat"><span class="glyphicon glyphicon-search form-control-feedback" ></span></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">

                <?php include "sidebar-menu.php"; ?>

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Assalamu'alaikum 
          </h1>
          <ol class="breadcrumb">
            <li><a href="?modul=suprancaekek"><i class="fa fa-dashboard"></i> SUP Rancaekek</a></li>
            <li><a href="?modul=home"><i class="fa fa-globe"> Aktifitas</a></i></li>
            <li><a href="?modul=home"><i class="fa fa-home"> Profile SUP </a></i></li>
          </ol>
        </section> 

        <!-- Main content -->
        <section class="content">

            <?php include "content.php"; ?>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="#">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>

      
      
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="plugins/chartjs/Chart.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- Membuat Modal -->
    <script src="plugins/ModalWindowEffects/js/modernizr.custom.js"></script>
    <script src="plugins/ModalWindowEffects/js/classie.js"></script>
    <script src="plugins/ModalWindowEffects/js/modalEffects.js"></script>

    <!-- for the blur effect -->
    <!-- by @derSchepp https://github.com/Schepp/CSS-Filters-Polyfill -->
    <script>
      // this is important for IEs
      var polyfilter_scriptpath = 'plugins/ModalWindowEffects/js/';
    </script>
    <script src="plugins/ModalWindowEffects/js/cssParser.js"></script>
    <!-- Modal Tepika Die -->
    <!-- Picker style -->
    <script src="assets/js/bootstrap-datepicker.js" ></script>
    <!-- Picker style -->
    <script src="assets/js/bootstrap-timepicker.min.js"></script>
    <!-- Picker style -->
    <script src="assets/js/bootstrap-colorpicker.min.js"></script>
    <!-- Picker style -->
    <script src="assets/js/daterangepicker/moment.min.js"></script>
    <!-- Picker style -->
    <script src="assets/js/daterangepicker/daterangepicker.js"></script>
    <!-- Picker style -->
    <script src="assets/js/gsap/main-gsap.js" ></script>
    <!-- Picker style -->
    <script src="assets/js/resizeable.js"></script>
    <!-- Picker style -->
    <script src="assets/js/neon-custom.js"></script>
  
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- AdminLTE for fileinput -->
    <script src="dist/js/fileinput.js"></script>



    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        }); 

        window.prettyPrint && prettyPrint();
        $('#mulai').datepicker({
          format: 'yyyy-mm-dd',
                  todayBtn: 'linked'
        });
        $('#akhir').datepicker({
          format: 'yyyy-mm-dd',
                  todayBtn: 'linked'
        });
        $('#waktumulai').timepicker({
            minuteStep: 1,
                  showMeridian: false
        });
        $('#waktuakhir').timepicker({
            minuteStep: 1,
                  showMeridian: false
        });
        $('#jadwal').timepicker({
            minuteStep: 1,
                  showMeridian: false
        });
      });

      
    </script>
  </body>
</html>
<?php
}
}
