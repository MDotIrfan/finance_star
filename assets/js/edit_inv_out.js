$(document).ready(function (e) {
    var tipe_inv = $('#tipe').val()
    if (jum_table < 1) {
        if (tipe_inv == '1') {
            addTable_luar();
            append_item();
        } else if (tipe_inv == '2') {
            addTable_local();
            append_item();
        } else if (tipe_inv == '3') {
            addTable_spq();
            append_item();
        } else if (tipe_inv == '4') {
            addTable_luar2();
            append_item();
        } else if (tipe_inv == '5') {
            addTable_spq2();
            append_item();
        }
    }
});


$(document).on('click', "#dynamic-ar", function (e) {
    addRow();
});

$(document).on('click', "#dynamic-ar-local", function (e) {
    addRow_local();
});

$(document).on('click', "#dynamic-ar-luar", function (e) {
    addRow_luar();
});

$(document).on('click', "#dynamic-ar-spq", function (e) {
    addRow_spq();
});

$(document).on('click', "#dynamic-ar-luar2", function (e) {
    addRow_luar2();
});

$(document).on('click', "#dynamic-ar-spq2", function (e) {
    addRow_spq2();
});

$(document).on('click', '.remove-input-field', function () {
    if (jum_table > 1) {
        $(this).parents('tr').remove();
        var row_id = $(this).attr("id");
        console.log(row_id);
        jum_table--;
        delete cost[row_id];
        tampil();
    }
});

$(document).on('click', '.remove-input-field2', function () {
    if (jum_table > 1) {
        $(this).parents('tr').remove();
        var row_id = $(this).attr("id");
        console.log(row_id);
        jum_table--;
        delete price[row_id];
        tampil2();
    }
});

dinamisTable = $('#dinamisTable')
dinamisRow = $('#dinamisRow')
dinamisOption = $('#nopo')
var jum_table = 0;
var a = 0;
var volume = [];
var price = [];
var cost = [];
var index = 0;
var temp_grand = 0;

function addTable_local(jsonData = null) {
    console.log(jsonData);
    if (jsonData) jsonData = JSON.parse(atob(jsonData));
    else jsonData = {};

    let table = `
  <thead>
                  <tr style="color:#000000;font: size 20px;">
                      <th>Job Description</th>
                      <th>Volume</th>
                      <th>Unit</th>
                      <th>Unit Price IDR</th>
                      <th>
                      <input type="hidden" class="form-control form-control-user" id="curr_awal" name="curr_awal" aria-describedby="" placeholder="" value="${jsonData?.currency_inv ? jsonData.currency_inv : 'IDR'}">
                      <select id='curr' style="color:#000000;font: size 20px;" name="statusSelect" id="statusSelect" class="form-control font-weight-bold" style="color:#000000;">
                        <option value='IDR' ${jsonData?.currency_inv == 'IDR' ? 'Selected' : ''}>Amount IDR</option>
                        <option value='USD' ${jsonData?.currency_inv == 'USD' ? 'Selected' : ''}>Amount USD</option>
                        <option value='EUR' ${jsonData?.currency_inv == 'EUR' ? 'Selected' : ''}>Amount EURO</option>
                        </select>
                      </th>
                  </tr>
              </thead>
              <tbody id="dinamisRow">
                    <script>
                    dinamisRow = $('#dinamisRow');
                    if(jum_table<1){
                        addRow_local(item_list[i]);
                              }</script>
              </tbody>
  `
    dinamisTable.append(table)
}

