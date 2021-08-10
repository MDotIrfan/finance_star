<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div style="margin-bottom: 25px;">
        <span style="color: black; font-size: 24px;">Statistic</span><br>
        <span style="color: #9599A6; font-size: 16px;">For Last <?= @$interval->last_update ?> Days</span>

    </div>

    <!-- Content Row -->
    <div class="row row-cols-3">

        <!-- Invoice Card Example -->
        <?php foreach($jumlah_1 as $jumlah) { ?>
        <?php foreach($selisih_1 as $selisih) { ?>
        <div class="col">
            <div class="card call border-left shadow h-100 py-3" style="border-radius: 8px;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text font-weight-bold text-uppercase mb-1" style="color: #C5CEE0;font-family: Poppins;font-style: normal;font-weight: 900;font-size: 13px;line-height: 16px;">
                                <i class="fas fa-tasks"></i></i>&emsp;
                                Invoice
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

        <!-- Invoice Card Example -->
        <?php foreach($jumlah_2 as $jumlah) { ?>
        <?php foreach($selisih_2 as $selisih) { ?>
        <div class="col">
            <div class="card call border-left shadow h-100 py-3" style="border-radius: 8px;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text font-weight-bold text-uppercase mb-1" style="color: #C5CEE0;font-family: Poppins;font-style: normal;font-weight: 900;font-size: 13px;line-height: 16px;">
                                <i class="fas fa-tasks"></i></i>&emsp;
                                BAST
                            </div>
                            <br>
                            <div class="h5 mb-0 font-weight-bold" style="color: #222B45;font-family: Poppins;font-style: normal;font-weight: bold;font-size: 26px;line-height: 24px;"><?= $jumlah->bast?></div>
                        </div>
                        <div>
                            
                        <div class="divbox" style="color: #FFFFFF">+ <?php if($selisih->jum_bast!=0){echo number_format(( $jumlah->bast - $selisih->jum_bast) / $selisih->jum_bast * 100, 2);}else{echo 0;}?>%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php } ?>

        <!-- Project Card Example -->
        <!-- Invoice Card Example -->
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
    </div>
    <br>
    <div>
        <div class="card" style="border-radius: 8px;">
            <div class="card">
                <div class="card-body"><i class="fas fa-tasks"></i>
                    Project
                    <hr>
                    <div class="card"><canvas id="finance" style="height: 306px; width: 1079px;"></canvas></div>
                </div>
            </div>
        </div>

    </div>
    <br>
    <div style="border-radius: 10px; color:#000000;font: size 20px;background:#FFFFFF;;border: 1px solid #EDF2F6;box-sizing: border-box;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);margin-bottom: 10px;padding-bottom:58px;">
        <div style="width: 124.15px;height: 50px;left: 411.04px;top: 741px;font-weight: 600;font-size: 20px;line-height: 33px;color: #8C8A8A;margin-bottom: 10px;margin-top: 10px;">&ensp;List Project</div>
        <div>
        <table id="table" class="table table-borderless data-table-all" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="data-table-head"  scope="col">Project</th>
                    <th class="data-table-head"  scope="col">Client Name</th>
                    <th class="data-table-head"  scope="col">Due Date</th>
                    <th class="data-table-head"  scope="col">Budgeted</th>
                    <th class="data-table-head" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            </table>
        </div>
    </div>



</div>
<!-- Content Row -->
</div>
<script>
  var total_project = [];
  <?php
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
                "url": "<?php echo site_url('finance/get_data_invoiceout/project_dashboard')?>",
                "type": "POST"
            },

            "columns": [  
            {
                data: '3', name: 'project_Name_po', className: 'data-table-row',
            },
            {
                data: '2', name: 'client_Name', className: 'data-table-row',
            },
            {
                data: '6', name: 'due_date', className: 'data-table-row'
            },
            {
                data: '7', name: 'grand_total', className: 'data-table-row'
            },
            {
                data: '8', name: 'action', className: 'data-table-row'
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