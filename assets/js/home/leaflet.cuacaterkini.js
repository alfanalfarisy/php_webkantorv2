var map = L.map("mapCuaca").setView(
  [-7.25260732149773, 112.73423225692369],
  13
);
L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
  maxZoom: 8,
}).addTo(map);

$.ajax({
  url: "https://juanda.jatim.bmkg.go.id/radar/data/data.json",
  type: "GET",
  crossDomain: true,
  dataType: "json",
  success: function (msg) {
    var imageUrl = `https://juanda.jatim.bmkg.go.id${msg.cmax.replace(
      "..",
      ""
    )}`;
    var errorOverlayUrl =
      "https://cdn-icons-png.flaticon.com/512/110/110686.png";
    var altText =
      "Image of Newark, N.J. in 1922. Source: The University of Texas at Austin, UT Libraries Map Collection.";
    var latLngBounds = L.latLngBounds([
      [-5.608692, 110.952998],
      [-9.205359, 114.581819],
    ]);

    var imageOverlay = L.imageOverlay(imageUrl, latLngBounds, {
      opacity: 0.8,
      errorOverlayUrl: errorOverlayUrl,
      alt: altText,
      interactive: true,
    }).addTo(map);
  },
});

$(".leaflet-control-attribution").hide();
