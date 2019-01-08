$(function () {
    var location = window.location.href;
    var cur_url = '/' + location.split('/').pop();

    $('.menu li').each(function () {
        var link = $(this).find('a').attr('href');

        if (cur_url == link)
        {
            $(this).addClass('current');
        }
    });

    $(document).on('click', '.menu li', function () {
        $(".menu li").removeClass();
        $(this).addClass('current');
    });


});

