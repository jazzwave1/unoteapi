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
        padding: 20px;
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
    }
    .bookBottom .txt{
        height: 765px;
        overflow: hidden;
        text-align: justify;
        line-height: 1.8;
    }
    .bookBottom2 .txt{
        height: 835px;
        overflow: hidden;
        text-align: justify;
        line-height: 1.8;
    }
    .bookBottom .txt img{
        width: 100%;
        padding-bottom: 20px;
    }
</style>
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
                    </div>
                </div>
            </div>
        </div>
        <div class="bookTxt2">
            <div class="book-inner">
                <div class="book-padding">
                    <div class="bookBottom2">
                        <div class="txt">
                            <!--이미가 있을 경우-->
                            <!--<img src="../../static/images/img_thum.jpg">-->
                            <?=$vdata['contents']?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>