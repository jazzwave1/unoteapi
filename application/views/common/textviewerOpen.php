<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$vdata['title']?></title>
    <style>
        body,p{
            padding: 0px;
            margin: 0px;
        }
        .openWrap{
            position: relative;
            width: 100%;
            height: 100%;
            padding-bottom: 30px;
        }
        .bgWrap{
            /*padding-top: 30px;*/
        }
        .openHeader{
            position: relative;
            overflow: hidden;
            height: 500px;
            background: #1a2226;
        }
        .openWrap .openView{
            position: absolute;
            top:100px;
            left:50%;
            width: 800px;
            /*background: url("../../static/images/bg_notering.png") repeat-y 20px 0;*/
            z-index: 1000;
            margin-left: -400px;
            padding-bottom: 30px;

        }

        .openinner{
            position: relative;
            width: 700px;
            height: 100%;
            margin: 0 auto;
        }
        .page-bg{
            position: absolute;
            top:-26px;
            width: 700px;
            height:40px;
            /*background: url("<?=SURL?>/images/bg_punch_top.png") repeat-x 8px 0;*/
        }
        .openpage{
            height: 100%;
            background: #fff;
            box-shadow: 1px 4px 8px  #888888;
        }
        .open-wrap{
            padding: 30px;
            text-align: justify;
        }
        .openpage .open-date{
            font-weight: bold;
            padding: 10px 0 5px;

        }
        .openpage .writer{
            padding-bottom: 50px;
            border-bottom: 1px solid #ccc;
            margin-bottom: 20px;
        }
        .openpage .writer .pic{
            display: inline-block;
            width: 40px;
            height: 40px;

        }
        .openpage .writer .name{
            display: inline-block;
            padding-left: 10px;
            font-weight: bold;
            font-size: 12px;
        }

        .openpage .writer .pic img{
            width: 100%;
            border-radius: 50%;
            vertical-align: middle;
        }
        .openpage .open-tit{
            font-weight: bold;
            font-size: 32px;
            padding-bottom: 20px;
        }
        .openpage .open-txt{
            line-height: 1.5;
        }

        @media screen and (max-width: 800px){
            .openWrap .openView{
                position: absolute;
                top:100px;
                left: 5%;
                width: 90%;
                /*background: url("../../static/images/bg_notering.png") repeat-y 20px 0;*/
                z-index: 1000;
                margin-left: 0;
                padding-bottom: 30px;

            }
            .openinner{
                width: 100%;
            }
            .openpage{
                box-shadow: 0px 0px 0px;
            }

        }

    </style>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="openWrap">
    <div class="openHeader">
    </div>
    <div class="bgWrap">
                <!--detailView-->
                <div id="detailView" class="openView">
                    <div class="openinner">
                       <!-- <div class="page-bg"></div>-->
                        <div class="openpage">
                            <div class="open-wrap">
                                <div class="open-top clearfix">
                                    <div class="top-inner">
                                        <div class="clearfix">
                                            <div class="open-info" data-n_idx="1" data-t_idx="1">
                                                <p class="open-date"><?=$vdata['regdate']?></p>
                                                <p class="open-tit"><?=$vdata['title']?></p>
                                            </div>
                                            <div class="writer">
                                                <span class="pic"><img src="<?=SURL?>/images/junghun.jpg"></span><span class="name">정 훈</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="open-txt">
                                       <?=$vdata['contents']?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
                <!--//detailView-->
                </div>

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script>
    var dHeight = $(document).height();

   /* $(".openWrap").css({
        'height':dHeight,
    });*/
    $(".openpage").css({
        'height':dHeight,

    });
    $(window).on('resize',function () {
        $(".openpage").css({
            'height':dHeight,

        });
    });
</script>
</body>
</html>
