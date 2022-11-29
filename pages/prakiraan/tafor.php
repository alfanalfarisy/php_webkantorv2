<?php
require('../../layout/header.php');
require('../../layout/navbar.php')
?>



<main id="main">

    <section>
        <div class="container">
            <div class="card p-4 box-shadow">

                <div class="col-12 mb-4">
                    <input type="input" class="form-control" id='searchtafor' placeholder="Cari Tafor">
                </div>
                <div class="col-12">
                    <div id="tafor">

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


<script>
    let searchTafor = (data, input) => {
        result = ''
        data.forEach(item => {

            if (item.includes(input)) {
                result = item
            }
        })
        return result
    }

    $.ajax({
        url: "https://juanda.jatim.bmkg.go.id/webkantor/data/tafor.json",
        dataType: "JSON",
        type: "GET",
        success: function(result) {
            $('#tafor').html(result)
            $('#searchtafor').on('keyup', () => {

                let val = $('#searchtafor').val()
                console.log(searchTafor(result, val))
                $('#tafor').html(searchTafor(result, val))
            })
        }
    })
</script>