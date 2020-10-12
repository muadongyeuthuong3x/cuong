$(document).ready(function() {
    $(".suasanpham").hide();
  $('.hangsp').click(function(){
      $('.anchon').hide();
  })
  $(".edittensp").click(function(){
    $(".suasanpham").show();
    $(".suasanpham").addClass("hiensua");

  });
  $(".xoasua").click(function(){
    $(".suasanpham").hide();
  });


  $(".xoacanel").click(function(){
    $(".suasanpham").hide();
  });


  if( $(".mucsp option").val ==''){
  $(".mucsp option").hide();}

  $(".btn-success").click(function(){
    var html = $(".clone").html();
    $(".increment").after(html);
});

$("body").on("click",".btn-danger",function(){
    $(this).parents(".control-group").remove();
});
$('.listrole').select2({
    'placeholder':'chọn vai trò'

});

$('.checkbox_wrapper').on('click',function(){
    $(this).parents('.card').find('.checkbox_childrent').prop('checked' ,$(this).prop('checked'));
    // tìm phần tử cha chứa tất cả =>tìm phần tử con chứa  checkbox_childrent các quyền sao đó thêm checked vào và có giá trị true false để
    // chọn hoặc ko chọn $(this).prop('checked') = true or false
})





})

