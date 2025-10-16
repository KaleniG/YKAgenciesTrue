$(document).on("change", "#agencies-table tbody input, #agencies-table tbody textarea", function () {
  const row = $(this).closest("tr");
  const id = row.data("id");
  const fieldName = $(this).attr("name")
  const value = $(this).val();

  $.ajax({
    url: "/YKAgenciesTrue/web/agency/update",
    type: "POST",
    data: {
      _csrf: yii.getCsrfToken(),
      id: id,
      [fieldName]: value
    },
    success: (response) => {
      if (!response.success) {
        console.log(response.message);
        $(this).val($(this).data("original"));
      }
    },
    error: function (xhr) {
      console.log("Error:", xhr.responseText);
    }
  });
});
