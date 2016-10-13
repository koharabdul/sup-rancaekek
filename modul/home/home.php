<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']))
{
    echo "Untuk mengakses modul, Anda harus login";
}
else{
$aksi="modul/home/aksi_home.php";
switch($_GET[act]){

  default:
          echo"

          <div class='row'>
            <div class='col-md-9'>

                    ";
                      $tampilRangkumanDebit = mysql_query("SELECT *,MID(tanggal_post,9,2) AS Tgl,MID(tanggal_post,6,2) AS Bln,LEFT(tanggal_post,4) AS Thn, RIGHT(tanggal_post,8) AS jam
                                                                    FROM rangkuman_aktifitas 
                                                                    ORDER BY tanggal_post DESC LIMIT 20");
                      while($f=mysql_fetch_array($tampilRangkumanDebit))
                      { 
                          if($f[Bln]=='01')
                          {
                            $sasih = 'Jan';
                          }
                          else if($f[Bln]=='02')
                          {
                            $sasih = 'Feb';
                          }
                          else if($f[Bln]=='03')
                          {
                            $sasih = 'Mar';
                          }
                          else if($f[Bln]=='04')
                          {
                            $sasih = 'Apr';
                          }
                          else if($f[Bln]=='05')
                          {
                            $sasih = 'Mei';
                          }
                          else if($f[Bln]=='06')
                          {
                            $sasih = 'Jun';
                          }
                          else if($f[Bln]=='07')
                          {
                            $sasih = 'Jul';
                          }
                          else if($f[Bln]=='08')
                          {
                            $sasih = 'Agu';
                          }
                          else if($f[Bln]=='09')
                          {
                            $sasih = 'Sep';
                          }
                          else if($f[Bln]=='10')
                          {
                            $sasih = 'Okt';
                          }
                          else if($f[Bln]=='11')
                          {
                            $sasih = 'Nop';
                          }
                          else if($f[Bln]=='12')
                          {
                            $sasih = 'Des';
                          }
                          else 
                          {
                            $sasih = 'Error';
                          }
                          $tampilFotoPersonil = mysql_query("SELECT * FROM personil WHERE nama_lengkap = '$f[nama_lengkap]'");
                          while($p=mysql_fetch_array($tampilFotoPersonil))
                          {
                               $editatauinput = mysql_query("SELECT ket FROM rangkuman_aktifitas WHERE id_rangkuman = '$f[id_rangkuman]'");
                               $e=mysql_fetch_array($editatauinput);
                               {
                                  if($e[ket]==0)
                                  {

                                      echo"
            
              <div class='box box-primary'>
                <div class='box-body'>
                                      <!-- Post -->
                                      <div class='post clearfix'>
                                        <div class='user-block'>
                                       <img class='img-circle img-bordered-sm' src='foto_personil/$p[foto_personil]' alt='user image'>
                                          <span class='username'>
                                            <a href='?modul=personil&act=tampilpersonil&id=$p[id_personil]'>$f[nama_lengkap]</a>
                                            
                                          </span>
                                          <span class='description'>$f[nama_irigasi], $f[Tgl] $sasih $f[Thn] - $f[jam]</span>
                                        </div><!-- /.user-block -->
                                        <p>
                                            Daerah Irigasi $f[nama_irigasi] telah $f[keterangan] Blangko 08 - O yaitu data pada tanggal ke <a href='?modul=$f[modul]&act=tampilstatus&kode_nota=$f[kode_nota]'>$f[tanggal], $f[bulan], $f[tahun].</a>
                                        </p>
                                        

                                        <!--<form class='form-horizontal'>
                                          <div class='form-group margin-bottom-none'>
                                            <div class='col-sm-12'>
                                               <ul class='list-inline'>
                                                <li><a href='#' class='link-black text-sm'><i class='fa fa-share margin-r-5'></i> Share</a></li>
                                                <li><a href='#' class='link-black text-sm'><i class='fa fa-thumbs-o-up margin-r-5'></i> Like</a></li>
                                                <li class='pull-right'><a href='#' class='link-black text-sm'><i class='fa fa-comments-o margin-r-5'></i> Comments (5)</a></li>
                                              </ul>
                                              <input class='form-control input-sm' placeholder='Response'>
                                            </div>                                                   
                                          </div>                        
                                        </form>-->
                                      </div><!-- /.post -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            ";
                                  }
                                  else
                                  {
                                      echo"
           
              <div class='box box-primary'>
                <div class='box-body'>
                                      <!-- Post -->
                                      <div class='post clearfix'>
                                        <div class='user-block'>
                                       <img class='img-circle img-bordered-sm' src='foto_personil/$p[foto_personil]' alt='user image'>
                                          <span class='username'>
                                            <a href='?modul=personil&act=tampilpersonil&id=$p[id_personil]'>$f[nama_lengkap]</a>
                                          </span>
                                          <span class='description'>$f[nama_irigasi], $f[Tgl] $sasih $f[Thn] - $f[jam]</span>
                                        </div><!-- /.user-block -->
                                        <p>
                                            Daerah Irigasi $f[nama_irigasi] telah $f[keterangan] Blangko 08 - O sebanyak $f[ket]x pada data tanggal ke <a href='?modul=debit&act=tampilstatus&kode_nota=$f[kode_nota]'>$f[tanggal], $f[bulan], $f[tahun].</a>
                                        </p>
                                        

                                        <!--<form class='form-horizontal'>
                                          <div class='form-group margin-bottom-none'>
                                            <div class='col-sm-12'>
                                               <ul class='list-inline'>
                                                <li><a href='#' class='link-black text-sm'><i class='fa fa-share margin-r-5'></i> Share</a></li>
                                                <li><a href='#' class='link-black text-sm'><i class='fa fa-thumbs-o-up margin-r-5'></i> Like</a></li>
                                                <li class='pull-right'><a href='#' class='link-black text-sm'><i class='fa fa-comments-o margin-r-5'></i> Comments (5)</a></li>
                                              </ul>
                                              <input class='form-control input-sm' placeholder='Response'>
                                            </div>                                                   
                                          </div>                        
                                        </form>-->
                                      </div><!-- /.post -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            ";

                                  }
                               }
                          }
                      }
                      echo"

                  
                  
            </div><!-- /.col -->  

            <div class='col-md-3' >
                  <!-- DIRECT CHAT -->
                  <div class='box box-primary direct-chat direct-chat-warning'>
                    <div class='box-header with-border'>
                      <h3 class='box-title'>Direct Chat</h3>
                      <div class='box-tools pull-right'>
                        <span data-toggle='tooltip' title='3 New Messages' class='badge bg-yellow'>3</span>
                        <button class='btn btn-box-tool' data-toggle='tooltip' title='Contacts' data-widget='chat-pane-toggle'><i class='glyphicon glyphicon-comment'></i></button>
                      </div>
                    </div><!-- /.box-header -->
                    <div class='box-body'>
                      <!-- Conversations are loaded here -->
                      <div class='direct-chat-messages' style='height:460px'>
                        <!-- Message. Default to the left -->
                        <div class='direct-chat-msg'>
                          <div class='direct-chat-info clearfix'>
                            <span class='direct-chat-name pull-left'>Alexander Pierce</span>
                            <span class='direct-chat-timestamp pull-right'>23 Jan 2:00 pm</span>
                          </div><!-- /.direct-chat-info -->
                          <img class='direct-chat-img' src='dist/img/user1-128x128.jpg' alt='message user image'><!-- /.direct-chat-img -->
                          <div class='direct-chat-text'>
                            Is this template really for free? That's unbelievable!
                          </div><!-- /.direct-chat-text -->
                        </div><!-- /.direct-chat-msg -->

                        <!-- Message to the right -->
                        <div class='direct-chat-msg right'>
                          <div class='direct-chat-info clearfix'>
                            <span class='direct-chat-name pull-right'>Sarah Bullock</span>
                            <span class='direct-chat-timestamp pull-left'>23 Jan 2:05 pm</span>
                          </div><!-- /.direct-chat-info -->
                          <img class='direct-chat-img' src='dist/img/user3-128x128.jpg' alt='message user image'><!-- /.direct-chat-img -->
                          <div class='direct-chat-text'>
                            You better believe it!
                          </div><!-- /.direct-chat-text -->
                        </div><!-- /.direct-chat-msg -->

                        <!-- Message. Default to the left -->
                        <div class='direct-chat-msg'>
                          <div class='direct-chat-info clearfix'>
                            <span class='direct-chat-name pull-left'>Alexander Pierce</span>
                            <span class='direct-chat-timestamp pull-right'>23 Jan 5:37 pm</span>
                          </div><!-- /.direct-chat-info -->
                          <img class='direct-chat-img' src='dist/img/user1-128x128.jpg' alt='message user image'><!-- /.direct-chat-img -->
                          <div class='direct-chat-text'>
                            Working with AdminLTE on a great new app! Wanna join?
                          </div><!-- /.direct-chat-text -->
                        </div><!-- /.direct-chat-msg -->

                          <!-- Message to the right -->
                        <div class='direct-chat-msg right'>
                          <div class='direct-chat-info clearfix'>
                            <span class='direct-chat-name pull-right'>Sarah Bullock</span>
                            <span class='direct-chat-timestamp pull-left'>23 Jan 2:05 pm</span>
                          </div><!-- /.direct-chat-info -->
                          <img class='direct-chat-img' src='dist/img/user3-128x128.jpg' alt='message user image'><!-- /.direct-chat-img -->
                          <div class='direct-chat-text'>
                            You better believe it!
                          </div><!-- /.direct-chat-text -->
                        </div><!-- /.direct-chat-msg -->

                        <!-- Message. Default to the left -->
                        <div class='direct-chat-msg'>
                          <div class='direct-chat-info clearfix'>
                            <span class='direct-chat-name pull-left'>Alexander Pierce</span>
                            <span class='direct-chat-timestamp pull-right'>23 Jan 5:37 pm</span>
                          </div><!-- /.direct-chat-info -->
                          <img class='direct-chat-img' src='dist/img/user1-128x128.jpg' alt='message user image'><!-- /.direct-chat-img -->
                          <div class='direct-chat-text'>
                            Working with AdminLTE on a great new app! Wanna join?
                          </div><!-- /.direct-chat-text -->
                        </div><!-- /.direct-chat-msg -->

                        <!-- Message to the right -->
                        <div class='direct-chat-msg right'>
                          <div class='direct-chat-info clearfix'>
                            <span class='direct-chat-name pull-right'>Sarah Bullock</span>
                            <span class='direct-chat-timestamp pull-left'>23 Jan 6:10 pm</span>
                          </div><!-- /.direct-chat-info -->
                          <img class='direct-chat-img' src='dist/img/user3-128x128.jpg' alt='message user image'><!-- /.direct-chat-img -->
                          <div class='direct-chat-text'>
                            I would love to.
                          </div><!-- /.direct-chat-text -->
                        </div><!-- /.direct-chat-msg -->

                      </div><!--/.direct-chat-messages-->

                      <!-- Contacts are loaded here -->
                      <div class='direct-chat-contacts' style='height:460px'>
                        <ul class='contacts-list'>
                          <li>
                            <a href='#'>
                              <img class='contacts-list-img' src='dist/img/user1-128x128.jpg'>
                              <div class='contacts-list-info'>
                                <span class='contacts-list-name'>
                                  Count Dracula
                                  <small class='contacts-list-date pull-right'>2/28/2015</small>
                                </span>
                                <span class='contacts-list-msg'>How have you been? I was...</span>
                              </div><!-- /.contacts-list-info -->
                            </a>
                          </li><!-- End Contact Item -->
                          <li>
                            <a href='#'>
                              <img class='contacts-list-img' src='dist/img/user7-128x128.jpg'>
                              <div class='contacts-list-info'>
                                <span class='contacts-list-name'>
                                  Sarah Doe
                                  <small class='contacts-list-date pull-right'>2/23/2015</small>
                                </span>
                                <span class='contacts-list-msg'>I will be waiting for...</span>
                              </div><!-- /.contacts-list-info -->
                            </a>
                          </li><!-- End Contact Item -->
                          <li>
                            <a href='#'>
                              <img class='contacts-list-img' src='dist/img/user3-128x128.jpg'>
                              <div class='contacts-list-info'>
                                <span class='contacts-list-name'>
                                  Nadia Jolie
                                  <small class='contacts-list-date pull-right'>2/20/2015</small>
                                </span>
                                <span class='contacts-list-msg'>I'll call you back at...</span>
                              </div><!-- /.contacts-list-info -->
                            </a>
                          </li><!-- End Contact Item -->
                          <li>
                            <a href='#'>
                              <img class='contacts-list-img' src='dist/img/user5-128x128.jpg'>
                              <div class='contacts-list-info'>
                                <span class='contacts-list-name'>
                                  Nora S. Vans
                                  <small class='contacts-list-date pull-right'>2/10/2015</small>
                                </span>
                                <span class='contacts-list-msg'>Where is your new...</span>
                              </div><!-- /.contacts-list-info -->
                            </a>
                          </li><!-- End Contact Item -->
                          <li>
                            <a href='#'>
                              <img class='contacts-list-img' src='dist/img/user6-128x128.jpg'>
                              <div class='contacts-list-info'>
                                <span class='contacts-list-name'>
                                  John K.
                                  <small class='contacts-list-date pull-right'>1/27/2015</small>
                                </span>
                                <span class='contacts-list-msg'>Can I take a look at...</span>
                              </div><!-- /.contacts-list-info -->
                            </a>
                          </li><!-- End Contact Item -->
                          <li>
                            <a href='#'>
                              <img class='contacts-list-img' src='dist/img/user8-128x128.jpg'>
                              <div class='contacts-list-info'>
                                <span class='contacts-list-name'>
                                  Kenneth M.
                                  <small class='contacts-list-date pull-right'>1/4/2015</small>
                                </span>
                                <span class='contacts-list-msg'>Never mind I found...</span>
                              </div><!-- /.contacts-list-info -->
                            </a>
                          </li><!-- End Contact Item -->
                           <li>
                            <a href='#'>
                              <img class='contacts-list-img' src='dist/img/user6-128x128.jpg'>
                              <div class='contacts-list-info'>
                                <span class='contacts-list-name'>
                                  John K.
                                  <small class='contacts-list-date pull-right'>1/27/2015</small>
                                </span>
                                <span class='contacts-list-msg'>Can I take a look at...</span>
                              </div><!-- /.contacts-list-info -->
                            </a>
                          </li><!-- End Contact Item -->
                          <li>
                            <a href='#'>
                              <img class='contacts-list-img' src='dist/img/user8-128x128.jpg'>
                              <div class='contacts-list-info'>
                                <span class='contacts-list-name'>
                                  Kenneth M.
                                  <small class='contacts-list-date pull-right'>1/4/2015</small>
                                </span>
                                <span class='contacts-list-msg'>Never mind I found...</span>
                              </div><!-- /.contacts-list-info -->
                            </a>
                          </li><!-- End Contact Item -->
                           <li>
                            <a href='#'>
                              <img class='contacts-list-img' src='dist/img/user6-128x128.jpg'>
                              <div class='contacts-list-info'>
                                <span class='contacts-list-name'>
                                  John K.
                                  <small class='contacts-list-date pull-right'>1/27/2015</small>
                                </span>
                                <span class='contacts-list-msg'>Can I take a look at...</span>
                              </div><!-- /.contacts-list-info -->
                            </a>
                          </li><!-- End Contact Item -->
                          <li>
                            <a href='#'>
                              <img class='contacts-list-img' src='dist/img/user8-128x128.jpg'>
                              <div class='contacts-list-info'>
                                <span class='contacts-list-name'>
                                  Kenneth M.
                                  <small class='contacts-list-date pull-right'>1/4/2015</small>
                                </span>
                                <span class='contacts-list-msg'>Never mind I found...</span>
                              </div><!-- /.contacts-list-info -->
                            </a>
                          </li><!-- End Contact Item -->
                        </ul><!-- /.contatcts-list -->
                      </div><!-- /.direct-chat-pane -->
                    </div><!-- /.box-body -->
                    <div class='box-footer'>
                      <form action='#' method='post'>
                        <div class='input-group'>
                          <input type='text' name='message' placeholder='Type Message ...' class='form-control'>
                          <span class='input-group-btn'>
                            <button type='button' class='btn btn-warning btn-flat'>Send</button>
                          </span>
                        </div>
                      </form>
                    </div><!-- /.box-footer-->
                  </div><!--/.direct-chat -->
                </div><!-- /.col -->
          </div><!-- /.row -->
            ";
  break;
}
}
?>