$(document).ready(function () {

  // hilangkan tombol car
  $("#search-button").hide();

  // event ketika keyword ditulis
  $("#keyword").on("keyup", function () {
    // munculkan icon loading
    $(".loader").show();

    // ajak menggunakan load
    // $("#container").load("ajax/students.php?s=" + $("#keyword").val());

    // $.get()
    $.get("ajax/students.php?s=" + $("#keyword").val(), function(data) {
      $("#container").html(data);
      $(".loader").hide();
    });
  });
});
