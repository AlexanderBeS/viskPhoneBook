$(function () {
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

