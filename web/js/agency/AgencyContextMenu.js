$(document).ready(function () {
  const menu = $("#context-menu");
  let currentRow = null;

  $(document).on("contextmenu", "tr[data-id]", function (e) {
    e.preventDefault();
    currentRow = $(this);

    menu.css({
      top: e.pageY + "px",
      left: e.pageX + "px",
    }).fadeIn(200);
  });

  $(document).on("click", function () {
    menu.hide();
  });

  $("#delete").on("click", function () {
    $.ajax({
      url: "/YKAgenciesTrue/web/agency/delete",
      type: "POST",
      data: {
        id: currentRow.data("id"),
        _csrf: yii.getCsrfToken()
      },
      success: (response) => {
        if (response.success) {
          currentRow.remove();
        } else {
          console.log(response.message);
        }
      },
      error: function (xhr) {
        console.log("Error:", xhr.responseText);
      }
    });
  });


  $("#view").on("click", function () {
    window.location.href = "/YKAgenciesTrue/web/agency/view?id=" + currentRow.data("id");
  });
});
