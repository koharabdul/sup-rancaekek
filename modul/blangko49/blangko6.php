<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']))
{
    echo "Untuk mengakses modul, Anda harus login";
}
else{
$aksi="modul/blangko49/aksi_blangko6.php";
switch($_GET[act]){

	default:

	if($_GET[kode_nota]!='')
	{
		$datablangko5 = mysql_query("SELECT tgl_blangko05O,tgl_ket,bln_blangko05O,bln_ket,tahun_blangko05O,COUNT(id_nota)AS NOTA
  											FROM blangko05 
  											WHERE kode_nota = '$_GET[kode_nota]'
  											AND nama_irigasi = '$_SESSION[namairigasi]'
  											AND nama_personil = '$_SESSION[namalengkap]'");
		    $n = mysql_fetch_array($datablangko5);
		    $nota = $n[NOTA];//inti pengambilan
  			if($nota==0)
  			{
  				header('location:media.php?modul=blangko6&act=tampilerror');
  			}
  			else
  			{
  				$tdatablangko5 = mysql_query("SELECT *
  											FROM blangko05 
  											WHERE kode_nota = '$_GET[kode_nota]'
  											AND nama_irigasi = '$_SESSION[namairigasi]'
  											AND nama_personil = '$_SESSION[namalengkap]'");
								    $r = mysql_fetch_array($tdatablangko5);

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
		 header('location:media.php?modul=blangko6&act=tampilerror');
	}

	echo" 
                <div class='row'>
                  <div class='col-xs-12'>
                    <div class='box box-primary'>
                      <div class='box-body'>
                       <div class='col-md-12'>     
			             <table border=0 width='100%'>
			                        <tr>
			                          <td colspan=12 align=center><b>PENCATATAN DEBIT SALURAN</b></td>
			                         </tr>
			                         <tr>
			                          <td colspan=9></td>
			                          <td colspan=3><table border=1 bordercolor=#aaa align=right><tr><td><b>Blangko 06 - O </b></tr></td></table></td>
			                         </tr>
			                    </table>
			                </div><!-- /.col -->
			                <div class='col-md-6'>
			                  <table  border='0' width='100%' bordercolor='#00FF33'>
			                    <tr>
			                      <td colspan='3' style='width:280px;'>Daerah Irigasi 
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
			                      <input name=tgl_blangko05O type ='hidden' class='form-control4'  style=margin:inherit value='$r[tgl_blangko05O]' readonly/>
			                      <input name=bln_blangko05O type = hidden class='form-control4'  style=margin:inherit value='$r[bln_blangko05O]' readonly/>
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
			                   <div class='col-md-6'>
			                  <table  border='0' width='100%'>
			                    <tr>
			                      <td colspan='3' style='width:280px;'>Nama Daerah Ranting/Pengamat</td>
			                      <td width='1%'>:</td>
			                      <td colspan='3'><input name=limpas type = text class='form-control4'  style=margin:inherit value='$r[nama_ranting]' readonly></td>
			                      
			                    </tr>
			                    <tr>
			                      <td colspan='3'>Nama Daerah Manti/Juru</td>
			                      <td>:</td>
			                      <td colspan='3'><input name=irigasi type = text class='form-control4'  style=margin:inherit value='$r[nama_irigasi]' readonly/></td>
			                      
			                    </tr>
			                    <tr>
			                      <td colspan='3'>Luas Sawah Manti/Juru</td>
			                      <td>:</td>
			                      <td colspan='3'><input name='h' type = text class='form-control4'  style=margin:inherit value='$r[total_wilayah]' readonly/></td>
			                    </tr>
			                    <tr>
			                      <td colspan='3' style='height:24px;'>&nbsp;</td>
			                      <td>&nbsp;</td>
			                      <td colspan='3'>&nbsp;</td>
			                      
			                    </tr>
			                    <tr>
			                      <td colspan='3' align='center'>Bulan  </td>
			                      <td>:</td>
			                      <td colspan='2'><input name=bln_blangko05O type ='text' class='form-control4'  style='width:100px;' value='$r[bln_ket]' readonly/></td>
			                      <td><input name=limpas type = text class='form-control4'  style='width:60px;' value='$r[tahun_blangko05O]' readonly></td>
			                      
			                    </tr>
			                  </table>
			                </div><!-- /.col -->
			                <div class='col-md-12'>
			                 <div class='scroll-pane2 ui-widget2 '>
                              <div class='scroll-content2'>
                              <table width='100%' border='1' class='tables no-margin table-bordered table-striped' style='border-right:1px;'>
								  <tr>
								    <td rowspan='4' width='3%' align='center'>No</td>
								    <td rowspan='4' align='center' width='13%'>Nama Bangunan Kontrol<br />(Bagi/Bagi Sadap/Sadap)</td>
								    <td colspan='16' rowspan='2' align='center'>Debit (1/det) pada tanggal</td>
								    <td rowspan='4' align='center' width='6%'>Jumlah<br />Debit<br />(I/det)</td>
								    <td rowspan='4' align='center' width='6%'>Debit<br />Rata-rata<br />setengah<br />bulana<br />(I/det)</td>
								    <td colspan='2' align='center' width='13%'>Cara Pengukuran Debit</td>
								    <td colspan='2' rowspan='2' align='center'>Kondisi Alat Ukur</td>
								  </tr>
								  <tr>
								    <td colspan='2' align='center'>*3)</td>
								   
								  </tr>
								  <tr>
							  	";
							  	if($r[tgl_blangko05O]=='1')
							  	{ echo"
								    <td align='center' width='3%'>1</td>
								    <td align='center' width='3%'>2</td>
								    <td align='center' width='3%'>3</td>
								    <td align='center' width='3%'>4</td>
								    <td align='center' width='3%'>5</td>
								    <td align='center' width='3%'>6</td>
								    <td align='center' width='3%'>7</td>
								    <td align='center' width='3%'>8</td>
								    <td align='center' width='3%'>9</td>
								    <td align='center' width='3%'>10</td>
								    <td align='center' width='3%'>11</td>
								    <td align='center' width='3%'>12</td>
								    <td align='center' width='3%'>13</td>
								    <td align='center' width='3%'>14</td>
								    <td align='center' width='3%'>15</td>
								    <td width='3%'>&nbsp;</td>";
								}
								else
								{
									echo"
								    <td align='center' width='3%' style='text-decoration:line-through;'>1</td>
								    <td align='center' width='3%' style='text-decoration:line-through;'>2</td>
								    <td align='center' width='3%' style='text-decoration:line-through;'>3</td>
								    <td align='center' width='3%' style='text-decoration:line-through;'>4</td>
								    <td align='center' width='3%' style='text-decoration:line-through;'>5</td>
								    <td align='center' width='3%' style='text-decoration:line-through;'>6</td>
								    <td align='center' width='3%' style='text-decoration:line-through;'>7</td>
								    <td align='center' width='3%' style='text-decoration:line-through;'>8</td>
								    <td align='center' width='3%' style='text-decoration:line-through;'>9</td>
								    <td align='center' width='3%' style='text-decoration:line-through;'>10</td>
								    <td align='center' width='3%' style='text-decoration:line-through;'>11</td>
								    <td align='center' width='3%' style='text-decoration:line-through;'>12</td>
								    <td align='center' width='3%' style='text-decoration:line-through;'>13</td>
								    <td align='center' width='3%' style='text-decoration:line-through;'>14</td>
								    <td align='center' width='3%' style='text-decoration:line-through;'>15</td>
								    <td width='3%' style='text-decoration:line-through;' align='center'>&nbsp;</td>";
								}
								echo"
								    <td rowspan='2' align='center' style='font-size:12px;'>a<br />(Ada Bangunan<br />Ukur)</td>
								    <td rowspan='2' align='center'>b<br />(Cara Lain)</td>
								    <td rowspan='2' align='center' width='5%'>Baik</td>
									<td rowspan='2' align='center' width='7%' style='border-right:1px;'>Rusak</td>
								  </tr>
								  <tr>";
								if($r[tgl_blangko05O]=='1')
							  	{ echo"  
								    <td align='center' style='text-decoration:line-through;'>16</td>
								    <td align='center' style='text-decoration:line-through;'>17</td>
								    <td align='center' style='text-decoration:line-through;'>18</td>
								    <td align='center' style='text-decoration:line-through;'>19</td>
								    <td align='center' style='text-decoration:line-through;'>20</td>
								    <td align='center' style='text-decoration:line-through;'>21</td>
								    <td align='center' style='text-decoration:line-through;'>22</td>
								    <td align='center' style='text-decoration:line-through;'>23</td>
								    <td align='center' style='text-decoration:line-through;'>24</td>
								    <td align='center' style='text-decoration:line-through;'>25</td>
								    <td align='center' style='text-decoration:line-through;'>26</td>
								    <td align='center' style='text-decoration:line-through;'>27</td>
								    <td align='center' style='text-decoration:line-through;'>28</td>
								    <td align='center' style='text-decoration:line-through;'>29</td>
								    <td align='center' style='text-decoration:line-through;'>30</td>
								    <td align='center' style='text-decoration:line-through;'>31</td>
								    ";
								}
								else
								{
									if($t[jumlahhari]=='16')
									{
										echo"  
									    <td align='center'>16</td>
									    <td align='center'>17</td>
									    <td align='center'>18</td>
									    <td align='center'>19</td>
									    <td align='center'>20</td>
									    <td align='center'>21</td>
									    <td align='center'>22</td>
									    <td align='center'>23</td>
									    <td align='center'>24</td>
									    <td align='center'>25</td>
									    <td align='center'>26</td>
									    <td align='center'>27</td>
									    <td align='center'>28</td>
									    <td align='center'>29</td>
									    <td align='center'>30</td>
									    <td align='center'>31</td>
								    ";
									}
									else if($t[jumlahhari]=='15')
									{
										echo"  
									    <td align='center'>16</td>
									    <td align='center'>17</td>
									    <td align='center'>18</td>
									    <td align='center'>19</td>
									    <td align='center'>20</td>
									    <td align='center'>21</td>
									    <td align='center'>22</td>
									    <td align='center'>23</td>
									    <td align='center'>24</td>
									    <td align='center'>25</td>
									    <td align='center'>26</td>
									    <td align='center'>27</td>
									    <td align='center'>28</td>
									    <td align='center'>29</td>
									    <td align='center'>30</td>
									    <td align='center' style='text-decoration:line-through;'>31</td>
								    ";
									}
									else if($t[jumlahhari]=='14')
									{
										echo"  
									    <td align='center'>16</td>
									    <td align='center'>17</td>
									    <td align='center'>18</td>
									    <td align='center'>19</td>
									    <td align='center'>20</td>
									    <td align='center'>21</td>
									    <td align='center'>22</td>
									    <td align='center'>23</td>
									    <td align='center'>24</td>
									    <td align='center'>25</td>
									    <td align='center'>26</td>
									    <td align='center'>27</td>
									    <td align='center'>28</td>
									    <td align='center'>29</td>
									    <td align='center' style='text-decoration:line-through;'>30</td>
									    <td align='center' style='text-decoration:line-through;'>31</td>
								    ";
									}
									else if($t[jumlahhari]=='13')
									{
										echo"  
									    <td align='center'>16</td>
									    <td align='center'>17</td>
									    <td align='center'>18</td>
									    <td align='center'>19</td>
									    <td align='center'>20</td>
									    <td align='center'>21</td>
									    <td align='center'>22</td>
									    <td align='center'>23</td>
									    <td align='center'>24</td>
									    <td align='center'>25</td>
									    <td align='center'>26</td>
									    <td align='center'>27</td>
									    <td align='center'>28</td>
									    <td align='center' style='text-decoration:line-through;'>29</td>
									    <td align='center' style='text-decoration:line-through;'>30</td>
									    <td align='center' style='text-decoration:line-through;'>31</td>
								    ";
									}
								}
								echo"
								  </tr>
								  <tr>
								    <td colspan='24' height='2px'></td>
								  </tr>
								";
								$tampil=mysql_query("SELECT * FROM blangko06 
								    						WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						AND nama_personil = '$_SESSION[namalengkap]'
								    						AND kode_nota = '$_GET[kode_nota]' ORDER BY no ASC");
							    while($z=mysql_fetch_array($tampil))
							    {
								echo"
								  <tr>
								    <td align='center' height='22px'>$z[no]</td>
								    <td align='center'>$z[nmbangunankontrol]</td>
								    <td align='center'>$z[hari1]</td>
								    <td align='center'>$z[hari2]</td>
								    <td align='center'>$z[hari3]</td>
								    <td align='center'>$z[hari4]</td>
								    <td align='center'>$z[hari5]</td>
								    <td align='center'>$z[hari6]</td>
								    <td align='center'>$z[hari7]</td>
								    <td align='center'>$z[hari8]</td>
								    <td align='center'>$z[hari9]</td>
								    <td align='center'>$z[hari10]</td>
								    <td align='center'>$z[hari11]</td>
								    <td align='center'>$z[hari12]</td>
								    <td align='center'>$z[hari13]</td>
								    <td align='center'>$z[hari14]</td>
								    <td align='center'>$z[hari15]</td>
								    <td align='center'>$z[hari16]</td>
								    <td align='center'>$z[jumlahdebit]</td>
								    <td align='center'>$z[debitrata]</td>
								    ";
								    if($z[pengukurandebit]=='Alat Ukur')
								    {  
								    	echo"
									    <td align='center'><i class='fa fa-check-square'></i></td>
									    <td align='center'>&nbsp;</td>
									    ";
									}
									else
									{
										echo"
									    <td align='center'>&nbsp;</td>
									    <td align='center'><i class='fa fa-check-square'></i></td>
									    ";
									}
									if($z[kondisialatukur]=='Baik')
									{
										echo"
									    <td align='center'><i class='fa fa-check-square'></i></td>
									    <td align='center'>&nbsp;</td>
										";
									}
									else if($z[kondisialatukur]=='Rusak')
									{
										echo"
									    <td align='center'>&nbsp;</td>
									    <td align='center'><i class='fa fa-check-square'></i></td>
										";
									}
									else
									{
										echo"
									    <td align='center'>&nbsp;</td>
									    <td align='center'>&nbsp;</td>
									    ";
									}
									echo"
								  </tr>
								  ";
								}
								echo"
								  <tr>
								    <td colspan='24' height='2px'></td>
								  </tr>
								</table>
							  </div><!--/.scroll-content -->
							 </div><!--/.scroll-panel -->
							</div><!--/.scroll-col -->

							 ";
			               //  $tempo = mysql_query("SELECT COUNT(`no`) AS isi FROM blangko06 
								    						// WHERE nama_irigasi = '$_SESSION[namairigasi]' 
								    						// AND nama_personil = '$_SESSION[namalengkap]'
								    						// AND kode_nota ='$_GET[kode_nota]'");
			               //          $p    = mysql_fetch_array($tempo);
			               //          $isi = $p[isi];  
			               //  if($isi == $_SESSION[jumlahtersier])
			              	// {
			              		echo"
				              	<div class='col-md-12'>
				              	  
				              	  <br><a href='?modul=blangko7&kode_nota=$_GET[kode_nota]' class='pull-right' target='_blank'>
				              	  <table border='0' style='background-color:#ff2; border-radius: 3px; height:30px;'>
				              	  <tr>
				              	  <td valign='middle' width='20px' align='center'><i class='glyphicon glyphicon-hand-right'></i></td>
				              	  <td align='center'><b>Blangko 07 - O</b></td>
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