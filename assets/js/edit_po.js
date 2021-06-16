
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
  <a href="javascript:void(0)" id="dynamic-ar">
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
if(item_list?.length <= 0) return;

for(let i=0; i < item_list.length; i++){
addRow(item_list[i]);
}
}
append_item();

function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              change(this.getElementsByTagName("input")[0].value);
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("rn"), countries);

$("#rn").on('input', function(el) {
  let ids = $(el.target).val();
  console.log(ids)
  change(ids);
});

$("#rn").on('input', function(el) {
  let ids = $(el.target).val();
  console.log(ids);
  change(ids);
});

function change(ids){
  if(ids!=''){
    $.ajax({
        type: 'ajax',
        url: `http://localhost/finance/purchase/tampilkanDataResource/`+ids,
        async: false,
        dataType: 'json',
        success: function (data) {
          console.log(data)
                id = data[0].email_Address;
                id2 = data[0].mobile_phone;
            $('#ps').val(id);
            $('#pm').val(id2);
        
}

});
} else {$('#ps').val('');
$('#pm').val('');}
}