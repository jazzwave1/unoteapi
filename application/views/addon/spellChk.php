<?php
$code = array(
     'space' => '띄어쓰기 오류'
    ,'spell' => '철자 오류'
    ,'space_spell' => '띄어쓰기, 맞춤법 오류'
    ,'doubt' => '맞춤법 의심'
);

$aSplChk = array();
if(is_array($data) && count($data)>0){
    foreach ($data as $key => $obj) {
        foreach ($obj->result as $oData) {
            $aSplChk[] = $oData->input;
        }
    }
}
?>


                <div class="chkTit">맞춤법 검사 결과 <span class="closedBtn"><i class="fa fa-times" aria-hidden="true"></i></span></div>
                <div class="addOnIcon clearfix">
				    <a class="btn" href="javascript:submitContents('spellChk');" title="재검사"><i class="fa fa-repeat" aria-hidden="true"></i></a>
				    <!--<a href="javascript:;">전체적용</a>-->
				</div>
				<!--<div class="splChkInfo">
				    <p>총 글자수 : <span>951</span>, 수정<span>0</span>, 제안<span>4</span></p>
				</div>-->
				<div class="splChkBox">

                <?php foreach ($aSplChk as $chkText): ?>
                <input type="hidden" name="aSplChk[]" value="<?=$chkText?>" />
                <?php endforeach; ?>

                <input type="hidden" id="pre_search" name="pre_search" />
				    <ul>
                    <?php if(is_array($data) && count($data)>0): ?> 
					<?php foreach($data as $oSpell): ?>
					    <?php foreach($oSpell->result as $key => $oData): ?>
						<li class="splChkList">
						    <div class="applyBtn hide" data-s_idx="<?=$oSpell->s_idx?>">
							<i class="fa fa-check applySpel" aria-hidden="true"></i>
							<i class="fa fa-times closeSpel" aria-hidden="true"></i>
						    </div>
						    <div class="resultInfo">
							<p class="splWrong"><?=$oData->input?></p>
							<p class="splRight"><?=$oData->output?></p>
							<p class="exspl"><i class="fa fa-bullhorn notiIcon" aria-hidden="true"></i><?=$code[$oData->etype]?></p>
							<!-- <p class="exspl">*<?=$oData->etype?></p> -->
						    </div>
						</li>
					    <?php endforeach; ?>
					<?php endforeach; ?>
                    <?php else :?> 
                        <li class="emptySpell">
                            <div class="resultInfo">
                                <p class="getTxt">검사결과가 없습니다.</p>
                            </div>
                        </li> 
                    <?php endif;?> 
				    </ul>
				</div>
<script>
    /*add Jiyun*/
    /*맞춤법 검사 리스트*/
    $("li.splChkList").on("click",function () {
        $(this).siblings("li").children('.applyBtn').addClass("hide");
        $(this).children('.applyBtn').removeClass("hide");
        $(this).siblings("li").removeClass("on");
        $(this).addClass("on");

        var text = removeBrTag(oEditor.getIR());
        
        // 이전 선택된 맞춤법 : Highlight->Underline 표시
        text = repPreSelectStyle($('#pre_search').val(), text);

        // 맞춤법 선택 : 선택한 부분 Underline->Highlight 표시
        var search = $(this).children('.resultInfo').children('.splWrong').text();
        text = repSelectStyle(search, text);

        // 이전 맞춤법검색어 저장
        $('#pre_search').val(search);


        oEditor.setIR('');
        oEditor.exec("PASTE_HTML", [text]);
    });
    /*맞춤법 적용 아이콘 클릭*/
    $(".applySpel").on("click",function () {
        var text = removeBrTag(oEditor.getIR());

        var search = $(this).parent().parent("li.splChkList").children('.resultInfo').children('.splWrong').text();
        var replace = $(this).parent().parent("li.splChkList").children('.resultInfo').children('.splRight').text();

        text = repApplyStyle(search, replace, text);
       
        oEditor.setIR('');
        oEditor.exec("PASTE_HTML", [text]);

        $(this).hide();
    });
    /*맞춤법 닫기 아이콘 클릭*/
    $(".closeSpel").on("click",function () {
        var text = removeBrTag(oEditor.getIR());

        var search = $(this).parent().parent("li.splChkList").children('.resultInfo').children('.splWrong').text();

        text = repApplyStyle(search, '', text);

        oEditor.setIR('');
        oEditor.exec("PASTE_HTML", [text]);

        $(this).parent().parent("li.splChkList").hide();
    });

    /*맞춤법 검사 결과 창 닫기*/
    $(".chkTit .closedBtn").on("click", function () {
        var text = removeBrTag(oEditor.getIR());

        var aSplChk = document.getElementsByName('aSplChk[]');

        text = repAllStyle(aSplChk, text);
        text = removeStyleScript(text);

        oEditor.setIR('');
        oEditor.exec("PASTE_HTML", [text]);

        $(".addOn-default").show();
        $("#addOnWrap").hide();
    });


    /*글감리스트 addOn 아이콘*/
    $(".search-icon ul li").on("click", function () {
        $(this).siblings("li").removeClass("on");
        $(this).addClass("on");
    });
    /*카테고리 아이콘 클릭시 */
    $(".moveCateg").on("click",function () {
        $(".moveCateg").toggleClass("on");
        $(".selCateg").show();
    });


    $(document).mouseup(function (e) {
        var container = $(".selCateg");
        if (!container.is(e.target) && container.has(e.target).length === 0){
            container.hide();
            $(".moveCategBtn").removeClass("on");
        }
    });

    var wHeight = $(window).height();
    var addonHeight = wHeight-60;
    $("#addOnWrap").css({
        'height' :  addonHeight,
        'overflow-x' : 'hidden',
        'overflow-y' : 'scroll',
        'position': 'absolute',
        'top': '0',
        'right': '0'
    });

    function responsiveView() {
        $("#addOnWrap").css({
            'height' :  addonHeight,
            'overflow-x' : 'hidden',
            'overflow-y' : 'scroll',
            'position': 'absolute',
            'top': '0',
            'right': '0'
        });
        /*$(".addOnCon").height(editorHeight);*/
    }
    $(window).on('load', responsiveView);
    $(window).on('resize', responsiveView);
</script>
