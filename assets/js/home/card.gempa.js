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
    url: "https://data.bmkg.go.id/DataMKG/TEWS/autogempa.json",
    crossDomain: true,
    dataType: "JSON",
    headers: {
      accept: "application/json",
      "Access-Control-Allow-Origin": "*",
    },
    success: (item) => {
      let data = {};

      dataFind.forEach((item) => {
        $(`#${item}`).html($(this).find(item).text());
        if (item == "Potensi") {
          $(`#Potensi1`).html($(this).find(item).text());
        }
        if (item == "Wilayah") {
          $(`#Wilayah1`).html($(this).find(item).text());
        }
      });

      console.log(data);
    },
  });
});
