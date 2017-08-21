<?php
$aCrawLogo = edu_get_config('craw_logo', 'unote');
?>



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
                                <!--안읽은 리스트 class="yetReadList"-->
                                <li class="sublist-li <?=($this->uri->segment(2) == 'List' && $oSublist->readchk == '') ? 'yetReadList' : ''?>" data-t_idx="<?=$oSublist->t_idx?>" data-method="<?=$this->uri->segment(2)?>">
                                    <!--퀵버튼-->
                                    <div class="hide quickBtn clearfix">
                                        <ul class="clearfix">
                                            <li class="bookMark">
                                                <a class="bookMarkBtn" href="javascript:;"><i aria-hidden="true" class="fa fa-star-o fa-1g <?=( isset($vdata['aDetail']['bookmark']) && $vdata['aDetail']['bookmark'] == 'Y' ) ? 'on' : ''?>"></i><span class="toolTip hide">북마크</span></a>
                                                <!--<div>북마크</div>-->
                                            </li>
                                            <li class="moveCateg">
                                                <a class="moveCategBtn" href="javascript:;"><i class="fa fa-folder-o" aria-hidden="true"></i><span class="hide toolTip">카테고리</span></a>
                                                <!--<div>카테고리 이동</div>-->
                                                <!--카테고리 이동 안내 창-->
                                                <div class="selCateg">
                                                    <div class="headTit">대상 카테고리 이동</div>
                                                    <div class="selCateg-inner">
                                                        <div class="selList">
                                                            <ul>
                                                                <!--<li class="new"><i class="fa fa-plus-circle" aria-hidden="true"></i>새 카테고리</li>-->
                                                                <?php foreach($aCategory as $c_idx => $aData): ?>
                                                                    <li class="goCateg" data-c_idx="<?=$c_idx?>" ><i class="fa fa-folder-open" aria-hidden="true"></i><?=$aData['subtitle']?></li>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                        </div>
                                                        <!--<div class="selBtn">
                                                            <div>확인</div>
                                                            <div>취소</div>
                                                        </div>-->
                                                    </div>
                                                </div><!--//카테고리 이동 안내 창-->
                                            </li>
                                            <li class="articleDelBtn" >
                                                <a href="javascript:;"><i class="fa fa-trash-o fa-1g" aria-hidden="true"></i><span class="toolTip hide">휴지통</span></a>
                                                <!--<div>휴지통</div>-->
                                            </li>
                                        </ul>
                                    </div>
                                    <!--//퀵버튼-->
                                    <a href="javascript:void(0)">
                                        <div class="cafeInfo">
                                            <div class="cafeinner clearfix">
                                                <div class="cafeLogo">
                                                    <p>
                                                        <img src="<?=$aCrawLogo[$oSublist->craw_data->corporation]?>">
                                                    </p>
                                                </div>
                                                <div class="cafeTxt">
                                                    <p class="tit"><?=$oSublist->craw_data->title?></p>
                                                </div>
                                                <div class="cafeDate">
                                                    <p><?=$oSublist->craw_data->datetime?></p>
                                                </div>
                                               <!-- <div class="bookMarkBtn" id="bookMark<?/*=$oSublist->t_idx*/?>"><?/*=($oSublist->bookmark == 'Y') ? '<i class="fa fa-star fa-1g aria-hidden="true"></i>' : ''*/?></div>-->
                                                <!--<div class="deleteBtn"><i class="fa fa-trash-o" aria-hidden="true"></i></div> -->
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
                </div>
                <!--//sublist-->


