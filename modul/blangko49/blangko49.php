<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']))
{
    echo "Untuk mengakses modul, Anda harus login";
}
else{
$aksi="modul/blangko49/aksi_blangko49.php";
switch($_GET[act]){

  default:
          echo"<div class='row'>
            <div class='col-xs-12'>
              
              <div class='box box-primary'>
                <div class='box-header'>
                  <h3 class='box-title'>Lakukan Pencarian Terlebih Dahulu</h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
                
                 <form method=get role='form' enctype='multipart/form-data' action='$_SERVER[PHP_SELF]'>

                  <table border='0' align='right'>
                    <tr>
                      <td><input type=hidden name=modul value=blangko49></td>
                      <td>Periode Pengambilan Air Tanggal</td>
                      <td width='20%'>
                         
                        <select name='menu_tanggal' class='form-control'>
                          <option value=0>-Pilih-</option>
                          <option value=1>1 s/d 15</option>
                          <option value=2>16 s/d ...</option>
                        </select>
                        
                        </td>
                      <td>Bln</td>
                      
                        <td width='20%'>
                     
                        <select name='menu_bulan' class='form-control'>
                          <option value=0>-Pilih-</option>
                          <option value=1>Januari</option>
                          <option value=2>Februari</option>
                          <option value=3>Maret</option>
                          <option value=4>April</option>
                          <option value=5>Mei</option>
                          <option value=6>Juni</option>
                          <option value=7>Juli</option>
                          <option value=8>Agustus</option>
                          <option value=9>September</option>
                          <option value=10>Oktober</option>
                          <option value=11>Nopember</option>
                          <option value=12>Desember</option>
                        </select>
                      
                        </td>
                        <td width='18%'>
                       
                        <select name='menu_tahun' class='form-control'>
                          <option value=0 selected>-Pilih-</option>";
                           $TH = 2000;
                           for($TH=2000; $TH<=2016; $TH++)
                           {
                              echo"<option value=$TH>$TH</option>";
                           }
                        echo"</select>
                      
                      
                        </td>
                        <td>
                        <input type=submit value=Cari class='btn btn-primary'>
                      
                        </td>
                    </tr>
                  </table>
                  </form>
              </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

                 
                  
                   ";
                  if (empty($_GET['menu_tanggal']) or empty($_GET['menu_bulan'])  or empty($_GET['menu_tahun']))
                  {
                       echo"
          <div class='row'>
            <div class='col-xs-12'>
                        <div class='box box-primary' style='height:700px'>
                          <div class='box-header'>
                            <p class='text-center'><b> Perhitungan Faktor - K : $_SESSION[namairigasi]</b></p>
                          </div><!-- /.box-header -->
                        <div class='box-body'>
                           <div class='scroll-pane ui-widget ui-widget-header ui-corner-all'>
                             <div class='scroll-content'>
                              <table class='table no-margin table-bordered table-striped'  bordercolor='#000' >
                                <tr>
                                  <th style='text-align:center'>Bulan</th>
                                  <th colspan='2' style='text-align:center'>Jan</th>
                                  <th colspan='2' style='text-align:center'>Feb</th>
                                  <th colspan='2' style='text-align:center'>Mar</th>
                                  <th colspan='2' style='text-align:center'>Apr</th>
                                  <th colspan='2' style='text-align:center'>Mei</th>
                                  <th colspan='2' style='text-align:center'>Jun</th>
                                  <th colspan='2' style='text-align:center'>Jul</th>
                                  <th colspan='2' style='text-align:center'>Agu</th>
                                  <th colspan='2' style='text-align:center'>Sep</th>
                                  <th colspan='2' style='text-align:center'>Okt</th>
                                  <th colspan='2' style='text-align:center'>Nop</th>
                                  <th colspan='2' style='text-align:center'>Des</th>
                                </tr>
                                <tr>
                                  <th style='text-align:center' width='2%'>Tahun</th>
                                  <th style='text-align:center' width='2%'>1</th>
                                  <th style='text-align:center' width='2%'>2</th>
                                  <th style='text-align:center' width='2%'>1</th>
                                  <th style='text-align:center' width='2%'>2</th>
                                  <th style='text-align:center' width='2%'>1</th>
                                  <th style='text-align:center' width='2%'>2</th>
                                  <th style='text-align:center' width='2%'>1</th>
                                  <th style='text-align:center' width='2%'>2</th>
                                  <th style='text-align:center' width='2%'>1</th>
                                  <th style='text-align:center' width='2%'>2</th>
                                  <th style='text-align:center' width='2%'>1</th>
                                  <th style='text-align:center' width='2%'>2</th>
                                  <th style='text-align:center' width='2%'>1</th>
                                  <th style='text-align:center' width='2%'>2</th>
                                  <th style='text-align:center' width='2%'>1</th>
                                  <th style='text-align:center' width='2%'>2</th>
                                  <th style='text-align:center' width='2%'>1</th>
                                  <th style='text-align:center' width='2%'>2</th>
                                  <th style='text-align:center' width='2%'>1</th>
                                  <th style='text-align:center' width='2%'>2</th>
                                  <th style='text-align:center' width='2%'>1</th>
                                  <th style='text-align:center' width='2%'>2</th>
                                  <th style='text-align:center' width='2%'>1</th>
                                  <th style='text-align:center' width='2%'>2</th>
                                </tr>";
                                $tampil=mysql_query(" SELECT * FROM debit_pertahun 
                                                    WHERE 
                                                   nama_irigasi = '$_SESSION[namairigasi]' 
                                                    ORDER BY tahun ASC");
                        
                           
                           
                               while($r=mysql_fetch_array($tampil)){
                              echo"
                                <tr>
                                  <td style='text-align:center'>$r[tahun]</td>
                                  <td style='text-align:center'>$r[jan1]</td>
                                  <td style='text-align:center'>$r[jan2]</td>
                                  <td style='text-align:center'>$r[feb1]</td>
                                  <td style='text-align:center'>$r[feb2]</td>
                                  <td style='text-align:center'>$r[mar1]</td>
                                  <td style='text-align:center'>$r[mar2]</td>
                                  <td style='text-align:center'>$r[apr1]</td>
                                  <td style='text-align:center'>$r[apr2]</td>
                                  <td style='text-align:center'>$r[mei1]</td>
                                  <td style='text-align:center'>$r[mei2]</td>
                                  <td style='text-align:center'>$r[jun1]</td>
                                  <td style='text-align:center'>$r[jun2]</td>
                                  <td style='text-align:center'>$r[jul1]</td>
                                  <td style='text-align:center'>$r[jul2]</td>
                                  <td style='text-align:center'>$r[agu1]</td>
                                  <td style='text-align:center'>$r[agu2]</td>
                                  <td style='text-align:center'>$r[sep1]</td>
                                  <td style='text-align:center'>$r[sep2]</td>
                                  <td style='text-align:center'>$r[okt1]</td>
                                  <td style='text-align:center'>$r[okt2]</td>
                                  <td style='text-align:center'>$r[nop1]</td>
                                  <td style='text-align:center'>$r[nop2]</td>
                                  <td style='text-align:center'>$r[des1]</td>
                                  <td style='text-align:center'>$r[des2]</td>
                                </tr>
                                ";}
                                echo"
                              </table>
                            </div>
                           </div>
                      

                        </div><!-- /.box-body -->
                      </div><!-- /.box -->
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                ";
                      break;
                  }
                  else
                  {
                       if($_GET[menu_tanggal]=='1')
                       {
                           $menutanggal = "1 s/d 15";
                           $hari = "15";
                           if($_GET[menu_bulan]=='1')
                           {
                              $menubulan = "Januari";
                           }
                            elseif($_GET[menu_bulan]=='2')
                           {
                              $menubulan = "Februari";                              
                           }
                           elseif($_GET[menu_bulan]=='3')
                           {
                              $menubulan = "Maret";
                           }
                           elseif($_GET[menu_bulan]=='4')
                           {
                              $menubulan = "April";
                           }
                           elseif($_GET[menu_bulan]=='5')
                           {
                              $menubulan = "Mei";
                           }
                           elseif($_GET[menu_bulan]=='6')
                           {
                              $menubulan = "Juni";
                           }
                           elseif($_GET[menu_bulan]=='7')
                           {
                              $menubulan = "Juli";
                           }
                           elseif($_GET[menu_bulan]=='8')
                           {
                              $menubulan = "Agustus";
                           }
                           elseif($_GET[menu_bulan]=='9')
                           {
                              $menubulan = "September";
                           }
                           elseif($_GET[menu_bulan]=='10')
                           {
                              $menubulan = "Oktober";
                           }
                           elseif($_GET[menu_bulan]=='11')
                           {
                              $menubulan = "Nopember";
                           }
                           elseif($_GET[menu_bulan]=='12')
                           {
                              $menubulan = "Desember";
                           }
                           else
                           {
                              header('location:media.php?modul=debit&act=tampilerror');
                           }
                       }
                       else if($_GET[menu_tanggal]=='2')
                       {
                           if($_GET[menu_bulan]=='1')
                           {
                              $menutanggal = "16 s/d 31";
                              $menubulan = "Januari";
                              $hari = "16";
                           }
                            elseif($_GET[menu_bulan]=='2')
                           {
                              if(($_GET[menu_tahun]=='2000')or($_GET[menu_tahun]=='2004')or($_GET[menu_tahun]=='2008')or($_GET[menu_tahun]=='2012')or($_GET[menu_tahun]=='2016')or($_GET[menu_tahun]=='2020')or($_GET[menu_tahun]=='2024')or($_GET[menu_tahun]=='2028'))
                              {
                                 $menutanggal = "16 s/d 29";
                                 $menubulan = "Februari";
                                 $hari = "14";
                              }
                              else
                              {
                                 $menutanggal = "16 s/d 28";
                                 $menubulan = "Februari";
                                 $hari = "13";
                              }
                              
                           }
                           elseif($_GET[menu_bulan]=='3')
                           {
                              $menutanggal = "16 s/d 31";
                              $menubulan = "Maret";
                              $hari = "16";
                           }
                           elseif($_GET[menu_bulan]=='4')
                           {
                              $menutanggal = "16 s/d 30";
                              $menubulan = "April";
                              $hari = "15";
                           }
                           elseif($_GET[menu_bulan]=='5')
                           {
                              $menutanggal = "16 s/d 31";
                              $menubulan = "Mei";
                              $hari = "16";
                           }
                           elseif($_GET[menu_bulan]=='6')
                           {
                              $menutanggal = "16 s/d 30";
                              $menubulan = "Juni";
                              $hari = "15";
                           }
                           elseif($_GET[menu_bulan]=='7')
                           {
                              $menutanggal = "16 s/d 31";
                              $menubulan = "Juli";
                              $hari = "16";
                           }
                           elseif($_GET[menu_bulan]=='8')
                           {
                              $menutanggal = "16 s/d 31";
                              $menubulan = "Agustus";
                              $hari = "16";
                           }
                           elseif($_GET[menu_bulan]=='9')
                           {
                              $menutanggal = "16 s/d 30";
                              $menubulan = "September";
                              $hari = "15";
                           }
                           elseif($_GET[menu_bulan]=='10')
                           {
                              $menutanggal = "16 s/d 31";
                              $menubulan = "Oktober";
                              $hari = "16";
                           }
                           elseif($_GET[menu_bulan]=='11')
                           {
                              $menutanggal = "16 s/d 30";
                              $menubulan = "Nopember";
                              $hari = "15";
                           }
                           elseif($_GET[menu_bulan]=='12')
                           {
                              $menutanggal = "16 s/d 31";
                              $menubulan = "Desember";
                              $hari = "16";
                           }
                           else
                           {
                              header('location:media.php?modul=debit&act=tampilerror');
                           }
                       }
                       else
                       {
                          header('location:media.php?modul=debit&act=tampilerror');
                       }

                       $isijumlahdebit = mysql_query("SELECT COUNT(`no`) AS isijumlahdebit FROM blangko08 WHERE nama_irigasi = '$_SESSION[namairigasi]' AND tgl_blangko08O = '$_GET[menu_tanggal]' AND bln_blangko08O = '$_GET[menu_bulan]' AND tahun_blangko08O = '$_GET[menu_tahun]'");
                       $i    = mysql_fetch_array($isijumlahdebit);
                       $isijumlahdebit = $i[isijumlahdebit];//UNTUK JUMLAH ISI YANG TELAH ADA MAUPUN KOSONG

                        
                       $tampno = mysql_query("SELECT COUNT(`no`) AS TglInput FROM blangko08 WHERE nama_irigasi = '$_SESSION[namairigasi]' AND tgl_blangko08O = '$_GET[menu_tanggal]' AND bln_blangko08O = '$_GET[menu_bulan]' AND tahun_blangko08O = '$_GET[menu_tahun]'");
                       $r    = mysql_fetch_array($tampno);
                       $TglInput = $r[TglInput];

                       if(($TglInput>=0)&&($TglInput<=4))
                       {
                          $r[TglInput]=1;
                       }
                       else if(($TglInput>=5)&&($TglInput<=9))
                       {
                          $r[TglInput]=2;
                       }
                       else if(($TglInput>=10)&&($TglInput<=15))
                       {
                          $r[TglInput]=3;
                       }
                       else
                       {
                         $r[TglInput]="Error";
                       }//UNTUK MENCARI NILAIRATARATA PADA 3 BAGIAN

                        $InputPlus = mysql_query("SELECT MAX(`no`)+1 AS inputplus FROM blangko08 WHERE nama_irigasi = '$_SESSION[namairigasi]' AND tgl_blangko08O = '$_GET[menu_tanggal]' AND bln_blangko08O = '$_GET[menu_bulan]' AND tahun_blangko08O = '$_GET[menu_tahun]'");
                        $t   = mysql_fetch_array($InputPlus);
                        $inputplus = $t[inputplus];


                        if(($inputplus==0)&&($_GET[menu_tanggal]==1))
                        { $t[inputplus]=1;}
                        else if(($inputplus==0)&&($_GET[menu_tanggal]!=1))
                        {
                          $t[inputplus]=16;
                        }
                        //mencari id_nota
                        $notaperirigasi = mysql_query("SELECT MAX(`id_nota`) AS maxNota,jumlahhari AS jumlahDay, COUNT(`id_nota`) AS countNota FROM blangko08 WHERE nama_irigasi = '$_SESSION[namairigasi]' AND tgl_blangko08O = '$_GET[menu_tanggal]' AND bln_blangko08O = '$_GET[menu_bulan]' AND tahun_blangko08O = '$_GET[menu_tahun]'");
                        $n = mysql_fetch_array($notaperirigasi);
                        $countNota = $n[countNota];
                        $maxNota = $n[maxNota];

                        if($countNota == 0)
                        {
                            $notaperirigasi = mysql_query("SELECT MAX(`id_nota`)+1 AS maxNota1 FROM blangko08 WHERE nama_irigasi = '$_SESSION[namairigasi]' AND  nama_irigasi = '$_SESSION[namairigasi]'");
                            $mx = mysql_fetch_array($notaperirigasi);
                            $maxNota1 = $mx[maxNota1];
                            $n[countNota] = $maxNota1;
                            if($maxNota1==0)
                            {
                               $n[countNota] = 1;
                            }

                        }
                        else
                        {
                            $n[countNota] = $maxNota;
                        }




                         // mencari nilai rata-rata
                        $nilairata1 = mysql_query("SELECT ROUND(AVG(`totalDebit`)) AS Nilairatarata1 FROM blangko08 WHERE nama_irigasi = '$_SESSION[namairigasi]' AND tgl_blangko08O = '$_GET[menu_tanggal]' AND bln_blangko08O = '$_GET[menu_bulan]' AND tahun_blangko08O = '$_GET[menu_tahun]' AND `no_rata` ='1'");
                        $r1    = mysql_fetch_array($nilairata1);

                        $nilairata2 = mysql_query("SELECT ROUND(AVG(`totalDebit`)) AS Nilairatarata2 FROM blangko08 WHERE nama_irigasi = '$_SESSION[namairigasi]' AND tgl_blangko08O = '$_GET[menu_tanggal]' AND bln_blangko08O = '$_GET[menu_bulan]' AND tahun_blangko08O = '$_GET[menu_tahun]' AND `no_rata` ='2'");
                        $r2    = mysql_fetch_array($nilairata2);

                        $nilairata3 = mysql_query("SELECT ROUND(AVG(`totalDebit`)) AS Nilairatarata3 FROM blangko08 WHERE nama_irigasi = '$_SESSION[namairigasi]' AND tgl_blangko08O = '$_GET[menu_tanggal]' AND bln_blangko08O = '$_GET[menu_bulan]' AND tahun_blangko08O = '$_GET[menu_tahun]' AND `no_rata` ='3'");
                        $r3    = mysql_fetch_array($nilairata3);

                        /*$nilairataseluruh = mysql_query("SELECT ROUND(AVG(`totalDebit`)) AS Nilairatarataseluruh FROM blangko08 WHERE nama_irigasi = '$_SESSION[namairigasi]' AND tgl_blangko08O = '$_GET[menu_tanggal]' AND bln_blangko08O = '$_GET[menu_bulan]' AND tahun_blangko08O = '$_GET[menu_tahun]'");
                        $r0    = mysql_fetch_array($nilairataseluruh);*/

                        $r0[Nilairatarataseluruh] = ROUND(($r1[Nilairatarata1] + $r2[Nilairatarata2] + $r3[Nilairatarata3])/3);



                      echo"
          <!--<div class='row'>
           
            <div class='col-md-12'>
              <div class='nav-tabs-custom'>
                <ul class='nav nav-tabs'>
                  <li class='active'><a href='#Blangko04O' data-toggle='tab'>Blangko 04 - O</a></li>
                  <li><a href='#Blangko05O' data-toggle='tab'>Blangko 05 - O</a></li>
                  <li><a href='#Blangko06O' data-toggle='tab'>Blangko 06 - O</a></li>
                </ul>
                <div class='tab-content'>
                  <div class='active tab-pane' id='Blangko04O'>
                  
                 
                <div class='box-body'><form method=POST role='form' enctype='multipart/form-data' action='$aksi?modul=debit&act=input' >
                      <table border=0 >
                        <tr>
                          <td colspan=10 align=center><b>PENCATATAN DEBIT BANGUNGN PENGAMBILAN / <br>
                          PENCATATAN DEBIT SUNGAI  </b></td>
                      
                         </tr>
                         <tr>
                    
                          <td colspan=8><input name=bulan type=hidden class='form-control' style=margin:inherit value='$_GET[menu_bulan]' ></td>
                          <td colspan=2><table border=1 bordercolor=#aaa align=right><tr><td><b>Blangko 08 - O </b></tr></td></table></td>
                         </tr>
                         <tr>
                              <td width=16% height=35>Sugai</td>
                              <td align=right>:</td>
                              <td colspan=3 ><input name=limpas type = text class='form-control3'  style=margin:inherit value='$_SESSION[limpas]' readonly>
                              <input name=day type=hidden class='form-control' style=margin:inherit value='$i[isijumlahdebit]' ></td>
                              <td></td>
                              <td>Kabupaten</td>
                              <td align=right>:</td>
                                <td colspan=2><input name=kab type = text class='form-control3'  style=margin:inherit value='$_SESSION[kab]' readonly/>
                                <input type=hidden class='form-control' name=jumlahHari value='$hari' ></td>

                    
                         </tr>
                           <tr>
                              <td height=35>Bendung</td>
                              <td align=right>:</td>
                              <td colspan=3><input name=irigasi type = text class='form-control3'  style=margin:inherit value='$_SESSION[namairigasi]' readonly/>
                              <input type=hidden name=urutantanggal class='form-control' style=margin:inherit value='$t[inputplus]'></td>
                              <td></td>
                              <td>Ranting/Pengamat</td>
                              <td align=right>:</td>
                              <td colspan=2><input name=rantingpengamat type = text class='form-control3'  style=margin:inherit value='$_SESSION[namaranting]' readonly/>
                              <input type=hidden name=tgl class='form-control'  style=margin:inherit value='$_GET[menu_tanggal]' ></td>
                         </tr>
                         <tr>
                              <td height=35>Daerah Irigasi </td>
                              <td align=right>:</td>
                              <td colspan=3><input name=daerahirigasi type = text class='form-control3'  style=margin:inherit value='$_SESSION[namairigasi]' readonly/>
                              <input type=hidden class='form-control' name =nomer_rata style=margin:inherit value='$r[TglInput]' ></td>
                              <td></td>
                              <td>Bag. Pelaks. Kegiatan </td>
                              <td align=right>:</td>
                              <td><input name=nm_pelaksana type = text class='form-control3'  style=margin:inherit value='$_SESSION[bagianpelaksana]'readonly/></td>
                                <td><input type=hidden class='form-control' name =id_nota style=margin:inherit value='$n[countNota]' ></td>
                         </tr>
                         <tr>
                              <td height=35>Total Luas Sawah Irigasi </td>
                              <td align=right>:</td>
                              <td colspan=2 width=15%><input name=tot_sawah type = text class='form-control3'  style=margin:inherit value='$_SESSION[totalwilayah]. . .  Ha' readonly/></td>
                              <td align=right>Periode Pengambilan Air Tanggal </td>
                                <td align=right>:</td>
                    
                              <td width=12%><input type=text name=menutanggaket class='form-control3' style=margin:inherit readonly value='$menutanggal'></td>
                              <td width=3% align=right>Bln</td>
                              <td width=16%><input type=text name=menubulanket class='form-control3' style=margin:inherit  readonly value='$menubulan'></td>
                              <td width=12%><input type=text name=menutahunket class='form-control3' style=margin:inherit readonly value='$_GET[menu_tahun]'></td>
                         </tr>
                    </table>
                  
                
                  
                </div><!-- /.box-body -->
              

                    
                  </div><!-- /.tab-pane -->
                  <div class='tab-pane' id='Blangko05O'>
                    <!-- The timeline -->
                    <ul class='timeline timeline-inverse'>
                      <!-- timeline time label -->
                      <li class='time-label'>
                        <span class='bg-red'>
                          10 Feb. 2014
                        </span>
                      </li>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <li>
                        <i class='fa fa-envelope bg-blue'></i>
                        <div class='timeline-item'>
                          <span class='time'><i class='fa fa-clock-o'></i> 12:05</span>
                          <h3 class='timeline-header'><a href='#'>Support Team</a> sent you an email</h3>
                          <div class='timeline-body'>
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class='timeline-footer'>
                            <a class='btn btn-primary btn-xs'>Read more</a>
                            <a class='btn btn-danger btn-xs'>Delete</a>
                          </div>
                        </div>
                      </li>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <li>
                        <i class='fa fa-user bg-aqua'></i>
                        <div class='timeline-item'>
                          <span class='time'><i class='fa fa-clock-o'></i> 5 mins ago</span>
                          <h3 class='timeline-header no-border'><a href='#'>Sarah Young</a> accepted your friend request</h3>
                        </div>
                      </li>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <li>
                        <i class='fa fa-comments bg-yellow'></i>
                        <div class='timeline-item'>
                          <span class='time'><i class='fa fa-clock-o'></i> 27 mins ago</span>
                          <h3 class='timeline-header'><a href='#'>Jay White</a> commented on your post</h3>
                          <div class='timeline-body'>
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class='timeline-footer'>
                            <a class='btn btn-warning btn-flat btn-xs'>View comment</a>
                          </div>
                        </div>
                      </li>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <li class='time-label'>
                        <span class='bg-green'>
                          3 Jan. 2014
                        </span>
                      </li>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <li>
                        <i class='fa fa-camera bg-purple'></i>
                        <div class='timeline-item'>
                          <span class='time'><i class='fa fa-clock-o'></i> 2 days ago</span>
                          <h3 class='timeline-header'><a href='#'>Mina Lee</a> uploaded new photos</h3>
                          <div class='timeline-body'>
                            <img src='http://placehold.it/150x100' alt='...' class='margin'>
                            <img src='http://placehold.it/150x100' alt='...' class='margin'>
                            <img src='http://placehold.it/150x100' alt='...' class='margin'>
                            <img src='http://placehold.it/150x100' alt='...' class='margin'>
                          </div>
                        </div>
                      </li>
                      <!-- END timeline item -->
                      <li>
                        <i class='fa fa-clock-o bg-gray'></i>
                      </li>
                    </ul>
                  </div><!-- /.tab-pane -->

                  <div class='tab-pane' id='Blangko06O'>

                   <div class='box-body'><form method=POST role='form' enctype='multipart/form-data' action='$aksi?modul=debit&act=input' >
                      <table border=0 >
                        <tr>
                          <td colspan=10 align=center><b>PENCATATAN DEBIT BANGUNGN PENGAMBILAN / <br>
                          PENCATATAN DEBIT SUNGAI  </b></td>
                      
                         </tr>
                         <tr>
                    
                          <td colspan=8><input name=bulan type=hidden class='form-control' style=margin:inherit value='$_GET[menu_bulan]' ></td>
                          <td colspan=2><table border=1 bordercolor=#aaa align=right><tr><td><b>Blangko 08 - O </b></tr></td></table></td>
                         </tr>
                         <tr>
                              <td width=16% height=35>Sugai</td>
                              <td align=right>:</td>
                              <td colspan=3 ><input name=limpas type = text class='form-control3'  style=margin:inherit value='$_SESSION[limpas]' readonly>
                              <input name=day type=hidden class='form-control' style=margin:inherit value='$i[isijumlahdebit]' ></td>
                              <td></td>
                              <td>Kabupaten</td>
                              <td align=right>:</td>
                                <td colspan=2><input name=kab type = text class='form-control3'  style=margin:inherit value='$_SESSION[kab]' readonly/>
                                <input type=hidden class='form-control' name=jumlahHari value='$hari' ></td>

                    
                         </tr>
                           <tr>
                              <td height=35>Bendung</td>
                              <td align=right>:</td>
                              <td colspan=3><input name=irigasi type = text class='form-control3'  style=margin:inherit value='$_SESSION[namairigasi]' readonly/>
                              <input type=hidden name=urutantanggal class='form-control' style=margin:inherit value='$t[inputplus]'></td>
                              <td></td>
                              <td>Ranting/Pengamat</td>
                              <td align=right>:</td>
                              <td colspan=2><input name=rantingpengamat type = text class='form-control3'  style=margin:inherit value='$_SESSION[namaranting]' readonly/>
                              <input type=hidden name=tgl class='form-control'  style=margin:inherit value='$_GET[menu_tanggal]' ></td>
                         </tr>
                         <tr>
                              <td height=35>Daerah Irigasi </td>
                              <td align=right>:</td>
                              <td colspan=3><input name=daerahirigasi type = text class='form-control3'  style=margin:inherit value='$_SESSION[namairigasi]' readonly/>
                              <input type=hidden class='form-control' name =nomer_rata style=margin:inherit value='$r[TglInput]' ></td>
                              <td></td>
                              <td>Bag. Pelaks. Kegiatan </td>
                              <td align=right>:</td>
                              <td><input name=nm_pelaksana type = text class='form-control3'  style=margin:inherit value='$_SESSION[bagianpelaksana]'readonly/></td>
                                <td><input type=hidden class='form-control' name =id_nota style=margin:inherit value='$n[countNota]' ></td>
                         </tr>
                         <tr>
                              <td height=35>Total Luas Sawah Irigasi </td>
                              <td align=right>:</td>
                              <td colspan=2 width=15%><input name=tot_sawah type = text class='form-control3'  style=margin:inherit value='$_SESSION[totalwilayah]. . .  Ha' readonly/></td>
                              <td align=right>Periode Pengambilan Air Tanggal </td>
                                <td align=right>:</td>
                    
                              <td width=12%><input type=text name=menutanggaket class='form-control3' style=margin:inherit readonly value='$menutanggal'></td>
                              <td width=3% align=right>Bln</td>
                              <td width=16%><input type=text name=menubulanket class='form-control3' style=margin:inherit  readonly value='$menubulan'></td>
                              <td width=12%><input type=text name=menutahunket class='form-control3' style=margin:inherit readonly value='$_GET[menu_tahun]'></td>
                         </tr>
                    </table>
                  
                
                  
                </div><!-- /.box-body -->
                  
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
          </div><!-- /.row -->-->
            ";
                  header('location:media.php?modul=blangko4&menu_tanggal='.$_GET[menu_tanggal].'&menu_bulan='.$_GET[menu_bulan].'&menu_tahun='.$_GET[menu_tahun]);

                  }
                 
  break;

      
         case "editdebit":
         $edit=mysql_query("SELECT * FROM blangko08 WHERE  nama_irigasi = '$_SESSION[namairigasi]' AND  id_blangko08O='$_GET[id_blangko08O]'");
         $r=mysql_fetch_array($edit);
         echo"
         <div class='row'>
            <div class='col-xs-12'>
              
              <div class='box box-primary'>
                <div class='box-body'>

                <form method=POST role='form' enctype='multipart/form-data' action='$aksi?modul=debit&act=update' class='validate' enctype='multipart/form-data'>
                  <table border=0 >
                    <tr>
                      <td colspan=10 align=center><b>PENCATATAN DEBIT BANGUNGN PENGAMBILAN / <br>
                      PENCATATAN DEBIT SUNGAI  </b></td>
                  
                     </tr>
                     <tr>
                
                      <td colspan=8><input name=id type=hidden class='form-control3' style=margin:inherit value='$r[id_blangko08O]' ></td>
                      <td colspan=2><table border=1 bordercolor=#aaa align=right><tr><td><b>Blangko 08 - O </b></tr></td></table></td>
                     </tr>
                     <tr>
                          <td width=16% height=35>Sugai</td>
                          <td align=right>:</td>
                          <td colspan=3 ><input name=limpas type = text class='form-control3'  style=margin:inherit value='$_SESSION[limpas]' readonly>
                          <input name=tanggaldebit type=hidden class='form-control' style=margin:inherit value='$r[tgl_blangko08O]' ></td>
                          <td></td>
                          <td>Kabupaten</td>
                          <td align=right>:</td>
                            <td colspan=2><input name=kab type = text class='form-control3'  style=margin:inherit value='$_SESSION[kab]' readonly/>
                            <input type=hidden class='form-control' name=jumlahHari value='$r[jumlahhari]' ></td>

                
                     </tr>
                       <tr>
                          <td height=35>Bendung</td>
                          <td align=right>:</td>
                          <td colspan=3><input name=irigasi type = text class='form-control3'  style=margin:inherit value='$_SESSION[namairigasi]' readonly/>
                          <input type=hidden name=bln class='form-control' style=margin:inherit value='$r[bln_blangko08O]'></td>
                          <td></td>
                          <td>Ranting/Pengamat</td>
                          <td align=right>:</td>
                          <td colspan=2><input name=rantingpengamat type = text class='form-control3'  style=margin:inherit value='$_SESSION[namaranting]' readonly/>
                          <input type=hidden name=nomer_tgl class='form-control'  style=margin:inherit value='$r[no]' ></td>
                     </tr>
                     <tr>
                          <td height=35>Daerah Irigasi </td>
                          <td align=right>:</td>
                          <td colspan=3><input name=daerahirigasi type = text class='form-control3'  style=margin:inherit value='$_SESSION[namairigasi]' readonly/>
                          <input type=hidden class='form-control' name =nomer_rata style=margin:inherit value='$r[no_rata]' ></td>
                          <td></td>
                          <td>Bag. Pelaks. Kegiatan </td>
                          <td align=right>:</td>
                          <td><input name=nm_pelaksana type = text class='form-control3'  style=margin:inherit value='$_SESSION[bagianpelaksana]'readonly/></td>
                            <td><input type=hidden class='form-control' name =id_nota style=margin:inherit value='$r[id_nota]' ></td>
                     </tr>
                     <tr>
                          <td height=35>Total Luas Sawah Irigasi </td>
                          <td align=right>:</td>
                          <td width=15% colspan=2><input name=tot_sawah type = text class='form-control3'  style=margin:inherit value='$_SESSION[totalwilayah]. . . Ha' readonly/>
                          </td>
                          <td align=right>Periode Pengambilan Air Tanggal </td>
                            <td align=right>:</td>
                
                          <td width=12%><input type=text name=menutanggaket class='form-control3' style=margin:inherit readonly value='$r[tgl_ket]'></td>
                          <td width=3% align=right>Bln</td>
                          <td width=16%><input type=text name=menubulanket class='form-control3' style=margin:inherit  readonly value='$r[bln_ket]'></td>
                          <td width=12%><input type=text name=menutahunket class='form-control3' style=margin:inherit readonly value='$r[tahun_blangko08O]'></td>
                     </tr>
                </table>

               
                <table width=100% border=1 align=left bordercolor=#aaa>
                    <tr>
                      <td width=70 rowspan=3><div align=center>Tanggal</div></td>
                      <td colspan=2 rowspan=2><div align=center>Debit Limpas Bendung </div></td>
                 
                      <td height=24 colspan=4><div align=center>Debit Pintu Masuk Pengambilan </div></td>
                  
                      <td width=70 rowspan=3><div align=center>Debit Sungai (I/det) </div></td>
                      
                  </tr>
                    <tr>
                  
                        <td colspan=2><div align=center>Kanan</div></td>
                  
                  
                  
                        <td colspan=2><div align=center>Kiri</div></td>
                    </tr>
                    <tr>
                  
                      <td width=120><div align=center>H (cm) </div></td>
                      <td width=130><div align=center>Q (I/det) </div></td>
                      <td width=125><div align=center>H (cm) </div></td>
                      <td width=130><div align=center>Q (I/det) </div></td>
                      <td width=120><div align=center>H (cm) </div></td>
                      <td width=130><div align=center>Q (I/det)</div></td>
                     </tr>
                   
                     <tr>
                      <td align='center'>$r[no]
                      </td>
                      <td class='form-group'><input name=in_limpas type='number'  class='form-control'   value='$r[limpasH]'></td>
                      <td></td>
                      <td class='form-group'><input name=in_kanan type='number' class='form-control'   value='$r[irigasiKNH]'></td>
                      <td></td>
                      <td class='form-group'><input name=in_kiri type='number'  class='form-control'   value='$r[irigasiKRH]'></td>
                      <td></td>
                      <td class='form-group' colspan='2'>
                     </td>
                    
                     </tr>
                     
                    
                  </table>
                  <div class='form-group pull-right'>
                     <input type=submit value=Simpan class='btn btn-primary' onClick=\"return confirm('Apakah Anda benar-benar ingin menyimpannya?')\"> <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'>
                    </div></form>



                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->




            ";
 
  break;


         case "tampilstatus":
         $tampil=mysql_query("SELECT * FROM blangko08 WHERE id_nota='$_GET[id_nota]' AND nama_irigasi = '$_GET[nama_irigasi]'");
         $z=mysql_fetch_array($tampil);
         echo"
         <div class='row'>
            <div class='col-xs-12'>
              
              <div class='box box-primary'>
                <div class='box-body'>

                  <table border=0 >
                    <tr>
                      <td colspan=10 align=center><b>PENCATATAN DEBIT BANGUNGN PENGAMBILAN / <br>
                      PENCATATAN DEBIT SUNGAI  </b></td>
                  
                     </tr>
                     <tr>
                
                      <td colspan=8><input name=limpas type = 'hidden' class='form-control3'  style=margin:inherit value='$z[id_nota]' readonly></td>
                      <td colspan=2><table border=1 bordercolor=#aaa align=right><tr><td><b>Blangko 08 - O </b></tr></td></table></td>
                     </tr>
                     <tr>
                          <td width=16% height=35>Sugai</td>
                          <td align=right>:</td>
                          <td colspan=3 ><input name=limpas type = text class='form-control3'  style=margin:inherit value='$z[sungai]' readonly>
                          </td>
                          <td></td>
                          <td>Kabupaten</td>
                          <td align=right>:</td>
                            <td colspan=2><input name=kab type = text class='form-control3'  style=margin:inherit value='$z[kabupaten]' readonly/>
                            </td>

                
                     </tr>
                       <tr>
                          <td height=35>Bendung</td>
                          <td align=right>:</td>
                          <td colspan=3><input name=irigasi type = text class='form-control3'  style=margin:inherit value='$z[nama_irigasi]' readonly/>
                          </td>
                          <td></td>
                          <td>Ranting/Pengamat</td>
                          <td align=right>:</td>
                          <td colspan=2><input name=rantingpengamat type = text class='form-control3'  style=margin:inherit value='$z[nama_ranting]' readonly/>
                          </td>
                     </tr>
                     <tr>
                          <td height=35>Daerah Irigasi </td>
                          <td align=right>:</td>
                          <td colspan=3><input name=daerahirigasi type = text class='form-control3'  style=margin:inherit value='$z[nama_irigasi]' readonly/>
                          </td>
                          <td></td>
                          <td>Bag. Pelaks. Kegiatan </td>
                          <td align=right>:</td>
                          <td><input name=nm_pelaksana type = text class='form-control3'  style=margin:inherit value='$z[jabatan]'readonly/></td>
                            <td></td>
                     </tr>
                     <tr>
                          <td height=35>Total Luas Sawah Irigasi </td>
                          <td align=right>:</td>
                          <td width=15% colspan=2><input name=tot_sawah type = text class='form-control3'  style=margin:inherit value='$z[total_wilayah] . . . Ha' readonly/>
                          </td>
                          <td align=right>Periode Pengambilan Air Tanggal :</td>
                            <td align=right></td>
                
                          <td width=12%><input type=text name=menutanggaket class='form-control3' style=margin:inherit readonly value='$z[tgl_ket]'></td>
                          <td width=3% align=right>Bln</td>
                          <td width=16%><input type=text name=menubulanket class='form-control3' style=margin:inherit  readonly value='$z[bln_ket]'></td>
                          <td width=12%><input type=text name=menutahunket class='form-control3' style=margin:inherit readonly value='$z[tahun_blangko08O]'></td>
                     </tr>
                </table>

               
                <table width=100% border=1 align=left bordercolor=#ccc>
                      <tr>
                        <td width=70 rowspan=3><div align=center>Tanggal</div></td>
                        <td colspan=2 rowspan=2><div align=center>Debit Limpas Bendung </div></td>
                   
                        <td height=24 colspan=4><div align=center>Debit Pintu Masuk Pengambilan </div></td>
                    
                        <td width='8%' rowspan=3><div align=center>Debit Sungai (I/det) </div></td>
                        <td width='8%' rowspan=3><div align=center>Debit Sungai Rata-rata 5 Harian (I/det) </div></td>
                    </tr>
                      <tr>
                    
                          <td colspan=2><div align=center>Kanan</div></td>
                    
                    
                    
                          <td colspan=2><div align=center>Kiri</div></td>
                      </tr>
                      <tr>
                    
                        <td width=120><div align=center>H (cm) </div></td>
                        <td width=130><div align=center>Q (I/det) </div></td>
                        <td width=125><div align=center>H (cm) </div></td>
                        <td width=130><div align=center>Q (I/det) </div></td>
                        <td width=120><div align=center>H (cm) </div></td>
                        <td width=130><div align=center>Q (I/det)</div></td>
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
                       <td colspan=9 height='3px'>
                       </td>
                       </tr>
                       ";

                        $nilairata1 = mysql_query("SELECT ROUND(AVG(`totalDebit`)) AS Nilairatarata1 FROM blangko08 WHERE id_nota = '$z[id_nota]' AND nama_irigasi = '$z[nama_irigasi]' AND `no_rata` ='1'");
                        $r1    = mysql_fetch_array($nilairata1);

                        $nilairata2 = mysql_query("SELECT ROUND(AVG(`totalDebit`)) AS Nilairatarata2 FROM blangko08 WHERE id_nota = '$z[id_nota]' AND nama_irigasi = '$z[nama_irigasi]' AND `no_rata` ='2'");
                        $r2    = mysql_fetch_array($nilairata2);

                        $nilairata3 = mysql_query("SELECT ROUND(AVG(`totalDebit`)) AS Nilairatarata3 FROM blangko08 WHERE id_nota = '$z[id_nota]' AND nama_irigasi = '$z[nama_irigasi]' AND `no_rata` ='3'");
                        $r3    = mysql_fetch_array($nilairata3);

                        /*$nilairataseluruh = mysql_query("SELECT ROUND(AVG(`totalDebit`)) AS Nilairatarataseluruh FROM blangko08 WHERE id_nota = '$r[id_nota]' AND nama_irigasi = '$_SESSION[namairigasi]'");
                        $r0    = mysql_fetch_array($nilairataseluruh);*/
                        $r0[Nilairatarataseluruh] = ROUND(($r1[Nilairatarata1] + $r2[Nilairatarata2] + $r3[Nilairatarata3])/3);


                         $tampil=mysql_query("SELECT `no`,`no_rata`,`limpasH`,`limpasQ`,`irigasiKNH`,`irigasiKNQ`,`irigasiKRH`,`irigasiKRQ`,`totalDebit`,id_blangko08O 
                                              FROM `blangko08`
                                              WHERE 
                                             nama_irigasi = '$z[nama_irigasi]' AND id_nota = '$z[id_nota]'
                                              ORDER BY no ASC");
                  
                   
                   
                       while($t=mysql_fetch_array($tampil)){
                   echo "<tr>
                             <td align=center height=24>$t[no]</td>
                             <td align=center>$t[limpasH]</td>
                             <td align=center>$t[limpasQ]</td>";
                             if($t[irigasiKNH]!='0')
                             {
                              echo"
                                 <td align=center>$t[irigasiKNH]</td>
                                 <td align=center>$t[irigasiKNQ]</td>";
                             }
                             else
                             {
                              echo"
                                 <td align=center> </td>
                                 <td align=center> </td>";
                             }
                             if($t[irigasiKRH]!='0')
                             {
                              echo"
                                 <td align=center>$t[irigasiKRH]</td>
                                 <td align=center>$t[irigasiKRQ]</td>";
                             }
                             else
                             {
                                echo"
                                 <td align=center> </td>
                                 <td align=center> </td>";
                             }
                             echo"  
                             <td align=center>$t[totalDebit]</td>
                            
                             ";
                             if($z['jumlahhari']==15)
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
                             else if($z['jumlahhari']==16)
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
                             else if($z['jumlahhari']==14)
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
                             else if($z['jumlahhari']==13)
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

                          echo"
                        </tr>";
                        }
                       echo"
                       <tr>
                       <td height='24px' colspan='8' align='center'>Debit Sungai Nilai Rata-rata Setengah Bulanan </td>
                       <td align='center'>$r0[Nilairatarataseluruh]</td>
                       </tr>
                       <tr><td colspan='9' height='3px'></td></tr>
                    </table>
                    <table width=100% border=0 style=font-family:'Times New Roman', Times, serif>
                      <tr>
                        <td colspan=2>&nbsp;</td>
                        <td width=10%>&nbsp;</td>
                        <td width=40%>&nbsp;</td>
                        <td width=33%>&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan=2><b><i>Penjelasan :</i></b></td><td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td align=left>...................................20...</td>
                      </tr>
                      <tr>
                        <td width=2% valign=top height=25>1.</td>
                        <td width=27% valign=top>Pencatatan debit dilakukan tiap pukul 08.00</td>
                        <td>&nbsp;</td>
                        <td rowspan=2 valign=top>Ranting / Pengamat<br />
                      $_SESSION[namaranting]<br />
                      Tanda tangan : <br /><br />
                      <br /><br />



                        Nama : $z[kepala_ranting]<br />
                        NIP : $z[nip]</td>
                        <td rowspan=2 valign=top>Petugas Operasi Bendung<br />
                    $z[nama_irigasi]<br />
                    Tanda tangan : <br />
                    <br />
                    <br />
                    <br />
                    Nama : $z[nama_personil]<br />
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
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->




            ";
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

