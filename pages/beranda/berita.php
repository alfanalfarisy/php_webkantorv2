<?php
require('../../layout/header.php');
require('../../layout/navbar.php')
?>

<head>
	<style type="text/css">
	   .left    { text-align: left;}
	   .right   { text-align: right;}
	   .center  { text-align: center;}
	   .justify { text-align: justify;}
	</style>
</head>

<main id="main">

	<section id="copmany_p" class="bg_gray p-t-50 p-b-50">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="heading">
						<div class="heading_border bg_red"></div>
						<center><h2>BERITA</h2></center>
					</div>
				</div>
			</div>
			<div class="row m-t-35">
				<script>
					var getUrlParameter = function getUrlParameter(sParam) {
						var sPageURL = window.location.search.substring(1),
							sURLVariables = sPageURL.split('&'),
							sParameterName,
							i;

						for (i = 0; i < sURLVariables.length; i++) {
							sParameterName = sURLVariables[i].split('=');

							if (sParameterName[0] === sParam) {
								return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
							}
						}
					};

					function loadbuletin(id) {
						$.ajax({
							url: "https://juanda.jatim.bmkg.go.id/webkantor/data/berita.json",
							dataType: "JSON",
							type: "GET",
							success: function(result) {
								$("#listberita").html("");
								var listberita = [];
								if (id === undefined) {
									$("#tanggal").text(result[0].tanggal);
									$("#judul").text(result[0].judul);
									$("#isi").text(result[0].isi);
									$("#penulis").text(result[0].penulis);
									$("#gambar").attr("src", "https://data.infocuaca.id/webkantor/manage/berita/" + result[0].gambar);
									$("#gambar").attr("alt", result[0].judul);
								}
								for (i = 0; i < result.length; i++) {
									listberita.push('<div class="row margin-bottom-20 berita-terkait"><div class="col-md-8 col-xs-6 sm-margin-bottom-30"><div class="blog-thumb-v4"><img class="img-responsive margin-bottom-10" data-original="https://data.infocuaca.id/webkantor/manage/berita/' + result[i].gambar + '" alt=""  src="https://data.infocuaca.id/webkantor/manage/berita/' + result[i].gambar + '"><h3><a href="berita.php?id=' + result[i].id + '"">' + result[i].judul + '</a></h3></div></div></div>');
									if (result[i].id == id) {
										$("#tanggal").text(result[i].tanggal);
										$("#judul").text(result[i].judul);
										$("#isi").text(result[i].isi);
										$("#penulis").text(result[i].penulis);
										$("#gambar").attr("src", "https://juanda.jatim.bmkg.go.id/webkantor/manage/berita/" + result[i].gambar);
										$("#gambar").attr("alt", result[i].judul);
									}
								}
								$("#listberita").append(listberita.join(''));
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
				<div class="col-md-12">
				    <div class="card p-4 box-shadow">

						<div class="blog-grid margin-bottom-30">
							<h2 id="judul" class="blog-grid-title-lg center">Judul</h2>
							<div class="overflow-h margin-bottom-10">
								<ul class="blog-grid-info pull-left">
									<li id="penulis"><i class="fa fa-pencil"></i>Penulis</li>
									<li id="tanggal"><i class="fa fa-calendar"></i>Tanggal</li>
								</ul>
								<div class="pull-right">
									<div class="addthis_sharing_toolbox"></div>
								</div>
							</div>
							<center><img class="img-responsive" id="gambar" alt="" width="90%"></center>
							<div class="margin-bottom-40"></div>
							<br>
							<p id="isi" class="justify">Isi</p>
							<div class="margin-bottom-30"></div>
							<!--- <p>
								<div class="col-md-3 col-xs-6 md-margin-bottom-30">
									<div class="box-shadow shadow-effect-2 rounded-2x">
									<a href="https://cdn.bmkg.go.id/Web/619A3548.jpg" rel="gallery" class="fancybox img-hover-v1" title="Benar tidak Susunannya?">
											<span><img class="featurette-image img-responsive img-bordered" src="https://cdn.bmkg.go.id/Web/619A3548-250x150.jpg" title="Benar tidak Susunannya?"></span>
									</a>
									</div>
									<div class="margin-bottom-20"></div>
								</div>
							</p> --->
							<div class="margin-bottom-30"></div>
						</div>

				    </div>

					<div class="margin-bottom-30">
						<div class="headline">
							<h4>Berita Lainnya</h4>
						</div>
						<div id="listberita" class="row margin-bottom-20"></div>
					</div>

				</div>

			</div>
		</div>
	</section>

</main>
<?php require('../../layout/footer.php') ?>



<?php
require('../../layout/libraryJs.php');
?>