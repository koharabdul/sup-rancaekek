<?php
include "config/koneksi.php";
function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

$username = anti_injection($_POST['username']);
$pass     = anti_injection(md5($_POST['password']));
 

// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($username) OR !ctype_alnum($pass)){
  header('location:index.php?msg=1');
}else{
$login=mysql_query("SELECT * FROM admin,personil,irigasi,bendung,ranting,jabatan WHERE `admin`.`id_personil` = `personil`.`id_personil` AND `personil`.`id_jabatan`=`jabatan`.`id_jabatan` AND `personil`.`id_irigasi` = `irigasi`.`id_irigasi` AND `irigasi`.`id_ranting` = `ranting`.`id_ranting` AND `irigasi`.`id_bendung` = `bendung`.`id_bendung` AND  username='$username' AND password='$pass'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  include "timeout.php";
  
  $_SESSION['KCFINDER']=array();
  $_SESSION['KCFINDER']['disabled'] = false;
  $_SESSION['KCFINDER']['uploadURL'] = "../tinymcpuk/gambar";
  $_SESSION['KCFINDER']['uploadDir'] = "";

  

  $_SESSION[namauser] = $r[username];
  $_SESSION[passuser] = $r[password];
  $_SESSION[leveluser] = $r[level_user];
  $_SESSION[namalengkap] = $r[nama_lengkap];
  $_SESSION[nickname] = $r[nama_panggilan];
  $_SESSION[namairigasi] = $r[nama_irigasi];
  $_SESSION[kodeirigasi] = $r[kode_irigasi];
  $_SESSION[kdIrigasi] = $r[kode];
  $_SESSION[totalwilayah] = $r[total_wilayah];
  $_SESSION[jumlahtersier] = $r[jumlah_tersier];
  $_SESSION[limpas] = $r[sungai];
  $_SESSION[namaranting] = $r[nama_ranting];
  $_SESSION[koderanting] = $r[kode_ranting];
  $_SESSION[kab] = $r[kabupaten];
  $_SESSION[kepalaranting] = $r[kepala_ranting];
  $_SESSION[NIP] = $r[nip];
  $_SESSION[satuanlimpas] = $r[satuan_limpas];
  $_SESSION[satuanirigasi] = $r[satuan_irigasi];
  $_SESSION[bagianpelaksana] = $r[bagian_pelaksana];
  $_SESSION[lebarlimpas] = $r[lebar_limpas];
  $_SESSION[lebaririgasi] = $r[lebar_irigasi];
 
  
  // session timeout
  $_SESSION[login] = 1;
  timer();

	$sid_lama = session_id();
	
	session_regenerate_id();

	$sid_baru = session_id();

  mysql_query("UPDATE admin SET id_session='$sid_baru' WHERE username='$username'");
  header('location:media.php?modul=suprancaekek');
}else{
  header('location:index.php?msg=2');
}
}
?>
