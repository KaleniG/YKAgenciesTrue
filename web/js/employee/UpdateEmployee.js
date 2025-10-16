$(document).on("change", "#name, #surname, #ssid", function () {
  const id = $("#id").val();
  const fieldName = $(this).attr("name");
  const value = $(this).val();

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
      }
    },
    error: function (xhr) {
      console.log("Error:", xhr.responseText);
    }
  });
});

$(document).on("select", "#agency", function () {
  const id = $("#id").val();
  const fieldName = $(this).attr("name");
  const value = $(this).val();

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
      }
    },
    error: function (xhr) {
      console.log("Error:", xhr.responseText);
    }
  });
});
