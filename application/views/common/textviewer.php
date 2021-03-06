<?php
$controller = strtolower($this->uri->segment(1));
$method = strtolower($this->uri->segment(2));

$this->load->library('MenuClass');
$aMenuList = MenuClass::getMenuList($usn);
$aCategory = $aMenuList['Category']['sub'];

// echo '<pre>: '. print_r( $vdata['aDetail'], true ) .'</pre>';
// die();
?>
                <!--detailView-->
                <div id="detailView">
                    <?php if($vdata['sublist_cnt'] > 0): ?>
                    <div class="dvinner">
                        <div class="p-btn clearfix">
                            <ul class="addOnBtn clearfix">
                                <!--
                                <li class="bookMark">
                                    <a class="bookMarkBtn" href="javascript:;"><i aria-hidden="true" class="fa fa-star-o fa-1g <?=( isset($vdata['aDetail']['bookmark']) && $vdata['aDetail']['bookmark'] == 'Y' ) ? 'on' : ''?>"></i><span class="toolTip hide">북마크</span></a>
                                </li>
                                -->
                                <!--<div>북마크</div>-->
                                <li class="moveCateg">
                                    <a class="moveCategBtn" href="javascript:;"><i class="fa fa-folder-o" aria-hidden="true"></i><!--<span class="hide toolTip"></span>-->내 글감 이동</a>
                                    <!--<div>카테고리 이동</div>-->
                                    <!--카테고리 이동 안내 창-->
                                    <div class="selCateg">
                                        <div class="headTit">내 글감 이동</div>
                                        <div class="selCateg-inner">
                                            <div class="selList">
                                                <ul>
                                                    <!--<li class="new"><i class="fa fa-plus-circle" aria-hidden="true"></i>새 카테고리</li>-->
                                                    <li class="goCateg" data-c_idx="0"><i class="fa fa-list" aria-hidden="true"></i>글감리스트</li>
                                                    <?php if(is_array($aCategory) && count($aCategory)>0): ?>
                                                    <li class="bgCateg"></li>
                                                    <?php foreach($aCategory as $c_idx => $aData): ?>
                                                        
                                                        <li class="goCateg" data-c_idx="<?=$c_idx?>"><i class="fa fa-folder-open" aria-hidden="true"></i><?=$aData['subtitle']?></li>
                                                    <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                            <!--<div class="selBtn">
                                                <div>확인</div>
                                                <div>취소</div>
                                            </div>-->
                                        </div>
                                    </div><!--//카테고리 이동 안내 창-->
                                </li>
                                <!--<li class="newWindow" data-hosturl="<?/*=HOSTURL*/?>" data-controller="<?/*=$this->uri->segment(1)*/?>" data-type="viewArticle">
                                    <a class="newWindowBtn" target="_blank" href="javascript:window.open(this.href,'window','width=750,height=750,left=0,top=0')" >
                                        <i class="fa fa-external-link fa-1g " aria-hidden="true"></i><span class="toolTip hide">새창으로열기</span>
                                    </a>
                                </li>
                                <li class="copyLink" data-hosturl="<?/*=HOSTURL*/?>" data-controller="<?/*=$this->uri->segment(1)*/?>">
                                    <a class="copyLinkBtn" href="javascript:;"><i class="fa fa-link" aria-hidden="true"></i><span class="toolTip hide">링크복사</span></a>
                                </li>-->
                                <!--
                                <li class="articleDelBtn" >
                                    <a href="javascript:;"><i class="fa fa-trash-o fa-1g" aria-hidden="true"></i><span class="toolTip hide">휴지통</span></a>
                                </li>
                                -->
                                <!--<div>휴지통</div>-->
                            </ul>
                        </div>
                        <div id="scrollStyle" class="page">
                            <div class="p-top clearfix">
                                <div class="top-inner">
                                    <div class="clearfix">
                                        <div class="p-info" data-n_idx="<?=( isset($vdata['aDetail']['n_idx']) ) ? $vdata['aDetail']['n_idx'] : ''?>" data-t_idx="<?=( isset($vdata['aDetail']['t_idx']) ) ? $vdata['aDetail']['t_idx'] : ''?>" data-type="<?=$method?>" data-controller="<?=$controller?>">
                                            <p class="p-date"><?=( isset($vdata['aDetail']) ) ? $vdata['aDetail']['crawdate'] : ''?></p>
                                            <p class="p-tit"><?=( isset($vdata['aDetail']) ) ? $vdata['aDetail']['title'] : ''?></p>
                                            <p class="p-url"><?=( isset($vdata['aDetail']) ) ? $vdata['aDetail']['url'] : ''?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-txt">
                                <div class="p-inner">
                                   <?=( isset($vdata['aDetail']) ) ? $vdata['aDetail']['contents'] : ''?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="dvinner">
                        <!--요기에 글감 없다일 경우-->
                    </div>
                    <?php endif; ?>
                </div>
                <!--//detailView-->
