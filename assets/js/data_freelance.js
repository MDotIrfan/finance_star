$(document).ready(function() {
    dinamisOption1 = $('#subdistrict');
dinamisOption2 = $('#postal_code');

$("#district").on('change', function(el) {
    let ids = $(el.target).val();
    console.log(ids);
    dinamisOption1.html('');
    $.ajax({
        type: 'ajax',
        url: base_url(`user/tampilkanDataKota/`)+ids,
        async: false,
        dataType: 'json',
        success: function (data) {
            addoption();
            for(i=0; i<data.length; i++){
                console.log(data[i]);
                addoption(btoa(JSON.stringify(data[i])));}
        
    } });
});

$("#subdistrict").on('change', function(el) {
    let ids = $(el.target).val();
    console.log(ids);
    dinamisOption2.html('');
    $.ajax({
        type: 'ajax',
        url: base_url(`user/tampilkanDataPostal/`)+ids,
        async: false,
        dataType: 'json',
        success: function (data) {
            addoption2();
            for(i=0; i<data.length; i++){
                console.log(data[i]);
                addoption2(btoa(JSON.stringify(data[i])));}
        
    } });
});

function addoption (jsonData=null) {
    console.log(jsonData);
    if(jsonData) jsonData = JSON.parse(atob(jsonData));
    else jsonData = {};
  
  let opt = `
  <option value="${jsonData?.city_name ? jsonData.city_name : ''}">${jsonData?.city_name ? jsonData.city_name : '- Choose Subdistrict -'}</option>
  `

  dinamisOption1.append(opt)
  }

  function addoption2 (jsonData=null) {
    console.log(jsonData);
    if(jsonData) jsonData = JSON.parse(atob(jsonData));
    else jsonData = {};
  
  let opt = `
  <option value="${jsonData?.postal_code ? jsonData.postal_code : ''}">${jsonData?.postal_code ? jsonData.postal_code : '- Choose Postalcode -'}</option>
  `

  dinamisOption2.append(opt)
  }
  $("#district").change();
  $("#subdistrict").change();
});

