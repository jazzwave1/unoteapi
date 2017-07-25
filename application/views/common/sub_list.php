                <!--sublist-->
                <div id="bankSub" class="full-left-sublist my-note">
                    <div class="bsinner">
                        <!--카테고리타이틀/필터/버튼 영역-->
                        <div class="listFilter">
                            <p><i class="<?=$vdata['menu']['icon']?>" aria-hidden="true"></i><?=$vdata['menu']['subtitle']?></p>
                            <p class="totalList">  전체 | <span><?=$vdata['sublist_cnt']?></span></p>
                            <!--<p class="filter">정렬 | <span>최신순 <i class="fa fa-caret-down" aria-hidden="true"></i></span></p>-->
                        </div>
                        <div class="subSearch">
                            <div class="search-inner">
                                <a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                                <input type="search" id="search" placeholder="제목 검색" />
                            </div>
                        </div>
                        <div class="sroll-inner">
                            <!--리스트가 화면 height넘어가면, class scroll-subList생김-->
                            <div class="scroll-subList">
                            <!--글감리스트-->
                            <ul class="bankSubList">
                            <?php if( is_array($vdata['sublist']) && count($vdata['sublist'])>0 ): ?>
                            <?php foreach ($vdata['sublist'] as $oSublist): ?>
                                <li class="sublist-li" data-t_idx="<?=$oSublist->t_idx?>">
                                    <a href="javascript:void(0)">
                                        <div class="cafeInfo ">
                                            <div class="cafeinner clearfix">
                                                <div class="cafeLogo">
                                                    <img src="../../../static/images/icon/logo_naver.png" alt="네이버로고">
                                                    <!--<img src="../../../static/images/icon/logo_daum.png" alt="다음로고">
                                                    <img src="../../../static/images/icon/logo_facebook.png" alt="페이스북로고">-->
                                                    <?=$oSublist->craw_data->corporation?>
                                                </div>
                                                <div class="cafeTxt">
                                                    <p class="tit"><?=$oSublist->craw_data->title?></p>
                                                    <p></p>
                                                    <p class="date"><?=$oSublist->regdate?></p>
                                                </div>
                                                <div class="bookMarkBtn"><i class="fa fa-bookmark fa-1g" aria-hidden="true"></i><?=$oSublist->bookmark?></div>
                                                <!--<div class="deleteBtn"><i class="fa fa-trash-o" aria-hidden="true"></i></div> -->
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </ul>
                            <!--//글감리스트-->
                        </div>
                        </div>
                    </div>
                </div>
                <!--//sublist-->
