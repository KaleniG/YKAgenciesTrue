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
            <td><input type="checkbox" name="op-enabled" class="edit"></td>
            <td><input type="text" name="name" data-original="${name}" value="${name}" class="edit" disabled></td>
            <td><textarea name="description" data-original="${description}" class="edit" disabled>${description}</textarea></td>
          </tr>
        `);

        $("table.edit tbody").append(newRow);

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
