<style>
    .modal-wrapper {
        width: 500px;
        height: 500px
    }

    @media (max-width: 576px) {
        .modal-wrapper {
            width: 100%;
            height: 100%
        }
    }
</style>

<div class="modal fade" id="wbbmmodal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="card p-4 modal-wrapper">
            <img src="/home/assets/img/modalwbbm.gif" id="" class="m-auto d-block" height="100%">
        </div>
    </div>
</div>

<!-- ======= Activity ======= -->

<script>
    $(document).ready(function() {

        $('#wbbmmodal').modal('show'); // wbbmmodal is the id attribute assigned to the bootstrap modal, then i use 
    })
</script>