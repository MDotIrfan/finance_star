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
                    addRow(btoa(JSON.stringify(data.po[i]))); 
                    $('#curr_awal').val(data.po[0].currency_po);
                    $('#company').val(data.po[0].company);
                    // $('#ps').val(data.po[0].nama_Pm);
                    // $('#email').val(data.po[0].email_pm);
                    if(data.po[0].currency_po=='IDR'){
                        document.getElementById("curr").innerHTML = 'Amount IDR';
                    } else if (data.po[0].currency_po=='USD'){
                        document.getElementById("curr").innerHTML = 'Amount USD';
                    } else if (data.po[0].currency_po=='EUR'){
                        document.getElementById("curr").innerHTML = 'Amount EUR';
                    }
                }
            
    } });
    } else {
        // dinamisRow.html('');
        // dinamisTable.html('');
        jum_table=0;addRow();
        $('#noinv').val('');
        document.getElementById("curr").innerHTML = 'Amount IDR';
        $('#curr_awal').val('IDR');
        $('#company').val('');
        // $('#ps').val('');
        // $('#email').val('');
    }   
});

$("#nopo").on('change', function(el) {
    volume = [];
price = [];
cost = [];
jum_table=0;
    let ids = $(el.target).val();
    let tipe = $('#tipe').val();
    dinamisRow.html('');
    if(ids!=''){
        if(tipe=='1'||tipe=='3'||tipe=='5'){
            $.ajax({
                type: 'ajax',
                url: `http://localhost/finance/finance/tampilkanData/`+ids,
                async: false,
                dataType: 'json',
                success: function (data) {
                    for(i=0; i<data.po.length; i++){
                        console.log(data);
                        $('#cn').val(data.po[i].client_Name);
                        $('#address').val(data.po[i].address);
                        $('#email').val(data.po[i].client_Email);
                        if(tipe==1){
                            addRow_luar(btoa(JSON.stringify(data.po[i])));
                        } else if(tipe==2){
                            addRow_local(btoa(JSON.stringify(data.po[i])));
                        }else if(tipe==3){
                            addRow_spq(btoa(JSON.stringify(data.po[i])));
                        }else if(tipe==4){
                            addRow_luar2(btoa(JSON.stringify(data.po[i])));
                        }else if(tipe==5){
                            addRow_spq2(btoa(JSON.stringify(data.po[i])));
                        }else{
                            addRow_luar();
                        }
                    }
                
        } });
        } else {
            $.ajax({
                type: 'ajax',
                url: `http://localhost/finance/finance/tampilkanDataitem/`+ids,
                async: false,
                dataType: 'json',
                success: function (data) {
                    for(i=0; i<data.po.length; i++){
                        console.log(data);
                        $('#cn').val(data.po[i].client_Name);
                        $('#address').val(data.po[i].address);
                        $('#email').val(data.po[i].client_Email);
                        if(tipe==1){
                            addRow_luar(btoa(JSON.stringify(data.po[i])));
                        } else if(tipe==2){
                            addRow_local(btoa(JSON.stringify(data.po[i])));
                        }else if(tipe==3){
                            addRow_spq(btoa(JSON.stringify(data.po[i])));
                        }else if(tipe==4){
                            addRow_luar2(btoa(JSON.stringify(data.po[i])));
                        }else if(tipe==5){
                            addRow_spq2(btoa(JSON.stringify(data.po[i])));
                        }
                    }
                
        } });
        }
        
    } else {jum_table=0;addRow();$('#noinv').val('');}   
});

$("#nopo_2").on('change', function(el) {
    volume = [];
price = [];
cost = [];
jum_table=0;
    let ids = $(el.target).val();
    let tipe = $('#tipe').val();
    dinamisRow.html('');
    if(ids!=''){
        if(tipe=='1'||tipe=='3'||tipe=='5'){
            $.ajax({
                type: 'ajax',
                url: `http://localhost/finance/finance/tampilkanData/`+ids,
                async: false,
                dataType: 'json',
                success: function (data) {
                    for(i=0; i<data.po.length; i++){
                        console.log(data);
                        $('#cn').val(data.po[i].client_Name);
                        $('#address').val(data.po[i].address);
                        $('#email').val(data.po[i].client_Email);
                        $('#curr_awal').val(data.po[i].currency_po);
                        $('#curr').val(data.po[i].currency_po);
                        // if(data.po[i].currency_po=='IDR'){
                        //     document.getElementById("curr").innerHTML = 'Amount IDR';
                        // } else if(data.po[i].currency_po=='USD'){
                        //     document.getElementById("curr").innerHTML = 'Amount USD';
                        // } else if(data.po[i].currency_po=='EUR'){
                        //     document.getElementById("curr").innerHTML = 'Amount EUR';
                        // }
                        if(tipe==1){
                            addRow_luar(btoa(JSON.stringify(data.po[i])));
                        } else if(tipe==2){
                            addRow_local(btoa(JSON.stringify(data.po[i])));
                        }else if(tipe==3){
                            addRow_spq(btoa(JSON.stringify(data.po[i])));
                        }else if(tipe==4){
                            addRow_luar2(btoa(JSON.stringify(data.po[i])));
                        }else if(tipe==5){
                            addRow_spq2(btoa(JSON.stringify(data.po[i])));
                        }else{
                            addRow_luar();
                        }
                    }
                
        } });
        } else {
            $.ajax({
                type: 'ajax',
                url: `http://localhost/finance/finance/tampilkanDataitem/`+ids,
                async: false,
                dataType: 'json',
                success: function (data) {
                    for(i=0; i<data.po.length; i++){
                        console.log(data);
                        $('#cn').val(data.po[i].client_Name);
                        $('#address').val(data.po[i].address);
                        $('#email').val(data.po[i].client_Email);
                        $('#curr_awal').val(data.po[i].currency_po);
                        $('#curr').val(data.po[i].currency_po);
                        if(tipe==1){
                            addRow_luar(btoa(JSON.stringify(data.po[i])));
                        } else if(tipe==2){
                            addRow_local(btoa(JSON.stringify(data.po[i])));
                        }else if(tipe==3){
                            addRow_spq(btoa(JSON.stringify(data.po[i])));
                        }else if(tipe==4){
                            addRow_luar2(btoa(JSON.stringify(data.po[i])));
                        }else if(tipe==5){
                            addRow_spq2(btoa(JSON.stringify(data.po[i])));
                        }
                    }
                
        } });
        }
        
    } else { 
    jum_table=0;
    dinamisTable.html('');
    addTable_luar('');
    $('#tipe').val('1');
    $('#cn').val('');$('#email').val('')}   
});

