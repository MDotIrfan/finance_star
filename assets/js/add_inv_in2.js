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
            url: base_url(`freelance/tampilkanDataitem/`)+ids,
            async: false,
            dataType: 'json',
            success: function (data) {
                console.log(data.no_inv);
                $('#noinv').val(data.no_inv);
                for(i=0; i<data.po.length; i++){
                    console.log(data);
                    addRow(btoa(JSON.stringify(data.po[i])));
                    $('#curr_awal').val(data.po[0].currency_po);
                    $('#company').val(data.po[0].company);
                    if(data.po[0].resource_Status=='Freelance'){
                        jenis='ftn';
                    } else if(data.po[0].resource_Status=='Tenaga Ahli'){
                        jenis='tatn';
                    } else if(data.po[0].resource_Status=='Vendor'){
                        jenis='vendor';
                    }
                    console.log(jenis);
                    $('#tax-tipe').val(jenis);
                    // $('#ps').val(data.po[0].nama_Pm);
                    // $('#email').val(data.po[0].email_pm);
                    if(data.po[0].currency_po=='IDR'){
                        document.getElementById("curr").innerHTML = 'Amount IDR';
                    } else if (data.po[0].currency_po=='USD'){
                        document.getElementById("curr").innerHTML = 'Amount USD';
                    } else if (data.po[0].currency_po=='EUR'){
                        document.getElementById("curr").innerHTML = 'Amount EUR';
                    }
                    tampil()
                }
            
    }
  
   });
    } else {jum_table=0;
        addRow();$('#noinv').val('');
        document.getElementById("curr").innerHTML = 'Amount IDR';
        $('#curr_awal').val('IDR');
        $('#company').val('');
        tampil()
    }
       
});