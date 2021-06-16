<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">DATA CLIENT</h1>
    </div>
    <p class="fs-6">For Last 356 Days</p>


    <!-- Content Row -->
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">

        <a href="<?php echo base_url('user/add_client'); ?>"><button type="button" class="btn btn-success"><i class="fas fa-plus-square" aria-hidden="true"></i>&ensp;Tambah Client</button></a>
    </div>
    <!-- /.container-fluid -->
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-borderd table-hover table-striped" id="datatables">
                <thead>
                    <tr>
                        <th scope="col">ID Client</th>
                        <th scope="col">Client Name</th>
                        <th scope="col">Client Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($client as $u) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $u->client_id ?></th>
                            <td><?php echo $u->client_name ?></td>
                            <td><?php echo $u->client_email ?></td>
                            <td><?php echo $u->address ?></td>
                            <td>
                                <a href="<?php echo base_url('user/edit_client/' . $u->client_id); ?>"><button type="button" class="btn" style="color:blue"><i class="fa fa-edit" aria-hidden="true"></i></button></a>
                                <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('user/delete_client/' . $u->client_id); ?>"><button type="button" class="btn" style="color:red"><i class="fas fa-trash" aria-hidden="true"></i></button></a>
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