<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>myText</title>
    <link rel="stylesheet" href="/~hojunlee/unoteapi/static/css/reset.css">
    <link rel="stylesheet" href="/~hojunlee/unoteapi/static/css/common.css">
    <link rel="stylesheet" href="/~hojunlee/unoteapi/static/css/pageStyle.css">
    <link href="https://fonts.googleapis.com/css?family=Inknut+Antiqua|Love+Ya+Like+A+Sister|Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body>
<div>
    <!--header-->
    <div class="header">
        <div class="hTop">
            <div class="home">
                <a href="#"><img src="/~hojunlee/unoteapi/static/images/common/menu_icon_gr.png" alt="menu"></a>
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
                    <div class="userPic"><img src="/~hojunlee/unoteapi/static/images/common/userPic.png"></div>
                    <div class="userBtn"><img src="/~hojunlee/unoteapi/static/images/common/menu_icon3.png"></div>
                </div>
            </div>
        </div>
    </div>
    <!--//header-->
    <!--크롤링 결과-->
    <div class="myTextWrap">
        <div class="myText">
            <div class="subTit">
                <h2>글 수집 요청 리스트 </h2>
            </div>
            <div class="cafeList">
                <div class="tableWrap">
                    <table>
                        <thead>
                        <tr>
                            <th class="list_num">번호</th>
                            <th class="list_cafe">처리 상태</th>
                            <th class="list_date">등록일</th>
                            <th class="list_tit">치리완료일</th>
                        </tr>
                        </thead>
                        <tbody>
<?php
foreach ($aList as $key => $obj) {
?>
                        <tr>
                            <td><?=$obj->q_idx?></td>
                            <td><?=$obj->state?></td>
                            <td class="tit"><?=$obj->regdate?></td>
                            <td><?=$obj->completedate?></td>
                        </tr>
<?php
}
?>
                        </tbody>
                    </table>
                </div>
                <div class="pageNum">
                    <ul>
                        <li>
                            <a href="javascript:;">이전</a>
                        </li>
                        <li><a href="javascript:;" class="on">1</a></li>
                        <li><a href="javascript:;">2</a></li>
                        <li><a href="javascript:;">3</a></li>
                        <li><a href="javascript:;">4</a></li>
                        <li>
                            <a href="javascript:;">다음</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--//크롤링 결과-->
    <!--footer-->
    <div class="footer">footer</div>
    <!--//footer-->
</div>
<script type="text/javascript" src="/~hojunlee/unoteapi/static/js/libs/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="/~hojunlee/unoteapi/static/js/libs/jquery-ui.js"></script>
</body>

</html>
