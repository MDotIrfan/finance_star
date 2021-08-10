
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
  if (jsonData) jsonData = JSON.parse(atob(jsonData));
  else jsonData = {};

  let tr = `
<tr>
<td><input type="text" style="width: 241px;background: #E2EFFC;color:#000000;font: size 20px;" class="form-control" id="jobdesc" name="jobdesc[]" value="${jsonData?.jobdesc ? jsonData.jobdesc : ''}" readonly></td>
<td><input type="text" style="width: 129px;background: #E2EFFC;color:#000000;font: size 20px;" class="form-control volume${index}" name="volume[]" value="${jsonData?.qty ? jsonData.qty : ''}" oninput="hitung(${index})" id="" readonly></td>
<td><input type="text" style="width: 126px;background: #E2EFFC;color:#000000;font: size 20px;" class="form-control unit${index}" name="unit[]" value="${jsonData?.unit ? jsonData.unit : ''}"  id="unit" readonly></td>
<td><input type="text" style="width: 152px;;background: #E2EFFC;color:#000000;font: size 20px;"class="form-control price${index}" name="price[]" oninput="hitung(${index})" value="${jsonData?.rate ? jsonData.rate : ''}" readonly></td>
<td><input type="text" style="width: 238px;background: #E2EFFC;color:#000000;font: size 20px;"class="form-control cost${index}" name="cost[]" value="${jsonData?.amount ? jsonData.amount : ''}" readonly></td>

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
  var hasil = tambah(cost);
  var grand = 0;
  var grand_Total = 0;
  kurensi = $('#curr_awal').val()
  npwp = $('#ce').val()
  console.log(npwp);
  if(kurensi=='IDR'){
    document.getElementById("total-text").innerHTML = 'Rp. ' + hasil.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
  } else if (kurensi=='USD'){
    document.getElementById("total-text").innerHTML = '$ ' + hasil.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  } else if (kurensi=='EUR'){
    document.getElementById("total-text").innerHTML = '€ ' + hasil.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  }
  $("#total").val(hasil);
  if(kurensi=='IDR'){
    if (jenis == 'ftn') {
      if(npwp!=0){
        if (hasil>=4500000){
          grand = hasil * 5 / 100;
          document.getElementById("tax-label").innerHTML = 'PPh 21 (- 5%)';
        } else {
          grand = 0;
          document.getElementById("tax-label").innerHTML = 'PPh 21 (- 5%)';
        }
      } else {
        if (hasil>=4500000){
          grand = hasil * 6 / 100;
          document.getElementById("tax-label").innerHTML = 'PPh 21 (- 6%)';
        } else {
          grand = 0;
          document.getElementById("tax-label").innerHTML = 'PPh 21 (- 6%)';
        }
      }
      document.getElementById("pajak").innerHTML = '-' + grand;
    } else if (jenis == 'tatn') {
      if(npwp!=0){
        if (hasil>=4500000){
          grand = hasil * (50 / 100) * (5 / 100);
          document.getElementById("tax-label").innerHTML = 'PPh 21 (- 50% x 5%)';
        } else {
          grand = 0;
          document.getElementById("tax-label").innerHTML = 'PPh 21 (- 50% x 5%)';
        }
      } else {
        if (hasil>=4500000){
          grand = hasil * (50 / 100) * (5 / 100) * (120 / 100);
          document.getElementById("tax-label").innerHTML = 'PPh 21 (- 50% x 5% x 120%)';
        } else {
          grand = 0;
          document.getElementById("tax-label").innerHTML = 'PPh 21 (- 50% x 5% x 120%)';
        }
      }
      document.getElementById("pajak").innerHTML = '-' + grand;
    } else if (jenis == 'vendor') {
      grand = hasil * 2 / 100;
      document.getElementById("tax-label").innerHTML = 'PPh 23 (- 2%)';
      document.getElementById("pajak").innerHTML = '-' + grand;
    }
  } else {
    if (jenis == 'ftn') {
      if(npwp!=0){
          grand = 0;
          document.getElementById("tax-label").innerHTML = 'PPh 21 (- 5%)';
      } else {
          grand = 0;
          document.getElementById("tax-label").innerHTML = 'PPh 21 (- 6%)';
      }
      document.getElementById("pajak").innerHTML = '-' + grand;
    } else if (jenis == 'tatn') {
      if(npwp!=0){
          grand = 0;
          document.getElementById("tax-label").innerHTML = 'PPh 21 (- 50% x 5%)';
      } else {
          grand = 0;
          document.getElementById("tax-label").innerHTML = 'PPh 21 (- 50% x 5% x 120%)';
      }
      document.getElementById("pajak").innerHTML = '-' + grand;
    } else if (jenis == 'vendor') {
      grand = hasil * 0;
      document.getElementById("tax-label").innerHTML = 'PPh 23 (- 2%)';
      document.getElementById("pajak").innerHTML = '-' + grand;
    }
  }
  grand_Total = hasil - grand;
  $("#tax").val(grand);
  if(kurensi=='IDR'){
    document.getElementById("grand-text").innerHTML = 'Rp. ' + grand_Total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
  } else if (kurensi=='USD'){
    document.getElementById("grand-text").innerHTML = '$ ' + grand_Total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  } else if (kurensi=='EUR'){
    document.getElementById("grand-text").innerHTML = '€ ' + grand_Total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  }
  $("#grand").val(grand_Total);
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
  if (item_list?.length <= 0) return;

  for (let i = 0; i < item_list.length; i++) {
    addRow(item_list[i]);
  }
}
append_item();