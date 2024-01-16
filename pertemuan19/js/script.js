// ambil elemen2 yang dibutuhkan

const keyword = document.getElementById("keyword");
const search_button = document.getElementById("search-button");
const container = document.getElementById("container");

// tambahkan event ketika keyword ditulis

keyword.addEventListener("keyup", function () {
  // buat objek ajax

  const xhr = new XMLHttpRequest();

  // cek kesiapan ajax
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      container.innerHTML = xhr.responseText;
    }
  }

  // eksekusi ajax
  xhr.open("GET", "./ajax/students.php?s="+keyword.value, true);
  xhr.send();


});