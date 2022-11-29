var mapWarning = L.map("mapWarning").setView([-7.7043771, 112.7221155], 8);

L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
  attribution:
    '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
}).addTo(mapWarning);
console.log("result");

$.ajax({
  url: "https://juanda.jatim.bmkg.go.id/flask/api/warningcuaca/polygon",
  dataType: "JSON",
  type: "GET",
  "Access-Control-Allow-Headers": "*",
  success: function (result) {
    L.geoJSON(result.features, {
      style: function (feature) {
        switch (feature.properties.STATUS) {
          case "meluas":
            return { color: "#f5b042", weight: 0, fillOpacity: 0.4 };
          case "terjadi":
            return { color: "#f54842", weight: 0, fillOpacity: 0.6 };
          default:
            return {
              color: "#ffffff",
              weight: 0,
            };
        }
      },
    }).addTo(mapWarning);
    // L.geojson.eachLayer(function (layer) {
    //   layer.bindPopup(
    //     layer.feature.properties["NAME_3"] +
    //       ", " +
    //       layer.feature.properties["NAME_2"]
    //   );
    // });
  },
});
$(".leaflet-control-attribution").hide();
