<?php
include "config/koneksi.php";
$modul = $_GET['modul'];

  

// Bagian Home
if ( $modul=='home')
{
	if ($_SESSION['leveluser']=='admin')
	{
    	include "modul/home/home.php";
    }
}
else if ( $modul=='bendung')
{
	if ($_SESSION['leveluser']=='admin')
	{
    	include "modul/bendung/bendung.php";
    }
}
else if ( $modul=='ranting')
{
	if ($_SESSION['leveluser']=='admin')
	{
    	include "modul/ranting/ranting.php";
    }
}
else if ( $modul=='jabatan')
{
	if ($_SESSION['leveluser']=='admin')
	{
    	include "modul/jabatan/jabatan.php";
    }
}
else if ( $modul=='personil')
{
    if($_SESSION['leveluser']=='admin')
    {
        include "modul/personil/personil.php";
    }
}
else if ( $modul=='irigasi')
{
	if ($_SESSION['leveluser']=='admin')
	{
    	include "modul/irigasi/irigasi.php";
    }
}
else if ( $modul=='debit')
{
    if ($_SESSION['leveluser']=='admin')
    {
        include "modul/debit/debit.php";
    }
}
else if ( $modul=='blangko49')
{
    if ($_SESSION['leveluser']=='admin')
    {
        include "modul/blangko49/blangko49.php";
    }
}
else if ( $modul=='blangko4')
{
    if ($_SESSION['leveluser']=='admin')
    {
        include "modul/blangko49/blangko4.php";
    }
}
else if ( $modul=='blangko5')
{
    if ($_SESSION['leveluser']=='admin')
    {
        include "modul/blangko49/blangko5.php";
    }
}
else if ( $modul=='blangko6')
{
    if ($_SESSION['leveluser']=='admin')
    {
        include "modul/blangko49/blangko6.php";
    }
}
else if ( $modul=='blangko7')
{
    if ($_SESSION['leveluser']=='admin')
    {
        include "modul/blangko49/blangko7.php";
    }
}
else if ( $modul=='blangko9')
{
    if ($_SESSION['leveluser']=='admin')
    {
        include "modul/blangko49/blangko9.php";
    }
}
else if ( $modul=='suprancaekek')
{
    if ($_SESSION['leveluser']=='admin')
    {
        include "modul/suprancaekek/suprancaekek.php";
    }
}
else if ( $modul=='rttg')
{
    include "modul/rttg/rttg.php";
}
else if ( $modul=='rttg2')
{
    include "modul/rttg2/rttg2.php";
}
// Apabila modul tidak ditemukan
else{
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
?>
