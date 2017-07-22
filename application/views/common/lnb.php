                <!--lnb-->
                <div id="lnb" class="full-left-nav">
                    <div class="lnb-inner navList">
<?php
    // test code
    $usn = 1;

    $this->load->library('MenuClass');
    $aMenuList = MenuClass::getMenuList($usn);
?>

<!--menu-->
<?php foreach ($aMenuList as $controller => $aMenuData): ?>
                        <div class="lnbItem">
                            <p class="lnbItemTit">
                                <?=$aMenuData['title']?>
            <!--category add-->
            <?php if($controller == 'Category'): ?>
                                <span class="addCateg">
                                    <!--카테고리추가 버튼-->
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </span>
            <?php endif; ?>        
            <!--//category add-->                            
                            </p>

                            <ul class="lnbItemList <?=($controller == 'Category') ? 'categList' : ''?>">
    <!--submenu-->
    <?php foreach ($aMenuData['sub'] as $method => $aMenuSubData): ?>
        <?php if($aMenuSubData['is_use']): ?>
                <!--category-->
                <?php if($controller == 'Category'): ?>
                                <li id="category_<?=$method?>">
                                    <a href="<?=HOSTURL?>/<?=$controller?>/<?=$method?>"><span class="categTit" id="categTit_<?=$method?>"><?=$aMenuSubData['subtitle']?></span></a>
                                    <!--<input id="categInput_<?=$method?>" type="text" value="<?=$aMenuSubData['subtitle']?>" onkeypress="if(event.keyCode==13) {editCategory(this);}">-->
                                    <div class="categBtn">
                                        <span class="categEditBtn"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                                        <span class="categDelBtn"><i class="fa fa-times" aria-hidden="true"></i></span>
                                    </div>
                                </li>
                <!--//category-->
                <!--else-->
                <?php else: ?>
                                <li>
                                    <a href="<?=HOSTURL?>/<?=$controller?>/<?=$method?>">
                                    <i class="<?=$aMenuSubData['icon']?>" aria-hidden="true"></i><?=$aMenuSubData['subtitle']?>
                    <?php if($controller == 'Article'): ?>
                                    <span class="num">20</span>
                    <?php endif; ?>
                                    </a>
                                </li>
                <?php endif; ?>
                <!--//else-->
                <!--crawling btn-->
                <?php if($controller == 'Crawling'): ?>
                                <li class="cBtn">
                                    <a href="#cReqPop" data-popup="#cReqPop" class="croBtn layer-popup">수집하기</a>
                                    <a href="#" class="fupBtn">파일업로드</a>
                                </li>
                <?php endif; ?>
                <!--//crawling btn-->
        <?php endif; ?>
    <?php endforeach; ?>
    <!--//submenu-->
                            </ul>
                        </div>
<?php endforeach; ?>
<!--//menu-->
                        <!--새글쓰기 버튼-->
                        <div class="newNoteBtn">
                            <a href="#"><i class="fa fa-file-text-o" aria-hidden="true"></i>새글쓰기</a>
                        </div>
                    </div>
                </div>
                <!--//lnb-->

                <!--카테고리 수정 팝업-->
                <div class="pop-wrap" id="categEditPop" style="display:none">
                    <div class="pop-header">
                        <span>카테고리 수정</span><a href="#none" class="btnp-close"><i class="fa fa-times" aria-hidden="true"></i></a>
                    </div>
                    <div class="pop-cont">
                        <form action="">
                            <p>카테고리 이름을 수정하세요.</p>
                            <input type="text" value="">
                            <div class="pop-btn">
                                <a href="javascript:;">확인</a> <a href="#none" class="btnp-close">취소</a>
                            </div>
                        </form>
                    </div>
                </div>
                <!--카테고리 삭제 팝업-->
                <div class="pop-wrap" id="categDeletePop" style="display:none">
                    <div class="pop-header">
                        <span>카테고리 삭제</span><a href="#none" class="btnp-close"><i class="fa fa-times" aria-hidden="true"></i></a>
                    </div>
                    <div class="pop-cont">

                        <p>카테고리 삭제 하시겠습니까?</p>

                        <div class="pop-btn">
                            <a href="javascript:;" class="pop-submit">확인</a> <a href="#none" class="btnp-close">취소</a>
                        </div>

                    </div>
                </div>
