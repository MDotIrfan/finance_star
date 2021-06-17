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
            url: `http://localhost/finance/freelance/tampilkanDataitem/`+ids,
            async: false,
            dataType: 'json',
            success: function (data) {
                console.log(data.no_inv);
                $('#noinv').val(data.no_inv);
                for(i=0; i<data.po.length; i++){
                    console.log(data);
                    addRow(btoa(JSON.stringify(data.po[i])));}
            
    }
  
   });
    } else {jum_table=0;addRow();$('#noinv').val('');}
       
});