<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row align-items-start" style="margin-bottom: 25px;">
        <div class="col">
            <span style="color: black; font-size: 24px;">BAST</span><br>
            <span style="color: #9599A6; font-size: 16px;">For Last 356 Days</span>
        </div>
        <div class="col">
            <ol class=" breadcrumb breadcrumb-dot justify-content-end" style="font-size: 14px;background:transparent">
                <li class="breadcrumb-item justify-content-end" style="color: #9598A3;">Home</li>
                <li class="breadcrumb-item active justify-content-end" aria-current="page" style="color:black;">BAST</li>
            </ol>
        </div>

    </div>

    <!-- Content Row -->
    <!-- /.container-fluid -->
    <!-- <div class="col-lg-12">
        <div class="table" style="font-family: Poppins;font-style: normal;font-weight: normal;font-size: 18px;">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end" style="width: auto;">

                <a href="<?php echo base_url('finance/printbast'); ?>" style="margin-right: 10px;"><button type="button" class="btn btn-success" style="background: #18C13D;border-radius: 10px;width: auto;"><i class="fa fa-print" aria-hidden="true"></i> Print</button></a>
                <a href="<?php echo base_url('finance/addbast'); ?>"><button type="button" class="btn btn-danger"><i class="fa fa-plus" aria-hidden="true" style="background: #E00000;border-radius: 10px;width: auto;"></i> New BAST&ensp;</button></a>
            </div>
            <table class="table table-borderless" id="datatables" style="color: #687C97;;background: #FFFFFF;border: 1px solid #EDF2F6;">
                <thead>
                    <tr style="background-color: #F9FBFD;"> -->
    <div class="table-responsive">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3" style="width: auto;">
            <input type="text" id="myInputTextField" class="data-table-search mr-3" placeholder="Filter">
            <a href="<?php echo base_url('finance/printbast'); ?>" style="margin-right: 10px;"><button type="button" class="btn btn-success" style="background: #18C13D;border-radius: 10px;width: auto;"><i class="fa fa-print" aria-hidden="true"></i> Print</button></a>
            <a href="<?php echo base_url('finance/addbast'); ?>"><button type="button" class="btn btn-danger"><i class="fa fa-plus" aria-hidden="true" style="background: #E00000;border-radius: 10px;width: auto;"></i> New BAST&ensp;</button></a>
        </div>
        <table id="table" class="table table-borderless data-table-all" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th style="border-right: 1px solid #EDF2F6;border-bottom: 1px solid #EDF2F6;" scope="col">No. BAST</th>
                    <th style="border-right: 1px solid #EDF2F6;border-bottom: 1px solid #EDF2F6;" scope="col">Client Name</th>
                    <th style="border-right: 1px solid #EDF2F6;border-bottom: 1px solid #EDF2F6;" scope="col">Item</th>
                    <th style="border-right: 1px solid #EDF2F6;border-bottom: 1px solid #EDF2F6;" scope="col">Quatity</th>
                    <th style="border-bottom: 1px solid #EDF2F6;" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($bast as $po) {
                ?>
                    <tr>
                        <th style="border-right: 1px solid #EDF2F6;" scope="row"><?php echo $po->id_bast; ?></th>
                        <td style="border-right: 1px solid #EDF2F6;"><?php echo $po->pic_client; ?></td>
                        <td style="border-right: 1px solid #EDF2F6;"><?php echo $po->item; ?></td>
                        <td style="border-right: 1px solid #EDF2F6;"><?php echo $po->qty . " " . $po->Unit; ?></td>
                        <td>
                            <a href="<?php echo base_url('finance/editbast/' . $po->id_bast); ?>"><button type="button" class="btn" style="color:blue"><i class="fa fa-edit" aria-hidden="true"></i></button></a>
                            <a onclick="return confirm('Yakin ingin hapus?')" href="<?php echo base_url('finance/delete_bast/' . $po->id_bast); ?>"><button type="button" class="btn" style="color:red"><i class="fa fa-minus-circle" aria-hidden="true"></i></button></a>
                            <a href="<?php echo base_url('finance/printbast/' . $po->id_bast); ?>"><button type="button" class="btn" style="color:black"><i class="fas fa-print" aria-hidden="true"></i></button></a>
                        </td>
                    </tr>
                <?php } ?>
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
                "url": "<?php echo site_url('finance/get_data_bast/bast') ?>",
                "type": "POST"
            },

            "columns": [{
                    data: '0',
                    name: 'id_bast',
                    className: 'data-table-row',
                },
                {
                    data: '1',
                    name: 'pic_client',
                    className: 'data-table-row',
                },
                {
                    data: '2',
                    name: 'item',
                    className: 'data-table-row',
                },
                {
                    data: '3',
                    name: 'qty',
                    className: 'data-table-row'
                },
                {
                    data: '4',
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