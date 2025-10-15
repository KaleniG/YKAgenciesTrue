$("tr[data-id]").each(function () {
  const row = $(this);
  row.find("button[name='delete']").on("click", (e) => {
    e.preventDefault();

    $.ajax({
      url: "/YKAgenciesTrue/web/agency/delete",
      type: "POST",
      data: {
        id: row.data("id"),
        _csrf: yii.getCsrfToken()
      },
      success: (response) => {
        if (response.success) {
          row.remove();
        } else {
          console.log(response.message);
        }
      },
      error: function (xhr) {
        console.log("Error:", xhr.responseText);
      }
    });
  });
});
