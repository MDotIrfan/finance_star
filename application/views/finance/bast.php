<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">BAST</h1>
    </div>
    <p class="fs-6">For Last 356 Days</p>


    <!-- Content Row -->
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">

        <a href="<?php echo base_url(''); ?>"><button type="button" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i>&emsp;&ensp;Print&emsp;&ensp;</button></a>
        <a>&emsp; </a>
        <a href="<?php echo base_url('finance/addbast'); ?>"><button type="button" class="btn btn-danger"><i class="fa fa-plus" aria-hidden="true"></i> New BAST&ensp;</button></a>
    </div>
    <!-- /.container-fluid -->
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-borderd table-hover table-striped" id="datatables">
                <thead>
                    <tr>
                        <th scope="col">No. BAST</th>
                        <th scope="col">Client Name</th>
                        <th scope="col">Item</th>
                        <th scope="col">Quatity</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->