<?php
require('../../layout/header.php');
require('../../layout/navbar.php')
?>



<main id="main">

    <section>
        <div class="container">
            <div class="card p-4 box-shadow">
                <div id="tafor">

                </div>
            </div>
        </div>
    </section>


</main>
<?php require('../../layout/footer.php') ?>



<?php

require('../../layout/libraryJs.php');

?>


<script>
    $.ajax({
        url: "https://juanda.jatim.bmkg.go.id/webkantor/data/tafor.json",
        dataType: "JSON",
        type: "GET",
        success: function(result) {
            $('#tafor').html(result)
        }
    })
</script>