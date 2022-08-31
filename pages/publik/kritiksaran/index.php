<?php require('../../../layout/header.php') ?>
<?php require('../../../layout/navbar.php') ?>

<script src='https://www.google.com/recaptcha/api.js'></script>


<main id="main">

    <section>
        <div class="container">
            <div class="card p-4 boc-shadow">



                <div class="heading">
                    <div class="heading_border bg_red"></div>
                    <p>Kritik dan Saran</p>
                    <h2>Kami ingin mendapatkan <span class="color_red">Kritik/Saran dari Anda</span></h2>
                </div>
                <div class="row p-t-40">
                    <form id="contact-form" action="" method="POST" novalidate="novalidate">

                        <div class="col-12 mb-3">
                            <div id="result"></div>
                        </div>

                        <div class="col-12 mb-3">
                            <input class="form-control" type="text" placeholder="Nama Anda" class="keyword-input" required name="name" id="name">
                        </div>
                        <div class="col-12 mb-3">

                            <input class="form-control" type="email" placeholder="Alamat Email" class="keyword-input" required name="email" id="email">

                        </div>
                        <div class="col-12 mb-3">
                            <input class="form-control" type="number" placeholder="No Telp/HP" class="keyword-input" name="phone" id="phone">

                        </div>
                        <div class="col-12 mb-3">
                            <input class="form-control" type="text" placeholder="Subyek/Judul" class="keyword-input" name="subject">
                        </div>
                        <div class="col-12 mb-3">
                            <textarea class="form-control" placeholder="Isi Pesan (Minimal 20 huruf)" name="message" id="message" required="required" min=20 max=1000></textarea>
                        </div>

                        <div class="col-12 mb-3">
                            <button type="submit" class="btn btn-info" id="btn_submit" name="btn_submit">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
</main>


<?php require('../../../layout/footer.php') ?>
<?php require('../../../layout/libraryJs.php') ?>



<script>
    $(document).ready(function(e) {
        $("#contact-form").on('submit', (function(e) {

            e.preventDefault();
            $("#mail-status").hide();
            $('#btn_submit').show();
            $('#loader-icon').show();
            $.ajax({
                url: "/home/pages/publik/kritiksaran/inputhandle.php",
                type: "POST",
                dataType: 'json',
                data: {
                    "name": $('input[name="name"]').val(),
                    "email": $('input[name="email"]').val(),
                    "phone": $('input[name="phone"]').val(),
                    "subject": $('input[name="subject"]').val(),
                    "message": $('textarea[name="message"]').val(),
                    "g-recaptcha-response": $('textarea[id="g-recaptcha-response"]').val()
                },
                success: function(response) {
                    $("#mail-status").show();
                    $('#loader-icon').hide();

                    if (response.type == "error") {
                        alert('Periksa Input Data')
                    } else if (response.type == "message") {
                        alert(response.text)
                    }
                    $("#mail-status").html(response.text);
                },
                error: function(error) {

                }
            });
        }));
    });
</script>