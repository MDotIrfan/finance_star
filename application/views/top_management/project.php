<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Purchase Order</h1>
    </div>
    <p class="fs-6">For Last 356 Days</p>


    <!-- Content Row -->
    <!-- /.container-fluid -->
    <div class="table-responsive">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3" style="width: auto;">
                <input type="text" id="myInputTextField" class="data-table-search mr-3" placeholder="Filter">
                <a style="margin-right: 20px;" href="#"><button type="button" class="btn btn-success btn-add">Print</button></a>
            </div>
            <table id="table" class="table table-borderless data-table-all" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="data-table-head" scope="col">No. Project</th>
                    <th class="data-table-head"  scope="col">Project</th>
                    <th class="data-table-head"  scope="col">Client Name</th>
                    <th class="data-table-head"  scope="col">Due Date</th>
                    <th class="data-table-head"  scope="col">Budgeted</th>
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
 
            "processing": true, 
            "serverSide": true,
            "searching": false, 
            "info": false,
            "lengthChange": false,
            "order": [],
            "dom": '<"top">rt<"bottom"il><"right"p><"clear">',

             "language": {
      "paginate": {
      "previous": "<",
      "next": ">"
    }
  }, 
             
            "ajax": {
                "url": "<?php echo site_url('top_management/get_data_project/project_data')?>",
                "type": "POST"
            },

            "columns": [
                {
                data: '0', name: 'no_invoice', className: 'data-table-row',
            },  
            {
                data: '1', name: 'project_Name_po', className: 'data-table-row',
            },
            {
                data: '2', name: 'client_Name', className: 'data-table-row',
            },
            {
                data: '3', name: 'due_date', className: 'data-table-row'
            },
            {
                data: '4', name: 'grand_total', className: 'data-table-row'
            },
        ],
 
             
            "columnDefs": [
            { 
                "targets": [ 0 ], 
                "orderable": false, 
            },
            ],
 
        });
 
    });
 
</script>