$("#no_rek").on('change', function(el) {
    let no_rek = $(el.target).val();
    console.log(no_rek);
    change_table(no_rek);
});


$("#tipe").on('change', function(el) {
    let ids = $(el.target).val();
    console.log(ids);
    volume = [];
price = [];
cost = [];
    jum_table=0;
    dinamisTable.html('');
    dinamisOption.html('');
    if(ids==1){
        addTable_luar();
    } else if(ids==2){
        addTable_local();
    }
    else if(ids==3){
        addTable_spq();
    }else if(ids==4){
        addTable_luar2();
    }else if(ids==5){
        addTable_spq2();
    }else{
        dinamisTable.html('');
        addTable_luar();
    }
    if(ids=='1'||ids=='3'||ids=='5'){
        $.ajax({
            type: 'ajax',
            url: `http://localhost/finance/finance/tampilkanDataPoWord/`,
            async: false,
            dataType: 'json',
            success: function (data) {
                addoption();
                for(i=0; i<data.length; i++){
                    console.log(data[i]);
                    addoption(btoa(JSON.stringify(data[i])));}
            
    } });
    } else {$.ajax({
        type: 'ajax',
        url: `http://localhost/finance/finance/tampilkanDataPoItem/`,
        async: false,
        dataType: 'json',
        success: function (data) {
            addoption();
            for(i=0; i<data.length; i++){
                console.log(data[i]);
                addoption(btoa(JSON.stringify(data[i])));}
        
} });}
});

function addoption (jsonData=null) {
    console.log(jsonData);
    if(jsonData) jsonData = JSON.parse(atob(jsonData));
    else jsonData = {};
  
  let opt = `
  <option value="${jsonData?.no_Po ? jsonData.no_Po : ''}">${jsonData?.no_Po ? jsonData.no_Po : '-'}</option>
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

$("#curr").on('change', function (el) {
    tujuan = $('#curr').val();
    console.log(tujuan);
    if (from_currencyEl == 'IDR' && tujuan == 'USD') {
      from_currencyEl = 'IDR'
      to_currencyEl = 'USD'
      calculate();
      from_currencyEl = 'USD'
      $('#curr_awal').val(from_currencyEl);
    }
    if (from_currencyEl == 'IDR' && tujuan == 'EUR') {
      from_currencyEl = 'IDR'
      to_currencyEl = 'EUR'
      calculate();
      from_currencyEl = 'EUR'
      $('#curr_awal').val(from_currencyEl);
    }
    if (from_currencyEl == 'USD' && tujuan == 'IDR') {
      from_currencyEl = 'USD'
      to_currencyEl = 'IDR'
      calculate();
      from_currencyEl = 'IDR'
      $('#curr_awal').val(from_currencyEl);
    }
    if (from_currencyEl == 'EUR' && tujuan == 'IDR') {
      from_currencyEl = 'EUR'
      to_currencyEl = 'IDR'
      calculate();
      from_currencyEl = 'IDR'
      $('#curr_awal').val(from_currencyEl);
    }
    if (from_currencyEl == 'USD' && tujuan == 'EUR') {
      from_currencyEl = 'USD'
      to_currencyEl = 'EUR'
      calculate();
      from_currencyEl = 'EUR'
      $('#curr_awal').val(from_currencyEl);
    }
    if (from_currencyEl == 'EUR' && tujuan == 'USD') {
      from_currencyEl = 'EUR'
      to_currencyEl = 'USD'
      calculate();
      from_currencyEl = 'USD'
      $('#curr_awal').val(from_currencyEl);
    }
  });
  
  function calculate() {
    var awal = [];
    var akhir = [];
    for (let i = 0; i < index; i++) {
      awal[i] = $(".price" + i).val();
    }
    console.log(awal);
    const from_currency = from_currencyEl;
    const to_currency = to_currencyEl;
  
    console.log(from_currency);
    console.log(to_currency);
  
    fetch(`https://api.exchangerate-api.com/v4/latest/${from_currency}`)
      .then(res => res.json())
      .then(res => {
        const rate = res.rates[to_currency];
        for (let i = 0; i < index; i++) {
          akhir[i] = (awal[i] * rate).toFixed(2);
          if (isNaN(akhir[i])) {
            $(".price" + i).val(0);
          } else {
            $(".price" + i).val(akhir[i]);
          }
          cost[i] = akhir[i]
          tampil();
          hitung(i);
        }
        console.log(akhir);
      })
  }
