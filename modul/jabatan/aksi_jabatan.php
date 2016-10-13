<?php
session_start();
 if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  echo "Untuk mengakses modul, Anda harus login";
}
else{
include "../../config/koneksi.php";


$modul=$_GET['modul'];
$act=$_GET['act'];

// Hapus Tag
if ($modul=='jabatan' AND $act=='hapus'){
  mysql_query("DELETE FROM jabatan WHERE id_jabatan='$_GET[id]'");
  header('location:../../media.php?modul='.$modul);
}
elseif ($modul=='jabatan' AND $act=='input')
{
		mysql_query("INSERT INTO jabatan(nama_jabatan,bagian_pelaksana,keterangan) VALUES('$_POST[nama_jabatan]','$_POST[bagian_pelaksana]','$_POST[keterangan]')");
		header('location:../../media.php?modul='.$modul);
}
elseif ($modul=='jabatan' AND $act=='update'){
  	mysql_query("UPDATE jabatan SET nama_jabatan = '$_POST[nama_jabatan]', bagian_pelaksana='$_POST[bagian_pelaksana]', keterangan='$_POST[keterangan]' WHERE id_jabatan = '$_POST[id]'");
    header('location:../../media.php?modul='.$modul);
}
}
?>
