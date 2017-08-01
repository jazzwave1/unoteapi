                            <div class="addOnIcon clearfix">
                                <a class="btn" href="javascript:beautiChk();" title="재검사"><i class="fa fa-repeat" aria-hidden="true"></i></a>
                                <!--<a href="javascript:;">전체적용</a>-->
                            </div>
                           <!-- <div class="beautiChkInfo">
                                <p>총 글자수 : <span>951</span>, 수정<span>0</span>, 제안<span>4</span></p>
                            </div>-->
                            <div class="beautiChkBox">
                                <ul>
                                    <!--li class="beautiBoxList">
                                        <div class="resultInfo">
                                            <p class="getTxt">입력 : 우산을 쓰다</p>
                                            <div class="recommedTxt">
                                                <p class="recomTit"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 윤문 추천 결과</p>
                                                <ul>
                                                    <li>1. 우산을 받치다</li>
                                                    <li>2. 우산을 접다</li>
                                                    <li>3. 우산을 펴다</li>
                                                    <li>4. 우산이 뒤집히다</li>
                                                    <li>5. 우산이 펼쳐지다.</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li-->
                                    <?php foreach($aBeauti['data'] as $key=>$val): ?> 
                                     <li class="beautiBoxList">
                                        <div class="resultInfo">
                                        <p class="getTxt">입력 : <?=$val->input?></p>
                                            <div class="recommedTxt">
                                                <p class="recomTit"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 윤문 추천 결과</p>
                                                <ul>
                                                    <?php foreach($val->output as $k=>$v) : ?>
                                                    <li><?=$k+1?>. <?=$v?></li>
                                                    <?php endforeach;?> 
                                                </ul>
                                            </div>
                                        </div>
                                    </li>    
                                    <?php endforeach;?> 
                                </ul>
                            </div>
