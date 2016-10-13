<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']))
{
    echo "Untuk mengakses modul, Anda harus login";
}
else{
$aksi="modul/ranting/aksi_ranting.php";
switch($_GET[act]){

  default:
          echo"<div class='row'>
            <div class='col-xs-12'>
              
              <div class='box box-primary'>
                <div class='box-header'>
                  <h3 class='box-title'>Data Table With Full Features</h3>
                  <div class='btn-group pull-right'>
                    <a href='?modul=ranting&act=tambahranting'><button class='btn btn-success' data-widget='' type='button'>Tambah Data</button></a>
                  </div>
                </div><!-- /.box-header -->
                <div class='box-body'>
                  <table id='example1' class='table table-striped'>
                    <thead>
                      <tr>
                        <th width=25>No</th>
                        <th>Kode Ranting</th>
                        <th>Ranting Pengamat</th>
                        <th width=30%>Alamat</th>
                        <th >Kepala Ranting</th>
                        <th width=20%>NIP</th>
                        <th >Aksi</th>
                      </tr>
                    </thead>
                    <tbody>";
                    $tampil=mysql_query("SELECT * FROM ranting ORDER BY id_ranting DESC");
                    $no=1;
                    while ($r=mysql_fetch_array($tampil)){
                    echo "
                      <tr>
                        <td>$no</td>
                        <td>$r[kode_ranting]</td>
                        <td>$r[nama_ranting]</td>
                        <td>$r[alamat]</td>
                        <td>$r[kepala_ranting]</td>
                        <td>$r[nip]</td>
                        <td align='right'>
                          <div class='btn-group pull-right'> 
                            <i class='glyphicon glyphicon-cog' data-toggle='dropdown' style='cursor:pointer'></i>
                            <ul class='dropdown-menu pull-right'>
                              <li><a href='?modul=ranting&act=editranting&id=$r[id_ranting]'><i class='glyphicon glyphicon-pencil'></i>Edit</a></li>
                              <li><a href=\"$aksi?modul=ranting&act=hapus&id=$r[id_ranting]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><i class='glyphicon glyphicon-trash'></i>Hapus</a></li>
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

  case "tambahranting":

 echo"<div class='row'>
          <div class='col-xs-12'>
            <div class='box box-primary'>
              <div class='box-header'>
                <h3 class='box-title'>Tambah Data ranting</h3>
              </div><!-- /.box-header -->
            <div class='box-body'>
                <form class='form-horizontal' method=POST  action='$aksi?modul=ranting&act=input'>
                      <div class='form-group'>
                        <label for='inputKoderanting' class='col-sm-2 control-label'>Kode Ranting</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='inputKkoderanting' placeholder='Kode Ranting' name='kode_ranting' required>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputNameranting' class='col-sm-2 control-label'>Nama Ranting</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='inputNameranting' placeholder='Nama Ranting' name='nama_ranting' required>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputAlamat' class='col-sm-2 control-label'>Alamat Ranting</label>
                        <div class='col-sm-10'>
                          <textarea class='form-control' id='inputAlamat' placeholder='Alamat Ranting' name='alamat' required></textarea>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputKepala' class='col-sm-2 control-label'>Kepala Ranting</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='inputKepala' placeholder='Nama Kepala Ranting' name='kepala_ranting' required>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputNIP' class='col-sm-2 control-label'>NIP</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='inputNIP' placeholder='NIP' name='nip' required>
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

      case "editranting":

    $edit=mysql_query("SELECT * FROM ranting WHERE id_ranting='$_GET[id]'");
    $r=mysql_fetch_array($edit);
 echo"<div class='row'>
          <div class='col-xs-12'>
            <div class='box box-primary'>
              <div class='box-header'>
                <h3 class='box-title'>Tambah Data ranting</h3>
              </div><!-- /.box-header -->
            <div class='box-body'>
                <form class='form-horizontal' method=POST  action='$aksi?modul=ranting&act=update'>
                     <div class='form-group'>
                        <label for='inputKoderanting' class='col-sm-2 control-label'>Kode Ranting</label>
                        <div class='col-sm-10'>
                          <input type='hidden' value='$r[id_ranting]' name='id'>
                           <input type='text' class='form-control' id='inputKoderanting' value='$r[kode_ranting]' name='kode_ranting' required>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputNameranting' class='col-sm-2 control-label'>Nama Ranting</label>
                        <div class='col-sm-10'>
                          <input type='hidden' value='$r[id_ranting]' name='id'>
                           <input type='text' class='form-control' id='inputNameranting' value='$r[nama_ranting]' name='nama_ranting' required>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputAlamat' class='col-sm-2 control-label'>Alamat Ranting</label>
                        <div class='col-sm-10'>
                          <textarea class='form-control' id='inputAlamat'  name='alamat' required>$r[alamat]</textarea>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputKepala' class='col-sm-2 control-label'>Kepala Ranting</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='inputKepala' value='$r[kepala_ranting]' name='kepala_ranting' required>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputNIP' class='col-sm-2 control-label'>NIP</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='inputNIP' value='$r[nip]' name='nip' required>
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