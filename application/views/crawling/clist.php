<?php
$aCrawStatus = edu_get_config('craw_status', 'unote');
$aLogoMini = edu_get_config('craw_logo_mini', 'unote');
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
                                        <th class="" style="width: 15%">대상처</th>
                                        <th class="" style="width: 15%">대상까페</th>
                                        <th class="" style="width: 15%">게시판명</th>
                                        <th class="" style="width: 15%">요청일자</th>
                                        <th class="" style="width: 15%">완료일자</th>
                                        <th class="" style="width: 15%">상태</th>
                                        <th class="" style="width: 10%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--test code
                                    <tr class="doneLog">
                                        <td><p><span class="logLogo"><img src="../static/images/icon/logo_naver_log.png"></span><span>네이버</span></p></td>
                                        <td>프로젝트 학습 정보공유</td>
                                        <td>나의 프로젝트 학습</td>
                                        <td>2017-05-01 13:20:00</td>
                                        <td>2017-05-01 13:20:10</td>
                                        <td><div class="bar"></div></td>
                                        <td class="deleteLog"><a href="#" title="글감수집 기록삭제"><i class="fa fa-trash-o fa-1g" aria-hidden="true"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td><p><span class="logLogo"><img src="../static/images/icon/logo_facebook_log.png"></span><span>페이스북</span></p></td>
                                        <td>프로젝트 학습 정보공유</td>
                                        <td>나의 프로젝트 학습</td>
                                        <td>2017-05-01 13:20:00</td>
                                        <td>2017-05-01 13:20:10</td>
                                        <td>
                                            <span class="done">완료</span>
                                        </td>
                                        <td class="deleteLog"><a href="#" title="글감수집 기록삭제"><i class="fa fa-trash-o fa-1g" aria-hidden="true"></i></a></td>
                                    </tr>-->
                                <?php if($vdata) : ?>
                                <?php foreach($vdata as $key=>$val) :?>
                                    <tr <?=($val->state == 'COM') ? 'class="doneLog"' : '' ?>>
                                        <td><p><span class="logLogo"><img src="<?=$aLogoMini[$val->site_name]?>"></span><span><?=$val->site_name?></span></p></td>
                                        <td><?=$val->sSite?></td>
                                        <td><?=$val->sBoard?></td>
                                        <td><?=$val->regdate?></td>
                                        <td><?=$val->completedate?></td>

                                    <?php if($val->state == 'PRO'): ?>
                                        <td><div class="bar"></div></td>
                                    <?php elseif($val->state == 'COM'): ?>
                                        <td><span class="done"><?=$aCrawStatus[$val->state]?></span></td>
                                    <?php else: ?>
                                        <td><?=$aCrawStatus[$val->state]?></td>
                                    <?php endif; ?>

                                    <?php if($val->state == 'COM'): ?>
                                        <td class="deleteLog"><a href="javascript:delHistoryArticle(<?=$val->q_idx?>);"><i class="fa fa-trash-o fa-1g" aria-hidden="true"></i></a></td>
                                    <?php else: ?>
                                        <td></td>
                                    <?php endif; ?>

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
