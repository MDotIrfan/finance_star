$("#status").on('change', function(el) {
    volume = [];
price = [];
cost = [];
jum_table=0;
    let ids = $(el.target).val();
    dinamisRow.html('');
    if(ids!=''){
        $.ajax({
            type: 'ajax',
            url: `http://localhost/finance/freelance/tampilkanData/`+ids,
            async: false,
            dataType: 'json',
            success: function (data) {
                $('#noinv').val(data.no_inv);
                for(i=0; i<data.po.length; i++){
                    console.log(data);
                    addRow(btoa(JSON.stringify(data.po[i])));}
            
    } });
    } else {jum_table=0;addRow();$('#noinv').val('');}
       
});

$("#no_rek").on('change', function(el) {
    let ids = $(el.target).val();
    console.log(ids);
    change_table(ids);
    hitung();
});

$("#tipe").on('change', function(el) {
    let ids = $(el.target).val();
    console.log(ids);
    volume = [];
price = [];
cost = [];
jum_table=0;
    jum_table=0;
    dinamisTable.html('');
    if(ids==1){
        addTable_local();
    } else if(ids==2){
        addTable_luar();
    }
    if(ids!=''){
        $.ajax({
            type: 'ajax',
            url: `http://localhost/finance/freelance/tampilkanDataPo/`+ids,
            async: false,
            dataType: 'json',
            success: function (data) {
                for(i=0; i<data.length; i++){
                    console.log(data);
                    addoption(btoa(JSON.stringify(data[i])));}
            
    } });
    } else {}
});

function addoption (jsonData=null) {
    console.log(jsonData);
    if(jsonData) jsonData = JSON.parse(atob(jsonData));
    else jsonData = {};
  
  let opt = `
  <option value="${jsonData?.no_Po ? jsonData.no_Po : ''}">${jsonData?.no_Po ? jsonData.no_Po : ''}</option>
  `

  dinamisOption.append(opt)
  }

function change_table(ids=null){
    if(ids=='1'||ids==null){
        $('#swift').val('BBBAIDJA');
        $('#acc').val('0701137302');
    } else if (ids=='2'){
        $('#swift').val('BBBAIDJA');
        $('#acc').val('0902211411');
    } else if (ids=='3'){
        $('#swift').val('BBBAIDJA');
        $('#acc').val('090 2212221');
    } else if (ids=='4'){
        $('#swift').val('');
        $('#acc').val('3590119073');
    } else if (ids=='5'){
        $('#swift').val('');
        $('#acc').val('financedept@bintang‐35.net');
    } else {
        $('#swift').val('');
        $('#acc').val('');
    }
}
