<?php
session_start();
 if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  echo "Untuk mengakses modul, Anda harus login";
}
else{
include "../../config/koneksi.php";


$modul=$_GET['modul'];
$act=$_GET['act'];



if ($modul=='blangko5' AND $act=='input')
{
	$count=mysql_fetch_array(mysql_query("SELECT MAX(`no`) AS no FROM blangko05 
											WHERE nama_irigasi = '$_SESSION[namairigasi]' 
											AND id_nota = '$_POST[id_nota]'"));
    if($count['no']!= $_POST['nomer'])//untuk tidak memasukan no yang sama
    {	
		$countA=mysql_fetch_array(mysql_query("SELECT COUNT(nama_ptkTersier), nama_ptkTersier AS petak FROM blangko05 
											WHERE nama_irigasi = '$_SESSION[namairigasi]' 
											AND id_nota = '$_POST[id_nota]'
											AND nama_ptkTersier = '$_POST[nama_ptkTersier]'"));
		if($countA['petak'] != $_POST['nama_ptkTersier'])
		{
			mysql_query("INSERT INTO `irigasi`.`blangko05`(`id_nota`,
														   `kode_nota`,
														   `nama_personil`,
														   `nama_irigasi`,
														   `kode_irigasi`,
														   `total_wilayah`,
														   `nama_ranting`,
														   `nama_kepala`,
														   `nip`,
														   `kabupaten`,
														   `jabatan`,
														   `tgl_blangko05O`,
														   `tgl_ket`,
														   `bln_blangko05O`,
														   `bln_ket`,
														   `tahun_blangko05O`,
														   `masatanam`,
														   `bulanMasatanamke`,
														   `tahunMasatanamke`,
														   `sampaiBulan`,
														   `sampaiTahun`,
														   `no`,
														   `nama_ptkTersier`,
														   `padiA`,
														   `kebutuhanPadiA`,
														   `padiB`,
														   `kebutuhanPadiB`,
														   `padiC`,
														   `kebutuhanPadiC`,
														   `tebuA`,
														   `kebutuhanTebuA`,
														   `tebuB`,
														   `kebutuhanTebuB`,
														   `tebuC`,
														   `kebutuhanTebuC`,
														   `palawijaA`,
														   `kebutuhanPalawijaA`,
														   `palawijaB`,
														   `kebutuhanPalawijaB`,
														   `gadutanpaIzin`,
														   `kgadutanpaIzin`,
														   `lain_lain`,
														   `klain_lain`,
														   `luasmj`,
														   `jumlah`,
														   `faktorTersier`,
														   `kebutuhanAirTotal`,
														   `kerusakanTanaman`) 
												  VALUES ( '$_POST[id_nota]',
												 		   '$_POST[kode_nota]',
												 		   '$_SESSION[namalengkap]',
												 		   '$_SESSION[namairigasi]',
												 		   '$_SESSION[kodeirigasi]',
												 		   '$_SESSION[totalwilayah]',
												 		   '$_SESSION[namaranting]',
												 		   '$_SESSION[kepalaranting]',
												 		   '$_SESSION[NIP]',
												 		   '$_SESSION[kab]',
												 		   '$_SESSION[bagianpelaksana]',
												 		   '$_POST[tgl_blangko05O]',
												 		   '$_POST[ket_tgl]',
												 		   '$_POST[bln_blangko05O]',
												 		   '$_POST[ket_bln]',
												 		   '$_POST[ket_thn]',
												 		   '$_POST[masatanam]',
												 		   '$_POST[blnmasatanamke]',
												 		   '$_POST[thnmasatanamke]',
												 		   '$_POST[sampaibulan]',
												 		   '$_POST[sampaitahun]',
												 		   '$_POST[nomer]',
												 		   '$_POST[nama_ptkTersier]',
												 		   '$_POST[padiA]',
												 		   '$_POST[hpadiA]',
												 		   '$_POST[padiB]',
												 		   '$_POST[hpadiB]',
												 		   '$_POST[padiC]',
												 		   '$_POST[hpadiC]',
												 		   '$_POST[tebuA]',
												 		   '$_POST[htebuA]',
												 		   '$_POST[tebuB]',
												 		   '$_POST[htebuB]',
												 		   '$_POST[tebuC]',
												 		   '$_POST[htebuC]',
												 		   '$_POST[palawijaA]',
												 		   '$_POST[hpalawijaA]',
												 		   '$_POST[palawijaB]',
												 		   '$_POST[hpalawijaB]',
												 		   '$_POST[gadutanpaIzin]',
												 		   '$_POST[hgadutanpaIzin]',
												 		   '$_POST[lain_lain]',
												 		   '$_POST[hlain_lain]',
												 		   padiA + padiB + padiC + tebuA + tebuB + tebuC + palawijaA + palawijaB + gadutanpaIzin + lain_lain,
												 		   '$_POST[jumlah]',
												 		   '$_POST[faktorTersier]',
												 		   '$_POST[jumlahTotal]',
												 		   '$_POST[kerusakanTanaman]')"); 
			
			if($_POST['jumlahhari']=='13')
			{
				mysql_query("INSERT INTO `irigasi`.`blangko06`(`id_nota`,
														   `kode_nota`,
														   `nama_personil`,
														   `nama_irigasi`,
														   `kode_irigasi`,
														   `total_wilayah`,
														   `nama_ranting`,
														   `nama_kepala`,
														   `nip`,
														   `kabupaten`,
														   `jabatan`,
														   `tgl_blangko06O`,
														   `tgl_ket`,
														   `bln_blangko06O`,
														   `bln_ket`,
														   `tahun_blangko06O`,
														   `jumlahhari`,
														   `no`,
														   `nmbangunankontrol`,
														   `hari1`,
														   `hari2`,
														   `hari3`,
														   `hari4`,
														   `hari5`,
														   `hari6`,
														   `hari7`,
														   `hari8`,
														   `hari9`,
														   `hari10`,
														   `hari11`,
														   `hari12`,
														   `hari13`,
														   `hari14`,
														   `hari15`,
														   `hari16`,
														   `jumlahdebit`,
														   `debitrata`,
														   `pengukurandebit`,
														   `kondisialatukur`) 
												  VALUES ( '$_POST[id_nota]',
												 		   '$_POST[kode_nota]',
												 		   '$_SESSION[namalengkap]',
												 		   '$_SESSION[namairigasi]',
												 		   '$_SESSION[kodeirigasi]',
												 		   '$_SESSION[totalwilayah]',
												 		   '$_SESSION[namaranting]',
												 		   '$_SESSION[kepalaranting]',
												 		   '$_SESSION[NIP]',
												 		   '$_SESSION[kab]',
												 		   '$_SESSION[bagianpelaksana]',
												 		   '$_POST[tgl_blangko05O]',
												 		   '$_POST[ket_tgl]',
												 		   '$_POST[bln_blangko05O]',
												 		   '$_POST[ket_bln]',
												 		   '$_POST[ket_thn]',
												  		   '$_POST[jumlahhari]',
												  		   '$_POST[nomer]',
												 		   '$_POST[nama_ptkTersier]',
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   NULL,
												  		   NULL,
												  		   NULL,
												  		   ROUND('$_POST[jumlahTotal]',0) * $_POST[jumlahhari],
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   'Alat Ukur',
												  		   'Baik')"); 
			}
			else if($_POST['jumlahhari']=='14')
			{
				mysql_query("INSERT INTO `irigasi`.`blangko06`(`id_nota`,
														   `kode_nota`,
														   `nama_personil`,
														   `nama_irigasi`,
														   `kode_irigasi`,
														   `total_wilayah`,
														   `nama_ranting`,
														   `nama_kepala`,
														   `nip`,
														   `kabupaten`,
														   `jabatan`,
														   `tgl_blangko06O`,
														   `tgl_ket`,
														   `bln_blangko06O`,
														   `bln_ket`,
														   `tahun_blangko06O`,
														   `jumlahhari`,
														   `no`,
														   `nmbangunankontrol`,
														   `hari1`,
														   `hari2`,
														   `hari3`,
														   `hari4`,
														   `hari5`,
														   `hari6`,
														   `hari7`,
														   `hari8`,
														   `hari9`,
														   `hari10`,
														   `hari11`,
														   `hari12`,
														   `hari13`,
														   `hari14`,
														   `hari15`,
														   `hari16`,
														   `jumlahdebit`,
														   `debitrata`,
														   `pengukurandebit`,
														   `kondisialatukur`) 
												  VALUES ( '$_POST[id_nota]',
												 		   '$_POST[kode_nota]',
												 		   '$_SESSION[namalengkap]',
												 		   '$_SESSION[namairigasi]',
												 		   '$_SESSION[kodeirigasi]',
												 		   '$_SESSION[totalwilayah]',
												 		   '$_SESSION[namaranting]',
												 		   '$_SESSION[kepalaranting]',
												 		   '$_SESSION[NIP]',
												 		   '$_SESSION[kab]',
												 		   '$_SESSION[bagianpelaksana]',
												 		   '$_POST[tgl_blangko05O]',
												 		   '$_POST[ket_tgl]',
												 		   '$_POST[bln_blangko05O]',
												 		   '$_POST[ket_bln]',
												 		   '$_POST[ket_thn]',
												  		   '$_POST[jumlahhari]',
												  		   '$_POST[nomer]',
												 		   '$_POST[nama_ptkTersier]',
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   null,
												  		   null,
												  		   ROUND('$_POST[jumlahTotal]',0) * $_POST[jumlahhari],
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   'Alat Ukur',
												  		   'Baik')"); 
			}
			else if($_POST['jumlahhari']=='15')
			{
				mysql_query("INSERT INTO `irigasi`.`blangko06`(`id_nota`,
														   `kode_nota`,
														   `nama_personil`,
														   `nama_irigasi`,
														   `kode_irigasi`,
														   `total_wilayah`,
														   `nama_ranting`,
														   `nama_kepala`,
														   `nip`,
														   `kabupaten`,
														   `jabatan`,
														   `tgl_blangko06O`,
														   `tgl_ket`,
														   `bln_blangko06O`,
														   `bln_ket`,
														   `tahun_blangko06O`,
														   `jumlahhari`,
														   `no`,
														   `nmbangunankontrol`,
														   `hari1`,
														   `hari2`,
														   `hari3`,
														   `hari4`,
														   `hari5`,
														   `hari6`,
														   `hari7`,
														   `hari8`,
														   `hari9`,
														   `hari10`,
														   `hari11`,
														   `hari12`,
														   `hari13`,
														   `hari14`,
														   `hari15`,
														   `hari16`,
														   `jumlahdebit`,
														   `debitrata`,
														   `pengukurandebit`,
														   `kondisialatukur`) 
												  VALUES ( '$_POST[id_nota]',
												 		   '$_POST[kode_nota]',
												 		   '$_SESSION[namalengkap]',
												 		   '$_SESSION[namairigasi]',
												 		   '$_SESSION[kodeirigasi]',
												 		   '$_SESSION[totalwilayah]',
												 		   '$_SESSION[namaranting]',
												 		   '$_SESSION[kepalaranting]',
												 		   '$_SESSION[NIP]',
												 		   '$_SESSION[kab]',
												 		   '$_SESSION[bagianpelaksana]',
												 		   '$_POST[tgl_blangko05O]',
												 		   '$_POST[ket_tgl]',
												 		   '$_POST[bln_blangko05O]',
												 		   '$_POST[ket_bln]',
												 		   '$_POST[ket_thn]',
												  		   '$_POST[jumlahhari]',
												  		   '$_POST[nomer]',
												 		   '$_POST[nama_ptkTersier]',
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   null,
												  		   ROUND('$_POST[jumlahTotal]',0) * $_POST[jumlahhari],
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   'Alat Ukur',
												  		   'Baik')"); 
			}
			else if($_POST['jumlahhari']=='16')
			{
				mysql_query("INSERT INTO `irigasi`.`blangko06`(`id_nota`,
														   `kode_nota`,
														   `nama_personil`,
														   `nama_irigasi`,
														   `kode_irigasi`,
														   `total_wilayah`,
														   `nama_ranting`,
														   `nama_kepala`,
														   `nip`,
														   `kabupaten`,
														   `jabatan`,
														   `tgl_blangko06O`,
														   `tgl_ket`,
														   `bln_blangko06O`,
														   `bln_ket`,
														   `tahun_blangko06O`,
														   `jumlahhari`,
														   `no`,
														   `nmbangunankontrol`,
														   `hari1`,
														   `hari2`,
														   `hari3`,
														   `hari4`,
														   `hari5`,
														   `hari6`,
														   `hari7`,
														   `hari8`,
														   `hari9`,
														   `hari10`,
														   `hari11`,
														   `hari12`,
														   `hari13`,
														   `hari14`,
														   `hari15`,
														   `hari16`,
														   `jumlahdebit`,
														   `debitrata`,
														   `pengukurandebit`,
														   `kondisialatukur`) 
												  VALUES ( '$_POST[id_nota]',
												 		   '$_POST[kode_nota]',
												 		   '$_SESSION[namalengkap]',
												 		   '$_SESSION[namairigasi]',
												 		   '$_SESSION[kodeirigasi]',
												 		   '$_SESSION[totalwilayah]',
												 		   '$_SESSION[namaranting]',
												 		   '$_SESSION[kepalaranting]',
												 		   '$_SESSION[NIP]',
												 		   '$_SESSION[kab]',
												 		   '$_SESSION[bagianpelaksana]',
												 		   '$_POST[tgl_blangko05O]',
												 		   '$_POST[ket_tgl]',
												 		   '$_POST[bln_blangko05O]',
												 		   '$_POST[ket_bln]',
												 		   '$_POST[ket_thn]',
												  		   '$_POST[jumlahhari]',
												  		   '$_POST[nomer]',
												 		   '$_POST[nama_ptkTersier]',
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   ROUND('$_POST[jumlahTotal]',0) * $_POST[jumlahhari],
												  		   ROUND('$_POST[jumlahTotal]',0),
												  		   'Alat Ukur',
												  		   'Baik')"); 
			} 
			mysql_query("INSERT INTO `irigasi`.`blangko07`(`id_nota`,
														   `kode_nota`,
														   `nama_personil`,
														   `nama_irigasi`,
														   `kode_irigasi`,
														   `jumlah_tersier`,
														   `total_wilayah`,
														   `nama_ranting`,
														   `nama_kepala`,
														   `nip`,
														   `kabupaten`,
														   `jabatan`,
														   `tgl_blangko07O`,
														   `tgl_ket`,
														   `bln_blangko07O`,
														   `bln_ket`,
														   `tahun_blangko07O`,
														   `no`,
														   `nmbangunkontrol`,
														   `luassawahIrigasi`,
														   `debitRata`,
														   `debitAkhirperiode`,
														   `usulanluasTanam`,
														   `kebutuhanairdiTersier`,
														   `kebutuhanLain`,
														   `qhilang`,
														   `qsuplesi`,
														   `kebairdibangbagi`,
														   `debitDiberikan`,
														   `kditetapkan`) 
												   VALUES ('$_POST[id_nota]',
												 		   '$_POST[kode_nota]',
												   	       '$_SESSION[namalengkap]',
														   '$_SESSION[namairigasi]',
														   '$_SESSION[kodeirigasi]',
														   '$_SESSION[jumlahtersier]',
														   '$_SESSION[totalwilayah]',
														   '$_SESSION[namaranting]',
														   '$_SESSION[kepalaranting]',
														   '$_SESSION[NIP]',
														   '$_SESSION[kab]',
														   '$_SESSION[bagianpelaksana]',
												   	       '$_POST[tgl_blangko05O]',
												 		   '$_POST[ket_tgl]',
												 		   '$_POST[bln_blangko05O]',
												 		   '$_POST[ket_bln]',
												 		   '$_POST[ket_thn]',
												  		   '$_POST[nomer]',
												 		   '$_POST[nama_ptkTersier]',
												 		   '$_POST[padiA]' + '$_POST[padiB]' + '$_POST[padiC]' + '$_POST[tebuA]' + '$_POST[tebuB]' + '$_POST[tebuC]' + '$_POST[palawijaA]' + '$_POST[palawijaB]' + '$_POST[gadutanpaIzin]' + '$_POST[lain_lain]',
												   	       NULL,
												   	       NULL,
												   	       '$_POST[padiA]' + '$_POST[padiB]' + '$_POST[padiC]' + '$_POST[tebuA]' + '$_POST[tebuB]' + '$_POST[tebuC]' + '$_POST[palawijaA]' + '$_POST[palawijaB]' + '$_POST[gadutanpaIzin]' + '$_POST[lain_lain]',
												   	       ROUND('$_POST[jumlahTotal]',0),
												   	       NULL,
												   	       NULL,
												   	       NULL,
												   	       NULL,
												   	       NULL,
												   	       NULL)");

			$tampno = mysql_query("SELECT COUNT(`no`)AS CountNo FROM blangko07 WHERE nama_irigasi = '$_SESSION[namairigasi]' AND kode_nota = '$_POST[kode_nota]'");
            $r    = mysql_fetch_array($tampno);
            $CountNo = $r['CountNo'];

            $tampno = mysql_query("SELECT SUM(`luassawahIrigasi`)AS SUM FROM blangko07 WHERE nama_irigasi = '$_SESSION[namairigasi]' AND kode_nota = '$_POST[kode_nota]'");
            $z    = mysql_fetch_array($tampno);
            $SUM = $z['SUM'];

            $tampno = mysql_query("SELECT SUM(`kebutuhanairdiTersier`)AS SUM2 FROM blangko07 WHERE nama_irigasi = '$_SESSION[namairigasi]' AND kode_nota = '$_POST[kode_nota]'");
            $z2    = mysql_fetch_array($tampno);
            $SUM2 = $z2['SUM2'];

            if($CountNo == $_SESSION['jumlahtersier'])
            { 
            	mysql_query("INSERT INTO `irigasi`.`blangko07`(`id_nota`,
														   `kode_nota`,
														   `nama_personil`,
														   `nama_irigasi`,
														   `kode_irigasi`,
														   `jumlah_tersier`,
														   `total_wilayah`,
														   `nama_ranting`,
														   `nama_kepala`,
														   `nip`,
														   `kabupaten`,
														   `jabatan`,
														   `tgl_blangko07O`,
														   `tgl_ket`,
														   `bln_blangko07O`,
														   `bln_ket`,
														   `tahun_blangko07O`,
														   `no`,
														   `nmbangunkontrol`,
														   `luassawahIrigasi`,
														   `debitRata`,
														   `debitAkhirperiode`,
														   `usulanluasTanam`,
														   `kebutuhanairdiTersier`,
														   `kebutuhanLain`,
														   `qhilang`,
														   `qsuplesi`,
														   `kebairdibangbagi`,
														   `debitDiberikan`,
														   `kditetapkan`) 
												   VALUES ('$_POST[id_nota]',
												 		   '$_POST[kode_nota]',
												   	       '$_SESSION[namalengkap]',
														   '$_SESSION[namairigasi]',
														   '$_SESSION[kodeirigasi]',
														   '$_SESSION[jumlahtersier]',
														   '$_SESSION[totalwilayah]',
														   '$_SESSION[namaranting]',
														   '$_SESSION[kepalaranting]',
														   '$_SESSION[NIP]',
														   '$_SESSION[kab]',
														   '$_SESSION[bagianpelaksana]',
												   	       '$_POST[tgl_blangko05O]',
												 		   '$_POST[ket_tgl]',
												 		   '$_POST[bln_blangko05O]',
												 		   '$_POST[ket_bln]',
												 		   '$_POST[ket_thn]',
												  		   '$_POST[nomer]'+1,
												 		   'Jumlah',
												 		   '$z[SUM]',
												   	       NULL,
												   	       NULL,
												   	       '$z[SUM]',
												   	       '$z2[SUM2]',
												   	       NULL,
												   	       '20',
												   	       NULL,
												   	       NULL,
												   	       NULL,
												   	       NULL)");
            }
            else
            {

            }
				
				
		}
		else
		{
			
			header('location:../../media.php?modul=blangko5&kode_nota='.$_POST[kode_nota]);
		}
	}
	else
	{
		header('location:../../media.php?modul=blangko5&kode_nota='.$_POST[kode_nota]);
	}
	header('location:../../media.php?modul=blangko5&kode_nota='.$_POST[kode_nota]);
}
}
?>
