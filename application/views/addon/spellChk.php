<?php
$code = array(
    'space' => '띄어쓰기 오류'
    ,'spell' => '철자 오류'
    ,'space_spell' => '띄어쓰기, 맞춤법 오류'
    ,'doubt' => '맞춤법 오류'
);
?>
                            <div class="addOnIcon clearfix">
                                <a class="btn" href="javascript:spellChk();" title="재검사"><i class="fa fa-repeat" aria-hidden="true"></i></a>
                                <!--<a href="javascript:;">전체적용</a>-->
                            </div>
                            <!--<div class="splChkInfo">
                                <p>총 글자수 : <span>951</span>, 수정<span>0</span>, 제안<span>4</span></p>
                            </div>-->
                            <div class="splChkBox">
                                <ul>
                                <?php foreach($data as $oSpell): ?>
                                <?php if(isset($oSpell->result)): ?>
                                    <?php foreach($oSpell->result as $oData): ?>
                                    <?php if($oData->etype != 'no_error'): ?>
                                    <li>
                                        <div class="applyBtn" data-s_idx="<?=$oSpell->s_idx?>">
                                            적용<i class="fa fa-check" aria-hidden="true"></i>
                                        </div>
                                        <div class="resultInfo">
                                            <p><?=$oData->input?></p>
                                            <p class="splRight"><?=$oData->output?></p>
                                            <p class="exspl">*<?=$code[$oData->etype]?></p>
                                            <!-- <p class="exspl">*<?=$oData->etype?></p> -->
                                        </div>
                                    </li>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                <?php endforeach; ?>
                                </ul>
                            </div>