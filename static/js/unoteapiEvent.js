/*글감 카테고리*/
var _addCateg = $(".addCateg");
var _categList = $(".categList");

_addCateg.on("click", addCategList);

// 카테고리 추가
function addCategList(){
    _categList.append( 
        '<li><input class="newCateg" type="text" onkeypress="if(event.keyCode==13) {addCategory(this);}"><span class="deleteCateg"><i class="fa fa-times" aria-hidden="true"></i></span></li>'
    );
    
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
            if (status == "success" && data.code == 1)
            {
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

// 카테고리 삭제
$('.categDelBtn').on('click', function(event){
  var category_id = $(this).parent().parent().attr('id');
  var c_idx = category_id.replace('category_','');

  if(confirm('삭제하시겠습니까? 해당 카테고리의 글감은 글감 리스트로 이동됩니다.'))
  {
      $.post(
        "/unoteapi/Article/delCategory"
        ,{
             "category_idx" : c_idx 
         }
        ,function(data, status) {
          if (status == "success" && data.code == 1)
          {
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
});

// 카테고리 수정
$('.categEditBtn').on('click', function(event){
  var category_id = $(this).closest('li').attr('id');
  var c_idx = category_id.replace('category_','');
  var c_name = $('#categTit_'+c_idx).text();

  $('#categTit_'+c_idx).parent().remove();

  if($('#categInput_'+c_idx).length < 1)
  {
    $('#category_'+c_idx).prepend(
      '<input id="categInput_'+c_idx+'" type="text" value="'+c_name+'" onkeypress="if(event.keyCode==13) {editCategory(this);}">'
    );
  }
});

function editCategory(category)
{
    var name = category.value;
    var c_idx = category.id.replace('categInput_','');

    if(c_idx && name)
    {
        $.post(
          "/unoteapi/Article/setCategory"
          ,{
               "category_idx" : c_idx
              ,"sCategoryName" : name
           }
          ,function(data, status) {
            if (status == "success" && data.code == 1)
            {
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



/*$("a태그 클래스명").prop('href', 변경되는 url);*/
$(".newWindowBtn").prop("href","http://www.daum.net");


/*노트 삭제*/
$(".noteDelBtn").on("click", noteDelete);

function noteDelete()
{
    var n_idx = $('.p-info').data('n_idx');

    if(confirm('삭제하시겠습니까? 삭제된 노트는 복구가 불가능합니다.'))
    {
        $.post(
          "deleteNote"
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

$('.timeline-li').on('click', function(event){
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
});

$('.sublist-li').on('click', function(event){
    $(this).siblings('li').removeClass('on');
    $(this).addClass('on');
    
    var t_idx = $(this).data( "t_idx" );

    $.post(
      "rpcGetArticleInfo"
      ,{
           "t_idx" : t_idx 
       }
      ,function(data, status) {
        if (status == "success" && data.code == 1)
        {
            $('.p-info').data('t_idx', t_idx);
            $('.p-date').text(data.aArticleDetail['regdate']);
            $('.p-tit').text(data.aArticleDetail['craw_data']['title']);
            $('.p-inner').html(data.aArticleDetail['craw_data']['contents']);

            // console.log(data.aArticleDetail); 
        }
      }
    );
});