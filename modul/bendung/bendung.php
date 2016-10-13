<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']))
{
    echo "Untuk mengakses modul, Anda harus login";
}
else{
$aksi="modul/bendung/aksi_bendung.php";
switch($_GET[act]){
  // Tampil Tag
  default:
          echo"<div class='row'>
            <div class='col-xs-12'>
              
              <div class='box box-primary'>
                <div class='box-header'>
                  <h3 class='box-title'>Data Table With Full Features</h3>
                  <div class='btn-group pull-right'>
                    <a href='?modul=bendung&act=tambahbendung'><button class='btn btn-success' data-widget='' type='button'>Tambah Data</button></a>
                  </div>
                </div><!-- /.box-header -->
                <div class='box-body'>
                  <table id='example1' class='table table-striped'>
                    <thead>
                      <tr>
                        <th width=25>No</th>
                        <th>Bentuk Bendung</th>
                        <th>Satuan Limpas</th>
                        <th>Satuan Irigasi</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>";
                    $tampil=mysql_query("SELECT * FROM bendung ORDER BY id_bendung DESC");
                    $no=1;
                    while ($r=mysql_fetch_array($tampil)){
                    echo "
                      <tr>
                        <td>$no</td>
                        <td>$r[nama_bendung]</td>
                        <td>$r[satuan_limpas]</td>
                        <td>$r[satuan_irigasi]</td>
                        <td align='right'>
                        <div class='btn-group pull-right'> 
                            <i class='glyphicon glyphicon-cog' data-toggle='dropdown' style='cursor:pointer'></i>
                            <ul class='dropdown-menu'>
                              <li><a href='?modul=bendung&act=editbendung&id=$r[id_bendung]'><i class='glyphicon glyphicon-pencil'></i>Edit</a></li>
                              <li><a href=\"$aksi?modul=bendung&act=hapus&id=$r[id_bendung]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><i class='glyphicon glyphicon-trash'></i>Hapus</a></li>
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

  case "tambahbendung":

 echo"<div class='row'>
          <div class='col-xs-12'>
            <div class='box box-primary'>
              <div class='box-header'>
                <h3 class='box-title'>Tambah Data Bendung</h3>
              </div><!-- /.box-header -->
            <div class='box-body'>
                <form class='form-horizontal' method=POST  action='$aksi?modul=bendung&act=input'>
                      <div class='form-group'>
                        <label for='inputNameBendung' class='col-sm-2 control-label'>Nama Bendung</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='inputNameBendung' placeholder='Nama Bendung' name='nama_bendung' required>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputLimpas' class='col-sm-2 control-label'>Limpas</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='inputLimpas' placeholder='Limpas' name='satuan_limpas' required>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputNameIrigasi' class='col-sm-2 control-label'>Irigasi</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='inputNameIrigasi' placeholder='Irigasi' name='satuan_irigasi' required>
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

      case "editbendung":

    $edit=mysql_query("SELECT * FROM bendung WHERE id_bendung='$_GET[id]'");
    $r=mysql_fetch_array($edit);
 echo"<div class='row'>
          <div class='col-xs-12'>
            <div class='box box-primary'>
              <div class='box-header'>
                <h3 class='box-title'>Tambah Data Bendung</h3>
              </div><!-- /.box-header -->
            <div class='box-body'>
                <form class='form-horizontal' method=POST  action='$aksi?modul=bendung&act=update'>
                      <div class='form-group'>
                        <label for='inputNameBendung' class='col-sm-2 control-label'>Nama Bendung</label>
                        <div class='col-sm-10'>
                          <input type='hidden' value='$r[id_bendung]' name='id'>
                          <input type='text' class='form-control' id='inputNameBendung' value='$r[nama_bendung]' name='nama_bendung' required>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputLimpas' class='col-sm-2 control-label'>Limpas</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='inputLimpas' value='$r[satuan_limpas]' name='satuan_limpas' required>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputNameIrigasi' class='col-sm-2 control-label'>Irigasi</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='inputNameIrigasi' value='$r[satuan_irigasi]' name='satuan_irigasi' required>
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