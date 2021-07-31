<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row align-items-start" style="margin-bottom: 25px; margin-left: 5px;">
        <div class="col">
            <span style="color: black; font-size: 24px;">Statistic</span><br>
            <span style="color: #9599A6; font-size: 16px;">For Last <?= $interval ?> Days</span>
        </div>

    </div>

    <!-- Content Row -->
    <div class="row row-cols-3" style="margin-bottom: 50px; margin-left: 2px; margin-right: 2px;">

        <?php foreach($jumlah as $jumlah) { ?>
        <?php foreach($selisih as $selisih) { ?>
        <!-- Invoice Card Example -->
        <div class="col">
            <div class="card call border-left shadow h-100 py-3" style="border-radius: 8px;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text font-weight-bold text-uppercase mb-1" style="color: #C5CEE0;font-family: Poppins;font-style: normal;font-weight: 900;font-size: 13px;line-height: 16px;">
                                <i class="fas fa-shopping-bag"></i>&emsp;
                                In House
                            </div>
                            <br>
                            <div class="h5 mb-0 font-weight-bold" style="color: #222B45;font-family: Poppins;font-style: normal;font-weight: bold;font-size: 26px;line-height: 24px;"><?= $jumlah->in_house?></div>
                        </div>
                        <div>
                            <div class="divbox" style="color: #FFFFFF">+ <?= number_format(($jumlah->in_house - $selisih->jum_in_house) / $selisih->jum_in_house * 100, 2)?>%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--BAST Card Example -->
        <div class="col">
            <div class="card border-left shadow h-100 py-3" style="border-radius: 8px;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text font-weight-bold text-uppercase mb-1" style="color: #C5CEE0;font-family: Poppins;font-style: normal;font-weight: 900;font-size: 13px;line-height: 16px;">
                                <i class="fas fa-copy"></i>&emsp;
                                FREELANCE
                            </div>
                            <br>
                            <div class="h5 mb-0 font-weight-bold" style="color: #222B45;font-family: Poppins;font-style: normal;font-weight: bold;font-size: 26px;line-height: 24px;"><?= $jumlah->freelance ?></div>
                        </div>
                        <div>
                            <div class="divbox" style="color: #FFFFFF">+ <?= number_format(($jumlah->freelance - $selisih->jum_freelance) / $selisih->jum_freelance * 100, 2)?>%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Project Card Example -->
        <div class="col">
            <div class="card border-left shadow h-100 py-3" style="border-radius: 8px;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text font-weight-bold text-uppercase mb-1" style="color: #C5CEE0;font-family: Poppins;font-style: normal;font-weight: 900;font-size: 13px;line-height: 16px;">
                                <i class="fas fa-tasks"></i>&emsp;
                                VENDOR
                            </div>
                            <br>
                            <div class="h5 mb-0 font-weight-bold" style="color: #222B45;font-family: Poppins;font-style: normal;font-weight: bold;font-size: 26px;line-height: 24px;"><?= $jumlah->vendor ?></div>
                        </div>
                        <div>
                            <div class="divbox" style="color: #FFFFFF">+ <?= number_format(($jumlah->vendor - $selisih->jum_vendor) / $selisih->jum_vendor * 100, 2)?>%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php } ?>
    </div>
    <div class="col-lg-12">
        <div class="table-responsive">
            <table id="table" class="table table-borderless data-table-all" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="data-table-head" scope="col">ID User</th>
                    <th class="data-table-head"  scope="col">Username</th>
                    <th class="data-table-head"  scope="col">Full Name</th>
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
<!-- Content Row -->
</div>
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
 
    });
 
</script>