                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Report</h1>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">


                        <a>&emsp; </a>
                    </div>

                    <!-- Start Grafik Garis Penjualan -->
                    <div class="card mb-4">
                        <div class="card-header font-weight-bold"><i></i> COST
                            <div class="card-body"><canvas id="myAreaChart"></canvas></div>
                            <div class="card-footer small text-muted"></div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header font-weight-bold"></i> REVENUE
                                <div class="card-body"><canvas id="myGarisChart"></canvas></div>
                                <div class="card-footer small text-muted"></div>
                            </div>

                        </div>

<script>
  var total_cost = [];
  var total_rev = [];
  <?php
    foreach($total_cost as $bulan => $total) {
      echo "total_cost.push('".$total."');";
    }
    foreach($total_rev as $bulan => $total) {
        echo "total_rev.push('".$total."');";
      }
  ?>
</script>