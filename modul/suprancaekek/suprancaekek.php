<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']))
{
    echo "Untuk mengakses modul, Anda harus login";
}
else{
$aksi="modul/suprancaekek/aksi_suprancaekek.php";
switch($_GET[act]){

  default:
          echo"

          <div class='row'>
            <div class='col-md-9'>
              <div class='box box-primary'>
                <div class='box-body'>
                  <div id='carousel-example-generic' class='carousel slide' data-ride='carousel'>
                    <ol class='carousel-indicators'>
                      <li data-target='#carousel-example-generic' data-slide-to='0' class='active'></li>
                      ";
                        $tampilfotobendungan = mysql_query("SELECT * FROM irigasi");
                        $no=1;
                        while($r=mysql_fetch_array($tampilfotobendungan))
                        { 
                          echo" <li data-target='#carousel-example-generic' data-slide-to='$no' class=''></li>";
                          $no++;
                        }
                      echo"
                    </ol>
                    <div class='carousel-inner'>
                      <div class='item active'>
                        <img src='assets/images/login.png' alt='...' style='width: 1400px; height:446px;'>
                        <div class='carousel-caption'>
                          Situ Cisanti
                        </div>
                      </div>
                      ";
                        $tampilfotobendungan = mysql_query("SELECT * FROM irigasi");
                        while($r=mysql_fetch_array($tampilfotobendungan))
                        { 
                          echo"
                      <div class='item'>
                        <a href='?modul=irigasi&act=tampilirigasi&id=$r[id_irigasi]'><img src='foto_bendungan/$r[foto_bendungan]' alt='...' style='width: 1400px; height:446px;'></a> 
                        <div class='carousel-caption'>
                          $r[nama_irigasi]
                        </div>
                      </div>
                      ";}
                      echo"
                    </div>
                      <a class='left carousel-control' href='#carousel-example-generic' data-slide='prev'>
                        <span class='fa fa-angle-left'></span>
                      </a>
                      <a class='right carousel-control' href='#carousel-example-generic' data-slide='next'>
                        <span class='fa fa-angle-right'></span>
                      </a>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->

            <div class='col-md-3'>
                  <!-- DIRECT CHAT -->
                  <div class='box box-primary'>
                    <div class='box-body'>
                    <i class='glyphicon glyphicon-tag'></i> <b>Non-Lintas Daerah :</b>
                      <div class='direct-chat-messages bordered' style='height:216px'>
                        <ul class='list-group list-group-unbordered'>
                         ";
                          $tampilirigasilintasdaerah = mysql_query("SELECT * FROM irigasi WHERE lintas_daerah = 'no' ORDER BY nama_irigasi ASC");
                          while($r=mysql_fetch_array($tampilirigasilintasdaerah))
                          { 
                          echo"
                          <li class='list-group-item'>
                            <p>Daerah Irigas : <a href='?modul=irigasi&act=tampilirigasi&id=$r[id_irigasi]' class='pull-right'>$r[nama_irigasi]</a></p>
                            <p>Areal : <a href='?modul=irigasi&act=tampilirigasi&id=$r[id_irigasi]' class='pull-right'>$r[total_wilayah] Ha</a></p>
                            <p>Jumlah Ptk Tersier : <a href='?modul=irigasi&act=tampilirigasi&id=$r[id_irigasi]' class='pull-right'>$r[jumlah_tersier]</a></p>
                            <p>Sungai : <a href='?modul=irigasi&act=tampilirigasi&id=$r[id_irigasi]' class='pull-right'>$r[sungai]</a></p>
                          </li>
                          ";
                          }
                          echo"
                        </ul>
                      </div><!--/.direct-chat-messages-->

                      <i class='glyphicon glyphicon-tag'></i> <b>Lintas Daerah :</b>
                      <div class='direct-chat-messages' style='height:189px'>
                        <ul class='list-group list-group-unbordered'>
                          ";
                          $tampilirigasilintasdaerah = mysql_query("SELECT * FROM irigasi WHERE lintas_daerah = 'yes' ORDER BY nama_irigasi ASC");
                          while($r=mysql_fetch_array($tampilirigasilintasdaerah))
                          { 
                          echo"
                          <li class='list-group-item'>
                            <p>Daerah Irigas : <a href='?modul=irigasi&act=tampilirigasi&id=$r[id_irigasi]' class='pull-right'>$r[nama_irigasi]</a></p>
                            <p>Areal : <a href='?modul=irigasi&act=tampilirigasi&id=$r[id_irigasi]' class='pull-right'>$r[total_wilayah] Ha</a></p>
                            <p>Jumlah Ptk Tersier : <a href='?modul=irigasi&act=tampilirigasi&id=$r[id_irigasi]' class='pull-right'>$r[jumlah_tersier]</a></p>
                            <p>Sungai : <a href='?modul=irigasi&act=tampilirigasi&id=$r[id_irigasi]' class='pull-right'>$r[sungai]</a></p>
                          </li>
                          ";
                          }
                          echo"
                        </ul>
                      </div><!--/.direct-chat-messages-->


                      
                    </div><!-- /.box-body -->
                    
                  </div><!--/.direct-chat -->
            </div><!-- /.col -->

            <div class='col-md-12'>
                  <!-- DIRECT CHAT -->
                  <div class='box box-primary'>
                    <div class='box-body'>
                    <i class='glyphicon glyphicon-book'></i> <b>Istilah dan Definisi :</b>
                      <div class='direct-chat-messages' style='height:290px'>
                        <ul class='list-group list-group-unbordered'>
                         ";
                          $tampilistilah = mysql_query("SELECT * FROM istilah ORDER BY id_istilah ASC");
                          $no=1;
                          while($r=mysql_fetch_array($tampilistilah))
                          { 
                          echo"
                          <li class='list-group-item'>
                            <table width='100%'>
                              <tr>
                                <td width='3%' valign='top'><b>$no. </b></td>
                                <td><p><b>$r[nama_istilah]</b> $r[pengertian]</p></td>
                              </tr>
                            </table>
                          </li>
                          ";
                          $no++;
                          }
                          echo"
                        </ul>
                      </div><!--/.direct-chat-messages-->
                    </div><!-- /.box-body -->
                    
                  </div><!--/.direct-chat -->
            </div><!-- /.col -->
          </div><!-- /.row -->
            ";
  break;
}
}
?>