<?php
$controller = strtolower($this->uri->segment(1));
$method = strtolower($this->uri->segment(2));

// test code
$usn = 1;
$this->load->library('MenuClass');
$aMenuList = MenuClass::getMenuList($usn);
$aCategory = $aMenuList['Category']['sub'];

// echo '<pre>aCategory: '. print_r( $aCategory, true ) .'</pre>';
// die();
?>
                <!--detailView-->
                <div id="detailView">
                    <div class="dvinner">
                        <div class="page">
                            <div class="p-top clearfix">
                                <div class="top-inner">
                                    <div class="clearfix">
                                        <div class="p-info" data-n_idx="1" data-t_idx="1" data-type="<?=$method?>">
                                            <p class="p-date">1999.01.01</p>
                                            <p class="p-tit">제목을 입력하세요</p>
                                        </div>
                                        <div class="p-btn">
                                            <ul class="clearfix">
                                                <li class="<?=($controller == 'note') ? 'hide' : 'bookMark'?>"  title="북마크">
                                                    <a class="bookMarkBtn" href="javascript:;"><i class="fa fa-bookmark fa-1g" aria-hidden="true"></i></a>
                                                    <!--<div>북마크</div>-->
                                                </li>
                                                <li class="<?=($controller == 'note') ? 'hide' : 'moveCateg'?>"  title="카테고리 이동">
                                                    <a class="moveCategBtn" href="javascript:;"><i class="fa fa-clipboard fa-1g" aria-hidden="true"></i></a>
                                                    <!--<div>카테고리 이동</div>-->
                                                    <!--카테고리 이동 안내 창-->
                                                    <div class="selCateg">
                                                        <div class="headTit">대상 카테고리 이동</div>
                                                        <div class="selCateg-inner">
                                                            <div class="selList">
                                                                <ul>
                                                                    <!--<li class="new"><i class="fa fa-plus-circle" aria-hidden="true"></i>새 카테고리</li>-->
                                                                    <?php foreach($aCategory as $c_idx => $aData): ?>
                                                                        <li class="goCateg" data-c_idx="<?=$c_idx?>" ><?=$aData['subtitle']?><i class="fa fa-folder-open" aria-hidden="true"></i></li>
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
                                                <li class="newWindow"  title="새창 열기">
                                                    <a class="newWindowBtn" target="_blank" href="" onClick="window.open(this.href,'window','width=750,height=750,left=0,top=0')">
                                                        <i class="fa fa-external-link fa-1g " aria-hidden="true"></i>
                                                    </a>
                                                    <!--<div>새창</div>-->
                                                </li>
                                                <li class="copyLink"  title="링크 복사">
                                                    <a class="copyLinkBtn" href="javascript:;"><i class="fa fa-link" aria-hidden="true"></i></a>
                                                    <!--<div>링크복사</div>-->
                                                </li>
                                                <li class="<?=($controller == 'note') ? 'noteDelBtn' : 'articleDelBtn'?>"  title="휴지통">
                                                    <a href="javascript:;"><i class="fa fa-trash-o fa-1g" aria-hidden="true"></i></a>
                                                    <!--<div>휴지통</div>-->
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-txt">
                                <div class="p-inner">
                                   상세 내용을 입력하세요.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--//detailView-->