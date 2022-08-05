var weathericon = {
  100: "Cerah",
  101: "Cerah Berawan",
  102: "Cerah Berawan",
  103: "Berawan",
  104: "Berawan Tebal",
  0: "Cerah",
  1: "Cerah Berawan",
  2: "Cerah Berawan",
  3: "Berawan",
  4: "Berawan Tebal",
  5: "Udara Kabur",
  10: "Asap",
  45: "Kabut",
  60: "Hujan Ringan",
  61: "Hujan Sedang",
  63: "Hujan Lebat",
  80: "Hujan Lokal",
  95: "Hujan Petir",
  97: "Hujan Petir",
};

$.ajax({
  url: `https://juanda.jatim.bmkg.go.id/flask/api/ndf/req?idkec=501282`,
  type: "GET",
  dataType: "json",
  crossDomain: true,
  success: function (response) {
    let data = [
      response.slice(0, 8),
      response.slice(8, 16),
      response.slice(16, 24),
      response.slice(24, 28),
      response.slice(28, 32),
      response.slice(32, 36),
      response.slice(36, 40),
    ];
    var now = new Date();
    var ampm = "pm";
    var html = "";

    dataAllTime = data;
    data[0].forEach((element) => {
      let ampm = moment(element.time).add(7, "hours").format("A").toLowerCase();
      html += `
                        <div class="item id-${element.time}" >
                            <div class="bg-cuaca ${weathericon[element.weather]
                              .toLowerCase()
                              .replace(" ", "-")}-${
        ampm == "pm" ? "malam" : "siang"
      } " style="padding:10px; ">
                                <div class="" >
                                    <div class="" style="display: flex; flex-direction:column;align-items: center;">
                                        <img style="width:120px; " src="http://localhost/bmkgjuanda/assets/img/icon-cuaca/${weathericon[
                                          element.weather
                                        ].toLowerCase()}-${ampm}.png" alt="${weathericon[
        element.weather
      ].toLowerCase()}">
                                        <p  class="text-center">${weathericon[
                                          element.weather
                                        ].toLowerCase()}</p>
                                    </div>
                                    <div class="" style="text-align:center;">
                                            <h2 class="">${
                                              element.temp
                                            }&deg;</h2>
                                            <p><i class="wi wi-direction-down"></i>${
                                              element.tmin
                                            }&deg;C<i class="wi wi-direction-up"></i>${
        element.tmax
      }&deg;C</p>
                                            <p><i class="wi wi-raindrop"></i>${
                                              element.hu
                                            }%</p>
                                            <p><i class="wi wi-strong-wind"></i>${
                                              element.ws
                                            }km/jam
                                            <br>
                                            ${
                                              element.wd
                                            }<i class="wi wi-wind wi-from-${element.wd.toLowerCase()}"></i>
                                            </p>
                                    </div>
                                    <p class="text-center">${moment(
                                      element.time
                                    )
                                      .add(7, "hours")
                                      .format("hh:mm a")}</p>
                                </div>
                            </div>
                        </div>
                        `;
    });
    $("#prakicu").html(html);

    $("#prakicu").owlCarousel({
      autoplay: true,
      rewind: true /* use rewind if you don't want loop */,
      margin: 5,
      items: 3,
      responsiveClass: true,
      autoHeight: true,
      autoplayTimeout: 4000,
      smartSpeed: 800,
    });
  },
});