function addRow_local(jsonData = null) {
    if (jsonData) jsonData = JSON.parse(atob(jsonData));
    else jsonData = {};

    let tr = `
    <tr>
    <td><input type="text" class="form-control" style="color:#000000;" id="jobdesc" name="jobdesc[]" value="${jsonData?.domain ? jsonData.domain : ''}"></td>
    <td><input type="text" style="color:#000000;" class="form-control volume${index}" name="volume[]" value="${jsonData?.volume ? jsonData.volume : ''}" oninput="hitung(${index})" id=""></td>
    <td><select style="color:#000000;" class="custom-select lg mb-3 col-lg" aria-label=".form-select-lg example" id="unit" name="unit[]">
                   
       <option value="Hours" ${jsonData?.unit == 'Hours' ? 'Selected' : ''}>Hours</option>
       <option value="Days" ${jsonData?.unit == 'Days' ? 'Selected' : ''}>Days</option>
       <option value="Months" ${jsonData?.unit == 'Months' ? 'Selected' : ''}>Months</option>
       <option value="Years" ${jsonData?.unit == 'Years' ? 'Selected' : ''}>Years</option>
       <option value="Unit" ${jsonData?.unit == 'Unit' ? 'Selected' : ''}>Unit</option>
    
               </select></td>
    <td><input type="text" style="color:#000000;" class="form-control price${index}" name="price[]" oninput="hitung(${index})" value="${jsonData?.price ? jsonData.price : ''}" ></td>
    <td><input type="text" style="color:#000000;" class="form-control cost${index}" name="cost[]" value="${jsonData?.amount ? jsonData.amount : ''}" readonly></td>
    <td>
      <a href="javascript:void(0)" id="dynamic-ar-local">
      <i class="fa fa-plus-circle" style="color:green"></i></a>
    </td>
    <td><a href="javascript:void(0)" class="remove-input-field" id="${index}"><i class="fa fa-minus-circle" style="color:red"></i></a></td>
    </tr>
    `
    dinamisRow.append(tr)
    hitung(index)
    index++;
    jum_table++;
}

function addTable_luar(jsonData = null) {
    console.log(jsonData);
    if (jsonData) jsonData = JSON.parse(atob(jsonData));
    else jsonData = {};

    let table = `
      <thead>
                      <tr style="color:#000000;font: size 20px;">
                          <th>Job Description</th>
                          <th>Project Manager</th>
                          <th>STAR Number</th>
                          <th>Number Word / page</th>
                          <th>Unit Price / Word</th>
                          <th>
                          <input type="hidden" class="form-control form-control-user" id="curr_awal" name="curr_awal" aria-describedby="" placeholder="" value="${jsonData?.currency_inv ? jsonData.currency_inv : 'IDR'}">
                      <select id='curr' style="color:#000000;font: size 20px;" name="statusSelect" id="statusSelect" class="form-control font-weight-bold" style="color:#000000;">
                        <option value='IDR' ${jsonData?.currency_inv == 'IDR' ? 'Selected' : ''}>Amount IDR</option>
                        <option value='USD' ${jsonData?.currency_inv == 'USD' ? 'Selected' : ''}>Amount USD</option>
                        <option value='EUR' ${jsonData?.currency_inv == 'EUR' ? 'Selected' : ''}>Amount EURO</option>
                        </select>
                          </th>
                      </tr>
                  </thead>
                  <tbody id="dinamisRow">
                        <script>
                        dinamisRow = $('#dinamisRow');
                        if(jum_table<1){
                            addRow_luar(item_list[i]);
                                  }</script>
                  </tbody>
      `
    dinamisTable.append(table)
}

function addRow_luar(jsonData = null) {
    if (jsonData) jsonData = JSON.parse(atob(jsonData));
    else jsonData = {};

    let tr = `
        <tr>
<td><input type="text" class="form-control" style="color:#000000;" id="jobdesc" name="jobdesc[]" value="${jsonData?.jobdesc ? jsonData.jobdesc : ''}" ></td>
<td><input type="text" class="form-control" style="color:#000000;" id="proman" name="proman[]" value="${jsonData?.project_manager ? jsonData.project_manager : ''}" ></td>
<td><input type="text" class="form-control" style="color:#000000;" id="starnum" name="starnum[]" value="${jsonData?.star_number ? jsonData.star_number : ''}" > ></td>
<td><input type="text" style="color:#000000;" class="form-control volume${index}" name="volume[]" value="${jsonData?.number_word ? jsonData.number_word : ''}" oninput="hitung(${index})" id=""></td>
<td><input type="text" style="color:#000000;" class="price${index}" name="price[]" oninput="hitung(${index})" value="${jsonData?.unit_price ? jsonData.unit_price : ''}"></td>
<td><input type="text" style="color:#000000;" class="cost${index}" name="cost[]" value="${jsonData?.amount ? jsonData.amount : ''}" readonly></td>
<td>
<a href="javascript:void(0)" id="dynamic-ar-luar">
<i class="fa fa-plus-circle" style="color:green"></i></a>
</td>
<td><a href="javascript:void(0)" class="remove-input-field" id="${index}"><i class="fa fa-minus-circle" style="color:red"></i></a></td>
</tr>
        `
    dinamisRow.append(tr)
    hitung(index)
    index++;
    jum_table++;
}

