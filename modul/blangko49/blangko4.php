<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']))
{
    echo "Untuk mengakses modul, Anda harus login";
}
else{
$aksi="modul/blangko49/aksi_blangko4.php";
switch($_GET[act]){



  default:


    $notaperirigasi = mysql_query("SELECT  LPAD(COUNT(`id_nota`),5,'0') AS countNota FROM blangko04 
                                    WHERE nama_irigasi = '$_SESSION[namairigasi]' 
                                    AND tgl_blangko04O = '$_GET[menu_tanggal]' 
                                    AND bln_blangko04O = '$_GET[menu_bulan]' 
                                    AND tahun_blangko04O = '$_GET[menu_tahun]'");
    $n = mysql_fetch_array($notaperirigasi);
    $countNota = $n[countNota];//inti pengambilan

     if($countNota == 0)
    {
        $notaperirigasi = mysql_query("SELECT LPAD(MAX(`id_nota`)+1,5,'0') AS maxNota1 FROM blangko04 WHERE nama_irigasi = '$_SESSION[namairigasi]'");
        $mx = mysql_fetch_array($notaperirigasi);
        $maxNota1 = $mx[maxNota1];
        $n[countNota] = $maxNota1;
        if($maxNota1==0)
        {
           $n[countNota] = "00001";
        }



                  if($_GET[menu_tanggal]=='1')
                       {
                           $menutanggal = "1 s/d 15";
                           $hari = "15";
                           if($_GET[menu_bulan]=='1')
                           {
                              $menubulan = "Januari";
                              $masatanam = "MT.1";
                           }
                            elseif($_GET[menu_bulan]=='2')
                           {
                              $menubulan = "Februari";  
                              $masatanam = "MT.1";                            
                           }
                           elseif($_GET[menu_bulan]=='3')
                           {
                              $menubulan = "Maret";
                              $masatanam = "MT.1";
                           }
                           elseif($_GET[menu_bulan]=='4')
                           {
                              $menubulan = "April";
                              $masatanam = "MT.2";
                           }
                           elseif($_GET[menu_bulan]=='5')
                           {
                              $menubulan = "Mei";
                              $masatanam = "MT.2";
                           }
                           elseif($_GET[menu_bulan]=='6')
                           {
                              $menubulan = "Juni";
                              $masatanam = "MT.2";
                           }
                           elseif($_GET[menu_bulan]=='7')
                           {
                              $menubulan = "Juli";
                              $masatanam = "MT.2";
                           }
                           elseif($_GET[menu_bulan]=='8')
                           {
                              $menubulan = "Agustus";
                              $masatanam = "MT.2";
                           }
                           elseif($_GET[menu_bulan]=='9')
                           {
                              $menubulan = "September";
                              $masatanam = "MT.2";
                           }
                           elseif($_GET[menu_bulan]=='10')
                           {
                              $menubulan = "Oktober";
                              $masatanam = "MT.1";
                           }
                           elseif($_GET[menu_bulan]=='11')
                           {
                              $menubulan = "Nopember";
                              $masatanam = "MT.1";
                           }
                           elseif($_GET[menu_bulan]=='12')
                           {
                              $menubulan = "Desember";
                              $masatanam = "MT.1";
                           }
                           else
                           {
                              header('location:media.php?modul=blangko4&act=tampilerror');
                           }
                       }
                       else if($_GET[menu_tanggal]=='2')
                       {
                           if($_GET[menu_bulan]=='1')
                           {
                              $menutanggal = "16 s/d 31";
                              $menubulan = "Januari";
                              $hari = "16";
                              $masatanam = "MT.1";
                           }
                            elseif($_GET[menu_bulan]=='2')
                           {
                              if(($_GET[menu_tahun]=='2000')or($_GET[menu_tahun]=='2004')or($_GET[menu_tahun]=='2008')or($_GET[menu_tahun]=='2012')or($_GET[menu_tahun]=='2016')or($_GET[menu_tahun]=='2020')or($_GET[menu_tahun]=='2024')or($_GET[menu_tahun]=='2028'))
                              {
                                 $menutanggal = "16 s/d 29";
                                 $menubulan = "Februari";
                                 $hari = "14";
                                 $masatanam = "MT.1";
                              }
                              else
                              {
                                 $menutanggal = "16 s/d 28";
                                 $menubulan = "Februari";
                                 $hari = "13";
                                 $masatanam = "MT.1";
                              }
                              
                           }
                           elseif($_GET[menu_bulan]=='3')
                           {
                              $menutanggal = "16 s/d 31";
                              $menubulan = "Maret";
                              $hari = "16";
                              $masatanam = "MT.1";
                           }
                           elseif($_GET[menu_bulan]=='4')
                           {
                              $menutanggal = "16 s/d 30";
                              $menubulan = "April";
                              $hari = "15";
                              $masatanam = "MT.2";
                           }
                           elseif($_GET[menu_bulan]=='5')
                           {
                              $menutanggal = "16 s/d 31";
                              $menubulan = "Mei";
                              $hari = "16";
                              $masatanam = "MT.2";
                           }
                           elseif($_GET[menu_bulan]=='6')
                           {
                              $menutanggal = "16 s/d 30";
                              $menubulan = "Juni";
                              $hari = "15";
                              $masatanam = "MT.2";
                           }
                           elseif($_GET[menu_bulan]=='7')
                           {
                              $menutanggal = "16 s/d 31";
                              $menubulan = "Juli";
                              $hari = "16";
                              $masatanam = "MT.2";
                           }
                           elseif($_GET[menu_bulan]=='8')
                           {
                              $menutanggal = "16 s/d 31";
                              $menubulan = "Agustus";
                              $hari = "16";
                              $masatanam = "MT.2";
                           }
                           elseif($_GET[menu_bulan]=='9')
                           {
                              $menutanggal = "16 s/d 30";
                              $menubulan = "September";
                              $hari = "15";
                              $masatanam = "MT.2";
                           }
                           elseif($_GET[menu_bulan]=='10')
                           {
                              $menutanggal = "16 s/d 31";
                              $menubulan = "Oktober";
                              $hari = "16";
                              $masatanam = "MT.1";
                           }
                           elseif($_GET[menu_bulan]=='11')
                           {
                              $menutanggal = "16 s/d 30";
                              $menubulan = "Nopember";
                              $hari = "15";
                              $masatanam = "MT.1";
                           }
                           elseif($_GET[menu_bulan]=='12')
                           {
                              $menutanggal = "16 s/d 31";
                              $menubulan = "Desember";
                              $hari = "16";
                              $masatanam = "MT.1";
                           }
                           else
                           {
                              header('location:media.php?modul=blangko4&act=tampilerror');
                           }
                       }
                       else
                       {
                          header('location:media.php?modul=blangko4&act=tampilerror');
                       }

                       //UNTUK TAHUN ERROR
                          $TH = 2000;
                          $THM = 2016;
                          if($_GET[menu_tahun]>$THM)
                          {
                              header('location:media.php?modul=debit&act=tampilerror');
                          }
                          else if($_GET[menu_tahun]<$TH)
                          {
                              header('location:media.php?modul=debit&act=tampilerror');
                          }
                       //UNTUK TAHUN ERROR

                       if($masatanam=='MT.1')
                       {
                           $masaperiode1 = "Oktober";
                           $masaperiode2 = "Maret";
                           if(($menubulan == 'Oktober') OR ($menubulan == 'Nopember') OR ($menubulan == 'Desember'))
                           {
                              $masatahun1 = $_GET[menu_tahun];
                              $masatahun2 = $_GET[menu_tahun] + 1;
                           }
                           else if(($menubulan == 'Januari') OR ($menubulan == 'Februari') OR ($menubulan == 'Maret'))
                           {
                              $masatahun1 = $_GET[menu_tahun] - 1;
                              $masatahun2 = $_GET[menu_tahun];
                           }
                       }
                       else if($masatanam == 'MT.2')
                       {
                           $masaperiode1 = "April";
                           $masaperiode2 = "September";
                           $masatahun1 = $_GET[menu_tahun];
                           $masatahun2 = $_GET[menu_tahun];
                       }

                       if(($_GET[menu_bulan]=='10')OR($_GET[menu_bulan]=='11')OR($_GET[menu_bulan]=='12'))
                       {
                           $notaBln = $_GET[menu_bulan];
                       }
                       else
                       {
                           $notaBln = "0$_GET[menu_bulan]";
                       }

                       $nyarinama = mysql_query("SELECT LPAD(id_personil,3,'0') AS idPersonil FROM personil,irigasi,ranting 
                                WHERE personil.id_irigasi = irigasi.id_irigasi
                                AND irigasi.id_ranting = ranting.id_ranting
                                AND nama_lengkap = '$_SESSION[namalengkap]'
                                AND nama_irigasi = '$_SESSION[namairigasi]'");
                       $y = mysql_fetch_array($nyarinama);
                       $idPersonil = $y[idPersonil];//inti pengambilan
                     
                        
                       

                        
          
          echo"<div class='row'>
            <div class='col-xs-12'>
              <div class='box box-primary'>
                <div class='box-body'>
                <div class='col-md-12'>     
                    <table border=0 width='100%'>
                        <tr>
                          <td colspan=12 align=center><b>LAPORAN KEADAAN AIR DAN TANAMAN PADA WILAYAH MANTRI / JURU  </b></td>
                         </tr>
                         <tr>
                          <td colspan=9></td>
                          <td colspan=3><table border=1 bordercolor=#aaa align=right><tr><td><b>Blangko 04 - O </b></tr></td></table></td>
                         </tr>
                    </table>
                </div><!-- /.col -->
                <form name=flatihan1 method=POST  action='$aksi?modul=blangko4&act=input'>
                <div class='col-md-6'>
                  <table width='100%' border='0'>
                    <tr>
                      <td colspan='3' width='40%'>Daerah Irigasi <input type=hidden name=nota class='form-control'  style=margin:inherit value='$n[countNota]' >
                          <input type=hidden name=kd_nota class='form-control'  style=margin:inherit value='BLK-$_SESSION[koderanting]-$_GET[menu_tanggal]$notaBln$_GET[menu_tahun]$y[idPersonil]$n[countNota]-$_SESSION[kdIrigasi]'></td>
                          <input type=hidden name=jumlahhari class='form-control'  style=margin:inherit value='$hari' >
                      <td width='1%'><input name=bulan type=hidden class='form-control' style=margin:inherit value='$_GET[menu_bulan]' >:</td>
                      <td colspan='3'><input type=hidden name=tgl class='form-control'  style=margin:inherit value='$_GET[menu_tanggal]' ><input name=limpas type = text class='form-control4'  style=margin:inherit value='$_SESSION[namairigasi]' readonly></td>
                      
                    </tr>
                    <tr>
                      <td colspan='3'>Nomer Kode DI </td>
                      <td>:</td>
                      <td colspan='3'><input name=irigasi type = text class='form-control4'  style=margin:inherit value='$_SESSION[kodeirigasi]' readonly/></td>
                      
                    </tr>
                    <tr>
                      <td colspan='3'>Total Luas Irigasi DI </td>
                      <td>:</td>
                      <td colspan='3'><input name='h' type = text class='form-control4'  style=margin:inherit value='$_SESSION[totalwilayah]' readonly/></td>
                     
                    </tr>
                    <tr>
                      <td colspan='3'>Kabupaten</td>
                      <td>:</td>
                      <td colspan='3'><input name='kabupaten' type = text class='form-control4'  style=margin:inherit value='$_SESSION[kab]' readonly/></td>
                      
                    </tr>
                    <tr>
                      <td colspan='3'>Bagian Pelaks. Kegiatan </td>
                      <td>:</td>
                      <td colspan='3'><input name=limpas type = text class='form-control4'  style=margin:inherit value='$_SESSION[bagianpelaksana]' readonly></td>
                      
                    </tr>
                  </table>
                </div><!-- /.col -->

               
                <div class='col-md-6'>
                  <table width='100%' border='0'>
                    <tr>
                      <td colspan='2' width='40%'>Jumlah Petak Tersier </td>
                      
                      <td width='1%'>:</td>
                      <td colspan='3'><input name=kab type = text class='form-control4'  style=margin:inherit value='$_SESSION[jumlahtersier]' readonly/></td>
                    </tr>
                    <tr>
                      <td colspan='2'>Luas Sawah Mantri / Juru </td>
                      <td>:</td>
                      <td colspan='3'><input name=rantingpengamat type = text class='form-control4'  style=margin:inherit value='$_SESSION[totalwilayah]' readonly/></td>                    </tr>
                    <tr>
                      <td height='24px'>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan='2'>Periode Pemberian Air Tgl. = </td>
                      <td>:</td>
                      <td><input name=ket_tgl type = text class='form-control4'  style=margin:inherit value='$menutanggal' readonly/></td>
                      <td><input name=ket_bln type = text class='form-control4'  style=margin:inherit value='$menubulan'readonly/></td>
                      <td><input name=ket_thn type = text class='form-control4'  style=margin:inherit value='$_GET[menu_tahun]'readonly/></td>
                    </tr>
                    <tr>
                      <td height='24px'>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>
                  </table>
                </div><!-- /.col-->
                   
                <div class='col-md-6'>
                    <table width='100%' border='0'>
                     <tr>
                      <td style='width:90px;'>Masa Tanam </td>
                      <td>:</td>
                      <td style='width:85px;'>
                             <select name='menu_masatanam' class='form-control' style='width:85px;' >
                                    <option value=$masatanam selected>$masatanam</option>
                                    <option value='MT.1'>MT.1</option>
                                    <option value='MT.2'>MT.2</option>
                                    <option value='MT.3'>MT.3</option>
                             </select>
                      </td>
                      <td align='center'>Bulan</td>
                      <td style='width:140px;' ><select name='menu_bulan' class='form-control' style='width:140px;' >
                                    <option value=$masaperiode1 selected>$masaperiode1</option>
                                    <option value='Januari'>Januari</option>
                                    <option value='Februari'>Februari</option>
                                    <option value='Maret'>Maret</option>
                                    <option value='April'>April</option>
                                    <option value='Mei'>Mei</option>
                                    <option value='Juni'>Juni</option>
                                    <option value='Juli'>Juli</option>
                                    <option value='Agustus'>Agustus</option>
                                    <option value='September'>September</option>
                                    <option value='Oktober'>Oktober</option>
                                    <option value='Nopember'>Nopember</option>
                                    <option value='Desember'>Desember</option>
                                  </select></td>
                      <td style='width:90px;'><select name='menu_tahun' class='form-control' style='width:90px;'>
                                    <option value=$masatahun1 selected>$masatahun1</option>";
                                           $TH1 = $masatahun1;
                                           for($TH1=$masatahun1 + 1; $TH1<=2016; $TH1++)
                                           {
                                              echo"<option value=$TH1>$TH1</option>";
                                           }
                             echo"</select></td>
                      </tr>
                      </table>
                </div><!-- /.col-->
             
                <div class='col-md-6'>
                      <table width='100%' border='0'>
                      <tr>                    
                      <td style='width:80px;' >s/d bulan </td>
                      <td style='width:140px;'>
                                <select name='menu_bulan2' class='form-control' style='width:140px;'>
                                    <option value=$masaperiode2 selected>$masaperiode2</option>
                                    <option value='Januari'>Januari</option>
                                    <option value='Februari'>Februari</option>
                                    <option value='Maret'>Maret</option>
                                    <option value='April'>April</option>
                                    <option value='Mei'>Mei</option>
                                    <option value='Juni'>Juni</option>
                                    <option value='Juli'>Juli</option>
                                    <option value='Agustus'>Agustus</option>
                                    <option value='September'>September</option>
                                    <option value='Oktober'>Oktober</option>
                                    <option value='Nopember'>Nopember</option>
                                    <option value='Desember'>Desember</option>
                                </select></td>
                      <td></td>
                      <td ><select name='menu_tahun2' class='form-control' style='width:90px;' >
                                    <option value=$masatahun2 selected>$masatahun2</option>";
                                           $TH2 = $masatahun2;
                                           for($TH2=$masatahun2 + 1; $TH2<=2016; $TH2++)
                                           {
                                              echo"<option value=$TH2>$TH2</option>";
                                           }
                             echo"</select></td>
                     
                    </tr>
                  </table>
                </div><!-- /.col-->
               

             
                <div class='col-md-12'>
                    <hr class='hr3'>
                    <hr class='hr2'>
                </div><!-- /.cols -->
                <div class='col-md-12'>
                  <table width='100%' border='0'>
                      <tr>
                        <th height='30px'>1. </th>
                        <th scope='row' colspan='6'><div align='left'>&nbsp; Keputusan Target Areal Tanam (dari Blangko 01) </div></th>
                      </tr>
                      <tr>
                        <td scope='row' width='13px'>&nbsp;</td>
                        <td width='13px'>&nbsp;</td>
                        <td width='150px'>Padi</td>
                        <td width='13px' align='right'>:</td>
                        <td width='19%' colspan='2'><input name='p' type ='text'  class='form-control5' style='width:150px;' placeholder='....................ha' onchange=prosedure2() ></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td scope='row'>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>Tebu Muda </td>
                        <td align='right'>:</td>
                        <td colspan='2'><input name='t' type ='number'  class='form-control5'  style='width:150px;' placeholder='....................ha' onchange=prosedure2()></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td scope='row'>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>Tebu Tua </td>
                        <td align='right'>:</td>
                        <td colspan='2'><input name='m' type ='number'  class='form-control5'  style='width:150px;' placeholder='....................ha' onchange=prosedure2()></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td scope='row'>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>Palawija</td>
                        <td align='right'>:</td>
                        <td colspan='2'><input name='w' type ='number'  class='form-control5'  style='width:150px;' placeholder='....................ha' onchange=prosedure2() ></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td scope='row'>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>Lain-lain</td>
                        <td align='right'>:</td>
                        <td colspan='2'><input name='l' type ='number'  class='form-control5'  style='width:150px;' placeholder='....................ha' onchange=prosedure2()></td>
                        <td></td>
                      </tr>
                 </table>
              </div><!-- /.cols -->

              <div class='col-md-5'>
                 <table width='100%' border='0'>
                   <tr>
                      <td height='3px' style='margin:inherit;'></td>
                      <td colspan='4' ><hr class='hr4' style='margin:inherit;width:320px;'></td>
                      <td width='2%'></td>
                      <td></td>
                    </tr>
                     <tr> 
                      <td scope='row' width='13px'>&nbsp;</td>
                      <td width='13px'>&nbsp;</td>
                      <td width='150px'>Jumlah Tanaman </td>
                      <td align='right' width='13px'>:</td>
                      <td colspan='2'><input name='o' type ='text' class='form-control5'  style='width:150px;' placeholder='....................ha' readonly></td>
                      <td></td>
                    </tr>
                  </table>
              </div><!-- /.cols -->
              <div class='col-md-7'>
              <table width='100%' border='0'>
                  <tr>
                      <td height='3px' colspan='6' style='margin:inherit;'></td>
                  </tr>
                  <tr>
                    <td scope='row' width='13px'>&nbsp;</td>
                    <td width='13px'>&nbsp;</td>
                    <td style='width:150px;'>Bero</td>
                    <td align='right' width='13px'>:</td>
                    <td><input name='b1' type ='number' class='form-control5' onchange=procedure3() style='width:150px;' placeholder='....................ha' ></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td colspan='4'></td>
                  </tr>
               </table>
              </div><!-- /.cols -->
                

              <div class='col-md-12'>
                <table width='100%' border='0'> 
                    <tr>
                        <th height='15px'></th>
                        <th scope='row' colspan='10'></th>
                    </tr>  
                    <tr>
                        <th height='30px' width='5'px>2. </th>
                        <th scope='row' colspan='10'><div align='left'> &nbsp; Usulan dan Realisasi Luas Tanam (ha) </div></th>
                    </tr>
                 </table>
              </div><!-- /.cols -->
              
                <div class='col-md-5'>
                    <table width='100%' border='1' bordercolor='#888' class='tablea'>
                      <tr>
                        <td style=' height:30px;vertical-align:middle;' align='center' width='12%'>No</td>
                        <td  colspan='2' align='center' style='height:30px;vertical-align:middle;'>Realisasi Luas Tanam s/d saat Lap. dibuat </td>
                      
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td align='center' width='55%'>Jenis</td>
                        <td align='center'>Areal (ha) </td>
                      </tr>
                      <tr>
                        <td align='center'>2.0</td>
                        <td align='center'>2.1</td>
                        <td align='center'>2.2</td>
                      </tr>
                      <tr>
                        <td align='center'>2.1</td>
                        <td align='center'>xxxxxxxxxx</td>
                        <td align='center'>xxxxxxxxxx</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td align='left'>&nbsp;&nbsp;&nbsp;Padi MT.1 </td>
                        <td style=margin:inherit><input name='p21' type ='number' class='form-control6' onchange=procedure4() style=margin:inherit></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td align='left'>&nbsp;&nbsp;&nbsp;Padi MT.2 </td>
                        <td><input name='p22' type ='number' class='form-control6' onchange=procedure4() style=margin:inherit></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td align='left'>&nbsp;&nbsp;&nbsp;Padi MT.3 </td>
                        <td><input name='p23' type ='number' class='form-control6' onchange=procedure4() style=margin:inherit></td>
                      </tr>
                      <tr>
                        <td align='center'>2.2</td>
                        <td align='center'>xxxxxxxxxx</td>
                        <td align='center'>xxxxxxxxxx</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td align='center'>xxxxxxxxxx</td>
                        <td align='center'>xxxxxxxxxx</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td align='left'>&nbsp;&nbsp;&nbsp;Tebu Muda </td>
                        <td><input name='t2m' type ='number' class='form-control6' onchange=procedure4() style=margin:inherit></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td align='left'>&nbsp;&nbsp;&nbsp;Tebu Tua </td>
                        <td><input name='t2t' type ='number' class='form-control6' onchange=procedure4() style=margin:inherit></td>
                      </tr>
                      <tr>
                        <td align='center'>2.3</td>
                        <td align='center'>xxxxxxxxxx</td>
                        <td align='center'>xxxxxxxxxx</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td align='left'>&nbsp;&nbsp;&nbsp;Palawija MT.1 </td>
                        <td><input name='w21' type ='number' class='form-control6' onchange=procedure4() style=margin:inherit></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td align='left'>&nbsp;&nbsp;&nbsp;Palawija MT.2 </td>
                        <td><input name='w22' type ='number' class='form-control6' onchange=procedure4() style=margin:inherit></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td align='left'>&nbsp;&nbsp;&nbsp;Palawija MT.3 </td>
                        <td><input name='w23' type ='number' class='form-control6' onchange=procedure4()  style=margin:inherit></td>
                      </tr>
                      <tr>
                        <td align='center'>2.4</td>
                        <td align='left'>&nbsp;&nbsp;&nbsp;Gadu Tidak Izin MT.2 </td>
                        <td><input name='gti22' type ='number' class='form-control6' onchange=procedure4() style=margin:inherit></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td align='left'>&nbsp;&nbsp;&nbsp;Gadu Tidak Izin MT.3 </td>
                        <td><input name='gti23' type ='number' class='form-control6' onchange=procedure4() style=margin:inherit></td>
                      </tr>
                      <tr>
                        <td align='center'>2.5</td>
                        <td align='left'>&nbsp;&nbsp;&nbsp;Lain-lain</td>
                        <td><input name='l2' type ='number' class='form-control6' onchange=procedure4()  style=margin:inherit></td>
                      </tr>
                      <tr>
                        <td align='center'>2.6</td>
                        <td align='left'>&nbsp;&nbsp;&nbsp;Bero</td>
                        <td><input name='b2' type ='number' class='form-control6' onchange=procedure4() style=margin:inherit readonly></td>
                      </tr>
                      <tr>
                        <td align='center'>2.7</td>
                        <td align='left'>&nbsp;&nbsp;&nbsp;Jum : (Luas Sawah Irigasi) </td>
                        <td><input name='j2' type ='number' class='form-control6'  style=margin:inherit readonly></td>
                      </tr>
                    </table>
                    <br>
                </div><!-- /.col -->
                
              
              
                <div class='col-md-7'>
                     <table width='100%' border='1' bordercolor='#888' class='tablea'>
                      <tr>
                        <td colspan='3' align='center' style=' height:30px;vertical-align:middle;' >Usulan Luas Tanam pada Periode Tersebut </td>
                      </tr>
                      <tr>
                        <td align='center' width='50%'>Jenis Tanaman </td>
                        <td align='center'>Areal (ha) </td>
                        <td align='center'>Jumlah</td>
                      </tr>
                      <tr>
                        <td align='center'>3.1</td>
                        <td align='center'>3.2</td>
                        <td align='center'>3.3</td>
                      </tr>
                      <tr>
                        <td>&nbsp;&nbsp;&nbsp;Padi Rendeng / Padi Gadu Izin : </td>
                        <td align='center'>xxxxxxxxxx</td>
                        <td align='center'>xxxxxxxxxx</td>
                      </tr>
                      <tr>
                        <td>&nbsp;&nbsp;&nbsp;a) Pengelohan Tanah + Persemaian </td>
                        <td><input name='p31' type ='number' class='form-control6' onchange=procedure5() style=margin:inherit></td>
                        <td rowspan='3'><input name='jp' type ='number' class='form-control6'  style='height:71px;'></td>
                      </tr>
                      <tr>
                        <td>&nbsp;&nbsp;&nbsp;b) Pertumbuhan </td>
                        <td><input name='p32' type ='number' class='form-control6' onchange=procedure5()  style=margin:inherit></td>
                      </tr>
                      <tr>
                        <td>&nbsp;&nbsp;&nbsp;c) Panen </td>
                        <td><input name='p33' type ='number' class='form-control6' onchange=procedure5() style=margin:inherit></td>
                      </tr>
                      <tr>
                        <td>&nbsp;&nbsp;&nbsp;Tebu : </td>
                        <td align='center'>xxxxxxxxxx</td>
                        <td align='center'>xxxxxxxxxx</td>
                      </tr>
                      <tr>
                        <td>&nbsp;&nbsp;&nbsp;a) Pengolahan Tanah + Persemaian </td>
                        <td><input name='t31' type ='number' class='form-control6' onchange=procedure6() style=margin:inherit></td>
                        <td rowspan='3'><input name='jt' type ='number' class='form-control6'  style='height:71px;'></td>
                      </tr>
                      <tr>
                        <td>&nbsp;&nbsp;&nbsp;b) Tebu Muda </td>
                        <td><input name='t32' type ='number' class='form-control6' onchange=procedure6() style=margin:inherit></td>
                      </tr>
                      <tr>
                        <td>&nbsp;&nbsp;&nbsp;c) Tebu Tua </td>
                        <td><input name='t33' type ='number' class='form-control6' onchange=procedure6() style=margin:inherit></td>
                      </tr>
                      <tr>
                        <td>&nbsp;&nbsp;&nbsp;Palawija : </td>
                        <td align='center'>xxxxxxxxxx</td>
                        <td align='center'>xxxxxxxxxx</td>
                      </tr>
                      <tr>
                        <td>&nbsp;&nbsp;&nbsp;a) Yang perlu banyak air </td>
                        <td><input name='w31' type ='number' class='form-control6' onchange=procedure7() style=margin:inherit></td>
                        <td rowspan='2'><input name='jw' type ='number' class='form-control6'  style='height:47px;'></td>
                      </tr>
                      <tr>
                        <td>&nbsp;&nbsp;&nbsp;b) Yang perlu sedikit air </td>
                        <td><input name='w32' type ='number' class='form-control6' onchange=procedure7() style=margin:inherit></td>
                      </tr>
                      <tr>
                        <td>&nbsp;&nbsp;&nbsp;Gadu Tidak Izin : </td>
                        <td><input name='gti31' type ='number' class='form-control6'  style=margin:inherit></td>
                        <td><input name='gti32' type ='number' class='form-control6'  style=margin:inherit></td>
                      </tr>
                      <tr>
                        <td rowspan='2' style=' height:48px;vertical-align:middle;'>&nbsp;</td>
                        <td rowspan='2'>&nbsp;</td>
                        <td rowspan='2'>&nbsp;</td>
                      </tr>
                      <tr>
                        
                      </tr>
                      <tr>
                        <td>&nbsp;&nbsp;&nbsp;Lain-lain keperluan </td>
                        <td><input name='l31' type ='number' class='form-control6'  style=margin:inherit></td>
                        <td><input name='l32' type ='number' class='form-control6'  style=margin:inherit></td>
                      </tr>
                      <tr>
                        <td>&nbsp;&nbsp;&nbsp;Bero</td>
                        <td><input name='b3' type ='number' class='form-control6'  style=margin:inherit readonly></td>
                        <td><input name='jb3' type ='number' class='form-control6'  style=margin:inherit readonly></td>
                      </tr>
                      <tr>
                        <td>&nbsp;&nbsp;&nbsp;Jumlah : (Luas Sawah Irigasi) </td>
                        <td align='center'>xxxxxxxxxx</td>
                        <td align='center'>xxxxxxxxxx</td>
                      </tr>
                     </table>
                     <br>
                </div><!-- /.col -->

                <div class='col-md-12'>
                    <table width='100%' border='0'>
                      <tr>
                        <td width='4.8%' height='40px'></td>
                        <td width='30%' colspan='2'>Keadaan air Irigasi di Petak Tersier</td>
                        <td colspan='3'>
                          <input type='radio' value='berlebihan' name='keadaan_air'> berlebihan &nbsp;&nbsp;&nbsp; <input type='radio' value='cukup' name='keadaan_air' checked> cukup&nbsp;&nbsp;&nbsp; <input type='radio' value='kurang' name='keadaan_air'> kurang
                        </td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td width='20%' valign='top'>Kerusakan Tanaman (ha)</td>
                        <td colspan='2' valign='top'><p><hr class='hr4'></p></td>
                        <td width='3px' valign='top'><p><i class='glyphicon glyphicon-chevron-right' style='margin-top:2px;'></p></td>
                        <td width='60%'>
                           <table border ='1' width='70%' class='tablea table-striped'>
                             <tr>
                                <td width='20%' align='center'>Tanaman</td>
                                <td width='20%' align='center'>Kekeringan</td>
                                <td width='20%' align='center'>Genangan/<br>Kebanjiran</td>
                             </tr>
                             <tr>
                                <td>&nbsp;&nbsp;&nbsp;Padi</td>
                                <td><input name='p4k' type ='number' class='form-control6'  style=margin:inherit></td>
                                <td><input name='p4b' type ='number' class='form-control6'  style=margin:inherit></td>
                             </tr>
                             <tr>
                                <td>&nbsp;&nbsp;&nbsp;Tebu</td>
                                <td><input name='t4k' type ='number' class='form-control6'  style=margin:inherit></td>
                                <td><input name='t4b' type ='number' class='form-control6'  style=margin:inherit></td>
                             </tr>
                             <tr>
                                <td>&nbsp;&nbsp;&nbsp;Palawija</td>
                                <td><input name='w4k' type ='number' class='form-control6'  style=margin:inherit></td>
                                <td><input name='w4b' type ='number' class='form-control6'  style=margin:inherit></td>
                             </tr>
                           </table>
                        </td>
                        
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td> <button type='submit' class='btn btn-success pull-right'>Submit</button>
                          <button type='reset' class='btn btn-warning pull-right'>Reset</button></td>
                        
                      </tr>
                    </table>
                </div><!-- /.col -->
                </form>
                </div><!-- /.box-body -->
               
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
          ";
      }
      else
      {
          $n[countNota] = $maxNota;
          echo" 
                <div class='row'>
                  <div class='col-xs-12'>
                    <div class='box box-primary'>
                      <div class='box-body'>
                      data sudah ada apakah anda ingin melihatnya?...
                      </div><!-- /.box-body -->
                     
                    </div><!-- /.box -->
                  </div><!-- /.col -->
                </div><!-- /.row -->";
      }
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
function prosedure2()
{
 var p=parseFloat(document.flatihan1.p.value);
 var t=parseFloat(document.flatihan1.t.value);
 var m=parseFloat(document.flatihan1.m.value);
 var w=parseFloat(document.flatihan1.w.value);
 var l=parseFloat(document.flatihan1.l.value);
 
 
    if((isNaN(t)) && (isNaN(m)) && (isNaN(w)) && (isNaN(l)))
    {
       sum = p;
    }
    else if((isNaN(p)) && (isNaN(m)) && (isNaN(w)) && (isNaN(l)))
    {
       sum = t;
    }
    else if((isNaN(p)) && (isNaN(t)) && (isNaN(w)) && (isNaN(l)))
    {
       sum = m;
    }
    else if((isNaN(p)) && (isNaN(t)) && (isNaN(m)) && (isNaN(l)))
    {
       sum = w;
    }
    else if((isNaN(p)) && (isNaN(t)) && (isNaN(w)) && (isNaN(m)))
    {
       sum = l;
    }
    else if((isNaN(t)) && (isNaN(w)) && (isNaN(l)))
    {
       sum = p + m;
    }
    else if((isNaN(m)) && (isNaN(w)) && (isNaN(l)))
    {
       sum = p + t;
    }
    else if((isNaN(t)) && (isNaN(m)) && (isNaN(l)))
    {
       sum = p + w;
    }
    else if((isNaN(t)) && (isNaN(w)) && (isNaN(m)))
    {
       sum = p + l;
    }//
    else if((isNaN(p)) && (isNaN(w)) && (isNaN(l)))
    {
       sum = m + t;
    }
    else if((isNaN(p)) && (isNaN(t)) && (isNaN(l)))
    {
       sum = m + w;
    }
    else if((isNaN(p)) && (isNaN(w)) && (isNaN(t)))
    {
       sum = m + l;
    }//
    else if((isNaN(p)) && (isNaN(l)) && (isNaN(m)))
    {
       sum = t + w;
    }
    else if((isNaN(p)) && (isNaN(w)) && (isNaN(m)))
    {
       sum = t + l;
    }
    else if((isNaN(p)) && (isNaN(t)) && (isNaN(m)))
    {
       sum = w + l;
    }
    else if((isNaN(l)) && (isNaN(w)))
    {
       sum = p + m + t;
    }
    else if((isNaN(l)) && (isNaN(t)))
    {
       sum = p + m + w;
    }
    else if((isNaN(w)) && (isNaN(t)))
    {
       sum = p + m + l;
    }//
    else if((isNaN(m)) && (isNaN(l)))
    {
       sum = p + t + w;
    }
    else if((isNaN(m)) && (isNaN(w)))
    {
       sum = p + t + l;
    }//
    else if((isNaN(m)) && (isNaN(t)))
    {
       sum = p + w + l;
    }//
    else if((isNaN(p)) && (isNaN(l)))
    {
       sum = m + t + w;
    }
    else if((isNaN(p)) && (isNaN(w)))
    {
       sum = m + t + l;
    }//
    else if((isNaN(p)) && (isNaN(m)))
    {
       sum = t + w + l;
    }//
    else if((isNaN(l)))
    {
       sum = p + m + t + w;
    }
    else if((isNaN(w)))
    {
       sum = p + m + t + l;
    }
    else if((isNaN(p)))
    {
       sum = w + m + t + l;
    }
    else if((isNaN(m)))
    {
       sum = p + w + t + l;
    }
    else if((isNaN(t)))
    {
       sum = p + m + w + l;
    }
    else
    {
       sum = p + m + t + l + w;
    }

    if(sum > <?php echo"$_SESSION[totalwilayah]"; ?>)
    {
      alert("Maaf Data Melebihi Jumlah Total Areal, Maka Data-datanya Akan Segera Dihapus!");
      document.flatihan1.p.value="";
      document.flatihan1.t.value="";
      document.flatihan1.m.value="";
      document.flatihan1.w.value="";
      document.flatihan1.l.value="";
      document.flatihan1.o.value="";
      document.flatihan1.l2.value="";
      document.flatihan1.l31.value="";
      document.flatihan1.l32.value="";
    }
    else
    {
      document.flatihan1.o.value=sum;
    }
   
   
    
}
function procedure3()
{
    var b1=parseInt(document.flatihan1.b1.value);
    document.flatihan1.b2.value=b1;
    document.flatihan1.b3.value=b1;
    document.flatihan1.jb3.value=b1;

}
function procedure4()
{
    var p21=parseInt(document.flatihan1.p21.value);
    var p22=parseInt(document.flatihan1.p22.value);
    var p23=parseInt(document.flatihan1.p23.value);
    var t2m=parseInt(document.flatihan1.t2m.value);
    var t2t=parseInt(document.flatihan1.t2t.value);
    var w21=parseInt(document.flatihan1.w21.value);
    var w22=parseInt(document.flatihan1.w22.value);
    var w23=parseInt(document.flatihan1.w23.value);
    var gti22=parseInt(document.flatihan1.gti22.value);
    var gti23=parseInt(document.flatihan1.gti23.value);
    var l2=parseInt(document.flatihan1.l2.value);
    var b2=parseInt(document.flatihan1.b2.value);

    if((isNaN(p21))&&(isNaN(p22)))
    {
       sum1 = p23;
    }
    else if((isNaN(p21))&&(isNaN(p23)))
    {
       sum1 = p22;
    }
    else if((isNaN(p22))&&(isNaN(p23)))
    {
       sum1 = p21;
    }
    else if((isNaN(p21))&&(isNaN(p22))&&(isNaN(p23)))
    {
       sum1 = "";
    }
    else if(isNaN(p23))
    {
       sum1 = p21 + p22;
    }
    else if(isNaN(p22))
    {
       sum1 = p21 + p23;
    }
    else if(isNaN(p21))
    {
       sum1 = p22 + p23;
    }
    else
    {
       sum1 = p21 + p22 + p23;
    }

    if(isNaN(t2m))
    {
       sum2 = t2t;
    }
    else if(isNaN(t2t))
    {
       sum2 = t2m;
    }
    else if((isNaN(t2m))&&(isNaN(t2t)))
    {
       sum2 = "";
    }
    else
    {
       sum2 = t2m + t2t;
    }

    if((isNaN(w21))&&(isNaN(w22)))
    {
       sum3 = w23;
    }
    else if((isNaN(w21))&&(isNaN(w23)))
    {
       sum3 = w22;
    }
    else if((isNaN(w22))&&(isNaN(w23)))
    {
       sum3 = w21;
    }
    else if((isNaN(w22))&&(isNaN(w23))&&(isNaN(w21)))
    {
       sum3 = "";
    }
    else if((isNaN(w23)))
    {
       sum3 = w21 + w22;
    }
    else if((isNaN(w22)))
    {
       sum3 = w21 + w23;
    }
    else if((isNaN(w21)))
    {
       sum3 = w22 + w23;
    }
    else
    {
       sum3 = w21 + w22 + w23;
    }
    if(isNaN(gti22))
    {
       sum4 = gti23;
    }
    else if(isNaN(gti23))
    {
       sum4 = gti22;
    }
    else if((isNaN(gti22))&&(isNaN(gti23)))
    {
       sum4 = "";
    }
    else
    {
       sum4 = gti22 + gti23;
    }
    if(isNaN(l2))
    {
       sum5 = b2;
    }
    else if(isNaN(b2))
    {
       sum5 = l2;
    }
    else if((isNaN(l2))&&(isNaN(b2)))
    {
       sum5 = "";
    }
    else 
    {
       sum5 = l2 + b2;
    }
    if(isNaN(sum1))
    {
       sumtot1 = sum2;
    }
    else if(isNaN(sum2))
    {
       sumtot1 = sum1;
    }
    else if((isNaN(sum1))&&(isNaN(sum2)))
    {
       sumtot1 = "";
    }
    else
    {
       sumtot1 = sum1 + sum2;
    }
    if(isNaN(sum3))
    {
       sumtot2 = sum4;
    }
    else if(isNaN(sum4))
    {
       sumtot2 = sum3;
    }
    else if((isNaN(sum3))&&(isNaN(sum4)))
    {
       sumtot2 = "";
    }
    else 
    {
       sumtot2 = sum3 + sum4;
    }
    if(isNaN(sumtot1))
    {
       subsum1 = sumtot2;
    }
    else if(isNaN(sumtot2))
    {
       subsum1 = sumtot1;
    }
    else if((isNaN(sumtot1))&&(isNaN(sumtot2)))
    {
       subsum1 = "";
    }
    else
    {
       subsum1 = sumtot1 + sumtot2;
    }
    if(isNaN(subsum1))
    {
       jml = sum5;
    }
    else if(isNaN(sum5))
    {
       jml = subsum1;
    }
    else if((isNaN(sum5))&&(isNaN(subsum1)))
    {
       jml = "";
    }
    else 
    {
       jml = subsum1 + sum5;
    }

    if(jml > <?php echo"$_SESSION[totalwilayah]"; ?>)
    {
      alert("Maaf Data Melebihi Jumlah Total Areal, Maka Data-datanya Akan Segera Dihapus!")
      document.flatihan1.p21.value="";
      document.flatihan1.p22.value="";
      document.flatihan1.p23.value="";
      document.flatihan1.t2m.value="";
      document.flatihan1.t2t.value="";
      document.flatihan1.w21.value="";
      document.flatihan1.w22.value="";
      document.flatihan1.w23.value="";
      document.flatihan1.gti22.value="";
      document.flatihan1.gti23.value="";
      document.flatihan1.l2.value="";
      document.flatihan1.j2.value="";
    }
    else
    {
      document.flatihan1.j2.value=jml;
    }

    // document.flatihan1.gti31.value=sum4;
    // document.flatihan1.gti32.value=sum4;

    
}
function procedure5()
{
    var p31=parseInt(document.flatihan1.p31.value);
    var p32=parseInt(document.flatihan1.p32.value);
    var p33=parseInt(document.flatihan1.p33.value);
    var p=parseInt(document.flatihan1.p.value);
    if((isNaN(p31))&&(isNaN(p32)))
    {
       sump3 = p33;
    }
    else if((isNaN(p31))&&(isNaN(p33)))
    {
       sump3 = p32;
    }
    else if((isNaN(p32))&&(isNaN(p33)))
    {
       sump3 = p31;
    }
    else if((isNaN(p31))&&(isNaN(p32))&&(isNaN(p33)))
    {
       sump3 = "";
    }
    else if(isNaN(p33))
    {
       sump3 = p31 + p32;
    }
    else if(isNaN(p32))
    {
       sump3 = p31 + p33;
    }
    else if(isNaN(p31))
    {
       sump3 = p32 + p33;
    }
    else
    {
       sump3 = p31 + p32 + p33;
    }
    if(isNaN(p))
    {
      alert("Maaf! Data Keputusan Target Areal Tanam kosong, isikan terlebih dahulu Data tersebut.");
       document.flatihan1.p31.value="";
       document.flatihan1.p32.value="";
       document.flatihan1.p33.value="";
       document.flatihan1.jp.value="";
    }
    else
    {
        if(sump3 > p)
        {
           alert("Maaf! Data Melebihi Jumlah Data Keputusan Target Areal Tanam.");
           document.flatihan1.p31.value="";
           document.flatihan1.p32.value="";
           document.flatihan1.p33.value="";
           document.flatihan1.jp.value="";
        }
        else
        {
           document.flatihan1.jp.value=sump3;
        }
    }
}

