<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">DATA RESOURCE</h1>
    </div>
    <p class="fs-6">For Last 356 Days</p>


    <!-- Content Row -->

    <!-- /.container-fluid -->
    <div class="col-lg-12">
        <?php
        if ($this->session->flashdata('success') != '') {
            echo '<div class="alert alert-success" role="alert">';
            echo $this->session->flashdata('success');
            echo '</div>';
        }
        ?>
        <div class="table-responsive">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3" style="width: auto;">
                <input type="text" id="myInputTextField" class="data-table-search mr-3" placeholder="Filter">
                <a style="margin-right: 20px;" href="<?php echo base_url('user/add_resource'); ?>"><button type="submit button" class="btn btn-success btn-add">New User</button></a>
            </div>
            <table id="table" class="table table-borderless data-table-all" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th scope="col">ID Resource</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Mobile Phone</th>
                        <th scope="col">Cabang Bank</th>
                        <th scope="col">No Rekening</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No NPWP</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->
<script type="text/javascript">
    var table;
    $(document).ready(function() {

        //datatables
        table = $('#table').DataTable({
            "language": {
                "lengthMenu": '<select class="data-table-dropdown">' +
                    '<option value="10">10</option>' +
                    '<option value="20">20</option>' +
                    '<option value="30">30</option>' +
                    '<option value="40">40</option>' +
                    '<option value="50">50</option>' +
                    '<option value="-1">All</option>' +
                    '</select> rows',
                "paginate": {
                    "previous": "<",
                    "next": ">"
                }
            },
            "processing": true,
            "serverSide": true,
            "order": [],

            "dom": '<"top">rt<"bottom"il><"right"p><"clear">',

            "ajax": {
                "url": "<?php echo site_url('user/get_data_resource/resource_data') ?>",
                "type": "POST"
            },

            "columns": [{
                    data: '0',
                    name: 'id_resource',
                    className: 'data-table-row',
                },
                {
                    data: '1',
                    name: 'resource_name',
                    className: 'data-table-row',
                },
                {
                    data: '2',
                    name: 'mobile_phone',
                    className: 'data-table-row'
                },
                {
                    data: '3',
                    name: 'cabang_bank',
                    className: 'data-table-row'
                },
                {
                    data: '4',
                    name: 'no_rekening',
                    className: 'data-table-row'
                },
                {
                    data: '5',
                    name: 'address',
                    className: 'data-table-row'
                },
                {
                    data: '6',
                    name: 'no_npwp',
                    className: 'data-table-row'
                },
                {
                    data: '7',
                    name: 'jenis',
                    className: 'data-table-row'
                },
                {
                    data: '8',
                    orderable: false,
                    searchable: false
                },
            ],


            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],

        });

        $('#myInputTextField').keyup(function() {
            table.search($(this).val()).draw();
        })

    });
</script>