<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$vdata['title']?></title>

<style>

    /* Reset */
    html,body{width:100%;height:100%; overflow:hidden}
    html{overflow-y:auto;font-size:10px}
    body,div,dl,dt,dd,ul,ol,li,h1,h2,h3,h4,h5,form,fieldset,p,button{margin:0;padding:0}
    body,h1,h2,h3,h4,input,button{font-family:Malgun Gothic,'맑은고딕',Helvetica,AppleSDGothicNeo,sans-serif;font-size:14px;color:#555}
    body{background-color:#fff;text-align:center;*word-break:break-all;-ms-word-break:break-all}
    img,fieldset,iframe{border:0 none}
    li{list-style:none}
    input,select,button{vertical-align:middle}
    img{vertical-align:top}
    i,em,address{font-style:normal}
    label,button{cursor:pointer}
    button{margin:0;padding:0}
    a{color:#555;text-decoration:none}
    a:hover{text-decoration:none}
    button *{position:relative}
    button img{left:-3px;*left:auto}
    html:first-child select{height:20px;padding-right:6px}
    option{padding-right:6px}
    hr{display:none}
    legend{*width:0;display: none;}
    table{border-collapse:collapse;border-spacing:0}
    input::-ms-clear{display:none}
    input {outline: none;border: 0px;}
    *:focus {outline: none;}


    .bookWrap{
        width: 100%;
        height: 100%;
        overflow: auto;
        margin: 0 auto;
        text-align: center;
        background: #eee;
    }
    .whiteWrap{
        width: 1440px;
        padding: 20px 50px;
        background: #fff;
        margin: 0 auto;
    }
    .bookBg{
        position: relative;
        width: 1440px;
        height: 1095px;
        /*background: url('../../static/images/bg_book.png') no-repeat 50% 50%;
        background-size: contain;*/

    }
    .bookBg img.bg{
        width: 100%;
        height: 1095px;
    }
    .bookBg .bookTxt1{
        position: absolute;
        top:0;
        left: 0;
        width: 720px;
        height: 100%;
       /* background: #fff;*/
    }
    .bookBg .bookTxt2{
        position: absolute;
        top:0;
        left: 720px;
        width: 720px;
        height: 100%;
        /*background: #fff;*/
    }
    .bookBg .bookTxt1 .book-inner{
       /* background: #ccc;*/
        height: 100%;
    }
    .book-padding{
        padding: 130px;
    }
    .bookTop{
        text-align: left;
    }
    .bookTop .tit{
        height: 70px;
        font-size: 18px;
        font-weight: bold;
        text-align: center;
    }
    .bookBottom .txt{
        height: 600px;
        overflow: hidden;
        text-align: justify;
        line-height: 1.8;
        padding-top: 80px;
    }
    .bookBottom2 .txt{
        height: 750px;
        overflow: hidden;
        text-align: justify;
        line-height: 1.8;
        font-size: 14px;
    }
    .bookBottom .txt img{
        width: 100%;
        padding-bottom: 20px;
    }
    .pageNum{
        font-weight: bold;
        padding-top: 85px;
    }
    .pageNum span{
        padding-right: 10px;
    }
    .pageNumleft{
        text-align: left;
    }
    .pageNumright{
        text-align: right;
    }
</style>
</head>
<body>
<div class="bookWrap">
    <div class="whiteWrap">
    <div class="bookBg">
        <img class="bg" src="<?=SURL?>/images/bg_book_both.png">
        <div class="bookTxt1">
            <div class="book-inner">
                <div class="book-padding">
                    <div class="bookTop">
                        <p class="tit"><?=$vdata['title']?></p>
                    </div>
                    <div class="bookBottom">
                        <div class="txt">
                            <!--이미가 있을 경우-->
                            <!--<img src="../../static/images/img_thum.jpg">-->
                            <?=$vdata['contents']?>
                        </div>
                        <div class="pageNum pageNumleft"><span>1</span><span>내노트</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bookTxt2">
            <div class="book-inner">
                <div class="book-padding">
                    <div class="bookBottom2">
                        <div class="txt">
                            &nbsp;비소비율은 특히 고등학교 수준에서 놀랄 정도로 높다. 사실 대부분의 고등학교 학생은 어떤 형태로든 바람직한 학습 기회를 놏히고 있늗네, 그 대안으로 온라인 학습을 통해 혜택을 누릴 수 있다. 2007년 전체 학생 가운데 26퍼센트가 어떤 심화 과정도 제공하지 않는 고등학교에 다녔다. 기하학밖에 없으니 대수학도 없고 미적분학은 당연히 없었다. 생물학만 있고 화학이나 물리학, 고급영어 수업도 없었다.<br/>
                            &nbsp;그러나 지역 교육청 학교든 차터 스쿨(자율형 공립학교로 주정부 기금을 받지만 자체 모금도 가능하며 학교 운영 재량권이 큼-옮긴이 주)이든 공립학교에 다니는 학생 그리고 더 폭넓은 강의와 선택 과목을 제공하는 사립학교에 다니는 학생은 어떤가? 온라인 학습을 값싼 유행쯤으로 여겨 기회를 놓치고 있지는 않은가? 이 질문에 답하기 위해 우리는 한 걸음 물러나 큰 그림을 볼 필요가 있다. 최고의 학교라도 전통적인 교실 모형은 오늘날 학생들이 성공하기 위해 필요한 것과 어떻게 하면 더 잘할 수 있는지에 대한 문제를 따라잡지 못하고 있다.<br/>
                            &nbsp;2010년 캘리포니아 교외 지역에 위치한 로스앨터스(Los Altos) 지역청산타 리타(Santa Rita) 초등학교는 미국의 다른 학교드로가 별반 다르지 않게 운영되고 있었다. 5학년 잭은 학급에서 수학 과목에서 꼴찌였다. 잭은 수업을 따라가려고 애썼으나 혼자서는 제대로 개념을 이해하지 못하는 아이들 가운데 한 명이었을 뿐이다. 일반 학교라면 잭은 성적에 따라 수학 하위 반에 배치되었을 것이다. 이런 경우 잭은 고등학교에 가기 전까지 대수학 수업을 들을 수 없는데, 이는 그의 대학 진학과 진로 선택에 부정적 영향을 줬을 것이다.<br/>
                            &nbsp;잭의 학습은 이전과 다른 쪽으로 전개되었다. 학교는 잭의 수업을 블렌디드 러닝 환경으로 변화시켰다. 일주일 가운데 3~4일간 수학 수업 시간에 칸 아케데미의 온라인 수학 해설 강의와 연습문제를 70일간 이용하고 나서 잭은 하위권 수학 그룹에 아닌 상위권 그룹으로 올라갈 정도로 성적이 올랐다. 그는 자신의 학년보다 더 높은 수준의 과제도 해 낼 정도였다.<br/>
                            &nbsp;잭의 빠른 성적 향상은 영화나 마법처럼 들리겠지만 그렇지 않다. 이는 학생의 니즈에 맞춰 학습을 개별 맞춤화하고, 학습 수준을 알맞게 설정하도록 교사를 도와주는 온라인 학습이 가진 힘을 잘 보여주는 예다.<br/><br/>

                            &nbsp;오늘날 학교의 기원<br/>
                            &nbsp;오늘날 학교는 100년 이전의 개별화, 맞춤식과는 정반대 목적을 위해 디자인되었다. 즉 학교는 가르치고 시험 치는 방식을 표준화하기위해 고안되었다. 20세기에 접어들 당시 한 칸 교실로 이루어진 작은 학교는 각 학생을 위한 맞춤식 교육에 적합했다. 그러나 많은 수의 학생을 교육시키기에 경제적으로 효율적이지 않았다. 1900년에는 미
                        </div>
                        <div class="pageNum pageNumright"><span>내노트</span><span>2</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

</body>
</html>