function addTable_spq(jsonData = null) {
    console.log(jsonData);
    if (jsonData) jsonData = JSON.parse(atob(jsonData));
    else jsonData = {};

    let table = `
        <thead>
                        <tr  style="color:#000000;font: size 20px;">
                            <th>Job Description</th>
                            <th>Qtt Words</th>
                            <th>Unit Price IDR</th>
                            <th>
                            <input type="hidden" class="form-control form-control-user" id="curr_awal" name="curr_awal" aria-describedby="" placeholder="" value="${jsonData?.currency_inv ? jsonData.currency_inv : 'IDR'}">
                      <select id='curr' style="color:#000000;font: size 20px;" name="statusSelect" id="statusSelect" class="form-control font-weight-bold" style="color:#000000;">
                        <option value='IDR' ${jsonData?.currency_inv == 'IDR' ? 'Selected' : ''}>Amount IDR</option>
                        <option value='USD' ${jsonData?.currency_inv == 'USD' ? 'Selected' : ''}>Amount USD</option>
                        <option value='EUR' ${jsonData?.currency_inv == 'EUR' ? 'Selected' : ''}>Amount EURO</option>
                        </select>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="dinamisRow">
                          <script>
                          dinamisRow = $('#dinamisRow');
                          if(jum_table<1){
                              addRow_spq(item_list[i]);
                                    }</script>
                    </tbody>
        `
    dinamisTable.append(table)
}

function addRow_spq(jsonData = null) {
    if (jsonData) jsonData = JSON.parse(atob(jsonData));
    else jsonData = {};

    let tr = `
          <tr>
  <td><input type="text" class="form-control" style="color:#000000;" id="jobdesc" name="jobdesc[]" value="${jsonData?.jobdesc ? jsonData.jobdesc : ''}" ></td>
  <td><input type="text" style="color:#000000;" class="form-control volume${index}" name="volume[]" value="${jsonData?.qtt_word ? jsonData.qtt_word : ''}" oninput="hitung(${index})" id=""></td>
  <td><input type="text style="color:#000000;"" class="form-control price${index}" name="price[]" oninput="hitung(${index})" value="${jsonData?.price ? jsonData.price : ''}"></td>
  <td><input type="text" style="color:#000000;" class="form-control cost${index}" name="cost[]" value="${jsonData?.grand_Total ? jsonData.amount : ''}" readonly></td>
  <td>
  <a href="javascript:void(0)" id="dynamic-ar-spq">
  <i class="fa fa-plus-circle" style="color:green"></i></a>
  </td>
  <td><a href="javascript:void(0)" class="remove-input-field" id="${index}"><i class="fa fa-minus-circle" style="color:red"></i></a></td>
  </tr>
          `
    dinamisRow.append(tr)
    hitung(index)
    index++;
    jum_table++;
}

function addTable_luar2(jsonData = null) {
    console.log(jsonData);
    if (jsonData) jsonData = JSON.parse(atob(jsonData));
    else jsonData = {};

    let table = `
  <thead>
                  <tr style="color:#000000;font: size 20px;">
                      <th>Job Description</th>
                      <th>Star Number</th>
                      <th>Number Line</th>
                      <th>
                      <input type="hidden" class="form-control form-control-user" id="curr_awal" name="curr_awal" aria-describedby="" placeholder="" value="${jsonData?.currency_inv ? jsonData.currency_inv : 'IDR'}">
                      <select id='curr' style="color:#000000;font: size 20px;" name="statusSelect" id="statusSelect" class="form-control font-weight-bold" style="color:#000000;">
                        <option value='IDR' ${jsonData?.currency_inv == 'IDR' ? 'Selected' : ''}>Amount IDR</option>
                        <option value='USD' ${jsonData?.currency_inv == 'USD' ? 'Selected' : ''}>Amount USD</option>
                        <option value='EUR' ${jsonData?.currency_inv == 'EUR' ? 'Selected' : ''}>Amount EURO</option>
                        </select>
                      </th>
                  </tr>
              </thead>
              <tbody id="dinamisRow">
                    <script>
                    dinamisRow = $('#dinamisRow');
                    if(jum_table<1){
                        addRow_luar2(item_list[i]);
                              }</script>
              </tbody>
  `
    dinamisTable.append(table)
}

