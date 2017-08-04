<?php
$aCrawLogo = edu_get_config('craw_logo', 'unote');
?>
                            <div class="bsinner">
                                <div class="bankSubTop">
                                    <p class="bankSub-tit" onclick="listArticle('list');"><i class="fa fa-list-ul" aria-hidden="true"></i>글감리스트</p>
                                    <?php if($menu['type'] != 'list'): ?>
                                    <p class="bankSub-categ"><i class="fa fa-angle-right" aria-hidden="true"></i><span><i class="<?=$menu['icon']?>" aria-hidden="true"></i><?=$menu['subtitle']?></span></p>
                                    <?php endif; ?>
                                    <p class="bankSub-total">전체 | <span><?=$list_cnt?></span></p>
                                </div>
                                <div class="subSearch clearfix">
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
                                                    <!--<div>북마크</div>-->
                                                </li>
                                                <li class="moveCateg">
                                                    <a class="moveCategBtn" href="javascript:getCategoryList();" title="카테고리"><i class="fa fa-folder-o" aria-hidden="true"></i></a>
                                                    <!--<div>카테고리 이동</div>-->
                                                    <!--카테고리 이동 안내 창-->
                                                    <div class="selCateg" style="z-index:500;">
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
                                                    <!--//카테고리 이동 안내 창-->
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="sroll-inner">
                                    <!--리스트가 화면 height넘어가면, class scroll-subList생김-->
                                    <div class="scroll-subList">
                                        <!--글감리스트-->
                                        <ul class="bankSubList">
                                        <?php if( is_array($list) && count($list)>0 ): ?>
                                        <?php foreach ($list as $oList): ?>
                                            <li>
                                                <a title="새창 열기" onClick="window.open('/unoteapi/Article/viewArticle/<?=$oList->t_idx?>','window','width=750,height=750,left=0,top=0')">
                                                    <div class="cafeInfo ">
                                                        <div class="cafeinner clearfix">
                                                            <div class="cafeLogo">
                                                                <p><img src="<?=$aCrawLogo[$oList->craw_data->corporation]?>"></p>
                                                            </div>
                                                            <div class="cafeTxt">
                                                                <p class="tit"><?=$oList->craw_data->title?></p>
                                                                <p></p>
                                                                <p class="date"><?=$oList->regdate?></p>
                                                            </div>
                                                            <div class="bookMarkBtn" id="bookMark<?=$oList->t_idx?>"><?=($oList->bookmark == 'Y') ? '<i class="fa fa-star fa-1g aria-hidden=" true"=""></i>' : ''?></div>
                                                        </div>
                                                    </div>
                                                </a>
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
<