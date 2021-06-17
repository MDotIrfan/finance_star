$(document).ready(function(e)
    {
      if(jum_table<1){
addRow();
      }
    });


$(document).on('click',"#dynamic-ar", function(e)
    {
      addRow();
    });


    $(document).on('click', '.remove-input-field', function () {
              if(jum_table>1){
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
var index=0;

function addRow (jsonData=null) {
  console.log(jsonData);
  if(jsonData) jsonData = JSON.parse(atob(jsonData));
  else jsonData = {};

let tr = `
<tr>
<td><input type="text" id="jobdesc" name="jobdesc[]" value="${jsonData?.task? jsonData.task : ''}" readonly></td>
<td><input type="text" class="volume${index}" name="volume[]" value="${jsonData?.qty ? jsonData.qty : ''}" oninput="hitung(${index})" id="volume" readonly></td>
<td><input type="text" class="unit${index}" name="unit[]" value="${jsonData?.unit ? jsonData.unit : ''}"  id="unit" readonly></td>
<td><input type="text" class="price${index}" name="price[]" oninput="hitung(${index})" value="${jsonData?.rate ? jsonData.rate : ''}" readonly ></td>
<td><input type="text" class="cost${index}" name="cost[]" value="${jsonData?.amount ? jsonData.amount : ''}" readonly></td>
</tr>
`
dinamisRow.append(tr)
hitung(index)
index++;
jum_table++;
}

function hitung(a){
  console.log(a);
  volume[a] = $(".volume"+a).val();
  price[a] = $(".price"+a).val();
  cost[a] = volume[a] * price[a];
  tampil()
  $(".cost"+a).val(cost[a]);
}

function tampil(){
    $("#total").val(tambah(cost));
    $("#grand").val(tambah(cost));
}
function tambah(input){
             
             if (toString.call(input) !== "[object Array]")
                return false;
                  
                        var total =  0;
                        for(var i=0;i<input.length;i++)
                          {                  
                            if(isNaN(input[i])){
                            continue;
                             }
                              total += Number(input[i]);
                           }
                         return total;
                        }

function append_item() {
  if(typeof item_list === 'undefined' || item_list?.length <= 0) return;

  for(let i=0; i < item_list.length; i++){
    addRow(item_list[i]);
  }
}
append_item();