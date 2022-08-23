let dataFind = [
  "Tanggal",
  "Jam",
  "DateTime",
  "Lintang",
  "Bujur",
  "Magnitude",
  "Kedalaman",
  "Wilayah",
  "Dirasakan",
  "Potensi",
  "Shakemap",
];

$(document).ready(function () {
  $.ajax({
    type: "GET",
    url: "/bmkgjuanda/data/autogempa.xml",
    crossDomain: true,
    dataType: "xml",
    headers: {
      accept: "application/json",
      "Access-Control-Allow-Origin": "*",
    },
    success: (item) => {
      let data = {};

      $(item)
        .find("gempa")
        .each(function () {
          dataFind.forEach((item) => {
            data[item] = $(this).find(item).text();
            $(`#${item}`).html($(this).find(item).text());
            if (item == "Potensi") {
              $(`#Potensi1`).html($(this).find(item).text());
            }
            if (item == "Wilayah") {
              $(`#Wilayah1`).html($(this).find(item).text());
            }
          });
        });
      console.log(data);
    },
  });
});
