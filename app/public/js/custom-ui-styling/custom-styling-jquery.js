/**
 * Created by Taban on 4/26/16.
 */

$(document).ready(function (e) {

    $('.menu a').click(function (e) {
        // e.preventDefault(); //prevent the link from being followed
        $('.menu a').removeClass('selected');
        $(this).addClass('selected');
    });
})