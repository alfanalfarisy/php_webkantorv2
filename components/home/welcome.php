    <!-- ======= TITLE ======= -->
    <section id="contents-details" class="contents-details">
      <div class="container">
        <div class="row gy-4">
          <!-- JUDUL -->
          <div class="col-lg-6">
            <div class="title-title">
              <h2>Selamat Datang di <br> BMKG Juanda</h2>
              <h6>Cepat, Tepat, Akurat, Luas, dan Mudah Dipahami</h6>
              <div><a href="https://s.id/infobmkgjuanda" target="_blank"><img src="/bmkgjuanda/assets/img/playstore.png" width="200px" height="200px" alt="playstore" class="img-responsive"></a></div>
            </div>
          </div>
          <!-- VIDEO YOUTUBE -->
          <div class="col-lg-5">
            <!-- <iframe width="100%" height="310px" src="https://www.youtube.com/embed/udOySvTWfpw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
            <div class="card-prakiraan-cuaca">
              <div class="row mb-2" style="padding-left: 10px; padding-right: 10px;">
                <select name="selectKab" id="selectKab" class="form-select form-select-sm col-md dropdown-select-carousel-cuaca" onchange="kabupatenSelected()"></select>
                <select name="selectKec" id="selectKec" class="form-select form-select-sm col-md dropdown-select-carousel-cuaca" onchange="kecamatanSelected()"></select>
                <select name="selectDate" id="selectDate" class="form-select form-select-sm col-md dropdown-select-carousel-cuaca" onchange="dateSelected()"></select>
              </div>
              <div id="prakicuWrapper" class="d-flex justify-content-center">
                <div class="owl-carousel" id="prakicu"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ======= END TITLE ======= -->