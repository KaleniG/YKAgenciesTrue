$(document).ready(function () {
  $("#name-col-search, #description-col-search").on("input", function () {
    let nameFilter = $("#name-col-search").val().toLowerCase();
    let descFilter = $("#description-col-search").val().toLowerCase();

    $("#agencies-table tbody tr").each(function () {
      let name = $(this).find("[name='name']").val().toLowerCase();
      let desc = $(this).find("[name='description']").val().toLowerCase();

      let match = true;
      if (nameFilter && !name.includes(nameFilter)) match = false;
      if (descFilter && !desc.includes(descFilter)) match = false;

      $(this).toggle(match);
    });
  });
});
