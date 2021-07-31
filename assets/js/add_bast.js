$(document).ready(function (e) {
    if (jum_table < 1) {
        addRow2();
    }
});

$("#noinv").on('change', function (el) {
    let ids = $(el.target).val();
    dinamisRow.html('');
    if (ids != '') {
        $.ajax({
            type: 'ajax',
            url: `http://localhost/finance/finance/tampilkanDataInv/` + ids,
            async: false,
            dataType: 'json',
            success: function (data) {
                for (i = 0; i < data.length; i++) {
                    console.log(data);
                    $('#cn').val(data[i].client_Name);
                    $('#pn').val(data[i].project_Name);
                    $('#dd').val(data[i].due_date);
                    $('#email').val(data[i].client_email);
                    $('#company').val(data[i].company_name);
                    $('#second_party').val(data[i].client_Name);
                    if (data[i].tipe_inv == 1) {
                        addRow1(btoa(JSON.stringify(data[i])));
                    } else if (data[i].tipe_inv == 2) {
                        addRow2(btoa(JSON.stringify(data[i])));
                    } else if (data[i].tipe_inv == 3) {
                        addRow3(btoa(JSON.stringify(data[i])));
                    } else if (data[i].tipe_inv == 4) {
                        addRow4(btoa(JSON.stringify(data[i])));
                    } else if (data[i].tipe_inv == 5) {
                        addRow5(btoa(JSON.stringify(data[i])));
                    }
                }

            }
        });
    } else { addRow2(); }
});
$(document).on('click', "#dynamic-ar1", function (e) {
    addRow1();
});

$(document).on('click', "#dynamic-ar2", function (e) {
    addRow2();
});

$(document).on('click', "#dynamic-ar3", function (e) {
    addRow3();
});

$(document).on('click', "#dynamic-ar4", function (e) {
    addRow4();
});

$(document).on('click', "#dynamic-ar5", function (e) {
    addRow5();
});

$(document).on('click', '.remove-input-field', function () {
    if (jum_table > 1) {
        $(this).parents('tr').remove();
        var row_id = $(this).attr("id");
        console.log(row_id);
        jum_table--;
    }
});

dinamisRow = $('#dinamisRow')
var jum_table = 0;
var index = 0;

function addRow1(jsonData = null) {
    if (jsonData) jsonData = JSON.parse(atob(jsonData));
    else jsonData = {};

    let tr = `
    <tr>
    <td><input type="text" class="form-control" style="color:#000000;font: size 20px;" id="jobdesc" name="jobdesc[]" value="${jsonData?.jobdesc1 ? jsonData.jobdesc1 : ''}"></td>
    <td><input type="text" style="color:#000000;font: size 20px;" class="form-control volume${index}" name="volume[]" value="${jsonData?.number_word ? jsonData.number_word : ''}" oninput="" id=""></td>
    <td><select style="color:#000000;font: size 20px;" class="custom-select lg mb-3 col-lg" aria-label=".form-select-lg example" id="unit" name="unit[]">
                   
       <option value="Hours" ${jsonData?.unit == 'Hours' ? 'Selected' : ''}>Hours</option>
       <option value="Days" ${jsonData?.unit == 'Days' ? 'Selected' : ''}>Days</option>
       <option value="Months" ${jsonData?.unit == 'Months' ? 'Selected' : ''}>Months</option>
       <option value="Years" ${jsonData?.unit == 'Years' ? 'Selected' : ''}>Years</option>
       <option value="Unit" ${jsonData?.unit == 'Unit' ? 'Selected' : ''}>Unit</option>
       <option value="word" ${jsonData?.tipe_inv == '1' || jsonData?.tipe_inv == '3' || jsonData?.tipe_inv == '5' ? 'Selected' : ''}>Words</option>
    
               </select></td>
    <td><input type="checkbox" id="cb${index}" value="1" name="cb[]" onchange='cek(${index})'/>
    <input type="hidden" id="status${index}" name="status[]" value="0"></td>
    <td>
      <a href="javascript:void(0)" id="dynamic-ar1">
      <i class="fa fa-plus-circle" style="color:green"></i></a>
    </td>
    <td><a href="javascript:void(0)" class="remove-input-field" id="${index}"><i class="fa fa-minus-circle" style="color:red"></i></a></td>
    </tr>
    `
    dinamisRow.append(tr)
    index++;
    jum_table++;
}

