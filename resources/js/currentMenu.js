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
    $(document).on('click', 'a[href="/phonebook"]', function (e) {
        e.preventDefault();
        getDynamicContent('/phonebook', {ajax: true});
        // $(...).removeClass('.active');
        // $(...).addClass('.active');
    });
});

function getDynamicContent (route, data)
{
    $.post(route, data, function (response) {
        $('.dynamic').empty().append(response);
    });
}

