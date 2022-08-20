<?php
require('../../layout/header.php');
require('../../layout/navbar.php')
?>



<main id="main">
    <section id="" class="">
        <div class="container">
            <div class="card p-4 box-shadow" >
                <h2 class="text-center">Survei Kepuasan Masyarakat dan Survei Persepsi Korupsi</h2>
                <div>
                    <iframe src="https://forms.zohopublic.com/bmkg59/form/IKMBMKGJuanda/formperma/jlnqzE4o8vc98rVyJEE8ZR7VfxDtSK9o9lLWojKPx_8" title="SURVEY IKM" height="1500px" width="100%" style="border:none; overflow: hidden; "></iframe>

                </div>

            </div>

    </section>

</main>
<?php require('../../layout/footer.php') ?>



<?php
require('../../layout/libraryJs.php');
?>

<script type="application/javascript">
    function resizeIFrameToFitContent(iFrame) {

        iFrame.width = iFrame.contentWindow.document.body.scrollWidth;
        iFrame.height = iFrame.contentWindow.document.body.scrollHeight;
    }

    window.addEventListener('DOMContentLoaded', function(e) {

        var iFrame = document.getElementById('iFrame1');
        resizeIFrameToFitContent(iFrame);

        // or, to resize all iframes:
        var iframes = document.querySelectorAll("iframe");
        for (var i = 0; i < iframes.length; i++) {
            resizeIFrameToFitContent(iframes[i]);
        }
    });
</script>