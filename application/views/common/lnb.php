<?php
$this_url = $this->uri->segment(1).'/'.$this->uri->segment(2);
if($this->uri->segment(2) == 'Category')
{
    $this_url = $this->uri->segment(2).'/'.$this->uri->segment(3);
}
?>
                <!--lnb-->
                <div id="lnb" class="full-left-nav">
                    <div class="lnb-inner navList">
                        <!--새글쓰기 버튼-->
                        <div class="lnb-sideinner">
                            <div class="newNoteBtn">
                                <a href="/unote/index.php" target="_blank"><i class="fa fa-file-text-o" aria-hidden="true"></i>새글쓰기</a>
                            </div>
                        </div>
                        <!--menu-->
                        <?php foreach ($aMenuList as $controller => $aMenuData): ?>
                        <div class="lnbItem">
                            <div class="lnb-sideinner">
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
                                <li id="category_<?=$method?>" class="<?=($this_url == $controller.'/'.$method) ? 'on' : ''?>">
                                    <a href="<?=HOSTURL?>/Article/<?=$controller?>/<?=$method?>"><i class="<?=$aMenuSubData['icon']?>" aria-hidden="true"></i><span class="categTit" id="categTit_<?=$method?>"><?=$aMenuSubData['subtitle']?></span></a>
                                    <!--<input id="categInput_<?=$method?>" type="text" value="<?=$aMenuSubData['subtitle']?>" onkeypress="if(event.keyCode==13) {editCategory(this);}">-->
                                    <div class="categBtn">
                                        <span class="categEditBtn"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                                        <span class="categDelBtn"><i class="fa fa-times" aria-hidden="true"></i></span>
                                    </div>
                                </li>
                <!--//category-->
                <!--Crawling-->
                <?php elseif($controller == 'Crawling'): ?>
                                <li class="croList <?=($this_url == $controller.'/'.$method) ? 'on' : ''?>">
                                    <a href="<?=HOSTURL?>/<?=$controller?>/<?=$method?>">
                                        <i class="<?=$aMenuSubData['icon']?>" aria-hidden="true"></i><?=$aMenuSubData['subtitle']?></a>
                                    <span class="cBtn"><a href="#cReqPop" data-popup="#cReqPop" class="croBtn layer-popup">수집하기</a></span>
                                </li>
                <!--//Crawling-->
                <!--else-->
                <?php else: ?>
                                <li class="<?=($this_url == $controller.'/'.$method) ? 'on' : ''?>">
                                    <a href="<?=HOSTURL?>/<?=$controller?>/<?=$method?>">
                                    <i class="<?=$aMenuSubData['icon']?>" aria-hidden="true"></i><?=$aMenuSubData['subtitle']?>
                    <?php if($controller.'/'.$method == 'Article/List'): ?>
                                    <span class="num"><?=$aMenuSubData['unread_cnt']?></span>
                    <?php endif; ?>
                                    </a>
                                </li>
                <?php endif; ?>
                <!--//else-->
        <?php endif; ?>
    <?php endforeach; ?>
    <!--//submenu-->
                            </ul>
                            </div>
                        </div>
