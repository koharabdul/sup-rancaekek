<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']))
{
    echo "Untuk mengakses modul, Anda harus login";
}
else{
$aksi="modul/jabatan/aksi_jabatan.php";
switch($_GET['act']){

  default:
          echo"<div class='row'>
            <div class='col-xs-12'>
              
              <div class='box box-primary'>
                <div class='box-header'>
                  <h3 class='box-title'>Data Table With Full Features</h3>
                  <div class='btn-group pull-right'>
                    <a href='?modul=jabatan&act=tambahjabatan'><button class='btn btn-success' data-widget='' type='button'>Tambah Data</button></a>
                  </div>
                </div><!-- /.box-header -->
                <div class='box-body'>
                  <table id='example1' class='table table-striped'>
                    <thead>
                      <tr>
                        <th width=25>No</th>
                        <th>Jabatan</th>
                        <th>Bagian Pelaksana</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>";
                    $tampil=mysql_query("SELECT * FROM jabatan ORDER BY id_jabatan DESC");
                    $no=1;
                    while ($r=mysql_fetch_array($tampil)){
                    echo "
                      <tr>
                        <td>$no</td>
                        <td>$r[nama_jabatan]</td>
                        <td>$r[bagian_pelaksana]</td>
                        <td>$r[keterangan]</td>
                        <td align='right'>
                          <div class='btn-group pull-right'> 
                            <i class='glyphicon glyphicon-cog' data-toggle='dropdown' style='cursor:pointer'></i>
                            <ul class='dropdown-menu'>
                              <li><a href='?modul=jabatan&act=editjabatan&id=$r[id_jabatan]'><i class='glyphicon glyphicon-pencil'></i>Edit</a></li>
                              <li><a href=\"$aksi?modul=jabatan&act=hapus&id=$r[id_jabatan]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><i class='glyphicon glyphicon-trash'></i>Hapus</a></li>
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

  case "tambahjabatan":

 echo"<div class='row'>
          <div class='col-xs-12'>
            <div class='box box-primary'>
              <div class='box-header'>
                <h3 class='box-title'>Tambah Data Jabatan</h3>
              </div><!-- /.box-header -->
            <div class='box-body'>
                <form class='form-horizontal' method=POST  action='$aksi?modul=jabatan&act=input'>
                      <div class='form-group'>
                        <label for='inputNameJabatan' class='col-sm-2 control-label'>Nama Jabatan</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='inputNameJabatan' placeholder='Nama Jabatan' name='nama_jabatan' required>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputBagianPelaksana' class='col-sm-2 control-label'>Bagian Pelaksana Kegiatan</label>
                        <div class='col-sm-10'>
                          <textarea class='form-control' id='inputBagianPelaksana' placeholder='Bagian Pelaksana Kegiatan' name='bagian_pelaksana' required></textarea>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputKeterangan' class='col-sm-2 control-label'>Keterangan</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='inputKeterangan' placeholder='Keterangan' name='keterangan' required>
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

      case "editjabatan":

    $edit=mysql_query("SELECT * FROM jabatan WHERE id_jabatan='$_GET[id]'");
    $r=mysql_fetch_array($edit);
 echo"<div class='row'>
          <div class='col-xs-12'>
            <div class='box box-primary'>
              <div class='box-header'>
                <h3 class='box-title'>Tambah Data Jabatan</h3>
              </div><!-- /.box-header -->
            <div class='box-body'>
                <form class='form-horizontal' method=POST  action='$aksi?modul=jabatan&act=update'>
                      <div class='form-group'>
                        <label for='inputNameJabatan' class='col-sm-2 control-label'>Nama Jabatan</label>
                        <div class='col-sm-10'>
                          <input type='hidden' value='$r[id_jabatan]' name='id'>
                          <input type='text' class='form-control' id='inputNameJabatan' value='$r[nama_jabatan]' name='nama_jabatan' required>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputBagianPelaksana' class='col-sm-2 control-label'>Bagian Pelaksana Kegiatan</label>
                        <div class='col-sm-10'>
                          <textarea class='form-control' id='inputBagianPelaksana' placeholder='Bagian Pelaksana Kegiatan' name='bagian_pelaksana' required>$r[bagian_pelaksana]</textarea>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputKeterangan' class='col-sm-2 control-label'>Keterangan</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='inputKeterangan' value='$r[keterangan]' name='keterangan' required>
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

  
}
}
?>