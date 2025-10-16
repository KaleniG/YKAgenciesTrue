$(document).on("submit", "#add-form", function (e) {
  e.preventDefault();

  const form = $(this);
  const name = form.find("[name='Agency[name]']").val();
  const description = form.find("[name='Agency[description]']").val();

  $.ajax({
    url: form.attr("action"),
    type: "POST",
    data: form.serialize(),
    success: function (response) {
      if (response.success) {
        const newRow = $(`
          <tr data-id="${response.id}">
            <td><input type="text" name="name" data-original="${name}" value="${name}" class="edit"></td>
            <td><textarea name="description" data-original="${description}" class="edit">${description}</textarea></td>
            <td>
              <button type="button" name="delete" class="edit">Delete</button>
              <form action="/YKAgenciesTrue/web/agency/view" method="get">
                <input type="hidden" name="id" value="${response.id}">
                <button type="submit" class="edit">View</button>
              </form>
            </td>
          </tr>
        `);

        $("table.edit tbody").append(newRow);

        newRow.find("button[name='delete']").on("click", function (e) {
          e.preventDefault();
          const row = $(this).closest("tr");

          $.ajax({
            url: "/YKAgenciesTrue/web/agency/delete",
            type: "POST",
            data: {
              id: row.data("id"),
              _csrf: yii.getCsrfToken()
            },
            success: function (response) {
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

        form[0].reset();
      } else {
        console.log(response.message);
      }
    },
    error: function (xhr) {
      console.log("Error:", xhr.responseText);
    }
  });
});
