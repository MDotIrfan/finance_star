<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="row align-items-start" style="margin-bottom: 25px; margin-left: 5px;">
        <div class="col">
            <span style="color: black; font-size: 24px;">User</span><br>
            <span style="color: #9599A6; font-size: 16px;">For Last <?= @$interval->last_update ?> Days</span>
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
                <a style="margin-right: 20px;" href="<?php echo base_url('user/add'); ?>"><button type="submit button" class="btn btn-success btn-add">New User</button></a>
            </div>
            <table id="table" class="table table-borderless data-table-all" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="data-table-head" scope="col">ID User</th>
                    <th class="data-table-head"  scope="col">Username</th>
                    <th class="data-table-head"  scope="col">Full Name</th>
                    <th class="data-table-head"  scope="col">Position</th>
                    <th class="data-table-head"  scope="col">Status</th>
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
                "url": "<?php echo site_url('user/get_data_user/user')?>",
                "type": "POST"
            },

            "columns": [
            {
                data: '0', name: 'id_User', className: 'data-table-row',
            },
            {
                data: '1', name: 'user_Name', className: 'data-table-row',
            },
            {
                data: '2', name: 'full_Name', className: 'data-table-row'
            },
            {
                data: '3', name: 'position_Name', className: 'data-table-row'
            },
            {
                data: '4', name: 'status_Name', className: 'data-table-row'
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