var _dHeight = $(document).height();
var _dWidth = $(document).width();

var _wHeight = $(window).height();
var _wWidth = $(window).width();

var detailViewWidth = _wWidth - 550;
console.log(_wWidth);
console.log(detailViewWidth);

$(".scroll-subList").css({
    'height' : _wHeight,
    'overflow-x' : 'hidden',
    'overflow-y' : 'scroll',
    
});

$("#detailView").css({
    'width' : detailViewWidth
});
/*full-left-nav 메뉴바 show/hide*/
/*$(function () {
    function responsiveView() {
        var wSize = $(window).width();
        if (wSize <= 768) {
            $('#wrap').addClass('sidebar-close');
            $('#contents').css({
                'margin-left': '0px'
            });
            $('.full-left-nav').css({
                'margin-left': '-250px'
            });
            $('.navList').hide();
        }

        if (wSize > 768) {
            $('#contents').css({
                'margin-left': '250px'
            });
            $('.navList').show();
            $('.full-left-nav').css({
                'margin-left': '0'
            });
            $("#wrap").removeClass("sidebar-closed");
        }
    }
    $(window).on('load', responsiveView);
    $(window).on('resize', responsiveView);
});


$('.menubar').click(function () {
    if ($('.navList').is(":visible") === true) {
        $('#contents').css({
            'margin-left': '0px'
        });
        $('.full-left-nav').css({
            'margin-left': '-250px'
        });
        $('.navList').hide();
        $("#wrap").addClass("sidebar-closed");
    } else {
        $('#contents').css({
            'margin-left': '250px'
        });
        $('.navList').show();
        $('.full-left-nav').css({
            'margin-left': '0'
        });
        $("#wrap").removeClass("sidebar-closed");
    }
});*/


$('.loginWrap .menubar').click(function(){
    alert("로그인!!!!");
});



$(".slide").on("click", function(){
    $(".subPost1").slideToggle();
});
        
