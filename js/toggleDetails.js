$(function () {

    /*$('.toggle').click(function(){
        listItemII = document.getElementById( "ii" );
        //$(".toggleblock").toggle(300);
        $( '.toggle' )
            .closest( "div")
            .toggle(300);
    });*/

    $( '.toggle' ).click(function(){
        //$(".viewhideblock").toggle(300);
        $(this)
            .closest("div")
            .siblings()
            .toggle(300);
    });

});