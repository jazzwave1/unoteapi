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
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-105306313-1', 'auto');
  ga('send', 'pageview');

</script>

<div id="fb-root"></div>
    <div id="wrap">
        <div class="bg">
            <img src="static/images/bg_login2.png">
        </div>
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
                <div class="tit"><!--글동<i class="fa fa-pencil"></i>--><img src="static/images/logo_main.png" alt="유노트 로고"></div>
               <!-- <div class="stit">너와 나를 연결하는 노트</div>
-->
                <div class="loginBox clearfix">
                    <div class="loginEdu">
                        <div class="txt">
                            <p><em>에듀니티</em> 계정으로 로그인</p>
                            <p class="eduLinkWrap">
                                에듀니티 회원이 아니신가요?<br>
                                <a class="eduLink" href="https://www.eduniety.net/" >사이트이동</a>
                            </p>
                        </div>
                        <!--에듀니티계정 로그인-->
                        <div class="eduniLogin">
                            <!--<p class="eduni">에듀니티 회원</p>-->
                            <fieldset>
                                <input id="userId" type="text" name="id" placeholder="에듀니티 아이디">
                                <!--<input id="userPwd" type="password" name="pwd" placeholder="비밀번호">-->
                                <a class="formBtn" id="bSend"  href="#">로그인</a>
                            </fieldset>
                        </div>
                        <!--//에듀니티계정 로그인-->
                    </div>
                    <div class="loginSns line">
                        <div class="txt">
                            <p><em>SNS</em> 계정으로 로그인</p>
                            <p>
                                기존에 사용하시는 계정으로 간단하게 <br>유노트를 시작하세요!
                            </p>
                        </div>
                       <!-- <div class="lineBg"><span></span>SNS<span></span></div>-->
                        <!--sns계정 로그인-->
                        <div class="snsLogin">
                            <ul>
                                <li class="fBtn btn">
    <div scope="public_profile,email,user_posts" onlogin="checkLoginState();" class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="login_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false"></div>
    </li>
                                <li class="nBtn"><a href="javascript:alert('준비중입니다');"><span class="nlogo"><img src="static/images/icon/logo_naver_login.png"></span>Naver으로 로그인</a></li>
                                <li class="dBtn"><a href="javascript:alert('준비중입니다');"><span class="dlogo"><img src="static/images/icon/logo_daum_login.png"></span>Daum으로 로그인</a></li>
                            </ul>
                            <!--div class="findSns"><a href="javascript:;">계정찾기</a></div-->
                        </div>
                        <!--//sns계정 로그인-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <!--<script type="text/javascript" src="<?/*=SURL*/?>/js/common_.js"></script>-->
    <!--<script type="text/javascript" src="https://code.jquery.com/jquery.js"></script>-->


    <form name='fo' method='post' class="loginForm" action='<?=HOSTURL?>/Login/RpcLogin'>
        <input type='hidden' name='user_id' id='user_id' >
        <input type='hidden' name='site' id='site' >
        <input type='hidden' name='accessToken' id='accessToken'>
    </form>


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
