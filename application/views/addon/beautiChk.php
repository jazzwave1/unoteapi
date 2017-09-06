<?php
$aBeautiChk = array();
if(isset($aBeauti['data'])){
    foreach ($aBeauti['data'] as $key => $val) {
        $aBeautiChk[] = $val['sentence'];
    }
}
?>                            
                            <div class="chkTit clearfix">

                                윤문 추천 결과
                                <span class="closedBtn"><i class="fa fa-times" aria-hidden="true"></i></span>
                            </div>
                            <div class="addOnBtn">
                                <span  class="addOnIcon"><a class="reBtn" href="javascript:submitContents('beautiChk');" title="재검사"><i class="fa fa-repeat" aria-hidden="true"></i> 재검사</a></span>
                            </div>
                            <!--<div class="addOnIcon clearfix">
                                <a class="btn" href="javascript:submitContents('beautiChk');" title="재검사"><i class="fa fa-repeat" aria-hidden="true"></i></a>
                                <!--<a href="javascript:;">전체적용</a>
                            </div>-->
                           <!-- <div class="beautiChkInfo">
                                <p>총 글자수 : <span>951</span>, 수정<span>0</span>, 제안<span>4</span></p>
                            </div>-->
                            <div class="bsinner scrollStyle">
                                <div class="beautiChkBox">

                                <?php foreach ($aBeautiChk as $chkText): ?>
                                <input type="hidden" name="aBeautiChk[]" value="<?=$chkText?>" />
                                <?php endforeach; ?>

                                <input type="hidden" id="pre_line" name="pre_line" />
                                    <ul>
                                        <!--li class="beautiBoxList">
                                            <div class="resultInfo">
                                                <p class="getTxt">입력 : 우산을 쓰다</p>
                                                <div class="recommedTxt">
                                                    <p class="recomTit"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 윤문 추천 결과</p>
                                                    <ul>
                                                        <li>1. 우산을 받치다</li>
                                                        <li>2. 우산을 접다</li>
                                                        <li>3. 우산을 펴다</li>
                                                        <li>4. 우산이 뒤집히다</li>
                                                        <li>5. 우산이 펼쳐지다.</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li-->
                                        <?php if($aBeauti) : ?>
                                        <?php foreach($aBeauti['data'] as $key=>$val): ?>
                                        <li class="beautiBoxList">
                                            <div class="resultInfo">
                                                <div class="result-inner">
                                                    <p class="recommedBtn">
                                                    <span class="showBtn"><i class="fa fa-eye" aria-hidden="true"></i>표시</span>
                                                    <span class="hideBtn hide"><i class="fa fa-eye-slash" aria-hidden="true"></i>끄기</span>
                                                </p>
                                                    <div class="orignTxt">
                                                    <p><strong>원문</strong></p>
                                                    <p class="getTxt"><?=$val['sentence']?></p>
                                                </div>
                                                    <div class="recommedTxt">
                                                    <!--<p class="recomTit">윤문 추천 결과</p>-->
                                                    <p class="recomTit"><strong>결과</strong></p>
                                                    <ul>
                                                        <?php foreach($val['output'] as $k=>$v) : ?>
                                                        <li><?=$k+1?>. <?=$v?></li>
                                                        <?php endforeach;?>
                                                    </ul>
                                                </div>
                                                </div>
                                            </div>
                                        </li>
                                        <?php endforeach;?>
                                        <?php else :?>
                                        <li class="beautiBoxList">
                                            <div class="resultInfo">
                                                <p class="getTxt2">추천결과가 없습니다.</p>
                                            </div>
                                        </li>
                                        <?php endif;?>
                                    </ul>
                                </div>
                             </div>
<script>


    /*윤문 추천 결과 창 닫기*/
    $(".chkTit .closedBtn").on("click", function () {
        var text = removeBrTag(oEditor.getIR());

        var aBeautiChk = document.getElementsByName('aBeautiChk[]');

        text = repAllLineStyle(aBeautiChk, text);
        text = removeStyleScript(text);

        oEditor.setIR('');
        oEditor.exec("PASTE_HTML", [text]);

        $(".addOn-default").show();
        $("#addOnWrap").hide();
    });

    var wHeight = $(window).height();
    var addonHeight = wHeight-157;
    $(".bsinner").css({
        'height' :  addonHeight,
        'overflow-x' : 'hidden',
        'overflow-y' : 'scroll',

    });

    function responsiveView() {
        $(".bsinner").css({
            'height' :  addonHeight,
            'overflow-x' : 'hidden',
            'overflow-y' : 'scroll',

        });
        /*$(".addOnCon").height(editorHeight);*/
    }
    $(window).on('load', responsiveView);
    $(window).on('resize', responsiveView);

    /*표시*/

    $(".showBtn").on("click", function () {
        $(".resultInfo").removeClass("on");
        $(".hideBtn").addClass("hide");
        $(".showBtn").removeClass("hide");
        $(this).parents().parents(".resultInfo").addClass("on");
        $(this).addClass("hide");
        $(this).siblings(".hideBtn").removeClass("hide");

        var text = removeBrTag(oEditor.getIR());
        // 이전 선택된 윤문추천 문장 표시 해제
        if($('#pre_line').val()){
            text = repPreHighlightStyle($('#pre_line').val(), text);
        }

        var search = $(this).parents('.recommedBtn').siblings('.orignTxt').children('.getTxt').text();
        text = repHighlightStyle(search, text);

        // 이전 윤문추천 문장 저장
        $('#pre_line').val(search);

        oEditor.setIR('');
        oEditor.exec("PASTE_HTML", [text]);
    });
    $(".hideBtn").on("click", function () {
        $(this).parents().parents(".resultInfo").removeClass("on");
        $(this).addClass("hide");
        $(this).siblings(".showBtn").removeClass("hide");

        var text = removeBrTag(oEditor.getIR());

        var search = $(this).parents('.recommedBtn').siblings('.orignTxt').children('.getTxt').text();
        text = repPreHighlightStyle(search, text);

        oEditor.setIR('');
        oEditor.exec("PASTE_HTML", [text]);
    });
</script>
