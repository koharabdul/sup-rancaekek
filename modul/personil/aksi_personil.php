<?php
session_start();
 if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  echo "Untuk mengakses modul, Anda harus login";
}
else
{
    include "../../config/koneksi.php";
    include "../../config/fungsi_thumb.php";
    include "../../config/fungsi_seo.php";
    include "../../config/library.php";

    $modul=$_GET['modul'];
    $act=$_GET['act'];

    if ($modul=='personil' AND $act=='hapus')
    {
        $data=mysql_fetch_array(mysql_query("SELECT foto_personil FROM personil WHERE id_personil='$_GET[id]'"));
        if ($data['foto_personil']!=''){
           mysql_query("DELETE FROM personil WHERE id_personil='$_GET[id]'");
           unlink("../../foto_personil/$_GET[namafile]");   
           unlink("../../foto_personil/small_$_GET[namafile]");   
        }
        else
        {
           mysql_query("DELETE FROM personil WHERE id_personil='$_GET[id]'");
        }
    header('location:../../media.php?modul='.$modul);
    }

    elseif ($modul=='personil' AND $act=='input')
    {
        $lokasi_file    = $_FILES['fupload']['tmp_name'];
        $tipe_file      = $_FILES['fupload']['type'];
        $nama_file      = $_FILES['fupload']['name'];
        $acak           = rand(1,99);
        $nama_file_unik = $acak.$nama_file;

        $album_seo = seo_title($_POST['nama_lengkap']);
        if (!empty($lokasi_file))
        {
            if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg")
            {
                echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
                window.location=('../../media.php?modul=personil)</script>";
            }
            else
            {
                Uploadfoto_personil($nama_file_unik);
                mysql_query("INSERT INTO personil(nama_lengkap,
                                                 nama_panggilan,
                                                 tempat_lahir,
                                                 tanggal_lahir,
                                                 jenis_kelamin,
                                                 alamat,
                                                 id_agama,
                                                 id_pendidikan,
                                                 status_perkawinan,
                                                 id_irigasi,
                                                 awal_kerja,
                                                 id_jabatan,
                                                 no_handphone,
                                                 foto_personil,
                                                 album_seo) 
                                          VALUES('$_POST[nama_lengkap]',
                                                 '$_POST[nama_panggilan]',
                                                 '$_POST[tempat_lahir]',
                                                 '$_POST[tanggal_lahir]',
                                                 '$_POST[jenis_kelamin]',
                                                 '$_POST[alamat]',
                                                 '$_POST[menu_agama]',
                                                 '$_POST[menu_pendidikan]',
                                                 '$_POST[status_perkawinan]',
                                                 '$_POST[menu_irigasi]',
                                                 '$_POST[awal_kerja]',
                                                 '$_POST[menu_jabatan]',
                                                 '$_POST[no_handphone]',
                                                 '$nama_file_unik',
                                                 '$album_seo')");
                header('location:../../media.php?modul='.$modul);
            }
        }
        else
        {
             mysql_query("INSERT INTO personil(nama_lengkap,
                                                 nama_panggilan,
                                                 tempat_lahir,
                                                 tanggal_lahir,
                                                 jenis_kelamin,
                                                 alamat,
                                                 id_agama,
                                                 id_pendidikan,
                                                 status_perkawinan,
                                                 id_irigasi,
                                                 awal_kerja,
                                                 id_jabatan,
                                                 no_handphone,
                                                 album_seo) 
                                          VALUES('$_POST[nama_lengkap]',
                                                 '$_POST[nama_panggilan]',
                                                 '$_POST[tempat_lahir]',
                                                 '$_POST[tanggal_lahir]',
                                                 '$_POST[jenis_kelamin]',
                                                 '$_POST[alamat]',
                                                 '$_POST[menu_agama]',
                                                 '$_POST[menu_pendidikan]',
                                                 '$_POST[status_perkawinan]',
                                                 '$_POST[menu_irigasi]',
                                                 '$_POST[awal_kerja]',
                                                 '$_POST[menu_jabatan]',
                                                 '$_POST[no_handphone]',
                                                 '$album_seo')");
                header('location:../../media.php?modul='.$modul);
        }  
    }
    elseif ($modul=='personil' AND $act=='update')
    {
      	$lokasi_file    = $_FILES['fupload']['tmp_name'];
        $tipe_file      = $_FILES['fupload']['type'];
        $nama_file      = $_FILES['fupload']['name'];
        $acak           = rand(1,99);
        $nama_file_unik = $acak.$nama_file;

        $album_seo = seo_title($_POST['nama_lengkap']);
        if ((!empty($lokasi_file))or($lokasi_file!='')or($lokasi_file!=null))
        {
            if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg")
            {
                echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
                window.location=('../../media.php?modul=personil)</script>";
            }
            else
            {
                 Uploadfoto_personil($nama_file_unik);
                 mysql_query("UPDATE personil SET nama_lengkap = '$_POST[nama_lengkap]',
                                                 nama_panggilan = '$_POST[nama_panggilan]',
                                                 tempat_lahir = '$_POST[tempat_lahir]',
                                                 tanggal_lahir = '$_POST[tanggal_lahir]',
                                                 jenis_kelamin = '$_POST[jenis_kelamin]',
                                                 alamat = '$_POST[alamat]',
                                                 id_agama = '$_POST[menu_agama]',
                                                 id_pendidikan = '$_POST[menu_pendidikan]',
                                                 status_perkawinan = '$_POST[status_perkawinan]',
                                                 id_irigasi = '$_POST[menu_irigasi]',
                                                 awal_kerja = '$_POST[awal_kerja]',
                                                 id_jabatan = '$_POST[menu_jabatan]',
                                                 no_handphone = '$_POST[no_handphone]',
                                                 foto_personil = '$nama_file_unik',
                                                 album_seo = '$album_seo'
                                            WHERE id_personil = '$_POST[id]'");
                unlink("../../foto_personil/$_GET[namafile]");   
                unlink("../../foto_personil/small_$_GET[namafile]"); 
                header('location:../../media.php?modul='.$modul);
            }
        }
        elseif((empty($lokasi_file))or($lokasi_file=='')or($lokasi_file==null))
        {
         mysql_query("UPDATE personil SET nama_lengkap = '$_POST[nama_lengkap]',
                                                 nama_panggilan = '$_POST[nama_panggilan]',
                                                 tempat_lahir = '$_POST[tempat_lahir]',
                                                 tanggal_lahir = '$_POST[tanggal_lahir]',
                                                 jenis_kelamin = '$_POST[jenis_kelamin]',
                                                 alamat = '$_POST[alamat]',
                                                 id_agama = '$_POST[menu_agama]',
                                                 id_pendidikan = '$_POST[menu_pendidikan]',
                                                 status_perkawinan = '$_POST[status_perkawinan]',
                                                 id_irigasi = '$_POST[menu_irigasi]',
                                                 awal_kerja = '$_POST[awal_kerja]',
                                                 id_jabatan = '$_POST[menu_jabatan]',
                                                 no_handphone = '$_POST[no_handphone]',
                                                 album_seo = '$album_seo'
                                            WHERE id_personil = '$_POST[id]'");
          header('location:../../media.php?modul='.$modul);
        }

      	
    }
    elseif ($modul=='personil' AND $act=='tampilpersonil')
    {
        $lokasi_file    = $_FILES['fupload']['tmp_name'];
        $tipe_file      = $_FILES['fupload']['type'];
        $nama_file      = $_FILES['fupload']['name'];
        $acak           = rand(1,99);
        $nama_file_unik = $acak.$nama_file;

       
        if ((!empty($lokasi_file))or($lokasi_file!='')or($lokasi_file!=null))
        {
            if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg")
            {
                echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
                window.location=('../../media.php?modul=personil)</script>";
            }
            else
            {
                 Uploadfoto_personil($nama_file_unik);
                 mysql_query("UPDATE personil SET foto_personil = '$nama_file_unik'                                                 
                                            WHERE nama_lengkap = '$_SESSION[namalengkap]'");
                unlink("../../foto_personil/$_GET[namafile]");   
                unlink("../../foto_personil/small_$_GET[namafile]"); 
                header('location:../../media.php?modul='.$modul.'&act=tampilpersonil&id='.$_POST[id]);
            }
        }
        elseif((empty($lokasi_file))or($lokasi_file=='')or($lokasi_file==null))
        {
         
          header('location:../../media.php?modul='.$modul.'&act=tampilpersonil&id='.$_POST[id]);
        }

                
    }

    elseif ($modul=='personil' AND $act=='alamat')
    {
        mysql_query("UPDATE personil SET alamat = '$_POST[alamat]' WHERE id_personil = '$_POST[id]'");
        header('location:../../media.php?modul='.$modul.'&act=tampilpersonil&id='.$_POST[id]);
    }
    elseif ($modul=='personil' AND $act=='statusperkawinan')
    {
        mysql_query("UPDATE personil SET status_perkawinan = '$_POST[status_perkawinan]' WHERE id_personil = '$_POST[id]'");
        header('location:../../media.php?modul='.$modul.'&act=tampilpersonil&id='.$_POST[id]);
    }
    elseif ($modul=='personil' AND $act=='no_handphone')
    {
        mysql_query("UPDATE personil SET no_handphone = '$_POST[no_handphone]' WHERE id_personil = '$_POST[id]'");
        header('location:../../media.php?modul='.$modul.'&act=tampilpersonil&id='.$_POST[id]);
    }
}
?>
