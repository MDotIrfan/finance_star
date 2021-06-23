$(document).ready(function(e)
    {
      if(jum_table<1){
addTable_local();
      }
    });


$(document).on('click',"#dynamic-ar", function(e)
    {
      addRow();
    });

    $(document).on('click',"#dynamic-ar-local", function(e)
    {
      addRow_local();
    });

    $(document).on('click',"#dynamic-ar-luar", function(e)
    {
      addRow_luar();
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

dinamisTable = $('#dinamisTable')
dinamisRow = $('#dinamisRow')
dinamisOption = $('#status')
var jum_table = 0;
var a = 0;
var volume = [];
var price = [];
var cost = [];
var index=0;

function addTable_local (jsonData=null) {
    console.log(jsonData);
    if(jsonData) jsonData = JSON.parse(atob(jsonData));
    else jsonData = {};
  
  let table = `
  <thead>
                  <tr>
                      <th>Job Description</th>
                      <th>Volume</th>
                      <th>Unit</th>
                      <th>Unit Price IDR</th>
                      <th>
                          <select name="statusSelect" id="statusSelect" class="form-control font-weight-bold">
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

  function addRow_local (jsonData=null) {
    if(jsonData) jsonData = JSON.parse(atob(jsonData));
    else jsonData = {};
    
    let tr = `
    <tr>
    <td><input type="text" id="jobdesc" name="jobdesc[]" value="${jsonData?.task ? jsonData.task : ''}"></td>
    <td><input type="text" class="volume${index}" name="volume[]" value="${jsonData?.qty ? jsonData.qty : ''}" oninput="hitung(${index})" id=""></td>
    <td><select class="custom-select lg mb-3 col-lg" aria-label=".form-select-lg example" id="unit" name="unit[]">
                   
       <option value="Hours" ${jsonData?.unit == 'Hours' ? 'Selected' : ''}>Hours</option>
       <option value="Days" ${jsonData?.unit == 'Days' ? 'Selected' : ''}>Days</option>
       <option value="Months" ${jsonData?.unit == 'Months' ? 'Selected' : ''}>Months</option>
       <option value="Years" ${jsonData?.unit == 'Years' ? 'Selected' : ''}>Years</option>
       <option value="Unit" ${jsonData?.unit == 'Unit' ? 'Selected' : ''}>Unit</option>
    
               </select></td>
    <td><input type="text" class="price${index}" name="price[]" oninput="hitung(${index})" value="${jsonData?.rate? jsonData.rate : ''}" ></td>
    <td><input type="text" class="cost${index}" name="cost[]" value="${jsonData?.amount ? jsonData.amount : ''}" readonly></td>
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

    function addTable_luar (jsonData=null) {
        console.log(jsonData);
        if(jsonData) jsonData = JSON.parse(atob(jsonData));
        else jsonData = {};
      
      let table = `
      <thead>
                      <tr>
                          <th>Job Description</th>
                          <th>Project Manager</th>
                          <th>STAR Number</th>
                          <th>Number Word / page</th>
                          <th>Unit Price / Word</th>
                          <th>
                              <select name="statusSelect" id="statusSelect" class="form-control font-weight-bold">
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
    
      function addRow_luar (jsonData=null) {
        if(jsonData) jsonData = JSON.parse(atob(jsonData));
        else jsonData = {};
        
        let tr = `
        <tr>
<td><input type="text" id="jobdesc" name="jobdesc[]" value="${jsonData?.project_Name ? jsonData.project_Name : ''}" ></td>
<td><input type="text" id="proman" name="proman[]" value="" ></td>
<td><input type="text" id="starnum" name="starnum[]" value="" ></td>
<td><input type="text" class="volume${index}" name="volume[]" value="${jsonData?.locked ? parseInt(jsonData.locked)+parseInt(jsonData.repetitions)+parseInt(jsonData.fuzzy100)+parseInt(jsonData.fuzzy95)+parseInt(jsonData.fuzzy85)+parseInt(jsonData.fuzzy75)+parseInt(jsonData.fuzzy50)+parseInt(jsonData.new) : ''}" oninput="hitung(${index})" id=""></td>
<td><input type="text" class="price${index}" name="price[]" oninput="hitung(${index})" value="${jsonData?.rate ? jsonData.rate : ''}"></td>
<td><input type="text" class="cost${index}" name="cost[]" value="${jsonData?.grand_Total ? jsonData.grand_Total : ''}" readonly></td>
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