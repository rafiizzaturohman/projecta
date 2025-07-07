import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

$(document).ready(() => {
  $("#search").on("keyup", function () {
    let query = $(this).val();

    $.ajax({
      url: window.userSearchUrl,
      type: "GET",
      data: { query: query },
      success: function (res) {
        $("#userTable-tbody").html(res.html);
      },
      error: function (err) {
        console.error("Gagal mengambil data:", err);
      },
    });
  });
});
