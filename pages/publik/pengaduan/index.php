<?php
require('../../../layout/header.php');
require('../../../layout/navbar.php')

?>



<main id="main">

    <section>
        <div class="container">
            <div class="card p-4 box-shadow">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading">
                            <div class="heading_border bg_red"></div>
                            <h2>Pengaduan Masyarakat</h2>
                        </div>
                    </div>
                </div>

                <div class="card p-4">
                    <h5>Untuk mempermudah masyarakat dalam menyampaikan laporan, Stasiun Meteorologi Kelas I Juanda telah menyediakan sarana online yang dapat diakses setiap saat.

                        <br><br>Ruang lingkup Pengaduan Masyarakat yang kami terima meliputi:
                        <br>a. penyalahgunaan wewenang;
                        <br>b. pelayanan masyarakat;
                        <br>c. korupsi, kolusi, dan nepotisme serta pungutan liar;
                        <br>d. kepegawaian;
                        <br>e. tatalaksana/regulasi; dan
                        <!-- <br>f. perumahan/pertanahan; dan -->
                        <br>f. pengaduan masyarakat lainnya.
                    </h5>


                    <div id="container" style="width: 700px; height: 400px; margin: 0 auto">
                    </div>




                    Bagi anda yang akan menyampaikan laporan, silahkan klik link berikut
                    <br><a href='/bmkgjuanda/pages/publik/pengaduan/input.php'><button class="btn btn-info">Pengaduan</button></a>





                </div>
            </div>
    </section>

</main>
<?php require('../../../layout/footer.php') ?>



<?php
require('../../../layout/libraryJs.php');
?>

<script src="https://www.gstatic.com/charts/loader.js"></script>
<script language="JavaScript">
    function drawChart() {
        // Define the chart to be drawn.
        var data = google.visualization.arrayToDataTable([
            ['Bulan', 'Pengaduan', {
                role: 'annotation'
            }],
            ['Januari', 0, '0'],
            ['Februari', 0, '0'],
            ['Maret', 0, '0'],
            ['April', 0, '0'],
            ['Mei', 0, '0'],
            ['Juni', 0, '0'],
            ['Juli', 0, '0'],
            ['Agustus', 0, '0'],
        ]);


        // Set chart options
        var options = {
            title: 'Jumlah Pengaduan Masyarakat Tahun 2021',
            vAxis: {
                title: 'Jumlah',
                minValue: 0,
                maxValue: 9
            },
            hAxis: {
                title: 'Jumlah Pertanyaan'
            },

            seriesType: 'bars',
            series: {
                2: {
                    type: 'line'
                }
            }
        };

        // Instantiate and draw the chart.
        var chart = new google.visualization.ComboChart(document.getElementById('container'));
        chart.draw(data, options);
    }
    google.charts.load('current', {
        packages: ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);
</script>