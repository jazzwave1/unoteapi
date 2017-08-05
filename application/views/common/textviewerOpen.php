
<style>
    body,p{
        padding: 0px;
        margin: 0px;
    }
    .openWrap{
        position: relative;
        width: 100%;
        background: #f6f6f6;
        padding-bottom: 30px;
    }
    .bgWrap{
        padding-top: 30px;
    }
    .openView{
        width: 800px;
        /*background: url("../../static/images/bg_notering.png") repeat-y 20px 0;*/
        z-index: 1000;
        margin: 0 auto;

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
        background: url("../../static/images/bg_punch_top.png") repeat-x 8px 0;
    }
    .openpage{
        height: 100%;
        background: #fff;
        box-shadow: 1px 4px 8px  #888888;
    }
    .open-wrap{
        padding: 30px 30px 0px;
        text-align: justify;
    }
    .openpage .open-date{
        font-weight: bold;
        padding: 10px 0;

    }
    .openpage .open-tit{
        font-weight: bold;
        font-size: 20px;
        padding-bottom: 20px;
    }
    .openpage .open-txt{
        line-height: 1.5;
    }

</style>

<div class="openWrap">
    <div class="bgWrap">
                <!--detailView-->
                <div id="detailView" class="openView">
                    <div class="openinner">
                        <div class="page-bg"></div>
                        <div class="openpage">
                            <div class="open-wrap">
                                <div class="open-top clearfix">
                                    <div class="top-inner">
                                        <div class="clearfix">
                                            <div class="open-info" data-n_idx="1" data-t_idx="1">
                                                <p class="open-date"><?=$vdata['regdate']?></p>
                                                <p class="open-tit"><?=$vdata['title']?></p>
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

    $(".openWrap").css({
        'height':dHeight,
    });
    $(".openView").css({
        'height':dHeight,

    });
</script>