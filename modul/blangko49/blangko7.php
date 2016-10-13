<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']))
{
    echo "Untuk mengakses modul, Anda harus login";
}
else{
$aksi="modul/blangko49/aksi_blangko7.php";
switch($_GET[act]){

	default:

	if($_GET[kode_nota]!='')
	{
		$datablangko6 = mysql_query("SELECT tgl_blangko06O,tgl_ket,bln_blangko06O,bln_ket,tahun_blangko06O,COUNT(id_nota)AS NOTA
  											FROM blangko06 
  											WHERE kode_nota = '$_GET[kode_nota]'
  											AND nama_irigasi = '$_SESSION[namairigasi]'
  											AND nama_personil = '$_SESSION[namalengkap]'");
		    $n = mysql_fetch_array($datablangko6);
		    $nota = $n[NOTA];//inti pengambilan
  			if($nota==0)
  			{
  				header('location:media.php?modul=blangko7&act=tampilerror');
  			}
  			else
  			{
  				$tdatablangko7 = mysql_query("SELECT *
  											FROM blangko07 
  											WHERE kode_nota = '$_GET[kode_nota]'
  											AND nama_irigasi = '$_SESSION[namairigasi]'
  											AND nama_personil = '$_SESSION[namalengkap]'");
								    $r = mysql_fetch_array($tdatablangko7);

			    $tdatablangko4 = mysql_query("SELECT *
  											FROM blangko04 
  											WHERE kode_nota = '$_GET[kode_nota]'
  											AND nama_irigasi = '$_SESSION[namairigasi]'
  											AND nama_personil = '$_SESSION[namalengkap]'");
								    $t = mysql_fetch_array($tdatablangko4);
  			}
	}
	else
	{
		 header('location:media.php?modul=blangko7&act=tampilerror');
	}

	echo" 
                <div class='row'>
                  <div class='col-xs-12'>
                    <div class='box box-primary'>
                      <div class='box-body'>
                       <div class='col-md-12'>     
			             <table border=0 width='100%'>
			                        <tr>
			                          <td colspan=12 align=center><b>RENCANA KEBUTUHAN AIR DI JARINGAN UTAMA<br>DAN PENETAPAN PEMBERIAN AIR</b></td>
			                         </tr>
			                         <tr>
			                          <td colspan=9></td>
			                          <td colspan=3><table border=1 bordercolor=#aaa align=right><tr><td><b>Blangko 07 - O </b></tr></td></table></td>
			                         </tr>
			                    </table>
			                </div><!-- /.col -->
			                <div class='col-md-6'>
			                  <table  border='0' width='100%' bordercolor='#00FF33'>
			                    <tr>
			                      <td colspan='3' style='width:320px;'>Daerah Irigasi 
			                          </td>
			                      <td width='1%'>:</td>
			                      <td colspan='3'><input name=limpas type = text class='form-control4'  style=margin:inherit value='$r[nama_irigasi]' readonly></td>
			                      
			                    </tr>
			                    <tr>
			                      <td colspan='3'>Nomer Kode DI </td>
			                      <td>:</td>
			                      <td colspan='3'>
			                      <input name=id_nota type ='hidden' class='form-control4'  style=margin:inherit value='$r[id_nota]' readonly/>
			                      <input name=kode_nota type ='hidden' class='form-control4'  style=margin:inherit value='$r[kode_nota]' readonly/>
			                      <input name=jumlahhari type ='hidden' class='form-control4'  style=margin:inherit value='$t[jumlahhari]' readonly/>
			                      <input name=tgl_blangko05O type ='hidden' class='form-control4'  style=margin:inherit value='$r[tgl_blangko07O]' readonly/>
			                      <input name=bln_blangko05O type ='hidden' class='form-control4'  style=margin:inherit value='$r[bln_blangko07O]' readonly/>
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
			                      <td colspan='3'>Bagian Pelaksana Kegiatan </td>
			                      <td>:</td>
			                      <td colspan='3'><input name=limpas type = text class='form-control4'  style=margin:inherit value='$r[jabatan]' readonly></td>
			                      
			                    </tr>
			                  </table>
			                </div><!-- /.col -->
			                <div class='col-md-6'>
			                  <table  border='0' width='100%'>
			                    <tr>
			                      <td colspan='3' style='width:320px;'>Nama Wil Kerja Ranting/Pengamat</td>
			                      <td width='1%'>:</td>
			                      <td colspan='3'><input name=limpas type = text class='form-control4'  style=margin:inherit value='$r[nama_ranting]' readonly></td>
			                      
			                    </tr>
			                    <tr>
			                      <td colspan='3'>Luas Areal Kerja Mantri</td>
			                      <td>:</td>
			                      <td colspan='3'><input name=irigasi type = text class='form-control4'  style=margin:inherit value='$r[total_wilayah]' readonly/></td>
			                      
			                    </tr>
			                    <tr>
			                      <td colspan='3'>Jumlah Petak Tersier</td>
			                      <td>:</td>
			                      <td colspan='3'><input name='h' type = text class='form-control4'  style=margin:inherit value='$r[jumlah_tersier]' readonly/></td>
			                    </tr>
			                    <tr>
			                      <td colspan='3' style='height:24px;'>&nbsp;</td>
			                      <td>&nbsp;</td>
			                      <td colspan='3'>&nbsp;</td>
			                      
			                    </tr>
			                    <tr>
			                      <td colspan='3'>Periode Pemberian Air Tanggal =  &nbsp;&nbsp;&nbsp;<b>$r[tgl_ket]</b></td>
			                      <td></td>
			                      <td colspan='2'><input name=bln_blangko05O type ='text' class='form-control9'  style='width:100px;' value='$r[bln_ket]' readonly/></td>
			                      <td><input name=limpas type = text class='form-control9'  style='width:60px;' value='$r[tahun_blangko07O]' readonly></td>
			                      
			                    </tr>
			                  </table>
			                </div><!-- /.col -->

			                <div class='col-md-12'>
			                 <div class='scroll-pane3 ui-widget3 '>
                              <div class='scroll-content3'>
			                	<table width='100%' border='1' class='tables no-margin table-striped' style='border:1px solid rgba(0, 166, 90, 0.38);'>
								  <tr>
								    <td rowspan='6' align='center' width='3%' style='border:1px solid rgba(0, 166, 90, 0.38);'>No.</td>
								    <td rowspan='6' align='center' width='15%' style='border:1px solid rgba(0, 166, 90, 0.38);'>Nama Wilayah Kerja<br />Mantri / Juru </td>
								    <td rowspan='6' align='center' width='9%' style='border:1px solid rgba(0, 166, 90, 0.38);'>Luas Sawah<br />Irigasi (ha)</td>
								    <td colspan='2' rowspan='3' align='center' width='16%' style='border:1px solid rgba(0, 166, 90, 0.38);'>Realisasi debit pada<br />periode sebelumnya<br />(I/det)</td>
								    <td rowspan='6' align='center' width='7%' style='border:1px solid rgba(0, 166, 90, 0.38);'>Usulan<br />luas tanam<br />pada<br />periode ini<br />(ha)</td>
								    <td colspan='5' rowspan='3' align='center' width='45%' style='border:1px solid rgba(0, 166, 90, 0.38);'>Rencana kebutuhan air periode pembagian air terseut (I/det)</td
								    ><td rowspan='6' align='center' width='7%' style='border:1px solid rgba(0, 166, 90, 0.38);'>Debit<br />Diberikan<br />(I/det)</td>
								  </tr>
								  <tr>
								  </tr>
								  <tr>
								  </tr>
								  <tr>
								    <td rowspan='3' align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>Debit Rata-<br />rata</td>
								    <td rowspan='3' align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>Debit pada<br />akhir periode</td>
								    <td rowspan='3' align='center' valign='top' style='border:1px solid rgba(0, 166, 90, 0.38);'>Keb air di pintu<br />tersier (Qt)</td>
								    <td rowspan='3' align='center' valign='top' style='border:1px solid rgba(0, 166, 90, 0.38);'>Kebutuhan<br />air lain-lain<br />(Ql)</td>
								    <td rowspan='3' align='center' valign='top' style='border:1px solid rgba(0, 166, 90, 0.38);'>Q Hilang di sal.<br />induk/Sek<br />(Qh)</td>
								    <td rowspan='3' align='center' valign='top' style='border:1px solid rgba(0, 166, 90, 0.38);'>Debit Suplesi<br />(Qs)</td>
								    <td rowspan='3' align='center' valign='top' style='border:1px solid rgba(0, 166, 90, 0.38);'>Kebutuhan air di<br />Bang Bagi<br />(Qb)</td>
								  </tr>
								  <tr>
								  </tr>
								  <tr>
								  </tr>
								  <tr>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>1</td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>2</td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>3</td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>4</td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>5</td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>6</td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>7</td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>8</td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>9</td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>10</td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>11=(7+8+9+10)</td>
									<td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>12</td>
								  </tr>
								  <tr>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);height:3px;' colspan='12'></td>
								  </tr>
								  ";
								$tampil=mysql_query("SELECT * FROM blangko07 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota = '$_GET[kode_nota]' ORDER BY no ASC");
							    while($z=mysql_fetch_array($tampil))
							    {
								echo"
								   <tr>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>$z[no]</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>$z[nmbangunkontrol]</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>$z[luassawahIrigasi]</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>$z[debitRata]</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>$z[debitAkhirPeriode]</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>$z[usulanluasTanam]</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>$z[kebutuhanairdiTersier]</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>$z[kebutuhanLain]</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>$z[qhilang]</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>$z[qsuplesi]</td>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>$z[debitDiberikan]</td>
									<td style='border:1px solid rgba(0, 166, 90, 0.38);' align='center'>$z[kditetapkan]</td>
								  </tr>
								  ";
								}
								echo"
								  <tr>
								    <td style='border:1px solid rgba(0, 166, 90, 0.38);height:3px;' colspan='12'></td>
								  </tr>
								</table>
							   </div><!--/.scroll-content -->
							 </div><!--/.scroll-panel -->
							</div><!-- /.col -->
			               

							 ";
			                $tempo = mysql_query("SELECT COUNT(`no`) AS isi FROM blangko07 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota ='$_GET[kode_nota]'");
			                        $p    = mysql_fetch_array($tempo);
			                        $isi = $p[isi];  
			                if($isi == $_SESSION[jumlahtersier])
			              	{
			              		echo"
				              	<div class='col-md-12'>
				              	  
				              	  <br><a href='?modul=blangko9&kode_nota=$_GET[kode_nota]' class='pull-right' target='_blank'>
				              	  <table border='0' style='background-color:#ff2; border-radius: 3px; height:30px;'>
				              	  <tr>
				              	  <td valign='middle' width='20px' align='center'><i class='glyphicon glyphicon-hand-right'></i></td>
				              	  <td align='center'><b>Blangko 09 - O</b></td>
				              	  </tr>
				              	  </table>
				              	  </a>
				              	</div><!-- /.col-->
				              	";
				            }
				            else
				            {
				            	echo"
				            	<div class='col-md-12'>

				              	<br><br>
				              	</div><!-- /.col-->
				              	";
				            }
				            echo"

			             </div><!-- /.col-->

                      </div><!-- /.box-body -->
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