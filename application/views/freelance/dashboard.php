<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Invoice In</h1>
    </div>
    <p class="fs-6">For Last 356 Days</p>


    <!-- Content Row -->
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">

        <a href="<?php echo base_url('freelance/print'); ?>"><button type="button" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i> Print</button></a>
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
                    foreach ($inv as $po) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $po->no_invoice; ?></th>
                            <td><?php echo $po->jobdesc; ?></td>
                            <td><?php echo $po->invoice_date; ?></td>
                            <td><?php echo $po->grand_total; ?></td>
                            <td>
                                <a href="<?php if ($po->tipe == 'word') {
                                                echo base_url('freelance/editwordbase/' . $po->no_invoice);
                                            } else {
                                                echo base_url('freelance/edititembase/' . $po->no_invoice);
                                            }  ?>"><button type="button" class="btn" style="color:blue"><i class="fa fa-edit" aria-hidden="true"></i></button></a>
                                <a onclick="return confirm('Yakin ingin hapus?')" href="<?php echo base_url('freelance/delete/' . $po->no_invoice); ?>"><button type="button" class="btn" style="color:red"><i class="fa fa-minus-circle" aria-hidden="true"></i></button></a>
                                <a href="<?php echo base_url('freelance/print/'); ?>"><button type="button" class="btn" style="color:black"><i class="fas fa-print" aria-hidden="true"></i></button></a>
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