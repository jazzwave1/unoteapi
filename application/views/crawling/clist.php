<?php
$aCrawStatus = edu_get_config('craw_status', 'unote');
// echo '<pre>: '. print_r( $vdata, true ) .'</pre>';
// die();
?>
<!--글감수집-->
                <div id="cList">
                    <div class="c-inner">
                        <div class="c-conts">
                            <div class="c-list-tit">
                            <p><i class="fa fa-files-o" aria-hidden="true"></i>글감수집 현황</p>
                        </div>
                            <div class="c-table-wrap">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="">대상처</th>
                                        <th class="">대상까페</th>
                                        <th class="">게시판명</th>
                                        <th class="">요청일자</th>
                                        <th class="">완료일자</th>
                                        <th class="">상태</th>
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
                                <?php if($vdata) : ?>
                                <?php foreach($vdata as $key=>$val) :?>
                                    <tr>
                                        <td><div class=""><?=$val->site_name?></div></td>
                                        <td><a href="javascript:;"><?=$val->sSite?></a></td>
                                        <td><?=$val->sBoard?></td>
                                        <td><?=$val->regdate?></td>
                                        <td><?=$val->completedate?></td>
                                        <td><?=$aCrawStatus[$val->state]?> <a href="javascript:delHistoryArticle(<?=$val->q_idx?>);"><i class="fa fa-trash-o fa-1g" aria-hidden="true"></i><span class="toolTip hide">휴지통</span></a></td>
                                    </tr>
                                <?php endforeach;?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan=6><div class="" align="center">요청 데이터가 없습니다.</div></td>
                                    </tr>
                                <?php endif;?>
                               
                                </tbody>
                            </table>
                        </div>
                            <div class="c-page_num">
                                <ul>
                                    <?=$pagination?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--//글감수집-->
