var _dHeight = $(document).height();
var _dWidth = $(document).width();
var _wWidth = $(window).width();


function responsiveView() {
    var wSize = $(window).width();
    var wHeight = $(window).height();
    var detailViewWidth = wSize - 530;
    var detailViewHeight = wHeight - 120;
    var cTableWidth = wSize - 231;
    var scrollHeight = wHeight - 141;
    
    $("#detailView").css({
        'width' : detailViewWidth
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

/*detailView icon button toolTip*/
$( ".p-btn ul li a" )
    .mouseenter(function() {
        $( this ).find( "span" ).removeClass("hide");
    })
    .mouseleave(function() {
        $( this ).find( "span" ).addClass("hide");
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

        
