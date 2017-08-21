/*layout*/
var _dWidth = $(document).width();
var _wWidth = $(window).width();
var _detailViewWidth = _wWidth - 530;
/*var _cTableWidth = _wWidth - 231;*/
var wHeight = $(window).height();
var detailViewHeight = wHeight - 120;
var scrollHeight = wHeight - 141;

/*$("#cList").css({
    'width' : _cTableWidth
});*/

$(".page, .page-default").css({
    'height' :  detailViewHeight,
    'overflow-x' : 'hidden',
    'overflow-y' : 'scroll',
});
$(".scroll-subList").css({
    'height' :  scrollHeight,
    'overflow-x' : 'hidden',
    'overflow-y' : 'scroll',
});

function responsiveView() {
    /*$("#cList").css({
        'width' : _cTableWidth
    });*/
    $(".page, .page-default").css({
        'height' :  detailViewHeight,
        'overflow-x' : 'hidden',
        'overflow-y' : 'scroll',
    });
    $(".scroll-subList").css({
        'height' :  scrollHeight,
        'overflow-x' : 'hidden',
        'overflow-y' : 'scroll',
    });
}

$(window).on('load', responsiveView);
$(window).on('resize', responsiveView);


/*detailView icon button toolTip*/
$( ".p-btn ul li a" )
    .mouseenter(function() {
        $( this ).find( "span" ).removeClass("hide");
    })
    .mouseleave(function() {
        $( this ).find( "span" ).addClass("hide");
    });


/*gnb-menuIcon*/
$("#menubarIcon").click(function(){
    $(this).toggleClass('open');
});


/*logout*/
$(".userInfo").on("click",function () {
    $(".userBtn").slideToggle();
    $(".name i").toggleClass("fa-caret-down fa-caret-up");
});

/*퀵버튼*/
$(".bankSubList>li").mouseenter(function () {
    /* console.log("mouseenter");*/
     $(this).children(".quickBtn").show();
     $(".quickBtn").css({'background': 'rgba(0,0,0,0.2)'});
 });
$(".bankSubList>li").mouseleave(function () {
    /* console.log("mouseenter");*/
    $(this).children(".quickBtn").hide();
    $(".quickBtn").css({'background': '#fff'});
});


$('#menubarIcon').on('click',clickMenubar);
function clickMenubar() {
    /*if ($('#lnb').is(":visible") === true) {
        $('#detailView').css({
            'left': '0px',
            'width': _wWidth
        });
        $('.full-left-nav').css({
            'left': '-230px'
        });
        $("#bankSub").css({
            'left': '-530px'
        });
        $("#cList").css({
            'width': _wWidth
        });
        $(".c-inner").css({
            'left': 0
        });
        $('#lnb').hide();
    } else {
        $('#detailView').css({
            'left': '530px',
            'width' : _detailViewWidth
        });

        $('.full-left-nav').css({
            'left': '0'
        });
        $("#bankSub, .c-inner").css({
            'left': '230px'
        });
        $("#cList").css({
            'width':_cTableWidth
        });
        $('#lnb').show();
    }*/

}

