$.ajax({
  url: "https://juanda.jatim.bmkg.go.id/flask/api/warningcuaca/jawatimur",
  dataType: "JSON",
  type: "GET",
  success: function (result) {
    $("#warninglist").html("");
    if (result.data == "Tidak ada peringatan dini!") {
      var warninglist = "<div><strong>Tidak Ada Peringatan Dini</strong></div>";
    } else {
      var warninglist =
        "<div>" +
        result.data.split(" di ")[0] +
        '<button data-toggle="modal" data-target="#modalPeringatanDini" style=" background-color: transparent;    background-repeat: no-repeat;    border: none;    cursor: pointer;    overflow: hidden;    outline: none;">Selengkapnya</button>';
      newData = result.data.split("Kabupaten");
      tgl = newData[0].split("tgl")[1].split("berpotensi")[0].split("pkl.")[0];
      waktu = newData[0]
        .split("tgl")[1]
        .split("berpotensi")[0]
        .split("pkl.")[1];

      var headlineUpdateCuaca = `<h3>${newData[0].split("tgl")[0]}</h3>`;
      var tglStrong = `<p><strong> Tanggal : </strong>${tgl}</p>`;
      var waktuStrong = `<p><strong> Waktu : </strong>${waktu}</p>`;
      var potensi = `<strong>Potensi : </strong><p>${
        newData[0].split("tgl")[1].split("berpotensi")[1]
      } :</p>`;
      var warningListTgl = `<p style="color:white;">${tgl} ${waktu}</p>`;
      dataWarningListModal = "";
      for (i = 1; i < newData.length; i++) {
        dataWarningListModal += `<p><strong>Kabupaten ${
          newData[i].split(":")[0]
        }</strong>: ${newData[i].split(":")[1]} <p>`;
      }
      dataWarningList = "";
      for (i = 1; i < newData.length; i++) {
        dataWarningList += `<p><strong>Kabupaten ${
          newData[i].split(":")[0]
        }</strong> ${newData[i].split(":")[1]} <p>`;
      }

      $("#warningListTgl").append(warningListTgl);

      $("#warninglistmodal").html("");
      $("#warninglistmodal").append(
        headlineUpdateCuaca + tglStrong + waktuStrong + dataWarningListModal
      );
    }
    $("#warninglist").append(warninglist);
  },
});
