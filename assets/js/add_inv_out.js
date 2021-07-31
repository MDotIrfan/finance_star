$(document).ready(function (e) {
    if (jum_table < 1) {
        addTable_luar();
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
                          <select style="color:#000000;font: size 20px;" name="statusSelect" id="statusSelect" class="form-control font-weight-bold" style="color:#000000;">
                              <option selected="selected">Amount IDR</option>
                              <option>Amount US</option>
                              <option>Amount EURO</option>
                          </select>
                      </th>
                  </tr>
              </thead>
              <tbody id="dinamisRow">
                    <script>
                    dinamisRow = $('#dinamisRow');
                    if(jum_table<1){
                        addRow_local();
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
    <td><input style="color:#000000;font: size 20px;" type="text" class="form-control" id="jobdesc" name="jobdesc[]" value="${jsonData?.task ? jsonData.task : ''}"></td>
    <td><input style="color:#000000;font: size 20px;" type="text" class="form-control volume${index}" name="volume[]" value="${jsonData?.qty ? jsonData.qty : ''}" oninput="hitung(${index})" id=""></td>
    <td><select style="color:#000000;font: size 20px;" class="custom-select lg mb-3 col-lg" aria-label=".form-select-lg example" id="unit" name="unit[]">
                   
       <option value="Hours" ${jsonData?.unit == 'Hours' ? 'Selected' : ''}>Hours</option>
       <option value="Days" ${jsonData?.unit == 'Days' ? 'Selected' : ''}>Days</option>
       <option value="Months" ${jsonData?.unit == 'Months' ? 'Selected' : ''}>Months</option>
       <option value="Years" ${jsonData?.unit == 'Years' ? 'Selected' : ''}>Years</option>
       <option value="Unit" ${jsonData?.unit == 'Unit' ? 'Selected' : ''}>Unit</option>
    
               </select></td>
    <td><input type="text" class="form-control price${index}" name="price[]" oninput="hitung(${index})" value="${jsonData?.rate ? jsonData.rate : ''}" ></td>
    <td><input type="text" class="form-control cost${index}" name="cost[]" value="${jsonData?.amount ? jsonData.amount : ''}" readonly></td>
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
                              <select style="color:#000000;font: size 20px;" name="statusSelect" id="statusSelect" class="form-control font-weight-bold">
                                  <option selected="selected">Amount IDR</option>
                                  <option>Amount US</option>
                                  <option>Amount EURO</option>
                              </select>
                          </th>
                      </tr>
                  </thead>
                  <tbody id="dinamisRow">
                        <script>
                        dinamisRow = $('#dinamisRow');
                        if(jum_table<1){
                            addRow_luar();
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
<td><input type="text" class="form-control" style="color:#000000;font: size 20px;" id="jobdesc" name="jobdesc[]" value="${jsonData?.project_Name ? jsonData.project_Name : ''}" ></td>
<td><input type="text" class="form-control" style="color:#000000;font: size 20px;" id="proman" name="proman[]" value="${jsonData?.nama_Pm ? jsonData.nama_Pm : ''}" ></td>
<td><input type="text" style="color:#000000;font: size 20px;" class="form-control"id="starnum" name="starnum[]" value="" ></td>
<td><input type="text" style="color:#000000;font: size 20px;" class="form-control volume${index}" name="volume[]" value="${jsonData?.locked ? parseInt(jsonData.wwc1) + parseInt(jsonData.wwc2) + parseInt(jsonData.wwc3) + parseInt(jsonData.wwc4) + parseInt(jsonData.wwc5) + parseInt(jsonData.wwc6) + parseInt(jsonData.wwc7) + parseInt(jsonData.wwc8) : ''}" oninput="hitung(${index})" id=""></td>
<td><input type="text" style="color:#000000;font: size 20px;" class="form-control price${index}" name="price[]" oninput="hitung(${index})" value="${jsonData?.rate ? jsonData.rate : ''}"></td>
<td><input type="text" style="color:#000000;font: size 20px;" class="form-control cost${index}" name="cost[]" value="${jsonData?.grand_Total ? jsonData.grand_Total : ''}" readonly></td>
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
                        <tr style="color:#000000;font: size 20px;">
                            <th>Job Description</th>
                            <th>Qtt Words</th>
                            <th>Unit Price IDR</th>
                            <th>
                                <select style="color:#000000;font: size 20px;" name="statusSelect" id="statusSelect" class="form-control font-weight-bold">
                                    <option selected="selected">Amount IDR</option>
                                    <option>Amount US</option>
                                    <option>Amount EURO</option>
                                </select>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="dinamisRow">
                          <script>
                          dinamisRow = $('#dinamisRow');
                          if(jum_table<1){
                              addRow_spq();
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
  <td><input style="color:#000000;font: size 20px;" type="text" class="form-control" id="jobdesc" name="jobdesc[]" value="${jsonData?.project_Name ? jsonData.project_Name : ''}" ></td>
  <td><input style="color:#000000;font: size 20px;" type="text" class="form-control volume${index}" name="volume[]" value="${jsonData?.locked ? parseInt(jsonData.wwc1) + parseInt(jsonData.wwc2) + parseInt(jsonData.wwc3) + parseInt(jsonData.wwc4) + parseInt(jsonData.wwc5) + parseInt(jsonData.wwc6) + parseInt(jsonData.wwc7) + parseInt(jsonData.wwc8) : ''}" oninput="hitung(${index})" id=""></td>
  <td><input style="color:#000000;font: size 20px;" type="text" class="form-control price${index}" name="price[]" oninput="hitung(${index})" value="${jsonData?.rate ? jsonData.rate : ''}"></td>
  <td><input style="color:#000000;font: size 20px;" type="text" class="form-control cost${index}" name="cost[]" value="${jsonData?.grand_Total ? jsonData.grand_Total : ''}" readonly></td>
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
                          <select style="color:#000000;font: size 20px;" name="statusSelect" id="statusSelect" class="form-control font-weight-bold">
                              <option selected="selected">Amount IDR</option>
                              <option>Amount US</option>
                              <option>Amount EURO</option>
                          </select>
                      </th>
                  </tr>
              </thead>
              <tbody id="dinamisRow">
                    <script>
                    dinamisRow = $('#dinamisRow');
                    if(jum_table<1){
                        addRow_luar2();
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
    <td><input type="text" style="color:#000000;font: size 20px;"class="form-control" id="jobdesc" name="jobdesc[]" value="${jsonData?.task ? jsonData.task : ''}"></td>
    <td><input type="text" style="color:#000000;font: size 20px;"class="form-control volume${index}" name="volume[]" value="${jsonData?.qty ? jsonData.qty : ''}" oninput="hitung(${index})" id=""></td>
    <td><select style="color:#000000;font: size 20px;" class="form-control custom-select lg mb-3 col-lg" aria-label=".form-select-lg example" id="unit" name="unit[]">
                   
       <option value="Hours" ${jsonData?.unit == 'Hours' ? 'Selected' : ''}>Hours</option>
       <option value="Days" ${jsonData?.unit == 'Days' ? 'Selected' : ''}>Days</option>
       <option value="Months" ${jsonData?.unit == 'Months' ? 'Selected' : ''}>Months</option>
       <option value="Years" ${jsonData?.unit == 'Years' ? 'Selected' : ''}>Years</option>
       <option value="Unit" ${jsonData?.unit == 'Unit' ? 'Selected' : ''}>Unit</option>
    
               </select></td>
    <td><input type="text" style="color:#000000;font: size 20px;" class="form-control price${index}" name="price[]" oninput="hitung(${index})" value="${jsonData?.rate ? jsonData.rate : ''}" >
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
                          <select style="color:#000000;font: size 20px;" name="statusSelect" id="statusSelect" class="form-control font-weight-bold">
                              <option selected="selected">Amount IDR</option>
                              <option>Amount US</option>
                              <option>Amount EURO</option>
                          </select>
                      </th>
                  </tr>
              </thead>
              <tbody id="dinamisRow">
                    <script>
                    dinamisRow = $('#dinamisRow');
                    if(jum_table<1){
                        addRow_spq2();
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
    <td><input style="color:#000000;font: size 20px;" type="text" class="form-control" id="jobdesc" name="jobdesc[]" value=""></td>
    <td><input style="color:#000000;font: size 20px;" type="date" class="form-control form-control-user" name="deliv[]" value="${my_var}"></td>
    <td><input style="color:#000000;font: size 20px;" type="text" class="form-control price${index}" name="price[]" oninput="hitung2(${index})" value="${jsonData?.grand_Total ? jsonData.grand_Total : ''}" >
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
    $("#total").val(tambah(cost));
    $("#grand").val(tambah(cost));
    hitungpajak()
}

function tampil2() {
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

    for (let i = 0; i < item_list.length; i++) {
        addRow(item_list[i]);
    }
}
append_item();

function hitungpajak() {
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
        pajak[1] = total * 5 / 100;
        console.log(pajak);
    } else {
        pajak[1] = 0;
        console.log(pajak);
    }
    if (ftn.checked) {
        pajak[2] = total * 6 / 100;
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
    $("#grand").val(grand);
}