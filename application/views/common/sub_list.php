<?php
$aCrawLogo = edu_get_config('craw_logo', 'unote');

$this->load->library('MenuClass');
$aMenuList = MenuClass::getMenuList($usn);
$aCategory = $aMenuList['Category']['sub'];

// echo '<pre>: '. print_r( $vdata['sublist'], true ) .'</pre>';
// die();
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
                                <!--<i class="fa fa-search" aria-hidden="true"></i>
                                <input type="text" id="search" placeholder="제목 검색"onkeypress="if(event.keyCode==13) {alert('search');}" />-->
                            </div>
                        </div>
                        <div class="sroll-inner">
                            <!--리스트가 화면 height넘어가면, class scroll-subList생김-->
                            <div id="scrollStyle"  class="scroll-subList">
                            <!--글감리스트-->
                            <ul class="bankSubList">
                            <?php if( is_array($vdata['sublist']) && count($vdata['sublist'])>0 ): ?>
                            <?php foreach ($vdata['sublist'] as $oSublist): ?>
                                <!--안읽은 리스트 class="yetReadList"-->
                                <li class="sublist-li <?=($this->uri->segment(2) == 'List' && $oSublist->readchk == '') ? 'yetReadList' : ''?>" data-t_idx="<?=$oSublist->t_idx?>" data-method="<?=$this->uri->segment(2)?>">
                                    <!--퀵버튼-->
                                    <div class="hide quickBtn clearfix">
                                        <ul class="clearfix">
                                            <?php if($this->uri->segment(2) == 'Trash'): ?>
                                                <li>
                                                    <a href="javascript:trashDelete('<?=$oSublist->t_idx?>');"><i class="fa fa-trash-o fa-1g" aria-hidden="true"></i></a>
                                                    <!--<div>휴지통</div>-->
                                                </li>
                                            <?php else: ?>
                                            <li>
                                                <a class="bookMarkBtn on" href="javascript:articleBookmark('<?=$oSublist->t_idx?>');"><i aria-hidden="true" class="fa fa-star-o fa-1g <?=( isset($vdata['aDetail']['bookmark']) && $vdata['aDetail']['bookmark'] == 'Y' ) ? 'on' : ''?>"></i></a>
                                                <!--<div>북마크</div>-->
                                            </li>
                                            <li>
                                                <a href="javascript:articleDelete('<?=$oSublist->t_idx?>');"><i class="fa fa-trash-o fa-1g" aria-hidden="true"></i></a>
                                                <!--<div>휴지통</div>-->
                                            </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                    <!--//퀵버튼-->
                                    <a href="javascript:void(0)">
                                        <div class="cafeInfo">
                                            <div class="bookMarkChk <?=($oSublist->bookmark == 'Y') ? '' : 'hide'?>" id="bookMark<?=$oSublist->t_idx?>">
                                                <div><i class="fa fa-star" aria-hidden="true"></i></div>
                                            </div>
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
