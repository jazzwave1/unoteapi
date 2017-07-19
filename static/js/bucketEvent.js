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


