<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']))
{
    echo "Untuk mengakses modul, Anda harus login";
}
else{
$aksi="modul/irigasi/aksi_irigasi.php";
switch($_GET[act]){

  default:
          echo"<div class='row'>
            <div class='col-xs-12'>
              
             <div class='box box-primary'>
                <div class='box-header'>
                  <h3 class='box-title'>Data Table With Full Features</h3>
                  <div class='btn-group pull-right'>
                    <a href='?modul=irigasi&act=tambahirigasi'><button class='btn btn-success' data-widget='' type='button'>Tambah Data</button></a>
                  </div>
                </div><!-- /.box-header -->
                <div class='box-body'>
                  <table id='example1' class='table table-striped'>
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Daerah Irigasi</th>
                        <th>Kode Irigasi</th>
                        <th>Total Wilayah</th>
                        <th>Petak Tersier</th>
                        <th>Sungai</th>
                        <th>Ranting Pengamat</th>
                        <th>Kabupaten</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>";
                    $tampil=mysql_query("SELECT `nama_irigasi`,`kode_irigasi`,`total_wilayah`,`jumlah_tersier`,`sungai`,`ranting`.`nama_ranting`,`kabupaten`,`id_irigasi`,`foto_bendungan` FROM `irigasi`,`ranting` WHERE `irigasi`.`id_ranting`=`ranting`.`id_ranting` ORDER BY id_irigasi DESC");
                    $no=1;
                    while ($r=mysql_fetch_array($tampil)){
                    echo "
                      <tr>
                        <td>$no</td>
                        <td>$r[nama_irigasi]</td>
                        <td>$r[kode_irigasi]</td>
                        <td>$r[total_wilayah]</td>
                        <td>$r[jumlah_tersier]</td>
                        <td>$r[sungai]</td>
                        <td>$r[nama_ranting]</td>
                        <td>$r[kabupaten]</td>
                        <td align='right'>
                          <div class='btn-group pull-right'> 
                            <i class='glyphicon glyphicon-cog' data-toggle='dropdown' style='cursor:pointer'></i>
                            <ul class='dropdown-menu'>
                              <li><a href='?modul=irigasi&act=editirigasi&id=$r[id_irigasi]'><i class='glyphicon glyphicon-pencil'></i>Edit</a></li>
                              <li><a href=\"$aksi?modul=irigasi&act=hapus&id=$r[id_irigasi]&namafile=$r[foto_bendungan]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><i class='glyphicon glyphicon-trash'></i>Hapus</a></li>
                            </ul>
                        </div>
                        </td>
                      </tr>";
                      $no++;
                    }
                    echo "
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
          ";
  break;

  case "tambahirigasi":

 echo"<div class='row'>
          <div class='col-xs-12'>
            <div class='box box-primary'>
              <div class='box-header'>
                <h3 class='box-title'>Tambah Data irigasi</h3>
              </div><!-- /.box-header -->
            <div class='box-body'>
                <form class='form-horizontal' method=POST  action='$aksi?modul=irigasi&act=input' enctype='multipart/form-data'>
                      <div class='form-group'>
                          
                              <div class='col-sm-12'> 
                              <label for='inputFotoBendung' class='control-label' align='center'>Foto Bendungan</label>
                                <div class='fileinput fileinput-new' data-provides='fileinput'>
                                  <div class='fileinput-new thumbnail' style='width: 1400px;' data-trigger='fileinput'>
                                    <img src='assets/images/login.png' alt='...' style='width: 1400px;'>
                                  </div>
                                  <div class='fileinput-preview fileinput-exists thumbnail' style='max-width: 1400px; '>
                                  </div>
                                  <div>
                                    <span class='btn btn-default btn-file'>
                                      <span class='fileinput-new'>Select image</span>
                                        <span class='fileinput-exists'>Change</span>
                                          <input id='inputFotoBendung' type='file' class='btn btn-default' name='fupload'>
                                    </span>
                                      <a href='#' class='btn btn-orange fileinput-exists' data-dismiss='fileinput'>Remove</a>
                                  </div>
                                </div>
                              </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputKodeIrigasi' class='col-sm-2 control-label'>Kode Inisialisasi</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='inputKodeIrigasi' placeholder='Kode Inisialisasi' name='kode' required>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputNameirigasi' class='col-sm-2 control-label'>Nama irigasi</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='inputNameirigasi' placeholder='Nama irigasi' name='nama_irigasi' required>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputKode' class='col-sm-2 control-label'>Kode Irigasi</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='inputKode' placeholder='Kode Irigasi' name='kode_irigasi'>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputTotal' class='col-sm-2 control-label'>Total Wilayah</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='inputTotal' placeholder='Total Luas Wilayah' name='total_wilayah' required>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputPetak' class='col-sm-2 control-label'>Jumlah Petak Tersier</label>
                        <div class='col-sm-10'>
                          <input type='number' class='form-control' id='inputPetak' placeholder='Jumlah Petak Tersier' name='jumlah_tersier' required>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputSungai' class='col-sm-2 control-label'>Sungai</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='inputSungai' placeholder='Sungai' name='sungai' required>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputRanting' class='col-sm-2 control-label'>Ranting Pengamat</label>
                        <div class='col-sm-10'>
                          <select class='form-control' id='inputRanting' name='menu_ranting'>
                            <option value=0 selected>-Pilih-</option>";
                              $tampil=mysql_query("SELECT * FROM ranting ORDER BY id_ranting");
                              while($r=mysql_fetch_array($tampil))
                              {
                                echo "<option value=$r[id_ranting]>$r[nama_ranting]</option>";
                              }
                              echo"
                          </select>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputBendung' class='col-sm-2 control-label'>Nama Bendung</label>
                        <div class='col-sm-10'>
                          <select class='form-control' id='inputBendung' name='menu_bendung'>
                            <option value=0 selected>-Pilih-</option>";
                              $tampil=mysql_query("SELECT * FROM bendung ORDER BY id_bendung");
                              while($r=mysql_fetch_array($tampil))
                              {
                                echo "<option value=$r[id_bendung]>$r[nama_bendung]</option>";
                              }
                              echo"
                          </select>
                        </div>
                      </div>
                       <div class='form-group'>
                        <label for='inputKabupaten' class='col-sm-2 control-label'>Kabupaten</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='inputKabupaten' placeholder='Kabupaten' name='kabupaten' required>
                        </div>
                      </div>
                       <div class='form-group'>
                        <label for='inputLintas' class='col-sm-2 control-label'>Lintas Daerah</label>
                        <div class='col-sm-10'><p></p>
                          <input type='radio' value='yes' name='lintas_daerah'> Ya &nbsp;&nbsp;&nbsp; <input type='radio' value='no' name='lintas_daerah'> Tidak
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputLimpas' class='col-sm-2 control-label'>Lebar Limpas</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='inputLimpas' placeholder='Lebar Limpas' name='lebar_limpas' required>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputIrigasi' class='col-sm-2 control-label'>Lebar Irigasi</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='inputIrigasi' placeholder='Lebar Irigasi' name='lebar_irigasi' required>
                        </div>
                      </div>
       
                      <div class='form-group'>
                        <div class='col-sm-offset-2 col-sm-10'>
                          <button type='submit' class='btn btn-success'>Submit</button>
                          <button type='button' class='btn btn-danger' onclick=self.history.back()>Cancel</button>
                        </div>
                      </div>
                </form>

            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div><!-- /.col -->
      </div><!-- /.row -->
      ";
      break;

      case "editirigasi":

    $edit=mysql_query("SELECT * FROM irigasi WHERE id_irigasi='$_GET[id]'");
    $r=mysql_fetch_array($edit);
 echo"<div class='row'>
          <div class='col-xs-12'>
            <div class='box box-primary'>
              <div class='box-header'>
                <h3 class='box-title'>Tambah Data irigasi</h3>
              </div><!-- /.box-header -->
            <div class='box-body'>
                <form class='form-horizontal' method=POST  action='$aksi?modul=irigasi&act=update' enctype='multipart/form-data'>
                      <div class='form-group'>                            
                              <div class='col-sm-12'> 
                              <input type='hidden' value='$r[id_irigasi]' name='id'>
                              <label for='inputFotoBendung' class='control-label'>Foto Bendungan</label>
                                <div class='fileinput fileinput-new' data-provides='fileinput'>
                                  <div class='fileinput-new thumbnail' style='width: 1400px;' data-trigger='fileinput'>
                                    ";
                                    if($r['foto_bendungan']!=''){
                                    echo"<img src='foto_bendungan/$r[foto_bendungan]' alt='...'>";
                                    }else{
                                    echo"<img src='assets/images/login.png' alt='...' style='width: 1400px;'>";
                                    }
                                    echo"
                                  </div>
                                  <div class='fileinput-preview fileinput-exists thumbnail' style='max-width: 1400px;'>
                                  </div>
                                  <div>
                                    <span class='btn btn-default btn-file'>
                                      <span class='fileinput-new'>Select image</span>
                                        <span class='fileinput-exists'>Change</span>
                                          <input type='file' class='btn btn-default' name='fupload' accept='image/*'>
                                    </span>
                                      <a href='#' class='btn btn-orange fileinput-exists' data-dismiss='fileinput'>Remove</a>
                                  </div>
                                </div>
                              </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputKodeIrigasi' class='col-sm-2 control-label'>Kode Inisialisasi</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='inputKodeIrigasi' value='$r[kode]' name='kode' required>
                        </div>
                      </div>

                      <div class='form-group'>
                        <label for='inputNameirigasi' class='col-sm-2 control-label'>Nama irigasi</label>
                        <div class='col-sm-10'>
                           <input type='text' class='form-control' id='inputNameirigasi' value='$r[nama_irigasi]' name='nama_irigasi' required>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputKode' class='col-sm-2 control-label'>Kode irigasi</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='inputKode' value='$r[kode_irigasi]' name='kode_irigasi'>
                        </div>
                      </div>
                       <div class='form-group'>
                        <label for='inputWilayah' class='col-sm-2 control-label'>Total Wilayah</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='inputWilayah' value='$r[total_wilayah]' name='total_wilayah' required>
                        </div>
                      </div>
                       <div class='form-group'>
                        <label for='inputPtersier' class='col-sm-2 control-label'>Jumlah Ptk Tersier</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='inputPtersier' value='$r[jumlah_tersier]' name='jumlah_tersier' required>
                        </div>
                      </div>
                       <div class='form-group'>
                        <label for='inputSungai' class='col-sm-2 control-label'>Sungai</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='inputSungai' value='$r[sungai]' name='sungai' required>
                        </div>
                      </div>

                      <div class='form-group'>
                        <label for='inputRanting' class='col-sm-2 control-label'>Ranting Pengamat</label>
                        <div class='col-sm-10'>
                          <select class='form-control' id='inputRanting' name='menu_ranting'>";
                            $tampil=mysql_query("SELECT * FROM ranting ORDER BY nama_ranting");
                            while($w=mysql_fetch_array($tampil)){
                            if ($r[id_ranting]==$w[id_ranting]){
                                echo "<option value=$w[id_ranting] selected>$w[nama_ranting]</option>";
                            }
                            else{
                            echo "<option value=$w[id_ranting]>$w[nama_ranting]</option>";
                            }
                            }
                            echo"</select>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputBendung' class='col-sm-2 control-label'>Nama Bendung</label>
                        <div class='col-sm-10'>
                          <select class='form-control' id='inputBendung' name='menu_bendung'>";
                            $tampil=mysql_query("SELECT * FROM bendung ORDER BY nama_bendung");
                            while($w=mysql_fetch_array($tampil)){
                            if ($r[id_bendung]==$w[id_bendung]){
                              echo "<option value=$w[id_bendung] selected>$w[nama_bendung]</option>";
                            }
                            else{
                            echo "<option value=$w[id_bendung]>$w[nama_bendung]</option>";
                            }
                            }
                            echo"</select>
                        </div>
                      </div>

                       <div class='form-group'>
                        <label for='inputKabupaten' class='col-sm-2 control-label'>Kabupaten</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='inputKabupaten' value='$r[kabupaten]' name='kabupaten' required>
                        </div>
                      </div>

                      ";
                      if ($r[lintas_daerah]=='yes'){
                          echo "
                       <div class='form-group'>
                        <label for='inputLintas' class='col-sm-2 control-label'>Lintas Daerah</label>
                        <div class='col-sm-10'><p></p>
                          <input type='radio' value='yes' name='lintas_daerah' checked> Ya &nbsp;&nbsp;&nbsp; <input type='radio' value='no' name='lintas_daerah'> Tidak
                        </div>
                      </div>
                      ";
                      }
                      else{

                      echo"<div class='form-group'>
                        <label for='inputLintas' class='col-sm-2 control-label'>Lintas Daerah</label>
                        <div class='col-sm-10'><p></p>
                          <input type='radio' value='yes' name='lintas_daerah'> Ya &nbsp;&nbsp;&nbsp; <input type='radio' value='no' name='lintas_daerah' checked> Tidak
                        </div>
                      </div>";
                      }

                      echo"<div class='form-group'>
                        <label for='inputLimpas' class='col-sm-2 control-label'>Lebar Limpas</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='inputLimpas' value='$r[lebar_limpas]' name='lebar_limpas' required>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputIrigasi' class='col-sm-2 control-label'>Lebar Irigasi</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='inputIrigasi' value='$r[lebar_irigasi]' name='lebar_irigasi' required>
                        </div>
                      </div>
                       
                      <div class='form-group'>
                        <div class='col-sm-offset-2 col-sm-10'>
                          <button type='submit' class='btn btn-success'>Submit</button>
                          <button type='button' class='btn btn-danger' onclick=self.history.back()>Cancel</button>
                        </div>
                      </div>
                </form>

            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div><!-- /.col -->
      </div><!-- /.row -->
      ";
      break;

       case "tampilirigasi":

    $edit=mysql_query("SELECT * FROM irigasi,ranting,bendung 
                          WHERE irigasi.id_ranting = ranting.id_ranting  
                          AND Irigasi.id_bendung  = bendung.id_bendung  
                          AND  id_irigasi='$_GET[id]'");
    $r=mysql_fetch_array($edit);
 echo"<div class='row'>
          
        <div class='col-md-4'>

              <!-- Profile Image -->
              <div class='box box-primary'>
                <div class='box-body box-profile'>
                  <p class='text-center'><b> Daerah Irigasi : $r[nama_irigasi]</b></p>

                  <ul class='list-group list-group-unbordered'>
                    <li class='list-group-item'>
                      <b class='text-muted'>Daerah Irigasi :</b> <a class='pull-right'>$r[nama_irigasi]</a>
                    </li>
                    <li class='list-group-item'>";
                     if($r['kode_irigasi']==null)
                     {
                        echo"<b class='text-muted'>Kode Irigasi :</b> <a class='pull-right'>-</a>";
                     }
                     else
                     {
                        echo"<b class='text-muted'>Kode Irigasi :</b> <a class='pull-right'>$r[kode_irigasi]</a>";
                     }echo"
                    </li>
                    <li class='list-group-item'>
                      <b class='text-muted'>Total Luas Wilayah :</b> <a class='pull-right'>$r[total_wilayah] ha</a>
                    </li>
                    <li class='list-group-item'>
                      <b class='text-muted'>Jumlah Petak Tersier :</b> <a class='pull-right'>$r[jumlah_tersier] buah</a>
                    </li>
                    <li class='list-group-item'>
                      <b class='text-muted'>Sungai :</b> <a class='pull-right'>$r[sungai]</a>
                    </li>
                     <li class='list-group-item'>
                      <b class='text-muted'>Ranting/Pengamat :</b> <a class='pull-right'>$r[nama_ranting]</a>
                    </li>
                     <li class='list-group-item'>
                      <b class='text-muted'>Bentuk Bendung :</b> <a class='pull-right'>$r[nama_bendung]</a>
                    </li>
                    <li class='list-group-item'>
                      <b class='text-muted'>Kabupaten :</b> <a class='pull-right'>$r[kabupaten]</a>
                    </li>
                     <li class='list-group-item'>";
                     if($r['lintas_daerah']=='no')
                     {
                        echo"<b class='text-muted'>Lintas Daerah :</b> <a class='pull-right'>-</a>";
                     }
                     else
                     {
                        echo"<b class='text-muted'>Lintas Daerah :</b> <a class='pull-right'>Ya</a>";
                     }
                     echo"
                    </li>
                     <li class='list-group-item'>
                      <b class='text-muted'>Lebar Limpas di Bendung :</b> <a class='pull-right'>$r[lebar_limpas] m</a>
                    </li>
                    <li class='list-group-item'>
                      <b class='text-muted'>Lebar Irigasi di Bendung :</b> <a class='pull-right'>$r[lebar_irigasi] m</a>
                    </li>
                  </ul>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
        </div><!-- /.col -->
         <div class='col-md-8'>

              <!-- Profile Image -->
              <div class='box box-primary'>
                <div class='box-body box-profile'>
                  <p class='text-center'><b> Foto Bendung : $r[nama_irigasi]</b></p>

                  <div class='form-group' style='height:457px'>                            
                              <div class='col-sm-12'> 
                              <input type='hidden' value='$r[id_irigasi]' name='id'>
                              <label for='inputFotoBendung' class='control-label text-muted'>Foto Bendungan</label>
                                <div class='fileinput fileinput-new' data-provides='fileinput'>
                                  <div class='fileinput-new thumbnail' style='width: 1400px;' data-trigger='fileinput'>
                                    ";
                                    if($r['foto_bendungan']!=''){
                                    echo"<img src='foto_bendungan/$r[foto_bendungan]' alt='...'>";
                                    }else{
                                    echo"<img src='assets/images/login.png' alt='...' style='width: 1400px;'>";
                                    }
                                    echo"
                                  </div>
                                  <div class='fileinput-preview fileinput-exists thumbnail' style='max-width: 1400px;'>
                                  </div>
                                </div>
                              </div>
                      </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
        </div><!-- /.col -->
       
     
       <div class='col-md-12'>
                  <!-- USERS LIST -->
                  <div class='box box-primary'>
                    <div class='box-header with-border'>
                      <p class='text-center'><b>Nama-nama Personil : $r[nama_irigasi]</p>
                    </div><!-- /.box-header -->
                    <div class='box-body no-padding direct-chat-messages' style='height:400px'>
                      <ul class='users-list clearfix'>";
                       $tampilfotopersonil = mysql_query("SELECT id_personil,nama_lengkap,foto_personil,MID(awal_kerja,6,2) AS Awal_kerja,LEFT(awal_kerja,4) AS Tahun
                                                            FROM personil,irigasi 
                                                            WHERE personil.id_irigasi  = irigasi.id_irigasi 
                                                            AND nama_irigasi = '$r[nama_irigasi]'");
                        while($f=mysql_fetch_array($tampilfotopersonil))
                        {
                          if($f[Awal_kerja]=='01')
                          {
                            $awalkerja = 'Januari';
                          }
                          else if($f[Awal_kerja]=='02')
                          {
                            $awalkerja = 'Februari';
                          }
                          else if($f[Awal_kerja]=='03')
                          {
                            $awalkerja = 'Maret';
                          }
                          else if($f[Awal_kerja]=='04')
                          {
                            $awalkerja = 'April';
                          }
                          else if($f[Awal_kerja]=='05')
                          {
                            $awalkerja = 'Mei';
                          }
                          else if($f[Awal_kerja]=='06')
                          {
                            $awalkerja = 'Juni';
                          }
                          else if($f[Awal_kerja]=='07')
                          {
                            $awalkerja = 'Juli';
                          }
                          else if($f[Awal_kerja]=='08')
                          {
                            $awalkerja = 'Agustus';
                          }
                          else if($f[Awal_kerja]=='09')
                          {
                            $awalkerja = 'September';
                          }
                          else if($f[Awal_kerja]=='10')
                          {
                            $awalkerja = 'Oktober';
                          }
                          else if($f[Awal_kerja]=='11')
                          {
                            $awalkerja = 'Nopember';
                          }
                          else if($f[Awal_kerja]=='12')
                          {
                            $awalkerja = 'Desember';
                          }
                          else 
                          {
                            $awalkerja = 'Error';
                          }
                        echo" 
                            <li>
                              <img src='foto_personil/$f[foto_personil]' height ='112px' width='112px' alt='User Image' class='profile-user-img img-responsive img-circle' >
                              <a class='users-list-name' href='?modul=personil&act=tampilpersonil&id=$f[id_personil]'>$f[nama_lengkap]</a>
                              <span class='users-list-date'>$awalkerja $f[Tahun]</span>
                            </li>";
                        }
                        echo"
                      </ul><!-- /.users-list -->
                    </div><!-- /.box-body -->
                    <div class='box-footer text-center'>
                      
                    </div><!-- /.box-footer -->
                  </div><!--/.box -->
                </div><!-- /.col -->
      </div><!-- /.row -->
      ";
      break;

  
}
}
?>