$(document).ready(function() {
    dinamisOption1 = $('#district');
dinamisOption2 = $('#subdistrict');
dinamisOption3 = $('#postal_code');

$("#province").on('change', function(el) {
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

$("#district").on('change', function(el) {
    let ids = $(el.target).val();
    console.log(ids);
    dinamisOption2.html('');
    $.ajax({
        type: 'ajax',
        url: base_url(`user/tampilkanDataSubDis/`)+ids,
        async: false,
        dataType: 'json',
        success: function (data) {
            addoption2();
            for(i=0; i<data.length; i++){
                console.log(data[i]);
                addoption2(btoa(JSON.stringify(data[i])));}
        
    } });
});

$("#subdistrict").on('change', function(el) {
    let ids = $(el.target).val();
    console.log(ids);
    dinamisOption3.html('');
    $.ajax({
        type: 'ajax',
        url: base_url(`user/tampilkanDataPostal/`)+ids,
        async: false,
        dataType: 'json',
        success: function (data) {
            addoption3();
            for(i=0; i<data.length; i++){
                console.log(data[i]);
                addoption3(btoa(JSON.stringify(data[i])));}
        
    } });
});

function addoption (jsonData=null) {
    console.log(jsonData);
    if(jsonData) jsonData = JSON.parse(atob(jsonData));
    else jsonData = {};
  
  let opt = `
  <option value="${jsonData?.city_name ? jsonData.city_name : ''}" ${(jsonData.city_name==city) ? 'Selected':''}>${jsonData?.city_name ? jsonData.city_name : '- Choose District -'}</option>
  `

  dinamisOption1.append(opt)
  }

  function addoption2 (jsonData=null) {
    console.log(jsonData);
    if(jsonData) jsonData = JSON.parse(atob(jsonData));
    else jsonData = {};
  
  let opt = `
  <option value="${jsonData?.dis_name ? jsonData.dis_name : ''}" ${(jsonData.dis_name==district) ? 'Selected':''}>${jsonData?.dis_name ? jsonData.dis_name : '- Choose Subdistrict -'}</option>
  `

  dinamisOption2.append(opt)
  }

  function addoption3 (jsonData=null) {
    console.log(jsonData);
    if(jsonData) jsonData = JSON.parse(atob(jsonData));
    else jsonData = {};
  
  let opt = `
  <option value="${jsonData?.postal_code ? jsonData.postal_code : ''}" ${(jsonData.postal_code==postal_code) ? 'Selected':''}>${jsonData?.postal_code ? jsonData.postal_code : '- Choose Postal Code -'}</option>
  `

  dinamisOption3.append(opt)
  }
  $("#province").change();
  $("#district").change();
  $("#subdistrict").change();
});

