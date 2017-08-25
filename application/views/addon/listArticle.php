<?php
$aCrawLogo = edu_get_config('craw_logo', 'unote');

// echo '<!--';
// echo '<pre>: '. print_r( $list, true ) .'</pre>';
// echo '-->';
// die();
?>

                            <div class="chkTit chkTit2">참고글감 <span class="closedBtn"><i class="fa fa-times" aria-hidden="true"></i></span></div>
                            <div class="bsinner scrollStyle">

                                <div class="bankSubTop">
                                    <!--<p class="bankSub-tit" onclick="listArticle('list');"><i class="fa fa-list-ul" aria-hidden="true"></i>글감리스트</p>-->
                                    <?php if($menu['type'] != 'list'): ?>
                                    <p class="bankSub-categ"><!--<i class="fa fa-angle-right" aria-hidden="true"></i>--><span><!--<i class="<?/*=$menu['icon']*/?>" aria-hidden="true"></i>--><?=$menu['subtitle']?> |</span></p>
                                    <?php endif; ?>
                                    <p class="bankSub-total">총<span><?=$list_cnt?></span>글감</p>
                                </div>
                                <!--<div class="subSearch clearfix">
                                    <div class="subSearch-left">
                                        <div class="search-inner">
                                            <a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                                            <input type="search" id="search" placeholder="제목 검색" />
                                        </div>
                                    </div>
                                    <div class="subSearch-right">
                                        <div class="search-icon">
                                            <ul>
                                                <li class="bookMark">
                                                    <a class="bookMarkBtn" href="javascript:listArticle('bookmark');" title="북마크"><i aria-hidden="true" class="fa fa-star-o"></i></a>
                                                </li>
                                                <li class="moveCateg">
                                                    <a class="moveCategBtn" href="javascript:getCategoryList();" title="카테고리"><i class="fa fa-folder-o" aria-hidden="true"></i></a>
                                                    <div class="selCateg <?=(count($category)<1) ? 'noCateg' : ''?>" style="z-index:500;">
                                                        <div class="selCateg-inner">
                                                            <div class="selList">
                                                                <ul>
                                                                <?php foreach($category as $c_idx => $aCate): ?>
                                                                    <li class="goCateg" id="category_<?=$c_idx?>"><a href="javascript:listArticle('category', '<?=$c_idx?>');"><i class="fa fa-folder-open" aria-hidden="true"></i><?=$aCate['subtitle']?></a></li>
                                                                <?php endforeach; ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                -->
                                <div class="sroll-inner">
                                    <!--리스트가 화면 height넘어가면, class scroll-subList생김-->
                                    <div class="scroll-subList">
                                        <!--글감리스트-->
                                        <ul class="bankSubList">
                                        <?php if( is_array($list) && count($list)>0 ): ?>
                                        <?php foreach ($list as $oList): ?>
                                            <li>
                                                <!-- <a title="새창 열기" onClick="viewDetail();"> -->
                                                <div class="cafeInfo">
                                                    <div class="cafeinner clearfix">
                                                        <div class="cafeLogo">
                                                            <p><img src="<?=$aCrawLogo[$oList->craw_data->corporation]?>"></p>
                                                        </div>
                                                        <div class="cafeTxt">
                                                            <p class="tit"><?=$oList->craw_data->title?> <span><?=$oList->craw_data->cnt?>자</span></p>
                                                            <!--<p class="date"><?=$oList->regdate?></p>-->
                                                        </div>
                                                        <!--<div class="bookMarkBtn" id="bookMark<?/*=$oList->t_idx*/?>"><?/*=($oList->bookmark == 'Y') ? '<i class="fa fa-star fa-1g aria-hidden=" true"=""></i>' : ''*/?></div>-->
                                                    </div>
                                                </div>
                                                <!-- </a> -->
                                                <div class="detail" style="display:none;">
                                                    <div class="detailTit"><?=$oList->craw_data->title?></div>
                                                    <div class="detailDate"><?=$oList->craw_data->datetime?></div>
                                                    <div class="detailTxt"><?=( isset($oList->craw_data->contents) ) ? $oList->craw_data->contents : ''?></div>
                                                    <div class="detailBtn">글감 적용하기</div>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                            <div class="emptyData">
                                                <div class="emptyIcon"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                                                <div>데이터가 없습니다.</div>
                                            </div>
                                        <?php endif; ?>
                                        </ul>
                                        <!--//글감리스트-->
                                    </div>
                                </div>
                            </div>

<script>
    var wHeight = $(window).height();
    var addonHeight = wHeight-101;
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

    /*맞춤법 검사 결과 창 닫기*/
    $(".chkTit .closedBtn").on("click", function () {
        $(".addOn-default").show();
        $("#addOnWrap").hide();
    });

    //카테고리 이동 버튼 클릭 이벤트
    // $(".moveCategBtn").click(function(){
    //     $(".moveCategBtn").toggleClass("on");
    //     $(".selCateg").show();
    // });
    $(document).mouseup(function (e) {
        var container = $(".selCateg");
        if (!container.is(e.target) && container.has(e.target).length === 0){
            container.hide();
            $(".moveCategBtn").removeClass("on");
        }
    });

    $(".cafeInfo").on("click",function () {
        $(this).siblings('.detail').slideToggle();
    });
    $(".detailBtn").on("click",function () {
       var detailTxt = $(this).siblings('.detailTxt').html();
       setDetailText(detailTxt);
    });


</script>