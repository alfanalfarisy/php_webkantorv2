<?php
require('../../../layout/header.php');
require('../../../layout/navbar.php')

?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

<section>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Pengaduan WistleBlowing</h4>
            </div>
            <div class="card-body">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Terlapor</th>
                            <th>Lokasi</th>
                            <th>Waktu</th>
                            <th>Uraian</th>
                            <th>Filename</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

    </div>
</section>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            scrollY: 200,
            scrollX: true,
            ajax: 'handle.php',
            columns: [{
                    data: 'id'
                },
                {
                    data: 'nama'
                },
                {
                    data: 'email'
                },
                {
                    data: 'terlapor'
                },
                {
                    data: 'lokasi'
                },
                {
                    data: 'waktu'
                }, {
                    data: 'uraian'
                }, {
                    data: 'filename'
                },
            ],
        });
    });
    $(document).ready(function() {
        var table = $('#example').DataTable();

        $('#example tbody').on('click', 'tr', function() {
            var data = table.row(this).data();
            // alert('You clicked on ' + data[0] + "'s row");
            console.log(data)
            location.href = "https://juanda.jatim.bmkg.go.id/home/fileupload/pengaduan/" + data.filename;

        });
    });
</script>

<?php require('../../../layout/footer.php') ?>
<?php require('../../../layout/libraryJs.php') ?>