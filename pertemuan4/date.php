<?php 
// Date 
// Untuk menampilkan dengan format tertentu
  // echo date("l, d-M-Y");

// Time
// UNIX Timestamp / EPOCH time
// Detik yang sudah berlalu sejak 1 januari 1970
  // echo time();
  // echo date("l, d-M-Y", time()+60*60*24*100);

// mktime
// membuat sendiri detik
// mktime(0,0,0,0,0,0)
// jam, menit, detik, bulan, tanggal, tahun
  // echo date("l d-M-Y", mktime(0,0,0,8,23,2002));

// strtotime
echo date("l d-M-Y", strtotime("23 august 2002"));


?>