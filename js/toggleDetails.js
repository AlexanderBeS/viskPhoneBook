$(function () {
    $( '.toggle' ).click(function(){
        $(this)
            .closest("div")
            .siblings()
            .toggle(300);
        //console.log($(this).closest("div").siblings().css('display'));

        if ( $(this).text() == "Hide details") {
            $(this).text("View details");
        } else {
            $(this).text("Hide details");
        }
    });
});