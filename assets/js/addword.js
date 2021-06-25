$( document ).ready(function() {
    hitung();
});

$("#status").on('change', function(el) {
    var id = "";
    volume = [];
price = [];
cost = [];
    let ids = $(el.target).val();
    if(ids!=''){
        $.ajax({
            type: 'ajax',
            url: `http://localhost/finance/purchase/tampilkanData/`+ids,
            async: false,
            dataType: 'json',
            success: function (data) {
                    id = data[0].project_Name;
              console.log(id)
                $('#pn').val(id);
            
    }
  
   });
    } else {$('#pn').val("");}
       
});

$("#tipe_Po").on('change', function(el) {
    let ids = $(el.target).val();
    console.log(ids);
    change_table(ids);
    hitung();
});

function change_table(ids=null){
    if(ids=='1'||ids==null){
        $('#mw1').val('Locked');
        $('#w1').val('0');
        $('#mw2').val('Repetitions');
        $('#w2').val('0');
        $('#mw3').val('Fuzzy 100% / CM');
        $('#w3').val('0');
        $('#mw4').val('Fuzzy 95% - 99%');
        $('#w4').val('30');
        $('#mw5').val('Fuzzy 85% - 94%');
        $('#w5').val('50');
        $('#mw6').val('Fuzzy 75% - 84%');
        $('#w6').val('70');
        $('#mw7').val('Fuzzy 50% - 74%');
        $('#w7').val('100');
        $('#mw8').val('new');
        $('#w8').val('100');
    } else if (ids=='2'){
        $('#mw1').val('Locked');
        $('#w1').val('0');
        $('#mw2').val('Repetitions');
        $('#w2').val('15');
        $('#mw3').val('Fuzzy 100% / CM');
        $('#w3').val('0');
        $('#mw4').val('Fuzzy 95% - 99%');
        $('#w4').val('30');
        $('#mw5').val('Fuzzy 85% - 94%');
        $('#w5').val('50');
        $('#mw6').val('Fuzzy 75% - 84%');
        $('#w6').val('70');
        $('#mw7').val('Fuzzy 50% - 74%');
        $('#w7').val('100');
        $('#mw8').val('new');
        $('#w8').val('100');
    } else if (ids=='3'){
        $('#mw1').val('Locked');
        $('#w1').val('0');
        $('#mw2').val('Repetitions');
        $('#w2').val('0');
        $('#mw3').val('Fuzzy 100% / CM');
        $('#w3').val('0');
        $('#mw4').val('Fuzzy 95% - 99%');
        $('#w4').val('30');
        $('#mw5').val('Fuzzy 85% - 94%');
        $('#w5').val('50');
        $('#mw6').val('Fuzzy 75% - 84%');
        $('#w6').val('70');
        $('#mw7').val('Fuzzy 50% - 74%');
        $('#w7').val('100');
        $('#mw8').val('new');
        $('#w8').val('80');
    } else if (ids=='4'){
        $('#mw1').val('-');
        $('#w1').val('0');
        $('#mw2').val('-');
        $('#w2').val('0');
        $('#mw3').val('ICE Match');
        $('#w3').val('0');
        $('#mw4').val('Repetitions');
        $('#w4').val('10');
        $('#mw5').val('Fuzzy 100%');
        $('#w5').val('10');
        $('#mw6').val('99% - 76% (High Fuzzy)');
        $('#w6').val('25');
        $('#mw7').val('75% - 0% (New Words)');
        $('#w7').val('100');
        $('#mw8').val('MT');
        $('#w8').val('70');
    }
}

function hitung(){
    var mw1 = $('#w1').val() * $('#wc1').val() / 100;
    $('#wwc1').val(mw1);
    var mw2 = $('#w2').val() * $('#wc2').val() / 100;
    $('#wwc2').val(mw2);
    var mw3 = $('#w3').val() * $('#wc3').val() / 100;
    $('#wwc3').val(mw3);
    var mw4 = $('#w4').val() * $('#wc4').val() / 100;
    $('#wwc4').val(mw4);
    var mw5 = $('#w5').val() * $('#wc5').val() / 100;
    $('#wwc5').val(mw5);
    var mw6 = $('#w6').val() * $('#wc6').val() / 100;
    $('#wwc6').val(mw6);
    var mw7 = $('#w7').val() * $('#wc7').val() / 100;
    $('#wwc7').val(mw7);
    var mw8 = $('#w8').val() * $('#wc8').val() / 100;
    $('#wwc8').val(mw8);
    var hasil = mw1+mw2+mw3+mw4+mw5+mw6+mw7+mw8;
    var grand =$('#rate').val() * hasil;
    console.log($('#rate').val())
    $('#grand').val(grand);
}

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
              if(data[0].id_Status=='0'){
                $('#rs').val('admin');
              } else if(data[0].id_Status=='1'){
                $('#rs').val('Freelance');
              } else if(data[0].id_Status=='2'){
                $('#rs').val('In House (Star Jakarta)');
              } else if(data[0].id_Status=='3'){
                $('#rs').val('In House (Speequal Jakarta)');
              } else if(data[0].id_Status=='4'){
                $('#rs').val('In House (Speequal Malaysia)');
              } else if(data[0].id_Status=='5'){
                $('#rs').val('Vendor');
              } else if(data[0].id_Status=='6'){
                $('#rs').val('Kodegiri');
              }
  }
  
  });
  } else {$('#ps').val('');
  $('#pm').val('');}
  }

  
var from_currencyEl = $('#curr_awal').val();;
var to_currencyEl = '';

$("#curr").on('change', function(el) {
tujuan=$('#curr').val();
if(from_currencyEl=='IDR' && tujuan=='USD'){
  from_currencyEl='IDR'
  to_currencyEl = 'USD'
  calculate();
  from_currencyEl = 'USD'
  $('#curr_awal').val(from_currencyEl);
}
if(from_currencyEl=='IDR' && tujuan=='EUR'){
  from_currencyEl='IDR'
  to_currencyEl = 'EUR'
  calculate();
  from_currencyEl = 'EUR'
  $('#curr_awal').val(from_currencyEl);
}
if(from_currencyEl=='USD' && tujuan=='IDR'){
  from_currencyEl='USD'
  to_currencyEl = 'IDR'
  calculate();
  from_currencyEl = 'IDR'
  $('#curr_awal').val(from_currencyEl);
}
if(from_currencyEl=='EUR' && tujuan=='IDR'){
  from_currencyEl='EUR'
  to_currencyEl = 'IDR'
  calculate();
  from_currencyEl = 'IDR'
  $('#curr_awal').val(from_currencyEl);
}
if(from_currencyEl=='USD' && tujuan=='EUR'){
  from_currencyEl='USD'
  to_currencyEl = 'EUR'
  calculate();
  from_currencyEl = 'EUR'
  $('#curr_awal').val(from_currencyEl);
}
if(from_currencyEl=='EUR' && tujuan=='USD'){
  from_currencyEl='EUR'
  to_currencyEl = 'USD'
  calculate();
  from_currencyEl = 'USD'
  $('#curr_awal').val(from_currencyEl);
}
});

function calculate() {
var rt = $("#rate").val();
var total = $("#grand").val();
const from_currency = from_currencyEl;
const to_currency = to_currencyEl;

console.log(from_currency);
console.log(to_currency);

fetch(`https://api.exchangerate-api.com/v4/latest/${from_currency}`)
.then(res => res.json())
.then(res => {
const rate = res.rates[to_currency];
rt = (rt * rate).toFixed(2);
total = (total * rate).toFixed(2);
$("#rate").val(rt);
$("#grand").val(total);
})
}