<!--layer-popup-->
    <div class="pop-wrap" id="cReqPop" style="display:none">
        <div>
            <div class="pop-header">
                <span>크롤링 로봇 수집 설정</span>
                <a href="#none" class="btnp-close"><i class="fa fa-times" aria-hidden="true"></i></a>
            </div>
            <div class="pop-box">
                <div class="pop-cont">
                    <ul class="sns-tab clearfix">
                        <li class="on"><a href="javascript:setSite(1);" >naver</a></li>
                        <li><a href="javascript:setSite(2);">daum</a></li>
                        <li><a href="javascript:setSite(3);">facebook</a></li>
                        <input type="hidden" id="site" value="" > 
                        <input type="hidden" id="usn" value="<?=$usn?>" > 
                    </ul>
                    <!--수집 대상 선택 및 로그인 화면-->
                    <div>
                        <div class="login0 pop-login">
                            <div class="tit">
                                네이버 카페 게시글 수집
                            </div>
                            <div class="notice">
                                개인정보보호법에 의거, 아이디/패스워드는 에듀니티에서 저장하지 않습니다.
                                <br> 번거롭더라도 수집 시, 개별 로그인이 필요합니다.
                            </div>
                            <div class="log-form n-log-form">
                                <form action="" method="post">
                                    <fieldset>
                                        <input id="naverUserId" type="text" name="id" placeholder="아이디">
                                        <input id="naverUserPwd" type="password" name="pwd" placeholder="비밀번호">
                                        <p class="log-formBtn">
                                            <a href="javascript:callCrawl();">로그인</a>
                                        </p>
                                        <p class="log-notice">
                                            * 아이디를 입력하세요 / * 비밀번호를 입력하세요 / * 입력정보를 확인해주세요
                                        </p>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                        <div class="login1 pop-login">
                            <div class="tit">
                                다음 카페 게시글 수집
                            </div>
                            <div class="notice">
                                개인정보보호법에 의거, 아이디/패스워드는 에듀니티에서 저장하지 않습니다.
                                <br> 번거롭더라도 수집 시, 개별 로그인이 필요합니다.
                            </div>
                            <div class="log-form d-log-form">
                                <form action="" method="post">
                                    <fieldset>
                                        <input id="daumUserId" type="text" name="id" placeholder="아이디">
                                        <input id="daumUserPwd" type="password" name="pwd" placeholder="비밀번호">
                                        <p class="log-formBtn">
                                            <a href="javascript:callCrawl();">로그인</a>
                                        </p>
                                        <p class="log-notice">
                                            * 아이디를 입력하세요 / * 비밀번호를 입력하세요 / * 입력정보를 확인해주세요
                                        </p>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                        <div class="login2 pop-login">
                            <div class="tit">
                                페이스북 게시글 수집
                            </div>
                            <div class="notice">
                                개인정보보호법에 의거, 아이디/패스워드는 에듀니티에서 저장하지 않습니다.
                                <br> 번거롭더라도 수집 시, 개별 로그인이 필요합니다.
                            </div>
                            <div class="log-form f-log-form">
                                <form action="" method="post">
                                    <fieldset>
                                        <input id="facebookToken" type="text" name="id" placeholder="토큰">
                                        <p class="log-formBtn">
                                            <a href="javascript:callCrawl();">로그인</a>
                                        </p>
                                        <p class="log-notice">
                                            * 아이디를 입력하세요 / * 비밀번호를 입력하세요 / * 입력정보를 확인해주세요
                                        </p>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--//layer-popup-->
    
    
<script>
function setSite(site)
{
    $('#site').val(site);
}
function callCrawl()
{
//  var test = new Array();
//  var cnt = 0;
//  $("input[id=filter]:checked").each(function() {
//      test[cnt] = $(this).val() ;
//      console.log(test);
//      cnt++;
//  });

    var test = new Array(); 
    var s_id = "";
    var s_pwd = ""; 
    if( $('#site').val() == 1 || $('#site').val() == "" )
    {
        $('#site').val(1);
        var s_id  = $('#naverUserId').val(); 
        var s_pwd = $('#naverUserPwd').val(); 
    }else if( $('#site').val() == 2 ){
        var s_id  = $('#daumUserId').val(); 
        var s_pwd = $('#daumUserPwd').val(); 
    }else if( $('#site').val() == 3 ){
        var s_id  = "AT"; 
        var s_pwd = $('#facebookToken').val(); 
    } 
    $.post(
      "<?=HOSTURL?>/Crawling/rpcCrawling"
      ,{
           "site"   : $('#site').val() 
           ,"s_id"  : s_id 
           ,"s_pwd" : s_pwd 
           ,"usn"   : $('#usn').val() 
           ,"filter" : test 
       }
      ,function(data, status) {
        if (status == "success" && data.code == 1)
        {
            alert('요청되었습니다.');
            location.href = "<?=HOSTURL?>/Crawling/History";
        }
      }
    );         
}      
</script>