<?php endforeach; ?>
<!--//menu-->

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
                <a href="javascript:;" class="btnp-close"><i class="fa fa-times" aria-hidden="true"></i></a>
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
                                            <span id="noticeId" class="hide"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> 아이디를 입력하세요</span>
                                            <span id="noticePwd" class="hide"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> 비밀번호를 입력하세요</span>
                                            <span id="noticeInfo" class="hide"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> 입력정보를 확인해주세요</span>
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
                                        <input id="daumUserId" type="text" name="id" placeholder="아이디" disabled>
                                        <input id="daumUserPwd" type="password" name="pwd" placeholder="비밀번호" disabled>
                                        <p class="log-formBtn">
                                            <a href="javascript:callCrawl();">로그인</a>
                                        </p>
                                        <p class="log-notice">
                                            <span id="noticeId" class="hide"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> 아이디를 입력하세요</span>
                                            <span id="noticePwd" class="hide"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> 비밀번호를 입력하세요</span>
                                            <span id="noticeInfo" class="hide"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> 입력정보를 확인해주세요</span>
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
                                            <a href="javascript:FBCrawl();">로그인</a>
                                        </p>
                                        <p class="log-notice">
                                            <span id="noticeId" class="hide"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> 아이디를 입력하세요</span>
                                            <span id="noticePwd" class="hide"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> 비밀번호를 입력하세요</span>
                                            <span id="noticeInfo" class="hide"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> 입력정보를 확인해주세요</span>
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
    noticeReset();
    $('#site').val(site);
}
function FBCrawl()
{
    var s_id  = "AT"; 
    var s_pwd = $('#facebookToken').val(); 
                
    checkLoginState(); 
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
    noticeReset();

    var test = new Array(); 
    var s_id = "";
    var s_pwd = ""; 
    if( $('#site').val() == 1 || $('#site').val() == "" )
    {
        $('#site').val(1);
        var s_id  = $('#naverUserId').val(); 
        var s_pwd = $('#naverUserPwd').val();
        noticeAlert(s_id, s_pwd);
    }else if( $('#site').val() == 2 ){
        var s_id  = $('#daumUserId').val(); 
        var s_pwd = $('#daumUserPwd').val(); 
        noticeAlert(s_id, s_pwd);
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
        //아이디 오류
        else if (status == "success" && data.code == 1)
        {
            $('#noticeId').show();
            // alert('요청되었습니다.');
            // location.href = "<?=HOSTURL?>/Crawling/History";
        }
      }
    );         
}
function noticeAlert(s_id, s_pwd)
{
    if(!s_id)
    {
        $('#noticeId').show();
        return false;
    }
    if(!s_pwd)
    {
        $('#noticePwd').show();
        return false;
    }
}
function noticeReset()
{
    $('#noticeId').hide();
    $('#noticePwd').hide();
    $('#noticeInfo').hide();
}
</script>

<!--facebook login script-->
<script>
    // This is called with the results from from FB.getLoginStatus().
    function statusChangeCallback(response) {
        console.log('statusChangeCallback');
        console.log(response);
        console.log("UserId : "+response.authResponse.userID);
        console.log("token : "+response.authResponse.accessToken);
        // The response object is returned with a status field that lets the
        // app know the current login status of the person.
        // Full docs on the response object can be found in the documentation
        // for FB.getLoginStatus().
        if (response.status === 'connected') {
            // Logged into your app and Facebook.
            //testAPI();
            document.getElementById('facebookToken').value = response.authResponse.accessToken;
       
            console.log('GOGO API~'); 
            //document.fo.submit();
            
            callCrawl(); 
        } else {
            console.log('이건 뭔가요??'); 
           // The person is not logged into your app or we are unable to tell.
           //document.getElementById('status').innerHTML = 'Please log ' +
           //  'into this app.';
        }
    }
   
    // This function is called when someone finishes with the Login
    // Button.  See the onlogin handler attached to it in the sample
    // code below.
    function checkLoginState() {
        FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
        });
    }
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '1853257284924341',
            cookie     : true,  // enable cookies to allow the server to access 
                                // the session
            xfbml      : true,  // parse social plugins on this page
            version    : 'v2.8' // use graph api version 2.8
        });
    // Now that we've initialized the JavaScript SDK, we call 
    // FB.getLoginStatus().  This function gets the state of the
    // person visiting this page and can return one of three states to
    // the callback you provide.  They can be:
    //
    // 1. Logged into your app ('connected')
    // 2. Logged into Facebook, but not your app ('not_authorized')
    // 3. Not logged into Facebook and can't tell if they are logged into
    //    your app or not.
    //
    // These three cases are handled in the callback function.
    
    // button acction 으로 처리 함 페이지 열리지 마자 하지 말자
    //FB.getLoginStatus(function(response) {
    //  statusChangeCallback(response);
    //});
    };

    //FB.logout(function(response){
    //
    //});
    
    // Load the SDK asynchronously
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/ko_KR/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk')); 

    // Here we run a very simple test of the Graph API after login is
    // successful.  See statusChangeCallback() for when this call is made.
    //
    function testAPI() {
        console.log('Welcome!  Fetching your information.... ');
        FB.api('/me', function(response) {
        console.log('Successful login for: ' + response.name);
        //document.getElementById('status').innerHTML =
        'Thanks for logging in , ' + response.name + '!' ;
        });

    }
</script>

    
    
    
