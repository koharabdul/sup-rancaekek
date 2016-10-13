<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']))
{
    echo "Untuk mengakses modul, Anda harus login";
}
else{
$aksi="modul/blangko49/aksi_blangko5.php";
switch($_GET[act]){



  default:
  		if($_GET[kode_nota]!='')
  		{
  			$datablangko4 = mysql_query("SELECT tgl_blangko04O,tgl_ket,bln_blangko04O,bln_ket,tahun_blangko04O,COUNT(id_nota)AS NOTA
  											FROM blangko04 
  											WHERE kode_nota = '$_GET[kode_nota]'
  											AND nama_irigasi = '$_SESSION[namairigasi]'
  											AND nama_personil = '$_SESSION[namalengkap]'");
		    $n = mysql_fetch_array($datablangko4);
		    $nota = $n[NOTA];//inti pengambilan
  			if($nota==0)
  			{
  				header('location:media.php?modul=blangko5&act=tampilerror');
  			}
  			else{
  				$tdatablangko4 = mysql_query("SELECT *
  											FROM blangko04 
  											WHERE kode_nota = '$_GET[kode_nota]'
  											AND nama_irigasi = '$_SESSION[namairigasi]'
  											AND nama_personil = '$_SESSION[namalengkap]'");
								    $r = mysql_fetch_array($tdatablangko4);

				$InputPlus = mysql_query("SELECT MAX(`no`)+1 
											AS inputplus 
											FROM blangko05 
											WHERE nama_irigasi = '$_SESSION[namairigasi]' 
											AND kode_nota = '$r[kode_nota]'");
                $t   = mysql_fetch_array($InputPlus);
                $inputplus = $t[inputplus];

                if($inputplus==0)
                { $t[inputplus]=1;}
                else
                {
                  
                }
								   
  			}

  		}
  		else
  		{
  			 header('location:media.php?modul=blangko5&act=tampilerror');
  		}
         
           echo" 
                <div class='row'>
                  <div class='col-xs-12'>
                    <div class='box box-primary'>
                      <div class='box-body'>
                       <form name=flatihan1 method=POST  action='$aksi?modul=blangko5&act=input'>
                       <div class='col-md-12'>     
			             <table border=0 width='100%'>
			                        <tr>
			                          <td colspan=12 align=center><b>RENCANA KEBUTUHAN AIR DI PINTU PENGAMBILAN</b></td>
			                         </tr>
			                         <tr>
			                          <td colspan=9></td>
			                          <td colspan=3><table border=1 bordercolor=#aaa align=right><tr><td><b>Blangko 05 - O </b></tr></td></table></td>
			                         </tr>
			                    </table>
			                </div><!-- /.col -->
			                <div class='col-md-12'>
			                  <table  border='0'>
			                    <tr>
			                      <td colspan='3' style='width:15px;'>Daerah Irigasi 
			                          </td>
			                      <td width='1%'>:</td>
			                      <td colspan='3'><input name=limpas type = text class='form-control4'  style=margin:inherit value='$r[nama_irigasi]' readonly></td>
			                      
			                    </tr>
			                    <tr>
			                      <td colspan='3'>Nomer Kode DI </td>
			                      <td>:</td>
			                      <td colspan='3'>
			                      <input name=id_nota type = hidden class='form-control4'  style=margin:inherit value='$r[id_nota]' readonly/>
			                      <input name=kode_nota type = hidden class='form-control4'  style=margin:inherit value='$r[kode_nota]' readonly/>
			                      <input name=tgl_blangko05O type = hidden class='form-control4'  style=margin:inherit value='$r[tgl_blangko04O]' readonly/>
			                      <input name=bln_blangko05O type = hidden class='form-control4'  style=margin:inherit value='$r[bln_blangko04O]' readonly/>
			                      <input name=nomer type =hidden class='form-control4'  style=margin:inherit value='$t[inputplus]' readonly/>
			                      <input name=jumlahhari type ='hidden' class='form-control4'  style=margin:inherit value='$r[jumlahhari]' readonly/>
			                      <input name=irigasi type = text class='form-control4'  style=margin:inherit value='$r[kode_irigasi]' readonly/></td>
			                      
			                    </tr>
			                    <tr>
			                      <td colspan='3'>Total Luas Irigasi DI </td>
			                      <td>:</td>
			                      <td colspan='3'><input name='h' type = text class='form-control4'  style=margin:inherit value='$r[total_wilayah]' readonly/></td>
			                     
			                    </tr>
			                    <tr>
			                      <td colspan='3'>Kabupaten</td>
			                      <td>:</td>
			                      <td colspan='3'><input name='kabupaten' type = text class='form-control4'  style=margin:inherit value='$r[kabupaten]' readonly/></td>
			                      
			                    </tr>
			                    <tr>
			                      <td colspan='3'>Bagian Pelaks. Kegiatan </td>
			                      <td>:</td>
			                      <td colspan='3'><input name=limpas type = text class='form-control4'  style=margin:inherit value='$r[jabatan]' readonly></td>
			                      
			                    </tr>
			                  </table>
			                </div><!-- /.col -->

			               
			                   
			                <div class='col-md-7'>
			                    <table width='100%' border='0'>
			                     <tr>
			                      <td style='width:90px;'>Masa Tanam </td>
			                      <td style='width:5px;'>:</td>
			                      <td style='width:55px;'><input type=text name='masatanam' class='form-control7' style='width:55px;' value='$r[masatanam]' readonly></td>
			                      <td align='center' style='width:40px;'>Bulan</td>
			                      <td style='width:90px;' ><input type=text name='blnmasatanamke' class='form-control7' style='width:90px;' value='$r[bulanMasatanamke]' readonly></td>
			                      <td style='width:65px;' ><input type=text name='thnmasatanamke' class='form-control7' style='width:65px;' value='$r[tahunMasatanamke]' readonly></td>
			                        <td style='width:70px;' align='center'>s/d bulan</td>
			                        <td style='width:90px;'><input type=text name='sampaibulan' class='form-control7' style='width:90px;' value='$r[sampaiBulan]' readonly></td>
			                              <td style='width:60px;' ><input type=text name='sampaitahun' class='form-control7' style='width:60px;' value='$r[sampaiTahun]' readonly></td>
			                      </tr>
			                      </table>
			                </div><!-- /.col-->
			             
			                <div class='col-md-5'>
			                  <table border='0'>
			                    
			                    <tr>
			                      <td colspan='2' style='width:185px;'>Periode Pemberian Air Tgl = </td>
			                      <td style='width:3px;'></td>
			                      <td style='width:70px;'><input name=ket_tgl type = text class='form-control7'  style=margin:inherit value='$r[tgl_ket]' readonly/></td>
			                      <td style='width:90px;'><input name=ket_bln type = text class='form-control7'  style=margin:inherit value='$r[bln_ket]'readonly/></td>
			                      <td style='width:60px;'><input name=ket_thn type = text class='form-control7'  style=margin:inherit value='$r[tahun_blangko04O]'readonly/></td>
			                    </tr>
			                  </table>
			                </div><!-- /.col-->
			               

			               

			                 <div class='col-md-12'>
			                 <div class='scroll-pane1 ui-widget1 ui-widget-header1 ui-corner-all1'>
                             <div class='scroll-content1'>
			                 <table class='tableaz table-striped' border='1' style='border:1px solid rgba(0, 166, 90, 0.38);'>
								  <tr style='border:1px solid rgba(0, 166, 90, 0.38);'>
								    <td rowspan='5' align='center' width='30px' style='border:1px solid rgba(0, 166, 90, 0.38);'>No.</td>
								    <td rowspan='5' align='center' width='220px' style='border:1px solid rgba(0, 166, 90, 0.38);'>Uraian/Bab</td>
								    <td colspan='2' rowspan='4' align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>Satuan Keb. Air<br />di Sawah (I/dt/ha)</td>";
								    $tempo = mysql_query("SELECT COUNT(`no`) AS isi FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota ='$_GET[kode_nota]'");
			                        $p    = mysql_fetch_array($tempo);
			                        $isi = $p[isi];  

			                        if(($isi != $_SESSION[jumlahtersier])&&($isi <= $_SESSION[jumlahtersier]))
			                        {echo"
								    	<td colspan='2' align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>Manti/Juru</td>";
									}
									else
									{}
								    $tampil=mysql_query("SELECT * FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota = '$_GET[kode_nota]' ORDER BY no ASC");
								    while($r=mysql_fetch_array($tampil))
								    {echo"
										<td colspan='2' align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>Manti/Juru</td>";
								    }echo"
								  </tr>
								  <tr style='border:1px solid rgba(0, 166, 90, 0.38);'>";
								    $tempo = mysql_query("SELECT COUNT(`no`) AS isi FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota ='$_GET[kode_nota]'");
			                        $p    = mysql_fetch_array($tempo);
			                        $isi = $p[isi];  

			                        if(($isi != $_SESSION[jumlahtersier])&&($isi <= $_SESSION[jumlahtersier]))
			                        {echo"
								    	<td colspan='2' style='border:1px solid rgba(0, 166, 90, 0.38); padding:0px 0px;'><input name='nama_ptkTersier' type ='text' class='form-control8' required></td>";
								    }
								    else
									{}
								    $tampil=mysql_query("SELECT * FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota = '$_GET[kode_nota]' ORDER BY no ASC");
								    while($r=mysql_fetch_array($tampil))
								    {echo"
										<td colspan='2' style='border:1px solid rgba(0, 166, 90, 0.38); padding:0px 0px;' align='center'>$r[nama_ptkTersier]</td>";
									}echo"
								  </tr>
								  <tr style='border:1px solid rgba(0, 166, 90, 0.38);'>";
								    $tempo = mysql_query("SELECT COUNT(`no`) AS isi FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota ='$_GET[kode_nota]'");
			                        $p    = mysql_fetch_array($tempo);
			                        $isi = $p[isi];  

			                        if(($isi != $_SESSION[jumlahtersier])&&($isi <= $_SESSION[jumlahtersier]))
			                        {echo"
									    <td align='center' rowspan='3' width='80px' style='border:1px solid rgba(0, 166, 90, 0.38);'>Usulan Luas<br />Tanam<br />(ha)</td>
									    <td align='center' rowspan='3' width='80px' style='border:1px solid rgba(0, 166, 90, 0.38);'>Kebutuhan<br />Air di Sawah<br />(I/det)</td>";
								    }
								    else
									{}
								    $tampil=mysql_query("SELECT * FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota = '$_GET[kode_nota]' ORDER BY no ASC");
								    while($r=mysql_fetch_array($tampil))
								    {echo"
									    <td align='center' rowspan='3' width='80px' style='border:1px solid rgba(0, 166, 90, 0.38);'>Usulan Luas<br />Tanam<br />(ha)</td>
									    <td align='center' rowspan='3' width='80px' style='border:1px solid rgba(0, 166, 90, 0.38);'>Kebutuhan<br />Air di Sawah<br />(I/det)</td>";
									}echo"
								  </tr>
								  <tr style='border:1px solid rgba(0, 166, 90, 0.38);'>  </tr>
								  <tr style='border:1px solid rgba(0, 166, 90, 0.38);'>
								    <td align='center' width='60px' style='height:30px;' style='border:1px solid rgba(0, 166, 90, 0.38);'>MT1</td>
								    <td align='center' width='60px' style='border:1px solid rgba(0, 166, 90, 0.38);'>MT2/MT3</td>
								  </tr>
								  <tr style='border:1px solid rgba(0, 166, 90, 0.38);'>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>1</td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>2</td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>3.1</td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>3.2</td>";
								    $tempo = mysql_query("SELECT COUNT(`no`) AS isi FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota ='$_GET[kode_nota]'");
			                        $p    = mysql_fetch_array($tempo);
			                        $isi = $p[isi];  

			                        if(($isi != $_SESSION[jumlahtersier])&&($isi <= $_SESSION[jumlahtersier]))
			                        {echo"
									    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>4</td>
									    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>5=(3.1x4)</td>";
									}
									else
									{}
									$n=5;
									$no=4;
								    $tampil=mysql_query("SELECT * FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota = '$_GET[kode_nota]' ORDER BY no ASC");
								    while($r=mysql_fetch_array($tampil))
								    {echo"
									    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>$no</td>
									    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>$n=(3.1x$no)</td>";
									$no= $no + 1;
									$n = $n + 1;
									$no++;
									$n++;
									}echo"
								  </tr>
								  <tr style='border:1px solid rgba(0, 166, 90, 0.38);'>
								    <td align='center' valign='bottom' style='height:30px;' style='border:1px solid rgba(0, 166, 90, 0.38);'>1.</td>
								    <td valign='bottom' style='border:1px solid rgba(0, 166, 90, 0.38);'>Padi Rendeng/Padi Gadu Izin </td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>";
								    $tempo = mysql_query("SELECT COUNT(`no`) AS isi FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota ='$_GET[kode_nota]'");
			                        $p    = mysql_fetch_array($tempo);
			                        $isi = $p[isi];  

			                        if(($isi != $_SESSION[jumlahtersier])&&($isi <= $_SESSION[jumlahtersier]))
			                        {echo"
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>";
									}
									else
									{}
								    $tampil=mysql_query("SELECT * FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota = '$_GET[kode_nota]' ORDER BY no ASC");
								    while($r=mysql_fetch_array($tampil))
								    {echo"
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>";
									}echo"
								  </tr>
								  <tr style='border:1px solid rgba(0, 166, 90, 0.38);'>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>a). Pengelolahan tanah + Persemaian </td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>1.250</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>";
								    $tempo = mysql_query("SELECT COUNT(`no`) AS isi FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota ='$_GET[kode_nota]'");
			                        $p    = mysql_fetch_array($tempo);
			                        $isi = $p[isi];  

			                        if(($isi != $_SESSION[jumlahtersier])&&($isi <= $_SESSION[jumlahtersier]))
			                        {echo"
									    <td style='padding:0px 0px;border:1px solid rgba(0, 166, 90, 0.38);margin:inherit;' ><input name='padiA' type ='text' class='form-control8' style='width:84px;' onchange=procedure()></td>
									    <td style='padding:0px 0px;border:1px solid rgba(0, 166, 90, 0.38);' ><input type ='text' name='hpadiA' class='form-control8' style='width:80px;' readonly></td>";
								    }
								    else
								    {}
								    $tampil=mysql_query("SELECT * FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota = '$_GET[kode_nota]' ORDER BY no ASC");
								    while($r=mysql_fetch_array($tampil))
								    {echo"
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>$r[padiA]</td>
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>$r[kebutuhanPadiA]</td>";
									}echo"
								  </tr>
								  <tr style='border:1px solid rgba(0, 166, 90, 0.38);'>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>b). Pertumbuhan / Pemasakan </td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>0.725</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>";
								    $tempo = mysql_query("SELECT COUNT(`no`) AS isi FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota ='$_GET[kode_nota]'");
			                        $p    = mysql_fetch_array($tempo);
			                        $isi = $p[isi];  

			                        if(($isi != $_SESSION[jumlahtersier])&&($isi <= $_SESSION[jumlahtersier]))
			                        {echo"
									    <td style='padding:0px 0px; border:1px solid rgba(0, 166, 90, 0.38);' ><input name='padiB' type ='text' class='form-control8' style='width:84px;background-color:#F9F9F9;' onchange=procedure2()></td>
									    <td style='padding:0px 0px; border:1px solid rgba(0, 166, 90, 0.38);' ><input name='hpadiB' type ='text' class='form-control8' style='width:80px;background-color:#F9F9F9;' readonly></td>";
								    }
								    else
								    {}
								    $tampil=mysql_query("SELECT * FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota = '$_GET[kode_nota]' ORDER BY no ASC");
								    while($r=mysql_fetch_array($tampil))
								    {echo"
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>$r[padiB]</td>
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>$r[kebutuhanPadiB]</td>";
									}echo"
								  </tr>
								  <tr style='border:1px solid rgba(0, 166, 90, 0.38);'>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>c). Panen </td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>0.30</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>";
								    $tempo = mysql_query("SELECT COUNT(`no`) AS isi FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota ='$_GET[kode_nota]'");
			                        $p    = mysql_fetch_array($tempo);
			                        $isi = $p[isi];  

			                        if(($isi != $_SESSION[jumlahtersier])&&($isi <= $_SESSION[jumlahtersier]))
			                        {echo"
									    <td style='padding:0px 0px;border:1px solid rgba(0, 166, 90, 0.38);' ><input name='padiC' type ='number' class='form-control8' style='width:84px;' onchange=procedure3()></td>
									    <td style='padding:0px 0px;border:1px solid rgba(0, 166, 90, 0.38);' ><input name='hpadiC' type ='text' class='form-control8' style='width:80px;' readonly></td>";
								    }
								    else
								    {}
								    $tampil=mysql_query("SELECT * FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota = '$_GET[kode_nota]' ORDER BY no ASC");
								    while($r=mysql_fetch_array($tampil))
								    {echo"
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>$r[padiC]</td>
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>$r[kebutuhanPadiC]</td>";
									}echo"
								  </tr>
								  <tr style='border:1px solid rgba(0, 166, 90, 0.38);'>
								    <td align='center' valign='bottom' style='height:30px;' style='border:1px solid rgba(0, 166, 90, 0.38);'>2.</td>
								    <td valign='bottom' style='border:1px solid rgba(0, 166, 90, 0.38);'>Tebu</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'></td>";
								    $tempo = mysql_query("SELECT COUNT(`no`) AS isi FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota ='$_GET[kode_nota]'");
			                        $p    = mysql_fetch_array($tempo);
			                        $isi = $p[isi];  

			                        if(($isi != $_SESSION[jumlahtersier])&&($isi <= $_SESSION[jumlahtersier]))
			                        {echo"
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);'><input name='jpadi' type ='text' class='form-control8' style='width:0px;' readonly></td>";
									}
									else
									{}
								    $tampil=mysql_query("SELECT * FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota = '$_GET[kode_nota]' ORDER BY no ASC");
								    while($r=mysql_fetch_array($tampil))
								    {echo"
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>";
									}echo"
								  </tr>
								  <tr style='border:1px solid rgba(0, 166, 90, 0.38);'>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>a). Pengolahan tanah + Persemaian </td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>0.850</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>";
								    $tempo = mysql_query("SELECT COUNT(`no`) AS isi FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota ='$_GET[kode_nota]'");
			                        $p    = mysql_fetch_array($tempo);
			                        $isi = $p[isi];  

			                        if(($isi != $_SESSION[jumlahtersier])&&($isi <= $_SESSION[jumlahtersier]))
			                        {echo"
									    <td style='padding:0px 0px;border:1px solid rgba(0, 166, 90, 0.38);'><input name='tebuA' type ='number' class='form-control8' style='width:84px;' onchange=procedure4()></td>
									    <td style='padding:0px 0px;border:1px solid rgba(0, 166, 90, 0.38);'><input name='htebuA' type ='text' class='form-control8' style='width:80px;' readonly></td>";
								    }
								    else
								    {}
								    $tampil=mysql_query("SELECT * FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota = '$_GET[kode_nota]' ORDER BY no ASC");
								    while($r=mysql_fetch_array($tampil))
								    {echo"
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>$r[tebuA]</td>
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>$r[kebutuhanTebuA]</td>";
									}echo"
								  </tr>
								  <tr style='border:1px solid rgba(0, 166, 90, 0.38);'>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>b). Tebu Muda (MT.1) </td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>0.360</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>";
								    $tempo = mysql_query("SELECT COUNT(`no`) AS isi FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota ='$_GET[kode_nota]'");
			                        $p    = mysql_fetch_array($tempo);
			                        $isi = $p[isi];  

			                        if(($isi != $_SESSION[jumlahtersier])&&($isi <= $_SESSION[jumlahtersier]))
			                        {echo"
									    <td style='padding:0px 0px;border:1px solid rgba(0, 166, 90, 0.38);'><input name='tebuB' type ='number' class='form-control8' style='width:84px;background-color:#F9F9F9;' onchange=procedure5()></td>
									    <td style='padding:0px 0px;border:1px solid rgba(0, 166, 90, 0.38);'><input name='htebuB' type ='text' class='form-control8' style='width:80px;background-color:#F9F9F9;' readonly></td>";
								    }
								    else
								    {}
								    $tampil=mysql_query("SELECT * FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota = '$_GET[kode_nota]' ORDER BY no ASC");
								    while($r=mysql_fetch_array($tampil))
								    {echo"
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>$r[tebuB]</td>
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>$r[kebutuhanTebuB]</td>";
									}echo"
								  </tr>
								  <tr style='border:1px solid rgba(0, 166, 90, 0.38);'>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>c). Tebu Tua (MT.2) </td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>0.125</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>";
								    $tempo = mysql_query("SELECT COUNT(`no`) AS isi FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota ='$_GET[kode_nota]'");
			                        $p    = mysql_fetch_array($tempo);
			                        $isi = $p[isi];  

			                        if(($isi != $_SESSION[jumlahtersier])&&($isi <= $_SESSION[jumlahtersier]))
			                        {echo"
									    <td style='padding:0px 0px;border:1px solid rgba(0, 166, 90, 0.38);'><input name='tebuC' type ='number' class='form-control8' style='width:84px;' onchange=procedure6()></td>
									    <td style='padding:0px 0px;border:1px solid rgba(0, 166, 90, 0.38);'><input name='htebuC' type ='text' class='form-control8' style='width:80px;' readonly></td>";
								    }
								    else
								    {}
								    $tampil=mysql_query("SELECT * FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota = '$_GET[kode_nota]' ORDER BY no ASC");
								    while($r=mysql_fetch_array($tampil))
								    {echo"
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>$r[tebuC]</td>
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>$r[kebutuhanTebuC]</td>";
									}echo"
								  </tr>
								  <tr style='border:1px solid rgba(0, 166, 90, 0.38);'>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center' valign='bottom' style='height:30px;'>3.</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);' valign='bottom'>Palawija</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>";
								    $tempo = mysql_query("SELECT COUNT(`no`) AS isi FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota ='$_GET[kode_nota]'");
			                        $p    = mysql_fetch_array($tempo);
			                        $isi = $p[isi];  

			                        if(($isi != $_SESSION[jumlahtersier])&&($isi <= $_SESSION[jumlahtersier]))
			                        {echo"
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);'><input name='jtebu' type ='text' class='form-control8' style='width:0px;' readonly></td>";
									}
									else
									{}
								    $tampil=mysql_query("SELECT * FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota = '$_GET[kode_nota]' ORDER BY no ASC");
								    while($r=mysql_fetch_array($tampil))
								    {echo"
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>";
									}echo"
								  </tr>
								  <tr style='border:1px solid rgba(0, 166, 90, 0.38);'>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>a) Yang perlu banyak air </td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>0.30</td>";
								    $tempo = mysql_query("SELECT COUNT(`no`) AS isi FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota ='$_GET[kode_nota]'");
			                        $p    = mysql_fetch_array($tempo);
			                        $isi = $p[isi];  

			                        if(($isi != $_SESSION[jumlahtersier])&&($isi <= $_SESSION[jumlahtersier]))
			                        {echo"
									    <td style='padding:0px 0px;border:1px solid rgba(0, 166, 90, 0.38);'><input name='palawijaA' type ='number' class='form-control8' style='width:84px;' onchange=procedure7()></td>
									    <td style='padding:0px 0px;border:1px solid rgba(0, 166, 90, 0.38);'><input name='hpalawijaA' type ='text' class='form-control8' style='width:80px;' readonly></td>";
								    }
								    else
								    {}
								    $tampil=mysql_query("SELECT * FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota = '$_GET[kode_nota]' ORDER BY no ASC");
								    while($r=mysql_fetch_array($tampil))
								    {echo"
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>$r[palawijaA]</td>
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>$r[kebutuhanPalawijaA]</td>";
									}echo"
								  </tr>
								  <tr style='border:1px solid rgba(0, 166, 90, 0.38);'>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>b) Yang perlu sedikit air </td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>0.20</td>";
								    $tempo = mysql_query("SELECT COUNT(`no`) AS isi FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota ='$_GET[kode_nota]'");
			                        $p    = mysql_fetch_array($tempo);
			                        $isi = $p[isi];  

			                        if(($isi != $_SESSION[jumlahtersier])&&($isi <= $_SESSION[jumlahtersier]))
			                        {echo"
									    <td style='padding:0px 0px;border:1px solid rgba(0, 166, 90, 0.38);'><input name='palawijaB' type ='number' class='form-control8' style='width:84px;background-color:#F9F9F9;' onchange=procedure8()></td>
									    <td style='padding:0px 0px;border:1px solid rgba(0, 166, 90, 0.38);'><input name='hpalawijaB' type ='text' class='form-control8' style='width:80px;background-color:#F9F9F9;' readonly></td>";
								    }
								    else
								    {}
								    $tampil=mysql_query("SELECT * FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota = '$_GET[kode_nota]' ORDER BY no ASC");
								    while($r=mysql_fetch_array($tampil))
								    {echo"
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>$r[palawijaB]</td>
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>$r[kebutuhanPalawijaB]</td>";
									}echo"
								  </tr>
								  <tr style='border:1px solid rgba(0, 166, 90, 0.38);'>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>";
								    $tempo = mysql_query("SELECT COUNT(`no`) AS isi FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota ='$_GET[kode_nota]'");
			                        $p    = mysql_fetch_array($tempo);
			                        $isi = $p[isi];  

			                        if(($isi != $_SESSION[jumlahtersier])&&($isi <= $_SESSION[jumlahtersier]))
			                        {echo"
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);'><input name='jpalawija' type ='text' class='form-control8' style='width:0px;' readonly></td>";
									}
									else
									{}
								    $tampil=mysql_query("SELECT * FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota = '$_GET[kode_nota]' ORDER BY no ASC");
								    while($r=mysql_fetch_array($tampil))
								    {echo"
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>";
									}echo"
								  </tr>
								  <tr style='border:1px solid rgba(0, 166, 90, 0.38);'>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>4.</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>Gadu tanpa izin </td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>";
								    $tempo = mysql_query("SELECT COUNT(`no`) AS isi FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota ='$_GET[kode_nota]'");
			                        $p    = mysql_fetch_array($tempo);
			                        $isi = $p[isi];  

			                        if(($isi != $_SESSION[jumlahtersier])&&($isi <= $_SESSION[jumlahtersier]))
			                        {echo"
									    <td style='padding:0px 0px;border:1px solid rgba(0, 166, 90, 0.38);'><input name='gadutanpaIzin' type ='number' class='form-control8' style='width:84px;background-color:#F9F9F9;' onchange=procedure9()></td>
									    <td style='padding:0px 0px;border:1px solid rgba(0, 166, 90, 0.38);'><input name='hgadutanpaIzin' type ='text' class='form-control8' style='width:80px;background-color:#F9F9F9;' readonly></td>";
								    }
								    else
								    {}
								    $tampil=mysql_query("SELECT * FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota = '$_GET[kode_nota]' ORDER BY no ASC");
								    while($r=mysql_fetch_array($tampil))
								    {echo"
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>$r[gadutanpaIzin]</td>
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>$r[kgadutanpaIzin]</td>";
									}echo"
								  </tr>
								  <tr style='border:1px solid rgba(0, 166, 90, 0.38);'>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>";
								    $tempo = mysql_query("SELECT COUNT(`no`) AS isi FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota ='$_GET[kode_nota]'");
			                        $p    = mysql_fetch_array($tempo);
			                        $isi = $p[isi];  

			                        if(($isi != $_SESSION[jumlahtersier])&&($isi <= $_SESSION[jumlahtersier]))
			                        {echo"
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>";
									}
									else
									{}
								    $tampil=mysql_query("SELECT * FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota = '$_GET[kode_nota]' ORDER BY no ASC");
								    while($r=mysql_fetch_array($tampil))
								    {echo"
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>";
									}echo"
								  </tr>
								  <tr style='border:1px solid rgba(0, 166, 90, 0.38);'>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>5.</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>Lain-lain</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>";
								    $tempo = mysql_query("SELECT COUNT(`no`) AS isi FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota ='$_GET[kode_nota]'");
			                        $p    = mysql_fetch_array($tempo);
			                        $isi = $p[isi];  

			                        if(($isi != $_SESSION[jumlahtersier])&&($isi <= $_SESSION[jumlahtersier]))
			                        {echo"
									    <td style='padding:0px 0px;border:1px solid rgba(0, 166, 90, 0.38);'><input name='lain_lain' type ='number' class='form-control8' style='width:84px;background-color:#F9F9F9;' onchange=procedure10()></td>
									    <td style='padding:0px 0px;border:1px solid rgba(0, 166, 90, 0.38);'><input name='hlain_lain' type ='text' class='form-control8' style='width:80px;background-color:#F9F9F9;' readonly></td>";
								    }
								    else
								    {}
								    $tampil=mysql_query("SELECT * FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota = '$_GET[kode_nota]' ORDER BY no ASC");
								    while($r=mysql_fetch_array($tampil))
								    {echo"
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>$r[lain_lain]</td>
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>$r[klain_lain]</td>";
									}echo"
								  </tr>
								  <tr style='border:1px solid rgba(0, 166, 90, 0.38);'>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>";
								    $tempo = mysql_query("SELECT COUNT(`no`) AS isi FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota ='$_GET[kode_nota]'");
			                        $p    = mysql_fetch_array($tempo);
			                        $isi = $p[isi];  

			                        if(($isi != $_SESSION[jumlahtersier])&&($isi <= $_SESSION[jumlahtersier]))
			                        {echo"
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);'><input name='jgl' type ='text' class='form-control8' style='width:0px;' readonly></td>";
									}
									else
									{}
								    $tampil=mysql_query("SELECT * FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota = '$_GET[kode_nota]' ORDER BY no ASC");
								    while($r=mysql_fetch_array($tampil))
								    {echo"
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);'></td>";
									}echo"
								  </tr>
								  <tr style='border:1px solid rgba(0, 166, 90, 0.38);'>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>6.</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>Jumlah di Sawah (I/det) </td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>xxxxxxxx</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>xxxxxxxx</td>";
								    $tempo = mysql_query("SELECT COUNT(`no`) AS isi FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota ='$_GET[kode_nota]'");
			                        $p    = mysql_fetch_array($tempo);
			                        $isi = $p[isi];  

			                        if(($isi != $_SESSION[jumlahtersier])&&($isi <= $_SESSION[jumlahtersier]))
			                        {echo"
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>xxxxxxxx</td>
									    <td style='padding:0px 0px;border:1px solid rgba(0, 166, 90, 0.38);'><input name='jumlah' type ='text' class='form-control8' style='width:80px;background-color:#F9F9F9;' readonly></td>";
								    }
								    else
								    {}
								    $tampil=mysql_query("SELECT * FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota = '$_GET[kode_nota]' ORDER BY no ASC");
								    while($r=mysql_fetch_array($tampil))
								    {echo"
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>xxxxxxxx</td>
									    <td style='padding:0px 0px;border:1px solid rgba(0, 166, 90, 0.38);' align='center'>$r[jumlah]</td>";
									}echo"
								  </tr>
								  <tr style='border:1px solid rgba(0, 166, 90, 0.38);'>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>";
								    $tempo = mysql_query("SELECT COUNT(`no`) AS isi FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota ='$_GET[kode_nota]'");
			                        $p    = mysql_fetch_array($tempo);
			                        $isi = $p[isi];  

			                        if(($isi != $_SESSION[jumlahtersier])&&($isi <= $_SESSION[jumlahtersier]))
			                        {echo"
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>";
								    }
								    else
								    {}
								    $tampil=mysql_query("SELECT * FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota = '$_GET[kode_nota]' ORDER BY no ASC");
								    while($r=mysql_fetch_array($tampil))
								    {echo"
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>";
									}echo"
								  </tr>
								  <tr style='border:1px solid rgba(0, 166, 90, 0.38);'>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>7.</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>Faktor Tersier </td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>xxxxxxxx</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>xxxxxxxx</td>";
								    $tempo = mysql_query("SELECT COUNT(`no`) AS isi FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota ='$_GET[kode_nota]'");
			                        $p    = mysql_fetch_array($tempo);
			                        $isi = $p[isi];  

			                        if(($isi != $_SESSION[jumlahtersier])&&($isi <= $_SESSION[jumlahtersier]))
			                        {echo"
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>xxxxxxxx</td>
									    <td style='padding:0px 0px;border:1px solid rgba(0, 166, 90, 0.38);'><input name='faktorTersier' type ='text' class='form-control8' style='width:80px;background-color:#F9F9F9;' value='1.25' readonly></td>";
								    }
								    else
								    {}
								    $tampil=mysql_query("SELECT * FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota = '$_GET[kode_nota]' ORDER BY no ASC");
								    while($r=mysql_fetch_array($tampil))
								    {echo"
									   <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>xxxxxxxx</td>
								       <td style='padding:0px 0px;border:1px solid rgba(0, 166, 90, 0.38);' align='center'>$r[faktorTersier]</td>";
									}echo"
								  </tr>
								  <tr style='border:1px solid rgba(0, 166, 90, 0.38);'>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>";
								    $tempo = mysql_query("SELECT COUNT(`no`) AS isi FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota ='$_GET[kode_nota]'");
			                        $p    = mysql_fetch_array($tempo);
			                        $isi = $p[isi];  

			                        if(($isi != $_SESSION[jumlahtersier])&&($isi <= $_SESSION[jumlahtersier]))
			                        {echo"
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>";
									}
									else
									{}
								    $tampil=mysql_query("SELECT * FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota = '$_GET[kode_nota]' ORDER BY no ASC");
								    while($r=mysql_fetch_array($tampil))
								    {echo"
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>";
									}echo"
								  </tr>
								  <tr style='border:1px solid rgba(0, 166, 90, 0.38);'>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>8.</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>Kebutuhan air di pintu Tersier (I/det) </td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>xxxxxxxx</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>xxxxxxxx</td>";
								    $tempo = mysql_query("SELECT COUNT(`no`) AS isi FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota ='$_GET[kode_nota]'");
			                        $p    = mysql_fetch_array($tempo);
			                        $isi = $p[isi];  

			                        if(($isi != $_SESSION[jumlahtersier])&&($isi <= $_SESSION[jumlahtersier]))
			                        {echo"
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>xxxxxxxx</td>
									    <td style='padding:0px 0px;border:1px solid rgba(0, 166, 90, 0.38);'><input name='jumlahTotal' type ='text' class='form-control8' style='width:80px;background-color:#F9F9F9;' readonly></td>";
								    }
								    else
								    {}
								    $tampil=mysql_query("SELECT * FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota = '$_GET[kode_nota]' ORDER BY no ASC");
								    while($r=mysql_fetch_array($tampil))
								    {echo"
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>xxxxxxxx</td>
								        <td style='padding:0px 0px;border:1px solid rgba(0, 166, 90, 0.38);' align='center'>$r[kebutuhanAirTotal]</td>";
									}echo"
								  </tr>
								  <tr style='border:1px solid rgba(0, 166, 90, 0.38);'>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>";
								    $tempo = mysql_query("SELECT COUNT(`no`) AS isi FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota ='$_GET[kode_nota]'");
			                        $p    = mysql_fetch_array($tempo);
			                        $isi = $p[isi];  

			                        if(($isi != $_SESSION[jumlahtersier])&&($isi <= $_SESSION[jumlahtersier]))
			                        {echo"
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>";
									}
									else
									{}
								    $tampil=mysql_query("SELECT * FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota = '$_GET[kode_nota]' ORDER BY no ASC");
								    while($r=mysql_fetch_array($tampil))
								    {echo"
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								    	<td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>";
									}echo"
								  </tr>
								  <tr style='border:1px solid rgba(0, 166, 90, 0.38);'>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>9.</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>Kerusakan Tanaman (Banjir/Kering) </td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>xxxxxxxx</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>xxxxxxxx</td>";
								    $tempo = mysql_query("SELECT COUNT(`no`) AS isi FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota ='$_GET[kode_nota]'");
			                        $p    = mysql_fetch_array($tempo);
			                        $isi = $p[isi];  

			                        if(($isi != $_SESSION[jumlahtersier])&&($isi <= $_SESSION[jumlahtersier]))
			                        {echo"
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>xxxxxxxx</td>
									    <td style='padding:0px 0px;border:1px solid rgba(0, 166, 90, 0.38);'><input name='kerusakanTanaman' type ='number' class='form-control8' style='width:80px;background-color:#F9F9F9;'></td>";
								    }
								    else
								    {}
								    $tampil=mysql_query("SELECT * FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota = '$_GET[kode_nota]' ORDER BY no ASC");
								    while($r=mysql_fetch_array($tampil))
								    {echo"
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>xxxxxxxx</td>
								        <td style='padding:0px 0px;border:1px solid rgba(0, 166, 90, 0.38);' align='center'>$r[kerusakanTanaman]</td>";
									}echo"
								  </tr>
								  <tr style='border:1px solid rgba(0, 166, 90, 0.38);'>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>(dibuat setiap 15 hari) </td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>";
								    $tempo = mysql_query("SELECT COUNT(`no`) AS isi FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota ='$_GET[kode_nota]'");
			                        $p    = mysql_fetch_array($tempo);
			                        $isi = $p[isi];  

			                        if(($isi != $_SESSION[jumlahtersier])&&($isi <= $_SESSION[jumlahtersier]))
			                        {echo"
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>";
									}
									else
									{}
								    $tampil=mysql_query("SELECT * FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota = '$_GET[kode_nota]' ORDER BY no ASC");
								    while($r=mysql_fetch_array($tampil))
								    {echo"
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>";
									}echo"
								  </tr>
								  <tr style='border:1px solid rgba(0, 166, 90, 0.38);'>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38); height:35px;' align='center' rowspan='2' valign='middle'>10.</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);' rowspan='2' valign='middle'>Tanda Tangan Ketua IP3A/GP3A </td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center' rowspan='2' valign='middle'>xxxxxxxx</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center' rowspan='2' valign='middle'>xxxxxxxx</td>";
								    $tempo = mysql_query("SELECT COUNT(`no`) AS isi FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota ='$_GET[kode_nota]'");
			                        $p    = mysql_fetch_array($tempo);
			                        $isi = $p[isi];  

			                        if(($isi != $_SESSION[jumlahtersier])&&($isi <= $_SESSION[jumlahtersier]))
			                        {echo"
									    <td style='border:1px solid rgba(0, 166, 90, 0.38); padding:0px; 0px;' align='center' valign='bottom'><button type='reset' class='btn btn-warning' style='width:84px;'>Reset</button></td>
									    <td style='border:1px solid rgba(0, 166, 90, 0.38); padding:0px; 0px;' align='center' valign='bottom'><button type='submit' class='btn btn-success' style='width:80px;'>Simpan</button></td>";
								    }
								    else
								    {}
								    $tampil=mysql_query("SELECT * FROM blangko05 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota = '$_GET[kode_nota]' ORDER BY no ASC");
								    while($r=mysql_fetch_array($tampil))
								    {echo"
									    <td style='border:1px solid rgba(0, 166, 90, 0.38);' rowspan='2' colspan='2'>&nbsp;</td>";
									}echo"
								  </tr>
							 </table>
							 </div>
							 </div>
							
			                </div><!-- /.col-->
			                ";
			               //  $tempo = mysql_query("SELECT COUNT(`no`) AS isi FROM blangko05 
								    						// WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						// AND nama_personil = '$_SESSION[namalengkap]'
								    						// AND kode_nota ='$_GET[kode_nota]'");
			               //          $p    = mysql_fetch_array($tempo);
			               //          $isi = $p[isi];  
			               //  if($isi == $_SESSION[jumlahtersier])
			              	// {
			              		echo"
				              	<div class='col-md-12'>

				              	  <br><a href='?modul=blangko6&kode_nota=$_GET[kode_nota]' class='pull-right' target='_blank'>
				              	  <table border='0' style='background-color:#ff2; border-radius: 3px; height:30px;'>
				              	  <tr>
				              	  <td valign='middle' width='20px' align='center'><i class='glyphicon glyphicon-hand-right'></i></td>
				              	  <td align='center'><b>Blangko 06 - O</b></td>
				              	  </tr>
				              	  </table>
				              	  </a>
				              	</div><!-- /.col-->
				              	";
				            // }
				            // else
				            // {
				            // 	echo"
				            // 	<div class='col-md-12'>

				            //   	<br><br>
				            //   	</div><!-- /.col-->
				            //   	";
				            // }
				            echo"
                      </div><!-- /.box-body -->
                     </form> 
                    </div><!-- /.box -->
                  </div><!-- /.col -->
                </div><!-- /.row -->";
  break;


  case "tampilerror":

        echo"<div class='error-page'>
            <h2 class='headline text-yellow'> 404</h2>
            <div class='error-content'>
              <h3><i class='fa fa-warning text-yellow'></i> Oops! Page tidak ditemukan.</h3>
              <p>
                Kami tidak bisa menemukan page yang anda maksudkan.
                Selain itu, anda mungkin bisa<a href='?modul=suprancaekek'> kembali ke SUP Rancaekek</a> atau coba dengan pencarian dibawah.
              </p>
              <form class='search-form'>
                <div class='input-group'>
                  <input type='text' name='modul' class='form-control' placeholder='Search'>
                  <div class='input-group-btn'>
                    <button type='submit' class='btn btn-warning btn-flat'><i class='fa fa-search'></i></button>
                  </div>
                </div><!-- /.input-group -->
              </form>
            </div><!-- /.error-content -->
          </div><!-- /.error-page --> ";

      break;
}
}
?>
<script type="text/javascript">
	function procedure()
	{
		var padiA=parseInt(document.flatihan1.padiA.value);
		var hpadiB=parseFloat(document.flatihan1.hpadiB.value);
		var hpadiC=parseFloat(document.flatihan1.hpadiC.value);
		var	jtebu = parseFloat(document.flatihan1.jtebu.value);
		var jpalawija = parseFloat(document.flatihan1.jpalawija.value);
		var jgl = parseFloat(document.flatihan1.jgl.value);
		var faktorTersier = parseFloat(document.flatihan1.faktorTersier.value);
		var masatanam=(document.flatihan1.masatanam.value);
		if(isNaN(padiA))
		{
			document.flatihan1.hpadiA.value="";
			if(isNaN(hpadiC))
			{
				kaliA = hpadiB;
			}
			else if(isNaN(hpadiB))
			{
				kaliA = hpadiC;
			}
			else if((isNaN(hpadiB))&&(isNaN(hpadiC)))
			{
				kaliA = ""; 
			}
			else
			{
				kaliA = hpadiB + hpadiC;
			}
			document.flatihan1.jpadi.value=kaliA.toFixed(2);
			if((isNaN(jtebu))&&(isNaN(jpalawija))&&(isNaN(jgl))&&(isNaN(kaliA)))
			{
				tot = "";
			}
			else if((isNaN(jtebu))&&(isNaN(jpalawija))&&(isNaN(kaliA)))
			{
				tot = jgl;
			}
			else if((isNaN(jtebu))&&(isNaN(jgl))&&(isNaN(kaliA)))
			{
				tot = jpalawija;
			}
			else if((isNaN(jpalawija))&&(isNaN(jgl))&&(isNaN(kaliA)))
			{
				tot = jtebu;
			}
			else if((isNaN(jpalawija))&&(isNaN(jgl))&&(isNaN(jtebu)))
			{
				tot = kaliA;
			}
			else if((isNaN(kaliA))&&(isNaN(jtebu)))
			{
				tot = jpalawija + jgl;
			}
			else if((isNaN(kaliA))&&(isNaN(jpalawija)))
			{
				tot = jtebu + jgl;
			}
			else if((isNaN(kaliA))&&(isNaN(jgl)))
			{
				tot = jtebu + jpalawija;
			}
			else if((isNaN(jtebu))&&(isNaN(jpalawija)))
			{
				tot = kaliA + jgl;
			}
			else if((isNaN(jtebu))&&(isNaN(jgl)))
			{
				tot = kaliA + jpalawija;
			}
			else if((isNaN(jpalawija))&&(isNaN(jgl)))
			{
				tot = kaliA + jtebu;
			}
			else if(isNaN(jpalawija))
			{
				tot = jtebu + jgl + kaliA;
			}
			else if(isNaN(jtebu))
			{
				tot = jpalawija + jgl + kaliA;
			}
			else if(isNaN(jgl))
			{
				tot = jtebu + jpalawija + kaliA;
			}
			else if(isNaN(kaliA))
			{
				tot = jtebu + jpalawija + jgl;
			}
			else
			{
				tot = jtebu	 + jpalawija + jgl + kaliA;
			}
			if(tot=='')
			{
				tot = 0;
			}
			else
			{
				document.flatihan1.jumlah.value=tot.toFixed(2);
			}
			document.flatihan1.jumlah.value=tot.toFixed(2);
			if(isNaN(tot))
			{
				tot_all = "";
			}
			else
			{
				tot_all = faktorTersier * tot;
			}
			document.flatihan1.jumlahTotal.value=tot_all.toFixed(2);

		}
		else
		{
			if(masatanam=="MT.1")
			{
				kaliA = padiA * 1.250;
			}
			else if(masatanam=="MT.2")
			{
				kaliA = padiA * 1.125;
			}
			else if(masatanam=="MT.3")
			{
				kaliA = padiA * 0.30;
			}
			else
			{
				kaliA = padiA * 0;
			}
			document.flatihan1.hpadiA.value=kaliA.toFixed(2);//toFixed(3);
			if((isNaN(hpadiB))&&(isNaN(hpadiC)))
			{
				jum = kaliA;
			}
			else if((isNaN(kaliA))&&(isNaN(hpadiB)))
			{
				jum = hpadiC;
			}
			else if((isNaN(kaliA))&&(isNaN(hpadiC)))
			{
				jum = hpadiB;
			}
			else if((isNaN(kaliA))&&(isNaN(hpadiB))&&(isNaN(hpadiC)))
			{
				jum = "";
			}
			else if(isNaN(hpadiB))
			{
				jum = kaliA + hpadiC;
			}
			else if(isNaN(hpadiC))
			{
				jum = kaliA + hpadiB;
			}
			else if(isNaN(kaliA))
			{
				jum = hpadiB + hpadiC;
			}
			else 
			{
				jum = kaliA + hpadiB + hpadiC;
			}
			document.flatihan1.jpadi.value=jum;
			if((isNaN(jtebu))&&(isNaN(jpalawija))&&(isNaN(jgl))&&(isNaN(jum)))
			{
				tot = "";
			}
			else if((isNaN(jtebu))&&(isNaN(jpalawija))&&(isNaN(jum)))
			{
				tot = jgl;
			}
			else if((isNaN(jtebu))&&(isNaN(jgl))&&(isNaN(jum)))
			{
				tot = jpalawija;
			}
			else if((isNaN(jpalawija))&&(isNaN(jgl))&&(isNaN(jum)))
			{
				tot = jtebu;
			}
			else if((isNaN(jpalawija))&&(isNaN(jgl))&&(isNaN(jtebu)))
			{
				tot = jum;
			}
			else if((isNaN(jum))&&(isNaN(jtebu)))
			{
				tot = jpalawija + jgl;
			}
			else if((isNaN(jum))&&(isNaN(jpalawija)))
			{
				tot = jtebu + jgl;
			}
			else if((isNaN(jum))&&(isNaN(jgl)))
			{
				tot = jpalawija + jtebu;
			}
			else if((isNaN(jtebu))&&(isNaN(jpalawija)))
			{
				tot = jum + jgl;
			}
			else if((isNaN(jtebu))&&(isNaN(jgl)))
			{
				tot = jum + jpalawija;
			}
			else if((isNaN(jpalawija))&&(isNaN(jgl)))
			{
				tot = jum + jtebu;
			}
			else if(isNaN(jpalawija))
			{
				tot = jtebu + jgl + jum;
			}
			else if(isNaN(jtebu))
			{
				tot = jpalawija + jgl + jum;
			}
			else if(isNaN(jgl))
			{
				tot = jtebu + jpalawija + jum;
			}
			else if(isNaN(jum))
			{
				tot = jtebu + jpalawija + jgl;
			}
			else 
			{
				tot = jum + jtebu + jpalawija + jgl;
			}
			document.flatihan1.jumlah.value=tot.toFixed(2);
			if(isNaN(tot))
			{
				tot_all = "";
			}
			else
			{
				tot_all = faktorTersier * tot;
			}
			document.flatihan1.jumlahTotal.value=tot_all.toFixed(2);
		}
		
	}

	function procedure2()
	{
		var padiB=parseInt(document.flatihan1.padiB.value);
		var hpadiA=parseFloat(document.flatihan1.hpadiA.value);
		var hpadiC=parseFloat(document.flatihan1.hpadiC.value);
		var	jtebu = parseFloat(document.flatihan1.jtebu.value);
		var jpalawija = parseFloat(document.flatihan1.jpalawija.value);
		var jgl = parseFloat(document.flatihan1.jgl.value);
		var faktorTersier = parseFloat(document.flatihan1.faktorTersier.value);
		var masatanam=(document.flatihan1.masatanam.value);
		if(isNaN(padiB))
		{
			document.flatihan1.hpadiB.value="";
			if(isNaN(hpadiC))
			{
				kaliB = hpadiA;
			}
			else if(isNaN(hpadiA))
			{
				kaliB = hpadiC;
			}
			else if((isNaN(hpadiA))&&(isNaN(hpadiC)))
			{
				kaliB = ""; 
			}
			else
			{
				kaliB = hpadiA + hpadiC;
			}
			document.flatihan1.jpadi.value=kaliB.toFixed(2);
			if((isNaN(jtebu))&&(isNaN(jpalawija))&&(isNaN(jgl))&&(isNaN(kaliB)))
			{
				tot = "";
			}
			else if((isNaN(jtebu))&&(isNaN(jpalawija))&&(isNaN(kaliB)))
			{
				tot = jgl;
			}
			else if((isNaN(jtebu))&&(isNaN(jgl))&&(isNaN(kaliB)))
			{
				tot = jpalawija;
			}
			else if((isNaN(jpalawija))&&(isNaN(jgl))&&(isNaN(kaliB)))
			{
				tot = jtebu;
			}
			else if((isNaN(jpalawija))&&(isNaN(jgl))&&(isNaN(jtebu)))
			{
				tot = kaliB;
			}
			else if((isNaN(kaliB))&&(isNaN(jtebu)))
			{
				tot = jpalawija + jgl;
			}
			else if((isNaN(kaliB))&&(isNaN(jpalawija)))
			{
				tot = jtebu + jgl;
			}
			else if((isNaN(kaliB))&&(isNaN(jgl)))
			{
				tot = jtebu + palawijaA;
			}
			else if((isNaN(jtebu))&&(isNaN(jpalawija)))
			{
				tot = kaliB + jgl;
			}
			else if((isNaN(jtebu))&&(isNaN(jgl)))
			{
				tot = kaliB + jpalawija;
			}
			else if((isNaN(jpalawija))&&(isNaN(jgl)))
			{
				tot = kaliB + jtebu;
			}
			else if(isNaN(jpalawija))
			{
				tot = jtebu + jgl + kaliB;
			}
			else if(isNaN(jtebu))
			{
				tot = jpalawija + jgl + kaliB;
			}
			else if(isNaN(jgl))
			{
				tot = jtebu + jpalawija + kaliB;
			}
			else if(isNaN(kaliB))
			{
				tot = jtebu + jpalawija + jgl;
			}
			else
			{
				tot = jtebu	 + jpalawija + jgl + kaliB;
			}
			if(tot=='')
			{
				tot = 0;
			}
			else
			{
				document.flatihan1.jumlah.value=tot.toFixed(2);
			}
			document.flatihan1.jumlah.value=tot.toFixed(2);
			if(isNaN(tot))
			{
				tot_all = "";
			}
			else
			{
				tot_all = faktorTersier * tot;
			}
			document.flatihan1.jumlahTotal.value=tot_all.toFixed(2);
		}
		else
		{
			if(masatanam=="MT.1")
			{
				kaliB = padiB * 0.725;
			}
			else if(masatanam=="MT.2")
			{
				kaliB = padiB * 0.850;
			}
			else if(masatanam=="MT.3")
			{
				kaliB = padiB * 0.30;
			}
			else
			{
				kaliB = padiB * 0;
			}
			document.flatihan1.hpadiB.value=kaliB.toFixed(2);//toFixed(3);
			if((isNaN(hpadiA))&&(isNaN(hpadiC)))
			{
				jum = kaliB;
			}
			else if((isNaN(hpadiA))&&(isNaN(kaliB)))
			{
				jum = hpadiC;
			}
			else if((isNaN(kaliB))&&(isNaN(hpadiC)))
			{
				jum = hpadiA;
			}
			else if((isNaN(hpadiA))&&(isNaN(kaliB))&&(isNaN(hpadiC)))
			{
				jum = "";
			}
			else if(isNaN(kaliB))
			{
				jum = hpadiA + hpadiC;
			}
			else if(isNaN(hpadiC))
			{
				jum = hpadiA + kaliB;
			}
			else if(isNaN(hpadiA))
			{
				jum = kaliB + hpadiC;
			}
			else 
			{
				jum = hpadiA + kaliB + hpadiC;
			}
			document.flatihan1.jpadi.value=jum;
			if((isNaN(jtebu))&&(isNaN(jpalawija))&&(isNaN(jgl))&&(isNaN(jum)))
			{
				tot = "";
			}
			else if((isNaN(jtebu))&&(isNaN(jpalawija))&&(isNaN(jum)))
			{
				tot = jgl;
			}
			else if((isNaN(jtebu))&&(isNaN(jgl))&&(isNaN(jum)))
			{
				tot = jpalawija;
			}
			else if((isNaN(jpalawija))&&(isNaN(jgl))&&(isNaN(jum)))
			{
				tot = jtebu;
			}
			else if((isNaN(jpalawija))&&(isNaN(jgl))&&(isNaN(jtebu)))
			{
				tot = jum;
			}
			else if((isNaN(jum))&&(isNaN(jtebu)))
			{
				tot = jpalawija + jgl;
			}
			else if((isNaN(jum))&&(isNaN(jpalawija)))
			{
				tot = jtebu + jgl;
			}
			else if((isNaN(jum))&&(isNaN(jgl)))
			{
				tot = jpalawija + jtebu;
			}
			else if((isNaN(jtebu))&&(isNaN(jpalawija)))
			{
				tot = jum + jgl;
			}
			else if((isNaN(jtebu))&&(isNaN(jgl)))
			{
				tot = jum + jpalawija;
			}
			else if((isNaN(jpalawija))&&(isNaN(jgl)))
			{
				tot = jum + jtebu;
			}
			else if(isNaN(jpalawija))
			{
				tot = jtebu + jgl + jum;
			}
			else if(isNaN(jtebu))
			{
				tot = jpalawija + jgl + jum;
			}
			else if(isNaN(jgl))
			{
				tot = jtebu + jpalawija + jum;
			}
			else if(isNaN(jum))
			{
				tot = jtebu + jpalawija + jgl;
			}
			else 
			{
				tot = jum + jtebu + jpalawija + jgl;
			}
			document.flatihan1.jumlah.value=tot.toFixed(2);
			if(isNaN(tot))
			{
				tot_all = "";
			}
			else
			{
				tot_all = faktorTersier * tot;
			}
			document.flatihan1.jumlahTotal.value=tot_all.toFixed(2);
		}
		
	}

	function procedure3()
	{
		var padiC=parseInt(document.flatihan1.padiC.value);
		var hpadiA=parseFloat(document.flatihan1.hpadiA.value);
		var hpadiB=parseFloat(document.flatihan1.hpadiB.value);
		var	jtebu = parseFloat(document.flatihan1.jtebu.value);
		var jpalawija = parseFloat(document.flatihan1.jpalawija.value);
		var jgl = parseFloat(document.flatihan1.jgl.value);
		var faktorTersier = parseFloat(document.flatihan1.faktorTersier.value);
		var masatanam=(document.flatihan1.masatanam.value);
		if(isNaN(padiC))
		{
			document.flatihan1.hpadiC.value="";
			if(isNaN(hpadiB))
			{
				kaliC = hpadiA;
			}
			else if(isNaN(hpadiA))
			{
				kaliC = hpadiB;
			}
			else if((isNaN(hpadiA))&&(isNaN(hpadiB)))
			{
				kaliC = ""; 
			}
			else
			{
				kaliC = hpadiB + hpadiA;
			}
			document.flatihan1.jpadi.value=kaliC.toFixed(2);
			if((isNaN(jtebu))&&(isNaN(jpalawija))&&(isNaN(jgl))&&(isNaN(kaliC)))
			{
				tot = "";
			}
			else if((isNaN(jtebu))&&(isNaN(jpalawija))&&(isNaN(kaliC)))
			{
				tot = jgl;
			}
			else if((isNaN(jtebu))&&(isNaN(jgl))&&(isNaN(kaliC)))
			{
				tot = jpalawija;
			}
			else if((isNaN(jpalawija))&&(isNaN(jgl))&&(isNaN(kaliC)))
			{
				tot = jtebu;
			}
			else if((isNaN(jpalawija))&&(isNaN(jgl))&&(isNaN(jtebu)))
			{
				tot = kaliC;
			}
			else if((isNaN(kaliC))&&(isNaN(jtebu)))
			{
				tot = jpalawija + jgl;
			}
			else if((isNaN(kaliC))&&(isNaN(jpalawija)))
			{
				tot = jtebu + jgl;
			}
			else if((isNaN(kaliC))&&(isNaN(jgl)))
			{
				tot = jtebu + jpalawija;
			}
			else if((isNaN(jtebu))&&(isNaN(jpalawija)))
			{
				tot = kaliC + jgl;
			}
			else if((isNaN(jtebu))&&(isNaN(jgl)))
			{
				tot = kaliC + jpalawija;
			}
			else if((isNaN(jpalawija))&&(isNaN(jgl)))
			{
				tot = kaliC + jtebu;
			}
			else if(isNaN(jpalawija))
			{
				tot = jtebu + jgl + kaliC;
			}
			else if(isNaN(jtebu))
			{
				tot = jpalawija + jgl + kaliC;
			}
			else if(isNaN(jgl))
			{
				tot = jtebu + jpalawija + kaliC;
			}
			else if(isNaN(kaliC))
			{
				tot = jtebu + jpalawija + jgl;
			}
			else
			{
				tot = jtebu	 + jpalawija + jgl + kaliC;
			}
			if(tot == '')
			{
				tot = 0;
			}
			else
			{
				document.flatihan1.jumlah.value=tot.toFixed(2);
			}
			document.flatihan1.jumlah.value=tot.toFixed(2);
			if(isNaN(tot))
			{
				tot_all = "";
			}
			else
			{
				tot_all = faktorTersier * tot;
			}
			document.flatihan1.jumlahTotal.value=tot_all.toFixed(2);
		}
		else
		{
			if(masatanam=="MT.1")
			{
				kaliC = padiC * 0.30;
			}
			else if(masatanam=="MT.2")
			{
				kaliC = padiC * 0.30;
			}
			else if(masatanam=="MT.3")
			{
				kaliC = padiC * 0.30;
			}
			else
			{
				kaliC = padiC * 0;
			}
			document.flatihan1.hpadiC.value=kaliC.toFixed(2);//toFixed(3);
			if((isNaN(hpadiA))&&(isNaN(kaliC)))
			{
				jum = hpadiB;
			}
			else if((isNaN(hpadiA))&&(isNaN(hpadiB)))
			{
				jum = kaliC;
			}
			else if((isNaN(hpadiB))&&(isNaN(kaliC)))
			{
				jum = hpadiA;
			}
			else if((isNaN(hpadiA))&&(isNaN(hpadiB))&&(isNaN(kaliC)))
			{
				jum = "";
			}
			else if(isNaN(hpadiB))
			{
				jum = hpadiA + kaliC;
			}
			else if(isNaN(kaliC))
			{
				jum = hpadiA + hpadiB;
			}
			else if(isNaN(hpadiA))
			{
				jum = hpadiB + kaliC;
			}
			else 
			{
				jum = hpadiA + hpadiB + kaliC;
			}
			document.flatihan1.jpadi.value=jum;
			if((isNaN(jtebu))&&(isNaN(jpalawija))&&(isNaN(jgl))&&(isNaN(jum)))
			{
				tot = "";
			}
			else if((isNaN(jtebu))&&(isNaN(jpalawija))&&(isNaN(jum)))
			{
				tot = jgl;
			}
			else if((isNaN(jtebu))&&(isNaN(jgl))&&(isNaN(jum)))
			{
				tot = jpalawija;
			}
			else if((isNaN(jpalawija))&&(isNaN(jgl))&&(isNaN(jum)))
			{
				tot = jtebu;
			}
			else if((isNaN(jpalawija))&&(isNaN(jgl))&&(isNaN(jtebu)))
			{
				tot = jum;
			}
			else if((isNaN(jum))&&(isNaN(jtebu)))
			{
				tot = jpalawija + jgl;
			}
			else if((isNaN(jum))&&(isNaN(jpalawija)))
			{
				tot = jtebu + jgl;
			}
			else if((isNaN(jum))&&(isNaN(jgl)))
			{
				tot = jpalawija + jtebu;
			}
			else if((isNaN(jtebu))&&(isNaN(jpalawija)))
			{
				tot = jum + jgl;
			}
			else if((isNaN(jtebu))&&(isNaN(jgl)))
			{
				tot = jum + jpalawija;
			}
			else if((isNaN(jpalawija))&&(isNaN(jgl)))
			{
				tot = jum + jtebu;
			}
			else if(isNaN(jpalawija))
			{
				tot = jtebu + jgl + jum;
			}
			else if(isNaN(jtebu))
			{
				tot = jpalawija + jgl + jum;
			}
			else if(isNaN(jgl))
			{
				tot = jtebu + jpalawija + jum;
			}
			else if(isNaN(jum))
			{
				tot = jtebu + jpalawija + jgl;
			}
			else 
			{
				tot = jum + jtebu + jpalawija + jgl;
			}
			document.flatihan1.jumlah.value=tot.toFixed(2);
			if(isNaN(tot))
			{
				tot_all = "";
			}
			else
			{
				tot_all = faktorTersier * tot;
			}
			document.flatihan1.jumlahTotal.value=tot_all.toFixed(2);
		}
		
	}

	function procedure4()
	{
		var tebuA=parseInt(document.flatihan1.tebuA.value);
		var htebuB=parseFloat(document.flatihan1.htebuB.value);
		var htebuC=parseFloat(document.flatihan1.htebuC.value);
		var	jpadi = parseFloat(document.flatihan1.jpadi.value);
		var jpalawija = parseFloat(document.flatihan1.jpalawija.value);
		var jgl = parseFloat(document.flatihan1.jgl.value);
		var faktorTersier = parseFloat(document.flatihan1.faktorTersier.value);
		var masatanam=(document.flatihan1.masatanam.value);
		if(isNaN(tebuA))
		{
			document.flatihan1.htebuA.value="";
			if(isNaN(htebuB))
			{
				kali = htebuC;
			}
			else if(isNaN(htebuC))
			{
				kali = htebuB;
			}
			else if((isNaN(htebuB))&&(isNaN(htebuC)))
			{
				kali = ""; 
			}
			else
			{
				kali = htebuB + htebuC;
			}
			document.flatihan1.jtebu.value=kali.toFixed(2);
			if((isNaN(jpadi))&&(isNaN(jpalawija))&&(isNaN(jgl))&&(isNaN(kali)))
			{
				tot = "";
			}
			else if((isNaN(jpadi))&&(isNaN(jpalawija))&&(isNaN(kali)))
			{
				tot = jgl;
			}
			else if((isNaN(jpadi))&&(isNaN(jgl))&&(isNaN(kali)))
			{
				tot = jpalawija;
			}
			else if((isNaN(jpalawija))&&(isNaN(jgl))&&(isNaN(kali)))
			{
				tot = jpadi;
			}
			else if((isNaN(jpalawija))&&(isNaN(jgl))&&(isNaN(jpadi)))
			{
				tot = kali;
			}
			else if((isNaN(kali))&&(isNaN(jpadi)))
			{
				tot = jpalawija + jgl;
			}
			else if((isNaN(kali))&&(isNaN(jpalawija)))
			{
				tot = jpadi + jgl;
			}
			else if((isNaN(kali))&&(isNaN(jgl)))
			{
				tot = jpadi + jpalawija;
			}
			else if((isNaN(jpadi))&&(isNaN(jpalawija)))
			{
				tot = kali + jgl;
			}
			else if((isNaN(jpadi))&&(isNaN(jgl)))
			{
				tot = kali + jpalawija;
			}
			else if((isNaN(jpalawija))&&(isNaN(jgl)))
			{
				tot = kali + jpadi;
			}
			else if(isNaN(jpalawija))
			{
				tot = jpadi + jgl + kali;
			}
			else if(isNaN(jpadi))
			{
				tot = jpalawija + jgl + kali;
			}
			else if(isNaN(jgl))
			{
				tot = jpadi + jpalawija + kali;
			}
			else if(isNaN(kali))
			{
				tot = jpadi + jpalawija + jgl;
			}
			else
			{
				tot = jpadi	 + jpalawija + jgl + kali;
			}
			if(tot == '')
			{
				tot = 0;
			}
			else
			{
				document.flatihan1.jumlah.value=tot.toFixed(2);
			}
			document.flatihan1.jumlah.value=tot.toFixed(2);
			if(isNaN(tot))
			{
				tot_all = "";
			}
			else
			{
				tot_all = faktorTersier * tot;
			}
			document.flatihan1.jumlahTotal.value=tot_all.toFixed(2);
		}
		else
		{
			if(masatanam=="MT.1")
			{
				kali = tebuA * 0.850;
			}
			else if(masatanam=="MT.2")
			{
				kali = tebuA * 0.850;
			}
			else if(masatanam=="MT.3")
			{
				kali = tebuA * 0.850;
			}
			else
			{
				kali = tebuA * 0;
			}
			document.flatihan1.htebuA.value=kali.toFixed(2);//toFixed(3);
			if((isNaN(htebuC))&&(isNaN(kali)))
			{
				jum = htebuB;
			}
			else if((isNaN(htebuC))&&(isNaN(htebuB)))
			{
				jum = kali;
			}
			else if((isNaN(htebuB))&&(isNaN(kali)))
			{
				jum = htebuC;
			}
			else if((isNaN(htebuC))&&(isNaN(htebuB))&&(isNaN(kali)))
			{
				jum = "";
			}
			else if(isNaN(htebuB))
			{
				jum = htebuC + kali;
			}
			else if(isNaN(kali))
			{
				jum = htebuC + htebuB;
			}
			else if(isNaN(htebuC))
			{
				jum = htebuB + kali;
			}
			else 
			{
				jum = htebuC + htebuB + kali;
			}
			document.flatihan1.jtebu.value=jum;
			if((isNaN(jpadi))&&(isNaN(jpalawija))&&(isNaN(jgl))&&(isNaN(jum)))
			{
				tot = "";
			}
			else if((isNaN(jpadi))&&(isNaN(jpalawija))&&(isNaN(jum)))
			{
				tot = jgl;
			}
			else if((isNaN(jpadi))&&(isNaN(jgl))&&(isNaN(jum)))
			{
				tot = jpalawija;
			}
			else if((isNaN(jpalawija))&&(isNaN(jgl))&&(isNaN(jum)))
			{
				tot = jpadi;
			}
			else if((isNaN(jpalawija))&&(isNaN(jgl))&&(isNaN(jpadi)))
			{
				tot = jum;
			}
			else if((isNaN(jum))&&(isNaN(jpadi)))
			{
				tot = jpalawija + jgl;
			}
			else if((isNaN(jum))&&(isNaN(jpalawija)))
			{
				tot = jpadi + jgl;
			}
			else if((isNaN(jum))&&(isNaN(jgl)))
			{
				tot = jpalawija + jpadi;
			}
			else if((isNaN(jpadi))&&(isNaN(jpalawija)))
			{
				tot = jum + jgl;
			}
			else if((isNaN(jpadi))&&(isNaN(jgl)))
			{
				tot = jum + jpalawija;
			}
			else if((isNaN(jpalawija))&&(isNaN(jgl)))
			{
				tot = jum + jpadi;
			}
			else if(isNaN(jpalawija))
			{
				tot = jpadi + jgl + jum;
			}
			else if(isNaN(jpadi))
			{
				tot = jpalawija + jgl + jum;
			}
			else if(isNaN(jgl))
			{
				tot = jpadi + jpalawija + jum;
			}
			else if(isNaN(jum))
			{
				tot = jpadi + jpalawija + jgl;
			}
			else 
			{
				tot = jum + jpadi + jpalawija + jgl;
			}
			document.flatihan1.jumlah.value=tot.toFixed(2);
			if(isNaN(tot))
			{
				tot_all = "";
			}
			else
			{
				tot_all = faktorTersier * tot;
			}
			document.flatihan1.jumlahTotal.value=tot_all.toFixed(2);
		}
		
	}

	function procedure5()
	{
		var tebuB=parseInt(document.flatihan1.tebuB.value);
		var htebuA=parseFloat(document.flatihan1.htebuA.value);
		var htebuC=parseFloat(document.flatihan1.htebuC.value);
		var	jpadi = parseFloat(document.flatihan1.jpadi.value);
		var jpalawija = parseFloat(document.flatihan1.jpalawija.value);
		var jgl = parseFloat(document.flatihan1.jgl.value);
		var faktorTersier = parseFloat(document.flatihan1.faktorTersier.value);
		var masatanam=(document.flatihan1.masatanam.value);
		if(isNaN(tebuB))
		{
			document.flatihan1.htebuB.value="";
			if(isNaN(htebuA))
			{
				kali = htebuC;
			}
			else if(isNaN(htebuC))
			{
				kali = htebuA;
			}
			else if((isNaN(htebuA))&&(isNaN(htebuC)))
			{
				kali = ""; 
			}
			else
			{
				kali = htebuA + htebuC;
			}
			document.flatihan1.jtebu.value=kali.toFixed(2);
			if((isNaN(jpadi))&&(isNaN(jpalawija))&&(isNaN(jgl))&&(isNaN(kali)))
			{
				tot = "";
			}
			else if((isNaN(jpadi))&&(isNaN(jpalawija))&&(isNaN(kali)))
			{
				tot = jgl;
			}
			else if((isNaN(jpadi))&&(isNaN(jgl))&&(isNaN(kali)))
			{
				tot = jpalawija;
			}
			else if((isNaN(jpalawija))&&(isNaN(jgl))&&(isNaN(kali)))
			{
				tot = jpadi;
			}
			else if((isNaN(jpalawija))&&(isNaN(jgl))&&(isNaN(jpadi)))
			{
				tot = kali;
			}
			else if((isNaN(kali))&&(isNaN(jpadi)))
			{
				tot = jpalawija + jgl;
			}
			else if((isNaN(kali))&&(isNaN(jpalawija)))
			{
				tot = jpadi + jgl;
			}
			else if((isNaN(kali))&&(isNaN(jgl)))
			{
				tot = jpadi + jpalawija;
			}
			else if((isNaN(jpadi))&&(isNaN(jpalawija)))
			{
				tot = kali + jgl;
			}
			else if((isNaN(jpadi))&&(isNaN(jgl)))
			{
				tot = kali + jpalawija;
			}
			else if((isNaN(jpalawija))&&(isNaN(jgl)))
			{
				tot = kali + jpadi;
			}
			else if(isNaN(jpalawija))
			{
				tot = jpadi + jgl + kali;
			}
			else if(isNaN(jpadi))
			{
				tot = jpalawija + jgl + kali;
			}
			else if(isNaN(jgl))
			{
				tot = jpadi + jpalawija + kali;
			}
			else if(isNaN(kali))
			{
				tot = jpadi + jpalawija + jgl;
			}
			else
			{
				tot = jpadi	 + jpalawija + jgl + kali;
			}
			if(tot == '')
			{
				tot = 0;
			}
			else
			{
				document.flatihan1.jumlah.value=tot.toFixed(2);
			}
			document.flatihan1.jumlah.value=tot.toFixed(2);
			if(isNaN(tot))
			{
				tot_all = "";
			}
			else
			{
				tot_all = faktorTersier * tot;
			}
			document.flatihan1.jumlahTotal.value=tot_all.toFixed(2);
		}
		else
		{
			if(masatanam=="MT.1")
			{
				kali = tebuB * 0.360;
			}
			else if(masatanam=="MT.2")
			{
				kali = tebuB * 0.360;
			}
			else if(masatanam=="MT.3")
			{
				kali = tebuB * 0.360;
			}
			else
			{
				kali = tebuB * 0;
			}
			document.flatihan1.htebuB.value=kali.toFixed(2);//toFixed(3);
			if((isNaN(htebuC))&&(isNaN(kali)))
			{
				jum = htebuA;
			}
			else if((isNaN(htebuC))&&(isNaN(htebuA)))
			{
				jum = kali;
			}
			else if((isNaN(htebuA))&&(isNaN(kali)))
			{
				jum = htebuC;
			}
			else if((isNaN(htebuC))&&(isNaN(htebuA))&&(isNaN(kali)))
			{
				jum = "";
			}
			else if(isNaN(htebuA))
			{
				jum = htebuC + kali;
			}
			else if(isNaN(kali))
			{
				jum = htebuC + htebuA;
			}
			else if(isNaN(htebuC))
			{
				jum = htebuA + kali;
			}
			else 
			{
				jum = htebuC + htebuA + kali;
			}
			document.flatihan1.jtebu.value=jum;
			if((isNaN(jpadi))&&(isNaN(jpalawija))&&(isNaN(jgl))&&(isNaN(jum)))
			{
				tot = "";
			}
			else if((isNaN(jpadi))&&(isNaN(jpalawija))&&(isNaN(jum)))
			{
				tot = jgl;
			}
			else if((isNaN(jpadi))&&(isNaN(jgl))&&(isNaN(jum)))
			{
				tot = jpalawija;
			}
			else if((isNaN(jpalawija))&&(isNaN(jgl))&&(isNaN(jum)))
			{
				tot = jpadi;
			}
			else if((isNaN(jpalawija))&&(isNaN(jgl))&&(isNaN(jpadi)))
			{
				tot = jum;
			}
			else if((isNaN(jum))&&(isNaN(jpadi)))
			{
				tot = jpalawija + jgl;
			}
			else if((isNaN(jum))&&(isNaN(jpalawija)))
			{
				tot = jpadi + jgl;
			}
			else if((isNaN(jum))&&(isNaN(jgl)))
			{
				tot = jpalawija + jpadi;
			}
			else if((isNaN(jpadi))&&(isNaN(jpalawija)))
			{
				tot = jum + jgl;
			}
			else if((isNaN(jpadi))&&(isNaN(jgl)))
			{
				tot = jum + jpalawija;
			}
			else if((isNaN(jpalawija))&&(isNaN(jgl)))
			{
				tot = jum + jpadi;
			}
			else if(isNaN(jpalawija))
			{
				tot = jpadi + jgl + jum;
			}
			else if(isNaN(jpadi))
			{
				tot = jpalawija + jgl + jum;
			}
			else if(isNaN(jgl))
			{
				tot = jpadi + jpalawija + jum;
			}
			else if(isNaN(jum))
			{
				tot = jpadi + jpalawija + jgl;
			}
			else 
			{
				tot = jum + jpadi + jpalawija + jgl;
			}
			document.flatihan1.jumlah.value=tot.toFixed(2);
			if(isNaN(tot))
			{
				tot_all = "";
			}
			else
			{
				tot_all = faktorTersier * tot;
			}
			document.flatihan1.jumlahTotal.value=tot_all.toFixed(2);
		}
		
	}

	function procedure6()
	{
		var tebuC=parseInt(document.flatihan1.tebuC.value);
		var htebuA=parseFloat(document.flatihan1.htebuA.value);
		var htebuB=parseFloat(document.flatihan1.htebuB.value);
		var	jpadi = parseFloat(document.flatihan1.jpadi.value);
		var jpalawija = parseFloat(document.flatihan1.jpalawija.value);
		var jgl = parseFloat(document.flatihan1.jgl.value);
		var faktorTersier = parseFloat(document.flatihan1.faktorTersier.value);
		var masatanam=(document.flatihan1.masatanam.value);
		if(isNaN(tebuC))
		{
			document.flatihan1.htebuC.value="";
			if(isNaN(htebuA))
			{
				kali = htebuB;
			}
			else if(isNaN(htebuB))
			{
				kali = htebuA;
			}
			else if((isNaN(htebuA))&&(isNaN(htebuB)))
			{
				kali = ""; 
			}
			else
			{
				kali = htebuA + htebuB;
			}
			document.flatihan1.jtebu.value=kali.toFixed(2);
			if((isNaN(jpadi))&&(isNaN(jpalawija))&&(isNaN(jgl))&&(isNaN(kali)))
			{
				tot = "";
			}
			else if((isNaN(jpadi))&&(isNaN(jpalawija))&&(isNaN(kali)))
			{
				tot = jgl;
			}
			else if((isNaN(jpadi))&&(isNaN(jgl))&&(isNaN(kali)))
			{
				tot = jpalawija;
			}
			else if((isNaN(jpalawija))&&(isNaN(jgl))&&(isNaN(kali)))
			{
				tot = jpadi;
			}
			else if((isNaN(jpalawija))&&(isNaN(jgl))&&(isNaN(jpadi)))
			{
				tot = kali;
			}
			else if((isNaN(kali))&&(isNaN(jpadi)))
			{
				tot = jpalawija + jgl;
			}
			else if((isNaN(kali))&&(isNaN(jpalawija)))
			{
				tot = jpadi + jgl;
			}
			else if((isNaN(kali))&&(isNaN(jgl)))
			{
				tot = jpadi + jpalawija;
			}
			else if((isNaN(jpadi))&&(isNaN(jpalawija)))
			{
				tot = kali + jgl;
			}
			else if((isNaN(jpadi))&&(isNaN(jgl)))
			{
				tot = kali + jpalawija;
			}
			else if((isNaN(jpalawija))&&(isNaN(jgl)))
			{
				tot = kali + jpadi;
			}
			else if(isNaN(jpalawija))
			{
				tot = jpadi + jgl + kali;
			}
			else if(isNaN(jpadi))
			{
				tot = jpalawija + jgl + kali;
			}
			else if(isNaN(jgl))
			{
				tot = jpadi + jpalawija + kali;
			}
			else if(isNaN(kali))
			{
				tot = jpadi + jpalawija + jgl;
			}
			else
			{
				tot = jpadi	 + jpalawija + jgl + kali;
			}
			if(tot == '')
			{
				tot = 0;
			}
			else
			{
				document.flatihan1.jumlah.value=tot.toFixed(2);
			}
			document.flatihan1.jumlah.value=tot.toFixed(2);
			if(isNaN(tot))
			{
				tot_all = "";
			}
			else
			{
				tot_all = faktorTersier * tot;
			}
			document.flatihan1.jumlahTotal.value=tot_all.toFixed(2);
		}
		else
		{
			if(masatanam=="MT.1")
			{
				kali = tebuC * 0.125;
			}
			else if(masatanam=="MT.2")
			{
				kali = tebuC * 0.125;
			}
			else if(masatanam=="MT.3")
			{
				kali = tebuC * 0.125;
			}
			else
			{
				kali = tebuC * 0;
			}
			document.flatihan1.htebuC.value=kali.toFixed(2);//toFixed(3);
			if((isNaN(htebuB))&&(isNaN(kali)))
			{
				jum = htebuA;
			}
			else if((isNaN(htebuB))&&(isNaN(htebuA)))
			{
				jum = kali;
			}
			else if((isNaN(htebuA))&&(isNaN(kali)))
			{
				jum = htebuB;
			}
			else if((isNaN(htebuB))&&(isNaN(htebuA))&&(isNaN(kali)))
			{
				jum = "";
			}
			else if(isNaN(htebuA))
			{
				jum = htebuB + kali;
			}
			else if(isNaN(kali))
			{
				jum = htebuB + htebuA;
			}
			else if(isNaN(htebuB))
			{
				jum = htebuA + kali;
			}
			else 
			{
				jum = htebuB + htebuA + kali;
			}
			document.flatihan1.jtebu.value=jum;
			if((isNaN(jpadi))&&(isNaN(jpalawija))&&(isNaN(jgl))&&(isNaN(jum)))
			{
				tot = "";
			}
			else if((isNaN(jpadi))&&(isNaN(jpalawija))&&(isNaN(jum)))
			{
				tot = jgl;
			}
			else if((isNaN(jpadi))&&(isNaN(jgl))&&(isNaN(jum)))
			{
				tot = jpalawija;
			}
			else if((isNaN(jpalawija))&&(isNaN(jgl))&&(isNaN(jum)))
			{
				tot = jpadi;
			}
			else if((isNaN(jpalawija))&&(isNaN(jgl))&&(isNaN(jpadi)))
			{
				tot = jum;
			}
			else if((isNaN(jum))&&(isNaN(jpadi)))
			{
				tot = jpalawija + jgl;
			}
			else if((isNaN(jum))&&(isNaN(jpalawija)))
			{
				tot = jpadi + jgl;
			}
			else if((isNaN(jum))&&(isNaN(jgl)))
			{
				tot = jpalawija + jpadi;
			}
			else if((isNaN(jpadi))&&(isNaN(jpalawija)))
			{
				tot = jum + jgl;
			}
			else if((isNaN(jpadi))&&(isNaN(jgl)))
			{
				tot = jum + jpalawija;
			}
			else if((isNaN(jpalawija))&&(isNaN(jgl)))
			{
				tot = jum + jpadi;
			}
			else if(isNaN(jpalawija))
			{
				tot = jpadi + jgl + jum;
			}
			else if(isNaN(jpadi))
			{
				tot = jpalawija + jgl + jum;
			}
			else if(isNaN(jgl))
			{
				tot = jpadi + jpalawija + jum;
			}
			else if(isNaN(jum))
			{
				tot = jpadi + jpalawija + jgl;
			}
			else 
			{
				tot = jum + jpadi + jpalawija + jgl;
			}
			document.flatihan1.jumlah.value=tot.toFixed(2);
			if(isNaN(tot))
			{
				tot_all = "";
			}
			else
			{
				tot_all = faktorTersier * tot;
			}
			document.flatihan1.jumlahTotal.value=tot_all.toFixed(2);
		}
		
	}

	function procedure7()
	{
		var palawijaA=parseInt(document.flatihan1.palawijaA.value);
		var hpalawijaB = parseFloat(document.flatihan1.hpalawijaB.value);
		var	jpadi = parseFloat(document.flatihan1.jpadi.value);
		var jtebu = parseFloat(document.flatihan1.jtebu.value);
		var jgl = parseFloat(document.flatihan1.jgl.value);
		var faktorTersier = parseFloat(document.flatihan1.faktorTersier.value);
		var masatanam=(document.flatihan1.masatanam.value);
		if(isNaN(palawijaA))
		{
			document.flatihan1.hpalawijaA.value="";
			document.flatihan1.jpalawija.value=hpalawijaB.toFixed(2);
			if((isNaN(jpadi))&&(isNaN(hpalawijaB))&&(isNaN(jgl))&&(isNaN(jtebu)))
			{
				tot = "";
			}
			else if((isNaN(jpadi))&&(isNaN(hpalawijaB))&&(isNaN(jtebu)))
			{
				tot = jgl;
			}
			else if((isNaN(jpadi))&&(isNaN(jgl))&&(isNaN(jtebu)))
			{
				tot = hpalawijaB;
			}
			else if((isNaN(hpalawijaB))&&(isNaN(jgl))&&(isNaN(jtebu)))
			{
				tot = jpadi;
			}
			else if((isNaN(hpalawijaB))&&(isNaN(jgl))&&(isNaN(jpadi)))
			{
				tot = jtebu;
			}
			else if((isNaN(jtebu))&&(isNaN(jpadi)))
			{
				tot = hpalawijaB + jgl;
			}
			else if((isNaN(jtebu))&&(isNaN(hpalawijaB)))
			{
				tot = jpadi + jgl;
			}
			else if((isNaN(jtebu))&&(isNaN(jgl)))
			{
				tot = jpadi + hpalawijaB;
			}
			else if((isNaN(jpadi))&&(isNaN(hpalawijaB)))
			{
				tot = jtebu + jgl;
			}
			else if((isNaN(jpadi))&&(isNaN(jgl)))
			{
				tot = jtebu + hpalawijaB;
			}
			else if((isNaN(hpalawijaB))&&(isNaN(jgl)))
			{
				tot = jtebu + jpadi;
			}
			else if(isNaN(hpalawijaB))
			{
				tot = jpadi + jgl + jtebu;
			}
			else if(isNaN(jpadi))
			{
				tot = hpalawijaB + jgl + jtebu;
			}
			else if(isNaN(jgl))
			{
				tot = jpadi + hpalawijaB + jtebu;
			}
			else if(isNaN(jtebu))
			{
				tot = jpadi + hpalawijaB + jgl;
			}
			else
			{
				tot = jpadi	 + hpalawijaB + jgl + jtebu;
			}
			if(tot == '')
			{
				tot = 0;
			}
			else
			{
				document.flatihan1.jumlah.value=tot.toFixed(2);
			}
			document.flatihan1.jumlah.value=tot.toFixed(2);
			if(isNaN(tot))
			{
				tot_all = "";
			}
			else
			{
				tot_all = faktorTersier * tot;
			}
			document.flatihan1.jumlahTotal.value=tot_all.toFixed(2);
		}
		else
		{
			if(masatanam=="MT.1")
			{
				kali = palawijaA * 0.30;
			}
			else if(masatanam=="MT.2")
			{
				kali = palawijaA * 0.30;
			}
			else if(masatanam=="MT.3")
			{
				kali = palawijaA * 0.30;
			}
			else
			{
				kali = palawijaA * 0;
			}
			document.flatihan1.hpalawijaA.value=kali.toFixed(2);//toFixed(3);
			if(isNaN(kali))
			{
				jum = hpalawijaB;
			}
			else if(isNaN(hpalawijaB))
			{
				jum = kali;
			}
			else if((isNaN(kali))&&(isNaN(hpalawijaB)))
			{
				jum = "";
			}
			else
			{
				jum = kali + hpalawijaB;
			}
			document.flatihan1.jpalawija.value=jum;
			if((isNaN(jpadi))&&(isNaN(jtebu))&&(isNaN(jgl))&&(isNaN(jum)))
			{
				tot = "";
			}
			else if((isNaN(jpadi))&&(isNaN(jtebu))&&(isNaN(jum)))
			{
				tot = jgl;
			}
			else if((isNaN(jpadi))&&(isNaN(jgl))&&(isNaN(jum)))
			{
				tot = jtebu;
			}
			else if((isNaN(jtebu))&&(isNaN(jgl))&&(isNaN(jum)))
			{
				tot = jpadi;
			}
			else if((isNaN(jtebu))&&(isNaN(jgl))&&(isNaN(jpadi)))
			{
				tot = jum;
			}
			else if((isNaN(jum))&&(isNaN(jpadi)))
			{
				tot = jtebu + jgl;
			}
			else if((isNaN(jum))&&(isNaN(jtebu)))
			{
				tot = jpadi + jgl;
			}
			else if((isNaN(jum))&&(isNaN(jgl)))
			{
				tot = jtebu + jpadi;
			}
			else if((isNaN(jpadi))&&(isNaN(jtebu)))
			{
				tot = jum + jgl;
			}
			else if((isNaN(jpadi))&&(isNaN(jgl)))
			{
				tot = jum + jtebu;
			}
			else if((isNaN(jtebu))&&(isNaN(jgl)))
			{
				tot = jum + jpadi;
			}
			else if(isNaN(jtebu))
			{
				tot = jpadi + jgl + jum;
			}
			else if(isNaN(jpadi))
			{
				tot = jtebu + jgl + jum;
			}
			else if(isNaN(jgl))
			{
				tot = jpadi + jtebu + jum;
			}
			else if(isNaN(jum))
			{
				tot = jpadi + jtebu + jgl;
			}
			else 
			{
				tot = jum + jpadi + jtebu + jgl;
			}
			document.flatihan1.jumlah.value=tot.toFixed(2);
			if(isNaN(tot))
			{
				tot_all = "";
			}
			else
			{
				tot_all = faktorTersier * tot;
			}
			document.flatihan1.jumlahTotal.value=tot_all.toFixed(2);
		}
		
	}

	function procedure8()
	{
		var palawijaB=parseInt(document.flatihan1.palawijaB.value);
		var hpalawijaA = parseFloat(document.flatihan1.hpalawijaA.value);
		var	jpadi = parseFloat(document.flatihan1.jpadi.value);
		var jtebu = parseFloat(document.flatihan1.jtebu.value);
		var jgl = parseFloat(document.flatihan1.jgl.value);
		var faktorTersier = parseFloat(document.flatihan1.faktorTersier.value);
		var masatanam=(document.flatihan1.masatanam.value);
		if(isNaN(palawijaB))
		{
			document.flatihan1.hpalawijaB.value="";
			document.flatihan1.jpalawija.value=hpalawijaA.toFixed(2);
			if((isNaN(jpadi))&&(isNaN(hpalawijaA))&&(isNaN(jgl))&&(isNaN(jtebu)))
			{
				tot = "";
			}
			else if((isNaN(jpadi))&&(isNaN(hpalawijaA))&&(isNaN(jtebu)))
			{
				tot = jgl;
			}
			else if((isNaN(jpadi))&&(isNaN(jgl))&&(isNaN(jtebu)))
			{
				tot = hpalawijaA;
			}
			else if((isNaN(hpalawijaA))&&(isNaN(jgl))&&(isNaN(jtebu)))
			{
				tot = jpadi;
			}
			else if((isNaN(hpalawijaA))&&(isNaN(jgl))&&(isNaN(jpadi)))
			{
				tot = jtebu;
			}
			else if((isNaN(jtebu))&&(isNaN(jpadi)))
			{
				tot = hpalawijaA + jgl;
			}
			else if((isNaN(jtebu))&&(isNaN(hpalawijaA)))
			{
				tot = jpadi + jgl;
			}
			else if((isNaN(jtebu))&&(isNaN(jgl)))
			{
				tot = jpadi + hpalawijaA;
			}
			else if((isNaN(jpadi))&&(isNaN(hpalawijaA)))
			{
				tot = jtebu + jgl;
			}
			else if((isNaN(jpadi))&&(isNaN(jgl)))
			{
				tot = jtebu + hpalawijaA;
			}
			else if((isNaN(hpalawijaA))&&(isNaN(jgl)))
			{
				tot = jtebu + jpadi;
			}
			else if(isNaN(hpalawijaA))
			{
				tot = jpadi + jgl + jtebu;
			}
			else if(isNaN(jpadi))
			{
				tot = hpalawijaA + jgl + jtebu;
			}
			else if(isNaN(jgl))
			{
				tot = jpadi + hpalawijaA + jtebu;
			}
			else if(isNaN(jtebu))
			{
				tot = jpadi + hpalawijaA + jgl;
			}
			else
			{
				tot = jpadi	 + hpalawijaA + jgl + jtebu;
			}
			if(tot == '')
			{
				tot = 0;
			}
			else
			{
				document.flatihan1.jumlah.value=tot.toFixed(2);
			}
			document.flatihan1.jumlah.value=tot.toFixed(2);
			if(isNaN(tot))
			{
				tot_all = "";
			}
			else
			{
				tot_all = faktorTersier * tot;
			}
			document.flatihan1.jumlahTotal.value=tot_all.toFixed(2);
		}
		else
		{
			if(masatanam=="MT.1")
			{
				kali = palawijaB * 0.20;
			}
			else if(masatanam=="MT.2")
			{
				kali = palawijaB * 0.20;
			}
			else if(masatanam=="MT.3")
			{
				kali = palawijaB * 0.20;
			}
			else
			{
				kali = palawijaB * 0;
			}
			document.flatihan1.hpalawijaB.value=kali.toFixed(2);//toFixed(3);
			if(isNaN(kali))
			{
				jum = hpalawijaA;
			}
			else if(isNaN(hpalawijaA))
			{
				jum = kali;
			}
			else if((isNaN(kali))&&(isNaN(hpalawijaA)))
			{
				jum = "";
			}
			else
			{
				jum = kali + hpalawijaA;
			}
			document.flatihan1.jpalawija.value=jum;
			if((isNaN(jpadi))&&(isNaN(jtebu))&&(isNaN(jgl))&&(isNaN(jum)))
			{
				tot = "";
			}
			else if((isNaN(jpadi))&&(isNaN(jtebu))&&(isNaN(jum)))
			{
				tot = jgl;
			}
			else if((isNaN(jpadi))&&(isNaN(jgl))&&(isNaN(jum)))
			{
				tot = jtebu;
			}
			else if((isNaN(jtebu))&&(isNaN(jgl))&&(isNaN(jum)))
			{
				tot = jpadi;
			}
			else if((isNaN(jtebu))&&(isNaN(jgl))&&(isNaN(jpadi)))
			{
				tot = jum;
			}
			else if((isNaN(jum))&&(isNaN(jpadi)))
			{
				tot = jtebu + jgl;
			}
			else if((isNaN(jum))&&(isNaN(jtebu)))
			{
				tot = jpadi + jgl;
			}
			else if((isNaN(jum))&&(isNaN(jgl)))
			{
				tot = jtebu + jpadi;
			}
			else if((isNaN(jpadi))&&(isNaN(jtebu)))
			{
				tot = jum + jgl;
			}
			else if((isNaN(jpadi))&&(isNaN(jgl)))
			{
				tot = jum + jtebu;
			}
			else if((isNaN(jtebu))&&(isNaN(jgl)))
			{
				tot = jum + jpadi;
			}
			else if(isNaN(jtebu))
			{
				tot = jpadi + jgl + jum;
			}
			else if(isNaN(jpadi))
			{
				tot = jtebu + jgl + jum;
			}
			else if(isNaN(jgl))
			{
				tot = jpadi + jtebu + jum;
			}
			else if(isNaN(jum))
			{
				tot = jpadi + jtebu + jgl;
			}
			else 
			{
				tot = jum + jpadi + jtebu + jgl;
			}
			document.flatihan1.jumlah.value=tot.toFixed(2);
			if(isNaN(tot))
			{
				tot_all = "";
			}
			else
			{
				tot_all = faktorTersier * tot;
			}
			document.flatihan1.jumlahTotal.value=tot_all.toFixed(2);
		}
		
	}

	function procedure9()
	{
		var gadutanpaIzin=parseInt(document.flatihan1.gadutanpaIzin.value);
		var hlain_lain = parseFloat(document.flatihan1.hlain_lain.value);
		var	jpadi = parseFloat(document.flatihan1.jpadi.value);
		var jtebu = parseFloat(document.flatihan1.jtebu.value);
		var jpalawija = parseFloat(document.flatihan1.jpalawija.value);
		var faktorTersier = parseFloat(document.flatihan1.faktorTersier.value);
		var masatanam=(document.flatihan1.masatanam.value);
		if(isNaN(gadutanpaIzin))
		{
			document.flatihan1.hgadutanpaIzin.value="";
			document.flatihan1.jgl.value=hlain_lain.toFixed(2);
			if((isNaN(jpadi))&&(isNaN(hlain_lain))&&(isNaN(jpalawija))&&(isNaN(jtebu)))
			{
				tot = "";
			}
			else if((isNaN(jpadi))&&(isNaN(hlain_lain))&&(isNaN(jtebu)))
			{
				tot = jpalawija;
			}
			else if((isNaN(jpadi))&&(isNaN(jpalawija))&&(isNaN(jtebu)))
			{
				tot = hlain_lain;
			}
			else if((isNaN(hlain_lain))&&(isNaN(jpalawija))&&(isNaN(jtebu)))
			{
				tot = jpadi;
			}
			else if((isNaN(hlain_lain))&&(isNaN(jpalawija))&&(isNaN(jpadi)))
			{
				tot = jtebu;
			}
			else if((isNaN(jtebu))&&(isNaN(jpadi)))
			{
				tot = hlain_lain + jpalawija;
			}
			else if((isNaN(jtebu))&&(isNaN(hlain_lain)))
			{
				tot = jpadi + jpalawija;
			}
			else if((isNaN(jtebu))&&(isNaN(jpalawija)))
			{
				tot = jpadi + hlain_lain;
			}
			else if((isNaN(jpadi))&&(isNaN(hlain_lain)))
			{
				tot = jtebu + jpalawija;
			}
			else if((isNaN(jpadi))&&(isNaN(jpalawija)))
			{
				tot = jtebu + hlain_lain;
			}
			else if((isNaN(hlain_lain))&&(isNaN(jpalawija)))
			{
				tot = jtebu + jpadi;
			}
			else if(isNaN(hlain_lain))
			{
				tot = jpadi + jpalawija + jtebu;
			}
			else if(isNaN(jpadi))
			{
				tot = hlain_lain + jpalawija + jtebu;
			}
			else if(isNaN(jpalawija))
			{
				tot = jpadi + hlain_lain + jtebu;
			}
			else if(isNaN(jtebu))
			{
				tot = jpadi + hlain_lain + jpalawija;
			}
			else
			{
				tot = jpadi	 + hlain_lain + jpalawija + jtebu;
			}
			if(tot == '')
			{
				tot = 0;
			}
			else
			{
				document.flatihan1.jumlah.value=tot.toFixed(2);
			}
			document.flatihan1.jumlah.value=tot.toFixed(2);
			if(isNaN(tot))
			{
				tot_all = "";
			}
			else
			{
				tot_all = faktorTersier * tot;
			}
			document.flatihan1.jumlahTotal.value=tot_all.toFixed(2);
		}
		else
		{
			if(masatanam=="MT.1")
			{
				kali = gadutanpaIzin ;
			}
			else if(masatanam=="MT.2")
			{
				kali = gadutanpaIzin;
			}
			else if(masatanam=="MT.3")
			{
				kali = gadutanpaIzin;
			}
			else
			{
				kali = gadutanpaIzin;
			}
			document.flatihan1.hgadutanpaIzin.value=kali.toFixed(2);//toFixed(3);
			if(isNaN(kali))
			{
				jum = hlain_lain;
			}
			else if(isNaN(hlain_lain))
			{
				jum = kali;
			}
			else if((isNaN(kali))&&(isNaN(hlain_lain)))
			{
				jum = "";
			}
			else
			{
				jum = kali + hlain_lain;
			}
			document.flatihan1.jgl.value=jum;
			if((isNaN(jpadi))&&(isNaN(jtebu))&&(isNaN(jpalawija))&&(isNaN(jum)))
			{
				tot = "";
			}
			else if((isNaN(jpadi))&&(isNaN(jtebu))&&(isNaN(jum)))
			{
				tot = jpalawija;
			}
			else if((isNaN(jpadi))&&(isNaN(jpalawija))&&(isNaN(jum)))
			{
				tot = jtebu;
			}
			else if((isNaN(jtebu))&&(isNaN(jpalawija))&&(isNaN(jum)))
			{
				tot = jpadi;
			}
			else if((isNaN(jtebu))&&(isNaN(jpalawija))&&(isNaN(jpadi)))
			{
				tot = jum;
			}
			else if((isNaN(jum))&&(isNaN(jpadi)))
			{
				tot = jtebu + jpalawija;
			}
			else if((isNaN(jum))&&(isNaN(jtebu)))
			{
				tot = jpadi + jpalawija;
			}
			else if((isNaN(jum))&&(isNaN(jpalawija)))
			{
				tot = jtebu + jpadi;
			}
			else if((isNaN(jpadi))&&(isNaN(jtebu)))
			{
				tot = jum + jpalawija;
			}
			else if((isNaN(jpadi))&&(isNaN(jpalawija)))
			{
				tot = jum + jtebu;
			}
			else if((isNaN(jtebu))&&(isNaN(jpalawija)))
			{
				tot = jum + jpadi;
			}
			else if(isNaN(jtebu))
			{
				tot = jpadi + jpalawija + jum;
			}
			else if(isNaN(jpadi))
			{
				tot = jtebu + jpalawija + jum;
			}
			else if(isNaN(jpalawija))
			{
				tot = jpadi + jtebu + jum;
			}
			else if(isNaN(jum))
			{
				tot = jpadi + jtebu + jpalawija;
			}
			else 
			{
				tot = jum + jpadi + jtebu + jpalawija;
			}
			document.flatihan1.jumlah.value=tot.toFixed(2);
			if(isNaN(tot))
			{
				tot_all = "";
			}
			else
			{
				tot_all = faktorTersier * tot;
			}
			document.flatihan1.jumlahTotal.value=tot_all.toFixed(2);
		}
		
	}

	function procedure10()
	{
		var lain_lain=parseInt(document.flatihan1.lain_lain.value);
		var hgadutanpaIzin = parseFloat(document.flatihan1.hgadutanpaIzin.value);
		var	jpadi = parseFloat(document.flatihan1.jpadi.value);
		var jtebu = parseFloat(document.flatihan1.jtebu.value);
		var jpalawija = parseFloat(document.flatihan1.jpalawija.value);
		var faktorTersier = parseFloat(document.flatihan1.faktorTersier.value);
		var masatanam=(document.flatihan1.masatanam.value);
		if(isNaN(lain_lain))
		{
			document.flatihan1.hlain_lain.value="";
			document.flatihan1.jgl.value=hgadutanpaIzin.toFixed(2);
			if((isNaN(jpadi))&&(isNaN(hgadutanpaIzin))&&(isNaN(jpalawija))&&(isNaN(jtebu)))
			{
				tot = "";
			}
			else if((isNaN(jpadi))&&(isNaN(hgadutanpaIzin))&&(isNaN(jtebu)))
			{
				tot = jpalawija;
			}
			else if((isNaN(jpadi))&&(isNaN(jpalawija))&&(isNaN(jtebu)))
			{
				tot = hgadutanpaIzin;
			}
			else if((isNaN(hgadutanpaIzin))&&(isNaN(jpalawija))&&(isNaN(jtebu)))
			{
				tot = jpadi;
			}
			else if((isNaN(hgadutanpaIzin))&&(isNaN(jpalawija))&&(isNaN(jpadi)))
			{
				tot = jtebu;
			}
			else if((isNaN(jtebu))&&(isNaN(jpadi)))
			{
				tot = hgadutanpaIzin + jpalawija;
			}
			else if((isNaN(jtebu))&&(isNaN(hgadutanpaIzin)))
			{
				tot = jpadi + jpalawija;
			}
			else if((isNaN(jtebu))&&(isNaN(jpalawija)))
			{
				tot = jpadi + hgadutanpaIzin;
			}
			else if((isNaN(jpadi))&&(isNaN(hgadutanpaIzin)))
			{
				tot = jtebu + jpalawija;
			}
			else if((isNaN(jpadi))&&(isNaN(jpalawija)))
			{
				tot = jtebu + hgadutanpaIzin;
			}
			else if((isNaN(hgadutanpaIzin))&&(isNaN(jpalawija)))
			{
				tot = jtebu + jpadi;
			}
			else if(isNaN(hgadutanpaIzin))
			{
				tot = jpadi + jpalawija + jtebu;
			}
			else if(isNaN(jpadi))
			{
				tot = hgadutanpaIzin + jpalawija + jtebu;
			}
			else if(isNaN(jpalawija))
			{
				tot = jpadi + hgadutanpaIzin + jtebu;
			}
			else if(isNaN(jtebu))
			{
				tot = jpadi + hgadutanpaIzin + jpalawija;
			}
			else
			{
				tot = jpadi	 + hgadutanpaIzin + jpalawija + jtebu;
			}
			if(tot == '')
			{
				tot = 0;
			}
			else
			{
				document.flatihan1.jumlah.value=tot.toFixed(2);
			}
			document.flatihan1.jumlah.value=tot.toFixed(2);
			if(isNaN(tot))
			{
				tot_all = "";
			}
			else
			{
				tot_all = faktorTersier * tot;
			}
			document.flatihan1.jumlahTotal.value=tot_all.toFixed(2);
		}
		else
		{
			if(masatanam=="MT.1")
			{
				kali = lain_lain ;
			}
			else if(masatanam=="MT.2")
			{
				kali = lain_lain;
			}
			else if(masatanam=="MT.3")
			{
				kali = lain_lain;
			}
			else
			{
				kali = lain_lain;
			}
			document.flatihan1.hlain_lain.value=kali.toFixed(2);//toFixed(3);
			if(isNaN(kali))
			{
				jum = hgadutanpaIzin;
			}
			else if(isNaN(hgadutanpaIzin))
			{
				jum = kali;
			}
			else if((isNaN(kali))&&(isNaN(hgadutanpaIzin)))
			{
				jum = "";
			}
			else
			{
				jum = kali + hgadutanpaIzin;
			}
			document.flatihan1.jgl.value=jum;
			if((isNaN(jpadi))&&(isNaN(jtebu))&&(isNaN(jpalawija))&&(isNaN(jum)))
			{
				tot = "";
			}
			else if((isNaN(jpadi))&&(isNaN(jtebu))&&(isNaN(jum)))
			{
				tot = jpalawija;
			}
			else if((isNaN(jpadi))&&(isNaN(jpalawija))&&(isNaN(jum)))
			{
				tot = jtebu;
			}
			else if((isNaN(jtebu))&&(isNaN(jpalawija))&&(isNaN(jum)))
			{
				tot = jpadi;
			}
			else if((isNaN(jtebu))&&(isNaN(jpalawija))&&(isNaN(jpadi)))
			{
				tot = jum;
			}
			else if((isNaN(jum))&&(isNaN(jpadi)))
			{
				tot = jtebu + jpalawija;
			}
			else if((isNaN(jum))&&(isNaN(jtebu)))
			{
				tot = jpadi + jpalawija;
			}
			else if((isNaN(jum))&&(isNaN(jpalawija)))
			{
				tot = jtebu + jpadi;
			}
			else if((isNaN(jpadi))&&(isNaN(jtebu)))
			{
				tot = jum + jpalawija;
			}
			else if((isNaN(jpadi))&&(isNaN(jpalawija)))
			{
				tot = jum + jtebu;
			}
			else if((isNaN(jtebu))&&(isNaN(jpalawija)))
			{
				tot = jum + jpadi;
			}
			else if(isNaN(jtebu))
			{
				tot = jpadi + jpalawija + jum;
			}
			else if(isNaN(jpadi))
			{
				tot = jtebu + jpalawija + jum;
			}
			else if(isNaN(jpalawija))
			{
				tot = jpadi + jtebu + jum;
			}
			else if(isNaN(jum))
			{
				tot = jpadi + jtebu + jpalawija;
			}
			else 
			{
				tot = jum + jpadi + jtebu + jpalawija;
			}
			document.flatihan1.jumlah.value=tot.toFixed(2);
			if(isNaN(tot))
			{
				tot_all = "";
			}
			else
			{
				tot_all = faktorTersier * tot;
			}
			document.flatihan1.jumlahTotal.value=tot_all.toFixed(2);
		}
		
	}
</script>