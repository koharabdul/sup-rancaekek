<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']))
{
    echo "Untuk mengakses modul, Anda harus login";
}
else{
$aksi="modul/blangko49/aksi_blangko9.php";
switch($_GET[act]){

	default:

	if($_GET[kode_nota]!='')
	{
		$datablangko7 = mysql_query("SELECT tgl_blangko07O,tgl_ket,bln_blangko07O,bln_ket,tahun_blangko07O,COUNT(id_nota)AS NOTA
  											FROM blangko07 
  											WHERE kode_nota = '$_GET[kode_nota]'
  											AND nama_irigasi = '$_SESSION[namairigasi]'
  											AND nama_personil = '$_SESSION[namalengkap]'");
		    $n = mysql_fetch_array($datablangko7);
		    $nota = $n[NOTA];//inti pengambilan
  			if($nota==0)
  			{
  				header('location:media.php?modul=blangko9&act=tampilerror');
  			}
  			else
  			{
  				$tdatablangko9 = mysql_query("SELECT *
  											FROM blangko09 
  											WHERE kode_nota = '$_GET[kode_nota]'
  											AND nama_irigasi = '$_SESSION[namairigasi]'
  											AND nama_personil = '$_SESSION[namalengkap]'");
								    $r = mysql_fetch_array($tdatablangko9);

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
		 header('location:media.php?modul=blangko9&act=tampilerror');
	}

	echo" 
                <div class='row'>
                  <div class='col-xs-12'>
                    <div class='box box-primary'>
                      <div class='box-body'>
                       <div class='col-md-12'>     
			             <table border=0 width='100%'>
			                        <tr>
			                          <td colspan=12 align=center><b>PERHITUNGAN FAKTOR - K</b></td>
			                         </tr>
			                         <tr>
			                          <td colspan=9></td>
			                          <td colspan=3><table border=1 bordercolor=#aaa align=right><tr><td><b>Blangko 09 - O </b></tr></td></table></td>
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
			                      <input name=tgl_blangko05O type ='hidden' class='form-control4'  style=margin:inherit value='$r[tgl_blangko09O]' readonly/>
			                      <input name=bln_blangko05O type = hidden class='form-control4'  style=margin:inherit value='$r[bln_blangko09O]' readonly/>
			                      <input name=irigasi type = text class='form-control4'  style=margin:inherit value='$r[kode_irigasi]' readonly/></td>
			                      
			                    </tr>
			                    <tr>
			                      <td colspan='3'>Total Luas Irigasi DI </td>
			                      <td>:</td>
			                      <td colspan='3'><input name='h' type = text class='form-control4'  style=margin:inherit value='$r[total_wilayah]' readonly/></td>
			                     
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
			                      <td colspan='3' style='width:320px;'>Mantri/Juru Pengairan</td>
			                      <td width='1%'>:</td>
			                      <td colspan='3'><input name=limpas type = text class='form-control4'  style=margin:inherit value='$r[nama_irigasi]' readonly></td>
			                      
			                    </tr>
			                    <tr>
			                      <td colspan='3'>Ranting/Pengamat</td>
			                      <td>:</td>
			                      <td colspan='3'><input name=irigasi type = text class='form-control4'  style=margin:inherit value='$r[nama_ranting]' readonly/></td>
			                      
			                    </tr>
			                    <tr>
			                      <td colspan='3'>Kabupaten</td>
			                      <td>:</td>
			                      <td colspan='3'><input name='kabupaten' type = text class='form-control4'  style=margin:inherit value='$r[kabupaten]' readonly/></td>
			                      
			                    </tr>
			                    <tr>
			                      <td colspan='3'>Periode Pemberian Air Tanggal =  &nbsp;&nbsp;&nbsp;<b>$r[tgl_ket]</b></td>
			                      <td></td>
			                      <td colspan='2'><input name=bln_blangko05O type ='text' class='form-control9'  style='width:100px;' value='$r[bln_ket]' readonly/></td>
			                      <td><input name=limpas type = text class='form-control9'  style='width:60px;' value='$r[tahun_blangko07O]' readonly></td>
			                      
			                    </tr>
			                  </table>
			                </div><!-- /.col -->

			                <div class='col-md-6'>
				                
				                <br>
				                <p><b>1. &nbsp;&nbsp;&nbsp;Debit diperlukan (dari blangko 07 - O)</b></p>
				                <table border='0' width='100%' >
				                   <tr>
					                    <td rowspan='7' height='30px'>
					                	<table width='100%' border='1' style='border:1px solid rgba(0, 166, 90, 0.38);' class='tables no-margin table-striped'>
										  <tr>
										    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);' height='30px' width='10%'>No</td>
										    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);' width='25%'>Kode</td>
										    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>Debit</td>
										    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>Jumlah (I/det) </td>
										  </tr>
										  <tr>
										    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);' height='25px'>1.1.</td>
										    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>Qt</td>
										    <td align='left' style='border:1px solid rgba(0, 166, 90, 0.38);padding:0 3px;'>Di pintu tersier </td>
										    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
										  </tr>
										  <tr>
										    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);' height='25px'>1.2.</td>
										    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>Ql</td>
										    <td align='left' style='border:1px solid rgba(0, 166, 90, 0.38);padding:0 3px;'>Kep. Lain-lain </td>
										    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
										  </tr>
										  <tr>
										    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);' height='25px'>1.3.</td>
										    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>Qh</td>
										    <td align='left' style='border:1px solid rgba(0, 166, 90, 0.38);padding:0 3px;'>Hilang</td>
										    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
										  </tr>
										  <tr>
										    <td rowspan='2' align='center' height='50px' style='border:1px solid rgba(0, 166, 90, 0.38);'>1.4.</td>
										    <td rowspan='2' align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>Qs</td>
										    <td align='left' style='border:1px solid rgba(0, 166, 90, 0.38);padding:0 3px;'>Jumlah : </td>
										    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
										  </tr>
										  <tr>
										    <td align='left' height='25px' style='border:1px solid rgba(0, 166, 90, 0.38);padding:0 3px;'>Suplesi : </td>
										    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
										  </tr>
										  <tr>
										    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);' height='25px'>1.5.</td>
										    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>Qb</td>
										    <td align='left' style='border:1px solid rgba(0, 166, 90, 0.38);padding:0 3px;'>Di Bendung </td>
										    <td align='left' style='border:1px solid rgba(0, 166, 90, 0.38);padding:0 3px;'>(a).</td>
										  </tr>
										</table>
										</td>
										<td height='26px' width='20px'></td>
									</tr>
									<tr>
										<td height='21px'></td>
									</tr>
									<tr>
										<td height='21px'></td>
									</tr>
									<tr>
										<td height='21px' align='center'>(+)</td>
									</tr>
									<tr>
										<td height='21px'></td>
									</tr>
									<tr>
										<td height='21px' align='center'>(-)</td>
									</tr>
									<tr>
										<td height='21px'></td>
									</tr>
							   </table>
				              	
			              	</div><!-- /.col-->

			              	<div class='col-md-6'>
				               
				                <br>
				                <p><b>2. &nbsp;&nbsp;&nbsp;Debit Tersedia (dari blangko 08 - O) **)</b></p>
				                <table border='0' width='100%'>
				                   <tr>
					                    <td rowspan='7' height='30px' valign='top' >
						                	<table width='100%' border='1' style='border:1px solid rgba(0, 166, 90, 0.38);' class='tables no-margin table-striped'>
											  <tr>
											    <td rowspan='3' align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>No</td>
											    <td colspan='3' align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>Q Rata-rata</td>
											  </tr>
											  <tr>
											    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);' rowspan='2' width='30%'>Tanggal</td>
											    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);' width='30%'>Jumlah</td>
											    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);' width='30%'>Faktor K</td>
											  </tr>
											  <tr>
											    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>(m3/det)</td>
											    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>(K1/K2/K3...)</td>
											  </tr>
											    <td height='117px'>&nbsp;</td>
											    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
											    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
											    <td style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
											  </tr>
											</table>
										</td>
										<td height='26px' width='20px'></td>
									</tr>
									<tr>
										<td height='21px'></td>
									</tr>
									<tr>
										<td height='21px'></td>
									</tr>
									<tr>
										<td height='21px'></td>
									</tr>
									<tr>
										<td height='21px'></td>
									</tr>
									<tr>
										<td height='21px'></td>
									</tr>
									<tr>
										<td height='21px' align='center'>(b)</td>
									</tr>
							   </table>
				              	
			              	</div><!-- /.col-->

			              	<div class='col-md-8'>
				                <br>
				                <p><b>3. &nbsp;&nbsp;&nbsp;Debit dialirkan</b></p>
				                <table width='96%' border='1' class='tables no-margin table-striped'>
								  <tr>
								    <td colspan='2' align='center' height='26px' style='border:1px solid rgba(0, 166, 90, 0.38);'>Neraca</td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>Debit dialirkan (Qa)</td>
								    <td colspan='2' align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>Batas Normal</td>
								  </tr>
								  <tr>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);' height='24px' width='25%'>Debit</td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);' width='20%'>(I/det)</td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);' width='25%'>(I/det)</td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);' width='10%'>(I/det)</td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>Debit</td>
								  </tr>
								  <tr>
								    <td height='24px' style='border:1px solid rgba(0, 166, 90, 0.38);padding:0 3px;'>Tersedia (Qra) (b) </td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>Q 100 % Saluran </td>
								  </tr>
								  <tr>
								    <td height='24px' style='border:1px solid rgba(0, 166, 90, 0.38);padding:0 3px;'>Diperlukan (Qb) (a) </td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>Q 70 % Saluran </td>
								  </tr>
								</table>
				              	
			              	</div><!-- /.col-->

			              	<div class='col-md-6'>
				                <br>
				                <p><b>4. &nbsp;&nbsp;&nbsp;Perhitungan Faktor K</b></p>
				               <table width='96%' border='1' style='border:1px solid rgba(0, 166, 90, 0.38);' class='tables no-margin table-striped'>
								  <tr>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);' width='10%' height='48px'>No</td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);' width='25%'>Kode</td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);' width='30%'>Debit<br>(I/det)</td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);' width='30%'>Total Debit <br>(I/det)</td>
								  </tr>
								  <tr>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);' height='24px'>4.1</td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>(Qa)</td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								    <td align='left' rowspan='2' style='border:1px solid rgba(0, 166, 90, 0.38);padding:0 3px;'>(c)</td>
								  </tr>
								  <tr>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);' height='24px'>4.2</td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>Qs</td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								  </tr>
								  <tr>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);' height='24px'>4.3</td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>Ql</td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								    <td align='left' rowspan='2' style='border:1px solid rgba(0, 166, 90, 0.38);padding:0 3px;'>(d)</td>
								  </tr>
								  <tr>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);' height='24px'>4.4</td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>Qh</td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								  </tr>
								  <tr>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);' height='24px'>4.5</td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);' colspan='2'>Selisih = (c) - (d) </td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								  </tr>
								  <tr>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);' height='24px'>4.6</td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);' colspan='2'>Qt</td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								  </tr>
								  <tr>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);' height='48px'>&nbsp;</td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);' colspan='2'>
								    	<b>
								    		<table border='0' width='45%'>
								    			<tr>
								    				<td rowspan='3' align='center'>Faktor - K =</td>
								    				<td width='30%' align='center'>4.5</td>
								    			</tr>
								    			<tr>
								    				<td><hr style='margin-top:0px;margin-bottom:0px;border: 1px solid #555;'></td>
								    			</tr>
								    			<tr>
								    				<td align='center'>4.6</td>
								    			</tr>
								    		</table>
								    	</b>
								    </td>
								    <td align='center' style='border:1px solid rgba(0, 166, 90, 0.38);'>&nbsp;</td>
								  </tr>
								</table>

				              	
			              	</div><!-- /.col-->

			                <div class='col-md-12'>
			              	<br><br>
			              	</div><!-- /.col-->
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