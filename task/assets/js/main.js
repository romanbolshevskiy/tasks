function a(){
    size1 = $(".ind input[type='checkbox']").size();
    size2 = $(".ind input[type='checkbox']:checked").size();

    $("#pro").attr('value',size2);
    $("#pro").attr('max',size1);

   if(size1==size2){
        $("#pro").css('background','green')
   }
}
a();

var arr = [];

$(".ind input[type='checkbox']").blur(function () {
    if ($(this).attr("checked") != 'checked'){
        $(this).parent('.ind').find('form .course_click').css('text-decoration','line-through');
    }
    else{
        $('.ind form .course_click').css('text-decoration','initial');
    }

    $(".ind input[type='checkbox'] + form .course_click").css('text-decoration','initial');
    $(".ind input[type='checkbox']:checked + form .course_click").css('text-decoration','line-through');
    

    // витягнути ід чекбоксів
    //var c = $(this).attr('name');  
    //arr.push(c);

    a();
});



$(".hid").click(function () {
    $(".ind input[type='checkbox']:checked").hide();
    $(".ind input[type='checkbox']:checked").parent('.ind').hide();
});


$(".creation h4").click(function () {
    $(this).parent('.creation').find('form').show();
});


/*        add to cart         */
$(document).ready(function(){

    $('form.norm .course_click').click(function () {
        $(this).parent('.ind form.norm').find('.course_click').removeClass('input1');
        $(this).parent('.ind form.norm').find('.course_click').addClass('input2');
     
        $(this).parent('.ind form.norm').css('display','inline');
        $(this).parent('.ind form.norm').find('.submit').show();  
        
        $(this).parent('form').parent('.ind').find('.edit_delee').css('display','inline-block');

    });

    $('.ind form.norm .submit').click(function () {
        $(this).parent('.ind form.norm').find('.course_click').removeClass('input2');  
        $(this).parent('.ind form.norm').find('.course_click').addClass('input1');  
        $(this).hide();
        $('.edit_delee').hide();
        $(this).parent('.ind').find('.edit_delee').hide();
        $(this).parent('form.norm').css('display','inline-block');
    });

});