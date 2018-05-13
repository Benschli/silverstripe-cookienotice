/**
 * Created by Ben on 11.05.2018.
 */

$( document ).ready(function() {
    $('#CookieNotice button').on('click', function() {
        var url = '/home/CookieNoticeAccept';
        $.ajax({
            type: "POST",
            url: url
        })
            .done(function (response) {

            })
            .fail (function (xhr) {
                alert('Error: ' + xhr.responseText);
            });
        $('#CookieNotice').remove();
    });
});