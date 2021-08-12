 <div class="container-fluid">
     <div class="row align-items-start">
         <div class="col">
             <ol class=" breadcrumb breadcrumb-dot justify-content-start" style="font-size: 14px;background:transparent">
                 <li class="breadcrumb-item justify-content-start" style="color: #9598A3;">Home</li>
                 <li class="breadcrumb-item justify-content-start" style="color: #9598A3;">Freelance</li>
                 <li class="breadcrumb-item active justify-content-start" aria-current="page" style="color:black;">Edit Freelance</li>
             </ol>
         </div>
     </div>
     <?php echo form_open_multipart('user/edit_client_data', 'class="form-horizontal"'); ?>
     <div class="cola" style="margin-bottom: 30px;">
         <?php foreach ($freelance as $fl) { ?>
             <input type="text" class="form-control form-control-user" id="id" name="id" aria-describedby="" placeholder="" value="<?= $fl->id ?>" hidden>
             <div class=" justify-content-start" style="font-size: 18px; color:#939393;margin-top:30px;margin-left: 30px;margin-right: 30px;">
                 <div class="row">
                     <div class="col">
                         <label for="noquitation">First Name</label>
                         <input type="" style="color:black;background: #FFFFFF;border: 1px solid #B4C9DE;box-sizing: border-box;border-radius: 7px;color:black;" class="form-control form-control-user" id="firstname" name="firstname" aria-describedby="" placeholder="" value="<?= $fl->firstname ?>">
                     </div>
                     <div class=" col">
                         <label for="ps">Last Name</label>
                         <input type="" style="color:black;background: #FFFFFF;border: 1px solid #B4C9DE;box-sizing: border-box;border-radius: 7px;" class="form-control form-control-user" id="lastname" name="lastname" aria-describedby="" placeholder="" value="<?= $fl->lastname ?>">
                     </div>
                 </div>
             </div>
             <div class=" justify-content-start" style="font-size: 18px; color:#939393;margin-left: 30px;margin-right: 30px;">
                 <div class="row">
                     <div class="col">
                         <label for="Pm">Email</label>
                         <input type="" style="color:black;background: #FFFFFF;border: 1px solid #B4C9DE;box-sizing: border-box;border-radius: 7px;" class="form-control form-control-user" id="email" name="email" aria-describedby="" placeholder="" value="<?= $fl->email ?>">
                     </div>
                     <div class="col">
                         <label for="dd">Whatsapp Number</label>
                         <input type="" style="color:black;background: #FFFFFF;border: 1px solid #B4C9DE;box-sizing: border-box;border-radius: 7px;" class="form-control form-control-user" id="wa" name="wa" aria-describedby="" placeholder="" value="<?= $fl->wa ?>">
                     </div>
                 </div>
             </div>
             <div class=" justify-content-start" style="font-size: 18px; color:#939393;margin-left: 30px;margin-right: 30px;">
                 <div class="row">
                     <div class="col">
                         <label for="cn">No. NPWP</label>
                         <input type="" style="color:black;border: 1px solid #B4C9DE;box-sizing: border-box;border-radius: 7px;color:black;" class="form-control form-control-user" id="npwp" name="npwp" aria-describedby="" placeholder="" value="<?= $fl->npwp ?>">
                     </div>
                     <div class="col">
                         <label for="cn">No. Rekening</label>
                         <input type="" style="color:black;background: #FFFFFF;border: 1px solid #B4C9DE;box-sizing: border-box;border-radius: 7px;" class="form-control form-control-user" id="rekening" name="rekening" aria-describedby="" placeholder="" value="<?= $fl->rekening ?>">
                     </div>
                 </div>
             </div>

             <div class=" justify-content-start" style="font-size: 18px; color:#939393;margin-left: 30px;margin-right: 30px;">
                 <div class="row">
                     <div class="col">
                     <label for="dd">Province</label>
                     <select style="border: 1px solid #B4C9DE;box-sizing: border-box;border-radius: 7px;color:black;" class="form-control form-control-user" aria-label=".form-select-lg example" id="province" name="province">
                             <?php foreach ($province as $p) {
                                                $selected = ($p->prov_name == $fl->province) ? "selected" : "";
                                                echo '<option ' . $selected . ' value="' . $p->prov_name . '">' . $p->prov_name . '</option>';
                                            } ?>
                         </select>
                     </div>
                     <div class="col">
                        <script>
                            var city = '<?= $fl->district ?>';
                            var district = '<?= $fl->subdistrict ?>';
                            var postal_code = '<?= $fl->postal_code ?>';
                        </script>
                     <label for="dd">District</label>
                     <select style="border: 1px solid #B4C9DE;box-sizing: border-box;border-radius: 7px;color:black;" class="form-control form-control-user" aria-label=".form-select-lg example" id="district" name="district">
                         <option selected>- Choose District -</option>
                     </select>
                 </div>
                 </div>
             </div>
             <div class=" justify-content-start" style="font-size: 18px; color:#939393;margin-left: 30px;margin-right: 30px;">
                 <div class="row">
                 <div class=" col">
                     <label for="dd">Subdistrict</label>
                     <select style="border: 1px solid #B4C9DE;box-sizing: border-box;border-radius: 7px;color:black;" class="form-control form-control-user" aria-label=".form-select-lg example" id="subdistrict" name="subdistrict">
                         <option selected>- Choose Subistrict -</option>
                     </select>
                 </div>
                 <div class="col">
                     <label for="dd">Postal Code</label>
                     <select style="border: 1px solid #B4C9DE;box-sizing: border-box;border-radius: 7px;color:black;" class="form-control form-control-user" aria-label=".form-select-lg example" id="postal_code" name="postal_code">
                         <option selected>- Choose Postalcode -</option>

                     </select>
                 </div>
                 </div>
             </div>
             <div class="justify-content-start" style="font-size: 18px; color:#939393;margin-left: 30px;margin-right: 30px;">
                 <div class="row">
                     <div class="col">
                         <label for="dd">Address</label>
                         <textarea class="form-control" id="address" name="address" rows="7" style="border-radius: 7px;color:black;margin-bottom:30px;"><?= $fl->address ?></textarea>
                     </div>
                 </div>
             </div>
         <?php } ?>
         <div class="justify-content-start" style="margin-right: 30px;margin-bottom:100px;">
             <button class="btn btn-fl" data-target="#exampleModal" data-toggle="modal" type="button" style="color: #FFFFFF;">SAVE</button>
         </div>
     </div>
 </div>

 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Pesan Konfirmasi</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 Apakah Anda Yakin Ingin Menambah Data Ini?
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 <button type="submit button" class="btn btn-success btn-save">Save</button>
             </div>
         </div>
     </div>
 <!-- MODAL -->

 <!-- Modal -->
 <div class="modal fade" id="emailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Pesan Konfirmasi</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 Apakah Anda Yakin Ingin Mengirim Email dan Menambah Data Ini?
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 <button type="submit button" class="btn btn-danger" style="font-family: Poppins;font-style: normal;font-weight: normal;background: #F80909;background: #F80909;">Send Email</button>
             </div>
         </div>
     </div>
 </div>
 <!-- MODAL -->

 </form>
 <script type="text/javascript">
     var my_var = `<?php $this->load->helper('date');
                    $format = '%Y-%m-%d';
                    echo @mdate($format); ?>`;
     var show = true;

     function showCheckboxes() {
         var checkboxes =
             document.getElementById("checkBoxes");

         if (show) {
             checkboxes.style.display = "block";
             show = false;
         } else {
             checkboxes.style.display = "none";
             show = true;
         }
     }

     function kirim_email() {
         form.attr('action', '<?php echo base_url('finance/add_inv_out/email'); ?>');
         form.attr('target', '');
         console.log(form.attr('action'));
     }

     function submit_data() {
         form.attr('action', '<?php echo base_url('finance/add_inv_out'); ?>');
         form.attr('target', '');
         console.log(form.attr('action'));
     }

     function preview_pdf() {
         form.attr('action', '<?php echo base_url('finance/preview_inv_out'); ?>');
         form.attr('target', '_blank');
         console.log(form.attr('action'));
     }
 </script>