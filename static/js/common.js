var _dHeight = $(document).height();
var _dWidth = $(document).width();
var _wWidth = $(window).width();
var _detailViewWidth = _wWidth - 530;
var _cTableWidth = _wWidth - 231;


/*test*/
/*
$(".lnbItemList").on('click',function () {
    $("#bankSub").addClass("show");
   /!* if ($('#bankSub').hasClass("show")) {
        $('.dvinner').addClass("show");
    } else {
        $('.dvinner').removeClass("show");
    }*!/




});
*/




var wHeight = $(window).height();

var detailViewHeight = wHeight - 120;

var scrollHeight = wHeight - 141;


$(".page").css({
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
    /*var wSize = $(window).width();*/


   /* $("#detailView").css({
        'width' : _detailViewWidth,
        'position' : 'absolute',
         'top':'0px',
         'left': '530px'
    });*/
   
    $("#cList").css({
        'width' : _cTableWidth
    });
    $(".page").css({
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
