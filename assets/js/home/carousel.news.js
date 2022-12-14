$.ajax({
  url: "https://juanda.jatim.bmkg.go.id/webkantor/data/berita.json",
  type: "GET",
  crossDomain: true,
  dataType: "json",
  success: function (msg) {
    let htmlForNews = "";
    msg.forEach((item) => {
      htmlForNews += `
        
      <article class="postcard light blue">
            <a class="postcard__img_link" href="#">
                <img class="postcard__img" src="https://juanda.jatim.bmkg.go.id/webkantor/manage/berita/${
                  item.gambar.split("/")[0]
                }" alt="Image Title" />
            </a>
            <div class="postcard__text t-dark">
                <h1 class="postcard__title blue"><a href="#">${item.judul.substring(
                  0,
                  75
                )}.....</a></h1>
                <div class="postcard__subtitle small">
                    <time datetime="2020-05-25 12:00:00">
                        <i class="fas fa-calendar-alt mr-2"></i>${item.tanggal}
                    </time>
                </div>
                <div class="postcard__bar"></div>
                <div class="postcard__preview-txt">${item.isi.substring(
                  0,
                  200
                )}....</div>
                <ul class="postcard__tagbox">
                    <li class="tag__item">
                    <a href="https://juanda.jatim.bmkg.go.id/home/pages/beranda/berita.php?id=${
                      item.id
                    }">
                    <i class="fas fa-tag mr-2"></i>Read Full</li>
                    </a>
                </ul>
            </div>
        </article>
        `;
    });
    $("#carouselNews").html(htmlForNews);

    $("#carouselNews").owlCarousel({
      autoplay: true,
      rewind: true /* use rewind if you don't want loop */,
      margin: 20,
      items: 1,
      responsiveClass: true,
      autoHeight: true,
      autoplayTimeout: 7000,
      smartSpeed: 800,
    });
  },
  error: function () {
    alert("Failed!");
  },
});
