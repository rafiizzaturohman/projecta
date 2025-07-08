import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

$(document).ready(() => {
  $("#search").on("keyup", function () {
    let query = $(this).val();
    let url = $(this).data("url");
    let target = $(this).data("target");

    $.ajax({
      url: url,
      type: "GET",
      data: { query: query },
      success: function (res) {
        $(target).html(res.html);
      },

      error: function (err) {
        console.error("Gagal mengambil data:", err);
      },
    });
  });
});
