<?php
$controller = $this->uri->segment(1);
?>
                <!--detailView-->
                <div id="detailView">
                    <div class="dvinner">
                        <div class="page">
                            <div class="p-top clearfix">
                                <div class="top-inner">
                                    <div class="clearfix">
                                        <div class="p-info" data-n_idx="1" data-t_idx="1">
                                            <p class="p-date">1999.01.01</p>
                                            <p class="p-tit">제목을 입력하세요</p>
                                        </div>
                                        <div class="p-btn">
                                            <ul class="clearfix">
                                                <li <?=($controller == 'Note') ? 'class="hide"' : ''?>>
                                                    <i class="fa fa-bookmark fa-1g" aria-hidden="true"></i>
                                                    <!--<div>북마크</div>-->
                                                </li>
                                                <li class="hide">
                                                    <i class="fa fa-road fa-1g" aria-hidden="true"></i>
                                                    <!--<div>이동</div>-->
                                                </li>
                                                <li class="newWindow">
                                                    <a class="newWindowBtn" target="_blank" href="" onClick="window.open(this.href,'window','width=750,height=750,left=0,top=0')">
                                                        <i class="fa fa-external-link fa-1g " aria-hidden="true"></i>
                                                    </a>
                                                    <!--<div>새창</div>-->
                                                </li>
                                                <li class="noteDelBtn">
                                                    <i class="fa fa-trash-o fa-1g" aria-hidden="true"></i>
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