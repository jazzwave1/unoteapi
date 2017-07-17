<!--글감수집-->
                <div id="cList">
                    <div class="c-inner">
                        <div class="c-list-tit">
                            <p>글감수집 현황</p>
                        </div>
                        <div class="c-table-wrap">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="">대상처</th>
                                        <th class="">대상까페</th>
                                        <th class="">게시판명</th>
                                        <th class="">요청일</th>
                                        <th class="">완료일</th>
                                        <th class="">수집양</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--tr>
                                        <td><div class="">다음까페</div></td>
                                        <td><a href="javascript:;">프로젝트 학습 정보공유</a></td>
                                        <td>나의 프로젝트 학습</td>
                                        <td>17.05.01 13:20</td>
                                        <td>17.05.01 13:30</td>
                                        <td>123/123</td>
                                    </tr-->
                                <?php foreach($vdata as $key=>$val) :?>
                                    <tr>
                                    <td><div class=""><?=$val->sCorperation?></div></td>
                                        <td><a href="javascript:;"><?=$val->sSite?></a></td>
                                        <td><?=$val->sBoard?></td>
                                        <td><?=$val->regdate?></td>
                                        <td><?=$val->completedate?></td>
                                        <td><?=$val->r_count?></td>
                                    </tr>
                                <?php endforeach;?> 
                                </tbody>
                            </table>
                        </div>
                        <div class="c-page_num">
                            <ul>
                                <li class="arrow">
                                    <a href="javascript:;"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                                </li>
                                <li><a href="javascript:;" class="on">1</a></li>
                                <li><a href="javascript:;">2</a></li>
                                <li><a href="javascript:;">3</a></li>
                                <li class="arrow">
                                    <a href="javascript:;"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--//글감수집-->
