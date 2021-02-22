String.prototype.permalink = function () {
    return this.toString().trim().toLowerCase().replace(/\s/g, '-');
};

// ajax request for add to cart
$('.add-to-cart-btn').on('click', function (e) {

    $.ajax({
        type: "GET",
        url: BASE_URL + 'shop/add-to-cart',
        data: {
            pid: $(this).data('id')
        },
        dataType: "html",

        success: function (response) {
            window.location.reload();
        }
    });
});

// permalink function
$('.original-text').on('focusout', function () {

    $('.target-text').val($(this).val().permalink());
});



// function for countdown
var now = new Date();
var countDownDate = new Date(now.getFullYear(), now.getMonth() + 1, 1).getTime();
draw_timecount(countDownDate);
//  function for countdonw
function draw_timecount(target_timestamp) {
    var left_time = target_timestamp - $.now();

    var days = Math.floor(left_time / (1000 * 60 * 60 * 24));
    var hours = Math.floor((left_time % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((left_time % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((left_time % (1000 * 60)) / 1000);

    $('.days').text(days);
    $('.hours').text(hours);
    $('.minutes').text(minutes);
    $('.seconds').text(seconds);

    setTimeout(function () {
        draw_timecount(target_timestamp);
    }, 1000);
}
// function for countdown



//autocomplete
$('body').on('click', 'a.autocom_link', function () {
    $('#res').html('');
    $('#search').val($(this).html());
});

$('#search').keyup(function (e) {
    var text = $(this).val();
    if (text == '') {
        $('#res').html('');
    } else {
        $('#res').html('');
        $.ajax({
            url: 'autocomplete',
            method: "get",
            data: {
                search: text
            },
            dataType: "json",
            success: function (data) {
                for (var b in data) {
                    $('#res').append('<a style="text-decoration:none; color:black" class="autocom_link" href="#">' + data[b]['ptitle'] + '</a><br>');
                    ///console.log(data[b]);
                }
            }
        })
    }
});
//autocomplete


$(function() {
    $("li a").click(function() {
       // remove classes from all
       $("li").removeClass("active");
       // add class to the one we clicked
       $(".my-li").addClass("active");
    });
 });