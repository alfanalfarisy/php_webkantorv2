<?php
require('../../layout/header.php');
require('../../layout/navbar.php')
?>



<main id="main">

    <section>
        <div class="container">
            <div class="card p-4 box-shadow">
                <div class="speci">

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
        url: "https://juanda.jatim.bmkg.go.id/data/metarspeci.json",
        dataType: "JSON",
        type: "GET",
        success: function(result) {

            $('#speci').html(data)
        }
    })
</script>