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

    if ($modul=='irigasi' AND $act=='hapus')
    {
        $data=mysql_fetch_array(mysql_query("SELECT foto_bendungan FROM irigasi WHERE id_irigasi='$_GET[id]'"));
        if ($data['foto_bendungan']!=''){
           mysql_query("DELETE FROM irigasi WHERE id_irigasi='$_GET[id]'");
           unlink("../../foto_bendungan/$_GET[namafile]");   
           unlink("../../foto_bendungan/small_$_GET[namafile]");   
        }
        else
        {
           mysql_query("DELETE FROM irigasi WHERE id_irigasi='$_GET[id]'");
        }
    header('location:../../media.php?modul='.$modul);
    }

    elseif ($modul=='irigasi' AND $act=='input')
    {
        $lokasi_file    = $_FILES['fupload']['tmp_name'];
        $tipe_file      = $_FILES['fupload']['type'];
        $nama_file      = $_FILES['fupload']['name'];
        $acak           = rand(1,99);
        $nama_file_unik = $acak.$nama_file;

        $album_seo = seo_title($_POST['nama_irigasi']);
        if (!empty($lokasi_file))
        {
            if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg")
            {
                echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
                window.location=('../../media.php?modul=irigasi)</script>";
            }
            else
            {
                UploadFoto_Bendungan($nama_file_unik);
                mysql_query("INSERT INTO irigasi(nama_irigasi,
                                                 kode_irigasi,
                                                 total_wilayah,
                                                 jumlah_tersier,
                                                 sungai,
                                                 id_ranting,
                                                 id_bendung,
                                                 kabupaten,
                                                 lintas_daerah,
                                                 lebar_limpas,
                                                 lebar_irigasi,
                                                 foto_bendungan,
                                                 album_seo) 
                                          VALUES('$_POST[nama_irigasi]',
                                                 '$_POST[kode_irigasi]',
                                                 '$_POST[total_wilayah]',
                                                 '$_POST[jumlah_tersier]',
                                                 '$_POST[sungai]',
                                                 '$_POST[menu_ranting]',
                                                 '$_POST[menu_bendung]',
                                                 '$_POST[kabupaten]',
                                                 '$_POST[lintas_daerah]',
                                                 '$_POST[lebar_limpas]',
                                                 '$_POST[lebar_irigasi]',
                                                 '$nama_file_unik',
                                                 '$album_seo')");
                header('location:../../media.php?modul='.$modul);
            }
        }
        else
        {
             mysql_query("INSERT INTO irigasi(nama_irigasi,
                                             kode_irigasi,
                                             total_wilayah,
                                             jumlah_tersier,
                                             sungai,
                                             id_ranting,
                                             id_bendung,
                                             kabupaten,
                                             lintas_daerah,
                                             lebar_limpas,
                                             lebar_irigasi,
                                             album_seo) 
                                      VALUES('$_POST[nama_irigasi]',
                                             '$_POST[kode_irigasi]',
                                             '$_POST[total_wilayah]',
                                             '$_POST[jumlah_tersier]',
                                             '$_POST[sungai]',
                                             '$_POST[menu_ranting]',
                                             '$_POST[menu_bendung]',
                                             '$_POST[kabupaten]',
                                             '$_POST[lintas_daerah]',
                                             '$_POST[lebar_limpas]',
                                             '$_POST[lebar_irigasi]',
                                             '$album_seo')");
            header('location:../../media.php?modul='.$modul);
        }  
    }
    elseif ($modul=='irigasi' AND $act=='update')
    {
      	$lokasi_file    = $_FILES['fupload']['tmp_name'];
        $tipe_file      = $_FILES['fupload']['type'];
        $nama_file      = $_FILES['fupload']['name'];
        $acak           = rand(1,99);
        $nama_file_unik = $acak.$nama_file;

        $album_seo = seo_title($_POST['nama_irigasi']);
        if ((!empty($lokasi_file))or($lokasi_file!='')or($lokasi_file!=null))
        {
            if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg")
            {
                echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
                window.location=('../../media.php?modul=irigasi)</script>";
            }
            else
            {
                 UploadFoto_Bendungan($nama_file_unik);
                 mysql_query("UPDATE irigasi SET nama_irigasi = '$_POST[nama_irigasi]',
                                                 kode_irigasi = '$_POST[kode_irigasi]',
                                                 total_wilayah = '$_POST[total_wilayah]',
                                                 jumlah_tersier = '$_POST[jumlah_tersier]',
                                                 sungai = '$_POST[sungai]',
                                                 id_ranting = '$_POST[menu_ranting]',
                                                 id_bendung = '$_POST[menu_bendung]',
                                                 kabupaten = '$_POST[kabupaten]',
                                                 lintas_daerah = '$_POST[lintas_daerah]',
                                                 lebar_limpas = '$_POST[lebar_limpas]',
                                                 lebar_irigasi = '$_POST[lebar_irigasi]',
                                                 foto_bendungan = '$nama_file_unik',
                                                 album_seo = '$album_seo'
                                            WHERE id_irigasi = '$_POST[id]'");
                unlink("../../foto_bendungan/$_GET[namafile]");   
                unlink("../../foto_bendungan/small_$_GET[namafile]"); 
                header('location:../../media.php?modul='.$modul);
            }
        }
        elseif((empty($lokasi_file))or($lokasi_file=='')or($lokasi_file==null))
        {
          mysql_query("UPDATE irigasi SET nama_irigasi = '$_POST[nama_irigasi]',
                                                 kode_irigasi = '$_POST[kode_irigasi]',
                                                 total_wilayah = '$_POST[total_wilayah]',
                                                 jumlah_tersier = '$_POST[jumlah_tersier]',
                                                 sungai = '$_POST[sungai]',
                                                 id_ranting = '$_POST[menu_ranting]',
                                                 id_bendung = '$_POST[menu_bendung]',
                                                 kabupaten = '$_POST[kabupaten]',
                                                 lintas_daerah = '$_POST[lintas_daerah]',
                                                 lebar_limpas = '$_POST[lebar_limpas]',
                                                 lebar_irigasi = '$_POST[lebar_irigasi]',
                                                 album_seo = '$album_seo'
                                            WHERE id_irigasi = '$_POST[id]'");
          header('location:../../media.php?modul='.$modul);
        }

      	
    }
}
?>
