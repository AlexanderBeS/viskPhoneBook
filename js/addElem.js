
var cloneCountPh = 2;
var cloneCountEm = 2;

$(".addphone").click(function(){
    let currentCountPh = cloneCountPh++;
    let $parent = $('.clonephonediv');
    let $phonediv = $parent.find('.phone').first().clone();
    let $checkbox = $phonediv.find('input[type="checkbox"]');
    let $input = $phonediv.find('input[type="text"]');

    $checkbox.prop('checked', false);
    $input.val('');
    $checkbox.attr('name', 'visiblephone'+ currentCountPh);
    $input.attr('name', 'phonenumbers'+ currentCountPh);

    $parent.append($phonediv);
});



$(".addemail").click(function(){
    let currentCountEm = cloneCountEm++;
    let $parent = $('.cloneemaildiv');
    let $emaildiv = $parent.find('.email').first().clone();
    let $checkbox = $emaildiv.find('input[type="checkbox"]');
    let $input = $emaildiv.find('input[type="text"]');

    $checkbox.prop('checked', false);
    $input.val('');
    $checkbox.attr('name', 'visibleemail'+ currentCountEm);
    $input.attr('name', 'emails'+ currentCountEm);

    $parent.append($emaildiv);
});
