<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Invoice In</h1>
    </div>
    <p class="fs-6">For Last 356 Days</p>


    <!-- Content Row -->
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">

        <a href="<?php echo base_url('finance/print'); ?>"><button type="button" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i>&emsp;&ensp;Print&emsp;&ensp;</button></a>
    </div>
    <!-- /.container-fluid -->
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-borderd table-hover table-striped" id="datatables">
            <thead>
                    <tr>
                        <th scope="col">No. Invoice</th>
                        <th scope="col">Project Name</th>
                        <th scope="col">Invoice Date</th>
                        <th scope="col">Cost in IDR</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
		foreach($inv as $po){ 
		?>
                    <tr>
                        <th scope="row"><?php echo $po->no_invoice; ?></th>
                        <td><?php echo $po->jobdesc; ?></td>
                        <td><?php echo $po->invoice_date; ?></td>
                        <td><?php echo $po->grand_total; ?></td>
                        <td>
                        <?php if ($po->is_Acc == "0") {
                                    echo "<a onclick='return confirm('Yakin ingin acc?')' href=" . base_url('finance/acc/' . $po->no_invoice) . "><button type='button' class='btn' style='color:orange'><i class='fa fa-times-circle'></i></button></a>";
                                    // echo "<a onclick='return confirm('Yakin ingin acc?')' href=" . base_url('quitation/acc/' . $q->no_Quotation) . " class='hapus btn btn-warning btn-xs'>acc</a>";
                                } else {
                                    echo "<a onclick='return confirm('Yakin ingin batalkan acc?')' href=" . base_url('finance/unacc/' . $po->no_invoice) . " ><button type='button' class='btn' style='color:green'><i class='far fa-check-circle'></i></button></a>";
                                    // echo "<a onclick='return confirm('Yakin ingin batalkan acc?')' href=" . base_url('quitation/unacc/' . $q->no_Quotation) . " class='hapus btn btn-success btn-xs'>unacc</a>";
                                } ?>
                        </td>
                    </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->