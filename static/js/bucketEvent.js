/*글감 카테고리*/

var _addCateg = $(".addCateg");
var _categList = $(".categList");

_addCateg.on("click", addCategList);

function addCategList(){
    _categList.append( 
        '<li><input class="newCateg" type="text"><span class="deleteCateg"><i class="fa fa-times" aria-hidden="true"></i></span></li>'
    );
    
    var deleteCateg = $(".deleteCateg");
    deleteCateg.on("click", deletCategList);

    function deletCategList(){
        $(this).parent('li').remove();
    }
}

var _categBtn = $(".categBtn");

$(".pop-submit").on("click", notiDelete);

function notiDelete(){
    $(".dim-layer").hide();
    $(".pop-wrap").hide();
    _categBtn.children(".deleteBtn").parent().parent().remove();
}

/*$("a태그 클래스명").prop('href', 변경되는 url);*/
$(".newWindowBtn").prop("href","http://www.daum.net");


$(".noteDelBtn").on("click", noteDelete);

function noteDelete()
{
    var n_idx = $('.p-info').data('n_idx');

    if(confirm('삭제하시겠습니까? 삭제된 노트는 복구가 불가능합니다.'))
    {
        $.post(
          "<?=HOSTURL?>/Note/deleteNote"
          ,{
               "n_idx" : n_idx 
           }
          ,function(data, status) {
            if (status == "success" && data.code == 1)
            {
                alert(data.msg);
                window.location.reload();
                // console.log(data.aNoteDetail); 
            }
            // 삭제 실패
            else if (status == "")
            {
                alert(data.msg);
            }
          }
        );
    }
}

$(function(){
    $('.sublist-li').on('click', function(event){
        $(this).siblings('li').removeClass('on');
        $(this).addClass('on');
        
        var n_idx = $(this).data( "n_idx" );
        $.post(
          "<?=HOSTURL?>/Note/rpcGetNoteInfo"
          ,{
               "n_idx" : n_idx 
           }
          ,function(data, status) {
            if (status == "success" && data.code == 1)
            {
                $('.p-info').data('n_idx', n_idx);
                $('.p-date').text(data.aNoteDetail['regdate']);
                $('.p-tit').text(data.aNoteDetail['title']);
                $('.p-inner').html(data.aNoteDetail['text']);

                // console.log(data.aNoteDetail); 
            }
          }
        );   
    });
});
