<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <nav style="width: fit-content; border: radius 10px;" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dot" style="font-size: 14px;background:transparent;">
            <li class="breadcrumb-item" style="color: #9598A3;">Purchase Order</li>
            <li class="breadcrumb-item active" aria-current="page" style="color:black;">Word Base</li>
        </ol>
    </nav>
    <span class="container" style="color: #9599A6; font-size: 16px;">For Last <?= $interval ?> Days</span>


    <!-- Content Row -->
    <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <?php echo anchor('purchase/addword', 'New Purchase Order', array('class' => 'btn btn-danger btn-sm')); ?>
    </div> -->

    <!-- /.container-fluid -->
    <div class="col-lg-12">
        <div class="table-responsive">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3" style="width: auto;">
                <input type="text" id="myInputTextField" class="data-table-search mr-3" placeholder="Filter">
                <a style="margin-right: 20px;" href="<?php echo base_url('purchase/addword'); ?>"><button type="submit button" class="btn btn-success btn-add" style="background: #E00000;">New Purchase Order</button></a>
            </div>
            <table id="table" class="table table-borderless data-table-all" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="data-table-head" scope="col">No. PO</th>
                    <th class="data-table-head"  scope="col">Client Name</th>
                    <th class="data-table-head"  scope="col">Project Name</th>
                    <th class="data-table-head"  scope="col">Status</th>
                    <th class="data-table-head"  scope="col">Fee</th>
                    <th class="data-table-head"  scope="col">Action</th>
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
    "lengthMenu": '<select class="data-table-dropdown">'+
      '<option value="10">10</option>'+
      '<option value="20">20</option>'+
      '<option value="30">30</option>'+
      '<option value="40">40</option>'+
      '<option value="50">50</option>'+
      '<option value="-1">All</option>'+
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
                "url": "<?php echo site_url('purchase/get_data_po/purchase_order_word')?>",
                "type": "POST"
            },

            "columns": [
            {
                data: '0', name: 'no_Po', className: 'data-table-row',
            },
            {
                data: '1', name: 'client_Name', className: 'data-table-row',
            },
            {
                data: '2', name: 'po.project_Name', className: 'data-table-row'
            },
            {
                data: '3', name: 'resource_Status', className: 'data-table-row'
            },
            {
                data: '4', name: 'grand_Total_po', className: 'data-table-row'
            },
            {
                data: '5', orderable: false, searchable: false
            },
        ],
 
             
            "columnDefs": [
            { 
                "targets": [ 0 ], 
                "orderable": false, 
            },
            ],
 
        });

        $('#myInputTextField').keyup(function(){
      table.search($(this).val()).draw() ;
})
 
    });
 
</script>