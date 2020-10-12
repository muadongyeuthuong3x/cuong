
$(document).ready(function() {

   // var count = $('.cart_quantity_input').val();
  $('.cart_quantity_up').on('click',function(){
      var count =  $(this).parents('.cart_quantity').find('.cart_quantity_input').val();
      var price =  $(this).parents('.cart_quantity').find('.cart_total_price1').text();
     
      console.log(price)
       count++;
       $(this).parents('.cart_quantity').find('.cart_quantity_input').val(count);
       $(this).parents('.cart_quantity').find('.cart_total_price').text(price);
  })

  $('.cart_quantity_down').on('click',function(){
    var count =  $(this).parents('.cart_quantity').find('.cart_quantity_input').val();
    if(count>1){
     count--; }
     else{
         count ==1;
     }
     $(this).parents('.cart_quantity').find('.cart_quantity_input').val(count);
})

$('.anhien').click(function(){
    $('.anchon').hide();
})

})
