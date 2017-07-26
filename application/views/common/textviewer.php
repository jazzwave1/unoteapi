<?php
$controller = strtolower($this->uri->segment(1));
$method = strtolower($this->uri->segment(2));

// test code
$usn = 1;
$this->load->library('MenuClass');
$aMenuList = MenuClass::getMenuList($usn);
$aCategory = $aMenuList['Category']['sub'];
?>
                <!--detailView-->
                <div id="detailView">
                    <div class="dvinner">
                        <div class="page">
                            <div class="p-top clearfix">
                                <div class="top-inner">
                                    <div class="clearfix">
                                        <div class="p-info" data-n_idx="<?=( isset($vdata['aDetail']['n_idx']) ) ? $vdata['aDetail']['n_idx'] : ''?>" data-t_idx="<?=( isset($vdata['aDetail']['t_idx']) ) ? $vdata['aDetail']['t_idx'] : ''?>" data-type="<?=$method?>" data-controller="<?=$controller?>">
                                            <p class="p-date"><?=( isset($vdata['aDetail']) ) ? $vdata['aDetail']['regdate'] : ''?></p>
                                            <p class="p-tit"><?=( isset($vdata['aDetail']) ) ? $vdata['aDetail']['title'] : ''?></p>
                                        </div>
                                        <div class="p-btn">
                                            <ul class="clearfix">
                                                <li class="<?=($controller == 'note') ? 'hide' : 'bookMark'?>">
                                                    <a class="bookMarkBtn" href="javascript:;" title="북마크"><i aria-hidden="true" class="fa fa-bookmark fa-1g <?=($controller != 'note' && $vdata['aDetail']['bookmark'] == 'Y' ) ? 'on' : ''?>"></i></a>
                                                    <!--<div>북마크</div>-->
                                                </li>
                                                <li class="<?=($controller == 'note') ? 'hide' : 'moveCateg'?>">
                                                    <a class="moveCategBtn" href="javascript:;" title="카테고리 이동"><i class="fa fa-clipboard fa-1g" aria-hidden="true"></i></a>
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
                                                <li class="newWindow" data-hosturl="<?=HOSTURL?>" data-controller="<?=$this->uri->segment(1)?>">
                                                    <a class="newWindowBtn" title="새창 열기" target="_blank" href="" onClick="window.open(this.href,'window','width=750,height=750,left=0,top=0')">
                                                        <i class="fa fa-external-link fa-1g " aria-hidden="true"></i>
                                                    </a>
                                                    <!--<div>새창</div>-->
                                                </li>
                                                <li class="copyLink" data-hosturl="<?=HOSTURL?>" data-controller="<?=$this->uri->segment(1)?>">
                                                    <a class="copyLinkBtn" title="링크 복사" href="javascript:;"><i class="fa fa-link" aria-hidden="true"></i></a>
                                                    <!--<div>링크복사</div>-->
                                                </li>
                                                <li class="<?=($controller == 'note') ? 'noteDelBtn' : 'articleDelBtn'?>" >
                                                    <a href="javascript:;" title="휴지통"><i class="fa fa-trash-o fa-1g" aria-hidden="true"></i></a>
                                                    <!--<div>휴지통</div>-->
                                                </li>
                                            </ul>
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
                </div>
                <!--//detailView-->