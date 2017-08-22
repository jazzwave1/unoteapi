/*
 * lnb script
 */

/*글감 카테고리*/
var _addCateg = $(".addCateg");
var _categList = $(".categList");

_addCateg.on("click", addCategList);

// 카테고리 추가
function addCategList(){

    $('.categList').children().siblings('li').children('a').show();
    $('.categList').children().siblings('li').children('input:not(.newCateg)').hide();

    if($('.newCateg').length < 1)
    {
      _categList.append( 
          '<li><input class="newCateg" type="text" onkeypress="if(event.keyCode==13) {addCategory(this);}"><span class="deleteCateg"><i class="fa fa-times" aria-hidden="true"></i></span></li>'
      );
    }
   
    var deleteCateg = $(".deleteCateg");
    deleteCateg.on("click", deletCategList);

    function deletCategList(){
        $(this).parent('li').remove();
    }
}
function addCategory(category)
{
    var name = category.value;

    if(name)
    {
        $.post(
          "/unoteapi/Article/setCategory"
          ,{
              "sCategoryName" : name
           }
          ,function(data, status) {
            if (status == "success")
            {
                if(data.code == 1)
                {
                  window.location.reload();
                }
                else
                {
                  alert(data.msg);
                }
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
// 카테고리 삭제
$('.categDelBtn').on('click', function(event){
  var category_id = $(this).parent().parent().attr('id');
  var c_idx = category_id.replace('category_','');

  if(confirm('삭제하시겠습니까? 이 카테고리의 모든 글감은 휴지통으로 이동됩니다.'))
  {
      $.post(
        "/unoteapi/Article/delCategory"
        ,{
             "category_idx" : c_idx 
         }
        ,function(data, status) {
          if (status == "success" && data.code == 1)
          {
              window.location="/unoteapi/Article/List";
              // console.log(data.aNoteDetail); 
          }
          // 삭제 실패
          else if (status == "success" && data.code == 999)
          {
              alert(data.msg);
          }
        }
      );
  }
});
// 카테고리 수정
$('.categEditBtn').on('click', function(event){
  var category_id = $(this).closest('li').attr('id');
  var c_idx = category_id.replace('category_','');
  var c_name = $('#categTit_'+c_idx).text();

  // 전체 카테고리 input 닫기
  $('#category_'+c_idx).siblings('li').children('a').show();
  $('#category_'+c_idx).siblings('li').children('input').hide();
  $('.newCateg').parent('li').remove();

  // 해당 카테고리 수정
  $('#category_'+c_idx).children('a').hide();
  $('#categInput_'+c_idx).show();
});

function editCategory(category)
{
    var c_idx = category.id.replace('categInput_','');
    var name = category.value;
    var origin_name = $('#categTit_'+c_idx).html();

    if(name == origin_name){
      $('#category_'+c_idx).children('a').show();
      $('#categInput_'+c_idx).hide();      
      return false;
    }

    if(c_idx && name)
    {
        $.post(
          "/unoteapi/Article/setCategory"
          ,{
               "category_idx" : c_idx
              ,"sCategoryName" : name
           }
          ,function(data, status) {
            if (status == "success")
            {
                if(data.code == 1)
                {
                  window.location.reload();
                }
                else
                {
                  alert(data.msg);
                }
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

/*
 * sub_list, sub_timeline script
 */
$(".timeline-li").on("click", getNoteInfo);
function getNoteInfo()
{
    $(this).siblings('li').removeClass('on');
    $(this).addClass('on');

    var n_idx = $(this).data( "n_idx" );

    $.post(
      "rpcGetNoteInfo"
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
}

$('.sublist-li').on('click', function(event){
    $(this).siblings('li').removeClass('on');
    $(this).addClass('on');

    if( $(this).hasClass('yetReadList') )
          $(this).removeClass('yetReadList');

    var t_idx = $(this).data( "t_idx" );
    var method = $(this).data( "method" );

    $.post(
      "/unoteapi/Article/rpcGetArticleInfo"
      ,{
           "t_idx" : t_idx
           ,"method" : method
       }
      ,function(data, status) {
        if (status == "success" && data.code == 1)
        {
            // 글감리스트 미확인 cnt
            if(data.unread_cnt) $('.num').html('<em>N</em>'+data.unread_cnt);

            // 북마크 css
            if(data.aArticleDetail['bookmark'] == 'Y')  $('.bookMark').children().children('i').addClass('on');
            else  $('.bookMark').children().children('i').removeClass('on');

            $('.p-info').data('t_idx', t_idx);
            $('.p-date').text(data.aArticleDetail['craw_data']['datetime']);
            $('.p-tit').html(data.aArticleDetail['craw_data']['title']);
            $('.p-url').html(data.aArticleDetail['url']);
            $('.p-inner').html(data.aArticleDetail['craw_data']['contents']);

            // console.log(data.aArticleDetail); 
        }
      }
    );
});


/*
 * textviewer script
 */

function getContentsUrl(contents)
{
    var t_idx = $('.p-info').data('t_idx');
    var n_idx = $('.p-info').data('n_idx');
    var hosturl = $(contents).data('hosturl');
    var controller = $(contents).data('controller');
    var url = hosturl+'/'+controller+'/view'+controller+'/';
    if(controller == 'Note')  url += n_idx;
    else if(controller == 'Article')  url += t_idx;

    return url;
}
function is_ie() {
  if(navigator.userAgent.toLowerCase().indexOf("chrome") != -1) return false;
  if(navigator.userAgent.toLowerCase().indexOf("msie") != -1) return true;
  if(navigator.userAgent.toLowerCase().indexOf("windows nt") != -1) return true;
  return false;
}

// 새창 열기
// $("a태그 클래스명").prop('href', 변경되는 url);
$(".newWindow").on("click", newWindow);
function newWindow()
{
    var retUrl = getContentsUrl(this);

    $(".newWindowBtn").prop("href",retUrl);
}

// 링크 복사
$(".copyLink").on("click", copyLink);
function copyLink()
{
    var retUrl = getContentsUrl(this);

    if( is_ie() ) {
      window.clipboardData.setData("Text", retUrl);
      alert("링크가 복사되었습니다.");
      return;
    }
    prompt("Ctrl+C를 눌러 링크를 복사하세요.", retUrl);
}

// 노트 삭제
$(".noteDelBtn").on("click", noteDelete);
function noteDelete()
{
    var n_idx = $('.p-info').data('n_idx');

    if(confirm('삭제된 노트는 복구가 절대 불가능합니다. 삭제하시겠습니까?'))
    {
        $.post(
          "rpcDeleteNote"
          ,{
               "n_idx" : n_idx 
           }
          ,function(data, status) {
            if (status == "success" && data.code == 1)
            {
                window.location.reload();
                // console.log(data.aNoteDetail); 
            }
            // 삭제 실패
            else
            {
                alert(data.msg);
            }
          }
        );
    }
}

// 글 삭제
$(".articleDelBtn").on("click", function(){
  var type = $('.p-info').data('type');
  var t_idx = $('.p-info').data('t_idx');

  if(type == 'trash')      trashDelete(t_idx);
  else                     articleDelete(t_idx);
});
function trashDelete(t_idx)
{
    if(confirm('휴지통에서 삭제한 글감은 복구가 절대 불가능합니다. 삭제하시겠습니까?'))
    {
        $.post(
          "rpcDeleteTrash"
          ,{
               "t_idx" : t_idx 
           }
          ,function(data, status) {
            if (status == "success" && data.code == 1)
            {
                window.location.reload();
                // console.log(data.aNoteDetail); 
            }
            // 삭제 실패
            else
            {
                alert(data.msg);
            }
          }
        );
    }
}

// $(".articleDelBtn").on("click", articleDelete);
function articleDelete(t_idx)
{
    if(confirm('삭제된 글감은 휴지통으로 이동됩니다.'))
    {
        $.post(
          "rpcDeleteArticle"
          ,{
               "t_idx" : t_idx 
           }
          ,function(data, status) {
            if (status == "success" && data.code == 1)
            {
                window.location.reload();
                // console.log(data.aNoteDetail); 
            }
            // 삭제 실패
            else
            {
                alert(data.msg);
            }
          }
        );
    }
}

// 북마크
$(".bookMark").on("click", function(){
  var t_idx = $('.p-info').data('t_idx');
  articleBookmark(t_idx);
});

function articleBookmark(t_idx)
{
    $.post(
      "/unoteapi/Article/rpcBookmarkArticle"
      ,{
           "t_idx" : t_idx 
       }
      ,function(data, status) {
        if (status == "success" && data.code == 1)
        {
          $('.Bookmark').children().children('.lnb-cnt').html(data.total_cnt);

          if(data.type == 'chk')
          {
              $('#bookMark'+t_idx).show();
              // $('.bookMark').children().children('i').addClass('on');
          }
          else if(data.type == 'unchk')
          {
              $('#bookMark'+t_idx).hide();
              // $('.bookMark').children().children('i').removeClass('on');
          }
        }
        // 삭제 실패
        else
        {
            alert(data.msg);
        }
      }
    );
}

// 내노트 수정하기
$(".editMynoteBtn").on("click", editMynote);
function editMynote()
{
    var n_idx = $('.p-info').data('n_idx');

    var url = '/unote/index.php?n_idx='+n_idx;

    window.open(url);
}

//카테고리 이동 버튼 클릭 이벤트
$(".moveCategBtn").click(function(){
    $(".moveCategBtn").toggleClass("on");
    $(".selCateg").show();
});
$(document).mouseup(function (e) {
    var container = $(".selCateg");
    if (!container.is(e.target) && container.has(e.target).length === 0){
        container.hide();
        $(".moveCategBtn").removeClass("on");
    }
});

// 카테고리 이동 이벤트
$(".goCateg").on("click", goCateg);
function goCateg()
{
    var c_idx = $(this).data('c_idx');
    var t_idx = $('.p-info').data('t_idx');

    $.post(
      "/unoteapi/Article/rpcGoCategoryArticle"
      ,{
           "c_idx" : c_idx 
           ,"t_idx" : t_idx 
       }
      ,function(data, status) {
        if (status == "success" && data.code == 1)
        {
            window.location.reload();
            // console.log(data.aNoteDetail); 
        }
        // 삭제 실패
        else
        {
            alert(data.msg);
        }
      }
    );
}

function delHistoryArticle(q_idx)
{
    if(confirm('삭제된 글감은 복구가 절대 불가능합니다. 삭제하시겠습니까?'))
    {
      $.post(
        "/unoteapi/Crawling/rpcDelHistoryArticle"
        ,{
             "q_idx" : q_idx 
         }
        ,function(data, status) {
          if (status == "success" && data.code == 1)
          {
              window.location.reload();
              // console.log(data.aNoteDetail); 
          }
          // 삭제 실패
          else
          {
              alert(data.msg);
          }
        }
      ); 
    }


}