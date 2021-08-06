<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">DATA CLIENT</h1>
    </div>
    <p class="fs-6">For Last 356 Days</p>


    <!-- Content Row -->
    <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-end">

        <a href="<?php echo base_url('user/add_client'); ?>"><button type="button" class="btn btn-success"><i class="fas fa-plus-square" aria-hidden="true"></i>&ensp;Tambah Client</button></a>
    </div> -->
    <!-- /.container-fluid -->
    <!-- <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-borderd table-hover table-striped" id="datatables">
                <thead>
                    <tr> -->
    <div class="table-responsive">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3" style="width: auto;">
            <input type="text" id="myInputTextField" class="data-table-search mr-3" placeholder="Filter">
            <a style="margin-right: 20px;" href="<?php echo base_url('user/add_client'); ?>"><button type="submit button" class="btn btn-success btn-add">Tambah Client</button></a>
        </div>
        <table id="table" class="table table-borderless data-table-all" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th scope="col">ID Client</th>
                    <th scope="col">Client Name</th>
                    <th scope="col">Client Email</th>
                    <th scope="col">Company Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
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
                "url": "<?php echo site_url('user/get_data_client/client_data') ?>",
                "type": "POST"
            },

            "columns": [{
                    data: '0',
                    name: 'client_id',
                    className: 'data-table-row',
                },
                {
                    data: '1',
                    name: 'client_name',
                    className: 'data-table-row',
                },
                {
                    data: '2',
                    name: 'client_email',
                    className: 'data-table-row'
                },
                {
                    data: '3',
                    name: 'address',
                    className: 'data-table-row'
                },
                {
                    data: '4',
                    name: 'company_name',
                    className: 'data-table-row'
                },
                {
                    data: '5',
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