function addRow_luar2(jsonData = null) {
    if (jsonData) jsonData = JSON.parse(atob(jsonData));
    else jsonData = {};

    let tr = `
    <tr>
    <td><input type="text" class="form-control" style="color:#000000;" id="jobdesc" name="jobdesc[]" value="${jsonData?.jobdesc ? jsonData.jobdesc : ''}"></td>
    <td><input type="text" style="color:#000000;" class="form-control volume${index}" name="volume[]" value="${jsonData?.star_number ? jsonData.star_number : ''}" oninput="hitung(${index})" id=""></td>
    <td><select style="color:#000000;" class="custom-select lg mb-3 col-lg" aria-label=".form-select-lg example" id="unit" name="unit[]">
                   
       <option value="Hours" ${jsonData?.number_line == 'Hours' ? 'Selected' : ''}>Hours</option>
       <option value="Days" ${jsonData?.number_line == 'Days' ? 'Selected' : ''}>Days</option>
       <option value="Months" ${jsonData?.number_line == 'Months' ? 'Selected' : ''}>Months</option>
       <option value="Years" ${jsonData?.number_line == 'Years' ? 'Selected' : ''}>Years</option>
       <option value="Unit" ${jsonData?.number_line == 'Unit' ? 'Selected' : ''}>Unit</option>
    
               </select></td>
    <td><input type="text" class="price${index}" name="price[]" oninput="hitung(${index})" value="${jsonData?.amount ? jsonData.amount : ''}" >
    </td>
    <td>
      <a href="javascript:void(0)" id="dynamic-ar-luar2">
      <i class="fa fa-plus-circle" style="color:green"></i></a>
    </td>
    <td><a href="javascript:void(0)" class="remove-input-field" id="${index}"><i class="fa fa-minus-circle" style="color:red"></i></a></td>
    </tr>
    `
    dinamisRow.append(tr)
    hitung(index)
    index++;
    jum_table++;
}

function addTable_spq2(jsonData = null) {
    console.log(jsonData);
    if (jsonData) jsonData = JSON.parse(atob(jsonData));
    else jsonData = {};

    let table = `
  <thead>
                  <tr style="color:#000000;font: size 20px;">
                      <th>Pre-invoice number</th>
                      <th>Date of Delivery</th>
                      <th>
                      <input type="hidden" class="form-control form-control-user" id="curr_awal" name="curr_awal" aria-describedby="" placeholder="" value="${jsonData?.currency_inv ? jsonData.currency_inv : 'IDR'}">
                      <select id='curr' style="color:#000000;font: size 20px;" name="statusSelect" id="statusSelect" class="form-control font-weight-bold" style="color:#000000;">
                        <option value='IDR' ${jsonData?.currency_inv == 'IDR' ? 'Selected' : ''}>Amount IDR</option>
                        <option value='USD' ${jsonData?.currency_inv == 'USD' ? 'Selected' : ''}>Amount USD</option>
                        <option value='EUR' ${jsonData?.currency_inv == 'EUR' ? 'Selected' : ''}>Amount EURO</option>
                        </select>
                      </th>
                  </tr>
              </thead>
              <tbody id="dinamisRow">
                    <script>
                    dinamisRow = $('#dinamisRow');
                    if(jum_table<1){
                        addRow_spq2(item_list[i]);
                              }</script>
              </tbody>
  `
    dinamisTable.append(table)
}

function addRow_spq2(jsonData = null) {
    if (jsonData) jsonData = JSON.parse(atob(jsonData));
    else jsonData = {};

    let tr = `
    <tr>
    <td><input type="text" class="form-control" style="color:#000000;" id="jobdesc" name="jobdesc[]" value="${jsonData?.pre_invoice ? jsonData.pre_invoice : ''}"></td>
    <td><input type="date" style="color:#000000;" class="form-control form-control-user" name="deliv[]" value="${jsonData?.date_deliv ? jsonData.date_deliv : ''}"></td>
    <td><input type="text"  style="color:#000000;" class="form-control price${index}" name="price[]" oninput="hitung2(${index})" value="${jsonData?.amount ? jsonData.amount : ''}" >
    </td>
    <td>
      <a href="javascript:void(0)" id="dynamic-ar-spq2">
      <i class="fa fa-plus-circle" style="color:green"></i></a>
    </td>
    <td><a href="javascript:void(0)" class="remove-input-field2" id="${index}"><i class="fa fa-minus-circle" style="color:red"></i></a></td>
    </tr>
    `
    dinamisRow.append(tr)
    hitung2(index)
    index++;
    jum_table++;
}

function hitung(a) {
    console.log(a);
    volume[a] = $(".volume" + a).val();
    price[a] = $(".price" + a).val();
    cost[a] = volume[a] * price[a];
    tampil()
    $(".cost" + a).val(cost[a]);
}

function hitung2(a) {
    console.log(a);
    price[a] = $(".price" + a).val();
    tampil2()
}

