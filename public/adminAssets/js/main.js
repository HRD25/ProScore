$(document).on('click','#btn_menu',function(){
    if($('.sidebar').hasClass('active') == false){
    $('.sidebar').addClass('active');
    }else{
    $('.sidebar').removeClass('active');
    }
});