function procedure6()
{
    var t31=parseInt(document.flatihan1.t31.value);
    var t32=parseInt(document.flatihan1.t32.value);
    var t33=parseInt(document.flatihan1.t33.value);
    var m=parseInt(document.flatihan1.m.value);
    var t=parseInt(document.flatihan1.t.value);
    
    if((isNaN(t32))&&(isNaN(t33)))
    {
        sumt3 = t31;
    }
    else if((isNaN(t31))&&(isNaN(t33)))
    {
        sumt3 = t32;
    }
    else if((isNaN(t31))&&(isNaN(t32)))
    {
        sumt3 = t33;
    }
    else if((isNaN(t31))&&(isNaN(t32))&&(isNaN(t33)))
    {
        sumt3 = "";
    }
    else if(isNaN(t33))
    {
        sumt3 = t31 + t32;
    }
    else if(isNaN(t32))
    {
        sumt3 = t31 + t33;
    }
    else if(isNaN(t31))
    {
        sumt3 = t32 + t33;
    }
    else
    {
        sumt3 = t31 + t32 + t33;
    }

    if(isNaN(m))
    {
        sum1 = t;
    }
    else if(isNaN(t))
    {
       sum1 = m;
    }
    else if((isNaN(m))&&(isNaN(t)))
    {
       sum1 = "";
    }
    else
    {
       sum1 = t + m;
    }

    if(isNaN(sum1))
    {
        alert("Maaf! Data Keputusan Target Areal Tanam Kosong.");
        document.flatihan1.t31.value="";
        document.flatihan1.t32.value="";
        document.flatihan1.t33.value="";
        document.flatihan1.jt.value="";
    }
    else
    {
        if(sumt3 > sum1)
        {
            alert("Maaf! Data Melebihi Jumlah Data Keputusan Target Areal Tanam.");
            document.flatihan1.t31.value="";
            document.flatihan1.t32.value="";
            document.flatihan1.t33.value="";
            document.flatihan1.jt.value="";
        }
        else
        {
            document.flatihan1.jt.value=sumt3;
        }
    }

}
function procedure7()
{
    var w31=parseInt(document.flatihan1.w31.value);
    var w32=parseInt(document.flatihan1.w32.value);
    var w=parseInt(document.flatihan1.w.value);
    if(isNaN(w31))
    {
       sumw3 = w32;
    }
    else if(isNaN(w32))
    {
       sumw3 = w31;
    }
    else if((isNaN(w31))&&(isNaN(w32)))
    {
       sumw3 = "";
    }
    else
    {
       sumw3 = w31 + w32;
    }
    if(isNaN(w))
    {
        alert("Maaf! Data Keputusan Target Areal Tanam Kosong.");
        document.flatihan1.w31.value="";
        document.flatihan1.w32.value="";
        document.flatihan1.jw.value="";
    }
    else
    {
        if(sumw3 > w)
        {
            alert("Maaf! Data Melebihi Jumlah Data Keputusan Target Areal Tanam.");
            document.flatihan1.w31.value="";
            document.flatihan1.w32.value="";
            document.flatihan1.jw.value="";
        }
        else
        {
            document.flatihan1.jw.value=sumw3;
        }
    }
}


</script>

