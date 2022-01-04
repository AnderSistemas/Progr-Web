
$(document).ready(function(){function sendDataProduct(){
       
$('.alertAddProduct').html('');

$.ajax({
url: 'ajax.php',
type: 'POST',
async: true,
data: $('#form_add_product').serialize(),


success: function(response){
  if(response == 'error'){

   
  }else{

    var info = JSON.parse(response);
    $('.row'+info.Id+' .celPrecio').html(info.nuevo_total);
    $('#txtCantidad').val('');
     
  
},

error: function(error){
    console.log(error);
}

});



}