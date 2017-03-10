setTimeout(function(){$('.info').fadeOut()},1000);
setTimeout(function(){$('.error').fadeOut()},3000);

$('#answer-button').on('click',toggleForm);


function toggleForm(){
    let form=$('body div.answer-form');
    if(form.css('display')=='none'){
        form.css('display','block');
    }
    else{
        form.css('display','none')
    }

}