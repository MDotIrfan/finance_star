<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="col">
            <span style="color: black; font-size: 24px;">Statistic</span><br>
            <span style="color: #9599A6; font-size: 16px;">For Last <?= $interval ?> Days</span>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row row-cols-3">

        <!-- Project Card Example -->
        <?php foreach($jumlah_1 as $jumlah) { ?>
        <?php foreach($selisih_1 as $selisih) { ?>
        <div class="col">
            <div class="card call border-left shadow h-100 py-3" style="border-radius: 8px;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text font-weight-bold text-uppercase mb-1" style="color: #C5CEE0;font-family: Poppins;font-style: normal;font-weight: 900;font-size: 13px;line-height: 16px;">
                                <i class="fas fa-tasks"></i></i>&emsp;
                                Project
                            </div>
                            <br>
                            <div class="h5 mb-0 font-weight-bold" style="color: #222B45;font-family: Poppins;font-style: normal;font-weight: bold;font-size: 26px;line-height: 24px;"><?= $jumlah->project?></div>
                        </div>
                        <div>
                        <div class="divbox" style="color: #FFFFFF">+ <?php if($selisih->jum_project!=0){echo number_format(( $jumlah->project - $selisih->jum_project) / $selisih->jum_project * 100, 2);}else{echo 0;}?>%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php } ?>

        <?php foreach($jumlah_3 as $jumlah) { ?>
        <?php foreach($selisih_3 as $selisih) { ?>
        <!-- Total Revenue Card Example -->
        <div class="col">
            <div class="card border-left shadow h-100 py-3" style="border-radius: 8px;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text font-weight-bold text-uppercase mb-1" style="color: #C5CEE0;font-family: Poppins;font-style: normal;font-weight: 900;font-size: 13px;line-height: 16px;">
                                <i class="fas fa-dollar-sign"></i>&emsp;
                                Total Revenue
                            </div>
                            <br>
                            <div class="h5 mb-0 font-weight-bold" style="color: #222B45;font-family: Poppins;font-style: normal;font-weight: bold;font-size: 26px;line-height: 24px;">Rp. <?= $jumlah->revenue?></div>
                        </div>
                        <div>
                        <div class="divbox" style="color: #FFFFFF">+ <?php if($selisih->jum_revenue!=0){echo number_format(( $jumlah->revenue - $selisih->jum_revenue) / $selisih->jum_revenue * 100, 2);}else{echo 0;}?>%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php } ?>

        <?php foreach($jumlah_2 as $jumlah) { ?>
        <?php foreach($selisih_2 as $selisih) { ?>
        <!-- Cost Card Example -->
        <div class="col">
            <div class="card border-left shadow h-100 py-3" style="border-radius: 8px;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text font-weight-bold text-uppercase mb-1" style="color: #C5CEE0;font-family: Poppins;font-style: normal;font-weight: 900;font-size: 13px;line-height: 16px;">
                                <i class="fas fa-dollar-sign"></i>&emsp;
                                Cost
                            </div>
                            <br>
                            <div class="h5 mb-0 font-weight-bold" style="color: #222B45;font-family: Poppins;font-style: normal;font-weight: bold;font-size: 26px;line-height: 24px;">Rp. <?= $jumlah->cost?></div>
                        </div>
                        <div>
                        <div class="divbox" style="color: #FFFFFF">+ <?php if($selisih->jum_cost!=0){echo number_format(( $jumlah->cost - $selisih->cost) / $selisih->jum_cost * 100, 2);}else{echo 0;}?>%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <?php } ?>

    <br>
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col" style="border-radius: 8px;">
            <div class="card">
                <div class="card-body"><i class="fas fa-tasks"></i>
                    Project
                    <hr>
                    <div class="card"><canvas id="project"></canvas></div>
                </div>
            </div>
        </div>
        <div class="col" style="border-radius: 8px;">
            <div class="card">
                <div class="card-body"><i class="far fa-file-alt"></i>
                    Quotation
                    <hr>
                    <div class="card"><canvas id="quotation"></canvas></div>
                </div>
            </div>
        </div>

    </div>
    <div class="row row-cols-1 g-4 mt-3" style="border-radius: 8px;">
            <div class="card">
                <div class="card-body">
                    List Project
                    <hr>
                    <div class="col-lg-12">
        <div class="table-responsive">
            <table id="table" class="table table-borderless data-table-all" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="data-table-head" scope="col">Project</th>
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
            </div>
        </div>


</div>
<!-- Content Row -->
</div>
<script>
  var total_cost = [];
  var total_revenue = [];
  var total_project = [];
  <?php
    foreach($total_cost as $bulan => $total) {
      echo "total_cost.push('".$total."');";
    }
    foreach($total_rev as $bulan => $total) {
        echo "total_revenue.push('".$total."');";
      }
      foreach($total_project as $bulan => $jumlah) {
        echo "total_project.push('".$jumlah."');";
      }
  ?>
</script>
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
                "url": "<?php echo site_url('top_management/get_data_project/project_dashboard')?>",
                "type": "POST"
            },

            "columns": [
            {
                data: '0', name: 'project_Name_po', className: 'data-table-row',
            },
            {
                data: '1', name: 'client_Name', className: 'data-table-row',
            },
            {
                data: '2', name: 'due_date', className: 'data-table-row'
            },
            {
                data: '3', name: 'grand_total', className: 'data-table-row'
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