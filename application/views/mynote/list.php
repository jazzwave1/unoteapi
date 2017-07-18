<?php
    // sublist
//    getTemplateSublist($vdata);

    //detailView
    // getTemplateDetail($vdata);


    $this->load->view(//commSearch);
    
    $aMain = array(
        "left" => $this->load->view(//oneRow, data, true)
        "main" => $this->load->view(//viewer, data, true)
    );
    $this->load->view();

?>
<script src="https://code.jquery.com/jquery.js"></script>

                <!--sublist-->
                <div id="bankSub" class="full-left-sublist my-note">
                    <div class="bsinner">
                        <!--카테고리타이틀/필터/버튼 영역-->
                        <div class="listFilter">
                        <p><i class="fa fa-book" aria-hidden="true"></i><?=$vdata['menu']['s_name']?></p>
                            <p class="filter">정렬 | <span>최신순 <i class="fa fa-caret-down" aria-hidden="true"></i></span></p>
                        </div>
                        <div class="subSearch">
                            <div class="search-inner">
                                <a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                                <input type="search" id="search" placeholder="Search..." />
                            </div>
                        </div>
                        <div class="sroll-inner">
                            <!--리스트가 화면 height넘어가면, class scroll-subList생김-->
                            <div class="scroll-subList">
                            <!--글감리스트-->
                            <ul class="bankSubList">
                            
                            <?php foreach ($vdata['sublist'] as $obj):?>
                                <li class="">
                                <!--a href="<?=HOSTURL?>/Mynote/viewNote/<?=$obj->n_idx?>"-->
                                <a href="#" onclick="javascript:viewNote(<?=$obj->n_idx?>)" >
                                        <div class="cafeInfo ">
                                            <div class="cafeinner clearfix">
                                            <div class="cafeLogo"><?=$obj->n_idx?></div>
                                                <div class="cafeTxt">
                                                <p class="tit"><?=$obj->title?></p>
                                                    <p></p>
                                                    <p class="date"><?=$obj->regdate?></p>
                                                </div>
                                                <div class="deleteBtn"><i class="fa fa-trash-o" aria-hidden="true"></i></div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            <?php endforeach; ?> 
                            </ul>
                            <!--//글감리스트-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--//sublist-->
                <!--detailView-->
                <div id="detailView">
                    <div class="dvinner">
                        <div class="page">
                            <div class="p-top clearfix">
                                <div class="top-inner">
                                    <div class="clearfix">
                                        <div class="p-info">
                                            <p class="p-tit"><h2></h2></p>
                                            <p>작성일 : 1919/ 10101/ 1001</p>
                                        </div>
                                        <div class="p-btn">
                                            <ul class="clearfix">
                                                <li>
                                                    <i class="fa fa-bookmark fa-1g" aria-hidden="true"></i>
                                                    <!--<div>북마크</div>-->
                                                </li>
                                                <li>
                                                    <i class="fa fa-road fa-1g" aria-hidden="true"></i>
                                                    <!--<div>이동</div>-->
                                                </li>
                                                <li>
                                                    <i class="fa fa-external-link fa-1g " aria-hidden="true"></i>
                                                    <!--<div>새창</div>-->
                                                </li>
                                                <li>
                                                    <i class="fa fa-trash-o fa-1g" aria-hidden="true"></i>
                                                    <!--<div>휴지통</div>-->
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-txt">
                                <div class="p-inner" id='viewer'>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--//detailView-->

<script>
  function viewNote(n_idx)
  {
    $.post(
      "<?=HOSTURL?>/Mynote/rpcGetNoteInfo"
      ,{
           "n_idx" : n_idx 
       }
      ,function(data, status) {
        if (status == "success" && data.code == 1)
        {
            $('#viewer').text(data.sText);

            //console.log(data.sText); 
        }
      }
    );         
  }      
</script>
