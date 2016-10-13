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
if (empty($_SESSION['username']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=index.php><b>LOGIN</b></a></center>";
}
else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SUP Rancaekek</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="ionicons/2.0.1/css/ionicons.min.css">
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
    
  <link rel="stylesheet" href="assets/css/custom.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body class="page-body page-fade" onload="window.print();">
<div class="row">




	
	



		<?php include "isi.php"; 
		?>
	</div>

</script>
</div>
    <link rel="stylesheet" href="assets/js/jvectormap/jquery-jvectormap-1.2.2.css"  id="style-resource-1">
	<link rel="stylesheet" href="assets/js/rickshaw/rickshaw.min.css"  id="style-resource-2">
	<link rel="stylesheet" href="assets/js/dropzone/dropzone.css"  id="style-resource-1">
	<link rel="stylesheet" href="assets/js/select2/select2-bootstrap.css"  id="style-resource-1">
	<link rel="stylesheet" href="assets/js/select2/select2.css"  id="style-resource-2">
	<link rel="stylesheet" href="assets/js/selectboxit/jquery.selectBoxIt.css"  id="style-resource-3">
	<link rel="stylesheet" href="assets/js/daterangepicker/daterangepicker-bs3.css"  id="style-resource-4">


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
      function cariblangko08O()
{
  var menu_tanggal=(document.flatihan.menu_tanggal.value);
  var menu_bulan=(document.flatihan.menu_bulan.value);
  var menu_tahun=(document.flatihan.menu_tahun.value);

  if(menu_tanggal=="1" && menu_bulan != "0" && menu_tahun != "0")
  {
      document.flatihan.menutanggal.value="1 s/d 15";
      document.flatihan.jumlahhari.value="15";
  }
  else if(menu_tanggal=="2")
  {
    if((menu_bulan=="2")&&(menu_tahun=="2000"||menu_tahun=="2004"||menu_tahun=="2008"||menu_tahun=="2012"||menu_tahun=="2016"||menu_tahun=="2020"||menu_tahun=="2024"||menu_tahun=="2028"||menu_tahun=="2032"||menu_tahun=="2036"))
    {
      document.flatihan.menutanggal.value="16 s/d 29";
          document.flatihan.jumlahhari.value="14";
    }
    else if((menu_bulan=="2")&&(menu_tahun!="2000"||menu_tahun!="2004"||menu_tahun!="2008"||menu_tahun!="2012"||menu_tahun!="2016"||menu_tahun!="2020"||menu_tahun!="2024"||menu_tahun!="2028"||menu_tahun!="2032"||menu_tahun!="2036"))
    {
      document.flatihan.menutanggal.value="16 s/d 28";
          document.flatihan.jumlahhari.value="13";
    }
    else if( menu_bulan=="1" || menu_bulan == "3" || menu_bulan == "5" || menu_bulan == "7" || menu_bulan == "8" || menu_bulan == "10" || menu_bulan == "12")
        {
           document.flatihan.menutanggal.value="16 s/d 31";
           document.flatihan.jumlahhari.value="16";
        }
        else if( menu_bulan=="4" || menu_bulan == "6" || menu_bulan == "9" || menu_bulan == "11" )
        {
          document.flatihan.menutanggal.value="16 s/d 30";
          document.flatihan.jumlahhari.value="15";
        }
        else
        {
          document.flatihan.menutanggal.value="";
            document.flatihan.jumlahhari.value="";
        }
  }
  else
  {
    document.flatihan.menutanggal.value="";
        document.flatihan.jumlahhari.value="";
  }
  if(menu_bulan=="1")
  {
    document.flatihan.menubulan.value="Januari";
  }
  else if(menu_bulan=="2")
  {
    document.flatihan.menubulan.value="Februari";
  }
  else if(menu_bulan=="3")
  {
    document.flatihan.menubulan.value="Maret";
  }
  else if(menu_bulan=="4")
  {
    document.flatihan.menubulan.value="April";
  }
  else if(menu_bulan=="5")
  {
    document.flatihan.menubulan.value="Mei";
  }
  else if(menu_bulan=="6")
  {
    document.flatihan.menubulan.value="Juni";
  }
  else if(menu_bulan=="7")
  {
    document.flatihan.menubulan.value="Juli";
  }
  else if(menu_bulan=="8")
  {
    document.flatihan.menubulan.value="Agustus";
  }
  else if(menu_bulan=="9")
  {
    document.flatihan.menubulan.value="September";
  }
  else if(menu_bulan=="10")
  {
    document.flatihan.menubulan.value="Oktober";
  }
  else if(menu_bulan=="11")
  {
    document.flatihan.menubulan.value="Nopember";
  }
  else if(menu_bulan=="12")
  {
    document.flatihan.menubulan.value="Desember";
  }
  else
  {
    document.flatihan.menubulan.value="";
  }
 
}
    </script>

  </body>
</html>
<?php
}
}