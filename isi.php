<?php
include "../config/koneksi.php";
include "../config/library.php";
include "../config/fungsi_indotgl.php";
include "../config/fungsi_combobox.php";
include "../config/class_paging.php";

// Bagian Home
if ($_GET['modul']=='home'){
  if ($_SESSION['leveluser']=='admin'){
   echo '<div class="well"></div>';
 }
}

elseif ($_GET['modul']=='debitprint'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/debit/debitprint.php";
  }
}







// Apabila modul tidak ditemukan
else{
  echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
}
?>
