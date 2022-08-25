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
    url: "https://juanda.jatim.bmkg.go.id/flask/api/gempa/terkini",
    crossDomain: true,
    dataType: "JSON",
    headers: {
      accept: "application/json",
      "Access-Control-Allow-Origin": "*",
    },
    success: (results) => {
      let data = {};

      dataFind.forEach((item) => {
        $(`#${item}`).html(results.Infogempa.gempa[item]);
        if (item == "Potensi") {
          $(`#Potensi1`).html(results.Infogempa.gempa[item]);
        }
        if (item == "Wilayah") {
          $(`#Wilayah1`).html(results.Infogempa.gempa[item]);
        }
      });

      console.log(data);
    },
  });
});
