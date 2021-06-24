$(document).ready(function (e) {
    if (jum_table < 1) {
        addRow();
    }    
});

$(document).on('click', "#dynamic-ar", function (e) {
  addRow();
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

function addRow(jsonData = null) {
  if (jsonData) jsonData = JSON.parse(atob(jsonData));
  else jsonData = {};

  let tr = `
  <tr>
  <td><input type="text" id="jobdesc" name="jobdesc[]" value="${jsonData?.item ? jsonData.item : ''}"></td>
  <td><input type="text" class="volume${index}" name="volume[]" value="${jsonData?.qty ? jsonData.qty : ''}" oninput="" id=""></td>
  <td><select class="custom-select lg mb-3 col-lg" aria-label=".form-select-lg example" id="unit" name="unit[]">
                 
     <option value="Hours" ${jsonData?.Unit == 'Hours' ? 'Selected' : ''}>Hours</option>
     <option value="Days" ${jsonData?.Unit == 'Days' ? 'Selected' : ''}>Days</option>
     <option value="Months" ${jsonData?.Unit == 'Months' ? 'Selected' : ''}>Months</option>
     <option value="Years" ${jsonData?.Unit == 'Years' ? 'Selected' : ''}>Years</option>
     <option value="Unit" ${jsonData?.Unit == 'Unit' ? 'Selected' : ''}>Unit</option>
     <option value="Words" ${jsonData?.Unit == 'Words' ? 'Selected' : ''}>Words</option>
  
             </select></td>
  <td><input type="checkbox" id="cb${index}" value="1" name="cb[]" onchange='cek(${index})' ${jsonData?.status == '1' ? 'checked' : ''}/>
  <input type="hidden" id="status${index}" name="status[]" value="${jsonData?.status ? jsonData.status : ''}"></td>
  <td>
    <a href="javascript:void(0)" id="dynamic-ar">
    <i class="fa fa-plus-circle" style="color:green"></i></a>
  </td>
  <td><a href="javascript:void(0)" class="remove-input-field" id="${index}"><i class="fa fa-minus-circle" style="color:red"></i></a></td>
  </tr>
  `
  dinamisRow.append(tr)
  index++;
  jum_table++;
}

function cek(a=null){
  var cb = document.getElementById("cb"+a);
  if(cb.checked){
      $('#status'+a).val('1');
      console.log(cb.value);
  } else {
      $('#status'+a).val('0');
      console.log(cb.value);
  }
}

function append_item() {
    if(typeof item_list === 'undefined' || item_list?.length <= 0) return;
  
    for(let i=0; i < item_list.length; i++){
      addRow(item_list[i]);
    }
  }
  append_item();

