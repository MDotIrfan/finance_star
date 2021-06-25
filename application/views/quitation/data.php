<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Quitation</h1>
    </div>
    <p class="fs-6">For Last 356 Days</p>


    <!-- Content Row -->
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">

    <a href="<?php echo base_url('quitation/add'); ?>"><button type="button" class="btn btn-success"><i class="fas fa-plus-square" aria-hidden="true"></i>&ensp;New Quitation</button></a>
    </div>
    <!-- /.container-fluid -->
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-borderd table-hover table-striped" id="datatables">
                <thead>
                    <tr>
                        <th scope="col">No. Quitation</th>
                        <th scope="col">Client Name</th>
                        <th scope="col">Project name</th>
                        <th scope="col">Price/Unit</th>
                        <th scope="col">Cost In IDR</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $i=0; 
		foreach($quotation as $q){ 
		?>
                    <tr>
                        <th scope="row"><?php echo $q->no_Quotation; ?></th>
                        <td><?php echo $q->client_Name; ?></td>
                        <td><?php echo $q->project_Name; ?></td>
                        <td><?php echo $q->grand_Total; ?></td>
                        <td id="price<?= $i; ?>"><?php if($q->currency==''){echo $q->grand_Total;}else{echo "<script>calculate(".$q->grand_Total.",'".$q->currency."',".$i.")</script>";} ?></td>
                        <td>
                                <a href="<?php echo base_url('quitation/edit/' . $q->no_Quotation); ?>"><button type="button" class="btn" style="color:blue"><i class="fa fa-edit" aria-hidden="true"></i></button></a>
                                <!-- <a href=""><?php echo anchor('quitation/edit/' . $q->no_Quotation, 'Edit', array('class' => 'btn btn-primary btn-xs')); ?></a> -->
                                <a onclick="return confirm('Yakin ingin hapus?')" href="<?php echo base_url('quitation/delete/' . $q->no_Quotation); ?>"><button type="button" class="btn" style="color:red"><i class="fas fa-trash" aria-hidden="true"></i></button></a>
                                <!-- <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('quitation/delete/' . $q->no_Quotation); ?>" class="hapus btn btn-danger btn-xs">Hapus</a> -->
                                <?php if ($q->is_Acc == "0") {
                                    echo "<a onclick='return confirm('Yakin ingin acc?')' href=" . base_url('quitation/acc/' . $q->no_Quotation) . "><button type='button' class='btn' style='color:orange'><i class='fa fa-times-circle'></i></button></a>";
                                    // echo "<a onclick='return confirm('Yakin ingin acc?')' href=" . base_url('quitation/acc/' . $q->no_Quotation) . " class='hapus btn btn-warning btn-xs'>acc</a>";
                                } else {
                                    echo "<a onclick='return confirm('Yakin ingin batalkan acc?')' href=" . base_url('quitation/unacc/' . $q->no_Quotation) . " ><button type='button' class='btn' style='color:green'><i class='far fa-check-circle'></i></button></a>";
                                    // echo "<a onclick='return confirm('Yakin ingin batalkan acc?')' href=" . base_url('quitation/unacc/' . $q->no_Quotation) . " class='hapus btn btn-success btn-xs'>unacc</a>";
                                } ?>

                                <a href="<?php echo base_url('quitation/print/' . $q->no_Quotation); ?>"><button type="button" class="btn" style="color:black"><i class="fas fa-print" aria-hidden="true"></i></button></a>
                            </td>

                    </tr>
                    <?php 
                    $i++;
                } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->