<?php
require('../../layout/header.php');
require('../../layout/navbar.php')

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
                            <th>Code</th>
                            <th>Nama</th>
                            <th>Instansi</th>
                            <th>Jabatan</th>
                            <th>Alamat</th>
                            <th>No Telp</th>
                            <th>Email</th>
                            <th>Informasi</th>
                            <th>Tanggal</th>
                            <th>Lokasi</th>
                            <th>Surat</th>
                            <th>Pengantar</th>

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
            ajax: 'data_pemohon.php',
            columns: [{
                    data: 'KODE_GOLONGAN'
                },
                {
                    data: 'NAMA_PEMOHON'
                },
                {
                    data: 'INSTANSI'
                },
                {
                    data: 'JABATAN'
                },
                {
                    data: 'ALAMAT'
                },
                {
                    data: 'NO_TELP'
                }, {
                    data: 'EMAIL'
                }, {
                    data: 'INFORMASI'
                }, {
                    data: 'TANGGAL'
                }, {
                    data: 'LOKASI'
                }, {
                    data: 'SURAT_PENGANTAR'
                }, {
                    data: 'PROPOSAL'
                }
            ],
        });
    });
</script>

<?php require('../../layout/footer.php') ?>
<?php require('../../layout/libraryJs.php') ?>