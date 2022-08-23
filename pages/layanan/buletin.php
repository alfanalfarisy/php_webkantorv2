<?php
require('../../layout/header.php');
require('../../layout/navbar.php')
?>



<main id="main">


</main>


<section>
    <div class="container ">
        <div class="card p-4 box-shadow">

            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <div class="heading_border bg_red"></div>
                        <h2>Buletin dan Analisa</h2>
                    </div>
                </div>
            </div>
            <div class="row m-t-35">

                <div class="col-md-12">
                    <div class="">
                        <h2 id="judul" class="">Judul</h2>
                        <div class="">
                            <ul class="">
                                <li id="penulis"><i class="fa fa-pencil"></i>Penulis</li>
                                <li id="tanggal"><i class="fa fa-calendar"></i>Tanggal</li>
                            </ul>
                            <div class="pull-right">
                                <div class="addthis_sharing_toolbox"></div>
                            </div>
                        </div>
                        <p id="isi">Isi</p>

                        <p><iframe id="embed" src="" style="width:100%; height:100vh;" frameborder="0"></iframe>
                            <br>- <em>Klik <a id="file" href="#" target="_blank" rel="noopener">tautan ini</a>
                                jika PDF di atas tidak muncul</em>.
                        </p>

                        <div class="margin-bottom-30"></div>

                    </div>

                    <div class="artikel-pengumuman-home margin-bottom-30">
                        <div class="headline">
                            <h4>Artikel Lainnya</h4>
                        </div>
                        <div id="listbuletin"></div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

<?php require('../../layout/footer.php') ?>
<?php require('../../layout/libraryJs.php') ?>


<script>
var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(
                sParameterName[1]);
        }
    }
};

function loadbuletin(id) {
    $.ajax({
        url: "/bmkgjuanda/data/buletin.json",
        dataType: "JSON",
        type: "GET",
        success: function(result) {
            $("#listbuletin").html("");
            var listbuletin = [];
            if (id === undefined) {
                $("#tanggal").text(result[0].tanggal);
                $("#judul").text(result[0].judul);
                $("#isi").text(result[0].isi);
                $("#penulis").text(result[0].penulis);
                $("#file").attr("href", "/bmkgjuanda/data/buletin/" + result[0].file);
                $("#embed").attr("src", "https://docs.google.com/gview?url=" +
                    document.URL.substr(0, document.URL.lastIndexOf('/')) +
                    "bmkgjuanda/data/buletin/" + result[0].file + "&embedded=true");
            }
            for (i = 0; i < result.length; i++) {
                listbuletin.push(
                    '<div class="blog-thumb margin-bottom-10"><div class="blog-thumb-desc"><h3><a href="buletin.php?id=' +
                    result[i].id + '">' + result[i].judul +
                    '</a></h3><ul class="blog-thumb-info"><li>' + result[i]
                    .tanggal + '</li></ul></div></div>');
                if (result[i].id == id) {
                    $("#tanggal").text(result[i].tanggal);
                    $("#judul").text(result[i].judul);
                    $("#isi").text(result[i].isi);
                    $("#penulis").text(result[i].penulis);
                    $("#file").attr("href", "/bmkgjuanda/data/buletin/" + result[i].file);
                    $("#embed").attr("src", "https://docs.google.com/gview?url=" +
                        document.URL.substr(0, document.URL.lastIndexOf('/')) +
                        "bmkgjuanda/data/buletin/" + result[i].file + "&embedded=true");
                }
            }
            $("#listbuletin").append(listbuletin.join(''));
        }
    });
}

$(function() {
    $(document).ready(function() {
        var id = getUrlParameter('id');
        loadbuletin(id);
    });
});
</script>