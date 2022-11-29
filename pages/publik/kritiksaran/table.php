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
                            <th>idkk</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Subject</th>
                            <th>Kritik/Saran</th>
                            <th>Tanggal</th>

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
                    data: 'idkk'
                }, {
                    data: 'name'
                }, {
                    data: 'email'
                },
                {
                    data: 'phone'
                },
                {
                    data: 'subject'
                }, {
                    data: 'message'
                }, {
                    data: 'tanggal'
                }
            ],
        });
    });
</script>

<?php require('../../../layout/footer.php') ?>
<?php require('../../../layout/libraryJs.php') ?>