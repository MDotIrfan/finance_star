$( document ).ready(function() {
    let ids = $('#status').val();
    change_form(ids);
});

$("#status").on('change', function(el) {
ids = $(el.target).val();
change_form(ids);
});

function change_form(ids=null){
    if(ids==1){
        document.getElementById("space-fl").style.display = "flex";
        document.getElementById("space-vendor").style.display = "none";
    } else if(ids==5){
        document.getElementById("space-vendor").style.display = "flex";
        document.getElementById("space-fl").style.display = "none";
    } else {
        document.getElementById("space-vendor").style.display = "none";
        document.getElementById("space-fl").style.display = "none";
    }
}