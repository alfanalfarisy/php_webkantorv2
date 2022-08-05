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

let dataAllTime = [];
let selectedKecName = [];

function loadall() {
  $.ajax({
    url: "https://juanda.jatim.bmkg.go.id/node/api/constants/listNamaKabupaten",
    type: "GET",
    dataType: "json",
    success: function (response) {
      $("#selectKab").attr("disabled", false);
      $.each(response, function (key, value) {
        if (value.namakab == "Sidoarjo") {
          $("#selectKab").append(
            "<option selected='selected' value=" +
              value.idkab +
              ">" +
              value.namakab +
              "</option>"
          );
        } else {
          $("#selectKab").append(
            "<option value=" + value.idkab + ">" + value.namakab + "</option>"
          );
        }
      });
    },
  });
}

function kabupatenSelected() {
  const selectedKab = $("#selectKab option:selected").val();

  $.ajax({
    url: `https://juanda.jatim.bmkg.go.id/node/api/constants/listNamaKecamatanIdKab/${selectedKab}`,
    type: "GET",
    dataType: "json",
    success: function (response) {
      $("#selectKec").attr("disabled", false);
      $("#selectKec").empty();
      $.each(response, function (key, value) {
        console.log("ok");
        $("#selectKec").append(
          "<option value=" + value.idkec + ">" + value.namakec + "</option>"
        );
      });
    },
  });
}

function kecamatanSelected() {
  let selectedKec = $("#selectKec option:selected").val();
  selectedKecName = $("#selectKec option:selected").text();
  $("#prakicu").remove();
  $("#prakicuWrapper").append('<div id="prakicu" class="owl-carousel"></div>');
  $("#inputSelectedKecamatan").html(selectedKecName);
  $("#prakicu").append('<p id="loading">LOADING...</p>');
  $.ajax({
    url: `https://juanda.jatim.bmkg.go.id/flask/api/ndf/req?idkec=${selectedKec}`,
    type: "GET",
    dataType: "json",
    crossDomain: true,
    success: function (response) {
      $("#selectKec").attr("disabled", false);
      $("#selectDate").empty();
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
      var allkota = [];
      data.forEach((element) => {
        let date = moment(element[0].time).add(7, "hours").format("MM/DD/YYYY");
        $("#selectDate").append(
          "<option value=" + date + ">" + date + "</option>"
        );
      });
      dataAllTime = data;
      data[0].forEach((element) => {
        let ampm = moment(element.time)
          .add(7, "hours")
          .format("A")
          .toLowerCase();
        allkota.push(`
        <div class="item id-${element.time}" >
                                     <div class="bg-cuaca ${weathericon[
                                       element.weather
                                     ]
                                       .toLowerCase()
                                       .replace(" ", "-")}-${
          ampm == "pm" ? "malam" : "siang"
        } " style="padding:10px; ">
                                        <div class="" >
                                            <div class="" style="display: flex; flex-direction:column;align-items: center;">
                                                <img style="width:60px; " src="http://localhost/bmkgjuanda/assets/img/icon-cuaca/${weathericon[
                                                  element.weather
                                                ].toLowerCase()}-${ampm}.png" alt="${weathericon[
          element.weather
        ].toLowerCase()}">
                                                <p  class="text-center" style="height:50px" >${weathericon[
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
                                
              `);
      });

      $("#loading").remove();
      $("#prakicu").append(allkota.join(""));
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
}

function dateSelected() {
  const selectedDate = $("#selectDate option:selected").text();
  $("#prakicu").remove();
  $("#prakicuWrapper").append('<div id="prakicu" class="owl-carousel"></div>');
  $("#prakicu").append('<p id="loading">LOADING...</p>');
  let allkota = [];
  dataAllTime.forEach((element) => {
    console.log(moment(element[0].time).add(7, "hours").format("MM/DD/YYYY"));
    console.log(selectedDate);
    if (
      moment(element[0].time).add(7, "hours").format("MM/DD/YYYY") ==
      selectedDate
    ) {
      element.forEach((element) => {
        let ampm = moment(element.time)
          .add(7, "hours")
          .format("A")
          .toLowerCase();
        allkota.push(`
        <div class="item id-${element.time}" >
                                     <div class="bg-cuaca ${weathericon[
                                       element.weather
                                     ]
                                       .toLowerCase()
                                       .replace(" ", "-")}-${
          ampm == "pm" ? "malam" : "siang"
        } " style="padding:10px; ">
                                        <div class="" >
                                            <div class="" style="display: flex; flex-direction:column;align-items: center;">
                                                <img style="width:60px; " src="http://localhost/bmkgjuanda/assets/img/icon-cuaca/${weathericon[
                                                  element.weather
                                                ].toLowerCase()}-${ampm}.png" alt="${weathericon[
          element.weather
        ].toLowerCase()}">
                                                <p  class="text-center" style="height:50px" >${weathericon[
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
                                
              `);
      });
    }
  });

  $("#loading").remove();
  $("#prakicu").append(allkota.join(""));
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
}

function initiate() {
  $.ajax({
    url: `https://juanda.jatim.bmkg.go.id/node/api/constants/listNamaKecamatanIdKab/501303`,
    type: "GET",
    dataType: "json",
    success: function (response) {
      $("#selectKec").attr("disabled", false);
      $("#selectKec").empty();
      $.each(response, function (key, value) {
        if (value.namakec == "Waru") {
          $("#selectKec").append(
            "<option selected='selected' value=" +
              value.idkec +
              ">" +
              value.namakec +
              "</option>"
          );
        } else {
          $("#selectKec").append(
            "<option value=" + value.idkec + ">" + value.namakec + "</option>"
          );
        }
      });
    },
  });

  $.ajax({
    url: `https://juanda.jatim.bmkg.go.id/flask/api/ndf/req?idkec=5008667`,
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
      var allkota = [];
      data.forEach((element) => {
        let date = moment(element[0].time).add(7, "hours").format("MM/DD/YYYY");
        $("#selectDate").append(
          "<option value=" + date + ">" + date + "</option>"
        );
      });
      dataAllTime = data;
      data[0].forEach((element) => {
        let ampm = moment(element.time)
          .add(7, "hours")
          .format("A")
          .toLowerCase();
        allkota.push(`
        <div class="item id-${element.time}" >
                                     <div class="bg-cuaca ${weathericon[
                                       element.weather
                                     ]
                                       .toLowerCase()
                                       .replace(" ", "-")}-${
          ampm == "pm" ? "malam" : "siang"
        } " style="padding:10px; ">
                                        <div class="" >
                                            <div class="" style="display: flex; flex-direction:column;align-items: center;">
                                                <img style="width:60px; " src="http://localhost/bmkgjuanda/assets/img/icon-cuaca/${weathericon[
                                                  element.weather
                                                ].toLowerCase()}-${ampm}.png" alt="${weathericon[
          element.weather
        ].toLowerCase()}">
                                                <p  class="text-center" style="height:50px" >${weathericon[
                                                  element.weather
                                                ].toLowerCase()}</p>
                                                <p class="text-center">${moment(
                                                  element.time
                                                )
                                                  .add(7, "hours")
                                                  .format("hh:mm a")}</p>
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
                                         
                                        </div>
                                    </div>
                                </div>
                                
              `);
      });

      $("#loading").remove();
      $("#prakicu").append(allkota.join(""));
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
}
$(function () {
  $(document).ready(function () {
    loadall();
    initiate();
  });
});
