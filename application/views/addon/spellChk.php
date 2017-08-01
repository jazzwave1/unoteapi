<?php
$code = array(
    'space' => '띄어쓰기 오류'
,'spell' => '철자 오류'
,'space_spell' => '띄어쓰기, 맞춤법 오류'
,'doubt' => '맞춤법 오류'
);
// echo '<pre>: '. print_r( $data, true ) .'</pre>';
// die();
?>
<div class="addOnIcon clearfix">
    <a class="btn" href="javascript:submitContents('spellChk');" title="재검사"><i class="fa fa-repeat" aria-hidden="true"></i></a>
    <!--<a href="javascript:;">전체적용</a>-->
</div>
<!--<div class="splChkInfo">
    <p>총 글자수 : <span>951</span>, 수정<span>0</span>, 제안<span>4</span></p>
</div>-->
<div class="splChkBox">
    <ul>
        <?php foreach($data as $oSpell): ?>
            <?php foreach($oSpell->result as $oData): ?>
                <li class="splChkList">
                    <div class="applyBtn" id="applyBtn_<?=$oSpell->s_idx?>" data-s_idx="<?=$oSpell->s_idx?>" onClick="text_replace('<?=$oSpell->s_idx?>');">
                        <i class="fa fa-check applySpel" aria-hidden="true"></i>
                        <i class="fa fa-times closeSpel" aria-hidden="true"></i>
                    </div>
                    <div class="resultInfo">
                        <p class="splWrong" id="splWrong_<?=$oSpell->s_idx?>"><?=$oData->input?></p>
                        <p class="splRight" id="splRight_<?=$oSpell->s_idx?>"><?=$oData->output?></p>
                        <p class="exspl"><i class="fa fa-bullhorn notiIcon" aria-hidden="true"></i><?=$code[$oData->etype]?></p>
                        <!-- <p class="exspl">*<?=$oData->etype?></p> -->
                    </div>
                </li>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </ul>
</div>
<?php
