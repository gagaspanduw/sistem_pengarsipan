<?php
//session_start();
// data untuk database
$dbhost = 'localhost'; //isikan alamat host biasanya localhost
$dbuser = 'root'; //user database
$dbpass = ''; //password database   
$dbname = 'pengarsipan'; //nama database

// koneksi ke intranet
$koneksi = mysql_connect ($dbhost, $dbuser, $dbpass) or die ("tidak bisa connect ke database: " . mysql_error());
mysql_select_db ($dbname) or die ("tidak bisa milih database: " . mysql_error());
?>