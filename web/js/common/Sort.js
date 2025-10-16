$(document).ready(function () {
  $('th.sortable').click(function () {
    if (typeof this.asc === 'undefined') this.asc = true; // default ascending

    var table = $(this).parents('table').eq(0);
    var rows = table.find('tbody tr').toArray().sort(comparer($(this).index()));

    if (!this.asc) rows = rows.reverse(); // reverse if descending
    for (var i = 0; i < rows.length; i++) table.append(rows[i]);

    const th = $(this);
    $('th.sortable').each(function () {
      $(this).text($(this).text().replace(/[▲▼]/g, ''));
    });
    th.text(th.text() + (this.asc ? ' ▼' : ' ▲'));

    this.asc = !this.asc; // flip for next click
  });


  function comparer(index) {
    return function (a, b) {
      var valA = getCellValue(a, index), valB = getCellValue(b, index);
      return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.toString().localeCompare(valB);
    }
  }

  function getCellValue(row, index) {
    var cell = $(row).children('td').eq(index);
    var input = cell.find('input, textarea');
    return input.length ? input.val() : cell.text();
  }
});
