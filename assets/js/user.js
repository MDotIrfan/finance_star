$( document ).ready(function() {
    let ids = $('#status').val();
    change_form(ids);
});

$("#status").on('change', function(el) {
ids = $(el.target).val();
change_form(ids);
});

function change_form(ids=null){
    if(ids==1||ids==5){
        document.getElementById("labelmp").style.display = "block";
        document.getElementById("mp").style.display = "block";
        document.getElementById("labelcb").style.display = "block";
        document.getElementById("cb").style.display = "block";
        document.getElementById("labelnorek").style.display = "block";
        document.getElementById("norek").style.display = "block";
        document.getElementById("labeladdress").style.display = "block";
        document.getElementById("address").style.display = "block";
        document.getElementById("labelnpwp").style.display = "block";
        document.getElementById("npwp").style.display = "block";
        document.getElementById("labeljenis").style.display = "block";
        document.getElementById("jenis").style.display = "block";
    } else {
        document.getElementById("labelmp").style.display = "none";
        document.getElementById("mp").style.display = "none";
        document.getElementById("labelcb").style.display = "none";
        document.getElementById("cb").style.display = "none";
        document.getElementById("labelnorek").style.display = "none";
        document.getElementById("norek").style.display = "none";
        document.getElementById("labeladdress").style.display = "none";
        document.getElementById("address").style.display = "none";
        document.getElementById("labelnpwp").style.display = "none";
        document.getElementById("npwp").style.display = "none";
        document.getElementById("labeljenis").style.display = "none";
        document.getElementById("jenis").style.display = "none";
        $('#mp').val('');
        $('#cb').val('');
        $('#norek').val('');
        $('#address').val('');
        $('#npwp').val('');
        $('#jenis').val('');
    }
}