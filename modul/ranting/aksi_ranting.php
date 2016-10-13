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
if ($modul=='ranting' AND $act=='hapus'){
  mysql_query("DELETE FROM ranting WHERE id_ranting='$_GET[id]'");
  header('location:../../media.php?modul='.$modul);
}

// Input tag
elseif ($modul=='ranting' AND $act=='input')
{
    mysql_query("INSERT INTO ranting(kode_ranting,nama_ranting,alamat,kepala_ranting,nip) VALUES('$_POST[kode_ranting]','$_POST[nama_ranting]','$_POST[alamat]','$_POST[kepala_ranting]','$_POST[nip]')");
		header('location:../../media.php?modul='.$modul);
}

// Update tag
elseif ($modul=='ranting' AND $act=='update'){
		mysql_query("UPDATE ranting SET kode_ranting = '$_POST[kode_ranting]', nama_ranting = '$_POST[nama_ranting]', alamat='$_POST[alamat]', kepala_ranting='$_POST[kepala_ranting]', nip='$_POST[nip]' WHERE id_ranting = '$_POST[id]'");
		header('location:../../media.php?modul='.$modul);
}
}
?>