function tampil() {
    var kurensi = $('#curr').val()
    total = tambah(cost);
     if(kurensi=='IDR'){
        document.getElementById("total-text").innerHTML = 'Rp. ' + total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
      } else if (kurensi=='USD'){
        document.getElementById("total-text").innerHTML = '$ ' + total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      } else if (kurensi=='EUR'){
        document.getElementById("total-text").innerHTML = '€ ' + total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      }
    $("#total").val(tambah(cost));
    hitungpajak()
}

function tampil2() {
    var kurensi = $('#curr').val()
    total = tambah(cost);
     if(kurensi=='IDR'){
        document.getElementById("total-text").innerHTML = 'Rp. ' + total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
      } else if (kurensi=='USD'){
        document.getElementById("total-text").innerHTML = '$ ' + total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      } else if (kurensi=='EUR'){
        document.getElementById("total-text").innerHTML = '€ ' + total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      }
    $("#total").val(tambah(price));
    hitungpajak()
}

function tambah(input) {

    if (toString.call(input) !== "[object Array]")
        return false;

    var total = 0;
    for (var i = 0; i < input.length; i++) {
        if (isNaN(input[i])) {
            continue;
        }
        total += Number(input[i]);
    }
    return total;
}

function append_item() {
    if (typeof item_list === 'undefined' || item_list?.length <= 0) return;
    var tipe_inv = $('#tipe').val();
    dinamisRow.html('');
    console.log('tipe invoice =' + tipe_inv)
    for (let i = 0; i < item_list.length; i++) {
        if (tipe_inv == '1') {
            addRow_luar(item_list[i]);
        } else if (tipe_inv == '2') {
            addRow_local(item_list[i]);
        } else if (tipe_inv == '3') {
            addRow_spq(item_list[i]);
        } else if (tipe_inv == '4') {
            addRow_luar2(item_list[i]);
        } else if (tipe_inv == '5') {
            addRow_spq2(item_list[i]);
        }
    }
}

function hitungpajak() {
    var kurensi = $('#curr').val()
    var total = $("#total").val();
    var pajak = [];
    var total_pajak = 0;
    var grand = 0;
    var ppn10 = document.getElementById("ppn10");
    var fdn = document.getElementById("fdn");
    var ftn = document.getElementById("ftn");
    var tadn = document.getElementById("tadn");
    var tatn = document.getElementById("tatn");
    var vendor = document.getElementById("vendor");
    console.log(total);
    if (ppn10.checked) {
        pajak[0] = total * 10 / 100;
        console.log(pajak);
    } else {
        pajak[0] = 0;
        console.log(pajak);
    }
    if (fdn.checked) {
        if(total>=4500000){
            pajak[1] = total * 5 / 100;
        } else {
            pajak[1] = 0;
        }
        console.log(pajak);
    } else {
        pajak[1] = 0;
        console.log(pajak);
    }
    if (ftn.checked) {
        if(total>=4500000){
            pajak[2] = total * 6 / 100;
        } else {
            pajak[2] = 0;
        }
        console.log(pajak);
    } else {
        pajak[2] = 0;
        console.log(pajak);
    }
    if (tadn.checked) {
        pajak[3] = total * (50 / 100) * (5 / 100);
        console.log(pajak);
    } else {
        pajak[3] = 0;
        console.log(pajak);
    }
    if (tatn.checked) {
        pajak[4] = total * (50 / 100) * (5 / 100) * (120 / 100);
        console.log(pajak);
    } else {
        pajak[4] = 0;
        console.log(pajak);
    }
    if (vendor.checked) {
        pajak[5] = total * 2 / 100;
        console.log(pajak);
    } else {
        pajak[5] = 0;
        console.log(pajak);
    }
    total_pajak = tambah(pajak);
    grand = total - total_pajak;
    console.log(total + " - " + total_pajak + " = " + grand);
    if(kurensi=='IDR'){
        document.getElementById("grand-text").innerHTML = 'Rp. ' + grand.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        document.getElementById("pajak-text").innerHTML = "- Rp.  " + total_pajak.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
      } else if (kurensi=='USD'){
        document.getElementById("grand-text").innerHTML = '$ ' + grand.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        document.getElementById("pajak-text").innerHTML = "- $  " + total_pajak.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      } else if (kurensi=='EUR'){
        document.getElementById("grand-text").innerHTML = '€ ' + grand.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        document.getElementById("pajak-text").innerHTML = "- €  " + total_pajak.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      }
    $("#grand").val(grand);
}