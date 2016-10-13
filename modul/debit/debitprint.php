<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_debit/aksi_debit.php";
switch($_GET[act]){
  // Tampil Tag
  default:
   $edit=mysql_query("SELECT * FROM blangko08 WHERE id_nota='$_GET[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
   $r=mysql_fetch_array($edit);
   if ($_SESSION[leveluser]=='debit'){
        echo "
       
        <center>
  <table width= 95%  border=0 style=font-family:'Times New Roman', Times, serif>
  		<tr>
			<td width=20%></td>
   		 	<td colspan=7 align=center><b font-size:14px>PENCATATAN DEBIT BANGUNGN PENGAMBILAN / <br>
   		  PENCATATAN DEBIT SUNGAI  </b></td>
			<td width=19% colspan=2><strong>
			  <table border=1 bordercolor= #000000  align=right style= text-align:center;font-size:14px style=font-family:'Times New Roman', Times, serif><tr><td width= 100  >Blangko 08 - O</td>
		  </tr></table></strong></td>
  </tr>
  <tr>
  <td colspan=10 height=18>
  </td>
  </tr>
  		
  		 <tr>
		    	 	<td width=20% height= 18>Sugai</td>
		     	 	<td width= 1%  align=right>:</td>
		    	 	<td colspan=2>$_SESSION[limpas]</td>
		    	 	<td colspan=3>Kabupaten</td>
		    	 	<td width= 1%  align=right>:</td>
		      	 	<td colspan=2>$_SESSION[kab]</td>
  		 </tr>
  	   	 <tr>
    	 			<td height= 18>Bendung</td>
  		 			<td align=right>:</td>
    	 			<td colspan=2>$_SESSION[namairigasi]</td>
   	     			<td colspan=3>Ranting/Pengamat</td>
					<td align=right>:</td>
     	 			<td colspan=2>$_SESSION[namaranting]</td>
  	 	 </tr>
  	 	 <tr>
    	 			<td height= 18>Daerah Irigasi </td>
  		 			<td align=right>:</td>
    	 			<td colspan=2>$_SESSION[namairigasi]</td>
    	 			<td colspan=3>Bag. Pelaks. Kegiatan </td>
  		 			<td align=right>:</td>
    	 			<td colspan=2>$_SESSION[namajabatan]</td>
  		 </tr>
	     <tr>
    	 			<td height= 18>Total Luas Sawah Irigasi </td>
  		 			<td align=right>:</td>
    	 			<td width=10% >$_SESSION[totalwilayah] &nbsp;&nbsp;&nbsp;&nbsp;ha </td>
  	 	 			<td width= 32%  align=right>Periode Pengambilan Air Tanggal : </td>
					<td align=left colspan=2 width=8%>$r[tgl_ket]</td>
  	 	 			<td colspan=3> &nbsp;Bln : $r[bln_ket]  &nbsp;&nbsp;&nbsp;&nbsp;$r[tahun_blangko08O]</td>
					
    	 </tr>
    	 <tr>
    	 <td colspan=10 height=5></td>
    	 </tr>
</table>
<table width=95% border=1 align=center bordercolor=#000 style=font-family:'Times New Roman', Times, serif>
  		<tr>
    	 	<td width=70 rowspan=3><div align=center>Tanggal</div></td>
    	 	<td colspan=2 rowspan=2><div align=center>Debit Limpas Bendung </div></td>
   
	     	<td height=24 colspan=4><div align=center>Debit Pintu Masuk Pengambilan </div></td>
    
    	 	<td rowspan=3 width=11%><div align=center>Debit Sungai (I/det) </div></td>
        <td width='11%' rowspan=3><div align=center>Debit Sungai<br>Rata-Rata 5<br>harian (I/det)</div></td>
 	 	</tr>
  		<tr>
    
  	     	<td colspan=2><div align=center>Kanan</div></td>
    
    
    
  	     	<td colspan=2><div align=center>Kiri</div></td>
  		</tr>
  		<tr>
    
   		 	<td width=119><div align=center>H (cm) </div></td>
    		<td width=119><div align=center>Q (I/det) </div></td>
    	 	<td width=119><div align=center>H (cm) </div></td>
    	 	<td width=119><div align=center>Q (I/det) </div></td>
    	 	<td width=119><div align=center>H (cm) </div></td>
    	 	<td width=119><div align=center>Q (I/det)</div></td>
  		 </tr>
       <tr>
       <td align=center>1</td>
       <td align=center>2</td>
       <td align=center>3</td>
       <td align=center>4</td>
       <td align=center>5</td>
       <td align=center>6</td>
       <td align=center>7</td>
       <td align=center>8</td>
       <td align=center>9</td>
       </tr>
       <tr>
       <td colspan=9></td>
       </tr>";

        $nilairata1 = mysql_query("SELECT ROUND(AVG(`totalDebit`)) AS Nilairatarata1 FROM blangko08 WHERE id_nota = '$r[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]' AND `no_rata` ='1'");
        $r1    = mysql_fetch_array($nilairata1);

        $nilairata2 = mysql_query("SELECT ROUND(AVG(`totalDebit`)) AS Nilairatarata2 FROM blangko08 WHERE id_nota = '$r[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]' AND `no_rata` ='2'");
        $r2    = mysql_fetch_array($nilairata2);

        $nilairata3 = mysql_query("SELECT ROUND(AVG(`totalDebit`)) AS Nilairatarata3 FROM blangko08 WHERE id_nota = '$r[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]' AND `no_rata` ='3'");
        $r3    = mysql_fetch_array($nilairata3);

        /*$nilairataseluruh = mysql_query("SELECT ROUND(AVG(`totalDebit`)) AS Nilairatarataseluruh FROM blangko08 WHERE id_nota = '$r[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
        $r0    = mysql_fetch_array($nilairataseluruh);*/
        $r0[Nilairatarataseluruh] = ROUND(($r1[Nilairatarata1] + $r2[Nilairatarata2] + $r3[Nilairatarata3])/3);


     

        $tampilhela=mysql_query("SELECT `no`,`no_rata`,`limpasH`,`limpasQ`,`irigasiKNH`,`irigasiKNQ`,`irigasiKRH`,`irigasiKRQ`,`totalDebit`
      	                     FROM `blangko08`
      	                     WHERE 
      	                     id_nota = '$r[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'
               	             ORDER BY no ASC");
       
     	while($t=mysql_fetch_array($tampilhela)){
    	
   		 echo "<tr>
             <td align=center height=24>$t[no]</td>
             <td align=center>$t[limpasH]</td>
             <td align=center>$t[limpasQ]</td>
             <td align=center>$t[irigasiKNH]</td>
             <td align=center>$t[irigasiKNQ]</td>
             <td align=center>$t[irigasiKRH]</td>
             <td align=center>$t[irigasiKRQ]</td>
             <td align=center>$t[totalDebit]</td>
             ";
             if($r['jumlahhari']==15)
             {
             	if(($t['no']== 20)OR($t['no']== 5)){
             	echo"<td align=center>$r1[Nilairatarata1]</td>";}
            	else if(($t['no']== 25)OR($t['no']== 10))
             	{
             		echo"<td align=center>$r2[Nilairatarata2]</td>";
             	}
             	else if(($t['no']== 30)OR($t['no']== 15))
             	{
             		echo"<td align=center>$r3[Nilairatarata3]</td>";
             	}
             	else
             	{
             		echo"<td align=center></td>";
             	}
             }
             else if($r['jumlahhari']==16)
             {
             	if($t['no']== 20){
             	echo"<td align=center>$r1[Nilairatarata1]</td>";}
            	else if($t['no']== 25)
             	{
             		echo"<td align=center>$r2[Nilairatarata2]</td>";
             	}
             	else if($t['no']== 31)
             	{
             		echo"<td align=center>$r3[Nilairatarata3]</td>";
             	}
             	else
             	{
             		echo"<td align=center></td>";
             	}
             }
             else if($r['jumlahhari']==14)
             {
             	if($t['no']== 20){
             	echo"<td align=center>$r1[Nilairatarata1]</td>";}
            	else if($t['no']== 25)
             	{
             		echo"<td align=center>$r2[Nilairatarata2]</td>";
             	}
             	else if($t['no']== 29)
             	{
             		echo"<td align=center>$r3[Nilairatarata3]</td>";
             	}
             	else
             	{
             		echo"<td align=center></td>";
             	}
             }
             else if($r['jumlahhari']==13)
             {
             	if($t['no']== 20){
             	echo"<td align=center>$r1[Nilairatarata1]</td>";}
            	else if($t['no']== 25)
             	{
             		echo"<td align=center>$r2[Nilairatarata2]</td>";
             	}
             	else if($t['no']== 28)
             	{
             		echo"<td align=center>$r3[Nilairatarata3]</td>";
             	}
             	else
             	{
             		echo"<td align=center></td>";
             	}
             }

          echo"</tr>
          ";
      	
  		}
  		echo "<tr>
             <td align=center height=24 colspan=8>Debit Sungai Rata-rata Setengah Bulanan (I/det)</td>
             <td align=center>$r0[Nilairatarataseluruh]</td>
             </tr>
             <tr>
             <td colspan = 9></td>
             </tr></table>
      <table width=95% border=0 style=font-family:'Times New Roman', Times, serif>
  <tr>
    <td colspan=2>&nbsp;</td>
    <td width=5%>&nbsp;</td>
    <td width=33%>&nbsp;</td>
    <td width=33%>&nbsp;</td>
  </tr>
  <tr>
    <td colspan=2><b><i>Penjelasan :</i></b></td><td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align=right>&nbsp;&nbsp;&nbsp;$r[bln_ket]&nbsp;&nbsp;&nbsp;$r[tahun_blangko08O]</td>
  </tr>
  <tr>
    <td width=2% valign=top height=25>1.</td>
    <td width=27% valign=top>Pencatatan debit dilakukan tiap pukul 08.00</td>
    <td>&nbsp;</td>
    <td rowspan=2 valign=top>Ranting / Pengamat<br />
	$_SESSION[namaranting]<br />
	Tanda tangan : <br /><br />
	<br /><br />



		Nama : $_SESSION[kepalaranting]<br />
		NIP : $_SESSION[NIP]</td>
    <td rowspan=2 valign=top>Petugas Operasi Bendung<br />
$_SESSION[namairigasi]<br />
Tanda tangan : <br />
<br />
<br />
<br />
Nama : $_SESSION[namalengkap]<br />
NIP : </td>
  </tr>
  <tr>
    <td valign=top>2.</td>
    <td valign=top>Perhitungan kolom 8 dan 9 oleh Pembantu Pelaksana OP</td>
   
   
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan=5><em>Laporan Setengah Bulanan : Mantri/Juru ---&gt; Ranting/Pengamat<br />
  Mantri/Juru ---> Kasi Irigasi Wilayah Sungai<br />
  Mantri/Juru ---> Kasi OP Prov.</em></td>
    
  </tr>
</table>

</center>";

	}
	else{}

    break;
  
 
}
}
?>
