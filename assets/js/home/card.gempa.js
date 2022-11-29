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
  "Coordinates",
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
      $("#img-location-gempa").html(
        ` <a id="link-img-gempa" href="https://ews.bmkg.go.id/tews/data/${results.Infogempa.gempa.Shakemap}" class="fancybox img-hover-v1" rel="gallery1" title="Gempabumi Terkini">
        <img class="img-fluid" id="img-gempa" src="https://ews.bmkg.go.id/tews/data/${results.Infogempa.gempa.Shakemap}" alt="">
    </a>`
      );

      dataFind.forEach((item) => {
        $(`#${item}`).html(results.Infogempa.gempa[item]);
        if (item == "Potensi") {
          $(`#Potensi1`).html(results.Infogempa.gempa[item]);
        }
        if (item == "Wilayah") {
          $(`#Wilayah1`).html(results.Infogempa.gempa[item]);
        }
      });
    },
  });
});