function addRow2(jsonData = null) {
    if (jsonData) jsonData = JSON.parse(atob(jsonData));
    else jsonData = {};

    let tr = `
    <tr>
    <td><input type="text"  class="form-control" style="color:#000000;font: size 20px;" id="jobdesc" name="jobdesc[]" value="${jsonData?.domain ? jsonData.domain : ''}"></td>
    <td><input type="text" style="color:#000000;font: size 20px;" class="form-control volume${index}" name="volume[]" value="${jsonData?.volume ? jsonData.volume : ''}" oninput="" id=""></td>
    <td><select style="color:#000000;font: size 20px;" class="custom-select lg mb-3 col-lg" aria-label=".form-select-lg example" id="unit" name="unit[]">
                   
       <option value="Hours" ${jsonData?.unit == 'Hours' ? 'Selected' : ''}>Hours</option>
       <option value="Days" ${jsonData?.unit == 'Days' ? 'Selected' : ''}>Days</option>
       <option value="Months" ${jsonData?.unit == 'Months' ? 'Selected' : ''}>Months</option>
       <option value="Years" ${jsonData?.unit == 'Years' ? 'Selected' : ''}>Years</option>
       <option value="Unit" ${jsonData?.unit == 'Unit' ? 'Selected' : ''}>Unit</option>
       <option value="word" ${jsonData?.tipe_inv == '1' || jsonData?.tipe_inv == '3' || jsonData?.tipe_inv == '5' ? 'Selected' : ''}>Words</option>
    
               </select></td>
    <td>
    <input type="checkbox" id="cb${index}" value="1" name="cb[]" onchange='cek(${index})'/>
    <input type="hidden" id="status${index}" name="status[]" value="0"></td>
    <td>
      <a href="javascript:void(0)" id="dynamic-ar2">
      <i class="fa fa-plus-circle" style="color:green"></i></a>
    </td>
    <td><a href="javascript:void(0)" class="remove-input-field" id="${index}"><i class="fa fa-minus-circle" style="color:red"></i></a></td>
    </tr>
    `
    dinamisRow.append(tr)
    index++;
    jum_table++;
}

function addRow3(jsonData = null) {
    if (jsonData) jsonData = JSON.parse(atob(jsonData));
    else jsonData = {};

    let tr = `
    <tr>
    <td><input type="text"  class="form-control" style="color:#000000;font: size 20px;" id="jobdesc" name="jobdesc[]" value="${jsonData?.jobdesc3 ? jsonData.jobdesc3 : ''}"></td>
    <td><input type="text" style="color:#000000;font: size 20px;" class="form-control volume${index}" name="volume[]" value="${jsonData?.qtt_word ? jsonData.qtt_word : ''}" oninput="" id=""></td>
    <td><select style="color:#000000;font: size 20px;" class="custom-select lg mb-3 col-lg" aria-label=".form-select-lg example" id="unit" name="unit[]">
                   
       <option value="Hours" ${jsonData?.unit == 'Hours' ? 'Selected' : ''}>Hours</option>
       <option value="Days" ${jsonData?.unit == 'Days' ? 'Selected' : ''}>Days</option>
       <option value="Months" ${jsonData?.unit == 'Months' ? 'Selected' : ''}>Months</option>
       <option value="Years" ${jsonData?.unit == 'Years' ? 'Selected' : ''}>Years</option>
       <option value="Unit" ${jsonData?.unit == 'Unit' ? 'Selected' : ''}>Unit</option>
       <option value="word" ${jsonData?.tipe_inv == '1' || jsonData?.tipe_inv == '3' || jsonData?.tipe_inv == '5' ? 'Selected' : ''}>Words</option>
    
               </select></td>
    <td>
    <input type="checkbox" id="cb${index}" value="0" name="cb[]" onchange='cek(${index})'/>
    <input type="hidden" id="status${index}" name="status[]" value="0"></td>
    <td>
      <a href="javascript:void(0)" id="dynamic-ar3">
      <i class="fa fa-plus-circle" style="color:green"></i></a>
    </td>
    <td><a href="javascript:void(0)" class="remove-input-field" id="${index}"><i class="fa fa-minus-circle" style="color:red"></i></a></td>
    </tr>
    `
    dinamisRow.append(tr)
    index++;
    jum_table++;
}

