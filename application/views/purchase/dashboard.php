<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row align-items-start" style="margin-bottom: 25px;">
        <div class="col">
            <span style="color: black; font-size: 24px;">Statistic</span><br>
            <span style="color: #9599A6; font-size: 16px;">For Last <?= @$interval->last_update ?> Days</span>
        </div>
    </div>
    <!-- Content Row -->
    <div class="row row-cols-3">

        <!-- Project Card Example -->
        <?php foreach($jumlah as $jumlah) { ?>
        <?php foreach($selisih as $selisih) { ?>
        <div class="col">
            <div class="card call border-left shadow h-100 py-3" style="border-radius: 8px;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text font-weight-bold text-uppercase mb-1" style="color: #C5CEE0;font-family: Poppins;font-style: normal;font-weight: 900;font-size: 13px;line-height: 16px;">
                                <i class="fas fa-shopping-bag"></i> &emsp;
                                Purchase Order
                            </div>
                            <br>
                            <div style="color: #222B45;font-family: Poppins;font-style: normal;font-weight: bold;font-size: 26px;line-height: 24px;"><?= $jumlah->po?></div>
                        </div>
                        <div>
                        <div class="divbox" style="color: #FFFFFF">+ <?php if($selisih->jum_po!=0){echo number_format(( $jumlah->po - $selisih->jum_po) / $selisih->jum_po * 100, 2);}else{echo 0;}?>%</div>
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
                <div class="card-body"><i class="fas fa-shopping-bag"></i>
                    Purchase Order
                    <hr>
                    <div class="card"><canvas id="po" style="height: 306px; width: 1079px;"></canvas></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content Row -->
</div>
<script>
  var total_po = [];
  <?php
    foreach($total_po as $bulan => $total) {
      echo "total_po.push('".$total."');";
    }
  ?>
</script>