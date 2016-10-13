<?php
session_start();
 if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../config/koneksi.php";
include "../../config/library.php";


$modul=$_GET['modul'];
$act=$_GET['act'];

// Hapus Tag
if ($modul=='blangko04' AND $act=='hapus'){
       
            $tampno = mysql_query("SELECT COUNT(`no`)AS CountNo FROM blangko08 WHERE nama_irigasi = '$_SESSION[namairigasi]' AND tgl_blangko08O = '$_POST[hapusmenutgl]' AND bln_blangko08O = '$_POST[hapusmenubln]' AND tahun_blangko08O = '$_POST[hapusmenuthn]'");
            $r    = mysql_fetch_array($tampno);
            $CountNo = $r['CountNo'];

            

            if($CountNo == $_POST['hapusjumlahhari'])
            { 

                 mysql_query("DELETE FROM rangkuman_aktifitas WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]' AND nama_lengkap = '$_SESSION[namalengkap]'");
                 $count=mysql_fetch_array(mysql_query("SELECT * FROM debit_pertahun WHERE nama_irigasi = '$_SESSION[namairigasi]' AND tahun = '$_POST[hapusmenuthn]'"));
                 if($count['tahun']== $_POST['hapusmenuthn'])
                 {

                      $countq=mysql_fetch_array(mysql_query("SELECT `bln_ket`,`tgl_blangko08O` FROM blangko08 WHERE nama_irigasi = '$_SESSION[namairigasi]' AND tgl_blangko08O = '$_POST[hapusmenutgl]' AND bln_blangko08O = '$_POST[hapusmenubln]' AND tahun_blangko08O = '$_POST[hapusmenuthn]'"));
                      if(($countq['bln_ket']== 'Januari')AND($countq['tgl_blangko08O']=='1'))
                      {
                          $c=mysql_fetch_array(mysql_query("SELECT * FROM debit_pertahun WHERE nama_irigasi = '$_SESSION[namairigasi]' AND tahun = '$_POST[hapusmenuthn]'"));
                          if($c['jan2']== 0 AND $c['feb1']== 0 AND $c['feb2']== 0 AND $c['mar1']== 0 AND $c['mar2']== 0 AND $c['apr1']== 0 AND $c['apr2']== 0 AND $c['mei1']== 0 AND $c['mei2']== 0 AND $c['jun1']== 0 AND $c['jun2']== 0 AND $c['jul1']== 0 AND $c['jul2']== 0 AND $c['agu1']== 0 AND $c['agu2']== 0 AND $c['sep1']== 0 AND $c['sep2']== 0 AND $c['okt1']== 0 AND $c['okt2']== 0 AND $c['nop1']== 0 AND $c['nop2']== 0 AND $c['des1']== 0 AND $c['des2']== 0)
                          {
                              mysql_query("DELETE FROM debit_pertahun WHERE tahun = '$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                          else
                          { 
                              mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `jan1`=NULL WHERE `tahun`='$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                      }
                      else  if(($countq['bln_ket']== 'Januari')AND($countq['tgl_blangko08O']=='2'))
                      {
                          $c=mysql_fetch_array(mysql_query("SELECT * FROM debit_pertahun WHERE nama_irigasi = '$_SESSION[namairigasi]' AND tahun = '$_POST[hapusmenuthn]'"));
                          if($c['jan1']== 0 AND $c['feb1']== 0 AND $c['feb2']== 0 AND $c['mar1']== 0 AND $c['mar2']== 0 AND $c['apr1']== 0 AND $c['apr2']== 0 AND $c['mei1']== 0 AND $c['mei2']== 0 AND $c['jun1']== 0 AND $c['jun2']== 0 AND $c['jul1']== 0 AND $c['jul2']== 0 AND $c['agu1']== 0 AND $c['agu2']== 0 AND $c['sep1']== 0 AND $c['sep2']== 0 AND $c['okt1']== 0 AND $c['okt2']== 0 AND $c['nop1']== 0 AND $c['nop2']== 0 AND $c['des1']== 0 AND $c['des2']== 0)
                          {
                              mysql_query("DELETE FROM debit_pertahun WHERE tahun = '$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                          else
                          { 
                              mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `jan2`=NULL WHERE `tahun`='$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                      }
                      else  if(($countq['bln_ket']== 'Februari')AND($countq['tgl_blangko08O']=='1'))
                      {
                          $c=mysql_fetch_array(mysql_query("SELECT * FROM debit_pertahun WHERE nama_irigasi = '$_SESSION[namairigasi]' AND tahun = '$_POST[hapusmenuthn]'"));
                          if($c['jan1']== 0 AND $c['jan2']== 0 AND $c['feb2']== 0 AND $c['mar1']== 0 AND $c['mar2']== 0 AND $c['apr1']== 0 AND $c['apr2']== 0 AND $c['mei1']== 0 AND $c['mei2']== 0 AND $c['jun1']== 0 AND $c['jun2']== 0 AND $c['jul1']== 0 AND $c['jul2']== 0 AND $c['agu1']== 0 AND $c['agu2']== 0 AND $c['sep1']== 0 AND $c['sep2']== 0 AND $c['okt1']== 0 AND $c['okt2']== 0 AND $c['nop1']== 0 AND $c['nop2']== 0 AND $c['des1']== 0 AND $c['des2']== 0)
                          {
                              mysql_query("DELETE FROM debit_pertahun WHERE tahun = '$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                          else
                          { 
                              mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `feb1`=NULL WHERE `tahun`='$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                      }
                      else  if(($countq['bln_ket']== 'Februari')AND($countq['tgl_blangko08O']=='2'))
                      {
                          $c=mysql_fetch_array(mysql_query("SELECT * FROM debit_pertahun WHERE nama_irigasi = '$_SESSION[namairigasi]' AND tahun = '$_POST[hapusmenuthn]'"));
                          if($c['jan1']== 0 AND $c['jan2']== 0 AND $c['feb1']== 0 AND $c['mar1']== 0 AND $c['mar2']== 0 AND $c['apr1']== 0 AND $c['apr2']== 0 AND $c['mei1']== 0 AND $c['mei2']== 0 AND $c['jun1']== 0 AND $c['jun2']== 0 AND $c['jul1']== 0 AND $c['jul2']== 0 AND $c['agu1']== 0 AND $c['agu2']== 0 AND $c['sep1']== 0 AND $c['sep2']== 0 AND $c['okt1']== 0 AND $c['okt2']== 0 AND $c['nop1']== 0 AND $c['nop2']== 0 AND $c['des1']== 0 AND $c['des2']== 0)
                          {
                              mysql_query("DELETE FROM debit_pertahun WHERE tahun = '$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                          else
                          { 
                              mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `feb2`=NULL WHERE `tahun`='$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                      }
                      else  if(($countq['bln_ket']== 'Maret')AND($countq['tgl_blangko08O']=='1'))
                      {
                          $c=mysql_fetch_array(mysql_query("SELECT * FROM debit_pertahun WHERE nama_irigasi = '$_SESSION[namairigasi]' AND tahun = '$_POST[hapusmenuthn]'"));
                          if($c['jan1']== 0 AND $c['jan2']== 0 AND $c['feb1']== 0 AND $c['feb2']== 0 AND $c['mar2']== 0 AND $c['apr1']== 0 AND $c['apr2']== 0 AND $c['mei1']== 0 AND $c['mei2']== 0 AND $c['jun1']== 0 AND $c['jun2']== 0 AND $c['jul1']== 0 AND $c['jul2']== 0 AND $c['agu1']== 0 AND $c['agu2']== 0 AND $c['sep1']== 0 AND $c['sep2']== 0 AND $c['okt1']== 0 AND $c['okt2']== 0 AND $c['nop1']== 0 AND $c['nop2']== 0 AND $c['des1']== 0 AND $c['des2']== 0)
                          {
                              mysql_query("DELETE FROM debit_pertahun WHERE tahun = '$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                          else
                          { 
                              mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `mar1`=NULL WHERE `tahun`='$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                      }
                      else  if(($countq['bln_ket']== 'Maret')AND($countq['tgl_blangko08O']=='2'))
                      {
                          $c=mysql_fetch_array(mysql_query("SELECT * FROM debit_pertahun WHERE nama_irigasi = '$_SESSION[namairigasi]' AND tahun = '$_POST[hapusmenuthn]'"));
                          if($c['jan1']== 0 AND $c['jan2']== 0 AND $c['feb1']== 0 AND $c['feb2']== 0 AND $c['mar1']== 0 AND $c['apr1']== 0 AND $c['apr2']== 0 AND $c['mei1']== 0 AND $c['mei2']== 0 AND $c['jun1']== 0 AND $c['jun2']== 0 AND $c['jul1']== 0 AND $c['jul2']== 0 AND $c['agu1']== 0 AND $c['agu2']== 0 AND $c['sep1']== 0 AND $c['sep2']== 0 AND $c['okt1']== 0 AND $c['okt2']== 0 AND $c['nop1']== 0 AND $c['nop2']== 0 AND $c['des1']== 0 AND $c['des2']== 0)
                          {
                              mysql_query("DELETE FROM debit_pertahun WHERE tahun = '$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                          else
                          {  
                              mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `mar2`=NULL WHERE `tahun`='$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                      }
                      else  if(($countq['bln_ket']== 'April')AND($countq['tgl_blangko08O']=='1'))
                      {
                          $c=mysql_fetch_array(mysql_query("SELECT * FROM debit_pertahun WHERE nama_irigasi = '$_SESSION[namairigasi]' AND tahun = '$_POST[hapusmenuthn]'"));
                          if($c['jan1']== 0 AND $c['jan2']== 0 AND $c['feb1']== 0 AND $c['feb2']== 0 AND $c['mar1']== 0 AND $c['mar2']== 0 AND $c['apr2']== 0 AND $c['mei1']== 0 AND $c['mei2']== 0 AND $c['jun1']== 0 AND $c['jun2']== 0 AND $c['jul1']== 0 AND $c['jul2']== 0 AND $c['agu1']== 0 AND $c['agu2']== 0 AND $c['sep1']== 0 AND $c['sep2']== 0 AND $c['okt1']== 0 AND $c['okt2']== 0 AND $c['nop1']== 0 AND $c['nop2']== 0 AND $c['des1']== 0 AND $c['des2']== 0)
                          {
                              mysql_query("DELETE FROM debit_pertahun WHERE tahun = '$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                          else
                          {
                              mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `apr1`=NULL WHERE `tahun`='$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                      }
                      else  if(($countq['bln_ket']== 'April')AND($countq['tgl_blangko08O']=='2'))
                      {
                          $c=mysql_fetch_array(mysql_query("SELECT * FROM debit_pertahun WHERE nama_irigasi = '$_SESSION[namairigasi]' AND tahun = '$_POST[hapusmenuthn]'"));
                          if($c['jan1']== 0 AND $c['jan2']== 0 AND $c['feb1']== 0 AND $c['feb2']== 0 AND $c['mar1']== 0 AND $c['mar2']== 0 AND $c['apr1']== 0 AND $c['mei1']== 0 AND $c['mei2']== 0 AND $c['jun1']== 0 AND $c['jun2']== 0 AND $c['jul1']== 0 AND $c['jul2']== 0 AND $c['agu1']== 0 AND $c['agu2']== 0 AND $c['sep1']== 0 AND $c['sep2']== 0 AND $c['okt1']== 0 AND $c['okt2']== 0 AND $c['nop1']== 0 AND $c['nop2']== 0 AND $c['des1']== 0 AND $c['des2']== 0)
                          {
                              mysql_query("DELETE FROM debit_pertahun WHERE tahun = '$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                          else
                          {
                              mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `apr2`=NULL WHERE `tahun`='$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                      }
                      else  if(($countq['bln_ket']== 'Mei')AND($countq['tgl_blangko08O']=='1'))
                      {
                          $c=mysql_fetch_array(mysql_query("SELECT * FROM debit_pertahun WHERE nama_irigasi = '$_SESSION[namairigasi]' AND tahun = '$_POST[hapusmenuthn]'"));
                          if($c['jan1']== 0 AND $c['jan2']== 0 AND $c['feb1']== 0 AND $c['feb2']== 0 AND $c['mar1']== 0 AND $c['mar2']== 0 AND $c['apr1']== 0 AND $c['apr2']== 0 AND $c['mei2']== 0 AND $c['jun1']== 0 AND $c['jun2']== 0 AND $c['jul1']== 0 AND $c['jul2']== 0 AND $c['agu1']== 0 AND $c['agu2']== 0 AND $c['sep1']== 0 AND $c['sep2']== 0 AND $c['okt1']== 0 AND $c['okt2']== 0 AND $c['nop1']== 0 AND $c['nop2']== 0 AND $c['des1']== 0 AND $c['des2']== 0)
                          {
                              mysql_query("DELETE FROM debit_pertahun WHERE tahun = '$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                          else
                          {
                              mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `mei1`=NULL WHERE `tahun`='$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                      }
                      else  if(($countq['bln_ket']== 'Mei')AND($countq['tgl_blangko08O']=='2'))
                      {
                          $c=mysql_fetch_array(mysql_query("SELECT * FROM debit_pertahun WHERE nama_irigasi = '$_SESSION[namairigasi]' AND tahun = '$_POST[hapusmenuthn]'"));
                          if($c['jan1']== 0 AND $c['jan2']== 0 AND $c['feb1']== 0 AND $c['feb2']== 0 AND $c['mar1']== 0 AND $c['mar2']== 0 AND $c['apr1']== 0 AND $c['apr2']== 0 AND $c['mei1']== 0 AND $c['jun1']== 0 AND $c['jun2']== 0 AND $c['jul1']== 0 AND $c['jul2']== 0 AND $c['agu1']== 0 AND $c['agu2']== 0 AND $c['sep1']== 0 AND $c['sep2']== 0 AND $c['okt1']== 0 AND $c['okt2']== 0 AND $c['nop1']== 0 AND $c['nop2']== 0 AND $c['des1']== 0 AND $c['des2']== 0)
                          {
                              mysql_query("DELETE FROM debit_pertahun WHERE tahun = '$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                          else
                          {
                              mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `mei2`=NULL WHERE `tahun`='$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                      }
                      else  if(($countq['bln_ket']== 'Juni')AND($countq['tgl_blangko08O']=='1'))
                      {
                          $c=mysql_fetch_array(mysql_query("SELECT * FROM debit_pertahun WHERE nama_irigasi = '$_SESSION[namairigasi]' AND tahun = '$_POST[hapusmenuthn]'"));
                          if($c['jan1']== 0 AND $c['jan2']== 0 AND $c['feb1']== 0 AND $c['feb2']== 0 AND $c['mar1']== 0 AND $c['mar2']== 0 AND $c['apr1']== 0 AND $c['apr2']== 0 AND $c['mei1']== 0 AND $c['mei2']== 0 AND $c['jun2']== 0 AND $c['jul1']== 0 AND $c['jul2']== 0 AND $c['agu1']== 0 AND $c['agu2']== 0 AND $c['sep1']== 0 AND $c['sep2']== 0 AND $c['okt1']== 0 AND $c['okt2']== 0 AND $c['nop1']== 0 AND $c['nop2']== 0 AND $c['des1']== 0 AND $c['des2']== 0)
                          {
                              mysql_query("DELETE FROM debit_pertahun WHERE tahun = '$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                          else
                          {
                              mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `jun1`=NULL WHERE `tahun`='$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                      }
                      else  if(($countq['bln_ket']== 'Juni')AND($countq['tgl_blangko08O']=='2'))
                      {
                          $c=mysql_fetch_array(mysql_query("SELECT * FROM debit_pertahun WHERE nama_irigasi = '$_SESSION[namairigasi]' AND tahun = '$_POST[hapusmenuthn]'"));
                          if($c['jan1']== 0 AND $c['jan2']== 0 AND $c['feb1']== 0 AND $c['feb2']== 0 AND $c['mar1']== 0 AND $c['mar2']== 0 AND $c['apr1']== 0 AND $c['apr2']== 0 AND $c['mei1']== 0 AND $c['mei2']== 0 AND $c['jun1']== 0 AND $c['jul1']== 0 AND $c['jul2']== 0 AND $c['agu1']== 0 AND $c['agu2']== 0 AND $c['sep1']== 0 AND $c['sep2']== 0 AND $c['okt1']== 0 AND $c['okt2']== 0 AND $c['nop1']== 0 AND $c['nop2']== 0 AND $c['des1']== 0 AND $c['des2']== 0)
                          {
                              mysql_query("DELETE FROM debit_pertahun WHERE tahun = '$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                          else
                          {
                              mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `jun2`=NULL WHERE `tahun`='$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                      }
                      else  if(($countq['bln_ket']== 'Juli')AND($countq['tgl_blangko08O']=='1'))
                      {
                          $c=mysql_fetch_array(mysql_query("SELECT * FROM debit_pertahun WHERE nama_irigasi = '$_SESSION[namairigasi]' AND tahun = '$_POST[hapusmenuthn]'"));
                          if($c['jan1']== 0 AND $c['jan2']== 0 AND $c['feb1']== 0 AND $c['feb2']== 0 AND $c['mar1']== 0 AND $c['mar2']== 0 AND $c['apr1']== 0 AND $c['apr2']== 0 AND $c['mei1']== 0 AND $c['mei2']== 0 AND $c['jun1']== 0 AND $c['jun2']== 0 AND $c['jul2']== 0 AND $c['agu1']== 0 AND $c['agu2']== 0 AND $c['sep1']== 0 AND $c['sep2']== 0 AND $c['okt1']== 0 AND $c['okt2']== 0 AND $c['nop1']== 0 AND $c['nop2']== 0 AND $c['des1']== 0 AND $c['des2']== 0)
                          {
                              mysql_query("DELETE FROM debit_pertahun WHERE tahun = '$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                          else
                          {
                              mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `jul1`=NULL WHERE `tahun`='$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                      }
                      else  if(($countq['bln_ket']== 'Juli')AND($countq['tgl_blangko08O']=='2'))
                      {
                          $c=mysql_fetch_array(mysql_query("SELECT * FROM debit_pertahun WHERE nama_irigasi = '$_SESSION[namairigasi]' AND tahun = '$_POST[hapusmenuthn]'"));
                          if($c['jan1']== 0 AND $c['jan2']== 0 AND $c['feb1']== 0 AND $c['feb2']== 0 AND $c['mar1']== 0 AND $c['mar2']== 0 AND $c['apr1']== 0 AND $c['apr2']== 0 AND $c['mei1']== 0 AND $c['mei2']== 0 AND $c['jun1']== 0 AND $c['jun2']== 0 AND $c['jul1']== 0 AND $c['agu1']== 0 AND $c['agu2']== 0 AND $c['sep1']== 0 AND $c['sep2']== 0 AND $c['okt1']== 0 AND $c['okt2']== 0 AND $c['nop1']== 0 AND $c['nop2']== 0 AND $c['des1']== 0 AND $c['des2']== 0)
                          {
                              mysql_query("DELETE FROM debit_pertahun WHERE tahun = '$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                          else
                          {
                              mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `jul2`=NULL WHERE `tahun`='$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                      }
                      else  if(($countq['bln_ket']== 'Agustus')AND($countq['tgl_blangko08O']=='1'))
                      {
                          $c=mysql_fetch_array(mysql_query("SELECT * FROM debit_pertahun WHERE nama_irigasi = '$_SESSION[namairigasi]' AND tahun = '$_POST[hapusmenuthn]'"));
                          if($c['jan1']== 0 AND $c['jan2']== 0 AND $c['feb1']== 0 AND $c['feb2']== 0 AND $c['mar1']== 0 AND $c['mar2']== 0 AND $c['apr1']== 0 AND $c['apr2']== 0 AND $c['mei1']== 0 AND $c['mei2']== 0 AND $c['jun1']== 0 AND $c['jun2']== 0 AND $c['jul1']== 0 AND $c['jul2']== 0 AND $c['agu2']== 0 AND $c['sep1']== 0 AND $c['sep2']== 0 AND $c['okt1']== 0 AND $c['okt2']== 0 AND $c['nop1']== 0 AND $c['nop2']== 0 AND $c['des1']== 0 AND $c['des2']== 0)
                          {
                              mysql_query("DELETE FROM debit_pertahun WHERE tahun = '$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                          else
                          {
                              mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `agu1`=NULL WHERE `tahun`='$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                      }
                      else  if(($countq['bln_ket']== 'Agustus')AND($countq['tgl_blangko08O']=='2'))
                      {
                          $c=mysql_fetch_array(mysql_query("SELECT * FROM debit_pertahun WHERE nama_irigasi = '$_SESSION[namairigasi]' AND tahun = '$_POST[hapusmenuthn]'"));
                          if($c['jan1']== 0 AND $c['jan2']== 0 AND $c['feb1']== 0 AND $c['feb2']== 0 AND $c['mar1']== 0 AND $c['mar2']== 0 AND $c['apr1']== 0 AND $c['apr2']== 0 AND $c['mei1']== 0 AND $c['mei2']== 0 AND $c['jun1']== 0 AND $c['jun2']== 0 AND $c['jul1']== 0 AND $c['jul2']== 0 AND $c['agu1']== 0 AND $c['sep1']== 0 AND $c['sep2']== 0 AND $c['okt1']== 0 AND $c['okt2']== 0 AND $c['nop1']== 0 AND $c['nop2']== 0 AND $c['des1']== 0 AND $c['des2']== 0)
                          {
                              mysql_query("DELETE FROM debit_pertahun WHERE tahun = '$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                          else
                          {
                              mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `agu2`=NULL WHERE `tahun`='$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                      }
                      else  if(($countq['bln_ket']== 'September')AND($countq['tgl_blangko08O']=='1'))
                      {
                          $c=mysql_fetch_array(mysql_query("SELECT * FROM debit_pertahun WHERE nama_irigasi = '$_SESSION[namairigasi]' AND tahun = '$_POST[hapusmenuthn]'"));
                          if($c['jan1']== 0 AND $c['jan2']== 0 AND $c['feb1']== 0 AND $c['feb2']== 0 AND $c['mar1']== 0 AND $c['mar2']== 0 AND $c['apr1']== 0 AND $c['apr2']== 0 AND $c['mei1']== 0 AND $c['mei2']== 0 AND $c['jun1']== 0 AND $c['jun2']== 0 AND $c['jul1']== 0 AND $c['jul2']== 0 AND $c['agu1']== 0 AND $c['agu2']== 0 AND $c['sep2']== 0 AND $c['okt1']== 0 AND $c['okt2']== 0 AND $c['nop1']== 0 AND $c['nop2']== 0 AND $c['des1']== 0 AND $c['des2']== 0)
                          {
                              mysql_query("DELETE FROM debit_pertahun WHERE tahun = '$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                          else
                          {
                              mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `sep1`=NULL WHERE `tahun`='$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                      }
                      else  if(($countq['bln_ket']== 'September')AND($countq['tgl_blangko08O']=='2'))
                      {
                          $c=mysql_fetch_array(mysql_query("SELECT * FROM debit_pertahun WHERE nama_irigasi = '$_SESSION[namairigasi]' AND tahun = '$_POST[hapusmenuthn]'"));
                          if($c['jan1']== 0 AND $c['jan2']== 0 AND $c['feb1']== 0 AND $c['feb2']== 0 AND $c['mar1']== 0 AND $c['mar2']== 0 AND $c['apr1']== 0 AND $c['apr2']== 0 AND $c['mei1']== 0 AND $c['mei2']== 0 AND $c['jun1']== 0 AND $c['jun2']== 0 AND $c['jul1']== 0 AND $c['jul2']== 0 AND $c['agu1']== 0 AND $c['agu2']== 0 AND $c['sep1']== 0 AND $c['okt1']== 0 AND $c['okt2']== 0 AND $c['nop1']== 0 AND $c['nop2']== 0 AND $c['des1']== 0 AND $c['des2']== 0)
                          {
                              mysql_query("DELETE FROM debit_pertahun WHERE tahun = '$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                          else
                          {
                              mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `sep2`=NULL WHERE `tahun`='$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                      }
                      else  if(($countq['bln_ket']== 'Oktober')AND($countq['tgl_blangko08O']=='1'))
                      {
                          $c=mysql_fetch_array(mysql_query("SELECT * FROM debit_pertahun WHERE nama_irigasi = '$_SESSION[namairigasi]' AND tahun = '$_POST[hapusmenuthn]'"));
                          if($c['jan1']== 0 AND $c['jan2']== 0 AND $c['feb1']== 0 AND $c['feb2']== 0 AND $c['mar1']== 0 AND $c['mar2']== 0 AND $c['apr1']== 0 AND $c['apr2']== 0 AND $c['mei1']== 0 AND $c['mei2']== 0 AND $c['jun1']== 0 AND $c['jun2']== 0 AND $c['jul1']== 0 AND $c['jul2']== 0 AND $c['agu1']== 0 AND $c['agu2']== 0 AND $c['sep1']== 0 AND $c['sep2']== 0 AND $c['okt2']== 0 AND $c['nop1']== 0 AND $c['nop2']== 0 AND $c['des1']== 0 AND $c['des2']== 0)
                          {
                              mysql_query("DELETE FROM debit_pertahun WHERE tahun = '$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                          else
                          {
                              mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `okt1`=NULL WHERE `tahun`='$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                      }
                      else  if(($countq['bln_ket']== 'Oktober')AND($countq['tgl_blangko08O']=='2'))
                      {
                          $c=mysql_fetch_array(mysql_query("SELECT * FROM debit_pertahun WHERE nama_irigasi = '$_SESSION[namairigasi]' AND tahun = '$_POST[hapusmenuthn]'"));
                          if($c['jan1']== 0 AND $c['jan2']== 0 AND $c['feb1']== 0 AND $c['feb2']== 0 AND $c['mar1']== 0 AND $c['mar2']== 0 AND $c['apr1']== 0 AND $c['apr2']== 0 AND $c['mei1']== 0 AND $c['mei2']== 0 AND $c['jun1']== 0 AND $c['jun2']== 0 AND $c['jul1']== 0 AND $c['jul2']== 0 AND $c['agu1']== 0 AND $c['agu2']== 0 AND $c['sep1']== 0 AND $c['sep2']== 0 AND $c['okt1']== 0 AND $c['nop1']== 0 AND $c['nop2']== 0 AND $c['des1']== 0 AND $c['des2']== 0)
                          {
                              mysql_query("DELETE FROM debit_pertahun WHERE tahun = '$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                          else
                          {
                              mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `okt2`=NULL WHERE `tahun`='$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                      }
                      else  if(($countq['bln_ket']== 'Nopember')AND($countq['tgl_blangko08O']=='1'))
                      {
                          $c=mysql_fetch_array(mysql_query("SELECT * FROM debit_pertahun WHERE nama_irigasi = '$_SESSION[namairigasi]' AND tahun = '$_POST[hapusmenuthn]'"));
                          if($c['jan1']== 0 AND $c['jan2']== 0 AND $c['feb1']== 0 AND $c['feb2']== 0 AND $c['mar1']== 0 AND $c['mar2']== 0 AND $c['apr1']== 0 AND $c['apr2']== 0 AND $c['mei1']== 0 AND $c['mei2']== 0 AND $c['jun1']== 0 AND $c['jun2']== 0 AND $c['jul1']== 0 AND $c['jul2']== 0 AND $c['agu1']== 0 AND $c['agu2']== 0 AND $c['sep1']== 0 AND $c['sep2']== 0 AND $c['okt1']== 0 AND $c['okt2']== 0 AND $c['nop2']== 0 AND $c['des1']== 0 AND $c['des2']== 0)
                          {
                              mysql_query("DELETE FROM debit_pertahun WHERE tahun = '$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                          else
                          {
                              mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `nop1`=NULL WHERE `tahun`='$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                      }
                      else  if(($countq['bln_ket']== 'Nopember')AND($countq['tgl_blangko08O']=='2'))
                      {
                          $c=mysql_fetch_array(mysql_query("SELECT * FROM debit_pertahun WHERE nama_irigasi = '$_SESSION[namairigasi]' AND tahun = '$_POST[hapusmenuthn]'"));
                          if($c['jan1']== 0 AND $c['jan2']== 0 AND $c['feb1']== 0 AND $c['feb2']== 0 AND $c['mar1']== 0 AND $c['mar2']== 0 AND $c['apr1']== 0 AND $c['apr2']== 0 AND $c['mei1']== 0 AND $c['mei2']== 0 AND $c['jun1']== 0 AND $c['jun2']== 0 AND $c['jul1']== 0 AND $c['jul2']== 0 AND $c['agu1']== 0 AND $c['agu2']== 0 AND $c['sep1']== 0 AND $c['sep2']== 0 AND $c['okt1']== 0 AND $c['okt2']== 0 AND $c['nop1']== 0 AND $c['des1']== 0 AND $c['des2']== 0)
                          {
                              mysql_query("DELETE FROM debit_pertahun WHERE tahun = '$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                          else
                          {
                              mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `nop2`=NULL WHERE `tahun`='$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                      }
                      else  if(($countq['bln_ket']== 'Desember')AND($countq['tgl_blangko08O']=='1'))
                      {
                          $c=mysql_fetch_array(mysql_query("SELECT * FROM debit_pertahun WHERE nama_irigasi = '$_SESSION[namairigasi]' AND tahun = '$_POST[hapusmenuthn]'"));
                          if($c['jan1']== 0 AND $c['jan2']== 0 AND $c['feb1']== 0 AND $c['feb2']== 0 AND $c['mar1']== 0 AND $c['mar2']== 0 AND $c['apr1']== 0 AND $c['apr2']== 0 AND $c['mei1']== 0 AND $c['mei2']== 0 AND $c['jun1']== 0 AND $c['jun2']== 0 AND $c['jul1']== 0 AND $c['jul2']== 0 AND $c['agu1']== 0 AND $c['agu2']== 0 AND $c['sep1']== 0 AND $c['sep2']== 0 AND $c['okt1']== 0 AND $c['okt2']== 0 AND $c['nop1']== 0 AND $c['nop2']== 0 AND $c['des2']== 0)
                          {
                              mysql_query("DELETE FROM debit_pertahun WHERE tahun = '$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                          else
                          {
                              mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `des1`=NULL WHERE `tahun`='$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                      }
                      else  if(($countq['bln_ket']== 'Desember')AND($countq['tgl_blangko08O']=='2'))
                      {
                          $c=mysql_fetch_array(mysql_query("SELECT * FROM debit_pertahun WHERE nama_irigasi = '$_SESSION[namairigasi]' AND tahun = '$_POST[hapusmenuthn]'"));
                          if($c['jan1']== 0 AND $c['jan2']== 0 AND $c['feb1']== 0 AND $c['feb2']== 0 AND $c['mar1']== 0 AND $c['mar2']== 0 AND $c['apr1']== 0 AND $c['apr2']== 0 AND $c['mei1']== 0 AND $c['mei2']== 0 AND $c['jun1']== 0 AND $c['jun2']== 0 AND $c['jul1']== 0 AND $c['jul2']== 0 AND $c['agu1']== 0 AND $c['agu2']== 0 AND $c['sep1']== 0 AND $c['sep2']== 0 AND $c['okt1']== 0 AND $c['okt2']== 0 AND $c['nop1']== 0 AND $c['nop2']== 0 AND $c['des1']== 0)
                          {
                              mysql_query("DELETE FROM debit_pertahun WHERE tahun = '$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                          else
                          {
                              mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `des2`=NULL WHERE `tahun`='$_POST[hapusmenuthn]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                              mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                          }
                      }
                      else
                      {
                           mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                 }
               }
               else
               {
                 mysql_query("DELETE FROM blangko08 WHERE id_nota='$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
               }     
       header('location:../../media.php?modul='.$modul);
}

// Input tag
elseif ($modul=='blangko04' AND $act=='input'){

        $count=mysql_fetch_array(mysql_query("SELECT `no` FROM blangko08 WHERE `no` = '$_POST[urutantanggal]' AND nama_irigasi = '$_SESSION[namairigasi]' AND tgl_blangko08O = '$_POST[tgl]' AND bln_blangko08O = '$_POST[bulan]' AND tahun_blangko08O = '$_POST[menutahunket]'"));
        if($count['no']!= $_POST['urutantanggal'])//untuk tidak memasukan no yang sama
        {
            mysql_query("INSERT INTO blangko08(`id_nota`,
                                     `nama_personil`,
                                     `sungai`,
                                     `nama_irigasi`,
                                     `total_wilayah`,
                                     `nama_ranting`,
                                     `kepala_ranting`,
                                     `nip`,
                                     `kabupaten`,
                                     `jabatan`,
                                     `tgl_blangko08O`,
                                     `tgl_ket`,
                                     `jumlahhari`,
                                     `bln_blangko08O`,
                                     `bln_ket`,
                                     `tahun_blangko08O`,
                                     `no`,
                                     `no_rata`,
                                     `limpasH`,
                                     `limpasQ`,
                                     `irigasiKNH`,
                                     `irigasiKNQ`,
                                     `irigasiKRH`,
                                     `irigasiKRQ`,
                                     `totalDebit`) 
                              VALUES('$_POST[id_nota]',
                              		 '$_SESSION[namalengkap]',
                              		 '$_SESSION[limpas]',
                                   '$_SESSION[namairigasi]',
                              		 '$_SESSION[totalwilayah]',
                              		 '$_SESSION[namaranting]',
                                   '$_SESSION[kepalaranting]',
                                   '$_SESSION[NIP]',
                              		 '$_SESSION[kab]',
                              		 '$_SESSION[bagianpelaksana]',
                              		 '$_POST[tgl]',
                              		 '$_POST[menutanggaket]',
                              		 '$_POST[jumlahHari]',
                              		 '$_POST[bulan]',
                              		 '$_POST[menubulanket]',
                              		 '$_POST[menutahunket]',
                              		 '$_POST[urutantanggal]',
                              		 '$_POST[nomer_rata]',
                              		 '$_POST[in_limpas]',
                              		  SQRT(limpasH*limpasH*limpasH)*$_SESSION[satuanlimpas]*$_SESSION[lebarlimpas],
                              		 '$_POST[in_kanan]',
                              		  SQRT(irigasiKNH*irigasiKNH*irigasiKNH)*$_SESSION[satuanirigasi]*$_SESSION[lebaririgasi],
                              		 '$_POST[in_kiri]',
                              		  SQRT(irigasiKRH*irigasiKRH*irigasiKRH)*$_SESSION[satuanirigasi]*$_SESSION[lebaririgasi],
                              		  limpasQ+irigasiKNQ+irigasiKRQ)");

            $tampno = mysql_query("SELECT COUNT(`no`)AS CountNo FROM blangko08 WHERE nama_irigasi = '$_SESSION[namairigasi]' AND tgl_blangko08O = '$_POST[tgl]' AND bln_blangko08O = '$_POST[bulan]' AND tahun_blangko08O = '$_POST[menutahunket]'");
            $r    = mysql_fetch_array($tampno);
            $CountNo = $r['CountNo'];

             /*$nilairataseluruh = mysql_query("SELECT ROUND(AVG(`totalDebit`)) AS Nilairatarataseluruh FROM blangko08 WHERE nama_irigasi = '$_SESSION[namairigasi]' AND tgl_blangko08O = '$_POST[tgl]' AND bln_blangko08O = '$_POST[bulan]' AND tahun_blangko08O = '$_POST[menutahunket]'");
             $t    = mysql_fetch_array($nilairataseluruh);*/

            $nilairata1 = mysql_query("SELECT ROUND(AVG(`totalDebit`)) AS Nilairatarata1 FROM blangko08 WHERE id_nota = '$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]' AND `no_rata` ='1'");
            $r1    = mysql_fetch_array($nilairata1);

            $nilairata2 = mysql_query("SELECT ROUND(AVG(`totalDebit`)) AS Nilairatarata2 FROM blangko08 WHERE id_nota = '$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]' AND `no_rata` ='2'");
            $r2    = mysql_fetch_array($nilairata2);

            $nilairata3 = mysql_query("SELECT ROUND(AVG(`totalDebit`)) AS Nilairatarata3 FROM blangko08 WHERE id_nota = '$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]' AND `no_rata` ='3'");
            $r3    = mysql_fetch_array($nilairata3);

            $Nilairatarataseluruh = ROUND(($r1[Nilairatarata1] + $r2[Nilairatarata2] + $r3[Nilairatarata3])/3);//mencari nilai rata-rata per 3 

            

            if($CountNo == $_POST['jumlahHari'])
            { 
                 mysql_query("INSERT INTO `irigasi`.`rangkuman_aktifitas`(`modul`,`nama_irigasi`,`nama_lengkap`,`id_nota`,`tanggal`,`bulan`,`tahun`,`ket`,`keterangan`,`tanggal_post`) VALUES ('$modul','$_SESSION[namairigasi]','$_SESSION[namalengkap]','$_POST[id_nota]','$_POST[menutanggaket]','$_POST[menubulanket]','$_POST[menutahunket]','0','menginput data',CURRENT_TIMESTAMP)");//pemanggilan untuk update kegiatan
                 $count=mysql_fetch_array(mysql_query("SELECT * FROM debit_pertahun WHERE nama_irigasi = '$_SESSION[namairigasi]' AND tahun = '$_POST[menutahunket]'"));
                 if($count['tahun']!= $_POST['menutahunket'])
                 {
                      mysql_query("INSERT INTO `irigasi`.`debit_pertahun`(`nama_irigasi`,`tahun`) VALUES ('$_SESSION[namairigasi]','$_POST[menutahunket]')");
                      $countq=mysql_fetch_array(mysql_query("SELECT `bln_ket`,`tgl_blangko08O` FROM blangko08 WHERE nama_irigasi = '$_SESSION[namairigasi]' AND tgl_blangko08O = '$_POST[tgl]' AND bln_ket = '$_POST[menubulanket]' AND tahun_blangko08O = '$_POST[menutahunket]'"));
                      if(($countq['bln_ket']== 'Januari')AND($countq['tgl_blangko08O']=='1'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `jan1`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Januari')AND($countq['tgl_blangko08O']=='2'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `jan2`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Februari')AND($countq['tgl_blangko08O']=='1'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `feb1`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Februari')AND($countq['tgl_blangko08O']=='2'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `feb2`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Maret')AND($countq['tgl_blangko08O']=='1'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `mar1`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Maret')AND($countq['tgl_blangko08O']=='2'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `mar2`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'April')AND($countq['tgl_blangko08O']=='1'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `apr1`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'April')AND($countq['tgl_blangko08O']=='2'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `apr2`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Mei')AND($countq['tgl_blangko08O']=='1'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `mei1`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Mei')AND($countq['tgl_blangko08O']=='2'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `mei2`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Juni')AND($countq['tgl_blangko08O']=='1'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `jun1`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Juni')AND($countq['tgl_blangko08O']=='2'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `jun2`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Juli')AND($countq['tgl_blangko08O']=='1'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `jul1`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Juli')AND($countq['tgl_blangko08O']=='2'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `jul2`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Agustus')AND($countq['tgl_blangko08O']=='1'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `agu1`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Agustus')AND($countq['tgl_blangko08O']=='2'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `agu2`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'September')AND($countq['tgl_blangko08O']=='1'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `sep1`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'September')AND($countq['tgl_blangko08O']=='2'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `sep2`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Oktober')AND($countq['tgl_blangko08O']=='1'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `okt1`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Oktober')AND($countq['tgl_blangko08O']=='2'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `okt2`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Nopember')AND($countq['tgl_blangko08O']=='1'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `nop1`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Nopember')AND($countq['tgl_blangko08O']=='2'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `nop2`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Desember')AND($countq['tgl_blangko08O']=='1'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `des1`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Desember')AND($countq['tgl_blangko08O']=='2'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `des2`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else
                      {

                      }
                 }
                 else if($count['tahun']== $_POST['menutahunket'])
                 {
                      $countq=mysql_fetch_array(mysql_query("SELECT `bln_ket`,`tgl_blangko08O` FROM blangko08 WHERE nama_irigasi = '$_SESSION[namairigasi]' AND tgl_blangko08O = '$_POST[tgl]' AND bln_ket = '$_POST[menubulanket]' AND tahun_blangko08O = '$_POST[menutahunket]'"));
                      if(($countq['bln_ket']== 'Januari')AND($countq['tgl_blangko08O']=='1'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `jan1`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Januari')AND($countq['tgl_blangko08O']=='2'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `jan2`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Februari')AND($countq['tgl_blangko08O']=='1'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `feb1`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Februari')AND($countq['tgl_blangko08O']=='2'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `feb2`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Maret')AND($countq['tgl_blangko08O']=='1'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `mar1`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Maret')AND($countq['tgl_blangko08O']=='2'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `mar2`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'April')AND($countq['tgl_blangko08O']=='1'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `apr1`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'April')AND($countq['tgl_blangko08O']=='2'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `apr2`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Mei')AND($countq['tgl_blangko08O']=='1'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `mei1`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Mei')AND($countq['tgl_blangko08O']=='2'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `mei2`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Juni')AND($countq['tgl_blangko08O']=='1'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `jun1`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Juni')AND($countq['tgl_blangko08O']=='2'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `jun2`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Juli')AND($countq['tgl_blangko08O']=='1'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `jul1`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Juli')AND($countq['tgl_blangko08O']=='2'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `jul2`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Agustus')AND($countq['tgl_blangko08O']=='1'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `agu1`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Agustus')AND($countq['tgl_blangko08O']=='2'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `agu2`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'September')AND($countq['tgl_blangko08O']=='1'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `sep1`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'September')AND($countq['tgl_blangko08O']=='2'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `sep2`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Oktober')AND($countq['tgl_blangko08O']=='1'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `okt1`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Oktober')AND($countq['tgl_blangko08O']=='2'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `okt2`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Nopember')AND($countq['tgl_blangko08O']=='1'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `nop1`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Nopember')AND($countq['tgl_blangko08O']=='2'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `nop2`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Desember')AND($countq['tgl_blangko08O']=='1'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `des1`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Desember')AND($countq['tgl_blangko08O']=='2'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `des2`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else
                      {
                        
                      }
                 }

            }
            else
            {
                header('location:../../media.php?modul='.$modul.'&menu_tanggal='.$_POST[tgl].'&menu_bulan='.$_POST[bulan].'&menu_tahun='.$_POST[menutahunket]);
            } 
            header('location:../../media.php?modul='.$modul.'&menu_tanggal='.$_POST[tgl].'&menu_bulan='.$_POST[bulan].'&menu_tahun='.$_POST[menutahunket]);       
        }
        else
        {
           header('location:../../media.php?modul='.$modul.'&menu_tanggal='.$_POST[tgl].'&menu_bulan='.$_POST[bulan].'&menu_tahun='.$_POST[menutahunket]);
        }


}
// Update tag
elseif ($modul=='blangko04' AND $act=='update'){
  mysql_query("UPDATE `blangko08` SET `id_nota` = '$_POST[id_nota]',
                                      `nama_personil` = '$_SESSION[namalengkap]',
                                      `sungai` = '$_SESSION[limpas]',
                                      `nama_irigasi` = '$_SESSION[namairigasi]',
                                      `total_wilayah` = '$_SESSION[totalwilayah]',
                                      `nama_ranting` = '$_SESSION[namaranting]',
                                      `kepala_ranting` =  '$_SESSION[kepalaranting]',
                                      `nip` = '$_SESSION[NIP]',
                                      `kabupaten` = '$_SESSION[kab]',
                                      `jabatan` = '$_SESSION[bagianpelaksana]',
                                      `tgl_blangko08O` = '$_POST[tanggaldebit]',
                                      `tgl_ket` = '$_POST[menutanggaket]',
                                      `jumlahhari` = '$_POST[jumlahHari]',
                                      `bln_blangko08O`= '$_POST[bln]',
                                      `bln_ket` = '$_POST[menubulanket]',
                                      `tahun_blangko08O` = '$_POST[menutahunket]',
                                      `no` = '$_POST[nomer_tgl]',
                                      `no_rata` = '$_POST[nomer_rata]',
                                      `limpasH` = '$_POST[in_limpas]',
                                      `limpasQ` = SQRT(limpasH*limpasH*limpasH)*$_SESSION[satuanlimpas]*$_SESSION[lebarlimpas],
                                      `irigasiKNH` = '$_POST[in_kanan]',
                                      `irigasiKNQ` = SQRT(irigasiKNH*irigasiKNH*irigasiKNH)*$_SESSION[satuanirigasi]*$_SESSION[lebaririgasi],
                                      `irigasiKRH` = '$_POST[in_kiri]',
                                      `irigasiKRQ` = SQRT(irigasiKRH*irigasiKRH*irigasiKRH)*$_SESSION[satuanirigasi]*$_SESSION[lebaririgasi],
                                      `totalDebit` = limpasQ+irigasiKNQ+irigasiKRQ
                                    WHERE id_blangko08O = '$_POST[id]'");

            $tampno = mysql_query("SELECT COUNT(`no`)AS CountNo FROM `blangko08` WHERE `nama_irigasi` = '$_SESSION[namairigasi]' AND `tgl_blangko08O` = '$_POST[tanggaldebit]' AND `bln_blangko08O`= '$_POST[bln]' AND `tahun_blangko08O` = '$_POST[menutahunket]'");
            $r    = mysql_fetch_array($tampno);
            $CountNo = $r['CountNo'];

            /*$nilairataseluruh = mysql_query("SELECT ROUND(AVG(`totalDebit`)) AS Nilairatarataseluruh FROM blangko08 WHERE nama_irigasi = '$_SESSION[namairigasi]' AND `tgl_blangko08O` = '$_POST[tanggaldebit]' AND `bln_blangko08O`= '$_POST[bln]' AND `tahun_blangko08O` = '$_POST[menutahunket]'");
            $t    = mysql_fetch_array($nilairataseluruh);
            $Nilairatarataseluruh = $t['Nilairatarataseluruh'];*/

            $nilairata1 = mysql_query("SELECT ROUND(AVG(`totalDebit`)) AS Nilairatarata1 FROM blangko08 WHERE id_nota = '$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]' AND `no_rata` ='1'");
            $r1    = mysql_fetch_array($nilairata1);

            $nilairata2 = mysql_query("SELECT ROUND(AVG(`totalDebit`)) AS Nilairatarata2 FROM blangko08 WHERE id_nota = '$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]' AND `no_rata` ='2'");
            $r2    = mysql_fetch_array($nilairata2);

            $nilairata3 = mysql_query("SELECT ROUND(AVG(`totalDebit`)) AS Nilairatarata3 FROM blangko08 WHERE id_nota = '$_POST[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]' AND `no_rata` ='3'");
            $r3    = mysql_fetch_array($nilairata3);

            $Nilairatarataseluruh = ROUND(($r1[Nilairatarata1] + $r2[Nilairatarata2] + $r3[Nilairatarata3])/3);//mencari nilai rata-rata per 3 


            if($CountNo == $_POST['jumlahHari'])
            { 
                 $ket = mysql_query("SELECT MAX(ket)+1 AS KET FROM rangkuman_aktifitas WHERE nama_irigasi = '$_SESSION[namairigasi]' AND nama_lengkap = '$_SESSION[namalengkap]' AND id_nota = '$_POST[id_nota]'");
                 $k    = mysql_fetch_array($ket);

                 $keterangankegiatan = "menyunting data";
                
                 mysql_query("UPDATE `irigasi`.`rangkuman_aktifitas` SET `ket`='$k[KET]',`keterangan`='$keterangankegiatan',`tanggal_post` = CURRENT_TIMESTAMP WHERE nama_irigasi = '$_SESSION[namairigasi]' AND nama_lengkap = '$_SESSION[namalengkap]' AND id_nota = '$_POST[id_nota]'");//pemanggilan untuk update kegiatan
                 $count=mysql_fetch_array(mysql_query("SELECT * FROM debit_pertahun WHERE nama_irigasi = '$_SESSION[namairigasi]' AND tahun = '$_POST[menutahunket]'"));
                 if($count['tahun']== $_POST['menutahunket'])
                 {
                      $countq=mysql_fetch_array(mysql_query("SELECT `bln_ket`,`tgl_blangko08O` FROM blangko08 WHERE nama_irigasi = '$_SESSION[namairigasi]' AND tgl_blangko08O = '$_POST[tanggaldebit]' AND `bln_ket` = '$_POST[menubulanket]' AND tahun_blangko08O = '$_POST[menutahunket]'"));
                      if(($countq['bln_ket']== 'Januari')AND($countq['tgl_blangko08O']=='1'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `jan1`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Januari')AND($countq['tgl_blangko08O']=='2'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `jan2`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Februari')AND($countq['tgl_blangko08O']=='1'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `feb1`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Februari')AND($countq['tgl_blangko08O']=='2'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `feb2`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Maret')AND($countq['tgl_blangko08O']=='1'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `mar1`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Maret')AND($countq['tgl_blangko08O']=='2'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `mar2`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'April')AND($countq['tgl_blangko08O']=='1'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `apr1`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'April')AND($countq['tgl_blangko08O']=='2'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `apr2`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Mei')AND($countq['tgl_blangko08O']=='1'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `mei1`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Mei')AND($countq['tgl_blangko08O']=='2'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `mei2`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Juni')AND($countq['tgl_blangko08O']=='1'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `jun1`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Juni')AND($countq['tgl_blangko08O']=='2'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `jun2`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Juli')AND($countq['tgl_blangko08O']=='1'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `jul1`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Juli')AND($countq['tgl_blangko08O']=='2'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `jul2`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Agustus')AND($countq['tgl_blangko08O']=='1'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `agu1`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Agustus')AND($countq['tgl_blangko08O']=='2'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `agu2`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'September')AND($countq['tgl_blangko08O']=='1'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `sep1`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'September')AND($countq['tgl_blangko08O']=='2'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `sep2`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Oktober')AND($countq['tgl_blangko08O']=='1'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `okt1`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Oktober')AND($countq['tgl_blangko08O']=='2'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `okt2`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Nopember')AND($countq['tgl_blangko08O']=='1'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `nop1`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Nopember')AND($countq['tgl_blangko08O']=='2'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `nop2`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Desember')AND($countq['tgl_blangko08O']=='1'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `des1`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else  if(($countq['bln_ket']== 'Desember')AND($countq['tgl_blangko08O']=='2'))
                      {
                          mysql_query("UPDATE `irigasi`.`debit_pertahun` SET `des2`=' $Nilairatarataseluruh' WHERE `tahun`='$_POST[menutahunket]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                      }
                      else
                      {
                        
                      }
                 }

            }
            else
            {
               header('location:../../media.php?modul='.$modul.'&menu_tanggal='.$_POST[tanggaldebit].'&menu_bulan='.$_POST[bln].'&menu_tahun='.$_POST[menutahunket]);
            }
            



  header('location:../../media.php?modul='.$modul.'&menu_tanggal='.$_POST[tanggaldebit].'&menu_bulan='.$_POST[bln].'&menu_tahun='.$_POST[menutahunket]);
}


}
?>
