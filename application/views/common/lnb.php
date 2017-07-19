                <!--lnb-->
                <div id="lnb" class="full-left-nav">
                    <div class="lnb-inner navList">
<?php
    // test code
    $usn = 1;

    $this->load->library('MenuClass');
    $aMenuList = MenuClass::getMenuList($usn);

    foreach ($aMenuList as $controller => $aMenuData)
    {
?>
                        <div class="lnbItem">
                            <p class="lnbItemTit">
                                <?=$aMenuData['title']?>
<?php
        if($controller == 'Category')
        {
?>
                                <span class="addCateg">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </span>
<?php
        }
?>
                            </p>
                            <ul class="lnbItemList">
<?php
        foreach ($aMenuData['sub'] as $method => $aMenuSubData)
        {
            if($aMenuSubData['is_use'])
            {
?>
                                <li>
                                    <a href="<?=HOSTURL?>/<?=$controller?>/<?=$method?>">
<?php
                if($controller == 'Category')
                {
?>
                                    <span class="categTit"><?=$aMenuSubData['s_name']?></span>
<?php
                }
                else
                {
?>
                                    <i class="<?=$aMenuSubData['s_icon']?>" aria-hidden="true"></i><?=$aMenuSubData['s_name']?>
<?php
                    if($controller == 'Article')
                    {
?>
                                    <span class="num">20</span>
<?php
                    }
                }
?>
                                    </a>
                                </li>
<?php
                if($controller == 'Crawling')
                {
?>
                                <li class="cBtn">
                                    <a href="<?=HOSTURL?>/Crawling/reqcrawl" class="croBtn">수집하기</a>
                                    <a href="#" class="fupBtn">파일업로드</a>
                                </li>
<?php                    
                }
            }
        }
?>
                            </ul>
                        </div>
<?php        
    }
?>
                        <div class="newNoteBtn">
                            <a href="#"><i class="fa fa-file-text-o" aria-hidden="true"></i>새글쓰기</a>
                        </div>
                    </div>
                </div>
                <!--//lnb-->
