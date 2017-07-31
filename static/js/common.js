var _dHeight = $(document).height();
var _dWidth = $(document).width();
var _wWidth = $(window).width();
var _detailViewWidth = _wWidth - 530;

function responsiveView() {
    var wSize = $(window).width();
    var wHeight = $(window).height();

    var detailViewHeight = wHeight - 120;
    var cTableWidth = wSize - 231;
    var scrollHeight = wHeight - 141;
    
    $("#detailView").css({
        'width' : _detailViewWidth
    });
   
    $("#cList").css({
        'width' : cTableWidth
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
    if ($('#lnb').is(":visible") === true) {
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
        $('#lnb').hide();
    } else {
        $('#detailView').css({
            'left': '530px',
            'width' : _detailViewWidth
        });

        $('.full-left-nav').css({
            'left': '0'
        });
        $("#bankSub").css({
            'left': '230px'
        });
        $('#lnb').show();
    }
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
$('#menubarIcon').click(function(){
    $(this).toggleClass('open');
});

        
