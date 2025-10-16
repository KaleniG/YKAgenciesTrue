$(document).ready(() => {
  const opForm = $("#op-form");
  opForm.hide();

  $(document).on("change", "input[type='checkbox']", function () {
    const checkboxes = $("input[type='checkbox']");

    if (this.checked) {
      checkboxes.not(this).prop("checked", false);

      $(this).closest("tr").find("input[type='text'], textarea").prop("disabled", false);
      checkboxes.not(this).closest("tr").find("input[type='text'], textarea").prop("disabled", true);

      const id = $(this).closest("tr").data("id");
      opForm.find("input[name='id']").val(id);

      opForm.find("button[name='delete']")
        .off("click")
        .on("click", (e) => {
          e.preventDefault();

          $.ajax({
            url: "/YKAgenciesTrue/web/agency/delete",
            type: "POST",
            data: {
              id: id,
              _csrf: yii.getCsrfToken()
            },
            success: (response) => {
              if (response.success) {
                $(this).closest("tr").remove();
                opForm.hide();
              } else {
                console.log(response.message);
              }
            },
            error: function (xhr) {
              console.log("Error:", xhr.responseText);
            }
          });
        });

      opForm.fadeIn();

    } else {
      if (!$("input[type='checkbox']:checked").length) {
        opForm.hide();
      }
    }
  });
});
