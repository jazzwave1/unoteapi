<?php
$controller = strtolower($this->uri->segment(1));
$method = strtolower($this->uri->segment(2));

$this->load->library('MenuClass');
$aMenuList = MenuClass::getMenuList($usn);
$aCategory = $aMenuList['Category']['sub'];
?>
                <!--detailView-->
                <div id="detailView">
                    <?php if($vdata['sublist_cnt'] > 0): ?>
                    <div class="dvinner">
                        <div class="p-btn clearfix">
                            <ul class="clearfix">
                                <li class="editMynote">
                                    <a class="editMynoteBtn" href="javascript:;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><span class="toolTip hide">수정하기</span></a>
                                    <!--<div>수정하기</div>-->
                                </li>
                                <li class="downloadPdf">
                                    <a class="downloadPdfBtn" href="javascript:;"><i class="fa fa-file-pdf-o" aria-hidden="true"></i><span class="toolTip hide">pdf다운받기</span></a>
                                    <!--<div>pdf파일다운받기</div>-->
                                </li>
                                <li class="newWindow" data-hosturl="<?=HOSTURL?>" data-controller="<?=$this->uri->segment(1)?>">
                                    <a class="newWindowBtn" target="_blank" href="javascript:window.open(this.href,'window','width=750,height=750,left=0,top=0')" >
                                        <i class="fa fa-external-link fa-1g " aria-hidden="true"></i><span class="toolTip hide">새창으로열기</span>
                                    </a>
                                    <!--<div>새창</div>-->
                                </li>
                                <li class="copyLink" data-hosturl="<?=HOSTURL?>" data-controller="<?=$this->uri->segment(1)?>">
                                    <a class="copyLinkBtn" href="javascript:;"><i class="fa fa-link" aria-hidden="true"></i><span class="toolTip hide">링크복사</span></a>
                                    <!--<div>링크복사</div>-->
                                </li>
                                <li class="noteDelBtn" >
                                    <a href="javascript:;"><i class="fa fa-trash-o fa-1g" aria-hidden="true"></i><span class="toolTip hide">휴지통</span></a>
                                    <!--<div>휴지통</div>-->
                                </li>
                            </ul>
                        </div>
                        <div id="scrollStyle" class="page">
                            <div class="p-top clearfix">
                                <div class="top-inner">
                                    <div class="clearfix">
                                        <div class="p-info" data-n_idx="<?=( isset($vdata['aDetail']['n_idx']) ) ? $vdata['aDetail']['n_idx'] : ''?>" data-t_idx="<?=( isset($vdata['aDetail']['t_idx']) ) ? $vdata['aDetail']['t_idx'] : ''?>" data-type="<?=$method?>" data-controller="<?=$controller?>">
                                            <p class="p-date"><?=( isset($vdata['aDetail']) ) ? $vdata['aDetail']['regdate'] : ''?></p>
                                            <p class="p-tit"><?=( isset($vdata['aDetail']) ) ? $vdata['aDetail']['title'] : ''?></p>
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
                        <div class="page-default">
                            <div class="p-default">
                                <div>작성한 글이 없습니다</div>
                                <div class="p-newBtn"><a href="/unote/index.php">새글쓰기</a></div>
                            </div>
                            <div class="p-default-bg"><img src="../static/images/bg_detailView_default.png"></div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <!--//detailView-->
