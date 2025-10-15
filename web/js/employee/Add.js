$(document).on("submit", "#add-form", function (e) {
  e.preventDefault();

  const form = $(this);
  const name = $(this).find("[name='Employee[name]']").val();
  const surname = $(this).find("[name='Employee[surname]']").val();
  const ssid = $(this).find("[name='Employee[ssid]']").val();
  console.info(name);

  $.ajax({
    url: form.attr("action"),
    type: "POST",
    data: form.serialize(),
    success: function (response) {
      if (response.success) {
        const newRow = $(`
          <tr data-id="${response.id}">
            <td><input type="text" name="name" value="${name}" class="edit"></td>
            <td><input type="text" name="surname" value="${surname}" class="edit"></td>
            <td><input type="text" name="ssid" value="${ssid}" class="edit"></td>
            <td>
              <button type="button" name="delete" class="edit">Delete</button>
              <form action="/YKAgenciesTrue/web/employee/view" method="get">
                <input type="hidden" name="id" value="${response.id}">
                <button type="submit" class="edit">View</button>
              </form>
            </td>
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