function addRow4(jsonData = null) {
    if (jsonData) jsonData = JSON.parse(atob(jsonData));
    else jsonData = {};

    let tr = `
    <tr>
    <td><input type="text"  class="form-control" style="color:#000000;font: size 20px;" id="jobdesc" name="jobdesc[]" value="${jsonData?.jobdesc4 ? jsonData.jobdesc4 : ''}"></td>
    <td><input type="text" style="color:#000000;font: size 20px;" class="form-control volume${index}" name="volume[]" value="${jsonData?.star_number ? jsonData.star_number : ''}" oninput="" id=""></td>
    <td><select style="color:#000000;font: size 20px;" class="custom-select lg mb-3 col-lg" aria-label=".form-select-lg example" id="unit" name="unit[]">
                   
       <option value="Hours" ${jsonData?.number_line == 'Hours' ? 'Selected' : ''}>Hours</option>
       <option value="Days" ${jsonData?.number_line == 'Days' ? 'Selected' : ''}>Days</option>
       <option value="Months" ${jsonData?.number_line == 'Months' ? 'Selected' : ''}>Months</option>
       <option value="Years" ${jsonData?.number_line == 'Years' ? 'Selected' : ''}>Years</option>
       <option value="Unit" ${jsonData?.number_line == 'Unit' ? 'Selected' : ''}>Unit</option>
       <option value="word" ${jsonData?.tipe_inv == '1' || jsonData?.tipe_inv == '3' || jsonData?.tipe_inv == '5' ? 'Selected' : ''}>Words</option>
    
               </select></td>
    <td>
    <input type="checkbox" id="cb${index}" value="1" name="cb[]" onchange='cek(${index})'/>
    <input type="hidden" id="status${index}" name="status[]" value="0"></td>
    <td>
      <a href="javascript:void(0)" id="dynamic-ar4">
      <i class="fa fa-plus-circle" style="color:green"></i></a>
    </td>
    <td><a href="javascript:void(0)" class="remove-input-field" id="${index}"><i class="fa fa-minus-circle" style="color:red"></i></a></td>
    </tr>
    `
    dinamisRow.append(tr)
    index++;
    jum_table++;
}

function addRow5(jsonData = null) {
    if (jsonData) jsonData = JSON.parse(atob(jsonData));
    else jsonData = {};

    let tr = `
    <tr>
    <td><input type="text"  class="form-control" style="color:#000000;font: size 20px;" id="jobdesc" name="jobdesc[]" value="${jsonData?.pre_invoice ? jsonData.pre_invoice : ''}"></td>
    <td><input type="text" style="color:#000000;font: size 20px;" class="form-control volume${index}" name="volume[]" value="1" oninput="" id=""></td>
    <td><select style="color:#000000;font: size 20px;" class="custom-select lg mb-3 col-lg" aria-label=".form-select-lg example" id="unit" name="unit[]">
                   
       <option value="Hours" ${jsonData?.unit == 'Hours' ? 'Selected' : ''}>Hours</option>
       <option value="Days" ${jsonData?.unit == 'Days' ? 'Selected' : ''}>Days</option>
       <option value="Months" ${jsonData?.unit == 'Months' ? 'Selected' : ''}>Months</option>
       <option value="Years" ${jsonData?.unit == 'Years' ? 'Selected' : ''}>Years</option>
       <option value="Unit" ${jsonData?.unit == 'Unit' ? 'Selected' : ''}>Unit</option>
       <option value="word" ${jsonData?.tipe_inv == '1' || jsonData?.tipe_inv == '3' || jsonData?.tipe_inv == '5' ? 'Selected' : ''}>Words</option>
    
               </select></td>
    <td><input type="checkbox" id="cb${index}" value="1" name="cb[]" onchange='cek(${index})'/>
    <input type="hidden" id="status${index}" name="status[]" value="0"></td>
    <td>
      <a href="javascript:void(0)" id="dynamic-ar5">
      <i class="fa fa-plus-circle" style="color:green"></i></a>
    </td>
    <td><a href="javascript:void(0)" class="remove-input-field" id="${index}"><i class="fa fa-minus-circle" style="color:red"></i></a></td>
    </tr>
    `
    dinamisRow.append(tr)
    index++;
    jum_table++;
}

function cek(a = null) {
    var cb = document.getElementById("cb" + a);
    if (cb.checked) {
        $('#status' + a).val('1');
        console.log(cb.value);
    } else {
        $('#status' + a).val('0');
        console.log(cb.value);
    }
}

