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
                            </div>
                        </div>
                        <div class="sroll-inner">
                            <!--리스트가 화면 height넘어가면, class scroll-subList생김-->
                            <div class="scroll-subList">
                                <!--글감리스트-->
                                <ul class="my-note-subList">
                                <?php foreach ($vdata['sublist'] as $oSublist): ?>
                                    <li class="timeline-li" data-n_idx="<?=$oSublist->n_idx?>">
                                        <p class="date"><i class="fa fa-calendar-o" aria-hidden="true"></i><?=$oSublist->regdate?></p>
                                        <!--<a href="javascrip:void(0);" >-->
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
                                        <!--</a>-->
                                    </li>
                                <?php endforeach; ?>                                    
                                </ul>
                                <!--//글감리스트-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--//sub 리스트영역/내노트-->