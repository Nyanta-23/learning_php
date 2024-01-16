<?php
// Pertemuan 2 - PHP Dasar
// Sintaks PHP

// Standart Output
// echo, print => mengeluarkan biasa seperti console.log();
// print_r => digunakan mencetak isi array (debugging)
// var_dump => digunakan untuk melihat isi dari variable (debugging)

// echo "Ilhan";
// print "Ilhan";
// print_r("ilhan");  
// var_dump("ilhan");
// echo 123;
// echo true;
// echo 'Jum\'at';

// Penulisan sintaks php
// 1. PHP di dalam HTML
// 2. HTML di dalam PHP

// Variable dan tipe data
// tidak boleh diawali dengan angka tapi boleh mengandung angka

// $nama = "Ilhan Revaliana";

// Interpolasi
// echo "Halo, nama saya $nama";

// Operator
// Aritmatika
// + - * / %

// Penggabung string / concatenation
// .

// $nama_depan = "Muhamad";
// $nama_belakang = "Ilhan";

// echo $nama_depan . " " . $nama_belakang;

// Assignment
// =, +=, -=, *=, /=, %=, .=

// $x = 1;
// $x += 5;
// echo $x;

// $nama = "Muhamad";
// $nama .= " ";
// $nama .= "Ilhan";

// echo $nama;

// Perbandingan
// <, >, <=, >=, ==, !=
// var_dump(1 === "1");

// Identitas
// ===, !==
// var_dump(1 === "1");

// Logika
// &&, ||, !
$x = 30;
var_dump($x < 20 || $x % 2 == 0);