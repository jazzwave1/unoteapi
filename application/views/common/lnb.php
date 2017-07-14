<?php
    // test code
    $usn = 2;

    $this->load->library('MenuClass');
    $aMenuList = MenuClass::getMenuList($usn);
?>
                <!--lnb-->
                <div id="lnb" class="full-left-nav">
                    <div class="lnb-inner navList">
<?php
    foreach ($aMenuList as $aMenuData)
    {
?>
                        <div class="lnbItem">
                            <p class="lnbItemTit">
                                <?=$aMenuData['title']['t_name']?>
<?php
        if($aMenuData['title']['class'] == 'category')
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
        foreach ($aMenuData['sub'] as $aMenuSubData)
        {
            if($aMenuSubData['is_use'] == 'y')
            {
?>
                                <li>
                                    <a href="<?=$aMenuSubData['url']?>">
<?php
                if($aMenuData['title']['class'] == 'category')
                {
?>
                                    <span class="categTit"><?=$aMenuSubData['s_name']?></span>
<?php
                }
                else
                {
?>
                                    <i class="fa <?=$aMenuSubData['s_icon']?>" aria-hidden="true"></i><?=$aMenuSubData['s_name']?>
<?php
                    if($aMenuData['title']['class'] == 'article')
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
                if($aMenuData['title']['class'] == 'crawling')
                {
?>
                                <li class="cBtn">
                                    <a href="#" class="croBtn">수집하기</a>
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
