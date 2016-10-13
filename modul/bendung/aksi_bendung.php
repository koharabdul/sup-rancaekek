<?php
session_start();
 if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  echo "Untuk mengakses modul, Anda harus login";
}
else{
include "../../config/koneksi.php";


$modul=$_GET['modul'];
$act=$_GET['act'];

if ($modul=='bendung' AND $act=='hapus'){
    mysql_query("DELETE FROM bendung WHERE id_bendung='$_GET[id]'");
    header('location:../../media.php?modul='.$modul);
}
elseif ($modul=='bendung' AND $act=='input')
{
		mysql_query("INSERT INTO bendung(nama_bendung,satuan_limpas,satuan_irigasi) VALUES('$_POST[nama_bendung]','$_POST[satuan_limpas]','$_POST[satuan_irigasi]')");
		header('location:../../media.php?modul='.$modul);
}
elseif ($modul=='bendung' AND $act=='update'){
		mysql_query("UPDATE bendung SET nama_bendung = '$_POST[nama_bendung]', satuan_limpas='$_POST[satuan_limpas]', satuan_irigasi='$_POST[satuan_irigasi]' WHERE id_bendung = '$_POST[id]'");
		header('location:../../media.php?modul='.$modul);
}
}
?>
