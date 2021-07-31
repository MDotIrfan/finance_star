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
    delete cost[row_id];
    tampil();
  }
});

dinamisRow = $('#dinamisRow')
var jum_table = 0;
var a = 0;
var volume = [];
var price = [];
var cost = [];
var index = 0;

function addRow(jsonData = null) {
  console.log(jsonData);
  if (jsonData) jsonData = JSON.parse(atob(jsonData));
  else jsonData = {};

  let tr = `
<tr>
<td><input type="text" class="form-control" style="background: #E2EFFC;color:#000000;font: size 20px;width: 276px;" id="jobdesc" name="jobdesc[]" value="${jsonData?.project_Name ? jsonData.project_Name : ''}" readonly></td>
<td><input type="text" class="form-control volume${index}" style="background: #E2EFFC;color:#000000;font: size 20px;width: 189px;" name="volume[]" value="${jsonData?.locked ? parseInt(jsonData.wwc1) + parseInt(jsonData.wwc2) + parseInt(jsonData.wwc3) + parseInt(jsonData.wwc4) + parseInt(jsonData.wwc5) + parseInt(jsonData.wwc6) + parseInt(jsonData.wwc7) + parseInt(jsonData.wwc8) : ''}" oninput="hitung(${index})" id="" readonly></td>
<td><input type="text" class="form-control  price${index}" style="background: #E2EFFC;color:#000000;font: size 20px;width: 212px;" name="price[]" oninput="hitung(${index})" value="${jsonData?.rate ? jsonData.rate : ''}" readonly></td>
<td><input type="text" class="form-control  cost${index}" style="background: #E2EFFC;color:#000000;font: size 20px;width: 238px;" name="cost[]" value="${jsonData?.grand_Total ? jsonData.grand_Total : ''}" readonly></td>
</tr>
`
  dinamisRow.append(tr)
  hitung(index)
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

function tampil() {
  var hasil = tambah(cost)
  var grand = 0;
  $("#total").val(hasil);
  if (jenis == 'ftn') {
    grand = hasil * 5 / 100;
    document.getElementById("pajak").innerHTML = '-' + grand;
  } else if (jenis == 'fdn') {
    grand = hasil * 6 / 100;
    document.getElementById("pajak").innerHTML = '-' + grand;
  } else if (jenis == 'tadn') {
    grand = hasil * (50 / 100) * (5 / 100);
    document.getElementById("pajak").innerHTML = '-' + grand;
  } else if (jenis == 'tatn') {
    grand = hasil * (50 / 100) * (5 / 100) * (120 / 100);
    document.getElementById("pajak").innerHTML = '-' + grand;
  } else if (jenis == 'vendor') {
    grand = hasil * 2 / 100;
    document.getElementById("pajak").innerHTML = '-' + grand;
  }
  $("#grand").val(hasil - grand);
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