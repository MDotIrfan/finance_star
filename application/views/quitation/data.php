<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row align-items-start" style="margin-bottom: 25px;">
        <div class="col justify-content-start">
            <ol class=" breadcrumb breadcrumb-dot justify-content-start" style="font-size: 14px;background:transparent">
                <li class="breadcrumb-item justify-content-start" style="color: #9598A3;">Home</li>
                <li class="breadcrumb-item active justify-content-start" aria-current="page" style="color:black;">Quotation</li>
            </ol>
        </div>
        <div class="col-lg-12">
            <span style="color: #9599A6; font-size: 16px;margin-left:15px;">For Last <?= @$interval->last_update ?> Days</span>
        </div>
    </div>

    <!-- Content Row -->

    <!-- /.container-fluid -->
    <div class="col-lg-12">
            <?php 
				if($this->session->flashdata('success') !='')
				{
					echo '<div class="alert alert-success" role="alert">';
					echo $this->session->flashdata('success');
					echo '</div>';
				}
				?>
        <div class="table-responsive">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3" style="width: auto;">
                <input type="text" id="myInputTextField" class="data-table-search mr-3" placeholder="Filter">
                <a style="margin-right: 20px;" href="<?php echo base_url('quitation/add'); ?>"><button type="submit button" class="btn btn-success btn-add" style="background: #E00000;">New Quotation</button></a>
            </div>
            <table id="table" class="table table-borderless data-table-all" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="data-table-head" scope="col">No. Quotation</th>
                    <th class="data-table-head"  scope="col">Client Name</th>
                    <th class="data-table-head"  scope="col">Project Name</th>
                    <th class="data-table-head"  scope="col">Price / Unit</th>
                    <th class="data-table-head"  scope="col">Cost</th>
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
                "url": "<?php echo site_url('quitation/get_data_user/quotation')?>",
                "type": "POST"
            },

            "columns": [
            {
                data: '0', name: 'no_Quotation', className: 'data-table-row',
            },
            {
                data: '1', name: 'client_Name', className: 'data-table-row',
            },
            {
                data: '2', name: 'project_Name', className: 'data-table-row'
            },
            {
                data: '3', name: 'grand_Total', className: 'data-table-row'
            },
            {
                data: '4', name: 'grand_Total', className: 'data-table-row'
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