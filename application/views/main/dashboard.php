<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Main</title>
    <link rel="stylesheet" href="static/css/reset.css">
    <link rel="stylesheet" href="static/css/common.css">
    <link rel="stylesheet" href="static/css/pageStyle.css">
    <link href="https://fonts.googleapis.com/css?family=Inknut+Antiqua|Love+Ya+Like+A+Sister|Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body>
<div class="dimmed"></div>
<div class="wrap">
    <!--header-->
    <div class="header">
        <div class="hTop">
            <div class="home">
                <a href="#"><img src="static/images/common/menu_icon_gr.png" alt="menu"></a>
            </div>
            <div class="logo">
                <div>
                    <!--<img src="images/common/logo_icon.png" alt="U-note">-->
                    <!--<h1><strong>U</strong>-<span>NOTE</span></h1>-->
                    <h1><strong>LOGO</strong></h1>
                </div>
            </div>
            <div class="userWrap">
                <div class="logOut">
                    <div>로그인</div>
                </div>
                <div class="logIn">
                    <div class="userInfo">Jung Hun</div>
                    <div class="userPic"><img src="static/images/common/userPic.png"></div>
                    <div class="userBtn"><img src="static/images/common/menu_icon3.png"></div>
                </div>
            </div>
        </div>
    </div>
    <!--//header-->
    <!--banner-->
    <div class="bannerWrap"></div>
    <!--//banner-->
    <!--contents-->
    <div class="contents">
        <div class="mainWrap">
            <div class="main">
                <div class="mainHeader">
                    <p class="tit">My Library</p>
                    <div class="crawling">
                        수집하기
                    </div>
                </div>
                <div class="myfile">
                    <ul>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
                <div class="new">새문서</div>
            </div>
        </div>
    </div>
    <!--//contents-->
    <!--footer-->
    <div class="footer">footer</div>
    <!--//footer-->
    <!--popup-->
    <div class="popupWrap">
        <div class="popup0">
            <ul class="cafeTap">
                <li>다음</li>
                <li>네이버</li>
                <li>구글</li>
            </ul>
            <div>
                <!--다음-->
                <div class="login login0">
                    <form>
                        <p>
                            <label for="userID">ID</label>:
                            <input type="text" id="userID" name="id">
                        </p>
                        <p>
                            <label for="userPW">PW</label>:
                            <input type="password" id="userPW" name="password">
                        </p>
                        <div class="notice">*다음 아이디 또는 비밀번호가 일치하지 않습니다.</div>
                        <div class="btn">
                            <input type="submit" value="확인">
                            <input class="cancelBtn" type="button" value="취소">
                        </div>
                    </form>
                </div>
                <!--네이버-->
                <div class="login login1">
                    <form>
                        <p>
                            <label for="userID">ID</label>:
                            <input type="text" id="userID" name="id">
                        </p>
                        <p>
                            <label for="userPW">PW</label>:
                            <input type="password" id="userPW" name="password">
                        </p>
                        <div class="notice">*네이버 아이디 또는 비밀번호가 일치하지 않습니다.</div>
                        <div class="btn">
                            <input type="submit" value="확인">
                            <input class="cancelBtn" type="button" value="취소">
                        </div>
                    </form>
                </div>
                <!--구글-->
                <div class="login login2">
                    <form>
                        <p>
                            <label for="userID">ID</label>:
                            <input type="text" id="userID" name="id">
                        </p>
                        <p>
                            <label for="userPW">PW</label>:
                            <input type="password" id="userPW" name="password">
                        </p>
                        <div class="notice">*구글 아이디 또는 비밀번호가 일치하지 않습니다.</div>
                        <div class="btn">
                            <input type="submit" value="확인">
                            <input class="cancelBtn" type="button" value="취소">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="static/js/libs/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="static/js/libs/jquery-ui.js"></script>
<script>
    $(".crawling").on("click",function(){
        $(".popupWrap").show();
    });

    $(".cancelBtn").on("click",function(){
        $(".popupWrap").hide();
    });

    $(".login0").show();
    $(".cafeTap li").on("click",function(){
        $(this).siblings("li").css({background:"#ccc"});
        $(this).css({background:"#17330f"});

        var listIndex = $(this).index();
        $(".login").hide();
        $(".login"+listIndex).show();
    });
</script>
</body>
</html>