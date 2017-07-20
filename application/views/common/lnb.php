                <!--lnb-->
                <div id="lnb" class="full-left-nav">
                    <div class="lnb-inner navList">
<?php
    // test code
    $usn = 1;

    $this->load->library('MenuClass');
    $aMenuList = MenuClass::getMenuList($usn);
?>

<!--menu-->
<?php foreach ($aMenuList as $controller => $aMenuData): ?>
                        <div class="lnbItem">
                            <p class="lnbItemTit">
                                <?=$aMenuData['title']?>
            <!--category add-->
            <?php if($controller == 'Category'): ?>
                                <span class="addCateg">
                                    <!--카테고리추가 버튼-->
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </span>
            <?php endif; ?>        
            <!--//category add-->                            
                            </p>

                            <ul class="lnbItemList <?=($controller == 'Category') ? 'categList' : ''?>">
    <!--submenu-->
    <?php foreach ($aMenuData['sub'] as $method => $aMenuSubData): ?>
        <?php if($aMenuSubData['is_use']): ?>
                <!--category-->
                <?php if($controller == 'Category'): ?>
                                <li>
                                    <a href="<?=HOSTURL?>/<?=$controller?>/<?=$method?>"><span class="categTit"><?=$aMenuSubData['subtitle']?></span></a>
                                    <div class="categBtn">
                                        <span class="editBtn"><a href="#categEditPop" data-popup="#categEditPop" class="layer-popup"><i class="fa fa-pencil" aria-hidden="true"></i></a></span>
                                        <span class="deleteBtn"><a href="#categDeletePop" data-popup="#categDeletePop" class="layer-popup"><i class="fa fa-times" aria-hidden="true"></i></a></span>
                                    </div>
                                </li>
                <!--//category-->
                <!--else-->
                <?php else: ?>
                                <li>
                                    <a href="<?=HOSTURL?>/<?=$controller?>/<?=$method?>">
                                    <i class="<?=$aMenuSubData['icon']?>" aria-hidden="true"></i><?=$aMenuSubData['subtitle']?>
                    <?php if($controller == 'Article'): ?>
                                    <span class="num">20</span>
                    <?php endif; ?>
                                    </a>
                                </li>
                 <?php endif; ?>
                 <!--//else-->
                <!--crawling btn-->
                <?php if($controller == 'Crawling'): ?>
                                <li class="cBtn">
                                    <a href="<?=HOSTURL?>/Crawling/reqcrawl" class="croBtn">수집하기</a>
                                    <a href="#" class="fupBtn">파일업로드</a>
                                </li>
                <?php endif; ?>
                <!--//crawling btn-->
        <?php endif; ?>
    <?php endforeach; ?>
    <!--//submenu-->
                            </ul>
                        </div>
<?php endforeach; ?>
<!--//menu-->
                        <!--새글쓰기 버튼-->
                        <div class="newNoteBtn">
                            <a href="#"><i class="fa fa-file-text-o" aria-hidden="true"></i>새글쓰기</a>
                        </div>
                    </div>
                </div>
                <!--//lnb-->

                <!--카테고리 수정 팝업-->
                <div class="pop-wrap" id="categEditPop" style="display:none">
                    <div class="pop-header">
                        <span>카테고리 수정</span><a href="#none" class="btnp-close"><i class="fa fa-times" aria-hidden="true"></i></a>
                    </div>
                    <div class="pop-cont">
                        <form action="">
                            <p>카테고리 이름을 수정하세요.</p>
                            <input type="text">
                            <div class="pop-btn">
                                <a href="javascript:;">확인</a> <a href="#none" class="btnp-close">취소</a>
                            </div>
                        </form>
                    </div>
                </div>
                <!--카테고리 삭제 팝업-->
                <div class="pop-wrap" id="categDeletePop" style="display:none">
                    <div class="pop-header">
                        <span>카테고리 삭제</span><a href="#none" class="btnp-close"><i class="fa fa-times" aria-hidden="true"></i></a>
                    </div>
                    <div class="pop-cont">

                        <p>카테고리 삭제 하시겠습니까?</p>

                        <div class="pop-btn">
                            <a href="javascript:;" class="pop-submit">확인</a> <a href="#none" class="btnp-close">취소</a>
                        </div>

                    </div>
                </div>