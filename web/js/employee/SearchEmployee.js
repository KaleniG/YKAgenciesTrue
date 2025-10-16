$(document).ready(function () {
  $("#name-col-search, #surname-col-search, #ssid-col-search").on("input", function () {
    let nameFilter = $("#name-col-search").val().toLowerCase();
    let surnameFilter = $("#surname-col-search").val().toLowerCase();
    let ssidFilter = $("#ssid-col-search").val().toLowerCase();

    $("#employees-table tbody tr").each(function () {
      let name = $(this).find("[name='name']").val().toLowerCase();
      let surname = $(this).find("[name='surname']").val().toLowerCase();
      let ssid = $(this).find("[name='ssid']").val().toLowerCase();

      let match = true;
      if (nameFilter && !name.includes(nameFilter)) match = false;
      if (surnameFilter && !surname.includes(surnameFilter)) match = false;
      if (ssidFilter && !ssid.includes(ssidFilter)) match = false;

      $(this).toggle(match);
    });
  });
});
