<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']))
{
    echo "Untuk mengakses modul, Anda harus login";
}
else{
$aksi="modul/personil/aksi_personil.php";
switch($_GET[act]){

  default:
          echo"<div class='row'>
            <div class='col-xs-12'>
              
             <div class='box box-primary'>
                <div class='box-header'>
                  <h3 class='box-title'>Data Table With Full Features</h3>
                  <div class='btn-group pull-right'>
                    <a href='?modul=personil&act=tambahpersonil'><button class='btn btn-success' data-widget='' type='button'>Tambah Data</button></a>
                  </div>
                </div><!-- /.box-header -->
                <div class='box-body'>
                  <table id='example1' class='table table-striped'>
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>Pendidikan</th>
                        <th>Irigasi</th>
                        <th>Awal Kerja</th>
                        <th>Bag. Pelaksana</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>";
                    $tampil=mysql_query("SELECT `nama_lengkap`,`jenis_kelamin`,`pendidikan`.`nama_pendidikan`,`irigasi`.`nama_irigasi`,`awal_kerja`,`jabatan`.`bagian_pelaksana`,`no_handphone`,`id_personil`,`foto_personil` FROM `personil`,`irigasi`,`jabatan`,`pendidikan` WHERE `personil`.`id_irigasi`=`irigasi`.`id_irigasi` AND `personil`.`id_jabatan`=`jabatan`.`id_jabatan` AND personil.id_pendidikan = pendidikan.id_pendidikan ORDER BY id_personil DESC");
                    $no=1;
                    while ($r=mysql_fetch_array($tampil)){
                    echo "
                      <tr>
                        <td>$no</td>
                        <td>$r[nama_lengkap]</td>
                        <td>$r[jenis_kelamin]</td>
                        <td>$r[nama_pendidikan]</td>
                        <td>$r[nama_irigasi]</td>
                        <td>$r[awal_kerja]</td>
                        <td>$r[bagian_pelaksana]</td>
                        <td align='right'>
                          <div class='btn-group pull-right'> 
                            <i class='glyphicon glyphicon-cog' data-toggle='dropdown'  style='cursor:pointer'></i>
                            <ul class='dropdown-menu'>
                              <li><a href='?modul=personil&act=editpersonil&id=$r[id_personil]'><i class='glyphicon glyphicon-pencil'></i>Edit</a></li>
                              <li><a href=\"$aksi?modul=personil&act=hapus&id=$r[id_personil]&namafile=$r[foto_personil]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><i class='glyphicon glyphicon-trash'></i>Hapus</a></li>
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

  case "tambahpersonil":

 echo"<div class='row'>
          <div class='col-xs-12'>
            <div class='box box-primary'>
              <div class='box-header'>
                <h3 class='box-title'>Tambah Data personil</h3>
              </div><!-- /.box-header -->
            <div class='box-body'>
                <form class='form-horizontal' method=POST  action='$aksi?modul=personil&act=input' enctype='multipart/form-data'>
                      <div class='form-group'>
                        <label for='inputNamepersonil' class='col-sm-2 control-label'>Nama Lengkap</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='inputNamepersonil' placeholder='Nama Lengkap' name='nama_lengkap' required>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputNickname' class='col-sm-2 control-label'>Nama Panggilan</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='inputNickname' placeholder='Nama Panggailan' name='nama_panggilan' required>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputTl' class='col-sm-2 control-label'>Tempat Lahir</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='inputTl' placeholder='Tempat Lahir' name='tempat_lahir' required>
                        </div>
                      </div>
                      <div class='form-group has-feedback'>
                        <label for='inputTglLahir' class='col-sm-2 control-label'>Tanggal Lahir</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control datepicker' id='inputTglLahir' placeholder='Tempat Lahir' name='tanggal_lahir' data-format='yyyy-mm-dd' required>
                            <span class='glyphicon glyphicon-calendar form-control-feedback'></span>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label class='col-sm-2 control-label'>Jenis Kelamin</label>
                        <div class='col-sm-10'><p></p>
                          <input type='radio' value='Laki-laki' name='jenis_kelamin'> Laki-laki &nbsp;&nbsp;&nbsp; <input type='radio' value='Perempuan' name='jenis_kelamin'> Perempuan
                        </div>
                      </div>
                       <div class='form-group'>
                        <label for='inputAlamat' class='col-sm-2 control-label'>Alamat</label>
                        <div class='col-sm-10'>
                          <textarea class='form-control' id='inputAlamat' placeholder='Alamat' name='alamat' required></textarea>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputAgama' class='col-sm-2 control-label'>Agama</label>
                        <div class='col-sm-10'>
                          <select class='form-control' id='inputAgama' name='menu_agama'>
                            <option value=0 selected>-Pilih-</option>";
                              $tampil=mysql_query("SELECT * FROM agama ORDER BY id_agama");
                              while($r=mysql_fetch_array($tampil))
                              {
                                echo "<option value=$r[id_agama]>$r[nama_agama]</option>";
                              }
                              echo"
                          </select>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputPendidikan' class='col-sm-2 control-label'>Pendidikan Terakhir</label>
                        <div class='col-sm-10'>
                          <select class='form-control' id='inputPendidikan' name='menu_pendidikan'>
                            <option value=0 selected>-Pilih-</option>";
                              $tampil=mysql_query("SELECT * FROM pendidikan ORDER BY id_pendidikan");
                              while($r=mysql_fetch_array($tampil))
                              {
                                echo "<option value=$r[id_pendidikan]>$r[nama_pendidikan]</option>";
                              }
                              echo"
                          </select>
                        </div>
                      </div>
                       <div class='form-group'>
                        <label class='col-sm-2 control-label'>Status Perkawinan</label>
                        <div class='col-sm-10'><p></p>
                          <input type='radio' value='Belum Kawin' name='status_perkawinan'> Belum Kawin &nbsp;&nbsp;&nbsp; <input type='radio' value='Kawin' name='status_perkawinan'> Kawin
                          
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputIrigasi' class='col-sm-2 control-label'>Daerah Irigasi</label>
                        <div class='col-sm-10'>
                          <select class='form-control' id='inputIrigasi' name='menu_irigasi'>
                            <option value=0 selected>-Pilih-</option>";
                              $tampil=mysql_query("SELECT * FROM irigasi ORDER BY id_irigasi");
                              while($r=mysql_fetch_array($tampil))
                              {
                                echo "<option value=$r[id_irigasi]>$r[nama_irigasi]</option>";
                              }
                              echo"
                          </select>
                        </div>
                      </div>
                      <div class='form-group has-feedback'>
                        <label for='inputAwalkerja' class='col-sm-2 control-label'>Awak Kerja</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control datepicker' id='inputAwalkerja' placeholder='Awal Kerja' name='awal_kerja' data-format='yyyy-mm-dd' required>
                            <span class='glyphicon glyphicon-calendar form-control-feedback'></span>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputPelaksana' class='col-sm-2 control-label'>Pelaksana Kegiatan</label>
                        <div class='col-sm-10'>
                          <select class='form-control' id='inputPelaksana' name='menu_jabatan'>
                            <option value=0 selected>-Pilih-</option>";
                              $tampil=mysql_query("SELECT * FROM jabatan ORDER BY id_jabatan");
                              while($r=mysql_fetch_array($tampil))
                              {
                                echo "<option value=$r[id_jabatan]>$r[nama_jabatan] - $r[bagian_pelaksana]</option>";
                              }
                              echo"
                          </select>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputNohp' class='col-sm-2 control-label'>No. Handphone</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='inputNohp' placeholder='Nomer Handphone' name='no_handphone' required>
                        </div>
                      </div>
                      <div class='form-group'>
                          <label for='inputFotoBendung' class='col-sm-2 control-label'>Foto Personil</label>
                              <div class='col-sm-10'> 
                                <div class='fileinput fileinput-new' data-provides='fileinput'>
                                  <div class='fileinput-new thumbnail' style='width: 400px;' data-trigger='fileinput'>
                                    <img src='assets/images/foto_personil.png' alt='...' style='width: 400px;'>
                                  </div>
                                  <div class='fileinput-preview fileinput-exists thumbnail' style='max-width: 400px; '>
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

      case "editpersonil":

    $edit=mysql_query("SELECT * FROM personil WHERE id_personil='$_GET[id]'");
    $r=mysql_fetch_array($edit);
 echo"<div class='row'>
          <div class='col-xs-12'>
            <div class='box box-primary'>
              <div class='box-header'>
                <h3 class='box-title'>Tambah Data personil</h3>
              </div><!-- /.box-header -->
            <div class='box-body'>
                <form class='form-horizontal' method=POST  action='$aksi?modul=personil&act=update' enctype='multipart/form-data'>
                       <div class='form-group'>
                        <label for='inputNamepersonil' class='col-sm-2 control-label'>Nama Lengkap</label>
                        <div class='col-sm-10'>
                        <input type='hidden' value='$r[id_personil]' name='id'>
                          <input type='text' class='form-control' id='inputNamepersonil' value='$r[nama_lengkap]' name='nama_lengkap' required>
                        </div>
                      </div>
                       <div class='form-group'>
                        <label for='inputNickname' class='col-sm-2 control-label'>Nama Panggilan</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='inputNickname' value='$r[nama_panggilan]' name='nama_panggilan' required>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputTl' class='col-sm-2 control-label'>Tempat Lahir</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='inputTl' value='$r[tempat_lahir]' name='tempat_lahir' required>
                        </div>
                      </div>
                      <div class='form-group has-feedback'>
                        <label for='inputTglLahir' class='col-sm-2 control-label'>Tanggal Lahir</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control datepicker' id='inputTglLahir' value='$r[tanggal_lahir]' name='tanggal_lahir' data-format='yyyy-mm-dd' required>
                            <span class='glyphicon glyphicon-calendar form-control-feedback'></span>
                        </div>
                      </div>
                      ";
                      if ($r[jenis_kelamin]=='Laki-laki'){
                          echo "
                       <div class='form-group'>
                        <label for='inputLintas' class='col-sm-2 control-label'>Jenis Kelamin</label>
                        <div class='col-sm-10'><p></p>
                          <input type='radio' value='Laki-laki' name='jenis_kelamin' checked> Laki-laki &nbsp;&nbsp;&nbsp; <input type='radio' value='Perempuan' name='jenis_kelamin'> Perempuan
                        </div>
                      </div>
                      ";
                      }
                      else{

                      echo"<div class='form-group'>
                        <label for='inputLintas' class='col-sm-2 control-label'>Jenis Kelamin</label>
                        <div class='col-sm-10'><p></p>
                          <input type='radio' value='Laki-laki' name='jenis_kelamin'> Laki-laki &nbsp;&nbsp;&nbsp; <input type='radio' value='Perempuan' name='jenis_kelamin' checked> Perempuan
                        </div>
                      </div>";
                      }

                      echo"
                       <div class='form-group'>
                        <label for='inputAlamat' class='col-sm-2 control-label'>Alamat</label>
                        <div class='col-sm-10'>
                          <textarea class='form-control' id='inputAlamat' name='alamat' required>$r[alamat]</textarea>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputAgama' class='col-sm-2 control-label'>Agama</label>
                        <div class='col-sm-10'>
                          <select class='form-control' id='inputAgama' name='menu_agama'>";
                            $tampil=mysql_query("SELECT * FROM agama ORDER BY nama_agama");
                            while($w=mysql_fetch_array($tampil)){
                            if ($r[id_agama]==$w[id_agama]){
                                echo "<option value=$w[id_agama] selected>$w[nama_agama]</option>";
                            }
                            else{
                            echo "<option value=$w[id_agama]>$w[nama_agama]</option>";
                            }
                            }
                            echo"
                          </select>
                        </div>
                      </div>
                       <div class='form-group'>
                        <label for='inputPendidikan' class='col-sm-2 control-label'>Pendidikan Terakhir</label>
                        <div class='col-sm-10'>
                          <select class='form-control' id='inputPendidikan' name='menu_pendidikan'>";
                            $tampil=mysql_query("SELECT * FROM pendidikan ORDER BY id_pendidikan");
                            while($w=mysql_fetch_array($tampil)){
                            if ($r[id_pendidikan]==$w[id_pendidikan]){
                                echo "<option value=$w[id_pendidikan] selected>$w[nama_pendidikan]</option>";
                            }
                            else{
                            echo "<option value=$w[id_pendidikan]>$w[nama_pendidikan]</option>";
                            }
                            }
                            echo"
                          </select>
                        </div>
                      </div>
                      ";
                      if ($r[status_perkawinan]=='Belum Kawin'){
                          echo "
                       <div class='form-group'>
                        <label for='inputLintas' class='col-sm-2 control-label'>Status Perkawinan</label>
                        <div class='col-sm-10'><p></p>
                          <input type='radio' value='Belum Kawin' name='status_perkawinan' checked> Belum Kawin &nbsp;&nbsp;&nbsp; <input type='radio' value='Kawin' name='status_perkawinan'> Kawin
                        </div>
                      </div>
                      ";
                      }
                      else{

                      echo"<div class='form-group'>
                        <label for='inputLintas' class='col-sm-2 control-label'>Status Perkawinan</label>
                        <div class='col-sm-10'><p></p>
                          <input type='radio' value='Belum Kawin' name='status_perkawinan'> Belum Kawin &nbsp;&nbsp;&nbsp; <input type='radio' value='Kawin' name='status_perkawinan' checked> Kawin
                        </div>
                      </div>";
                      }

                      echo"
                      <div class='form-group'>
                        <label for='inputIrigasi' class='col-sm-2 control-label'>Daerah Irigasi</label>
                        <div class='col-sm-10'>
                          <select class='form-control' id='inputIrigasi' name='menu_irigasi'>";
                             $tampil=mysql_query("SELECT * FROM irigasi ORDER BY nama_irigasi");
                            while($w=mysql_fetch_array($tampil)){
                            if ($r[id_irigasi]==$w[id_irigasi]){
                                echo "<option value=$w[id_irigasi] selected>$w[nama_irigasi]</option>";
                            }
                            else{
                            echo "<option value=$w[id_irigasi]>$w[nama_irigasi]</option>";
                            }
                            }
                            echo"
                          </select>
                        </div>
                      </div>
                      <div class='form-group has-feedback'>
                        <label for='inputAwalkerja' class='col-sm-2 control-label'>AwaL Kerja</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control datepicker' id='inputAwalkerja' value='$r[awal_kerja]' name='awal_kerja' data-format='yyyy-mm-dd' required>
                            <span class='glyphicon glyphicon-calendar form-control-feedback'></span>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputPelaksana' class='col-sm-2 control-label'>Pelaksana Kegiatan</label>
                        <div class='col-sm-10'>
                          <select class='form-control' id='inputPelaksana' name='menu_jabatan'>";
                            $tampil=mysql_query("SELECT * FROM jabatan ORDER BY bagian_pelaksana");
                            while($w=mysql_fetch_array($tampil)){
                            if ($r[id_jabatan]==$w[id_jabatan]){
                                echo "<option value=$w[id_jabatan] selected>$w[nama_jabatan] - $w[bagian_pelaksana]</option>";
                            }
                            else{
                            echo "<option value=$w[id_jabatan]>$w[nama_jabatan] - $w[bagian_pelaksana]</option>";
                            }
                            }
                            echo"</select>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputNohp' class='col-sm-2 control-label'>No. Handphone</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='inputNohp' value='$r[no_handphone]' name='no_handphone' required>
                        </div>
                      </div>
                     <div class='form-group'>
                          <label for='inputFotoBendung' class='col-sm-2 control-label'>Foto Personil</label>
                              <div class='col-sm-10'> 
                                <div class='fileinput fileinput-new' data-provides='fileinput'>
                                  <div class='fileinput-new thumbnail' style='width: 400px;' data-trigger='fileinput'>
                                    ";
                                    if($r['foto_personil']!=''){
                                    echo"<img src='foto_personil/$r[foto_personil]' alt='...'>";
                                    }else{
                                    echo"<img src='assets/images/login.png' alt='...' style='width: 400px;'>";
                                    }
                                    echo"
                                  </div>
                                  <div class='fileinput-preview fileinput-exists thumbnail' style='max-width: 400px;'>
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

      case "tampilpersonil":

    $tampilpersonil=mysql_query("SELECT *,RIGHT(tanggal_lahir,2) AS Tgl, MID(tanggal_lahir,6,2) AS Bln,LEFT(tanggal_lahir,4) AS Tahun,
                                  RIGHT(awal_kerja,2) AS Tgl2, MID(awal_kerja,6,2) AS Bln2,LEFT(awal_kerja,4) AS Tahun2 
                                  FROM personil,irigasi,agama,jabatan,pendidikan 
                                  WHERE personil.id_irigasi = irigasi.id_irigasi 
                                  AND personil.id_agama = agama.id_agama 
                                  AND personil.id_jabatan = jabatan.id_jabatan 
                                  AND personil.id_pendidikan = pendidikan.id_pendidikan 
                                  AND id_personil='$_GET[id]'");
    $r=mysql_fetch_array($tampilpersonil);

    if($r!=null)
    { 
      if($r[Bln]=='01')
      {
        $bln = 'Januari';
      }
      else if($r[Bln]=='02')
      {
        $bln = 'Februari';
      }
      else if($r[Bln]=='03')
      {
        $bln = 'Maret';
      }
      else if($r[Bln]=='04')
      {
        $bln = 'April';
      }
      else if($r[Bln]=='05')
      {
        $bln = 'Mei';
      }
      else if($r[Bln]=='06')
      {
        $bln = 'Juni';
      }
      else if($r[Bln]=='07')
      {
        $bln = 'Juli';
      }
      else if($r[Bln]=='08')
      {
        $bln = 'Agustus';
      }
      else if($r[Bln]=='09')
      {
        $bln = 'September';
      }
      else if($r[Bln]=='10')
      {
        $bln = 'Oktober';
      }
      else if($r[Bln]=='11')
      {
        $bln = 'Nopember';
      }
      else if($r[Bln]=='12')
      {
        $bln = 'Desember';
      }
      else 
      {
        $bln = 'Error';
      }

      if($r[Bln2]=='01')
      {
        $Bln2 = 'Januari';
      }
      else if($r[Bln2]=='02')
      {
        $Bln2 = 'Februari';
      }
      else if($r[Bln2]=='03')
      {
        $Bln2 = 'Maret';
      }
      else if($r[Bln2]=='04')
      {
        $Bln2 = 'April';
      }
      else if($r[Bln2]=='05')
      {
        $Bln2 = 'Mei';
      }
      else if($r[Bln2]=='06')
      {
        $Bln2 = 'Juni';
      }
      else if($r[Bln2]=='07')
      {
        $Bln2 = 'Juli';
      }
      else if($r[Bln2]=='08')
      {
        $Bln2 = 'Agustus';
      }
      else if($r[Bln2]=='09')
      {
        $Bln2 = 'September';
      }
      else if($r[Bln2]=='10')
      {
        $Bln2 = 'Oktober';
      }
      else if($r[Bln2]=='11')
      {
        $Bln2 = 'Nopember';
      }
      else if($r[Bln2]=='12')
      {
        $Bln2 = 'Desember';
      }
      else 
      {
        $Bln2 = 'Error';
      }

   
       echo"<div class='row'>

                <div class='col-md-12'>
                    <!-- Widget: user widget style 1 -->
                    <div class='box box-widget widget-user'>
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <input type='hidden' value='$r[id_personil]' name='id'>
                      <div class='widget-user-header bg-black' style='background: url(foto_bendungan/$r[foto_bendungan]); center;background-size:cover; height:270px;'>
                        <h3 class='widget-user-username'>$r[nama_lengkap]</h3>
                        <h5 class='widget-user-desc'>$r[nama_irigasi]</h5>
                      </div>
                      <div class='widget-user-image'>
                        <img class='img-circle' src='foto_personil/$r[foto_personil]' alt='User Avatar' style='margin-top:155px; height:90px; width:90px;'>
                      </div>
                      <div class='box-footer'>
                       
                      </div>
                    </div><!-- /.widget-user -->
                </div><!-- /.col -->
                ";
                  if($r['nama_lengkap']==$_SESSION[namalengkap])
                  {
                      echo"<div class='col-md-6'>
                              <div class='box box-primary' style='height:590px'>
                                <div class='box-header'>
                                  <p class='text-center'><b> Biodata Personil : $r[nama_irigasi]</b></p>
                                </div><!-- /.box-header -->
                              <div class='box-body'>
                                  <div class='table-responsive'>
                                    <table class='table no-margin'>
                                      <tr>
                                        <td width='40%'><b class='text-muted'>Nama Lengkap  </b></td><td width='2%'><b class='text-muted'>:</b></td><td><a>$r[nama_lengkap]</a></td><td width='8%'></td>
                                      </tr>
                                      <tr>
                                        <td><b class='text-muted'>Tempat Lahir  </b></td><td><b class='text-muted'>:</b></td><td ><a>$r[tempat_lahir]</a></td><td></td>
                                      </tr>
                                      <tr>
                                        <td><b class='text-muted'>Tanggal Lahir  </b></td><td><b class='text-muted'>:</b></td><td ><a>$r[Tgl] $bln $r[Tahun]</a></td><td></td>
                                      </tr>
                                      <tr>
                                        <td><b class='text-muted'>Alamat Lengkap  </b></td><td><b class='text-muted'>:</b></td><td><a>$r[alamat]</a></td>
                                        <td>
                                         <div class='btn-group'> 
                                              <i class='glyphicon glyphicon-cog md-trigger' role='dialog' data-modal='modal-2' data-toggle='tooltip' style='cursor:pointer' title='Edit'></i>
                                         </div>
                                        
                                                <div class='md-modal md-effect-13' id='modal-2'>
                                                   <div class='md-content'>
                                                 
                                                      <div class='modal-header'>
                                                          <h4 class='modal-title'>Alamat</h4>
                                                      </div>
                                                      
                                                      <div class='modal-body'>
                                                      <form  method=POST  action='$aksi?modul=personil&act=alamat'>
                                                      <input type='hidden' value='$r[id_personil]' name='id'>
                                                         <p>Alamat</p>
                                                              <textarea class='form-control'  name='alamat' required>$r[alamat]</textarea>
                                                      </div>
                                                      <div class='modal-footer'>
                                                          <button type='submit' class='btn btn-outline pull-right'>Save changes</button></form>
                                                          <button type='button' class='md-close btn btn-outline pull-left'>Close</button>
                                                      </div>
                                                   
                                                    </div>
                                                </div><!-- /.example-modal -->
                                        </td>
                                      </tr>
                                      <tr>
                                        <td><b class='text-muted'>Agama  </b></td><td><b class='text-muted'>:</b></td><td ><a>$r[nama_agama]</a></td><td></td>
                                      </tr>
                                       <tr>
                                        <td><b class='text-muted'>Pendidikan Terakhir  </b></td><td><b class='text-muted'>:</b></td><td><a>$r[nama_pendidikan]</a></td>
                                      </tr>
                                      <tr>
                                        <td><b class='text-muted'>Status Perkawinan  </b></td><td><b class='text-muted'>:</b></td><td ><a>$r[status_perkawinan]</a></td>
                                        <td>
                                        <div class='btn-group'> 
                                              <i class='glyphicon glyphicon-cog md-trigger' role='dialog' data-modal='modal-1' data-toggle='tooltip' style='cursor:pointer' title='Edit'></i>
                                        </div>
                                        
                                                <div class='md-modal md-effect-10' id='modal-1'>
                                                   <div class='md-content'>
                                                 
                                                      <div class='modal-header'>
                                                          <h4 class='modal-title'>Status Perkawinan</h4>
                                                      </div>
                                                      <div class='modal-body'>
                                                      <form  method=POST  action='$aksi?modul=personil&act=statusperkawinan'>
                                                      <input type='hidden' value='$r[id_personil]' name='id'>
                                                                                              ";
                                                          if ($r[status_perkawinan]=='Belum Kawin'){
                                                              echo "
                                                           
                                                            <p>Status Perkawinan</p>
                                                           
                                                              <input type='radio' value='Belum Kawin' name='status_perkawinan' checked> Belum Kawin &nbsp;&nbsp;&nbsp; <input type='radio' value='Kawin' name='status_perkawinan'> Kawin
                                                           
                                                        
                                                          ";
                                                          }
                                                          else{

                                                          echo"
                                                            <p>Status Perkawinan</p>
                                                            
                                                              <input type='radio' value='Belum Kawin' name='status_perkawinan'> Belum Kawin &nbsp;&nbsp;&nbsp; <input type='radio' value='Kawin' name='status_perkawinan' checked> Kawin
                                                          
                                                          ";
                                                          }

                                                          echo"
                                                      </div>
                                                      <div class='modal-footer'>
                                                          <button type='submit' class='btn btn-outline pull-right'>Save changes</button></form>
                                                          <button type='button' class='md-close btn btn-outline pull-left'>Close</button>
                                                      </div>
                                                   
                                                    </div>
                                                </div><!-- /.example-modal -->
                                        </td>
                                      </tr>
                                      <tr>
                                        <td><b class='text-muted'>Daerah Irigasi  </b></td><td><b class='text-muted'>:</b></td><td ><a>$r[nama_irigasi]</a></td><td></td>
                                      </tr>
                                      <tr>
                                        <td><b class='text-muted'>Bekerja Pada Tahun  </b></td><td><b class='text-muted'>:</b></td><td ><a>$r[Tgl2] $Bln2 $r[Tahun2]</a></td><td></td>
                                      </tr>
                                      <tr>
                                        <td><b class='text-muted'>Jabatan  </b></td><td><b class='text-muted'>:</b></td><td ><a>$r[nama_jabatan] - $r[bagian_pelaksana]</a></td><td></td>
                                      </tr>
                                      <tr>
                                        <td><b class='text-muted'>Nomer Handphone  </b></td><td><b class='text-muted'>:</b></td><td><a>$r[no_handphone]</a></td>
                                        <td>
                                         <div class='btn-group'> 
                                              <i class='glyphicon glyphicon-cog md-trigger' role='dialog' data-modal='modal-11' data-toggle='tooltip' style='cursor:pointer' title='Edit'></i>
                                         </div>
                                        
                                                <div class='md-modal md-effect-11' id='modal-11'>
                                                   <div class='md-content'>
                                                 
                                                      <div class='modal-header'>
                                                          <h4 class='modal-title'>Number Handphone</h4>
                                                      </div>
                                                      <div class='modal-body'>
                                                         <p>No. Handphone</p>
                                                           <form  method=POST  action='$aksi?modul=personil&act=no_handphone'>
                                                           <input type='hidden' value='$r[id_personil]' name='id'>
                                                            <input type='text' class='form-control' value='$r[no_handphone]' name='no_handphone' maxlength='12' required>
                                                        
                                                      </div>
                                                      <div class='modal-footer'>
                                                          <button type='submit' class='btn btn-outline pull-right'>Save changes</button></form>
                                                          <button type='button' class='md-close btn btn-outline pull-left'>Close</button>
                                                      </div>
                                                   
                                                    </div>
                                                </div><!-- /.example-modal -->


                                        </td>
                                      </tr>
                                      <tr>
                                        <td colspan='4'></td>
                                      </tr>
                                    </table>
                                  </div>
                            

                              </div><!-- /.box-body -->
                            </div><!-- /.box -->
                          </div><!-- /.col -->
                           <div class='col-md-6'>
                              <div class='box box-primary' style='height:590px'>
                                <div class='box-header'>
                                  <p class='text-center'><b> Foto Personil : $r[nama_irigasi]</b></p>
                                </div><!-- /.box-header -->
                              <div class='box-body'>
                                    <form class='form-horizontal' method=POST  action='$aksi?modul=personil&act=tampilpersonil' enctype='multipart/form-data'>
                                      <input type='hidden' value='$r[id_personil]' name='id'>
                                      <center>
                                      <div class='fileinput fileinput-new' data-provides='fileinput'>
                                        <div class='fileinput-new thumbnail' data-trigger='fileinput' style='width: 400px;'>
                                          ";
                                          if($r['foto_personil']!=''){
                                          echo"<img src='foto_personil/$r[foto_personil]' alt='...'>";
                                          }else{
                                          echo"<img src='assets/images/login.png' style='width: 400px;' alt='...' >";
                                          }
                                          echo"
                                        </div>
                                        <div class='fileinput-preview fileinput-exists thumbnail' style='width: 400px;'>
                                        </div>
                                        <div>
                                          <span class='btn btn-default btn-file'>
                                            <span class='fileinput-new'>Select image</span>
                                              <span class='fileinput-exists'>Change</span>
                                                <input type='file' class='btn btn-default' name='fupload' accept='image/*'>
                                          </span>
                                          <a href='#' class='btn btn-orange fileinput-exists' data-dismiss='fileinput'>Remove</a>&nbsp;<button type='submit' class='btn btn-success'>Save</button>
                                        </div>
                                      </div></center>
                                    </form>
    
                              </div><!-- /.box-body -->
                            </div><!-- /.box -->
                          </div><!-- /.col -->

                          ";
                  }
                  else{
                echo"
              <div class='col-md-12'>
                  <div class='box box-primary style='height:590px'>
                    <div class='box-header'>
                      <p class='text-center'><b> Biodata Personil : $r[nama_irigasi]</b></p>
                    </div><!-- /.box-header -->
                  <div class='box-body'>
                      <div class='table-responsive'>
                        <table class='table no-margin'>
                          <tr>
                            <td width='20%'><b class='text-muted'>Nama Lengkap  </b></td><td width='2%'><b class='text-muted'>:</b></td><td><a>$r[nama_lengkap]</a></td>
                          </tr>
                          <tr>
                            <td><b class='text-muted'>Tempat Lahir  </b></td><td><b class='text-muted'>:</b></td><td><a>$r[tempat_lahir]</a></td>
                          </tr>
                          <tr>
                            <td><b class='text-muted'>Tanggal Lahir  </b></td><td><b class='text-muted'>:</b></td><td><a>$r[Tgl] $bln $r[Tahun]</a></td>
                          </tr>
                          <tr>
                            <td><b class='text-muted'>Alamat Lengkap  </b></td><td><b class='text-muted'>:</b></td><td><a>$r[alamat]</a></td>
                          </tr>
                          <tr>
                            <td><b class='text-muted'>Agama  </b></td><td><b class='text-muted'>:</b></td><td><a>$r[nama_agama]</a></td>
                          </tr>
                           <tr>
                            <td><b class='text-muted'>Pendidikan Terakhir  </b></td><td><b class='text-muted'>:</b></td><td><a>$r[nama_pendidikan]</a></td>
                          </tr>
                          <tr>
                            <td><b class='text-muted'>Status Perkawinan  </b></td><td><b class='text-muted'>:</b></td><td><a>$r[status_perkawinan]</a></td>
                          </tr>
                          <tr>
                            <td><b class='text-muted'>Daerah Irigasi  </b></td><td><b class='text-muted'>:</b></td><td><a>$r[nama_irigasi]</a></td>
                          </tr>
                          <tr>
                            <td><b class='text-muted'>Bekerja Pada Tahun  </b></td><td><b class='text-muted'>:</b></td><td><a>$r[Tgl2] $Bln2 $r[Tahun2]</a></td>
                          </tr>
                          <tr>
                            <td><b class='text-muted'>Jabatan  </b></td><td><b class='text-muted'>:</b></td><td><a>$r[nama_jabatan] - $r[bagian_pelaksana]</a></td>
                          </tr>
                          <tr>
                            <td><b class='text-muted'>Nomer Handphone  </b></td><td><b class='text-muted'>:</b></td><td><a>$r[no_handphone]</a></td>
                          </tr>
                          <tr>
                            <td colspan='3'></td>
                          </tr>
                        </table>
                      </div>
                

                  </div><!-- /.box-body -->
                </div><!-- /.box -->
              </div><!-- /.col -->
              ";}
              echo"
            </div><!-- /.row -->
            ";
    }
    else
    {
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
    }



      break;


       case "tampilpencarian":




      if($_GET[nama_lengkap]!='')
      {

                $tampilpencarian = mysql_query("SELECT *,MID(awal_kerja,6,2) AS Awal_kerja,LEFT(awal_kerja,4) AS Tahun
                                                FROM personil,irigasi,ranting 
                                                WHERE personil.id_irigasi = irigasi.id_irigasi 
                                                AND irigasi.id_ranting = ranting.id_ranting
                                                AND nama_lengkap LIKE '%$_GET[nama_lengkap]%' LIMIT 10");
                          while($p=mysql_fetch_array($tampilpencarian))
                          {
                                
                             


                                if($p[Awal_kerja]=='01')
                                {
                                  $awalkerja = 'Januari';
                                }
                                else if($p[Awal_kerja]=='02')
                                {
                                  $awalkerja = 'Februari';
                                }
                                else if($p[Awal_kerja]=='03')
                                {
                                  $awalkerja = 'Maret';
                                }
                                else if($p[Awal_kerja]=='04')
                                {
                                  $awalkerja = 'April';
                                }
                                else if($p[Awal_kerja]=='05')
                                {
                                  $awalkerja = 'Mei';
                                }
                                else if($p[Awal_kerja]=='06')
                                {
                                  $awalkerja = 'Juni';
                                }
                                else if($p[Awal_kerja]=='07')
                                {
                                  $awalkerja = 'Juli';
                                }
                                else if($p[Awal_kerja]=='08')
                                {
                                  $awalkerja = 'Agustus';
                                }
                                else if($p[Awal_kerja]=='09')
                                {
                                  $awalkerja = 'September';
                                }
                                else if($p[Awal_kerja]=='10')
                                {
                                  $awalkerja = 'Oktober';
                                }
                                else if($p[Awal_kerja]=='11')
                                {
                                  $awalkerja = 'Nopember';
                                }
                                else if($p[Awal_kerja]=='12')
                                {
                                  $awalkerja = 'Desember';
                                }
                                else 
                                {
                                  $awalkerja = 'Error';
                                }


echo"<div class='row'>
        <div class='col-md-12'>
              <div class='box box-primary'>
                <div class='box-body'>
      
                                      <!-- Post -->
                                      <div class='post clearfix'>
                                        <div class='user-block'>
                                       <img class='img-circle img-bordered-sm' src='foto_personil/$p[foto_personil]' alt='user image'>
                                          <span class='username'>
                                            <a href='?modul=personil&act=tampilpersonil&id=$p[id_personil]'>$p[nama_lengkap]</a>
                                            <a href='#' class='pull-right btn-box-tool'><i class='fa fa-times close' data-dismiss='alert' aria-hidden='true'></i></a>
                                          </span>
                                          <span class='description'>
                                          <table border='0'>
                                          <tr>
                                          <td width='60%'>Daerah Irigasi</td><td width='5%'>:</td><td>$p[nama_irigasi]</td>
                                          </tr>
                                          <tr>
                                          <td>Awal Kerja </td><td>:</td><td>$awalkerja $p[Tahun]</td>
                                          </tr>
                                          <tr>
                                          <td>Ranting/Pengamat</td><td>:</td><td>$p[nama_ranting]</td>
                                          </tr>
                                          </table>
                                          </span>
                                        </div><!-- /.user-block -->

                                      </div><!-- /.post -->
                                     
  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
      </div><!-- /.row -->
      ";                               
                                }
                               
      }
      else
      {
          echo"<div class='error-page'>
              <div class='error-content'>
                <h3><i class='fa fa-warning text-yellow'></i> Oops! Nama Personil Kosong.</h3>
                <p>
                  Kami tidak bisa melakukan pencarian jika nama personilnya kosong.
                  Selain itu, anda mungkin bisa<a href='?modul=suprancaekek'> kembali ke SUP Rancaekek</a>.
                </p>
              </div><!-- /.error-content -->
            </div><!-- /.error-page --> ";
      }
                                   
      break;
  
}
}
?>

