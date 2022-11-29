<!-- ======= PERINGATAN DINI ======= -->

<?php
require('../../layout/header.php');
?>

<div class="modal fade" id="modalPeringatanDini" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title">Peringatan Dini</h4>
            </div>
            <div id="warninglistmodal" class="modal-body" style="height: 600px;overflow:auto;"></div>

        </div>
    </div>
</div>



<!-- ======= PERINGATAN DINI ======= -->
<section id="peringatandini-details" class="peringatandini-details peringatan-dini-home">
    <div class="container">
        <div class="row g-0">
            <div class="col-md-2">
                <div class="peringatan-dini-home-head ">
                    <h4><span></span>Peringatan Dini</h4>
                </div>
            </div>
            <div class="col-md-10">
                <div id="alert" class="alert  ">
                    <div class="text-center">
                        <strong>
                            <span id="warningListTgl"></span></strong>
                        <p style="font-size: 15px;">
                            <span id="warninglist"></span>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- ======= END PERINGATAN DINI ======= -->
<!-- ======= END PERINGATAN DINI ======= -->

<script>
    $.ajax({
        url: "https://juanda.jatim.bmkg.go.id/flask/api/warningcuaca/jawatimur",
        dataType: "JSON",
        type: "GET",
        success: function(result) {
            $("#warninglist").html("");
            if (result.data == "Tidak ada peringatan dini!") {
                var warninglist = "<div><strong>Tidak Ada Peringatan Dini</strong></div>";
            } else {
                var warninglist =
                    "<div>" +
                    result.data
                newData = result.data.split("Kabupaten");
                tgl = newData[0].split("tgl")[1].split("berpotensi")[0].split("pkl.")[0];
                waktu = newData[0]
                    .split("tgl")[1]
                    .split("berpotensi")[0]
                    .split("pkl.")[1];
                hinggaWaktu = result.data.split("hingga pkl")[1].split("Prakirawan")[0];

                var headlineUpdateCuaca = `<h3>${newData[0].split("tgl")[0]}</h3>`;
                var tglStrong = `<p><strong> Tanggal : </strong>${tgl}</p>`;
                var waktuStrong = `<p><strong> Waktu Mulai  : </strong>${waktu}</p>`;
                var hinggaWaktuStrong = `<p><strong> Berlangsung Hingga  : </strong>${hinggaWaktu}</p>`;
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
                    headlineUpdateCuaca +
                    tglStrong +
                    waktuStrong +
                    hinggaWaktuStrong +
                    dataWarningListModal
                );
            }
            $("#warninglist").append(warninglist);
        },
    });
</script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>