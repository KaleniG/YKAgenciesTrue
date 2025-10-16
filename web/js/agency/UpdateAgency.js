$(document).on("change", "#agency-name, #agency-description", function () {
  const id = $("#agency-id").val();
  const fieldName = $(this).attr("name");
  const value = $(this).val();

  if ($(this).data("original") === value)
    return;

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
        $(this).data("original", $(this).val());
      }
    },
    error: function (xhr) {
      console.log("Error:", xhr.responseText);
    }
  });
});
