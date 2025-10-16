$(document).on("change", "#employees-table tbody input", function () {
  const row = $(this).closest("tr");
  const id = row.data("id");
  const fieldName = $(this).attr("name");
  const value = $(this).val();

  if ($(this).data("original") === value)
    return;

  $.ajax({
    url: "/YKAgenciesTrue/web/employee/update",
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
        $(this).data("original", $(this).val());
      }
    },
    error: (xhr) => {
      console.log("Error:", xhr.responseText);
    }
  });
});
