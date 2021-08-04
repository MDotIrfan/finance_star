<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div style="margin-bottom: 25px;">
        <div class="card" style="border-radius: 8px;">
            <div class="card">
                <div class="card-body"><i class="fas fa-dollar-sign"></i>
                    Revenue
                    <hr>
                    <div class="card"><canvas id="revenue" style="height: 306px; width: 1079px;"></canvas></div>
                </div>
            </div>
        </div>

    </div>
    <div>
        <div class="card" style="border-radius: 8px;">
            <div class="card">
                <div class="card-body"><i class="fas fa-dollar-sign"></i>
                    Cost
                    <hr>
                    <div class="card"><canvas id="cost" style="height: 306px; width: 1079px;"></canvas></div>
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
  <?php
    foreach($total_cost as $bulan => $total) {
      echo "total_cost.push('".$total."');";
    }
    foreach($total_rev as $bulan => $total) {
        echo "total_revenue.push('".$total."');";
      }
  ?>
</script>