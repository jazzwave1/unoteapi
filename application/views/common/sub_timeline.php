                <!--sub 리스트영역/내노트-->
                <div id="bankSub" class="full-left-sublist my-note">
                    <div class="bsinner">
                        <!--카테고리타이틀/필터/버튼 영역-->
                        <div class="listFilter">
                            <p><i class="fa fa-book" aria-hidden="true"></i><?=$vdata['menu']['subtitle']?></p>
                            <p class="totalList">  전체 | <span><?=$vdata['sublist_cnt']?></span></p>
                            <!--<p class="filter">정렬 | <span>최신순 <i class="fa fa-caret-down" aria-hidden="true"></i></span></p>-->
                        </div>
                        <div class="subSearch">
                            <div class="search-inner">
                                <a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                                <input type="search" id="search" placeholder="제목 검색" />
                                <!--<i class="fa fa-search" aria-hidden="true"></i>
                                <input type="text" id="search" placeholder="제목 검색" onkeypress="if(event.keyCode==13) {alert('search');}" />-->
                            </div>
                        </div>
                        <div class="sroll-inner">
                            <!--리스트가 화면 height넘어가면, class scroll-subList생김-->
                            <div class="scroll-subList">
                                <!--글감리스트-->
                                <ul class="my-note-subList">
                                <?php if( is_array($vdata['sublist']) && count($vdata['sublist'])>0 ): ?>
                                <?php foreach ($vdata['sublist'] as $oSublist): ?>
                                    <li class="timeline-li" data-n_idx="<?=$oSublist->n_idx?>">
                                        <div class="my-note-inner">
                                            <p class="date"><i class="fa fa-calendar-o" aria-hidden="true"></i><?=$oSublist->regdate?></p>
                                            <div class="my-note-bg">
                                            <div class="thumb">
                                                <p class="thumb-tit"><?=$oSublist->title?></p>
                                                <p class="thumb-txt">
                                                    <?=$oSublist->summary?>
                                                </p>
                                                <p class="thumb-img">
                                                    <!-- <?=$oSublist->summary?> -->
                                                    <!--<img src="images/img_thum.jpg">-->
                                                </p>
                                            </div>
                                         </div>
                                        </div>
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
                <!--//sub 리스트영역/내노트-->