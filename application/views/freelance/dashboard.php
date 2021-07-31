<!-- Begin Page Content -->

<div class="container-fluid">
    <div style="background: #F9FBFD;box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.25);">
        <div>
            <span class="container" style="font-family: Poppins;font-style: normal;font-weight: bold;font-size: 22px;">INVOICE</span>
        </div>

    </div>
    <!-- Page Heading -->

    <span class="container" style="color: black; font-size: 24px;">Invoice</span><br>
    <span class="container" style="color: #9599A6; font-size: 16px;">For Last 356 Days</span>


    <!-- Content Row -->
    <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-end">

        <a href="<?php echo base_url('freelance/print'); ?>"><button type="button" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i> Print</button></a>
    </div> -->
    <!-- /.container-fluid -->
    <div class="col-lg-12">
        <div class="table" style="font-family: Poppins;font-style: normal;font-weight: normal;font-size: 18px;">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end" style="width: auto;">

                <a href="<?php echo base_url('freelance/print'); ?>"><button type="button" class="btn btn-success" style="background: #18C13D;border-radius: 10px;width: auto;"><i class="fa fa-print" aria-hidden="true"></i> Print</button></a>
            </div>
            <table class="table table-borderless" id="datatables" style="color: #687C97;;background: #FFFFFF;">
                <thead>
                    <tr style="background-color: #F9FBFD;">
                        <th style="border-right: 1px solid #EDF2F6;border-bottom: 1px solid #EDF2F6;" scope="col">No. Invoice</th>
                        <th style="border-right: 1px solid #EDF2F6;border-bottom: 1px solid #EDF2F6;" scope="col">Project Name</th>
                        <th style="border-right: 1px solid #EDF2F6;border-bottom: 1px solid #EDF2F6;" scope="col">Invoice Date</th>
                        <th style="border-right: 1px solid #EDF2F6;border-bottom: 1px solid #EDF2F6;" scope="col">Cost in IDR</th>
                        <th style="border-bottom: 1px solid #EDF2F6;" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($inv as $po) {
                    ?>
                        <tr>
                            <td style="border-right: 1px solid #EDF2F6;" scope="row"><?php echo $po->no_invoice; ?></td>
                            <td style="border-right: 1px solid #EDF2F6;"><?php echo $po->jobdesc; ?></td>
                            <td style="border-right: 1px solid #EDF2F6;"><?php echo $po->invoice_date; ?></td>
                            <td style="border-right: 1px solid #EDF2F6;"><?php echo $po->grand_total; ?></td>
                            <td>
                                <a href="<?php if ($po->tipe == 'word') {
                                                echo base_url('freelance/editwordbase/' . $po->no_invoice);
                                            } else {
                                                echo base_url('freelance/edititembase/' . $po->no_invoice);
                                            }  ?>"><button type="button" class="btn" style="color:blue"><i class="fa fa-edit" aria-hidden="true"></i></button></a>
                                <a onclick="return confirm('Yakin ingin hapus?')" href="<?php echo base_url('freelance/delete/' . $po->no_invoice); ?>"><button type="button" class="btn" style="color:red"><i class="fa fa-minus-circle" aria-hidden="true"></i></button></a>
                                <a href="<?php echo base_url('freelance/print/' . $po->no_invoice); ?>"><button type="button" class="btn" style="color:black"><i class="fas fa-print" aria-hidden="true"></i></button></a>
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