<!-- Begin Page Content -->

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row align-items-start" style="margin-bottom: 25px;">
        <div class="col">
            <span style="color: black; font-size: 24px;">Invoice</span><br>
            <span style="color: #9599A6; font-size: 16px;">For Last <?= $interval ?> Days</span>
        </div>
        <div class="col">
            <ol class=" breadcrumb breadcrumb-dot justify-content-end" style="font-size: 14px;background:transparent">
                <li class="breadcrumb-item justify-content-end" style="color: #9598A3;">Dashboard</li>
                <li class="breadcrumb-item active justify-content-end" aria-current="page" style="color:black;">Invoice</li>
            </ol>
        </div>

    </div>

    <?php 
				if($this->session->flashdata('success') !='')
				{
					echo '<div class="alert alert-success" role="alert">';
					echo $this->session->flashdata('success');
					echo '</div>';
				}
				?>

    <!-- Content Row -->
    <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-end">

        <a href="<?php echo base_url('freelance/print'); ?>"><button type="button" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i> Print</button></a>
    </div> -->
    <!-- /.-fluid -->
    <!-- <div class="col-lg-12">
        <div class="table" style="font-family: Poppins;font-style: normal;font-weight: normal;font-size: 18px;">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end" style="width: auto;">

                <a href="<?php echo base_url('freelance/print'); ?>"><button type="button" class="btn btn-success" style="background: #18C13D;border-radius: 10px;width: auto;"><i class="fa fa-print" aria-hidden="true"></i> Print</button></a>
            </div>
            <table class="table table-borderless" id="table" style="color: #687C97;;background: #FFFFFF;">
                <thead>
                    <tr style="background-color: #F9FBFD;"> -->
    <div class="table-responsive">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3" style="width: auto;">
            <input type="text" id="myInputTextField" class="data-table-search mr-3" placeholder="Filter">
            <a style="margin-right: 20px;" href="<?php echo base_url('freelance/print'); ?>"><button type="submit button" class="btn btn-success btn-add">Print</button></a>
        </div>
        <table id="table" class="table table-borderless data-table-all" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th style="border-right: 1px solid #EDF2F6;border-bottom: 1px solid #EDF2F6;" scope="col">No. Invoice</th>
                    <th style="border-right: 1px solid #EDF2F6;border-bottom: 1px solid #EDF2F6;" scope="col">Project Name</th>
                    <th style="border-right: 1px solid #EDF2F6;border-bottom: 1px solid #EDF2F6;" scope="col">Invoice Date</th>
                    <th style="border-right: 1px solid #EDF2F6;border-bottom: 1px solid #EDF2F6;" scope="col">Cost in IDR</th>
                    <th style="border-bottom: 1px solid #EDF2F6;" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- <?php
                        foreach ($inv as $po) {
                        ?>
                        <tr>
                            <td style="border-right: 1px solid #EDF2F6;" scope="row"><?php echo $po->no_invoice; ?></td>
                            <td style="border-right: 1px solid #EDF2F6;"><?php echo $po->jobdesc; ?></td>
                            <td style="border-right: 1px solid #EDF2F6;"><?php echo $po->invoice_date; ?></td>
                            <td style="border-right: 1px solid #EDF2F6;"><?php echo $po->grand_total; ?></td>
                            <td>
                                <a href="<?php if ($po->tipe == 'word') {
                                                echo base_url('freelance/editwordbase/' . $po->no_invoice);
                                            } else {
                                                echo base_url('freelance/edititembase/' . $po->no_invoice);
                                            }  ?>"><button type="button" class="btn" style="color:blue"><i class="fa fa-edit" aria-hidden="true"></i></button></a>
                                <a onclick="return confirm('Yakin ingin hapus?')" href="<?php echo base_url('freelance/delete/' . $po->no_invoice); ?>"><button type="button" class="btn" style="color:red"><i class="fa fa-minus-circle" aria-hidden="true"></i></button></a>
                                <a href="<?php echo base_url('freelance/print/' . $po->no_invoice); ?>"><button type="button" class="btn" style="color:black"><i class="fas fa-print" aria-hidden="true"></i></button></a>
                            </td>
                        </tr>
                    <?php } ?> -->

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
                "url": "<?php echo site_url('freelance/get_data_invoicein/invoice_in') ?>",
                "type": "POST"
            },

            "columns": [{
                    data: '0',
                    name: 'no_invoice',
                    className: 'data-table-row',
                },
                {
                    data: '1',
                    name: 'jobdesc',
                    className: 'data-table-row',
                },
                {
                    data: '2',
                    name: 'invoice_date',
                    className: 'data-table-row'
                },
                {
                    data: '3',
                    name: 'grand_total',
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