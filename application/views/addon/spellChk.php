<?php
$code = array(
    'space' => '띄어쓰기 오류'
    ,'spell' => '철자 오류'
    ,'space_spell' => '띄어쓰기, 맞춤법 오류'
    ,'doubt' => '맞춤법 오류'
);
// echo '<pre>: '. print_r( $data, true ) .'</pre>';
// die();
?>
                            <div class="addOnIcon clearfix">
                                <a class="btn" href="javascript:submitContents('spellChk');" title="재검사"><i class="fa fa-repeat" aria-hidden="true"></i></a>
                                <!--<a href="javascript:;">전체적용</a>-->
                            </div>
                            <!--<div class="splChkInfo">
                                <p>총 글자수 : <span>951</span>, 수정<span>0</span>, 제안<span>4</span></p>
                            </div>-->
                            <div class="splChkBox">
                                <ul>
                                <?php foreach($data as $oSpell): ?>
                                    <?php foreach($oSpell->result as $key => $oData): ?>
                                    <li class="splChkList">
                                        <div class="applyBtn" data-s_idx="<?=$oSpell->s_idx?>">
                                            <i class="fa fa-check applySpel" aria-hidden="true"></i>
                                            <i class="fa fa-times closeSpel" aria-hidden="true"></i>
                                        </div>
                                        <div class="resultInfo">
                                            <p class="splWrong"><?=$oData->input?></p>
                                            <p class="splRight"><?=$oData->output?></p>
                                            <p class="exspl">*<?=$code[$oData->etype]?></p>
                                            <!-- <p class="exspl">*<?=$oData->etype?></p> -->
                                        </div>
                                    </li>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                                </ul>
                            </div>
<script>
    /*add Jiyun*/
    $(".splChkList").on("click", function () {
        alert('a');
    });

    /*글감리스트 addOn 아이콘*/
    $(".search-icon ul li").on("click", function () {
        $(this).siblings("li").removeClass("on");
        $(this).addClass("on");
    });

    /*맞춤법 검사 리스트*/
    $("li.splChkList").on("click",function () {
        $(this).siblings("li").removeClass("on");
        $(this).addClass("on");
    })
    /*맞춤법 적용 아이콘 클릭*/
    $(".applySpel").on("click",function () {
       alert("OK");
    });
    /*맞춤법 닫기 아이콘 클릭*/
    $(".closeSpel").on("click",function () {
       $(this).parent().parent("li.splChk").hide();
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
    function responsiveView() {
        var wSize = $(window).width();
        var wHeight = $(window).height();
        var editorHeight = wHeight - 111;
        var addonHeight = wHeight - 60;

        $(".se2_input_area").height(editorHeight);
        $("#addOnWrap").height(addonHeight);
        $(".addOnCon").height(editorHeight);
    }
    $(window).on('load', responsiveView);
    $(window).on('resize', responsiveView);
</script>