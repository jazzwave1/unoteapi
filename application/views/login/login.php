<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>Login Page</title>
    <link href="<?=SURL?>/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?=SURL?>/css/common.css" rel="stylesheet">
    <link href="<?=SURL?>/css/style.css" rel="stylesheet">
    <!--[if lt IE 9]>
        <script src="js/html5shiv.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="<?=SURL?>/js/facebook_login.js"></script>
</head>
<body>
    <div id="wrap">
        <div class="loginWrap">
            <!--header-->
            <!--<div id="header">
                <div class="hleft">
                    
                    <a href="#" class="menubar"><i class="fa fa-bars"></i></a>
                    <h1><a href="bucket.html">GlDong</a></h1>
                </div>
            </div>-->
            <!--//header-->
            <div class="login inner">
                <div class="tit"><!--글동<i class="fa fa-pencil"></i>--><img src="../static/images/logo.png" alt="유노트 로고"></div>
                <div class="stit">너와 나를 연결하는 노트</div>

                <div class="loginBox clearfix">
                    <div class="txt">
                        <p>로그인</p>
                        <p>
                            기존에 사용하시는 계정으로 간단하게 <br>유노트를 시작하세요!
                        </p>
                    </div>
                    <!--sns계정 로그인-->
                    <div class="snsLogin">
                        <ul>
                            <li class="edunietyBtn btn"><a href="javascript:;">eduniety으로 로그인</a></li>
                            <li class="fBtn btn"><a href="javascript:checkLoginState();" >facebook으로 로그인</a></li>
                            <!--<li class="nBtn"><a href="javascript:alert('준비중입니다');">naver</a></li>
                            <li class="kBtn"><a href="javascript:alert('준비중입니다');">kakao</a></li>-->
                        </ul>
                        <!--div class="findSns"><a href="javascript:;">계정찾기</a></div-->
                    </div>
                    <!--//sns계정 로그인-->
                    <!--에듀니티계정 로그인-->
                    <!--<div class="eduniLogin">
                        <p class="eduni">에듀니티 회원</p>
                        <form name='fo' method='post' class="loginForm" action='<?/*=HOSTURL*/?>/Login/RpcLogin'>

                            <input type='hidden' name='user_id' id='user_id' >
                            <input type='hidden' name='site' id='site' >
                            <input type='hidden' name='accessToken' id='accessToken'>

                            <fieldset>
                                <input id="userId" type="text" name="id" value="chomerbleu" placeholder="아이디">
                                <p class="formBtn">
                                    <a href="#" id="bSend">로그인</a>
                                </p>
                                <p class="notice">
                                    * 아이디를 입력하세요 / * 비밀번호를 입력하세요 / * 입력정보를 확인해주세요
                                </p>
                            </fieldset>
                            <div class="loginChk">
                                <!--span class="optionLogin">
                                    <input type="checkbox" name="save" id="saveLogin">
                                    <label for="saveLogin">로그인 상태 유지</label>
                                </span-->
                                <!--span><a href="http://portal.eduniety.net/html/member/account" class="membership">회원가입</a></span>
                                <span><a href="http://portal.eduniety.net/html/member/find-id" class="findInfo">아이디 찾기</a></span>
                            </div>
                        </form>
                    </div>-->
                    <!--//에듀니티계정 로그인-->
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="<?=SURL?>/js/common_.js"></script>
    <!--<script type="text/javascript" src="https://code.jquery.com/jquery.js"></script>-->

    <script>
      $(function(){
        $('#bSend').click(function(){
            $.post(
              "<?=HOSTURL?>/Login/RpcLogin"
              ,{
                   "user_id" : $('#userId').val() 
                   ,"site" : "eduniety" 
               }
              ,function(data, status) {
                    if (status == "success" && data.code == 1)
                    {
                        window.location.href="<?=HOSTURL?>/Note";
                    }
                    else
                    {
                        alert("올바른 정보로 입력 바랍니다.");
                    } 
              }
            );
        });
      });
    </script>
</body>
</html>
