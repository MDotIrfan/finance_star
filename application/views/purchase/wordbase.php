<div class="container-fluid">
    <nav aria-label="breadcrumb" style="width:fit-content">
        <ol class="breadcrumb breadcrumb-dot" style="font-size: 14px;background:transparent;">
            <li class="breadcrumb-item" style="color: #9598A3;">Purchase Order</li>
            <li class="breadcrumb-item active" style="color:#9598A3;">Word Base</li>
            <li class="breadcrumb-item active" aria-current="page" style="color:black;">Add Word Base</li>
        </ol>
    </nav>
    <?php $userdata = $this->session->userdata('user_logged'); ?>
    <form autocomplete=off method="POST" action="<?php echo base_url('purchase/add_po_word'); ?>">
        <div class=" justify-content-start">
            <div class="row ">
                <div class="col">
                    <label for="noquitation">No Purchase Order</label>
                    <input type="hidden" style="background: #E2EFFC;color:black;" class="form-control form-control-user" id="nopo_awal" name="nopo_awal" aria-describedby="" placeholder="" value="<?= $kode_po ?>" readonly>
                    <input type="" style="background: #E2EFFC;color:black;" class="form-control form-control-user" id="nopo" name="nopo" aria-describedby="" placeholder="" value="<?= $kode_po ?>" readonly>
                </div>
                <div class="col">
                    <label for="ps">Resource Name</label>
                    <input style="color:black;" class="form-control form-control-user" id="rn" name="rn" aria-describedby="" placeholder="">
                </div>
                <div class="col">
                    <label for="ps">Mobile Phone</label>
                    <input style="color:black;" class="form-control form-control-user" id="pm" name="pm" aria-describedby="" placeholder="">
                </div>
                <div class="col">
                    <label for="dd">Project Name</label>
                    <input style="color:black;" class="form-control form-control-user" id="pn" name="pn" aria-describedby="" placeholder="" type="text">
                    <input class="form-control form-control-user" id="tipe" name="tipe" aria-describedby="" placeholder="" type="hidden" value="word">
                </div>

            </div>
        </div>
        <br>
        <div class=" justify-content-start">
            <div class="row">
                <div class="col">
                    <label for="cn">PM Name</label>
                    <input type="" style="color:black;" class="form-control form-control-user" id="pmn" name="pmn" aria-describedby="" placeholder="" value="<?php echo $userdata->full_Name; ?>">
                </div>
                <div class="col">
                    <label for="Pm">Resource Email</label>
                    <input type="text" style="color:black;" class="form-control form-control-user" id="ps" name="ps" aria-describedby="" placeholder="">
                </div>
                <div class="col">
                    <label for="Duedate">Date</label>
                    <input type="date" style="color:black;" class="form-control form-control-user" name="date" value="<?php $this->load->helper('date');

                                                                                                               $format = "%Y-%m-%d";
                                                                                                               echo @mdate($format); ?>">
                </div>
                <div class="col">
                    <label for="dd">Type PO</label>
                    <select style="background: #E2EFFC;color:black;" class="custom-select lg mb-3 col-lg" aria-label=".form-select-lg example" id="tipe_Po" name="tipe_Po">
                        <option value="1">Trados</option>
                        <option value="2">Transit, XTM, etc.</option>
                        <option value="3">Patent</option>
                        <option value="4">Google MT</option>
                    </select>

                </div>

            </div>
        </div>
        <br>
        <div class=" justify-content-start" style="margin-bottom: 15px;">
            <div class="row">
                <div class="col">
                    <label for="cn">PM Email</label>
                    <input type="" style="color:black;" class="form-control form-control-user" id="pme" name="pme" aria-describedby="" placeholder="" value="<?php echo $userdata->email_Address; ?>">
                </div>
                <div class="col">
                    <label for="Pm">Resource Status</label>
                    <select style="color:black;" class="custom-select lg mb-3 col-lg" aria-label=".form-select-lg example" id="rs" name="rs">
                        <?php foreach ($position as $p) : ?>
                            <option value="<?php echo $p->status_Name; ?>"> <?php echo $p->status_Name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col">
                    <label for="dd">Rate</label>
                    <input style="color:black;" type="" class="form-control form-control-user" id="rate" name="rate" aria-describedby="" placeholder="" value="0" oninput="hitung()">
                </div>
                <div class="col">
                    <label for="dd">No. Quotation</label>
                    <select style="background: #E2EFFC;color:black;" class="custom-select lg mb-3 col-lg" aria-label=".form-select-lg example" id="status" name="status">
                        <option value="">-</option>
                        <?php foreach ($q as $q) : ?>
                            <option value="<?php echo $q->no_Quotation; ?>"> <?php echo $q->no_Quotation; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

            </div>
            <div class="row">
                <div class="col">
                    <label for="cn">Jumlah Pembayaran</label>
                    <input style="color:black;" type="" class="form-control form-control-user" id="jumlah" name="jumlah" aria-describedby="" placeholder="" value="1" oninput="ubah_no()">
                </div>
                <div class="col">

                </div>
                <div class="col">

                </div>
                <div class="col">

                </div>

            </div>
        </div>
        <div style="border-radius: 10px; color:#000000;font: size 20px;color:#222B45;">
            <div style="border-radius: 10px;">
                <table class="table table-bordered shadow" style="border-radius: 10px;background-color: #FFFFFF;">
                    <thead>
                        <tr style="color:#000000; ">
                            <th>Match Word</th>
                            <th>Word Count</th>
                            <th>Weight</th>
                            <th>
                                <input type="hidden" class="form-control form-control-user" id="curr_awal" name="curr_awal" aria-describedby="" placeholder="" value="IDR">
                                <select style="color: black;" id="curr" name="curr" class="form-control font-weight-bold">
                                    <option style="color: black;" value="IDR" selected="selected">
                                        Weight Word Count IDR
                                    </option>
                                    <option style="color: black;" value="USD">
                                        Weight Word Count USD
                                    </option>
                                    <option style="color: black;" value="EUR">
                                        Weight Word Count EURO
                                    </option>

                                </select>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" style="width:242px; background: #E2EFFC;border: 1px solid #D1E0EE;box-sizing: border-box;color: black;" id="mw1" name="mw1" value="Locked" class="form-control"></td>
                            <td><input type="text" style="width:158px;color: black;" id="wc1" name="wc1" value="" class="form-control" oninput="hitung()"></td>
                            <td><input type="text" style="width:207px;color: black;background: #E2EFFC;border: 1px solid #E2EFFC;box-sizing: border-box;" id="w1" name="w1" value="0" class="form-control"></td>
                            <td><input type="text" style="width:304px;color: black;" id="wwc1" name="wwc1" value="" class="form-control"></td>

                        </tr>
                        <tr>
                            <td><input type="text" style="width:242px;color: black;background: #E2EFFC;border: 1px solid #D1E0EE;box-sizing: border-box;" id="mw2" name="mw2" value="Repetitions" class="form-control"></td>
                            <td><input type="text" style="width:158px;color: black;" id="wc2" name="wc2" value="" class="form-control" oninput="hitung()"></td>
                            <td><input type="text" style="width:207px;color: black;background: #E2EFFC;border: 1px solid #E2EFFC;box-sizing: border-box;" id="w2" name="w2" value="0" class="form-control"></td>
                            <td><input type="text" style="width:304px;color: black;" id="wwc2" name="wwc2" value="" class="form-control"></td>

                        </tr>
                        <tr>
                            <td><input type="text" style="width:242px;color: black;background: #E2EFFC;border: 1px solid #D1E0EE;box-sizing: border-box;" id="mw3" name="mw3" value="Fuzzy 100% / CM" class="form-control"></td>
                            <td><input type="text" style="width:158px;color: black;" id="wc3" name="wc3" value="" class="form-control" oninput="hitung()"></td>
                            <td><input type="text" style="width:207px;color: black;background: #E2EFFC;border: 1px solid #E2EFFC;box-sizing: border-box;" id="w3" name="w3" value="0" class="form-control"></td>
                            <td><input type="text" style="width:304px;color: black;" id="wwc3" name="wwc3" value="" class="form-control"></td>

                        </tr>
                        <tr>
                            <td><input type="text" style="width:242px;color: black;background: #E2EFFC;border: 1px solid #D1E0EE;box-sizing: border-box;" id="mw4" name="mw4" value="Fuzzy 95% - 99%" class="form-control"></td>
                            <td><input type="text" style="width:158px;color: black;" id="wc4" name="wc4" value="" class="form-control" oninput="hitung()"></td>
                            <td><input type="text" style="width:207px;color: black;background: #E2EFFC;border: 1px solid #E2EFFC;box-sizing: border-box;" id="w4" name="w4" value="30" class="form-control"></td>
                            <td><input type="text" style="width:304px;color: black;" id="wwc4" name="wwc4" value="" class="form-control"></td>

                        </tr>
                        <tr>
                            <td><input type="text" style="width:242px;color: black;background: #E2EFFC;border: 1px solid #D1E0EE;box-sizing: border-box;" id="mw5" name="mw5" value="Fuzzy 85% - 94%" class="form-control"></td>
                            <td><input type="text" style="width:158px;color: black;" id="wc5" name="wc5" value="" class="form-control" oninput="hitung()"></td>
                            <td><input type="text" style="width:207px;color: black;background: #E2EFFC;border: 1px solid #E2EFFC;box-sizing: border-box;" id="w5" name="w5" value="50" class="form-control"></td>
                            <td><input type="text" style="width:304px;color: black;" id="wwc5" name="wwc5" value="" class="form-control"></td>

                        </tr>
                        <tr>
                            <td><input type="text" style="width:242px;color: black;background: #E2EFFC;border: 1px solid #D1E0EE;box-sizing: border-box;" id="mw6" name="mw6" value="Fuzzy 75% - 84%" class="form-control"></td>
                            <td><input type="text" style="width:158px;color: black;" id="wc6" name="wc6" value="" class="form-control" oninput="hitung()"></td>
                            <td><input type="text" style="width:207px;color: black;background: #E2EFFC;border: 1px solid #E2EFFC;box-sizing: border-box;" id="w6" name="w6" value="70" class="form-control"></td>
                            <td><input type="text" style="width:304px;color: black;" id="wwc6" name="wwc6" value="" class="form-control"></td>

                        </tr>
                        <tr>
                            <td><input type="text" style="width:242px;color: black;background: #E2EFFC;border: 1px solid #D1E0EE;box-sizing: border-box;" id="mw7" name="mw7" value="Fuzzy 50% - 74%" class="form-control"></td>
                            <td><input type="text" style="width:158px;color: black;" id="wc7" name="wc7" value="" class="form-control" oninput="hitung()"></td>
                            <td><input type="text" style="width:207px;color: black;background: #E2EFFC;border: 1px solid #E2EFFC;box-sizing: border-box;" id="w7" name="w7" value="100" class="form-control"></td>
                            <td><input type="text" style="width:304px;color: black;" id="wwc7" name="wwc7" value="" class="form-control"></td>

                        </tr>
                        <tr>
                            <td><input type="text" style="width:242px;color: black;background: #E2EFFC;border: 1px solid #D1E0EE;box-sizing: border-box;" id="mw8" name="mw8" value="new" class="form-control"></td>
                            <td><input type="text" style="width:158px;color: black;" id="wc8" name="wc8" value="" class="form-control" oninput="hitung()"></td>
                            <td><input type="text" style="width:207px;color: black;background: #E2EFFC;border: 1px solid #E2EFFC;box-sizing: border-box;" id="w8" name="w8" value="100" class="form-control"></td>
                            <td><input type="text" style="width:304px;color: black;" id=" wwc8" name="wwc8" value="" class="form-control"></td>

                        </tr>

                </table>
            </div>
        </div>
        <div style="border-radius: 10px;color:#222B45;">
            <div class="row" style="margin-top: 20px;">
                <div class="col-lg-7" style="margin-right: 80px">
                    <table class="table table-bordered shadow" style="border-radius: 10px;background-color: #FFFFFF;font-size: 18px; color:#222B45;font-weight: normal;">
                        <thead>
                            <tr>
                                <th>Public Notes</th>
                                <th>Regards</th>
                                <th>Footer</th>
                                <th>Address Resource</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td><textarea class="form-control" style="border-color: #FFFFFF;color:black;" name="public_notes"></textarea></td>
                                <td><textarea class="form-control" style="border-color: #FFFFFF;color:black;" name="regards"></textarea></td>
                                <td><textarea class="form-control" style="border-color: #FFFFFF;color:black;" name="footer"></textarea></td>
                                <td><textarea class="form-control" style="border-color: #FFFFFF;color:black;" name="address_resource"></textarea></td>
                            </tr>


                    </table>
                </div>
                <div class="col-lg-4" style="color:#222B45;font: size 18px;">
                    <!-- <div class="text-left font-weight-bold">
                        <hr>
                    </div> -->

                    <div class=" row text-left font-weight-bold" style="margin-top: 30px;">
                        <input type="hidden" id="grand" name="grand" value="" readonly>
                        <div class="col">Grand Total</div>
                        <div class="col" style="text-align: end;" id="grand-text">0</div>

                    </div>
                    <hr>

                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col"></div>
                    <div class="col"><a href="<?php echo base_url('purchase/add_po_word'); ?>"><button type="submit button" class="btn btn-success" style="background: #169122;font-family: Poppins;font-style: normal;font-weight: normal;"><i class="fa fa-print" aria-hidden="true"></i>&emsp;&ensp; Save &emsp;&ensp;</button></a></div>
                    <div class="col"><a href="<?php echo base_url('itembase/sendemail'); ?>"><button type="button" class="btn btn-danger" style="font-family: Poppins;font-style: normal;font-weight: normal;background: #F80909;background: #F80909;"><i class=" fa fa-paper-plane" aria-hidden="true"></i>&ensp; Send Email </button></a></div>
                    <div class="col"></div>

                </div>
            </div>
        </div>
    </form>

    <!-- <script>
        var countries = [];
        <?php
        foreach ($res as $q) {
            echo "countries.push('" . $q->full_Name . "');";
        }
        ?>
    </script> -->